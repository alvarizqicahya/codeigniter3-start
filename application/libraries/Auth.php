<?php
class Auth
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function cek()
    {
        if ($this->_ci->session->userdata('auth') == false) {
            redirect(base_url('auth/login'));
        }
    }
}
