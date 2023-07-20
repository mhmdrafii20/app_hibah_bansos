<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		function __construct(){
		parent::__construct();
       $this->load->model('m_pengguna');
       $this->load->model('m_pemohon');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function reg()
	{
		$this->load->view('register');
	}

		public function aksi_reg()
	{
		if ($this->input->post('password')!=$this->input->post('password2')) {
			$this->session->set_flashdata('saw', 'Record is Added Successfully!');
			redirect(base_url('login/reg'));
		}
		$nik=$this->input->post('nik');
		$cari_user=$this->db->query("SELECT * FROM pemohon where nik='$nik'")->num_rows();

		if ($cari_user>0) {
			$this->session->set_flashdata('usernameada', 'Record is Added Successfully!');
			redirect(base_url('login/reg'));
		}
				$data = array(
								'status_pemohon' => "Menunggu Konfirmasi",
								'nik' => $this->input->post('nik'),
								'nama_lengkap' => $this->input->post('nama_lengkap'),
								'jenis_penerima' => $this->input->post('jenis_penerima'),
								'nama_penerima' => $this->input->post('nama_penerima'),
								'alamat_penerima' => $this->input->post('alamat_penerima'),
								'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
							);
				
					$result = $this->m_pemohon->add_pemohon($data);
					if($result){

						
						
						$data_session = array(
							'id_pengguna2' => $this->db->insert_id(),
							'username2' => $this->input->post('nama_lengkap'),
							'nama_lengkap' => $this->input->post('nama_lengkap'),
							'foto' => "",
							'level' => "pemohon",
						 	'status2' => "loggg"
						);
							$this->session->set_userdata($data_session);
							$this->session->set_flashdata('berhasil_reg', 'Record is Added Successfully!');
							redirect("dashboard");
					}
	}

	function cek(){

		$username = $this->input->post('username');
		$no_hp = $this->input->post('no_hp');

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();

        // jika usernya ada
        if ($result) {
                if ($no_hp==$result['no_hp']) {
                	$x['id_pengguna'] = $result['id_pengguna'];
					$this->load->view('lupa_pass2',$x);
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login/lupa");
                }
           
        }  else{
			$this->session->set_flashdata('username_salah', ' ');
			redirect("login/lupa");
		}

	}

	function cek2(){

		$id_pengguna = $this->input->post('id_pengguna');
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');
        if ($password==$password2) {
        	$data = array(
								'password' => password_hash($password, PASSWORD_DEFAULT)
							);
				
			$this->m_pengguna->edit_pengguna($data,$id_pengguna);
			$this->session->set_flashdata('berhasil_up', 'Record is Added Successfully!');
			redirect(base_url('login'));
        }  else{
			$this->session->set_flashdata('passss', ' ');
			$x['id_pengguna'] = $id_pengguna;
			$this->load->view('lupa_pass2',$x);
		}

	}

	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

        $result = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $result2 = $this->db->get_where('pemohon', ['nik' => $username])->row_array();
        $result3 = $this->db->get_where('pegawai', ['nip' => $username])->row_array();

        // jika usernya ada
        if ($result) {
                if (password_verify($password, $result['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result['id_pengguna'],
							'username2' => $result['username'],
							'nama_lengkap' => $result['nama_lengkap'],
							'foto' => $result['foto_pengguna'],
							'level' => $result['level'],
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        } elseif ($result2) {
                if (password_verify($password, $result2['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result2['id_pemohon'],
							'username2' => $result2['nama_lengkap'],
							'nama_lengkap' => $result2['nama_lengkap'],
							'foto' => "",
							'level' => "pemohon",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        }elseif ($result3) {
                if (password_verify($password, $result3['password'])) {
                    $data_session = array(
							'id_pengguna2' => $result3['id_pegawai'],
							'username2' => $result3['nama_pegawai'],
							'nama_lengkap' => $result3['nama_pegawai'],
							'foto' => "",
							'level' => "pegawai",
						 	'status2' => "loggg"
						);
					$this->session->set_userdata($data_session);
					redirect("dashboard");
                } else {
                    $this->session->set_flashdata('pw_salah', ' ');
					redirect("login");
                }
           
        }  else{
			$this->session->set_flashdata('username_salah', ' ');
			redirect("login");
		}

	}


			public function logout(){
			$this->session->sess_destroy();
			redirect("login");
		}
}
