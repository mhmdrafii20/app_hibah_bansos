<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_pencairan_hibah_bansos extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_arsip_pencairan_hibah_bansos');
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_arsip_pencairan_hibah_bansos']=$this->m_arsip_pencairan_hibah_bansos->get_all_arsip_pencairan_hibah_bansos();
		$x['sidebar']="proposal_pencairan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('arsip_pencairan_hibah_bansos/arsip_pencairan_hibah_bansos');
		$this->load->view('footer');
	}


	public function cetak()
	{
		$x["data_arsip_pencairan_hibah_bansos"]=$this->m_arsip_pencairan_hibah_bansos->get_all_arsip_pencairan_hibah_bansos();
		$this->load->view("arsip_pencairan_hibah_bansos/cetak",$x);
	}


	public function lihat()
	{
		$x["data_arsip_pencairan_hibah_bansos"]=$this->m_arsip_pencairan_hibah_bansos->get_all_arsip_pencairan_hibah_bansos();
    $x["sidebar"]="arsip_pencairan_hibah_bansos2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("arsip_pencairan_hibah_bansos/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_arsip_pencairan_hibah_bansos"]=$this->db->query("SELECT * FROM arsip_pencairan_hibah_bansos");
		$this->load->view("arsip_pencairan_hibah_bansos/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_arsip_pencairan_hibah_bansos"]=$this->db->query("SELECT * FROM arsip_pencairan_hibah_bansos")->row_array();
		$this->load->view("arsip_pencairan_hibah_bansos/cetak2",$x);
	}

		public function simpan_arsip_pencairan_hibah_bansos()
	{ 
		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Tambah data Arsip Pencairan Hibah Bansos",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_arsip']['name']))
			        {
			        if($this->upload->do_upload('file_arsip'))
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

			                    	$data = array(
												'No_NPHD' => $this->input->post('No_NPHD'),
												'nama_penerima' => $this->input->post('nama_penerima'),
												'tanggal_pencairan' => $this->input->post('tanggal_pencairan'),
												'file_arsip' => $dok,
										);

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('arsip_pencairan_hibah_bansos');
			            }
			        }
			        else{
			        			 $data = array(
												'No_NPHD' => $this->input->post('No_NPHD'),
												'nama_penerima' => $this->input->post('nama_penerima'),
												'tanggal_pencairan' => $this->input->post('tanggal_pencairan'),
										);
			        }
				
				
					$result = $this->m_arsip_pencairan_hibah_bansos->add_arsip_pencairan_hibah_bansos($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('arsip_pencairan_hibah_bansos'));
					}
	}


	


		public function update_arsip_pencairan_hibah_bansos()
	{
		$id = $this->input->post('id_arsip_pencairan_hibah_bansos'); 

		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Update data Arsip Pencairan Hibah Bansos",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);
			

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_arsip']['name']))
			        {
			        if($this->upload->do_upload('file_arsip'))
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

			                    	$data = array(
												'No_NPHD' => $this->input->post('No_NPHD'),
												'nama_penerima' => $this->input->post('nama_penerima'),
												'tanggal_pencairan' => $this->input->post('tanggal_pencairan'),
												'file_arsip' => $dok,
										);

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('arsip_pencairan_hibah_bansos');
			            }
			        }
			        else{
			        			 $data = array(
												'No_NPHD' => $this->input->post('No_NPHD'),
												'nama_penerima' => $this->input->post('nama_penerima'),
												'tanggal_pencairan' => $this->input->post('tanggal_pencairan'),
										);
			        }
					
				
					$result = $this->m_arsip_pencairan_hibah_bansos->edit_arsip_pencairan_hibah_bansos($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('arsip_pencairan_hibah_bansos'));
					}
	}

	function hapus_arsip_pencairan_hibah_bansos(){
		$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Hapus data Arsip Pencairan Hibah Bansos",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);


		$kode=$this->input->post('kode');
		$this->m_arsip_pencairan_hibah_bansos->hapus_arsip_pencairan_hibah_bansos($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('arsip_pencairan_hibah_bansos');
	}
}