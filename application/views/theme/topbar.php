<header class="topbar shadow-lg">
    <div class="topbar-left">
        <span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>
    </div>
    <div class="topbar-right">

        <ul class="topbar-btns">
            <li class="dropdown">
                <span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="<?= base_url() ?>assets/img/avatar/default.jpg" alt="..."></span>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="<?= base_url('user/update-profil') ?>"><i class="ti-user"></i> Profil</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
            </li>
        </ul>
        <div class="topbar-divider"></div>
    </div>
</header>