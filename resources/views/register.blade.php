<x-layouts.app>
    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Input fields */
        input.form-control {
            border: none;
            border-bottom: 2px solid #e5e7eb;
            border-radius: 0;
            padding: .75rem .9rem;
            box-shadow: none;
            transition: border-color 0.3s ease;
        }
        input.form-control:focus {
            border-color: #8B2D2D; /* burgundy focus */
            outline: none;
            box-shadow: none;
        }

        /* Burgundy button */
        .btn-burgundy {
            background: linear-gradient(135deg, #8B2D2D, #742626);
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-burgundy:hover {
            background: linear-gradient(135deg, #a13636, #8B2D2D);
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.25);
            color: #fff;
        }

        /* Card container */
        .auth-card {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .auth-title { color: #8B2D2D; }
    </style>

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="row w-100 auth-card" style="max-width: 960px;">

            <!-- Left illustration -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center p-4" style="background:#8B2D2D;">
                <img src="{{ asset('images/image.png') }}"
                     alt="Illustration"
                     class="img-fluid rounded"
                     style="max-height: 400px;">
            </div>

            <!-- Right register form -->
            <div class="col-12 col-lg-6 bg-white p-5 d-flex flex-column justify-content-center">
                <h1 class="h2 fw-bold mb-4 text-center text-uppercase auth-title">Register</h1>

                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <!-- Name -->
                    <div class="form-group mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                   required autofocus
                                   class="form-control rounded-start @error('name') is-invalid @enderror"
                                   placeholder="Juan Dela Cruz">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-person"></i>
                            </span>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   required
                                   class="form-control rounded-start @error('email') is-invalid @enderror"
                                   placeholder="johndoe@email.com">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-envelope"></i>
                            </span>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input id="password" type="password" name="password"
                                   required
                                   class="form-control rounded-start @error('password') is-invalid @enderror"
                                   placeholder="••••••••">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-lock"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   required
                                   class="form-control rounded-start"
                                   placeholder="••••••••">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-shield-check"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="1" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#" class="text-decoration-underline" style="color:#8B2D2D;">Terms</a> and
                            <a href="#" class="text-decoration-underline" style="color:#8B2D2D;">Privacy Policy</a>.
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-burgundy btn-lg fw-semibold rounded-pill">
                            Create Account
                        </button>
                        <p class="mt-3 text-center">
                            Already have an account?
                            <a href="{{route('login.view')}}" class="text-decoration-none" style="color:#8B2D2D;">
                                Sign in
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
