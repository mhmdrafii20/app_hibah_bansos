
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Lpj_bantuan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_lpj_bantuan");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_lpj_bantuan"]=$this->m_lpj_bantuan->get_all_lpj_bantuan();
		$x["sidebar"]="lpj_bantuan";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("lpj_bantuan/lpj_bantuan");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_lpj_bantuan"]=$this->m_lpj_bantuan->get_all_lpj_bantuan();
		$this->load->view("lpj_bantuan/cetak",$x);
	}


	public function lihat()
	{
		$x["data_lpj_bantuan"]=$this->m_lpj_bantuan->get_all_lpj_bantuan();
    $x["sidebar"]="lpj_bantuan2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("lpj_bantuan/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_lpj_bantuan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan,lpj_bantuan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND lpj_bantuan.id_proposal_pencairan=proposal_pencairan.id_proposal_pencairan  AND date(tanggal_lpj) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("lpj_bantuan/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_lpj_bantuan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan,lpj_bantuan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND lpj_bantuan.id_proposal_pencairan=proposal_pencairan.id_proposal_pencairan  AND lpj_bantuan.id_lpj_bantuan=".$id."")->row_array();
		$this->load->view("lpj_bantuan/cetak2",$x);
	}
	

		public function simpan_lpj_bantuan()
	{
				$anggaran_yg_disetujui = str_replace(".", "", $this->input->post("anggaran_yg_disetujui"));
				$realisasi_anggaran = str_replace(".", "", $this->input->post("realisasi_anggaran"));;
				$sisa=$anggaran_yg_disetujui-$realisasi_anggaran;
				if ($sisa<0) {
					 $this->session->set_flashdata('gagal_up2', 'Record is Added Successfully!');
			                redirect('lpj_bantuan');
				}
				$data["id_proposal_pencairan"] = $this->input->post("id_proposal_pencairan");
				$data["bendahara"] = $this->input->post("bendahara");
				$data["uraian"] = $this->input->post("uraian");
				$data["realisasi_anggaran"] = str_replace(".", "", $this->input->post("realisasi_anggaran"));;
				$data["sisa_anggaran"] = $sisa;
				$data["keterangan"] = $this->input->post("keterangan");
				$data["tanggal_lpj"] = $this->input->post("tanggal_lpj");

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['foto_bukti']['name']))
			        {
			        if($this->upload->do_upload('foto_bukti'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["foto_bukti"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('lpj_bantuan');
			            }
			        }

					

			       
				
					$result = $this->m_lpj_bantuan->add_lpj_bantuan($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("lpj_bantuan"));
					}
	}



		public function update_lpj_bantuan()
	{
		$id = $this->input->post("id_lpj_bantuan"); 
		
			$data["id_proposal_pencairan"] = $this->input->post("id_proposal_pencairan");
				$data["bendahara"] = $this->input->post("bendahara");
				$data["uraian"] = $this->input->post("uraian");
				$data["realisasi_anggaran"] = str_replace(".", "", $this->input->post("realisasi_anggaran"));;
				$data["sisa_anggaran"] = $sisa;
				$data["keterangan"] = $this->input->post("keterangan");
				$data["tanggal_lpj"] = $this->input->post("tanggal_lpj");

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['foto_bukti']['name']))
			        {
			        if($this->upload->do_upload('foto_bukti'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["foto_bukti"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('lpj_bantuan');
			            }
			        }

			        

			       
				
				
					$result = $this->m_lpj_bantuan->edit_lpj_bantuan($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("lpj_bantuan"));
					}
	}

	function hapus_lpj_bantuan(){
		$kode=$this->input->post("kode");
		$this->m_lpj_bantuan->hapus_lpj_bantuan($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("lpj_bantuan");
	}
}
			