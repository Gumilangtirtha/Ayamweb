@extends('layouts.app')

@section('title', 'Daftar - Ayam Goreng Joss')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg" data-aos="fade-up">
                <div class="card-header text-center">
                    <h3 class="mb-0">
                        <i class="bi bi-person-plus"></i>
                        Bergabung dengan Kami
                    </h3>
                    <p class="mb-0 mt-2 opacity-75">Daftar sekarang dan nikmati kelezatan Ayam Goreng Joss!</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('customer.register') }}" method="POST" id="registerForm">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="bi bi-person"></i> Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Masukkan nama lengkap Anda"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i> Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Masukkan email Anda"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="bi bi-info-circle"></i> Email akan digunakan untuk login dan notifikasi pesanan
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="bi bi-telephone"></i> Nomor Telepon
                            </label>
                            <input type="tel" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="Contoh: 08123456789">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">
                                <i class="bi bi-geo-alt"></i> Alamat
                            </label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" 
                                      name="address" 
                                      rows="3" 
                                      placeholder="Masukkan alamat lengkap Anda (opsional)">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock"></i> Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Minimal 6 karakter"
                                       required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            <!-- Password Strength Indicator -->
                            <div class="mt-2">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted" id="passwordStrengthText">Kekuatan password</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi bi-lock-fill"></i> Konfirmasi Password <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder="Ulangi password Anda"
                                       required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                    <i class="bi bi-eye" id="toggleIconConfirm"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="invalid-feedback" id="passwordMismatch" style="display: none;">
                                Password tidak cocok
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                Saya setuju dengan <a href="#" class="text-decoration-none">Syarat & Ketentuan</a> 
                                dan <a href="#" class="text-decoration-none">Kebijakan Privasi</a> <span class="text-danger">*</span>
                            </label>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-loading" id="submitBtn">
                                <i class="bi bi-person-plus"></i> Daftar Sekarang
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="mb-0">
                                Sudah punya akun? 
                                <a href="{{ route('customer.login') }}" class="text-decoration-none fw-bold">
                                    Masuk di sini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="row mt-4">
                <div class="col-md-4 text-center mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-3">
                        <i class="bi bi-gift text-primary" style="font-size: 2rem;"></i>
                        <h6 class="mt-2 mb-1">Promo Eksklusif</h6>
                        <small class="text-muted">Dapatkan promo khusus member</small>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-3">
                        <i class="bi bi-clock-history text-success" style="font-size: 2rem;"></i>
                        <h6 class="mt-2 mb-1">Riwayat Pesanan</h6>
                        <small class="text-muted">Lacak semua pesanan Anda</small>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-3">
                        <i class="bi bi-star text-warning" style="font-size: 2rem;"></i>
                        <h6 class="mt-2 mb-1">Poin Reward</h6>
                        <small class="text-muted">Kumpulkan poin setiap pembelian</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle password visibility
    $('#togglePassword').click(function() {
        const passwordField = $('#password');
        const toggleIcon = $('#toggleIcon');
        
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            toggleIcon.removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            toggleIcon.removeClass('bi-eye-slash').addClass('bi-eye');
        }
    });

    $('#togglePasswordConfirm').click(function() {
        const passwordField = $('#password_confirmation');
        const toggleIcon = $('#toggleIconConfirm');
        
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            toggleIcon.removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            toggleIcon.removeClass('bi-eye-slash').addClass('bi-eye');
        }
    });

    // Password strength checker
    $('#password').on('input', function() {
        const password = $(this).val();
        const strength = checkPasswordStrength(password);
        
        $('#passwordStrength').removeClass('bg-danger bg-warning bg-success')
                              .css('width', strength.percentage + '%')
                              .addClass(strength.class);
        $('#passwordStrengthText').text(strength.text);
    });

    // Password confirmation checker
    $('#password_confirmation').on('input', function() {
        const password = $('#password').val();
        const confirmation = $(this).val();
        
        if (confirmation && password !== confirmation) {
            $(this).addClass('is-invalid');
            $('#passwordMismatch').show();
        } else {
            $(this).removeClass('is-invalid');
            $('#passwordMismatch').hide();
        }
    });

    // Form validation
    $('#registerForm').on('submit', function(e) {
        const password = $('#password').val();
        const confirmation = $('#password_confirmation').val();
        const terms = $('#terms').is(':checked');
        
        if (password !== confirmation) {
            e.preventDefault();
            $('#password_confirmation').addClass('is-invalid');
            $('#passwordMismatch').show();
        }
        
        if (!terms) {
            e.preventDefault();
            $('#terms').addClass('is-invalid');
        }
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

    function checkPasswordStrength(password) {
        let strength = 0;
        let text = 'Sangat Lemah';
        let className = 'bg-danger';
        
        if (password.length >= 6) strength += 20;
        if (password.length >= 8) strength += 20;
        if (/[a-z]/.test(password)) strength += 20;
        if (/[A-Z]/.test(password)) strength += 20;
        if (/[0-9]/.test(password)) strength += 10;
        if (/[^A-Za-z0-9]/.test(password)) strength += 10;
        
        if (strength >= 80) {
            text = 'Sangat Kuat';
            className = 'bg-success';
        } else if (strength >= 60) {
            text = 'Kuat';
            className = 'bg-success';
        } else if (strength >= 40) {
            text = 'Sedang';
            className = 'bg-warning';
        } else if (strength >= 20) {
            text = 'Lemah';
            className = 'bg-warning';
        }
        
        return {
            percentage: strength,
            text: text,
            class: className
        };
    }
});
</script>
@endpush
