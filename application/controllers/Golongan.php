<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_golongan');
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_golongan']=$this->m_golongan->get_all_golongan();
		$x['sidebar']="golongan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('golongan/golongan');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_golongan']=$this->m_golongan->get_all_golongan();
		$this->load->view('golongan/cetak',$x);
	}

		public function simpan_golongan()
	{
				$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Tambah data Golongan",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);


				$data = array(
								'nama_golongan' => $this->input->post('nama_golongan'),
							);
				
					$result = $this->m_golongan->add_golongan($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('golongan'));
					}
	}


	


		public function update_golongan()
	{
		$id = $this->input->post('id_golongan'); 

			$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Update data Golongan",
							);
			$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

			$data = array(
								'nama_golongan' => $this->input->post('nama_golongan'),
							);
					
				
					$result = $this->m_golongan->edit_golongan($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('golongan'));
					}
	}

	function hapus_golongan(){
			$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Hapus data Golongan",
							);
			$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

		$kode=$this->input->post('kode');
		$this->m_golongan->hapus_golongan($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('golongan');
	}
}