<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    private $_table = 'tb_user';

    public function login_check($where)
    {
        return $this->db->get_where($this->_table, $where)->row_array();
    }

    // public function update($data, $where)
    // {
    //     $this->db->set($data);
    //     $this->db->where($where);
    //     return $this->db->update($this->_table);
    // }
}
