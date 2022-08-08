<?php
class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function display_theme($template, $data = null)
    {
        $data['_body'] = $this->_ci->load->view($template, $data, true);
        $data['_topbar'] = $this->_ci->load->view('theme/topbar', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('theme/sidebar', $data, true);
        $data['_footer'] = $this->_ci->load->view('theme/footer', $data, true);
        $data['_login'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('theme_view', $data);
    }
}
