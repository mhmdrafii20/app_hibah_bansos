<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pegawai');
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_pegawai']=$this->m_pegawai->get_all_pegawai();
		$x['sidebar']="pegawai";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pegawai/pegawai');
		$this->load->view('footer');
	}


	public function cetak()
	{
		$x["data_pegawai"]=$this->m_pegawai->get_all_pegawai();
		$this->load->view("pegawai/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pegawai"]=$this->m_pegawai->get_all_pegawai();
    $x["sidebar"]="pegawai2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pegawai/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_pegawai"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND date(tmt_peg) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("pegawai/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_pegawai"]=$this->db->query("SELECT * FROM pegawai,jabatan,golongan where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pegawai.id_pegawai=".$id."")->row_array();
		$this->load->view("pegawai/cetak2",$x);
	}

		public function simpan_pegawai()
	{ 
		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Tambah data Pegawai",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);


					$data["nama_pegawai"] = $this->input->post("nama_pegawai");
					$data["nip"] = $this->input->post("nip");
					$data["id_jabatan"] = $this->input->post("id_jabatan");
					$data["id_golongan"] = $this->input->post("id_golongan");
					$data["jenis_kelamin"] = $this->input->post("jenis_kelamin");
					$data["no_telp"] = $this->input->post("no_telp");
					$data["alamat"] = $this->input->post("alamat");
					$data["tmt_peg"] = $this->input->post("tmt_peg");

					if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}


					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['foto_pegawai']['name']))
			        {
			        if($this->upload->do_upload('foto_pegawai'))
			            {
								$gbr = $this->upload->data();
								$config['image_library']='gd2';
								$config['source_image']='./assets/image/'.$gbr['file_name'];
								$config['create_thumb']= FALSE;
								$config['maintain_ratio']= FALSE;
								$config['quality']='60%';
								$config['width']= 500;
			                	$config['height']= 400;
								$config['new_image']= './assets/image/'.$gbr['file_name'];
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();
			                    $dok=$gbr['file_name'];
			                    $data["foto_pegawai"] = $dok;
			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pegawai');
			            }
			        }
				
				
					$result = $this->m_pegawai->add_pegawai($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}


	


		public function update_pegawai()
	{
		$id = $this->input->post('id_pegawai'); 

		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Update data Pegawai",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);
			

					$data["nama_pegawai"] = $this->input->post("nama_pegawai");
					$data["nip"] = $this->input->post("nip");
					$data["id_jabatan"] = $this->input->post("id_jabatan");
					$data["id_golongan"] = $this->input->post("id_golongan");
					$data["jenis_kelamin"] = $this->input->post("jenis_kelamin");
					$data["no_telp"] = $this->input->post("no_telp");
					$data["alamat"] = $this->input->post("alamat");
					$data["tmt_peg"] = $this->input->post("tmt_peg");

					if (!empty($this->input->post('password'))) {
					$data["password"] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				}


					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['foto_pegawai']['name']))
			        {
			        if($this->upload->do_upload('foto_pegawai'))
			            {
								$gbr = $this->upload->data();
								$config['image_library']='gd2';
								$config['source_image']='./assets/image/'.$gbr['file_name'];
								$config['create_thumb']= FALSE;
								$config['maintain_ratio']= FALSE;
								$config['quality']='60%';
								$config['width']= 500;
			                	$config['height']= 400;
								$config['new_image']= './assets/image/'.$gbr['file_name'];
								$this->load->library('image_lib', $config);
								$this->image_lib->resize();
			                    $dok=$gbr['file_name'];
			                    $data["foto_pegawai"] = $dok;
			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pegawai');
			            }
			        }
					
				
					$result = $this->m_pegawai->edit_pegawai($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pegawai'));
					}
	}

	function hapus_pegawai(){
		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Hapus data Pegawai",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);


		$kode=$this->input->post('kode');
		$this->m_pegawai->hapus_pegawai($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pegawai');
	}
}