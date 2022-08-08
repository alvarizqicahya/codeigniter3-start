<div class="container">

    <?php if ($this->session->flashdata('updated')) {
        echo '<div class="alert alert-success" role="alert">
        Profil berhasil diperbarui, silahkan <a class="link" href="' . base_url('auth/logout') . '"><b>Keluar</b></a>
      </div>';
    } ?>

    <div class="card">
        <h4 class="card-title"><?= $_title ?></h4>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form action="<?= base_url() ?>user/update" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" name="nama" value="<?= $user->nama_user ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username" value="<?= $user->username ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" id="password" class="form-control" name="new_password">
                        </div>
                        <div class="form-group">
                            <label for="conf_password">Ulangi Password</label>
                            <input type="password" id="conf_password" class="form-control" name="conf_password">
                        </div>

                        <!-- Modal Update -->
                        <div class="modal modal-center fade" id="modal-update" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Konfirmasi !</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="id_delete" name="id_user">
                                        <h3>Apakah anda yakin ingin memperbarui profil <b id="display_nama"><?= $user->nama_user ?></b>? Jika memperbarui profil anda harus Masuk lagi.</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-bold btn-pure btn-info">Perbarui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <button class="btn btn-bold btn-pure btn-info float-right" data-toggle="modal" data-target="#modal-update">Simpan</button>
        </div>
    </div>

</div>