<div class="container">

    <div class="card">
        <h4 class="card-title"><?= $_title ?><a class="ml-1 btn btn-warning float-right text-white" target="blank" href="<?= base_url() ?>user/print" role="button">Cetak</a><button id="tambah-data" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-add" onclick="reset_form()">Tambah</button></h4>

        <div class="card-body">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table data-provide="datatables" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 20px;">#</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">USERNAME</th>
                                <th class="text-center">HAK AKSES</th>
                                <th class="text-center" style="width: 100px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rows as $row) {
                                echo '<tr><th class="text-center" scope="row">' . $no . '</th>';
                                echo '<td>' . $row->nama_user . '</td>';
                                echo '<td>' . $row->username . '</td>';
                                echo '<td>' . $row->role . '</td>';
                                echo '<td class="text-center">
                                        <div class="btn-group ">
                                            <button class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">Aksi</button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a id="edit-data" class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-edit" onclick="getdata(' . $row->id_user . ')"><i class="fa fa-edit"></i> Edit Data</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" onclick="deletedata(' . $row->id_user . ',\'' . $row->nama_user . '\')"><i class="fa fa-trash"></i> Hapus Data</a>
                                            </div>
                                        </div>
                                    </td>';
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal Add -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-add" action="<?= base_url() ?>user/add" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="conf_password">Ulangi Password</label>
                                <input type="password" id="conf_password" class="form-control" name="conf_password" required>
                            </div>
                            <div class="form-group">
                                <label for="akses">Hak akses</label>
                                <select class="form-control" id="akses" name="akses" required>
                                    <option selected disabled>--Hak Akses--</option>
                                    <option value="admin">Admin</option>
                                    <option value="kader">Kader</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-info">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url() ?>user/update" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id_user">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="new_password" placeholder="jangan edit password jika tidak ada kepentingan">
                            </div>
                            <div class="form-group">
                                <label for="conf_password">Ulangi Password</label>
                                <input type="password" id="conf_password" class="form-control" name="conf_password">
                            </div>
                            <div class="form-group">
                                <label for="akses">Hak akses</label>
                                <select class="form-control" id="akses" name="akses" required>
                                    <option value="admin">Admin</option>
                                    <option value="kader">Kader</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal modal-center fade" id="modal-delete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url(); ?>user/delete" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_delete" name="id_user">
                    <h3>Apakah anda yakin ingin menghapus data <b id="display_nama">-</b></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-bold btn-pure btn-info">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function getdata(id) {
        $.getJSON("<?= base_url() ?>user/view/" + id, function(data) {
            $('input[name="id_user"]').val(data.id_user);
            $('input[name="nama"]').val(data.nama_user);
            $('input[name="username"]').val(data.username);
            $('input[name="email"]').val(data.email);
            $('option[value="' + data.akses + '"]').prop('selected', true);
        });
    }

    function deletedata(id, nama) {
        $("#id_delete").val(id);
        $("#display_nama").html(nama);
    }

    function reset_form() {
        $('#form-add')[0].reset();
    }
</script>