<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_jabatan');
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_jabatan']=$this->m_jabatan->get_all_jabatan();
		$x['sidebar']="jabatan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('jabatan/jabatan');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_jabatan']=$this->m_jabatan->get_all_jabatan();
		$this->load->view('jabatan/cetak',$x);
	}

		public function simpan_jabatan()
	{
			$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Tambah data Jabatan",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);
				$data = array(
								'nama_jabatan' => $this->input->post('nama_jabatan'),
							);
				
					$result = $this->m_jabatan->add_jabatan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('jabatan'));
					}
	}


	


		public function update_jabatan()
	{
		$id = $this->input->post('id_jabatan'); 
			$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Update data Jabatan",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

			$data = array(
								'nama_jabatan' => $this->input->post('nama_jabatan'),
							);
					
				
					$result = $this->m_jabatan->edit_jabatan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('jabatan'));
					}
	}

	function hapus_jabatan(){
				$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Hapus data Jabatan",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

		$kode=$this->input->post('kode');
		$this->m_jabatan->hapus_jabatan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('jabatan');
	}
}