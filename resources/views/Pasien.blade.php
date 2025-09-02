{{ view('template.Header') }}
     <!-- Navigation  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-hospital me-2"></i>
                Sistem Manajemen RS
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ url('rumah-sakit') }}">
                    <i class="bi bi-building me-1"></i>Rumah Sakit
                </a>
                <a class="nav-link active" href="{{ url('pasien') }}">
                    <i class="bi bi-person me-1"></i>Pasien
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
         <!-- Header Section  -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-gradient-success">
                    <div class="card-body text-white">
                        <h2 class="card-title mb-1">
                            <i class="bi bi-person me-2"></i>
                            Manajemen Pasien
                        </h2>
                        <p class="card-text opacity-75 mb-0">Kelola data pasien dengan mudah dan efisien</p>
                    </div>
                </div>
            </div>
        </div>

         <!-- Add Patient Form  -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">
                            <i class="bi bi-person-plus me-2 text-success"></i>
                            Tambah Pasien Baru
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="patientForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="patientName" class="form-label fw-semibold">Nama Pasien</label>
                                    <input type="text" class="form-control" id="patientName" placeholder="Masukkan nama lengkap pasien" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="patientPhone" class="form-label fw-semibold">Telepon</label>
                                    <input type="tel" class="form-control" id="patientPhone" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="patientAddress" class="form-label fw-semibold">Alamat</label>
                                    <textarea class="form-control" id="patientAddress" rows="3" placeholder="Alamat lengkap pasien" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="patientHospital" class="form-label fw-semibold">Rumah Sakit</label>
                                    <select class="form-select" id="patientHospital" required>
                                        <option value="">Pilih Rumah Sakit</option>
                                        <option value="001">RS Cipto Mangunkusumo</option>
                                        <option value="002">RS Fatmawati</option>
                                        <option value="003">RS Persahabatan</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success me-2">
                                        <i class="bi bi-check-circle me-1"></i>Simpan
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <!-- Patients Table  -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-people me-2 text-primary"></i>
                            Daftar Pasien
                        </h5>
                        <div class="input-group" style="width: 300px;">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Cari pasien...">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="fw-semibold">ID</th>
                                        <th class="fw-semibold">Nama Pasien</th>
                                        <th class="fw-semibold">Alamat</th>
                                        <th class="fw-semibold">Telepon</th>
                                        <th class="fw-semibold">Rumah Sakit</th>
                                        <th class="fw-semibold text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">P001</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <i class="bi bi-person text-success"></i>
                                                </div>
                                                <span class="fw-medium">Ahmad Wijaya</span>
                                            </div>
                                        </td>
                                        <td class="text-muted">Jl. Sudirman No. 123, Jakarta Pusat</td>
                                        <td class="text-muted">081234567890</td>
                                        <td>
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                RS Cipto Mangunkusumo
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">P002</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <i class="bi bi-person text-success"></i>
                                                </div>
                                                <span class="fw-medium">Siti Nurhaliza</span>
                                            </div>
                                        </td>
                                        <td class="text-muted">Jl. Kemang Raya No. 45, Jakarta Selatan</td>
                                        <td class="text-muted">082345678901</td>
                                        <td>
                                            <span class="badge bg-info bg-opacity-10 text-info">
                                                RS Fatmawati
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">P003</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <i class="bi bi-person text-success"></i>
                                                </div>
                                                <span class="fw-medium">Budi Santoso</span>
                                            </div>
                                        </td>
                                        <td class="text-muted">Jl. Rawamangun No. 78, Jakarta Timur</td>
                                        <td class="text-muted">083456789012</td>
                                        <td>
                                            <span class="badge bg-warning bg-opacity-10 text-warning">
                                                RS Persahabatan
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">P004</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <i class="bi bi-person text-success"></i>
                                                </div>
                                                <span class="fw-medium">Maya Sari</span>
                                            </div>
                                        </td>
                                        <td class="text-muted">Jl. Thamrin No. 234, Jakarta Pusat</td>
                                        <td class="text-muted">084567890123</td>
                                        <td>
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                RS Cipto Mangunkusumo
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">Menampilkan 4 dari 4 pasien</small>
                            <nav>
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{ view('template.Footer') }}