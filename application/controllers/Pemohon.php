
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pemohon extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_pemohon");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pemohon"]=$this->m_pemohon->get_all_pemohon();
		$x["sidebar"]="pemohon";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("pemohon/pemohon");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pemohon"]=$this->m_pemohon->get_all_pemohon();
		$this->load->view("pemohon/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pemohon"]=$this->m_pemohon->get_all_pemohon();
    $x["sidebar"]="pemohon2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pemohon/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_pemohon"]=$this->db->query("SELECT * FROM pemohon WHERE date(tanggal_mendaftar) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("pemohon/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_pemohon"]=$this->db->query("SELECT * FROM pemohon WHERE pemohon.id_pemohon=".$id."")->row_array();
		$this->load->view("pemohon/cetak2",$x);
	}
	

		public function simpan_pemohon()
	{
				$data["status_pemohon"] = "Menunggu Konfirmasi";
				$data["nik"] = $this->input->post("nik");
				$data["jenis_penerima"] = $this->input->post("jenis_penerima");
				$data["nama_penerima"] = $this->input->post("nama_penerima");
				$data["alamat_penerima"] = $this->input->post("alamat_penerima");
				$data["nama_lengkap"] = $this->input->post("nama_lengkap");
				$data["jenis_kelamin"] = $this->input->post("jenis_kelamin");
				$data["tempat_lahir"] = $this->input->post("tempat_lahir");
				$data["tanggal_lahir"] = $this->input->post("tanggal_lahir");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_hp_pemohon"] = $this->input->post("no_hp_pemohon");
				$data["status_perkawinan"] = $this->input->post("status_perkawinan");
				if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_ktp']['name']))
			        {
			        if($this->upload->do_upload('file_ktp'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["file_ktp"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pemohon');
			            }
			        }
				
				
					$result = $this->m_pemohon->add_pemohon($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("pemohon"));
					}
	}



		public function update_pemohon()
	{
		$id = $this->input->post("id_pemohon"); 
		
				$data["nik"] = $this->input->post("nik");
				$data["jenis_penerima"] = $this->input->post("jenis_penerima");
				$data["nama_penerima"] = $this->input->post("nama_penerima");
				$data["alamat_penerima"] = $this->input->post("alamat_penerima");
				$data["nama_lengkap"] = $this->input->post("nama_lengkap");
				$data["jenis_kelamin"] = $this->input->post("jenis_kelamin");
				$data["tempat_lahir"] = $this->input->post("tempat_lahir");
				$data["tanggal_lahir"] = $this->input->post("tanggal_lahir");
				$data["alamat"] = $this->input->post("alamat");
				$data["no_hp_pemohon"] = $this->input->post("no_hp_pemohon");
				$data["status_perkawinan"] = $this->input->post("status_perkawinan");
				if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_ktp']['name']))
			        {
			        if($this->upload->do_upload('file_ktp'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["file_ktp"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pemohon');
			            }
			        }
				
				
					$result = $this->m_pemohon->edit_pemohon($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("pemohon"));
					}
	}	

		public function update_pemohon2()
	{
		$id = $this->input->post("id_pemohon"); 
		
				$data["status_pemohon"] = $this->input->post("status_pemohon");
				$data["catatan_petugas"] = $this->input->post("catatan_petugas");
				
					$result = $this->m_pemohon->edit_pemohon($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit2", "Record is Added Successfully!");
						redirect(base_url("pemohon"));
					}
	}

	function hapus_pemohon(){
		$kode=$this->input->post("kode");
		$this->m_pemohon->hapus_pemohon($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("pemohon");
	}
}
			