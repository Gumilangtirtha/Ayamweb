@extends('layouts.app')

@section('title', 'Login - Ayam Goreng Joss')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg" data-aos="fade-up">
                <div class="card-header text-center">
                    <h3 class="mb-0">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk ke Akun Anda
                    </h3>
                    <p class="mb-0 mt-2 opacity-75">Selamat datang kembali di Ayam Goreng Joss!</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('customer.login') }}" method="POST" id="loginForm">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i> Email
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
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock"></i> Password
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Masukkan password Anda"
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
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-loading">
                                <i class="bi bi-box-arrow-in-right"></i> Masuk
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="mb-2">
                                <a href="#" class="text-decoration-none">Lupa password?</a>
                            </p>
                            <p class="mb-0">
                                Belum punya akun? 
                                <a href="{{ route('customer.register') }}" class="text-decoration-none fw-bold">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Features Section -->
            <div class="row mt-4">
                <div class="col-4 text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-3">
                        <i class="bi bi-shield-check text-success" style="font-size: 2rem;"></i>
                        <h6 class="mt-2 mb-0">Aman</h6>
                        <small class="text-muted">Data terlindungi</small>
                    </div>
                </div>
                <div class="col-4 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-3">
                        <i class="bi bi-lightning text-warning" style="font-size: 2rem;"></i>
                        <h6 class="mt-2 mb-0">Cepat</h6>
                        <small class="text-muted">Pesan dengan mudah</small>
                    </div>
                </div>
                <div class="col-4 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-3">
                        <i class="bi bi-heart text-danger" style="font-size: 2rem;"></i>
                        <h6 class="mt-2 mb-0">Favorit</h6>
                        <small class="text-muted">Simpan pesanan</small>
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

    // Form validation
    $('#loginForm').on('submit', function(e) {
        const email = $('#email').val();
        const password = $('#password').val();
        
        if (!email || !password) {
            e.preventDefault();
            
            if (!email) {
                $('#email').addClass('is-invalid');
                if (!$('#email').next('.invalid-feedback').length) {
                    $('#email').after('<div class="invalid-feedback">Email harus diisi</div>');
                }
            }
            
            if (!password) {
                $('#password').addClass('is-invalid');
                if (!$('#password').next('.invalid-feedback').length) {
                    $('#password').after('<div class="invalid-feedback">Password harus diisi</div>');
                }
            }
        }
    });

    // Remove validation errors on input
    $('#email, #password').on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').remove();
    });

    // Auto focus on email field
    $('#email').focus();
});
</script>
@endpush
