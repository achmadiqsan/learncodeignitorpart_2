<?php 

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Mahasiswa_model extends CI_Model
{
	private $table = 'mahasiswa';

	// validasi form, method ini akan mengembalikan data berupa rules validasi form

	public function rules()
	{
		return [
			[
				'field' => 'Nama', // samakan dengan attribute nama pada tag input
				'label' => 'Nama', // label yang akan di tampilkan pada pesan error
				'rules' => 'trim|required'
			],
			[
				'field' => 'JenisKelamin', // samakan dengan attribute nama pada tag input
				'label' => 'Jenis Kelamin', // label yang akan di tampilkan pada pesan error
				'rules' => 'trim|required'
			],
			[
				'field' => 'Alamat', // samakan dengan attribute nama pada tag input
				'label' => 'Alamat', // label yang akan di tampilkan pada pesan error
				'rules' => 'trim|required'
			],
			[
				'field' => 'Agama', // samakan dengan attribute nama pada tag input
				'label' => 'Agama', // label yang akan di tampilkan pada pesan error
				'rules' => 'trim|required'
			],
			[
				'field' => 'NoHp', // samakan dengan attribute nama pada tag input
				'label' => 'No Hp', // label yang akan di tampilkan pada pesan error
				'rules' => 'trim|required'
			],
			[
				'field' => 'Email', // samakan dengan attribute nama pada tag input
				'label' => 'Email', // label yang akan di tampilkan pada pesan error
				'rules' => 'trim|required'
			],
		];
	}

	public function getById($id)
	{
		return $this->db->get_where($this->table, ["IdMhsw" => $id])->row();
		// query diatas seperti halnya query pada mysql
		// select * from mahasiswa where IdMhsw = '$id';
	}

	// menampilkan semua data mahasiswa
	public function getAll()
	{
		$this->db->from($this->table);
		$this->db->order_by("idMhsw", 'desc');
		$query = $this->db->get();
		return $query->result();
		// fungsi diatas seperti halnya query
		// select * from mahasiswa order by IdMhsw DESC
	}

	// menyimpan data mahasiswa
	public function save()
	{
		$data = array(
			"Nama" => $this->input->post('Nama'),
			"JenisKelamin" => $this->input->post('JenisKelamin'),
			"Alamat" => $this->input->post('Alamat'),
			"Agama" => $this->input->post('Agama'),
			"NoHp" => $this->input->post('NoHp'),
			"Email" => $this->input->post('Email'),
		);
		return $this->db->insert($this->table, $data);
	}

	// edit data mahasiswa
	public function update()
	{
		$data = array(
			"Nama" => $this->input->post('Nama'),
			"JenisKelamin" => $this->input->post('JenisKelamin'),
			"Alamat" => $this->input->post('Alamat'),
			"Agama" => $this->input->post('Agama'),
			"NoHp" => $this->input->post('NoHp'),
			"Email" => $this->input->post('Email'),
		);
		return $this->db->update($this->table,$data, array('IdMhsw' => $this->input->post('IdMhsw')));
	}

	// hapus data mahasiswa
	public function delete($id)
	{
		return $this->db->delete($this->table,array("IdMhsw" => $id));
	}
}

 ?>