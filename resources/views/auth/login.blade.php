@extends('layouts')

@section('content')
    <div class="container-fluid bg-success d-flex align-items-center justify-content-center mt-5 py-5 py-md-0"
        style="min-height: 100vh;">
        <div class="card shadow-md w-100" style="max-width: 420px;">
            <div class="card-body p-4 p-md-5">
                <h3 class="text-center mb-4 fw-semibold">Login</h3>

                {{-- ✅ Display validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" required
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-success btn-lg">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            togglePassword.addEventListener('click', function() {
                // Toggle the password field type
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle the eye icon
                if (type === 'text') {
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            });
        });
    </script>

    <style>
        .input-group .btn {
            border-left: 0;
            border-color: #ced4da;
        }

        .input-group .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .input-group .btn:focus {
            box-shadow: none;
        }

        /* Ensure proper border radius when there's an error */
        .input-group .form-control.is-invalid {
            border-right: 1px solid #dc3545;
        }
    </style>
@endsection
