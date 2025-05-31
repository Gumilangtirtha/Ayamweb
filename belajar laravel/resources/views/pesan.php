<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Ayam Goreng Joss - Pedas Nikmat Bergaransi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
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

        /* Order Section Styles */
        .order-section {
            padding: 100px 0;
        }

        .section-title {
            color: var(--black);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }

        .order-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .menu-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .menu-info {
            flex-grow: 1;
        }

        .menu-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .menu-price {
            color: var(--spicy-red);
            font-weight: 700;
            font-size: 1.1rem;
        }

        .spicy-level {
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 10px 0;
        }

        .spicy-level i {
            color: var(--spicy-red);
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

        .form-label {
            font-weight: 600;
            color: var(--black);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: var(--spicy-red);
            box-shadow: 0 0 0 0.2rem rgba(255, 61, 61, 0.25);
        }

        .btn-order {
            background: var(--spicy-red);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-order:hover {
            background: var(--spicy-red-dark);
            transform: translateY(-2px);
        }

        .order-summary {
            position: sticky;
            top: 100px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--spicy-red);
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px dashed #eee;
        }

        /* Payment Method Styles */
        .payment-method {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .payment-option {
            flex: 1;
            text-align: center;
            padding: 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover,
        .payment-option.active {
            border-color: var(--spicy-red);
            background: rgba(255, 61, 61, 0.05);
        }

        .payment-option i {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--spicy-red);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .order-section {
                padding: 60px 0;
            }

            .menu-item {
                flex-direction: column;
                text-align: center;
            }

            .menu-item img {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .payment-method {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://images.unsplash.com/photo-1542488246-1025045f7134?w=200" alt="Ayam Goreng Joss">
                <a
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
                        <a class="nav-link" href="index.php#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pesan.php">Pesan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Order Section -->
    <section class="order-section">
        <div class="container">
            <h1 class="section-title">Pesan Sekarang</h1>
            
            <div class="row">
                <!-- Menu Selection -->
                <div class="col-lg-8">
                    <div class="order-card">
                        <h3 class="mb-4">Pilih Menu</h3>
                        
                        <!-- Menu Item 1 -->
                        <div class="menu-item">
                            <img src="https://images.unsplash.com/photo-1626645738196-c2a7c87a8f58?w=400" alt="Ayam Goreng Original">
                            <div class="menu-info">
                                <h4 class="menu-title">Ayam Goreng Original</h4>
                                <div class="spicy-level">
                                    Level Pedas: 
                                    <select class="form-select form-select-sm" style="width: 100px">
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                    </select>
                                </div>
                                <div class="menu-price">Rp 25.000</div>
                            </div>
                            <div class="quantity-control">
                                <button class="quantity-btn">-</button>
                                <span>0</span>
                                <button class="quantity-btn">+</button>
                            </div>
                        </div>

                        <!-- Menu Item 2 -->
                        <div class="menu-item">
                            <img src="https://images.unsplash.com/photo-1626645738196-c2a7c87a8f58?w=400" alt="Ayam Keju Leleh">
                            <div class="menu-info">
                                <h4 class="menu-title">Ayam Keju Leleh</h4>
                                <div class="spicy-level">
                                    Level Pedas: 
                                    <select class="form-select form-select-sm" style="width: 100px">
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                    </select>
                                </div>
                                <div class="menu-price">Rp 35.000</div>
                            </div>
                            <div class="quantity-control">
                                <button class="quantity-btn">-</button>
                                <span>0</span>
                                <button class="quantity-btn">+</button>
                            </div>
                        </div>

                        <!-- Menu Item 3 -->
                        <div class="menu-item">
                            <img src="https://images.unsplash.com/photo-1626645738196-c2a7c87a8f58?w=400" alt="Combo Spesial">
                            <div class="menu-info">
                                <h4 class="menu-title">Combo Spesial</h4>
                                <div class="spicy-level">
                                    Level Pedas: 
                                    <select class="form-select form-select-sm" style="width: 100px">
                                        <option value="1">Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                        <option value="5">Level 5</option>
                                    </select>
                                </div>
                                <div class="menu-price">Rp 45.000</div>
                            </div>
                            <div class="quantity-control">
                                <button class="quantity-btn">-</button>
                                <span>0</span>
                                <button class="quantity-btn"><a href="home.php">Kembali</a></button>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div class="order-card">
                        <h3 class="mb-4">Informasi Pemesan</h3>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Pengiriman</label>
                                <textarea class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="order-card order-summary">
                        <h3 class="mb-4">Ringkasan Pesanan</h3>
                        <div class="summary-item">
                            <span>Ayam Goreng Original x2</span>
                            <span>Rp 50.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Ayam Keju Leleh x1</span>
                            <span>Rp 35.000</span>
                        </div>
                        <div class="summary-item">
                            <span>Ongkos Kirim</span>
                            <span>Rp 10.000</span>
                        </div>
                        <div class="total-price">
                            <span>Total</span>
                            <span>Rp 95.000</span>
                        </div>

                        <div class="mt-4">
                            <h4 class="mb-3">Metode Pembayaran</h4>
                            <div class="payment-method">
                                <div class="payment-option active">
                                    <i class="bi bi-cash"></i>
                                    <div>Tunai</div>
                                </div>
                                <div class="payment-option">
                                    <i class="bi bi-credit-card"></i>
                                    <div>Transfer</div>
                                </div>
                                <div class="payment-option">
                                    <i class="bi bi-wallet2"></i>
                                    <div>E-Wallet</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-order mt-4">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Quantity Control
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const span = this.parentElement.querySelector('span');
                let quantity = parseInt(span.textContent);
                
                if (this.textContent === '+') {
                    quantity++;
                } else if (this.textContent === '-' && quantity > 0) {
                    quantity--;
                }
                
                span.textContent = quantity;
                updateTotal();
            });
        });

        // Payment Method Selection
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Update Total (simplified version)
        function updateTotal() {
            // Add your total calculation logic here
            console.log('Updating total...');
        }
    </script>
</body>
</html>