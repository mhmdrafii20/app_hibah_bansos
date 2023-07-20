<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_penggunaan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata('status2') != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model('m_history_penggunaan');
	}

	public function index()
	{
		$x['data_history_penggunaan']=$this->m_history_penggunaan->get_all_history_penggunaan();
		$x['sidebar']="history_penggunaan";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('history_penggunaan/history_penggunaan');
		$this->load->view('footer');
	}

	public function lihat()
	{
		$x['data_history_penggunaan']=$this->m_history_penggunaan->get_all_history_penggunaan();
		$x['sidebar']="history_penggunaan2";
		$this->load->view('header',$x);
		$this->load->view('sidebar');
		$this->load->view('history_penggunaan/lihat');
		$this->load->view('footer');
	}

	public function filter()
	{	
		$tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');
		$x['tgl1']=$this->input->post('tgl1');
		$x['tgl2']=$this->input->post('tgl2');
		$x['data_history_penggunaan']=$this->db->query("SELECT * FROM history_penggunaan,pengguna where history_penggunaan.id_pengguna=pengguna.id_pengguna AND date(tanggal_jam) BETWEEN '$tgl1' AND '$tgl2'");
		$this->load->view('history_penggunaan/cetak_filter',$x);
	}

	public function cetak()
	{	
		$x['data_history_penggunaan']=$this->m_history_penggunaan->get_all_history_penggunaan();
		$this->load->view('history_penggunaan/cetak',$x);
	}

	// 	public function simpan_history_penggunaan()
	// { 

	// 				$config['upload_path'] = './assets/image/';
	// 		        $config['allowed_types'] = 'jpg|png|jpeg';
	// 		        $config['encrypt_name'] = TRUE;
	// 		        $config['max_size']    = 0;
	// 		        $this->upload->initialize($config);
	// 		        if(!empty($_FILES['foto_history_penggunaan']['name']))
	// 		        {
	// 		        if($this->upload->do_upload('foto_history_penggunaan'))
	// 		            {
	// 							$gbr = $this->upload->data();
	// 							$config['image_library']='gd2';
	// 							$config['source_image']='./assets/image/'.$gbr['file_name'];
	// 							$config['create_thumb']= FALSE;
	// 							$config['maintain_ratio']= FALSE;
	// 							$config['quality']='60%';
	// 							$config['width']= 500;
	// 		                	$config['height']= 400;
	// 							$config['new_image']= './assets/image/'.$gbr['file_name'];
	// 							$this->load->library('image_lib', $config);
	// 							$this->image_lib->resize();
	// 		                    $dok=$gbr['file_name'];

	// 		                     $data = array(
	// 								'nama_history_penggunaan' => $this->input->post('nama_history_penggunaan'),
	// 								'nip' => $this->input->post('nip'),
	// 								'id_jabatan' => $this->input->post('id_jabatan'),
	// 								'id_golongan' => $this->input->post('id_golongan'),
	// 								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 								'no_telp' => $this->input->post('no_telp'),
	// 								'alamat' => $this->input->post('alamat'),
	// 								'foto_history_penggunaan' => $dok,
	// 								'unit_kerja' => "PENGADILAN NEGERI KOTABARU KELAS II",
	// 						);
			                    
			                    

	// 		            }else{
	// 		                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
	// 		                redirect('history_penggunaan');
	// 		            }
	// 		        }
	// 		        else{

	// 		          $data = array(
	// 							'nama_history_penggunaan' => $this->input->post('nama_history_penggunaan'),
	// 							'nip' => $this->input->post('nip'),
	// 							'id_jabatan' => $this->input->post('id_jabatan'),
	// 							'id_golongan' => $this->input->post('id_golongan'),
	// 							'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 							'no_telp' => $this->input->post('no_telp'),
	// 								'alamat' => $this->input->post('alamat'),
	// 							'unit_kerja' => "PENGADILAN NEGERI KOTABARU KELAS II",
	// 						);
			            
	// 		        }
				
				
	// 				$result = $this->m_history_penggunaan->add_history_penggunaan($data);
	// 				if($result){
	// 					$this->session->set_flashdata('berhasil_simpan', 'Record is Added Successfully!');
	// 					redirect(base_url('history_penggunaan'));
	// 				}
	// }


	


	// 	public function update_history_penggunaan()
	// {
	// 	$id = $this->input->post('id_history_penggunaan'); 
			

	// 		$config['upload_path'] = './assets/image/';
	// 		        $config['allowed_types'] = 'jpg|png|jpeg';
	// 		        $config['encrypt_name'] = TRUE;
	// 		        $config['max_size']    = 0;
	// 		        $this->upload->initialize($config);
	// 		        if(!empty($_FILES['foto_history_penggunaan']['name']))
	// 		        {
	// 		        if($this->upload->do_upload('foto_history_penggunaan'))
	// 		            {
	// 							$gbr = $this->upload->data();
	// 							$config['image_library']='gd2';
	// 							$config['source_image']='./assets/image/'.$gbr['file_name'];
	// 							$config['create_thumb']= FALSE;
	// 							$config['maintain_ratio']= FALSE;
	// 							$config['quality']='60%';
	// 							$config['width']= 500;
	// 		                	$config['height']= 400;
	// 							$config['new_image']= './assets/image/'.$gbr['file_name'];
	// 							$this->load->library('image_lib', $config);
	// 							$this->image_lib->resize();
	// 		                    $dok=$gbr['file_name'];

	// 		                     $data = array(
	// 								'nama_history_penggunaan' => $this->input->post('nama_history_penggunaan'),
	// 								'nip' => $this->input->post('nip'),
	// 								'id_jabatan' => $this->input->post('id_jabatan'),
	// 								'id_golongan' => $this->input->post('id_golongan'),
	// 								'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 								'no_telp' => $this->input->post('no_telp'),
	// 								'alamat' => $this->input->post('alamat'),
	// 								'foto_history_penggunaan' => $dok,
	// 						);
			                    
			                    

	// 		            }else{
	// 		                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
	// 		                redirect('history_penggunaan');
	// 		            }
	// 		        }
	// 		        else{

	// 		          $data = array(
	// 							'nama_history_penggunaan' => $this->input->post('nama_history_penggunaan'),
	// 							'nip' => $this->input->post('nip'),
	// 							'id_jabatan' => $this->input->post('id_jabatan'),
	// 							'id_golongan' => $this->input->post('id_golongan'),
	// 							'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 								'alamat' => $this->input->post('alamat'),
	// 							'no_telp' => $this->input->post('no_telp'),
	// 						);
			            
	// 		        }
					
				
	// 				$result = $this->m_history_penggunaan->edit_history_penggunaan($data,$id);
	// 				if($result){
	// 					$this->session->set_flashdata('berhasil_edit', 'Record is Added Successfully!');
	// 					redirect(base_url('history_penggunaan'));
	// 				}
	// }

	// function hapus_history_penggunaan(){
	// 	$kode=$this->input->post('kode');
	// 	$this->m_history_penggunaan->hapus_history_penggunaan($kode);
	// 	echo $this->session->set_flashdata('berhasil_hapus','berhasil_hapus');
	// 	redirect('history_penggunaan');
	// }
}