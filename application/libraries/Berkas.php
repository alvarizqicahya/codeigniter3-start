<?php

class Berkas
{
	protected $_ci;
	function __construct()
	{
		$this->_ci = &get_instance();
	}

	public function foto()
	{
		$config['upload_path'] = './assets/uploads/foto';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 500;
		$config['overwrite'] = true;
		$config['encrypt_name'] = true;

		$this->_ci->load->library('upload', $config);
		$this->_ci->upload->initialize($config);

		if (!$this->_ci->upload->do_upload('foto')) {
			$data["status"] = "error";
			$data["error"] = $this->_ci->upload->display_errors();
			return $data;
		} else {
			$data["status"] = "success";
			$data["data"] = $this->_ci->upload->data();
			return $data;
		}
	}

	public function scan()
	{
		$config['upload_path'] = './assets/uploads/scan';
		$config['allowed_types'] = 'jpg|png|pdf';
		$config['max_size'] = 2000;
		$config['overwrite'] = true;
		$config['encrypt_name'] = true;

		$this->_ci->load->library('upload', $config);
		$this->_ci->upload->initialize($config);

		if (!$this->_ci->upload->do_upload('scanfile')) {
			$data["status"] = "error";
			$data["error"] = $this->_ci->upload->display_errors();
			return $data;
		} else {
			$data["status"] = "success";
			$data["data"] = $this->_ci->upload->data();
			return $data;
		}
	}

	public function delete_foto($filename)
	{
		$file = './assets/uploads/foto/' . $filename;

		if (unlink($file)) {
			$data["status"] = "success";
			return $data;
		} else {
			$data["status"] = "error";
			return $data;
		}
	}

	public function delete_scan($filename)
	{
		$file = './assets/uploads/scan/' . $filename;

		if (unlink($file)) {
			$data["status"] = "success";
			return $data;
		} else {
			$data["status"] = "error";
			return $data;
		}
	}
}
