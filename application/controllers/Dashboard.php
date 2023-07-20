<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_data');
		$this->load->model('m_pemohon');
		
	}

	public function index()
	{

		$x['sidebar']="dashboard";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function update()
	{

				$id_pemohon = $this->input->post("id_pemohon");
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
			                redirect('dashboard');
			            }
			        }
			        $this->m_pemohon->edit_pemohon($data,$id_pemohon);
			        $this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
					redirect(base_url("dashboard"));
	}

	
}
