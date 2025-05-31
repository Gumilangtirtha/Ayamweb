@extends('layouts.app')

@section('title', 'Keranjang Belanja - Ayam Goreng Joss')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-down">
                <h2 class="mb-0">
                    <i class="bi bi-cart3"></i> Keranjang Belanja
                </h2>
                <a href="{{ url('/menu') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Lanjut Belanja
                </a>
            </div>
        </div>
    </div>

    @if($cartItems->count() > 0)
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <div class="card shadow-sm" data-aos="fade-right">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-list-ul"></i> Item dalam Keranjang ({{ $cartItems->count() }})
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($cartItems as $item)
                            <div class="cart-item border-bottom p-4" data-item-id="{{ $item->id }}">
                                <div class="row align-items-center">
                                    <!-- Product Image -->
                                    <div class="col-md-2 col-3">
                                        <img src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('images/no-image.jpg') }}" 
                                             alt="{{ $item->product->name }}" 
                                             class="img-fluid rounded"
                                             style="width: 80px; height: 80px; object-fit: cover;">
                                    </div>
                                    
                                    <!-- Product Info -->
                                    <div class="col-md-4 col-9">
                                        <h6 class="mb-1 fw-bold">{{ $item->product->name }}</h6>
                                        <p class="mb-1 text-muted small">{{ Str::limit($item->product->description, 50) }}</p>
                                        
                                        <!-- Spice Level -->
                                        <div class="d-flex align-items-center mb-1">
                                            <small class="text-muted me-2">Level Pedas:</small>
                                            <div class="spice-level">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="bi bi-fire {{ $i <= $item->spice_level ? 'text-danger' : 'text-muted' }}" 
                                                       style="font-size: 0.8rem;"></i>
                                                @endfor
                                                <small class="ms-1 text-muted">({{ $item->spice_level_text }})</small>
                                            </div>
                                        </div>
                                        
                                        @if($item->special_instructions)
                                            <small class="text-info">
                                                <i class="bi bi-chat-left-text"></i> {{ $item->special_instructions }}
                                            </small>
                                        @endif
                                    </div>
                                    
                                    <!-- Price -->
                                    <div class="col-md-2 col-6 text-center">
                                        <div class="fw-bold text-primary">{{ $item->product->formatted_price }}</div>
                                    </div>
                                    
                                    <!-- Quantity Controls -->
                                    <div class="col-md-3 col-6">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="btn btn-outline-secondary btn-sm quantity-btn" 
                                                    data-action="decrease" 
                                                    data-item-id="{{ $item->id }}"
                                                    {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="number" 
                                                   class="form-control text-center mx-2 quantity-input" 
                                                   style="width: 60px;" 
                                                   value="{{ $item->quantity }}" 
                                                   min="1" 
                                                   max="99"
                                                   data-item-id="{{ $item->id }}">
                                            <button class="btn btn-outline-secondary btn-sm quantity-btn" 
                                                    data-action="increase" 
                                                    data-item-id="{{ $item->id }}">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                        <div class="text-center mt-2">
                                            <small class="text-muted">Subtotal:</small><br>
                                            <span class="fw-bold text-success item-subtotal">{{ $item->formatted_subtotal }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Remove Button -->
                                    <div class="col-md-1 col-12 text-center mt-2 mt-md-0">
                                        <button class="btn btn-outline-danger btn-sm remove-item" 
                                                data-item-id="{{ $item->id }}"
                                                title="Hapus item">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-warning" id="clearCart">
                            <i class="bi bi-trash"></i> Kosongkan Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm sticky-top" style="top: 120px;" data-aos="fade-left">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-receipt"></i> Ringkasan Pesanan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal ({{ $cartItems->sum('quantity') }} item)</span>
                            <span class="fw-bold" id="cartSubtotal">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Biaya Pengiriman</span>
                            <span class="text-success">GRATIS</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Biaya Layanan</span>
                            <span>Rp 2.000</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold text-primary fs-5" id="cartTotal">
                                Rp {{ number_format($total + 2000, 0, ',', '.') }}
                            </span>
                        </div>
                        
                        <!-- Promo Code -->
                        <div class="mb-3">
                            <label class="form-label small">Kode Promo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukkan kode promo" id="promoCode">
                                <button class="btn btn-outline-secondary" type="button" id="applyPromo">
                                    Terapkan
                                </button>
                            </div>
                        </div>
                        
                        @if(Session::has('customer'))
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="checkoutBtn">
                                    <i class="bi bi-credit-card"></i> Lanjut ke Pembayaran
                                </button>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i>
                                <strong>Login diperlukan</strong><br>
                                Silakan login untuk melanjutkan ke pembayaran
                            </div>
                            <div class="d-grid gap-2">
                                <a href="{{ route('customer.login') }}" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                                <a href="{{ route('customer.register') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-person-plus"></i> Daftar
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Delivery Info -->
                <div class="card shadow-sm mt-3" data-aos="fade-left" data-aos-delay="100">
                    <div class="card-body">
                        <h6 class="card-title">
                            <i class="bi bi-truck"></i> Informasi Pengiriman
                        </h6>
                        <ul class="list-unstyled mb-0 small">
                            <li><i class="bi bi-check-circle text-success"></i> Gratis ongkir untuk pembelian minimal Rp 50.000</li>
                            <li><i class="bi bi-check-circle text-success"></i> Estimasi pengiriman 30-45 menit</li>
                            <li><i class="bi bi-check-circle text-success"></i> Makanan dijamin masih panas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty Cart -->
        <div class="row justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade-up">
                <div class="card shadow-sm">
                    <div class="card-body py-5">
                        <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 mb-3">Keranjang Anda Kosong</h4>
                        <p class="text-muted mb-4">
                            Sepertinya Anda belum menambahkan item apapun ke keranjang. 
                            Yuk, jelajahi menu lezat kami!
                        </p>
                        <a href="{{ url('/menu') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-grid"></i> Lihat Menu
                        </a>
                    </div>
                </div>
                
                <!-- Recommended Products -->
                <div class="mt-4">
                    <h5>Menu Populer</h5>
                    <div class="row">
                        <!-- Add some popular products here -->
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('images/ayam-original.jpg') }}" class="card-img-top" alt="Ayam Original">
                                <div class="card-body p-2">
                                    <h6 class="card-title small">Ayam Original</h6>
                                    <p class="card-text small text-primary fw-bold">Rp 25.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('images/ayam-spicy.jpg') }}" class="card-img-top" alt="Ayam Spicy">
                                <div class="card-body p-2">
                                    <h6 class="card-title small">Ayam Spicy</h6>
                                    <p class="card-text small text-primary fw-bold">Rp 28.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('images/ayam-extreme.jpg') }}" class="card-img-top" alt="Ayam Extreme">
                                <div class="card-body p-2">
                                    <h6 class="card-title small">Ayam Extreme</h6>
                                    <p class="card-text small text-primary fw-bold">Rp 35.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Update quantity
    $('.quantity-btn').click(function() {
        const action = $(this).data('action');
        const itemId = $(this).data('item-id');
        const quantityInput = $(`.quantity-input[data-item-id="${itemId}"]`);
        let quantity = parseInt(quantityInput.val());
        
        if (action === 'increase') {
            quantity++;
        } else if (action === 'decrease' && quantity > 1) {
            quantity--;
        }
        
        quantityInput.val(quantity);
        updateCartItem(itemId, quantity);
    });
    
    // Direct quantity input
    $('.quantity-input').change(function() {
        const itemId = $(this).data('item-id');
        let quantity = parseInt($(this).val());
        
        if (quantity < 1) quantity = 1;
        if (quantity > 99) quantity = 99;
        
        $(this).val(quantity);
        updateCartItem(itemId, quantity);
    });
    
    // Remove item
    $('.remove-item').click(function() {
        const itemId = $(this).data('item-id');
        
        if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
            removeCartItem(itemId);
        }
    });
    
    // Clear cart
    $('#clearCart').click(function() {
        if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
            clearCart();
        }
    });
    
    // Apply promo code
    $('#applyPromo').click(function() {
        const promoCode = $('#promoCode').val();
        if (promoCode) {
            applyPromoCode(promoCode);
        }
    });
    
    // Checkout
    $('#checkoutBtn').click(function() {
        window.location.href = '{{ route("checkout.index") }}';
    });
    
    function updateCartItem(itemId, quantity) {
        $.ajax({
            url: `/cart/${itemId}`,
            method: 'PUT',
            data: {
                quantity: quantity,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Update subtotal for this item
                    $(`.cart-item[data-item-id="${itemId}"] .item-subtotal`).text(response.subtotal);
                    
                    // Update cart total
                    $('#cartSubtotal').text(response.cart_total);
                    
                    // Calculate new total with service fee
                    const subtotal = parseFloat(response.cart_total.replace(/[^\d]/g, ''));
                    const total = subtotal + 2000;
                    $('#cartTotal').text('Rp ' + total.toLocaleString('id-ID'));
                    
                    // Update cart count in navbar
                    updateCartCount();
                    
                    // Update quantity button states
                    const decreaseBtn = $(`.quantity-btn[data-item-id="${itemId}"][data-action="decrease"]`);
                    if (quantity <= 1) {
                        decreaseBtn.prop('disabled', true);
                    } else {
                        decreaseBtn.prop('disabled', false);
                    }
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    }
    
    function removeCartItem(itemId) {
        $.ajax({
            url: `/cart/${itemId}`,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $(`.cart-item[data-item-id="${itemId}"]`).fadeOut(300, function() {
                        $(this).remove();
                        
                        // Check if cart is empty
                        if ($('.cart-item').length === 0) {
                            location.reload();
                        }
                    });
                    
                    // Update totals
                    $('#cartSubtotal').text(response.cart_total);
                    const subtotal = parseFloat(response.cart_total.replace(/[^\d]/g, ''));
                    const total = subtotal + 2000;
                    $('#cartTotal').text('Rp ' + total.toLocaleString('id-ID'));
                    
                    // Update cart count
                    updateCartCount();
                    
                    // Show success message
                    showAlert('success', response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    }
    
    function clearCart() {
        $.ajax({
            url: '{{ route("cart.clear") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    }
    
    function applyPromoCode(code) {
        // Implement promo code logic here
        alert('Fitur kode promo akan segera hadir!');
    }
    
    function showAlert(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        $('.container').prepend(alertHtml);
        
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 3000);
    }
});
</script>
@endpush
