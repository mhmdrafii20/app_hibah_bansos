
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Surat_perintah_perjalanan_dinas extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_surat_perintah_perjalanan_dinas");
		$this->load->model('m_history_penggunaan');
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_surat_perintah_perjalanan_dinas"]=$this->m_surat_perintah_perjalanan_dinas->get_all_surat_perintah_perjalanan_dinas();
		$x["sidebar"]="surat_perintah_perjalanan_dinas";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("surat_perintah_perjalanan_dinas/surat_perintah_perjalanan_dinas");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_surat_perintah_perjalanan_dinas"]=$this->m_surat_perintah_perjalanan_dinas->get_all_surat_perintah_perjalanan_dinas();
		$this->load->view("surat_perintah_perjalanan_dinas/cetak",$x);
	}


	public function lihat()
	{
		$x["data_surat_perintah_perjalanan_dinas"]=$this->m_surat_perintah_perjalanan_dinas->get_all_surat_perintah_perjalanan_dinas();
    $x["sidebar"]="surat_perintah_perjalanan_dinas2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("surat_perintah_perjalanan_dinas/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_surat_perintah_perjalanan_dinas"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,surat_perintah_perjalanan_dinas where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND surat_perintah_perjalanan_dinas.id_pegawai=pegawai.id_pegawai AND date(tanggal_input) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("surat_perintah_perjalanan_dinas/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_surat_perintah_perjalanan_dinas"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,surat_perintah_perjalanan_dinas where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND surat_perintah_perjalanan_dinas.id_pegawai=pegawai.id_pegawai AND surat_perintah_perjalanan_dinas.id_surat_perintah_perjalanan_dinas=".$id."")->row_array();
		$this->load->view("surat_perintah_perjalanan_dinas/cetak2",$x);
	}
	

		public function simpan_surat_perintah_perjalanan_dinas()
	{

		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Tambah data SPPD",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

		$id_pengikut = implode(',', $this->input->post('id_pengikut'));
			$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["maksud_perjalanan"] = $this->input->post("maksud_perjalanan");
				$data["alat_angkut"] = $this->input->post("alat_angkut");
				$data["tempat_berangkat"] = $this->input->post("tempat_berangkat");
				$data["tempat_tujuan"] = $this->input->post("tempat_tujuan");
				$data["tgl_berangkat"] = $this->input->post("tgl_berangkat");
				$data["tgl_harus_kembali"] = $this->input->post("tgl_harus_kembali");
				$data["id_pengikut"] = $id_pengikut;
				$data["tanggal_input"] = $this->input->post("tanggal_input");
				$data["total_biaya_pengeluaran"] = str_replace(".", "", $this->input->post("total_biaya_pengeluaran"));
				
				
					$result = $this->m_surat_perintah_perjalanan_dinas->add_surat_perintah_perjalanan_dinas($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("surat_perintah_perjalanan_dinas"));
					}
	}



		public function update_surat_perintah_perjalanan_dinas()
	{
		$id = $this->input->post("id_surat_perintah_perjalanan_dinas"); 

		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Update data SPPD",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);
		
			$id_pengikut = implode(',', $this->input->post('id_pengikut'));
			$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["maksud_perjalanan"] = $this->input->post("maksud_perjalanan");
				$data["alat_angkut"] = $this->input->post("alat_angkut");
				$data["tempat_berangkat"] = $this->input->post("tempat_berangkat");
				$data["tempat_tujuan"] = $this->input->post("tempat_tujuan");
				$data["tgl_berangkat"] = $this->input->post("tgl_berangkat");
				$data["tgl_harus_kembali"] = $this->input->post("tgl_harus_kembali");
				$data["id_pengikut"] = $id_pengikut;
				$data["tanggal_input"] = $this->input->post("tanggal_input");
				$data["total_biaya_pengeluaran"] = str_replace(".", "", $this->input->post("total_biaya_pengeluaran"));
				
				
					$result = $this->m_surat_perintah_perjalanan_dinas->edit_surat_perintah_perjalanan_dinas($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("surat_perintah_perjalanan_dinas"));
					}
	}

	function hapus_surat_perintah_perjalanan_dinas(){
		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Hapus data SPPD",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);


		$kode=$this->input->post("kode");
		$this->m_surat_perintah_perjalanan_dinas->hapus_surat_perintah_perjalanan_dinas($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("surat_perintah_perjalanan_dinas");
	}
}
			