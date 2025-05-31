<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display the cart contents.
     */
    public function index()
    {
        $cartItems = $this->getCartItems();
        $total = $cartItems->sum('subtotal');

        return view('cart.index', compact('cartItems', 'total'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:99',
            'spice_level' => 'required|integer|min:1|max:5',
            'special_instructions' => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($request->product_id);

        if (!$product->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak tersedia.'
            ]);
        }

        $customerId = Session::get('customer.id');
        $sessionId = Session::getId();

        // Check if item already exists in cart
        $existingCartItem = Cart::where(function($query) use ($customerId, $sessionId) {
                if ($customerId) {
                    $query->where('customer_id', $customerId);
                } else {
                    $query->where('session_id', $sessionId)->whereNull('customer_id');
                }
            })
            ->where('product_id', $request->product_id)
            ->where('spice_level', $request->spice_level)
            ->first();

        if ($existingCartItem) {
            // Update quantity
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            // Create new cart item
            Cart::create([
                'customer_id' => $customerId,
                'session_id' => $customerId ? null : $sessionId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'spice_level' => $request->spice_level,
                'special_instructions' => $request->special_instructions,
            ]);
        }

        $cartCount = $this->getCartCount();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang!',
            'cart_count' => $cartCount
        ]);
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $cartItem = $this->findCartItem($id);

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan di keranjang.'
            ]);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Jumlah item berhasil diperbarui!',
            'subtotal' => $cartItem->formatted_subtotal,
            'cart_total' => $this->getCartTotal()
        ]);
    }

    /**
     * Remove item from cart.
     */
    public function remove($id)
    {
        $cartItem = $this->findCartItem($id);

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan di keranjang.'
            ]);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus dari keranjang!',
            'cart_count' => $this->getCartCount(),
            'cart_total' => $this->getCartTotal()
        ]);
    }

    /**
     * Clear all items from cart.
     */
    public function clear()
    {
        $customerId = Session::get('customer.id');
        $sessionId = Session::getId();

        Cart::where(function($query) use ($customerId, $sessionId) {
            if ($customerId) {
                $query->where('customer_id', $customerId);
            } else {
                $query->where('session_id', $sessionId)->whereNull('customer_id');
            }
        })->delete();

        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil dikosongkan!'
        ]);
    }

    /**
     * Get cart items for current user/session.
     */
    private function getCartItems()
    {
        $customerId = Session::get('customer.id');
        $sessionId = Session::getId();

        return Cart::with('product')
            ->where(function($query) use ($customerId, $sessionId) {
                if ($customerId) {
                    $query->where('customer_id', $customerId);
                } else {
                    $query->where('session_id', $sessionId)->whereNull('customer_id');
                }
            })
            ->get();
    }

    /**
     * Get cart item count.
     */
    private function getCartCount()
    {
        return $this->getCartItems()->sum('quantity');
    }

    /**
     * Get cart total amount.
     */
    private function getCartTotal()
    {
        $total = $this->getCartItems()->sum('subtotal');
        return 'Rp ' . number_format($total, 0, ',', '.');
    }

    /**
     * Get cart count for AJAX requests.
     */
    public function getCount()
    {
        $count = $this->getCartCount();
        return response()->json(['count' => $count]);
    }

    /**
     * Find cart item by ID for current user/session.
     */
    private function findCartItem($id)
    {
        $customerId = Session::get('customer.id');
        $sessionId = Session::getId();

        return Cart::where('id', $id)
            ->where(function($query) use ($customerId, $sessionId) {
                if ($customerId) {
                    $query->where('customer_id', $customerId);
                } else {
                    $query->where('session_id', $sessionId)->whereNull('customer_id');
                }
            })
            ->first();
    }
}

