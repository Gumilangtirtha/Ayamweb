<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    /**
     * Show the customer login form.
     */
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    /**
     * Handle customer login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            if (!$customer->is_active) {
                return back()->with('error', 'Akun Anda telah dinonaktifkan. Silakan hubungi customer service.');
            }

            // Store customer data in session
            Session::put('customer', [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
            ]);

            // Transfer cart items from session to database if any
            $this->transferSessionCartToDatabase($customer->id);

            return redirect()->intended('/')->with('success', 'Selamat datang kembali, ' . $customer->name . '!');
        }

        return back()->with('error', 'Email atau password salah.')->withInput($request->only('email'));
    }

    /**
     * Show the customer registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.customer-register');
    }

    /**
     * Handle customer registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        // Store customer data in session
        Session::put('customer', [
            'id' => $customer->id,
            'name' => $customer->name,
            'email' => $customer->email,
        ]);

        // Transfer cart items from session to database if any
        $this->transferSessionCartToDatabase($customer->id);

        return redirect('/')->with('success', 'Selamat datang di Ayam Goreng Joss, ' . $customer->name . '!');
    }

    /**
     * Handle customer logout.
     */
    public function logout()
    {
        Session::forget('customer');
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Transfer cart items from session to database when customer logs in.
     */
    private function transferSessionCartToDatabase($customerId)
    {
        $sessionId = Session::getId();

        // Update cart items with customer_id
        \App\Models\Cart::where('session_id', $sessionId)
            ->whereNull('customer_id')
            ->update(['customer_id' => $customerId]);
    }
}
