<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_pengguna');
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_pengguna']=$this->m_pengguna->get_all_pengguna();
		$x['sidebar']="pengguna";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('pengguna/pengguna');
		$this->load->view('footer');
	}

	public function cetak()
	{	
		$x['data_pengguna']=$this->m_pengguna->get_all_pengguna();
		$this->load->view('pengguna/cetak',$x);
	}

		public function simpan_pengguna()
	{
				$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Tambah data Pengguna",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);
				

				$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['foto_pengguna']['name']))
			        {
			        if($this->upload->do_upload('foto_pengguna'))
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
									'username' => $this->input->post('username'),
									'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
									'nama_lengkap' => $this->input->post('nama_lengkap'),
									'alamat' => $this->input->post('alamat'),
									'no_hp' => $this->input->post('no_hp'),
									'nip' => $this->input->post('nip'),
									'level' => $this->input->post('level'),
									'foto_pengguna' => $dok,
							);
			                    
			                    

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pegawai');
			            }
			        }
			        else{

			          $data = array(
									'username' => $this->input->post('username'),
									'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
									'nama_lengkap' => $this->input->post('nama_lengkap'),
									'alamat' => $this->input->post('alamat'),
									'no_hp' => $this->input->post('no_hp'),
									'nip' => $this->input->post('nip'),
									'level' => $this->input->post('level'),
							);
			            
			        }


				
					$result = $this->m_pengguna->add_pengguna($data);
					if($result){
						$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}


	


		public function update_pengguna()
	{
		$id = $this->input->post('id_pengguna'); 
			

				$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Update data Pengguna",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);

			

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['foto_pengguna']['name']))
			        {
			        if($this->upload->do_upload('foto_pengguna'))
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
							
								if (empty($this->input->post('password'))) {
										$data = array(
														'username' => $this->input->post('username'),
														'nama_lengkap' => $this->input->post('nama_lengkap'),
														'alamat' => $this->input->post('alamat'),
														'no_hp' => $this->input->post('no_hp'),
														'nip' => $this->input->post('nip'),
														'level' => $this->input->post('level'),
														'foto_pengguna' => $dok,
													);
									}else{
										$data = array(
														'username' => $this->input->post('username'),
														'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
														'nama_lengkap' => $this->input->post('nama_lengkap'),
														'alamat' => $this->input->post('alamat'),
														'no_hp' => $this->input->post('no_hp'),
														'nip' => $this->input->post('nip'),
														'level' => $this->input->post('level'),
														'foto_pengguna' => $dok,
													);
									}

			                    
			                    

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pegawai');
			            }
			        }
			        else{

			         if (empty($this->input->post('password'))) {
										$data = array(
														'username' => $this->input->post('username'),
														'nama_lengkap' => $this->input->post('nama_lengkap'),
														'alamat' => $this->input->post('alamat'),
														'no_hp' => $this->input->post('no_hp'),
														'nip' => $this->input->post('nip'),
														'level' => $this->input->post('level'),
													);
									}else{
										$data = array(
														'username' => $this->input->post('username'),
														'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
														'nama_lengkap' => $this->input->post('nama_lengkap'),
														'alamat' => $this->input->post('alamat'),
														'no_hp' => $this->input->post('no_hp'),
														'nip' => $this->input->post('nip'),
														'level' => $this->input->post('level'),
													);
									}
			            
			        }


					
				
					$result = $this->m_pengguna->edit_pengguna($data,$id);
					if($result){
						$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
						redirect(base_url('pengguna'));
					}
	}

	function hapus_pengguna(){

				$data_penggunaan = array(
	 							'id_pengguna' => $this->session->userdata('id_pengguna2'),
								'jenis_penggunaan' => "Hapus data Pengguna",
							);
				$this->m_history_penggunaan->add_history_penggunaan($data_penggunaan);


		$kode=$this->input->post('kode');
		$this->m_pengguna->hapus_pengguna($kode);
		echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
		redirect('pengguna');
	}
}