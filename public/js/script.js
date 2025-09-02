$(function () {

    $('#hospitalForm').on('submit', function (e) {

        e.preventDefault();

        let data = $(this).serialize();

        $.ajax({
            url: '/rumah-sakit',
            method: 'POST',
            data: data,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menambahkan rumah sakit.',
                    confirmButtonText: 'OK'
                });
            }
        });

    });


    // Melakukan Hapus
    $('.btn_delete').on('click', function () {
        let id = $(this).data('id');
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda yakin?',
            text: 'Data rumah sakit akan dihapus permanen!',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/rumah-sakit/delete/' + id,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Terjadi kesalahan saat menghapus rumah sakit.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });

    // Melakukan Edit Pada Rumah Sakit
    $('.btn_edit').on('click', function () {

        let id = $(this).data('id');

        $.ajax({
            url: '/rumah-sakit/' + id,
            method: 'GET',
            success: function (response) {
                $('#modalEditRumahSakit').find('input[name="id"]').val(response.id);
                $('#modalEditRumahSakit').find('input[name="nama"]').val(response.nama);
                $('#modalEditRumahSakit').find('textarea[name="alamat"]').val(response.alamat);
                $('#modalEditRumahSakit').find('input[name="telepon"]').val(response.telepon);
                $('#modalEditRumahSakit').find('input[name="email"]').val(response.email);

                $('#modalEditRumahSakit').modal('show');
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Tidak dapat mengambil data rumah sakit.',
                    confirmButtonText: 'OK'
                });
            }
        });

    });


    // Update Rumah Sakit
    $('#updateHospital').on('submit', function (e) {

        e.preventDefault();

        let data = $(this).serialize();

        let params = new URLSearchParams(data);

        let id = params.get('id');

        $.ajax({
            url: '/rumah-sakit/update/' + id,
            method: 'PUT',
            data: data,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menambahkan rumah sakit.',
                    confirmButtonText: 'OK'
                });
            }
        });

    });

    // Menambahkan Pasien
    $('#patientForm').on('submit', function (e) {

        e.preventDefault();

        let data = $(this).serialize();

        console.log(data);

        $.ajax({
            url: '/pasien',
            method: 'POST',
            data: data,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat menambahkan pasien.',
                    confirmButtonText: 'OK'
                });
            }
        });

    });

})