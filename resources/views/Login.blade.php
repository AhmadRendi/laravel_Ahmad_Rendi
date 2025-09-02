{{ view('template/Header') }}
<div class="login-body">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left Side - Login Form -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="login-form-container">
                    <div class="text-center mb-4">
                        <div class="login-logo mb-3">
                            <i class="bi bi-hospital text-primary"></i>
                        </div>
                        <h2 class="fw-bold text-dark mb-2">Selamat Datang</h2>
                        <p class="text-muted">Masuk ke Sistem Manajemen Rumah Sakit</p>
                    </div>

                    <div class="card shadow-lg border-0">
                        <div class="card-body p-4">
                            <form id="loginForm" action="/login" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan username" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Ingat saya
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mb-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Masuk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Background -->
            <div class="col-lg-6 d-none d-lg-block login-bg">
                <div class="login-bg-overlay">
                    <div class="text-center text-white p-5">
                        <h1 class="display-4 fw-bold mb-3">Sistem Manajemen</h1>
                        <h2 class="display-5 mb-4">Rumah Sakit</h2>
                        <p class="lead">Kelola data rumah sakit dan pasien dengan mudah, aman, dan efisien</p>
                        <div class="mt-4">
                            <div class="row text-center">
                                <div class="col-4">
                                    <i class="bi bi-shield-check display-6 mb-2"></i>
                                    <p class="small">Keamanan Terjamin</p>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-lightning display-6 mb-2"></i>
                                    <p class="small">Akses Cepat</p>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-people display-6 mb-2"></i>
                                    <p class="small">User Friendly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
{{ view('template/Footer') }}