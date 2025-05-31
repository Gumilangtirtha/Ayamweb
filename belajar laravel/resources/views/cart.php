
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Ayam Goreng Joss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --spicy-red: #ff3d3d;
            --spicy-red-dark: #e62e2e;
            --melted-cheese: #ffc234;
            --melted-cheese-dark: #ffb100;
            --white: #ffffff;
            --black: #1a1a1a;
            --gray-light: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--gray-light);
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 50px;
            transition: transform 0.3s ease;
        }

        .navbar-brand span {
            font-weight: 700;
            color: var(--spicy-red);
            font-size: 1.4rem;
        }

        /* Cart Section Styles */
        .cart-section {
            padding: 100px 0;
        }

        .section-title {
            color: var(--black);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .cart-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            margin-bottom: 15px;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .cart-info {
            flex-grow: 1;
        }

        .cart-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .cart-price {
            color: var(--spicy-red);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .cart-details {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 5px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            background: var(--gray-light);
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: var(--spicy-red);
            color: white;
        }

        .remove-btn {
            border: none;
            background: none;
            color: #999;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            color: var(--spicy-red);
        }

        .cart-summary {
            position: sticky;
            top: 100px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 10px 0;
            border-bottom: 1px dashed #eee;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--spicy-red);
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px dashed #eee;
            display: flex;
            justify-content: space-between;
        }

        .btn-checkout {
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .btn-checkout:hover {
            background: linear-gradient(135deg, var(--spicy-red-dark), var(--spicy-red));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 61, 61, 0.4);
        }

        .btn-continue {
            background: transparent;
            color: var(--black);
            padding: 12px 30px;
            border-radius: 30px;
            border: 2px solid #ddd;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 15px;
        }

        .btn-continue:hover {
            border-color: var(--black);
            background: rgba(0, 0, 0, 0.03);
        }

        .empty-cart {
            text-align: center;
            padding: 50px 0;
        }

        .empty-cart i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-cart h3 {
            margin-bottom: 20px;
            color: #666;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cart-section {
                padding: 60px 0;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .cart-item img {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .cart-actions {
                margin-top: 15px;
                display: flex;
                justify-content: center;
                gap: 15px;
            }

            .cart-summary {
                position: static;
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="gambar/logo.png" alt="Ayam Goreng Joss" height="50">
                <span>Ayam Goreng Joss</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cart.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="container">
            <h1 class="section-title">Keranjang Belanja</h1>
            
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="cart-card">
                        <!-- Cart Item 1 -->
                        <div class="cart-item">
                            <img src="gambar/ayam-cheese.jpg" alt="Ayam Keju Leleh">
                            <div class="cart-info">
                                <h4 class="cart-title">Ayam Keju Leleh</h4>
                                <div class="cart-details">Level Pedas: 3</div>
                                <div class="cart-price">Rp 35.000</div>
                            </div>
                            <div class="cart-actions">
                                <div class="quantity-control">
                                    <button class="quantity-btn" onclick="updateQuantity(1, 'decrease')">-</button>
                                    <span id="quantity-1">1</span>
                                    <button class="quantity-btn" onclick="updateQuantity(1, 'increase')">+</button>
                                </div>
                                <button class="remove-btn mt-2" onclick="removeItem(1)">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 2 -->
                        <div class="cart-item">
                            <img src="gambar/extreme-spicy.jpeg" alt="Ayam Extreme Spicy">
                            <div class="cart-info">
                                <h4 class="cart-title">Ayam Extreme Spicy</h4>
                                <div class="cart-details">Level Pedas: 5</div>
                                <div class="cart-price">Rp 35.000</div>
                            </div>
                            <div class="cart-actions">
                                <div class="quantity-control">
                                    <button class="quantity-btn" onclick="updateQuantity(2, 'decrease')">-</button>
                                    <span id="quantity-2">2</span>
                                    <button class="quantity-btn" onclick="updateQuantity(2, 'increase')">+</button>
                                </div>
                                <button class="remove-btn mt-2" onclick="removeItem(2)">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>
                        </div>

                        <!-- Cart Item 3 -->
                        <div class="cart-item">
                            <img src="gambar/menu-original.jpg" alt="Ayam Goreng Original">
                            <div class="cart-info">
                                <h4 class="cart-title">Ayam Goreng Original</h4>
                                <div class="cart-details">Level Pedas: 1</div>
                                <div class="cart-price">Rp 25.000</div>
                            </div>
                            <div class="cart-actions">
                                <div class="quantity-control">
                                    <button class="quantity-btn" onclick="updateQuantity(3, 'decrease')">-</button>
                                    <span id="quantity-3">1</span>
                                    <button class="quantity-btn" onclick="updateQuantity(3, 'increase')">+</button>
                                </div>
                                <button class="remove-btn mt-2" onclick="removeItem(3)">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>
                        </div>

                        <!-- Empty Cart (Hidden by default) -->
                        <div class="empty-cart d-none" id="empty-cart">
                            <i class="bi bi-cart-x"></i>
                            <h3>Keranjang Belanja Anda Kosong</h3>
                            <p>Sepertinya Anda belum menambahkan menu apapun ke keranjang.</p>
                            <a href="home.php#menu" class="btn btn-checkout">Lihat Menu</a>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="cart-card cart-summary">
                        <h3 class="mb-4">Ringkasan Pesanan</h3>
                        <div class="summary-item">
                            <span>Ayam Keju Leleh (x1)</span>
                            <span>Rp 35.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Ayam Extreme Spicy (x2)</span>
                            <span>Rp 70.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Ayam Goreng Original (x1)</span>
                            <span>Rp 25.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Subtotal</span>
                            <span>Rp 130.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Ongkos Kirim</span>
                            <span>Rp 10.000</span>
                        </div>
                        <div class="total-price">
                            <span>Total</span>
                            <span id="total-price">Rp 140.000</span>
                        </div>

                        <div class="mt-4">
                            <div class="mb-3">
                                <label class="form-label">Kode Promo</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan kode promo">
                                    <button class="btn btn-outline-secondary" type="button">Terapkan</button>
                                </div>
                            </div>
                        </div>

                        <a href="pesan.php" class="btn btn-checkout">Checkout</a>
                        <a href="home.php" class="btn btn-continue">Lanjut Belanja</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Ayam Goreng Joss</h5>
                    <p>Sensasi pedas yang berbeda dengan setiap gigitan. Crispy di luar, juicy di dalam dengan bumbu rahasia yang bikin ketagihan!</p>
                </div>
                <div class="col-md-4">
                    <h5>Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="home.php" class="text-white">Beranda</a></li>
                        <li><a href="home.php#menu" class="text-white">Menu</a></li>
                        <li><a href="cart.php" class="text-white">Keranjang</a></li>
                        <li><a href="profil.php" class="text-white">Profil</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p><i class="bi bi-geo-alt-fill"></i> Jl. Sono Indah Utara Rt.02/05</p>
                    <p><i class="bi bi-telephone-fill"></i> +62 813-8742-1054</p>
                    <p><i class="bi bi-envelope-fill"></i> info@ayamgorengjoss.com</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="mb-0">&copy; 2023 Ayam Goreng Joss. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Update quantity function
        function updateQuantity(id, action) {
            const quantityElement = document.getElementById(`quantity-${id}`);
            let quantity = parseInt(quantityElement.textContent);
            
            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }
            
            quantityElement.textContent = quantity;
            updateTotal();
        }

        // Remove item function
        function removeItem(id) {
            // Find the cart item to be removed
            const cartItem = document.querySelector(`.cart-item:nth-child(${id})`);
            
            // Remove the cart item
            cartItem.remove();
            
            // Check if there are any cart items left
            const cartItems = document.querySelectorAll('.cart-item');
            if (cartItems.length === 0) {
                // Show empty cart message
                document.getElementById('empty-cart').classList.remove('d-none');
            }
            
            updateTotal();
        }

        // Update total price
        function updateTotal() {
            // This would be more complex in a real implementation
            // For now, we'll just simulate a calculation
            console.log('Updating total price...');
        }
    </script>
</body>
</html>
</qodoArtifact>

