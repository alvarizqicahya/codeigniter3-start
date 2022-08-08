<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    protected $dateNow;

    public function __construct()
    {
        parent::__construct();
        $this->auth->cek();
        $this->dateNow = strtotime(date('Y-m-d'));
    }

    public function index()
    {
        $this->session->set_flashdata('temp', $this->uri->segment(2));

        $data['_title'] = 'Data User';
        $data['rows'] = $this->App->get_all_orderby('tb_user', 'nama_user', 'ASC')->result();
        $this->template->display_theme('pages/V_user', $data);
        unset($_SESSION['alert']);
    }

    public function update_view()
    {
        $this->session->set_flashdata('temp', $this->uri->segment(2));

        $data['_title'] = 'Profil';
        $data['user'] = $this->App->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row();
        $this->template->display_theme('pages/V_user_profil', $data);
        unset($_SESSION['alert']);
    }

    public function redirect()
    {
        redirect('user');
    }

    public function add() //tambah data
    {
        $data['nama_user'] = htmlspecialchars($this->input->post('nama'));
        $data['password'] = md5(htmlspecialchars($this->input->post('password')));
        $conf_password = md5(htmlspecialchars($this->input->post('conf_password')));
        $data['role'] = htmlspecialchars($this->input->post('akses'));
        $data['username'] = htmlspecialchars($this->input->post('username'));
        $data['created_at'] = $this->dateNow;
        $data['Updated_at'] = $this->dateNow;

        if ($data['password'] == $conf_password) {
            if ($this->App->insert('tb_user', $data)) {
                $this->session->set_flashdata('alert', 'success|Data telah ditambah');
                redirect(base_url('user'));
            } else {
                $this->session->set_flashdata('alert', 'error|Gagal menambah data');
                redirect(base_url('user'));
            }
        } else {
            $this->session->set_flashdata('alert', 'error|Password tidak valid');
            redirect(base_url('user'));
        }
    }

    public function update() // perbarui data
    {
        $where['id_user'] = htmlspecialchars($this->input->post('id_user'));

        $data['nama_user'] = htmlspecialchars($this->input->post('nama'));
        $username = htmlspecialchars($this->input->post('username'));
        $new_password = htmlspecialchars($this->input->post('new_password'));
        $conf_password = htmlspecialchars($this->input->post('conf_password'));

        $cur_username = $this->App->get_where('tb_user', $where)->row();
        $cek_username = $this->App->get_where('tb_user', ['username' => $username])->row();


        if ($cek_username != null) {
            if ($username == $cur_username->username) {
                $data['username'] = $username;
            } else {
                $this->session->set_flashdata('alert', 'error|Gagal memperbarui, username sudah ada!');
                if ($this->session->flashdata('temp') == 'update-profil') {
                    redirect(base_url('user/update-profil'));
                } else {
                    redirect(base_url('user'));
                }
            }
        } else {
            $data['username'] = $username;
        }

        if ($new_password && $conf_password) {
            if ($new_password == $conf_password) {
                $data['password'] = md5($new_password);
            } else {
                $this->session->set_flashdata('alert', 'error|Gagal memperbarui, password tidak cocok!');
                if ($this->session->flashdata('temp') == 'update-profil') {
                    redirect(base_url('user/update-profil'));
                } else {
                    redirect(base_url('user'));
                }
            }
        }
        $role = htmlspecialchars($this->input->post('akses'));
        if ($role) {
            $data['role'] = $role;
        }
        $data['updated_at'] = $this->dateNow;

        if ($this->App->update('tb_user', $data, $where)) {
            if ($this->session->flashdata('temp') == 'update-profil') {
                $this->session->set_flashdata('updated', 'success|Silahkan Keluar, dan Masuk lagi.');
                redirect(base_url('user/update-profil'));
            } else {
                $this->session->set_flashdata('alert', 'success|Data telah diupdate');
                redirect(base_url('user'));
            }
        } else {
            $this->session->set_flashdata('alert', 'error|Gagal mengupdate data');
            if ($this->session->flashdata('temp') == 'update-profil') {
                redirect(base_url('user/update-profil'));
            } else {
                redirect(base_url('user'));
            }
        }
    }

    public function view($id) // melihat data
    {
        $data = $this->App->get_where('tb_user', ['id_user' => $id])->row();
        echo json_encode($data);
    }

    public function delete() // menghapus data
    {
        $where['id_user'] = htmlspecialchars($this->input->post('id_user'));

        if ($this->App->delete('tb_user', $where)) {
            $this->session->set_flashdata('alert', 'success|Data telah dihapus');
            redirect(base_url('user'));
        } else {
            $this->session->set_flashdata('alert', 'error|Gagal menghapus data');
            redirect(base_url('user'));
        }
    }

    public function print() // mencetak data
    {
        // // panggil library 
        $this->load->library('pdf');

        // filename download
        $file_pdf = 'Data User';

        // setting paper
        $paper = 'A4';

        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $data['title'] = $file_pdf;
        $data['rows'] = $this->App->get_all_orderby('tb_user', 'id_user', 'ASC')->result();

        $html = $this->load->view('prints/user', $data, true);

        // run dompdf
        $this->pdf->generate($html, $file_pdf, $paper, $orientation);
    }
}
