<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lpj extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_lpj');
	}

	public function index()
	{
		$x['data_lpj']=$this->m_lpj->get_all_lpj();
		$x['sidebar']="lpj";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('lpj/lpj');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_lpj']=$this->m_lpj->get_all_lpj();
		$x['sidebar']="lpj2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('lpj/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tahun=$this->input->post('tahun');
		$x['tahun']=$this->input->post('tahun');
		$x['data_lpj']=$this->db->query("SELECT * FROM lpj,program where lpj.id_program=program.id_program AND YEAR(tahun_anggaran)='$tahun'");
		$this->load->view('lpj/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_lpj']=$this->m_lpj->get_all_lpj();
		$this->load->view('lpj/cetak',$x);
	}
	public function cetak2($id)
	{	
		$x['data_lpj']=$this->db->query("SELECT * FROM lpj,program where lpj.id_program=program.id_program AND id_lpj='$id'")->row_array();
		$this->load->view('lpj/cetak2',$x);
	}

		public function simpan_lpj()
	{

		$id_pegawai = implode(',', $this->input->post('id_pegawai'));
				$data = array(
								'id_program' => $this->input->post('id_program'),
								'tahun_anggaran' => $this->input->post('tahun_anggaran'),
								'kode_rekening' => $this->input->post('kode_rekening'),
								'jenis_anggaran' => $this->input->post('jenis_anggaran'),
								'belanja' => str_replace(".", "", $this->input->post('belanja')),
								'tanggal' => $this->input->post('tanggal'),
								'hasil_laporan_kegiatan' => $this->input->post('hasil_laporan_kegiatan'),
								'rincian_biaya' => $this->input->post('rincian_biaya'),
								'id_pegawai' => $id_pegawai,
							);


				
				
					$result = $this->m_lpj->add_lpj($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('lpj'));
					}
	}


	


		public function update_lpj()
	{
		$id = $this->input->post('id_lpj'); 
			
			$id_pegawai = implode(',', $this->input->post('id_pegawai'));
					$data = array(
								'id_program' => $this->input->post('id_program'),
								'tahun_anggaran' => $this->input->post('tahun_anggaran'),
								'kode_rekening' => $this->input->post('kode_rekening'),
								'jenis_anggaran' => $this->input->post('jenis_anggaran'),
								'belanja' => str_replace(".", "", $this->input->post('belanja')),
								'tanggal' => $this->input->post('tanggal'),
								'hasil_laporan_kegiatan' => $this->input->post('hasil_laporan_kegiatan'),
								'rincian_biaya' => $this->input->post('rincian_biaya'),
								'id_pegawai' => $id_pegawai,
							);
					
				
					$result = $this->m_lpj->edit_lpj($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('lpj'));
					}
	}

	function hapus_lpj(){
		$kode=$this->input->post('kode');
		$this->m_lpj->hapus_lpj($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('lpj');
	}
}