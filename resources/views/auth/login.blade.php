@extends('layouts.guest')

@section('content')
<!-- Bootstrap 5 (if not already added) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Font: Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    :root {
        --main-blue: #1d3557;
        --main-red: #e63946;
        --main-white: #fff;
        --main-light-blue: #e3eafc;
        --main-light-red: #fde7eb;
        --main-gray: #f1f3f5;
        --main-dark: #22223b;
    }
    body, .login-card, .form-label, .form-control, .form-check-label, .form-text, .form-link, h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto', sans-serif;
    }
    .login-bg {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--main-red) 0%, var(--main-blue) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-card {
        background: rgba(255,255,255,0.75);
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        padding: 2.5rem 2rem 2rem 2rem;
        max-width: 420px;
        width: 100%;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    .login-logo {
        width: 4.5rem;
        height: 4.5rem;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(29,53,87,0.13);
        margin-bottom: 1.2rem;
    }
    .login-title {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
        letter-spacing: 0.03em;
    }
    .form-label {
        color: var(--main-blue);
        font-weight: 600;
    }
    .form-control {
        border: 1.5px solid var(--main-blue);
        border-radius: 0.5rem;
        font-size: 1.05rem;
        background: var(--main-light-blue);
        color: var(--main-dark);
    }
    .form-control:focus {
        border-color: var(--main-red);
        box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
    }
    .form-link {
        color: var(--main-blue);
        font-weight: 500;
        text-decoration: none;
        transition: color 0.2s;
    }
    .form-link:hover {
        color: var(--main-red);
        text-decoration: underline;
    }
    .btn-login {
        background: var(--main-blue);
        border-color: var(--main-blue);
        color: var(--main-white);
        font-weight: 700;
        border-radius: 0.5rem;
        transition: background 0.2s, border 0.2s;
    }
    .btn-login:hover {
        background: var(--main-red);
        border-color: var(--main-red);
    }
    .show-password-toggle {
        cursor: pointer;
        color: var(--main-blue);
        font-size: 1.1em;
        margin-left: 0.5rem;
        vertical-align: middle;
        user-select: none;
    }
    .alert-success {
        background: var(--main-light-blue);
        color: var(--main-blue);
        border:1.5px solid var(--main-blue);
        font-weight:600;
    }
    .alert-danger, .alert-error {
        background: var(--main-light-red);
        color: var(--main-red);
        border:1.5px solid var(--main-red);
        font-weight:600;
    }
</style>
<div class="login-bg">
    <div class="login-card mx-auto">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="login-logo mx-auto d-block">
            </a>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-3">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->has('recaptcha'))
            <div class="alert alert-danger mb-3">
                {{ $errors->first('recaptcha') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" id="login-form" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" required autofocus class="form-control rounded-3" placeholder="Enter your email">
            </div>
            <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" required class="form-control rounded-3" placeholder="Enter your password">
            </div>
            <div class="mb-2">
                <div class="form-check">
                    <input type="checkbox" id="showPasswordToggle" class="form-check-input">
                    <label for="showPasswordToggle" class="form-check-label" style="color:var(--main-blue);font-weight:500;">Show Password</label>
                </div>
            </div>
            <div class="mb-3 text-center">
                @if (Route::has('password.request'))
                    <a class="form-link" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </div>
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-login btn-lg" id="loginSubmitBtn">
                    <span id="loginBtnText">Log in</span>
                    <span id="loginBtnSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
                    <span id="loginBtnLoadingLabel" class="d-none ms-2">Logging in...</span>
                </button>
            </div>
        </form>
        <script src="https://www.google.com/recaptcha/api.js?render=6Lc77H0rAAAAAJaRPdD76JEjf4Xghkga2BXw3cDr"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.getElementById('login-form');
                form.addEventListener('submit', function(e) {
                    var btn = document.getElementById('loginSubmitBtn');
                    var spinner = document.getElementById('loginBtnSpinner');
                    var text = document.getElementById('loginBtnText');
                    var loadingLabel = document.getElementById('loginBtnLoadingLabel');
                    btn.disabled = true;
                    spinner.classList.remove('d-none');
                    text.classList.add('d-none');
                    loadingLabel.classList.remove('d-none');
                    e.preventDefault();
                    grecaptcha.ready(function() {
                        grecaptcha.execute('6Lc77H0rAAAAAJaRPdD76JEjf4Xghkga2BXw3cDr', {action: 'login'}).then(function(token) {
                            document.getElementById('g-recaptcha-response').value = token;
                            form.submit();
                        });
                    });
                });
                // Show password toggle
                var showPasswordToggle = document.getElementById('showPasswordToggle');
                var passwordInput = document.getElementById('password');
                showPasswordToggle.addEventListener('change', function() {
                    if (this.checked) {
                        passwordInput.type = 'text';
                    } else {
                        passwordInput.type = 'password';
                    }
                });
            });
        </script>
    </div>
</div>
@endsection
