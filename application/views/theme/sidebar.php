<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg sidebar-light">
    <header class="sidebar-header">
        <span class="logo">
            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" style="height:55px; margin-left:30%">
        </span>
        <span class="sidebar-toggle-fold"></span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">
            <li class="menu-category">Utama</li>
            <!-- Dashboard -->
            <li class="menu-item <?php if ($this->uri->segment(1) == 'dashboard') {
                                        echo 'active';
                                    } ?>">
                <a class="menu-link" href="<?php echo base_url(); ?>dashboard">
                    <span class="icon pe-7s-keypad"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <?php
            // scope khusus akses tertinggi (admin)
            if ($this->permission->admin()) : ?>
                <li class="menu-category">Data Master</li>

                <!-- Data Master User -->
                <li class="menu-item <?php if ($this->uri->segment(1) == 'user') {
                                            echo 'active';
                                        } ?>">
                    <a class="menu-link" href="<?php echo base_url(); ?>user">
                        <span class="icon pe-7s-user"></span>
                        <span class="title">Data User</span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
</aside>