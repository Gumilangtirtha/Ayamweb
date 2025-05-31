@extends('layouts.app')

@section('title', 'Menu - Ayam Goreng Joss')

@push('styles')
<style>
    .menu-header {
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        padding: 60px 0;
        color: var(--white);
        text-align: center;
    }

    .menu-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .menu-header p {
        font-size: 1.2rem;
        opacity: 0.9;
    }

    .menu-filters {
        background: var(--white);
        padding: 30px 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 100px;
        z-index: 100;
    }

    .filter-btn {
        border: 2px solid var(--primary-red);
        color: var(--primary-red);
        background: transparent;
        border-radius: 25px;
        padding: 10px 20px;
        margin: 5px;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: var(--primary-red);
        color: var(--white);
        transform: translateY(-2px);
    }

    .menu-grid {
        padding: 50px 0;
    }

    .menu-item {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        margin-bottom: 30px;
    }

    .menu-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .menu-item-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .menu-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .menu-item:hover .menu-item-image img {
        transform: scale(1.1);
    }

    .spice-level {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255, 68, 68, 0.9);
        color: var(--white);
        padding: 8px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .premium-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--golden-yellow);
        color: var(--dark-gray);
        padding: 8px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .menu-item-content {
        padding: 25px;
    }

    .menu-item-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark-gray);
        margin-bottom: 10px;
    }

    .menu-item-description {
        color: #666;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .menu-item-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-red);
        margin-bottom: 20px;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .quantity-btn {
        width: 35px;
        height: 35px;
        border: 2px solid var(--primary-red);
        background: transparent;
        color: var(--primary-red);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        background: var(--primary-red);
        color: var(--white);
    }

    .quantity-input {
        width: 60px;
        text-align: center;
        border: 2px solid #E9ECEF;
        border-radius: 10px;
        padding: 8px;
        font-weight: 600;
    }

    .spice-selector {
        margin-bottom: 15px;
    }

    .spice-selector label {
        font-weight: 600;
        color: var(--dark-gray);
        margin-bottom: 8px;
        display: block;
    }

    .spice-options {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
    }

    .spice-option {
        width: 35px;
        height: 35px;
        border: 2px solid #E9ECEF;
        background: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .spice-option.active {
        border-color: var(--primary-red);
        background: var(--primary-red);
        color: var(--white);
    }

    .spice-option:hover {
        border-color: var(--primary-red);
        transform: scale(1.1);
    }

    .add-to-cart-btn {
        width: 100%;
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        border: none;
        color: var(--white);
        padding: 12px;
        border-radius: 15px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .add-to-cart-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 68, 68, 0.4);
    }

    .add-to-cart-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .loading-spinner {
        display: none;
    }

    .no-results {
        text-align: center;
        padding: 80px 0;
        color: #666;
    }

    .no-results i {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    /* Search Bar */
    .search-bar {
        max-width: 400px;
        margin: 0 auto 30px;
        position: relative;
    }

    .search-input {
        width: 100%;
        padding: 15px 50px 15px 20px;
        border: 2px solid #E9ECEF;
        border-radius: 25px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 0.2rem rgba(255, 68, 68, 0.25);
    }

    .search-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        background: var(--primary-red);
        border: none;
        color: var(--white);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .menu-header h1 {
            font-size: 2rem;
        }
        
        .menu-filters {
            position: static;
        }
        
        .filter-btn {
            font-size: 0.9rem;
            padding: 8px 16px;
        }
        
        .spice-options {
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<!-- Menu Header -->
<section class="menu-header">
    <div class="container">
        <h1 data-aos="fade-up">Menu Ayam Goreng Joss</h1>
        <p data-aos="fade-up" data-aos-delay="100">Pilih level kepedasan favorit Anda dan nikmati kelezatan yang tak terlupakan</p>
    </div>
</section>

<!-- Menu Filters -->
<section class="menu-filters">
    <div class="container">
        <!-- Search Bar -->
        <div class="search-bar" data-aos="fade-up">
            <input type="text" class="form-control search-input" id="searchInput" placeholder="Cari menu favorit Anda...">
            <button class="search-btn" type="button">
                <i class="bi bi-search"></i>
            </button>
        </div>

        <!-- Category Filters -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="100">
            <button class="btn filter-btn active" data-category="all">
                <i class="bi bi-grid"></i> Semua Menu
            </button>
            @if(isset($kategoris) && $kategoris->count() > 0)
                @foreach($kategoris as $kategori)
                    <button class="btn filter-btn" data-category="{{ $kategori->id }}">
                        {{ $kategori->kategori }}
                    </button>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Menu Grid -->
<section class="menu-grid">
    <div class="container">
        <div class="row" id="menuContainer">
            @if(isset($menus) && $menus->count() > 0)
                @foreach($menus as $index => $menu)
                    <div class="col-lg-4 col-md-6 menu-item-wrapper" 
                         data-category="{{ $menu->idkategori }}" 
                         data-name="{{ strtolower($menu->menu) }}"
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($index % 6 + 1) * 100 }}">
                        <div class="menu-item">
                            <div class="menu-item-image">
                                <img src="{{ $menu->gambar ? asset('storage/' . $menu->gambar) : asset('images/no-image.jpg') }}" 
                                     alt="{{ $menu->menu }}"
                                     loading="lazy">
                                
                                <!-- Spice Level Badge -->
                                <div class="spice-level">
                                    <i class="bi bi-fire"></i>
                                    Level {{ rand(1, 5) }}
                                </div>
                                
                                <!-- Premium Badge (if applicable) -->
                                @if(rand(0, 1))
                                    <div class="premium-badge">
                                        <i class="bi bi-star"></i> Premium
                                    </div>
                                @endif
                            </div>
                            
                            <div class="menu-item-content">
                                <h3 class="menu-item-title">{{ $menu->menu }}</h3>
                                <p class="menu-item-description">{{ $menu->deskripsi ?: 'Ayam goreng lezat dengan bumbu rahasia yang menggugah selera.' }}</p>
                                <div class="menu-item-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>
                                
                                <!-- Quantity Selector -->
                                <div class="quantity-selector">
                                    <label class="form-label mb-0">Jumlah:</label>
                                    <button type="button" class="quantity-btn" onclick="decreaseQuantity({{ $menu->idmenu }})">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="form-control quantity-input" 
                                           id="quantity-{{ $menu->idmenu }}" 
                                           value="1" min="1" max="99">
                                    <button type="button" class="quantity-btn" onclick="increaseQuantity({{ $menu->idmenu }})">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                                
                                <!-- Spice Level Selector -->
                                <div class="spice-selector">
                                    <label>Level Pedas:</label>
                                    <div class="spice-options">
                                        @for($i = 1; $i <= 5; $i++)
                                            <div class="spice-option {{ $i == 1 ? 'active' : '' }}" 
                                                 data-menu-id="{{ $menu->idmenu }}" 
                                                 data-spice-level="{{ $i }}"
                                                 title="Level {{ $i }}">
                                                {{ $i }}
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                
                                <!-- Add to Cart Button -->
                                <button type="button" 
                                        class="btn add-to-cart-btn" 
                                        onclick="addToCart({{ $menu->idmenu }}, '{{ $menu->menu }}', {{ $menu->harga }})">
                                    <span class="btn-text">
                                        <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                                    </span>
                                    <span class="loading-spinner">
                                        <span class="spinner-border spinner-border-sm" role="status"></span>
                                        Menambahkan...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="no-results">
                        <i class="bi bi-inbox"></i>
                        <h3>Menu Tidak Ditemukan</h3>
                        <p>Maaf, saat ini belum ada menu yang tersedia. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Pagination -->
        @if(isset($menus) && $menus->hasPages())
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $menus->links() }}
            </div>
        @endif
        
        <!-- No Results Message (Hidden by default) -->
        <div class="no-results" id="noResults" style="display: none;">
            <i class="bi bi-search"></i>
            <h3>Tidak Ada Hasil</h3>
            <p>Menu yang Anda cari tidak ditemukan. Coba kata kunci lain atau pilih kategori yang berbeda.</p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Search functionality
    $('#searchInput').on('input', function() {
        const searchTerm = $(this).val().toLowerCase();
        filterMenus(searchTerm, $('.filter-btn.active').data('category'));
    });
    
    // Category filter functionality
    $('.filter-btn').click(function() {
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        const category = $(this).data('category');
        const searchTerm = $('#searchInput').val().toLowerCase();
        filterMenus(searchTerm, category);
    });
    
    // Spice level selector
    $('.spice-option').click(function() {
        const menuId = $(this).data('menu-id');
        $(`.spice-option[data-menu-id="${menuId}"]`).removeClass('active');
        $(this).addClass('active');
    });
});

// Filter menus based on search and category
function filterMenus(searchTerm, category) {
    let visibleCount = 0;
    
    $('.menu-item-wrapper').each(function() {
        const menuName = $(this).data('name');
        const menuCategory = $(this).data('category');
        
        let showItem = true;
        
        // Filter by search term
        if (searchTerm && !menuName.includes(searchTerm)) {
            showItem = false;
        }
        
        // Filter by category
        if (category !== 'all' && menuCategory != category) {
            showItem = false;
        }
        
        if (showItem) {
            $(this).show();
            visibleCount++;
        } else {
            $(this).hide();
        }
    });
    
    // Show/hide no results message
    if (visibleCount === 0) {
        $('#noResults').show();
    } else {
        $('#noResults').hide();
    }
}

// Quantity controls
function increaseQuantity(menuId) {
    const input = $(`#quantity-${menuId}`);
    let value = parseInt(input.val());
    if (value < 99) {
        input.val(value + 1);
    }
}

function decreaseQuantity(menuId) {
    const input = $(`#quantity-${menuId}`);
    let value = parseInt(input.val());
    if (value > 1) {
        input.val(value - 1);
    }
}

// Add to cart functionality
function addToCart(menuId, menuName, menuPrice) {
    const quantity = parseInt($(`#quantity-${menuId}`).val());
    const spiceLevel = $(`.spice-option.active[data-menu-id="${menuId}"]`).data('spice-level');
    const button = $(`.add-to-cart-btn`).has(`[onclick*="${menuId}"]`).parent().find('.add-to-cart-btn');
    
    // Show loading state
    button.prop('disabled', true);
    button.find('.btn-text').hide();
    button.find('.loading-spinner').show();
    
    // Simulate API call (replace with actual implementation)
    setTimeout(function() {
        // Reset button state
        button.prop('disabled', false);
        button.find('.btn-text').show();
        button.find('.loading-spinner').hide();
        
        // Show success message
        showToast('success', `${menuName} berhasil ditambahkan ke keranjang!`);
        
        // Update cart count
        updateCartCount();
        
        // Reset quantity to 1
        $(`#quantity-${menuId}`).val(1);
        
    }, 1000);
    
    // TODO: Implement actual AJAX call to add to cart
    /*
    $.ajax({
        url: '{{ route("cart.add") }}',
        method: 'POST',
        data: {
            product_id: menuId,
            quantity: quantity,
            spice_level: spiceLevel,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            button.prop('disabled', false);
            button.find('.btn-text').show();
            button.find('.loading-spinner').hide();
            
            if (response.success) {
                showToast('success', response.message);
                updateCartCount();
                $(`#quantity-${menuId}`).val(1);
            } else {
                showToast('error', response.message);
            }
        },
        error: function() {
            button.prop('disabled', false);
            button.find('.btn-text').show();
            button.find('.loading-spinner').hide();
            showToast('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    });
    */
}

// Toast notification function
function showToast(type, message) {
    const toastClass = type === 'success' ? 'bg-success' : 'bg-danger';
    const icon = type === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle';
    
    const toastHtml = `
        <div class="toast align-items-center text-white ${toastClass} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi ${icon}"></i> ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    // Add toast container if not exists
    if (!$('#toast-container').length) {
        $('body').append('<div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>');
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
