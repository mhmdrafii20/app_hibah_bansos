
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Proposal extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_proposal");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_proposal"]=$this->m_proposal->get_all_proposal();
		$x["sidebar"]="proposal";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("proposal/proposal");
    $this->load->view("footer");
	}

	public function view()
	{
		$jenis_penerima = $this->input->post("jenis_penerima");
		$status_proposal = $this->input->post("status_proposal");

		if (($jenis_penerima=="0")AND($status_proposal=="0")) {
			$x['data_proposal']=$this->m_proposal->get_all_proposal();
		}elseif (($jenis_penerima!="0")AND($status_proposal=="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND jenis_penerima='$jenis_penerima'");
		}elseif (($jenis_penerima=="0")AND($status_proposal!="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.status_proposal='$status_proposal'");
		}elseif (($jenis_penerima!="0")AND($status_proposal!="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.status_proposal='$status_proposal' AND jenis_penerima='$jenis_penerima'");
		}
		$x['jenis_penerima']=$jenis_penerima;
		$x['status_proposal']=$status_proposal;
		$x['sidebar']="proposal";
		$this->load->view("header",$x);
	    $this->load->view("sidebar");
	    $this->load->view("proposal/proposal");
	    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_proposal"]=$this->m_proposal->get_all_proposal();
		$this->load->view("proposal/cetak",$x);
	}


	public function lihat()
	{
		$x["data_proposal"]=$this->m_proposal->get_all_proposal();
    $x["sidebar"]="proposal2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("proposal/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$jenis_penerima=$this->input->post("jenis_penerima");
		$status_proposal=$this->input->post("status_proposal");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["jenis_penerima"]=$this->input->post("jenis_penerima");
		$x["status_proposal"]=$this->input->post("status_proposal");
		if (($jenis_penerima=="0")AND($status_proposal=="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND date(tanggal_pengajuan) BETWEEN date('$tgl1') AND date('$tgl2')");
		}elseif (($jenis_penerima!="0")AND($status_proposal=="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND jenis_penerima='$jenis_penerima' AND date(tanggal_pengajuan) BETWEEN date('$tgl1') AND date('$tgl2') ");
		}elseif (($jenis_penerima=="0")AND($status_proposal!="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.status_proposal='$status_proposal' AND date(tanggal_pengajuan) BETWEEN date('$tgl1') AND date('$tgl2') ");
		}elseif (($jenis_penerima!="0")AND($status_proposal!="0")) {
			$x['data_proposal']=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.status_proposal='$status_proposal' AND jenis_penerima='$jenis_penerima' AND date(tanggal_pengajuan) BETWEEN date('$tgl1') AND date('$tgl2') ");
		}
		$this->load->view("proposal/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_proposal"]=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.id_proposal=".$id."")->row_array();
		$this->load->view("proposal/cetak2",$x);
	}
	

		public function simpan_proposal()
	{
				$data["kode_proposal"] = $this->input->post("kode_proposal");
				$data["id_pemohon"] = $this->input->post("id_pemohon");
				$data["judul_proposal"] = $this->input->post("judul_proposal");
				$data["anggaran_yg_diajukan"] = str_replace(".", "", $this->input->post("anggaran_yg_diajukan"));
				$data["tanggal_pengajuan"] = $this->input->post("tanggal_pengajuan");
				$data["status_proposal"] = "Belum Diverifikasi";


					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_proposal']['name']))
			        {
			        if($this->upload->do_upload('file_proposal'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["file_proposal"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('proposal');
			            }
			        }
				
				
					$result = $this->m_proposal->add_proposal($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("proposal"));
					}
	}



		public function update_proposal()
	{
		$id = $this->input->post("id_proposal"); 
		
				$data["kode_proposal"] = $this->input->post("kode_proposal");
				$data["id_pemohon"] = $this->input->post("id_pemohon");
				$data["judul_proposal"] = $this->input->post("judul_proposal");
				$data["anggaran_yg_diajukan"] = str_replace(".", "", $this->input->post("anggaran_yg_diajukan"));
				$data["tanggal_pengajuan"] = $this->input->post("tanggal_pengajuan");


					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_proposal']['name']))
			        {
			        if($this->upload->do_upload('file_proposal'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["file_proposal"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('proposal');
			            }
			        }
				
				
					$result = $this->m_proposal->edit_proposal($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("proposal"));
					}
	}


		public function update_proposal2()
	{
		$id = $this->input->post("id_proposal"); 
		
				$data["status_proposal"] = $this->input->post("status_proposal");
				$status_proposal = $this->input->post("status_proposal");
				$data["catatan_petugas_"] = $this->input->post("catatan_petugas_");
				$catatan_petugas = $this->input->post("catatan_petugas_");
				$nama_lengkap = $this->input->post("nama_lengkap");
				$no_hp = $this->input->post("no_hp");

				$userkey = 'fbb13a7909ae';
$passkey = '748411ab05590d3e375c4b66';
$telepon = $no_hp;
$message = 'Yth Bpk/Ibu '.$nama_lengkap.'

Pengajuan proposal Anda telah '.$status_proposal.', dengan catatan : '.$catatan_petugas.' ';
$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
    'userkey' => $userkey,
    'passkey' => $passkey,
    'to' => $telepon,
    'message' => $message
));
$results = json_decode(curl_exec($curlHandle), true);
curl_close($curlHandle);
				
				
					$result = $this->m_proposal->edit_proposal($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit2", "Record is Added Successfully!");
						redirect(base_url("proposal"));
					}
	}

	function hapus_proposal(){
		$kode=$this->input->post("kode");
		$this->m_proposal->hapus_proposal($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("proposal");
	}
}
			