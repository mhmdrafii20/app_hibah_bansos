
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pengajuan_cuti extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_pengajuan_cuti");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pengajuan_cuti"]=$this->m_pengajuan_cuti->get_all_pengajuan_cuti();
		$x["sidebar"]="pengajuan_cuti";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("pengajuan_cuti/pengajuan_cuti");
    $this->load->view("footer");
	}

	public function view()
	{
		$status_pengajuan = $this->input->post("status_pengajuan");

		if ($status_pengajuan=="0") {
			$x['data_pengajuan_cuti']=$this->m_pengajuan_cuti->get_all_pengajuan_cuti();
		}elseif ($status_pengajuan!="0") {
			$x['data_pengajuan_cuti']=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai AND status_pengajuan='$status_pengajuan'");
		}
		
		$x['status_pengajuan']=$status_pengajuan;
		$x['sidebar']="pengajuan_cuti";
		$this->load->view("header",$x);
	    $this->load->view("sidebar");
	    $this->load->view("pengajuan_cuti/pengajuan_cuti");
	    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pengajuan_cuti"]=$this->m_pengajuan_cuti->get_all_pengajuan_cuti();
		$this->load->view("pengajuan_cuti/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pengajuan_cuti"]=$this->m_pengajuan_cuti->get_all_pengajuan_cuti();
    $x["sidebar"]="pengajuan_cuti2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pengajuan_cuti/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$status_pengajuan=$this->input->post("status_pengajuan");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["status_pengajuan"]=$this->input->post("status_pengajuan");
		if ($status_pengajuan=="0") {
			$x["data_pengajuan_cuti"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai AND date(tanggal_mulai) BETWEEN date('$tgl1') AND date('$tgl2')");
		}elseif ($status_pengajuan!="0") {
			$x["data_pengajuan_cuti"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai AND status_pengajuan='$status_pengajuan' AND date(tanggal_mulai) BETWEEN date('$tgl1') AND date('$tgl2')");
		}
		$this->load->view("pengajuan_cuti/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_pengajuan_cuti"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai AND pengajuan_cuti.id_pengajuan_cuti=".$id."")->row_array();
		$this->load->view("pengajuan_cuti/cetak2",$x);
	}
	

		public function simpan_pengajuan_cuti()
	{
			$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["tanggal_mulai"] = $this->input->post("tanggal_mulai");
				$data["tanggal_selesai"] = $this->input->post("tanggal_selesai");
				$data["jenis_cuti"] = $this->input->post("jenis_cuti");
				$data["keterangan"] = $this->input->post("keterangan");
				$data["status_pengajuan"] = $this->input->post("status_pengajuan");
				
				
					$result = $this->m_pengajuan_cuti->add_pengajuan_cuti($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("pengajuan_cuti"));
					}
	}



		public function update_pengajuan_cuti()
	{
		$id = $this->input->post("id_pengajuan_cuti"); 
		
			$data["id_pegawai"] = $this->input->post("id_pegawai");
				$data["tanggal_mulai"] = $this->input->post("tanggal_mulai");
				$data["tanggal_selesai"] = $this->input->post("tanggal_selesai");
				$data["jenis_cuti"] = $this->input->post("jenis_cuti");
				$data["keterangan"] = $this->input->post("keterangan");
				
				
					$result = $this->m_pengajuan_cuti->edit_pengajuan_cuti($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("pengajuan_cuti"));
					}
	}
		public function update_pengajuan_cuti2()
	{
		$id = $this->input->post("id_pengajuan_cuti"); 
		
				$data["status_pengajuan"] = $this->input->post("status_pengajuan");
				$data["catatan_pimpinan"] = $this->input->post("catatan_pimpinan");
				
				
					$result = $this->m_pengajuan_cuti->edit_pengajuan_cuti($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit2", "Record is Added Successfully!");
						redirect(base_url("pengajuan_cuti"));
					}
	}

	function hapus_pengajuan_cuti(){
		$kode=$this->input->post("kode");
		$this->m_pengajuan_cuti->hapus_pengajuan_cuti($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("pengajuan_cuti");
	}
}
			