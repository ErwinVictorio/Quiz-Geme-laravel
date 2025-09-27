<x-layouts.app>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

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
            border-color: #8B2D2D;
            /* burgundy focus */
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
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            color: #fff;
        }

        /* Card container */
        .login-card {
            background-color: #8B2D2D;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .login-title {
            color: #8B2D2D;
        }
    </style>

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="row w-100 login-card" style="max-width: 960px;">

            <!-- Left illustration -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center p-4"
                style="background: #8B2D2D;">
                <img src="{{ asset('images/image.png') }}" alt="Illustration" class="img-fluid rounded"
                    style="max-height: 400px;">
            </div>

            <!-- Right login form -->
            <div class="col-12 col-lg-6 bg-white p-5 d-flex flex-column justify-content-center">
                <h1 class="h2 fw-bold mb-4 text-center text-uppercase login-title">Login</h1>
                @if(session('error'))

                <div class="alert alert-danger mb-3">{{ session('error') }}</div>
                @endif
                @if(session('status'))
                <div class="alert alert-success mb-3">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{route('login')}}">
                    @csrf

                    <!-- Username -->
                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Username or Email</label>
                        <div class="input-group">
                            <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus
                                class="form-control rounded-start @error('email') is-invalid @enderror"
                                placeholder="johndoe@email.com">
                            <span class="input-group-text bg-white text-success">
                                <i class="bi bi-check-circle-fill"></i>
                            </span>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input id="password" type="password" name="password" required
                                class="form-control rounded-start @error('password') is-invalid @enderror"
                                placeholder="••••••••">
                            <span class="input-group-text bg-white text-success">
                                <i class="bi bi-check-circle-fill"></i>
                            </span>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-burgundy btn-lg fw-semibold rounded-pill">
                            SIGN IN
                        </button>
                        <p class="mt-3 text-center">
                            <a href="{{route('register.view')}}" class="text-decoration-none text-danger fw-semibold">
                                No account? Sign up
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>