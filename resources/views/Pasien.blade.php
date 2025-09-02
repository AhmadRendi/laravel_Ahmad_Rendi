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
                    <form id="patientForm" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-semibold">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama lengkap pasien" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telepon" class="form-label fw-semibold">Telepon</label>
                                <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="08xxxxxxxxxx"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                    placeholder="Alamat lengkap pasien" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="id_rumah_sakit" class="form-label fw-semibold">Rumah Sakit</label>
                                <select class="form-select" id="id_rumah_sakit" name="id_rumah_sakit" required>
                                    <option value="">Pilih Rumah Sakit</option>
                                    @foreach ($data['dataRumahSakit'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
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
                                @if ($data->isEmpty() || $data == null)
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Tidak ada data pasien tersedia.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($data['pasien'] as $item)
                                        <tr>
                                            <td class="fw-medium">{{ $item->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="avatar-sm bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2">
                                                        <i class="bi bi-person text-success"></i>
                                                    </div>
                                                    <span class="fw-medium">{{ $item->nama }}</span>
                                                </div>
                                            </td>
                                            <td class="text-muted">{{ $item->alamat }}</td>
                                            <td class="text-muted">{{ $item->telepon }}</td>
                                            <td>
                                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                                    {{ $item->rumah_sakit_nama ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <button class="btn btn-sm btn-outline-primary btn_edit_pasien" data-id="{{ $item->id }}" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger btn_delete_pasien" data-id="{{ $item->id }}" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

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

<!-- Modal -->
<div class="modal fade" id="modalEditPasien" tabindex="-1" aria-labelledby="modalEditPasienLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditPasienLabel">Edit Pasien</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form id="updatePatient" method="POST">
                    @csrf
                    <input type="hidden" id="edit_id" name="id">
                     <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label fw-semibold">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama lengkap pasien" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telepon" class="form-label fw-semibold">Telepon</label>
                                <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="08xxxxxxxxxx"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                    placeholder="Alamat lengkap pasien" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="id_rumah_sakit" class="form-label fw-semibold">Rumah Sakit</label>
                                <select class="form-select" id="id_rumah_sakit" name="id_rumah_sakit" required>
                                    <option value="">Pilih Rumah Sakit</option>
                                    @foreach ($data['dataRumahSakit'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
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

{{ view('template.Footer') }}