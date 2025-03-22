{{-- @empty($user)
<div id="modal-delete-supplier" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-delete-supplier" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Konfirmasi!</h5>
                        Apakah Anda yakin ingin menghapus data supplier berikut?
                    </div>
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <th class="text-right col-3">Kode Supplier :</th>
                            <td class="col-9" id="supplier_kode"></td>
                        </tr>
                        <tr>
                            <th class="text-right col-3">Nama Supplier :</th>
                            <td class="col-9" id="supplier_nama"></td>
                        </tr>
                        <tr>
                            <th class="text-right col-3">Alamat Supplier :</th>
                            <td class="col-9" id="supplier_alamat"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function deleteSupplier(supplier) {
        $("#form-delete-supplier").attr("action", "{{ url('/supplier') }}/" + supplier.supplier_id + "/delete_ajax");
        $("#supplier_kode").text(supplier.supplier_kode);
        $("#supplier_nama").text(supplier.supplier_nama);
        $("#supplier_alamat").text(supplier.supplier_alamat);
        $("#modal-delete-supplier").modal("show"); // Tampilkan modal
    }

    $(document).ready(function () {
        $("#form-delete-supplier").on("submit", function (e) {
            e.preventDefault(); // Mencegah reload halaman
            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.status) {
                        $("#modal-delete-supplier").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message
                        });
                        dataSupplier.ajax.reload();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Terjadi Kesalahan",
                            text: response.message
                        });
                    }
                }
            });
        });
    });
</script>
@endempty --}}


@empty($user)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>

                <button type="button" class="close" data-dismiss="modal" aria- label="Close"><span
                        aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else

    <form action="{{ url('/user/' . $user->user_id . '/delete_ajax') }}" method="POST" id="form-
    delete">

        @csrf
        @method('DELETE')
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>

                    <button type="button" class="close" data-dismiss="modal" aria- label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <h5><i class="icon fas fa-ban"></i> Konfirmasi !!!</h5>
                        Apakah Anda ingin menghapus data seperti di bawah ini?
                    </div>
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <th class="text-right col-3">Level Pengguna :</th>
                            <td class="col-9">{{

            $user->level->level_nama }}</td>
                        </tr>

                        <tr>
                            <th class="text-right col-3">Username :</th>
                            <td class="col-9">{{

            $user->username }}</td>
                        </tr>

                        <tr>
                            <th class="text-right col-3">Nama :</th>
                            <td class="col-9">{{ $user->nama }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">

                    <button type="button" data-dismiss="modal" class="btn btn-
        warning">Batal</button>

                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $("#form-delete").validate({
                rules: {},
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.status) {
                                $('#myModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message
                                });
                                dataUser.ajax.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function (prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty