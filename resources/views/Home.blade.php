<x-layouts.app>
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
        }

        /* Avatar */
        .avatar-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: #8B2D2D;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .avatar-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Navigation cards (simpler design) */
        .nav-card {
            display: block;
            padding: 2rem 1.5rem;
            background: #8B2D2D;
            /* theme color */
            border-radius: 1rem;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
        }

        .nav-card:hover {
            background: #a13636;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        .nav-card h5 {
            margin: 0;
            font-weight: 700;
        }

        .nav-card p {
            margin: 0.5rem 0 0;
            color: #e5e7eb;
            font-size: 0.9rem;
        }
    </style>

    <div class="container-fluid min-vh-100 d-flex flex-column bg-gradient">

        <!-- Top bar with avatar -->
        <div class="d-flex align-items-center justify-content-end py-3 px-4 position-relative">
            <button class="avatar-circle border-0 bg-transparent p-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'U') }}&background=8B2D2D&color=fff"
                    alt="User Avatar">
            </button>

            <!-- Dropdown collapsible -->
            <div class="collapse position-absolute" id="userMenu"
                style="top: 60px; right: 20px; z-index:1050; width: 250px;">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-body p-3">
                        <h6 class="fw-bold text-dark mb-3">User Settings</h6>
                        <ul class="list-unstyled mb-3">
                            <li class="mb-2">
                                <a href="{{route('profile.edit')}}" class="text-decoration-none text-dark d-flex align-items-center gap-2">
                                    <i class="bi bi-person-circle text-primary"></i> Profile
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{route('leaderboard.global')}}" class="text-decoration-none text-dark d-flex align-items-center gap-2">
                                    <i class="bi bi-trophy text-warning"></i> Leaderboard
                                </a>
                            </li>

                        </ul>
                        <form method="POST" action="">
                            @csrf
                            <a href="{{route('logout')}}" class="btn w-100 text-white rounded-pill" style="background:#8B2D2D;">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content (old design restored) -->
        <div class="flex-grow-1 d-flex justify-content-center align-items-center">
            <div class="row g-4 w-100 justify-content-center" style="max-width: 800px;">

                <!-- Module card -->
                <div class="col-12 col-md-6">
                    <a href="{{route('topics.view')}}" class="nav-card">
                        <h5 class="fw-bold">Module</h5>
                        <p>Explore all learning modules</p>
                    </a>
                </div>

                <!-- Playground card -->
                <div class="col-12 col-md-6">
                    <a href="{{route('playground.index')}}" class="nav-card">
                        <h5 class="fw-bold">Playground</h5>
                        <p>Practice in interactive mode</p>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>