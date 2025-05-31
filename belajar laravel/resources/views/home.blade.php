@extends('layouts.app')

@section('title', 'Ayam Goreng Joss - Pedas Nikmat Bergaransi')

@push('styles')
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--white);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--cream-white);
        margin-bottom: 2rem;
        font-weight: 500;
    }

    .hero-image {
        position: relative;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .hero-image img {
        filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.3));
        max-width: 100%;
        height: auto;
    }

    /* Features Section */
    .features-section {
        padding: 80px 0;
        background: var(--white);
    }

    .feature-card {
        text-align: center;
        padding: 2rem;
        border-radius: 20px;
        transition: all 0.3s ease;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--white);
    }

    /* Menu Preview Section */
    .menu-preview {
        padding: 80px 0;
        background: var(--light-gray);
    }

    .menu-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }

    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .menu-card-image {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .menu-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .menu-card:hover .menu-card-image img {
        transform: scale(1.1);
    }

    .spice-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(255, 68, 68, 0.9);
        color: var(--white);
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .menu-card-body {
        padding: 1.5rem;
    }

    .menu-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-red);
    }

    /* CTA Section */
    .cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--dark-gray) 0%, #1a1a1a 100%);
        color: var(--white);
        text-align: center;
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .cta-subtitle {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <h1 class="hero-title">Ayam Goreng Joss</h1>
                    <p class="hero-subtitle">Pedas Nikmat Bergaransi! Nikmati kelezatan ayam goreng dengan berbagai level kepedasan yang menggugah selera.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('menu') }}" class="btn btn-warning btn-lg">
                            <i class="bi bi-grid"></i> Lihat Menu
                        </a>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-cart3"></i> Keranjang
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-image text-center">
                    <img src="{{ asset('images/hero-chicken.png') }}" alt="Ayam Goreng Joss" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12" data-aos="fade-up">
                <h2 class="section-title mb-3">Mengapa Memilih Ayam Goreng Joss?</h2>
                <p class="text-muted">Kami berkomitmen memberikan yang terbaik untuk Anda</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-fire"></i>
                    </div>
                    <h4>5 Level Kepedasan</h4>
                    <p class="text-muted">Dari yang tidak pedas hingga sangat pedas, sesuaikan dengan selera Anda</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h4>Pengiriman Cepat</h4>
                    <p class="text-muted">Pesanan Anda akan sampai dalam 30-45 menit dengan kondisi masih panas</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Kualitas Terjamin</h4>
                    <p class="text-muted">Menggunakan ayam segar pilihan dengan bumbu rahasia yang nikmat</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Preview Section -->
<section class="menu-preview">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12" data-aos="fade-up">
                <h2 class="section-title mb-3">Menu Favorit Kami</h2>
                <p class="text-muted">Cicipi kelezatan menu andalan yang paling disukai pelanggan</p>
            </div>
        </div>
        <div class="row">
            @if(isset($menus) && $menus->count() > 0)
                @foreach($menus as $index => $menu)
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="menu-card">
                            <div class="menu-card-image">
                                <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : asset('images/no-image.jpg') }}" 
                                     alt="{{ $menu->menu }}">
                                <div class="spice-badge">
                                    <i class="bi bi-fire"></i> Level {{ rand(1, 5) }}
                                </div>
                            </div>
                            <div class="menu-card-body">
                                <h5 class="card-title">{{ $menu->menu }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($menu->deskripsi, 80) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                    <button class="btn btn-primary btn-sm add-to-cart" 
                                            data-product-id="{{ $menu->idmenu }}"
                                            data-product-name="{{ $menu->menu }}"
                                            data-product-price="{{ $menu->harga }}">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        Menu sedang dalam proses persiapan. Silakan kembali lagi nanti.
                    </div>
                </div>
            @endif
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-grid"></i> Lihat Semua Menu
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h2 class="cta-title">Siap Merasakan Kelezatan?</h2>
                <p class="cta-subtitle">Bergabunglah dengan ribuan pelanggan yang sudah merasakan nikmatnya Ayam Goreng Joss</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    @if(!Session::has('customer'))
                        <a href="{{ route('customer.register') }}" class="btn btn-warning btn-lg">
                            <i class="bi bi-person-plus"></i> Daftar Sekarang
                        </a>
                        <a href="{{ route('customer.login') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                        </a>
                    @else
                        <a href="{{ route('menu') }}" class="btn btn-warning btn-lg">
                            <i class="bi bi-grid"></i> Pesan Sekarang
                        </a>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-cart3"></i> Lihat Keranjang
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Add to cart functionality
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        const productName = $(this).data('product-name');
        const productPrice = $(this).data('product-price');
        
        // For now, just show alert - will be implemented with proper cart system
        alert(`${productName} akan ditambahkan ke keranjang!\nHarga: Rp ${productPrice.toLocaleString('id-ID')}`);
        
        // TODO: Implement actual add to cart functionality
        // addToCart(productId, 1, 1); // productId, quantity, spiceLevel
    });
    
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
});

// Function to add product to cart (to be implemented)
function addToCart(productId, quantity, spiceLevel) {
    $.ajax({
        url: '{{ route("cart.add") }}',
        method: 'POST',
        data: {
            product_id: productId,
            quantity: quantity,
            spice_level: spiceLevel,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                // Update cart count
                updateCartCount();
                
                // Show success message
                showToast('success', response.message);
            } else {
                showToast('error', response.message);
            }
        },
        error: function() {
            showToast('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    });
}

// Function to show toast notifications
function showToast(type, message) {
    const toastClass = type === 'success' ? 'bg-success' : 'bg-danger';
    const toastHtml = `
        <div class="toast align-items-center text-white ${toastClass} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    // Add toast container if not exists
    if (!$('#toast-container').length) {
        $('body').append('<div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3"></div>');
    }
    
    const $toast = $(toastHtml);
    $('#toast-container').append($toast);
    
    const toast = new bootstrap.Toast($toast[0]);
    toast.show();
    
    // Remove toast after it's hidden
    $toast.on('hidden.bs.toast', function() {
        $(this).remove();
    });
}
</script>
@endpush
