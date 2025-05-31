@extends('layouts.app')

@section('title', 'Kontak - Ayam Goreng Joss')

@push('styles')
<style>
    .contact-header {
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        padding: 80px 0;
        color: var(--white);
        text-align: center;
    }

    .contact-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .contact-section {
        padding: 80px 0;
    }

    .contact-card {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        height: 100%;
        text-align: center;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .contact-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--white);
    }

    .contact-form {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-floating {
        margin-bottom: 20px;
    }

    .form-floating .form-control {
        border: 2px solid #E9ECEF;
        border-radius: 15px;
        padding: 20px 15px;
        height: auto;
    }

    .form-floating .form-control:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 0.2rem rgba(255, 68, 68, 0.25);
    }

    .form-floating label {
        color: #666;
        font-weight: 500;
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        height: 400px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    .operating-hours {
        background: var(--light-gray);
        border-radius: 15px;
        padding: 30px;
        margin-top: 30px;
    }

    .hours-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #E9ECEF;
    }

    .hours-item:last-child {
        border-bottom: none;
    }

    .hours-day {
        font-weight: 600;
        color: var(--dark-gray);
    }

    .hours-time {
        color: var(--primary-red);
        font-weight: 600;
    }

    .social-links {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
    }

    .social-link {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-red) 0%, var(--spicy-red) 100%);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 68, 68, 0.3);
        color: var(--white);
    }

    .faq-section {
        background: var(--light-gray);
        padding: 80px 0;
    }

    .faq-item {
        background: var(--white);
        border-radius: 15px;
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .faq-question {
        background: var(--white);
        border: none;
        padding: 20px;
        width: 100%;
        text-align: left;
        font-weight: 600;
        color: var(--dark-gray);
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: var(--light-gray);
    }

    .faq-answer {
        padding: 0 20px 20px;
        color: #666;
        line-height: 1.6;
        display: none;
    }

    .faq-answer.show {
        display: block;
    }

    .faq-icon {
        transition: transform 0.3s ease;
    }

    .faq-question.active .faq-icon {
        transform: rotate(180deg);
    }

    @media (max-width: 768px) {
        .contact-header h1 {
            font-size: 2rem;
        }
        
        .contact-card,
        .contact-form {
            padding: 30px 20px;
        }
        
        .social-links {
            flex-wrap: wrap;
        }
    }
</style>
@endpush

@section('content')
<!-- Contact Header -->
<section class="contact-header">
    <div class="container">
        <h1 data-aos="fade-up">Hubungi Kami</h1>
        <p data-aos="fade-up" data-aos-delay="100">Kami siap melayani Anda dengan sepenuh hati</p>
    </div>
</section>

<!-- Contact Information -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <!-- Contact Cards -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4>Alamat Kami</h4>
                    <p>Jl. Raya Kuliner No. 123<br>Jakarta Selatan, DKI Jakarta<br>12345</p>
                    <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary">
                        <i class="bi bi-map"></i> Lihat di Maps
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h4>Telepon</h4>
                    <p>
                        <strong>Hotline:</strong><br>
                        <a href="tel:+622112345678" class="text-decoration-none">(021) 123-4567</a><br>
                        <strong>WhatsApp:</strong><br>
                        <a href="https://wa.me/6281234567890" class="text-decoration-none">+62 812-3456-7890</a>
                    </p>
                    <a href="tel:+622112345678" class="btn btn-outline-primary">
                        <i class="bi bi-telephone"></i> Telepon Sekarang
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p>
                        <strong>Customer Service:</strong><br>
                        <a href="mailto:info@ayamgorengjoss.com" class="text-decoration-none">info@ayamgorengjoss.com</a><br>
                        <strong>Partnership:</strong><br>
                        <a href="mailto:partnership@ayamgorengjoss.com" class="text-decoration-none">partnership@ayamgorengjoss.com</a>
                    </p>
                    <a href="mailto:info@ayamgorengjoss.com" class="btn btn-outline-primary">
                        <i class="bi bi-envelope"></i> Kirim Email
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Operating Hours -->
        <div class="row mt-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="operating-hours">
                    <h4 class="mb-4">
                        <i class="bi bi-clock text-primary"></i> Jam Operasional
                    </h4>
                    <div class="hours-item">
                        <span class="hours-day">Senin - Jumat</span>
                        <span class="hours-time">10:00 - 22:00</span>
                    </div>
                    <div class="hours-item">
                        <span class="hours-day">Sabtu</span>
                        <span class="hours-time">09:00 - 23:00</span>
                    </div>
                    <div class="hours-item">
                        <span class="hours-day">Minggu</span>
                        <span class="hours-time">09:00 - 23:00</span>
                    </div>
                    <div class="hours-item">
                        <span class="hours-day">Hari Libur Nasional</span>
                        <span class="hours-time">10:00 - 21:00</span>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-link" title="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="social-link" title="WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="#" class="social-link" title="TikTok">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="contact-form">
                    <h4 class="mb-4">
                        <i class="bi bi-chat-dots text-primary"></i> Kirim Pesan
                    </h4>
                    <form id="contactForm">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" required>
                            <label for="name">Nama Lengkap</label>
                        </div>
                        
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>
                        
                        <div class="form-floating">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon">
                            <label for="phone">Nomor Telepon (Opsional)</label>
                        </div>
                        
                        <div class="form-floating">
                            <select class="form-control" id="subject" name="subject" required>
                                <option value="">Pilih Topik</option>
                                <option value="complaint">Keluhan</option>
                                <option value="suggestion">Saran</option>
                                <option value="partnership">Kerjasama</option>
                                <option value="general">Pertanyaan Umum</option>
                                <option value="other">Lainnya</option>
                            </select>
                            <label for="subject">Topik Pesan</label>
                        </div>
                        
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" placeholder="Pesan Anda" style="height: 120px;" required></textarea>
                            <label for="message">Pesan Anda</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-send"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h3 class="text-center mb-4">Lokasi Kami</h3>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613!3d-6.2087634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1635123456789!5m2!1sen!2sid"
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2>Pertanyaan yang Sering Diajukan</h2>
                <p class="text-muted">Temukan jawaban untuk pertanyaan umum tentang Ayam Goreng Joss</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <button class="faq-question" type="button">
                        <span>Berapa lama waktu pengiriman?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        Waktu pengiriman normal adalah 30-45 menit dari konfirmasi pesanan. Pada jam sibuk (12:00-14:00 dan 18:00-20:00), waktu pengiriman bisa mencapai 60 menit.
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <button class="faq-question" type="button">
                        <span>Apakah ada minimum order untuk delivery?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        Ya, minimum order untuk delivery adalah Rp 50.000. Untuk pembelian di bawah jumlah tersebut, Anda bisa melakukan pickup di outlet kami.
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <button class="faq-question" type="button">
                        <span>Bagaimana cara menyesuaikan level kepedasan?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        Kami menyediakan 5 level kepedasan: Level 1 (Tidak Pedas), Level 2 (Sedikit Pedas), Level 3 (Pedas Sedang), Level 4 (Pedas), dan Level 5 (Sangat Pedas). Anda bisa memilih level saat memesan.
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                    <button class="faq-question" type="button">
                        <span>Apakah tersedia menu untuk vegetarian?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        Saat ini kami fokus pada menu ayam goreng, namun kami juga menyediakan beberapa side dish vegetarian seperti nasi, sayuran, dan minuman yang cocok untuk vegetarian.
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                    <button class="faq-question" type="button">
                        <span>Bagaimana cara melakukan pembayaran?</span>
                        <i class="bi bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        Kami menerima pembayaran tunai, kartu debit/kredit, dan berbagai e-wallet seperti GoPay, OVO, DANA, dan ShopeePay. Untuk delivery, pembayaran bisa dilakukan saat pesanan tiba.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // FAQ Toggle
    $('.faq-question').click(function() {
        const $this = $(this);
        const $answer = $this.next('.faq-answer');
        const $icon = $this.find('.faq-icon');
        
        // Close other FAQ items
        $('.faq-question').not($this).removeClass('active');
        $('.faq-answer').not($answer).removeClass('show').slideUp();
        $('.faq-icon').not($icon).css('transform', 'rotate(0deg)');
        
        // Toggle current FAQ item
        $this.toggleClass('active');
        $answer.toggleClass('show').slideToggle();
        
        if ($this.hasClass('active')) {
            $icon.css('transform', 'rotate(180deg)');
        } else {
            $icon.css('transform', 'rotate(0deg)');
        }
    });
    
    // Contact Form Submission
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            subject: $('#subject').val(),
            message: $('#message').val()
        };
        
        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<span class="spinner-border spinner-border-sm" role="status"></span> Mengirim...');
        submitBtn.prop('disabled', true);
        
        // Simulate form submission (replace with actual implementation)
        setTimeout(function() {
            // Reset form
            $('#contactForm')[0].reset();
            
            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);
            
            // Show success message
            showToast('success', 'Pesan Anda berhasil dikirim! Kami akan merespons dalam 1x24 jam.');
            
        }, 2000);
        
        // TODO: Implement actual form submission
        /*
        $.ajax({
            url: '/contact/send',
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#contactForm')[0].reset();
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
                showToast('success', 'Pesan berhasil dikirim!');
            },
            error: function() {
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
                showToast('error', 'Terjadi kesalahan. Silakan coba lagi.');
            }
        });
        */
    });
    
    // Phone number formatting
    $('#phone').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.startsWith('0')) {
            value = value;
        } else if (value.startsWith('62')) {
            value = '0' + value.substring(2);
        }
        $(this).val(value);
    });
});

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
