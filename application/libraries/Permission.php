<?php

class Permission
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    public function admin()
    {
        $is_admin = $this->_ci->session->userdata('akses');

        if ($is_admin == a1) {
            return true;
        } else {
            return false;
        }
    }

    // public function pegawai()
    // {
    //     $is_pegawai = $this->_ci->session->userdata('akses');

    //     if ($is_pegawai == a2) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
