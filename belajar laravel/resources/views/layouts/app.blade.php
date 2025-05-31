<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Ayam Goreng Joss - Pedas Nikmat Bergaransi')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

    <style>
        :root {
            --primary-red: #FF4444;
            --spicy-red: #FF6B35;
            --golden-yellow: #FFD700;
            --warm-orange: #FF8C42;
            --dark-brown: #8B4513;
            --cream-white: #FFF8DC;
            --white: #FFFFFF;
            --dark-gray: #2C2C2C;
            --light-gray: #F8F9FA;
            --success-green: #28A745;
            --danger-red: #DC3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--dark-gray);
            background-color: var(--light-gray);
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
            box-shadow: 0 4px 20px rgba(255, 68, 68, 0.3);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--white) !important;
            text-decoration: none;
        }

        .navbar-brand img {
            margin-right: 10px;
            border-radius: 50%;
            border: 3px solid var(--golden-yellow);
        }

        .navbar-nav .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            margin: 0 10px;
            padding: 8px 16px !important;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            background-color: var(--golden-yellow);
            color: var(--dark-gray) !important;
        }

        /* Cart Badge */
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--golden-yellow);
            color: var(--dark-gray);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 68, 68, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 68, 68, 0.4);
            background: linear-gradient(135deg, var(--spicy-red) 0%, var(--primary-red) 100%);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-green) 0%, #20C997 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--golden-yellow) 0%, var(--warm-orange) 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            color: var(--dark-gray);
            transition: all 0.3s ease;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-red) 0%, #C82333 100%);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 15px;
            padding: 15px 20px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1) 0%, rgba(32, 201, 151, 0.1) 100%);
            color: var(--success-green);
            border-left: 4px solid var(--success-green);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(200, 35, 51, 0.1) 100%);
            color: var(--danger-red);
            border-left: 4px solid var(--danger-red);
        }

        .alert-warning {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 140, 66, 0.1) 100%);
            color: var(--warm-orange);
            border-left: 4px solid var(--warm-orange);
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
            color: var(--white);
            border: none;
            padding: 20px;
            font-weight: 600;
        }

        /* Form Styles */
        .form-control {
            border: 2px solid #E9ECEF;
            border-radius: 15px;
            padding: 12px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 0 0.2rem rgba(255, 68, 68, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 8px;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--dark-gray) 0%, #1a1a1a 100%);
            color: var(--white);
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        /* Loading Spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-red);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--spicy-red);
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Ayam Goreng Joss" height="50">
                <span>Ayam Goreng Joss</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu*') ? 'active' : '' }}" href="{{ url('/menu') }}">
                            <i class="bi bi-grid"></i> Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cart*') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                            <i class="bi bi-cart3"></i> Keranjang
                            <span class="cart-badge" id="cart-count">0</span>
                        </a>
                    </li>

                    @if(Session::has('customer'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Session::get('customer.name') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-clock-history"></i> Riwayat Pesanan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('customer.logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login*') ? 'active' : '' }}" href="{{ route('customer.login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register*') ? 'active' : '' }}" href="{{ route('customer.register') }}">
                                <i class="bi bi-person-plus"></i> Daftar
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 100px; min-height: calc(100vh - 200px);">
        <!-- Flash Messages -->
        @if(Session::has('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @if(Session::has('warning'))
            <div class="container mt-3">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> {{ Session::get('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-warning mb-3">Ayam Goreng Joss</h5>
                    <p>Pedas nikmat bergaransi! Nikmati kelezatan ayam goreng dengan berbagai level kepedasan yang menggugah selera.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-warning mb-3">Kontak</h5>
                    <p><i class="bi bi-geo-alt"></i> Jl. Raya Kuliner No. 123, Jakarta</p>
                    <p><i class="bi bi-telephone"></i> (021) 123-4567</p>
                    <p><i class="bi bi-envelope"></i> info@ayamgorengjoss.com</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-warning mb-3">Jam Operasional</h5>
                    <p>Senin - Jumat: 10:00 - 22:00</p>
                    <p>Sabtu - Minggu: 09:00 - 23:00</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} Ayam Goreng Joss. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Update cart count on page load
        $(document).ready(function() {
            updateCartCount();
        });

        // Function to update cart count
        function updateCartCount() {
            $.get('/cart/count', function(data) {
                $('#cart-count').text(data.count);
                if (data.count > 0) {
                    $('#cart-count').show();
                } else {
                    $('#cart-count').hide();
                }
            }).fail(function() {
                $('#cart-count').text('0').hide();
            });
        }

        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);

        // Add loading state to buttons
        $(document).on('click', '.btn-loading', function() {
            var btn = $(this);
            var originalText = btn.html();
            btn.html('<span class="spinner-border spinner-border-sm" role="status"></span> Loading...');
            btn.prop('disabled', true);

            setTimeout(function() {
                btn.html(originalText);
                btn.prop('disabled', false);
            }, 2000);
        });
    </script>

    @stack('scripts')
</body>
</html>
