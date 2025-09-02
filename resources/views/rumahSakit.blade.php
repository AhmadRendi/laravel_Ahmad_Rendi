{{ view('template.Header') }}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-hospital me-2"></i>
            Sistem Manajemen RS
        </a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="{{ url('/rumah-sakit') }}">
                <i class="bi bi-building me-1"></i>Rumah Sakit
            </a>
            <a class="nav-link" href="{{ url('/pasien') }}">
                <i class="bi bi-person me-1"></i>Pasien
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- Header Section  -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body text-white">
                    <h2 class="card-title mb-1">
                        <i class="bi bi-hospital me-2"></i>
                        Manajemen Rumah Sakit
                    </h2>
                    <p class="card-text opacity-75 mb-0">Kelola data rumah sakit dengan mudah dan efisien</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Hospital Form  -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">
                        <i class="bi bi-plus-circle me-2 text-success"></i>
                        Tambah Rumah Sakit Baru
                    </h5>
                </div>
                <div class="card-body">
                    <form id="hospitalForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-semibold">Nama Rumah Sakit</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama rumah sakit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email@rumahsakit.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Telepon</label>
                                <input type="tel" class="form-control" id="telepon" name="telepon"
                                    placeholder="021-xxxxxxxx" required>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                    placeholder="Alamat lengkap rumah sakit" required></textarea>
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

    <!-- Hospitals Table  -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-list-ul me-2 text-primary"></i>
                        Daftar Rumah Sakit
                    </h5>
                    <div class="input-group" style="width: 300px;">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari rumah sakit...">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold">ID</th>
                                    <th class="fw-semibold">Nama Rumah Sakit</th>
                                    <th class="fw-semibold">Alamat</th>
                                    <th class="fw-semibold">Telepon</th>
                                    <th class="fw-semibold">Email</th>
                                    <th class="fw-semibold text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @csrf
                                    <tr>
                                        <td class="fw-medium">{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="avatar-sm bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                    <i class="bi bi-hospital text-primary"></i>
                                                </div>
                                                <span class="fw-medium">{{ $item->nama }}</span>
                                            </div>
                                        </td>
                                        <td class="text-muted">{{ $item->alamat }}</td>
                                        <td class="text-muted">{{ $item->telepon }}</td>
                                        <td class="text-muted">{{ $item->email }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-sm btn-outline-primary btn_edit"
                                                    data-id="{{  $item->id }}" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger btn_delete"
                                                    data-id="{{ $item->id }}" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEditRumahSakit" tabindex="-1" aria-labelledby="modalEditRumahSakitLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditRumahSakitLabel">Edit Rumah Sakit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form id="updateHospital" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="hidden" name="id" id="id">
                            <label for="nama" class="form-label fw-semibold">Nama Rumah Sakit</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama rumah sakit" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="email@rumahsakit.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">Telepon</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon"
                                placeholder="021-xxxxxxxx" required>
                        </div>
                        <div class="col-md-6">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                placeholder="Alamat lengkap rumah sakit" required></textarea>
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

{{ view('template.Footer') }}