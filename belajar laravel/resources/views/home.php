
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Goreng Joss - Pedas Nikmat Bergaransi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        :root {
            --spicy-red: #ff3d3d;
            --spicy-red-dark: #e62e2e;
            --spicy-red-light: #ff6b6b;
            --melted-cheese: #ffc234;
            --melted-cheese-dark: #ffb100;
            --melted-cheese-light: #ffd571;
            --white: #ffffff;
            --black: #1a1a1a;
            --gray-light: #f8f9fa;
            --gray-dark: #343a40;
        }

        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            scroll-behavior: smooth;
            background-color: var(--gray-light);
        }

        section {
            position: relative;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--black);
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--spicy-red), var(--melted-cheese));
            border-radius: 2px;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.4s ease;
        }

        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
            margin-right: 10px;
        }

        .navbar-brand span {
            font-weight: 700;
            color: var(--spicy-red);
            font-size: 1.4rem;
        }

        .navbar-brand:hover img {
            transform: rotate(10deg) scale(1.05);
        }

        .nav-link {
            color: var(--black);
            font-weight: 500;
            margin: 0 10px;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--spicy-red);
            background-color: rgba(255, 61, 61, 0.1);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--spicy-red);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .order-button {
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white !important;
            padding: 10px 25px !important;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(255, 61, 61, 0.3);
            transition: all 0.3s ease;
            border: none;
            font-weight: 600;
        }

        .order-button:hover {
            background: linear-gradient(135deg, var(--spicy-red-dark), var(--spicy-red));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 61, 61, 0.4);
        }

        .order-button:active {
            transform: translateY(-1px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--spicy-red) 0%, var(--spicy-red-dark) 100%);
            min-height: 100vh;
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://i.ibb.co/M2BmD3f/pattern-bg.png');
            opacity: 0.1;
            animation: moveBackground 20s linear infinite;
        }

        .hero-text {
            color: white;
            position: relative;
            z-index: 1;
        }

        .animate-character {
            font-size: 4.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #fff, var(--melted-cheese));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
        }

        .hero-text h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--melted-cheese-light);
        }

        .hero-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 90%;
        }

        .hero-buttons {
            margin: 30px 0;
            display: flex;
            gap: 15px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--melted-cheese), var(--melted-cheese-dark));
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            color: var(--black);
            box-shadow: 0 4px 15px rgba(255, 194, 52, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--melted-cheese-dark), var(--melted-cheese));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 194, 52, 0.4);
        }

        .btn-outline-light {
            border: 2px solid white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .features {
            display: flex;
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .feature-item i {
            font-size: 1.5rem;
            color: var(--melted-cheese);
        }

        .hero-image img {
            max-width: 100%;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.3));
        }

        /* Menu Section */
        .menu-section {
            padding: 120px 0;
            background: var(--white);
            position: relative;
        }

        .menu-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom right, var(--spicy-red) 0%, var(--spicy-red) 50%, transparent 50%, transparent 100%);
            transform: translateY(-50px);
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            margin-bottom: 30px;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Menu card decorative corner */
        .menu-card::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            height: 30px;
            background: url('https://i.ibb.co/YjxBJMG/corner-decoration.png') no-repeat center center/contain;
            opacity: 0.7;
            transform: translate(40%, -40%);
            z-index: 1;
        }

        .menu-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .menu-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .menu-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-card:hover .menu-image img {
            transform: scale(1.1);
        }

        .level-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(255, 61, 61, 0.3);
            z-index: 1;
        }

        .menu-content {
            padding: 25px;
            position: relative;
        }

        .menu-content h3 {
            color: var(--black);
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .spicy-meter, .cheese-meter {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .spicy-meter i {
            color: var(--spicy-red);
            margin-right: 5px;
            font-size: 1.2rem;
            animation: pulse 2s infinite;
        }

        .cheese-meter i {
            color: var(--melted-cheese);
            margin-right: 5px;
            font-size: 1.2rem;
            animation: pulse 2s infinite;
        }

        .menu-content p {
            color: var(--gray-dark);
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--spicy-red);
            margin: 20px 0;
            display: inline-block;
            position: relative;
        }

        .price::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--spicy-red), transparent);
        }

        .btn-order {
            width: 100%;
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white;
            border: none;
            padding: 12px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 61, 61, 0.2);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-order::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-order:hover::before {
            left: 100%;
        }

        .btn-order:hover {
            background: linear-gradient(135deg, var(--spicy-red-dark), var(--spicy-red));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 61, 61, 0.3);
        }

        .menu-card.premium {
            border: 2px solid var(--melted-cheese);
            box-shadow: 0 10px 30px rgba(255, 194, 52, 0.15);
        }

        .menu-card.premium::before {
            content: 'PREMIUM';
            position: absolute;
            top: 20px;
            left: -35px;
            background: var(--melted-cheese);
            color: var(--black);
            padding: 5px 40px;
            font-size: 0.7rem;
            font-weight: 700;
            transform: rotate(-45deg);
            z-index: 2;
        }

        /* Promo Section */
        .promo-section {
            padding: 120px 0;
            background: linear-gradient(135deg, var(--spicy-red) 0%, var(--spicy-red-dark) 100%);
            position: relative;
            overflow: hidden;
        }

        .promo-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://i.ibb.co/M2BmD3f/pattern-bg.png');
            opacity: 0.1;
            animation: moveBackground 20s linear infinite;
        }

        .promo-banner {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            color: white;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .promo-banner::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        /* Sauce splatter decoration */
        .sauce-splatter {
            position: absolute;
            width: 150px;
            height: 150px;
            background: url('https://i.ibb.co/YjxBJMG/sauce-splatter.png') no-repeat center center/contain;
            opacity: 0.15;
            z-index: 0;
            transition: all 0.5s ease;
        }

        .hero-image-container:hover .sauce-splatter {
            transform: scale(1.2) rotate(10deg);
            opacity: 0.25;
        }

        .promo-banner::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -75px;
            left: -75px;
        }

        .promo-content {
            position: relative;
            z-index: 1;
        }

        .promo-content h3 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: var(--white);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .promo-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .promo-code {
            display: inline-block;
            background: var(--melted-cheese);
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 800;
            font-size: 1.5rem;
            margin: 25px 0;
            color: var(--black);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .promo-code::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: shine 3s infinite;
        }

        .btn-promo {
            background: white;
            color: var(--spicy-red);
            border: none;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-promo:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            background: var(--gray-light);
        }

        /* Location Section */
        .location-section {
            padding: 120px 0;
            background: var(--white);
            position: relative;
        }

        .location-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom left, var(--spicy-red) 0%, var(--spicy-red) 50%, transparent 50%, transparent 100%);
            transform: translateY(-50px);
        }

        .location-info {
            padding: 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .location-info:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .location-info h3 {
            color: var(--black);
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .location-info h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--spicy-red);
            border-radius: 2px;
        }

        .location-info i {
            color: var(--spicy-red);
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .location-info p {
            margin-bottom: 20px;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }

        .map-container {
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .map-container iframe {
            height: 100%;
            min-height: 350px;
        }

        /* Footer */
        .footer {
            background: var(--black);
            color: white;
            padding: 80px 0 30px;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to top right, var(--black) 0%, var(--black) 50%, transparent 50%, transparent 100%);
            transform: translateY(-49px);
        }

        .footer h4 {
            color: var(--melted-cheese);
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            display: inline-block;
        }

        .footer h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--melted-cheese);
            border-radius: 2px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 12px;
        }

        .footer ul li a {
            color: var(--gray-light);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
        }

        .footer ul li a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--melted-cheese);
            transition: all 0.3s ease;
        }

        .footer ul li a:hover {
            color: var(--melted-cheese);
            transform: translateX(5px);
        }

        .footer ul li a:hover::after {
            width: 100%;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            color: var(--white);
            font-size: 1.5rem;
            margin-right: 20px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .social-links a:hover {
            color: var(--melted-cheese);
            transform: translateY(-5px);
        }

        .footer-bottom {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Animations */
        @keyframes moveBackground {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 100% 100%;
            }
        }

        @keyframes floating {
            0% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(3deg);
            }
            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        @keyframes floating-reverse {
            0% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-15px) rotate(-2deg);
            }
            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        @keyframes floating-side {
            0% {
                transform: translateX(0px) rotate(0deg);
            }
            50% {
                transform: translateX(15px) rotate(2deg);
            }
            100% {
                transform: translateX(0px) rotate(0deg);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes shine {
            0% {
                left: -100%;
            }
            20% {
                left: 100%;
            }
            100% {
                left: 100%;
            }
        }

        .floating {
            animation: floating 5s ease-in-out infinite;
        }

        /* Food Decoration Elements */
        .decoration-chili {
            position: absolute;
            width: 40px;
            height: auto;
            z-index: 1;
            animation: floating 6s ease-in-out infinite;
            filter: drop-shadow(0 3px 5px rgba(0, 0, 0, 0.2));
            transition: all 0.3s ease;
        }

        .decoration-chili:nth-child(even) {
            animation: floating-reverse 7s ease-in-out infinite;
        }

        .decoration-chili:nth-child(3n) {
            animation: floating-side 8s ease-in-out infinite;
        }

        .decoration-chicken {
            position: absolute;
            width: 80px;
            height: auto;
            z-index: 1;
            animation: floating 7s ease-in-out infinite;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.3));
        }

        .decoration-plate {
            position: absolute;
            width: 100px;
            height: auto;
            z-index: 0;
            opacity: 0.8;
            animation: spin 20s linear infinite;
        }

        .decoration-sauce {
            position: absolute;
            width: 30px;
            height: auto;
            z-index: 1;
            animation: floating 8s ease-in-out infinite;
        }

        .section-divider {
            height: 60px;
            width: 100%;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .divider-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://i.ibb.co/HCqK6BM/wave-divider.png') repeat-x;
            background-size: contain;
        }

        .spice-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('https://i.ibb.co/M2BmD3f/pattern-bg.png');
            opacity: 0.05;
            z-index: 0;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-section {
                padding: 120px 0 80px;
                text-align: center;
            }

            .animate-character {
                font-size: 3.5rem;
            }

            .hero-text p {
                max-width: 100%;
            }

            .features {
                justify-content: center;
                flex-wrap: wrap;
            }

            .hero-image {
                margin-top: 50px;
            }

            .menu-card {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0 60px;
            }

            .animate-character {
                font-size: 2.8rem;
            }

            .hero-text h2 {
                font-size: 1.8rem;
            }

            .features {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .feature-item {
                width: 100%;
                justify-content: center;
            }

            .promo-banner {
                padding: 30px;
            }

            .promo-content h3 {
                font-size: 2rem;
            }

            .promo-code {
                font-size: 1.2rem;
                padding: 12px 30px;
            }

            .location-info {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 576px) {
            .animate-character {
                font-size: 2.3rem;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn-primary, .btn-outline-light {
                width: 100%;
            }

            .promo-content h3 {
                font-size: 1.8rem;
            }

            .promo-content p {
                font-size: 1.2rem;
            }

            .promo-code {
                font-size: 1rem;
                padding: 10px 25px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--spicy-red);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--spicy-red-dark);
        }

        /* Cursor customization */
        body {
            cursor: url('https://i.ibb.co/YjxBJMG/chili-cursor.png'), auto;
        }

        a, button, .btn, .nav-link {
            cursor: url('https://i.ibb.co/Jk1Lm1L/chicken-cursor.png'), pointer;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--spicy-red);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            transform: scale(0.8);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
            transform: scale(1);
        }

        .back-to-top:hover {
            background: var(--spicy-red-dark);
            color: white;
            transform: translateY(-5px) scale(1.1);
        }

        .back-to-top::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: var(--spicy-red);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.3;
            animation: pulse 2s infinite;
        }

    </style>
</head>
<body>
    <style>
  

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--spicy-red), var(--melted-cheese));
            border-radius: 2px;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.4s ease;
        }

        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
            margin-right: 10px;
        }

        .navbar-brand span {
            font-weight: 700;
            color: var(--spicy-red);
            font-size: 1.4rem;
        }

        .navbar-brand:hover img {
            transform: rotate(10deg) scale(1.05);
        }

        .nav-link {
            color: var(--black);
            font-weight: 500;
            margin: 0 10px;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--spicy-red);
            background-color: rgba(255, 61, 61, 0.1);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--spicy-red);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 80%;
        }

        .order-button {
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white !important;
            padding: 10px 25px !important;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(255, 61, 61, 0.3);
            transition: all 0.3s ease;
            border: none;
            font-weight: 600;
        }

        .order-button:hover {
            background: linear-gradient(135deg, var(--spicy-red-dark), var(--spicy-red));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 61, 61, 0.4);
        }

        .order-button:active {
            transform: translateY(-1px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--spicy-red) 0%, var(--spicy-red-dark) 100%);
            min-height: 100vh;
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://i.ibb.co/M2BmD3f/pattern-bg.png');
            opacity: 0.1;
            animation: moveBackground 20s linear infinite;
        }

        .hero-text {
            color: white;
            position: relative;
            z-index: 1;
        }

        .animate-character {
            font-size: 4.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #fff, var(--melted-cheese));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            letter-spacing: 1px;
        }

        .hero-text h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--melted-cheese-light);
        }

        .hero-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
            max-width: 90%;
        }

        .hero-buttons {
            margin: 30px 0;
            display: flex;
            gap: 15px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--melted-cheese), var(--melted-cheese-dark));
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            color: var(--black);
            box-shadow: 0 4px 15px rgba(255, 194, 52, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--melted-cheese-dark), var(--melted-cheese));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 194, 52, 0.4);
        }

        .btn-outline-light {
            border: 2px solid white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .features {
            display: flex;
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .feature-item i {
            font-size: 1.5rem;
            color: var(--melted-cheese);
        }

        .hero-image img {
            max-width: 100%;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.3));
        }

        .hero-image-container {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-chicken {
            filter: drop-shadow(0 15px 25px rgba(0, 0, 0, 0.4));
            max-width: 90% !important;
            transform-origin: center center;
            animation: floating 8s ease-in-out infinite;
            transition: transform 0.3s ease;
        }

        .hero-image-container:hover .main-chicken {
            transform: scale(1.05) rotate(5deg);
        }

        .plate-image {
            animation: spin 20s linear infinite;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.2));
        }

        /* Menu Section */
        .menu-section {
            padding: 120px 0;
            background: var(--white);
            position: relative;
        }

        .menu-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom right, var(--spicy-red) 0%, var(--spicy-red) 50%, transparent 50%, transparent 100%);
            transform: translateY(-50px);
        }

        .menu-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            margin-bottom: 30px;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .menu-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .menu-image {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .menu-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .menu-card:hover .menu-image img {
            transform: scale(1.1);
        }

        .level-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(255, 61, 61, 0.3);
            z-index: 1;
        }

        .menu-content {
            padding: 25px;
            position: relative;
        }

        .menu-content h3 {
            color: var(--black);
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .spicy-meter, .cheese-meter {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .spicy-meter i {
            color: var(--spicy-red);
            margin-right: 5px;
            font-size: 1.2rem;
            animation: pulse 2s infinite;
        }

        .cheese-meter i {
            color: var(--melted-cheese);
            margin-right: 5px;
            font-size: 1.2rem;
            animation: pulse 2s infinite;
        }

        .menu-content p {
            color: var(--gray-dark);
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--spicy-red);
            margin: 20px 0;
            display: inline-block;
            position: relative;
        }

        .price::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--spicy-red), transparent);
        }

        .btn-order {
            width: 100%;
            background: linear-gradient(135deg, var(--spicy-red), var(--spicy-red-dark));
            color: white;
            border: none;
            padding: 12px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 61, 61, 0.2);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-order::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-order:hover::before {
            left: 100%;
        }

        .btn-order:hover {
            background: linear-gradient(135deg, var(--spicy-red-dark), var(--spicy-red));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 61, 61, 0.3);
        }

        .menu-card.premium {
            border: 2px solid var(--melted-cheese);
            box-shadow: 0 10px 30px rgba(255, 194, 52, 0.15);
        }

        .menu-card.premium::before {
            content: 'PREMIUM';
            position: absolute;
            top: 20px;
            left: -35px;
            background: var(--melted-cheese);
            color: var(--black);
            padding: 5px 40px;
            font-size: 0.7rem;
            font-weight: 700;
            transform: rotate(-45deg);
            z-index: 2;
        }

        /* Promo Section */
        .promo-section {
            padding: 120px 0;
            background: linear-gradient(135deg, var(--spicy-red) 0%, var(--spicy-red-dark) 100%);
            position: relative;
            overflow: hidden;
        }

        .promo-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://i.ibb.co/M2BmD3f/pattern-bg.png');
            opacity: 0.1;
            animation: moveBackground 20s linear infinite;
        }

        .promo-banner {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            color: white;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .promo-banner::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .promo-banner::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -75px;
            left: -75px;
        }

        .promo-content {
            position: relative;
            z-index: 1;
        }

        .promo-content h3 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: var(--white);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .promo-content p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .promo-code {
            display: inline-block;
            background: var(--melted-cheese);
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 800;
            font-size: 1.5rem;
            margin: 25px 0;
            color: var(--black);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .promo-code::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: shine 3s infinite;
        }

        .btn-promo {
            background: white;
            color: var(--spicy-red);
            border: none;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-promo:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            background: var(--gray-light);
        }

        /* Location Section */
        .location-section {
            padding: 120px 0;
            background: var(--white);
            position: relative;
        }

        .location-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom left, var(--spicy-red) 0%, var(--spicy-red) 50%, transparent 50%, transparent 100%);
            transform: translateY(-50px);
        }

        .location-info {
            padding: 40px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .location-info:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .location-info h3 {
            color: var(--black);
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .location-info h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--spicy-red);
            border-radius: 2px;
        }

        .location-info i {
            color: var(--spicy-red);
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .location-info p {
            margin-bottom: 20px;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
        }

        .map-container {
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .map-container iframe {
            height: 100%;
            min-height: 350px;
        }

        /* Footer */
        .footer {
            background: var(--black);
            color: white;
            padding: 80px 0 30px;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to top right, var(--black) 0%, var(--black) 50%, transparent 50%, transparent 100%);
            transform: translateY(-49px);
        }

        .footer h4 {
            color: var(--melted-cheese);
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
            display: inline-block;
        }

        .footer h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--melted-cheese);
            border-radius: 2px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 12px;
        }

        .footer ul li a {
            color: var(--gray-light);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
        }

        .footer ul li a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--melted-cheese);
            transition: all 0.3s ease;
        }

        .footer ul li a:hover {
            color: var(--melted-cheese);
            transform: translateX(5px);
        }

        .footer ul li a:hover::after {
            width: 100%;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            color: var(--white);
            font-size: 1.5rem;
            margin-right: 20px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .social-links a:hover {
            color: var(--melted-cheese);
            transform: translateY(-5px);
        }

        .footer-bottom {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Animations */
        @keyframes moveBackground {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 100% 100%;
            }
        }

        @keyframes floating {
            0% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(3deg);
            }
            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes shine {
            0% {
                left: -100%;
            }
            20% {
                left: 100%;
            }
            100% {
                left: 100%;
            }
        }

        .floating {
            animation: floating 5s ease-in-out infinite;
        }

        /* Order Section Styles */
        .order-section {
            padding: 100px 0;
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

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-section {
                padding: 120px 0 80px;
                text-align: center;
            }

            .animate-character {
                font-size: 3.5rem;
            }

            .hero-text p {
                max-width: 100%;
            }

            .features {
                justify-content: center;
                flex-wrap: wrap;
            }

            .hero-image {
                margin-top: 50px;
            }

            .menu-card {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0 60px;
            }

            .animate-character {
                font-size: 2.8rem;
            }

            .hero-text h2 {
                font-size: 1.8rem;
            }

            .features {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .feature-item {
                width: 100%;
                justify-content: center;
            }

            .promo-banner {
                padding: 30px;
            }

            .promo-content h3 {
                font-size: 2rem;
            }

            .promo-code {
                font-size: 1.2rem;
                padding: 12px 30px;
            }

            .location-info {
                margin-bottom: 30px;
            }

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
        }

        @media (max-width: 576px) {
            .animate-character {
                font-size: 2.3rem;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn-primary, .btn-outline-light {
                width: 100%;
            }

            .promo-content h3 {
                font-size: 1.8rem;
            }

            .promo-content p {
                font-size: 1.2rem;
            }

            .promo-code {
                font-size: 1rem;
                padding: 10px 25px;
            }
        }
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--spicy-red);
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="gambar/logo.png" alt="Ayam Goreng Joss" height="50">
                <span>Ayam Goreng Joss</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promo">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lokasi">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link order-button" href="pesan.php">Pesan Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <!-- Decorative elements -->
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 120px; left: 10%; transform: rotate(-15deg);">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 200px; right: 15%; transform: rotate(25deg);">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="bottom: 150px; left: 20%; transform: rotate(45deg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-text" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="animate-character">AYAM GORENG JOSS!</h1>
                    <h2>Sensasi Pedas Level Maksimal</h2>
                    <p>Crispy di luar, juicy di dalam dengan bumbu rahasia yang bikin ketagihan! Rasakan sensasi pedas yang berbeda dengan setiap gigitan.</p>
                    <div class="hero-buttons">
                        <a href="#menu" class="btn btn-primary">Lihat Menu</a>
                        <a href="pesan.php" class="btn btn-outline-light">Pesan Sekarang</a>
                    </div>
                    <div class="features">

                        <div class="feature-item">
                            <i class="bi bi-fire"></i>
                            <span>Level Pedas Bervariasi</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-award"></i>
                            <span>Kualitas Premium</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-truck"></i>
                            <span>Gratis Pengiriman</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-image" data-aos="fade-left" data-aos-duration="1000">
                    <div class="hero-image-container">
                        <!-- Main hero image -->
                        <img src="gambar/banner.png" alt="Ayam Goreng Joss" class="floating main-chicken" style="max-width: 100%; position: relative; z-index: 2;">

                        <!-- Plate image underneath -->
                        <img src="https://i.ibb.co/0jz3NPW/plate.png" alt="" class="plate-image" style="position: absolute; bottom: -10%; left: 50%; transform: translateX(-50%); width: 90%; z-index: 1; opacity: 0.8;">

                        <!-- Decorative elements -->
                        <img src="https://i.ibb.co/Jk1Lm1L/fried-chicken.png" alt="" class="decoration-chicken" style="top: 10%; right: 5%; width: 70px; transform: rotate(15deg); animation-delay: 0.5s;">
                        <img src="https://i.ibb.co/Jk1Lm1L/fried-chicken.png" alt="" class="decoration-chicken" style="bottom: 20%; left: 0; width: 60px; transform: rotate(-20deg); animation-delay: 1s;">
                        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 30%; left: 10%; transform: rotate(-30deg); animation-delay: 0.7s;">
                        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="bottom: 25%; right: 10%; transform: rotate(45deg); animation-delay: 1.2s;">

                        <!-- Sauce splatters -->
                        <div class="sauce-splatter" style="top: 40%; right: 15%; transform: rotate(45deg); width: 120px; height: 120px;"></div>
                        <div class="sauce-splatter" style="bottom: 30%; left: 20%; transform: rotate(-30deg); width: 100px; height: 100px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Decorative Divider -->
    <div class="section-divider">
        <div class="divider-wave"></div>
    </div>

    <!-- Menu Section -->
    <section id="menu" class="menu-section">
        <!-- Decorative elements -->
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 120px; left: 5%;">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 180px; right: 5%;">
        <div class="spice-pattern"></div>
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Menu Spesial Kami</h2>
            <div class="row">
                <!-- Menu Item 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="gambar/menu-original.jpg" alt="Ayam Original">
                            <div class="level-badge">Level 1</div>
                        </div>
                        <div class="menu-content">
                            <h3>Ayam Goreng Original</h3>
                            <div class="spicy-meter">
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>

                            </div>
                            <div class="cheese-meter">
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>

                            </div>
                            <p>Ayam goreng renyah dengan bumbu original yang gurih, cocok untuk yang tidak terlalu suka pedas.</p>
                            <div class="price">Rp 25.000</div>
                            <a href="pesan.php?menu=original" class="btn btn-order">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="gambar/ayam-medium.jpg" alt="Ayam Medium Spicy">
                            <div class="level-badge">Level 3</div>
                        </div>
                        <div class="menu-content">
                            <h3>Ayam Goreng Medium Spicy</h3>
                            <div class="spicy-meter">
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                            </div>
                            <div class="cheese-meter">
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle"></i>
                            </div>
                            <p>Ayam goreng dengan tingkat kepedasan sedang, cocok untuk penikmat pedas pemula.</p>
                            <div class="price">Rp 28.000</div>
                            <a href="pesan.php" class="btn btn-order">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="menu-card premium">
                        <div class="menu-image">
                            <img src="gambar/extreme-spicy.jpeg" alt="Ayam Extreme Spicy">
                            <div class="level-badge">Level 5</div>
                        </div>
                        <div class="menu-content">
                            <h3>Ayam Goreng Extreme Spicy</h3>
                            <div class="spicy-meter">
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                            </div>
                            <div class="cheese-meter">
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                            </div>
                            <p>Ayam goreng dengan tingkat kepedasan ekstrim, tantangan bagi pecinta pedas sejati!</p>
                            <div class="price">Rp 35.000</div>
                            <a href="pesan.php" class="btn btn-order">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="gambar/ayam-cheese1.webp" alt="Ayam Cheese Explosion">
                            <div class="level-badge">Level 2</div>
                        </div>
                        <div class="menu-content">
                            <h3>Ayam Cheese Explosion</h3>
                            <div class="spicy-meter">
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                            </div>
                            <div class="cheese-meter">
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                            </div>
                            <p>Ayam goreng dengan saus keju meleleh yang creamy dan lezat, sedikit pedas.</p>
                            <div class="price">Rp 32.000</div>
                            <a href="pesan.php?menu=cheese" class="btn btn-order">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 5 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="menu-card">
                        <div class="menu-image">
                            <img src="gambar/ayambbq.webp" alt="Ayam BBQ Spicy">
                            <div class="level-badge">Level 3</div>
                        </div>
                        <div class="menu-content">
                            <h3>Ayam BBQ Spicy</h3>
                            <div class="spicy-meter">
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                            </div>
                            <div class="cheese-meter">
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle"></i>
                                <i class="bi bi-circle"></i>
                            </div>
                            <p>Ayam goreng dengan saus BBQ pedas yang smoky dan menggugah selera.</p>
                            <div class="price">Rp 30.000</div>
                            <a href="pesan.php?menu=bbq" class="btn btn-order">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- Menu Item 6 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="menu-card premium">
                        <div class="menu-image">
                            <img src="gambar/ayamsambal.jpeg" alt="Ayam Sambal Matah">
                            <div class="level-badge">Level 4</div>
                        </div>
                        <div class="menu-content">
                            <h3>Ayam Sambal Matah</h3>
                            <div class="spicy-meter">
                                <i class="bi bi-fire-fill"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                                <i class="bi bi-fire"></i>
                            </div>
                            <div class="cheese-meter">
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                                <i class="bi bi-circle-fill"></i>
                            </div>
                            <p>Ayam goreng dengan sambal matah khas Bali yang segar dan pedas.</p>
                            <div class="price">Rp 33.000</div>
                            <a href="cart.php" class="btn btn-order">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Decorative Divider -->
    <div class="section-divider">
        <div class="divider-wave" style="transform: rotate(180deg);"></div>
    </div>

    <!-- Promo Section -->
    <section id="promo" class="promo-section">
        <!-- Decorative elements -->
        <img src="https://i.ibb.co/Jk1Lm1L/fried-chicken.png" alt="" class="decoration-chicken" style="top: 15%; left: 8%; width: 60px;">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="bottom: 20%; right: 10%;">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 25%; right: 15%;">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="bottom: 30%; left: 12%;">
        <div class="spice-pattern"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="zoom-in">
                    <div class="promo-banner">
                        <!-- Decorative sauce splatters -->
                    <div class="sauce-splatter" style="top: -30px; left: 10%; transform: rotate(45deg);"></div>
                    <div class="sauce-splatter" style="bottom: -20px; right: 15%; transform: rotate(-30deg);"></div>
                    <div class="sauce-splatter" style="top: 50%; left: -50px; transform: rotate(15deg);"></div>
                    <div class="promo-content">
                            <h3>PROMO SPESIAL MINGGU INI!</h3>
                            <p>Beli 2 Ayam Goreng Extreme Spicy, Gratis 1 Minuman Segar</p>
                            <div class="promo-code">JOSSEXTREME</div>
                            <p>Berlaku hingga 30 November 2023</p>
                            <a href="pesan.php?promo=JOSSEXTREME" class="btn btn-promo">Klaim Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Decorative Divider -->
    <div class="section-divider">
        <div class="divider-wave"></div>
    </div>

    <!-- Location Section -->
    <section id="lokasi" class="location-section">
        <!-- Decorative elements -->
        <img src="https://i.ibb.co/Jk1Lm1L/fried-chicken.png" alt="" class="decoration-chicken" style="top: 120px; right: 8%; width: 60px;">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="bottom: 15%; left: 5%;">
        <div class="spice-pattern"></div>
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Lokasi Kami</h2>
            <div class="row">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="location-info">
                        <h3>Ayam Goreng Joss - Cabang Utama</h3>
                        <p><i class="bi bi-geo-alt-fill"></i> Jl. Sono Indah Utara Rt.02/05</p>
                        <p><i class="bi bi-telephone-fill"></i> +62 813-8742-1054</p>
                        <p><i class="bi bi-envelope-fill"></i> info@ayamgorengjoss.com</p>
                        <p><i class="bi bi-clock-fill"></i> Buka Setiap Hari: 10.00 - 22.00 WIB</p>
                        <p><i class="bi bi-instagram"></i> @ayamgorengjoss</p>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.29279019987!2d106.7588023!3d-6.2295712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1699000000000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <!-- Decorative elements -->
        <img src="https://i.ibb.co/Jk1Lm1L/fried-chicken.png" alt="" class="decoration-chicken" style="top: 80px; right: 5%; width: 50px; opacity: 0.5;">
        <img src="https://i.ibb.co/YjxBJMG/chili.png" alt="" class="decoration-chili" style="top: 150px; left: 8%; opacity: 0.5;">
        <div class="spice-pattern"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h4>Ayam Goreng Joss</h4>
                    <p>Sensasi pedas yang berbeda dengan setiap gigitan. Crispy di luar, juicy di dalam dengan bumbu rahasia yang bikin ketagihan!</p>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h4>Tautan</h4>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#promo">Promo</a></li>
                        <li><a href="#lokasi">Lokasi</a></li>
                        <li><a href="pesan.php">Pesan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4>Kontak</h4>
                    <ul>
                        <li><a href="tel:+6281234567890">+62 812-3456-7890</a></li>
                        <li><a href="mailto:info@ayamgorengjoss.com">info@ayamgorengjoss.com</a></li>
                        <li><a href="#">Jl. Pedas Mantap No. 123, Jakarta Selatan</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4>Jam Operasional</h4>
                    <ul>
                        <li>Senin - Jumat: 10.00 - 22.00</li>
                        <li>Sabtu - Minggu: 09.00 - 23.00</li>
                        <li>Hari Libur: 09.00 - 23.00</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Ayam Goreng Joss. All Rights Reserved. Developed with GUMILANG TIRTHA <i class="bi bi-heart-fill text-danger"></i> by Joss Team.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top" id="backToTop">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init();

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Back to top button
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });

        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>
