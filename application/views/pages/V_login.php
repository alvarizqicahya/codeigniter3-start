<div class="min-h-fullscreen bg-img center-vh p-20">
    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%">
        <div class="row">
            <div class="col-sm-12">
                <img src="<?= base_url() ?>assets/img/logo.png" alt="logo" width="300px">
            </div>
            <div class="col-sm-12 text-center">
                <h3 class="mb-3 fw-500" style="color: #000">Deskripsi</h3>
            </div>
        </div>

        <form class="form-type-material mt-3" method="POST" action="<?= base_url('auth/login') ?>">
            <!-- username -->
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                <label for="username">Username</label>
            </div>
            <?= form_error('username', '<small class="text-danger">', '</small>') ?>

            <!-- password -->
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Password</label>
            </div>
            <?= form_error('password', '<small class="text-danger">', '</small>') ?>

            <!-- Login Message -->
            <?php if ($this->session->flashdata('login_message')) {
                $dataalert = explode("|", $this->session->flashdata('login_message'));
                $status = $dataalert[0];
                $message = $dataalert[1];

                echo '<div class="alert alert-' . $status . ' alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>' . $message . '</div>';
            }
            ?>

            <div class="form-group">
                <button class="btn btn-bold btn-block btn-primary" type="submit">Masuk</button>
            </div>
        </form>
    </div>
</div>