
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Proposal_pencairan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_proposal_pencairan");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_proposal_pencairan"]=$this->m_proposal_pencairan->get_all_proposal_pencairan();
		$x["sidebar"]="proposal_pencairan";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("proposal_pencairan/proposal_pencairan");
    $this->load->view("footer");
	}

	public function view()
	{
		$jenis_penerima = $this->input->post("jenis_penerima");

		if ($jenis_penerima=="0") {
			$x['data_proposal_pencairan']=$this->m_proposal_pencairan->get_all_proposal_pencairan();
		}elseif ($jenis_penerima!="0") {
			$x['data_proposal_pencairan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND jenis_penerima='$jenis_penerima'");
		}
		
		$x['jenis_penerima']=$jenis_penerima;
		$x['sidebar']="proposal_pencairan";
		$this->load->view("header",$x);
	    $this->load->view("sidebar");
	    $this->load->view("proposal_pencairan/proposal_pencairan");
	    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_proposal_pencairan"]=$this->m_proposal_pencairan->get_all_proposal_pencairan();
		$this->load->view("proposal_pencairan/cetak",$x);
	}


	public function lihat()
	{
		$x["data_proposal_pencairan"]=$this->m_proposal_pencairan->get_all_proposal_pencairan();
    $x["sidebar"]="proposal_pencairan2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("proposal_pencairan/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$jenis_penerima=$this->input->post("jenis_penerima");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["jenis_penerima"]=$this->input->post("jenis_penerima");
		if ($jenis_penerima=="0") {
			$x["data_proposal_pencairan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND date(tanggal_proposal_pencairan) BETWEEN date('$tgl1') AND date('$tgl2')");
		}elseif ($jenis_penerima!="0") {
			$x["data_proposal_pencairan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND jenis_penerima='$jenis_penerima' AND date(tanggal_proposal_pencairan) BETWEEN date('$tgl1') AND date('$tgl2')");
		}
		
		$this->load->view("proposal_pencairan/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_proposal_pencairan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND proposal_pencairan.id_proposal_pencairan=".$id."")->row_array();
		$this->load->view("proposal_pencairan/cetak2",$x);
	}

	public function cetak3($id)
	{	
		$x["data_proposal_pencairan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND proposal_pencairan.id_proposal_pencairan=".$id."")->row_array();
		$this->load->view("proposal_pencairan/cetak3",$x);
	}
	

		public function simpan_proposal_pencairan()
	{
				$data["kode_proposal_pencairan"] = $this->input->post("kode_proposal_pencairan");
				$data["id_pertimbangan"] = $this->input->post("id_pertimbangan");
				$data["tanggal_proposal_pencairan"] = $this->input->post("tanggal_proposal_pencairan");
				$data["nama_bank"] = $this->input->post("nama_bank");
				$data["nomor_rekening"] = $this->input->post("nomor_rekening");
				$data["catatan_pemohon"] = $this->input->post("catatan_pemohon");

				$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_proposal_pencairan']['name']))
			        {
			        if($this->upload->do_upload('file_proposal_pencairan'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["file_proposal_pencairan"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('proposal_pencairan');
			            }
			        }
				
				
					$result = $this->m_proposal_pencairan->add_proposal_pencairan($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("proposal_pencairan"));
					}
	}



		public function update_proposal_pencairan()
	{
		$id = $this->input->post("id_proposal_pencairan"); 
		
				$data["kode_proposal_pencairan"] = $this->input->post("kode_proposal_pencairan");
				$data["id_pertimbangan"] = $this->input->post("id_pertimbangan");
				$data["tanggal_proposal_pencairan"] = $this->input->post("tanggal_proposal_pencairan");
				$data["nama_bank"] = $this->input->post("nama_bank");
				$data["nomor_rekening"] = $this->input->post("nomor_rekening");
				$data["catatan_pemohon"] = $this->input->post("catatan_pemohon");

				$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['file_proposal_pencairan']['name']))
			        {
			        if($this->upload->do_upload('file_proposal_pencairan'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["file_proposal_pencairan"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('proposal_pencairan');
			            }
			        }
				
				
					$result = $this->m_proposal_pencairan->edit_proposal_pencairan($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("proposal_pencairan"));
					}
	}

	function hapus_proposal_pencairan(){
		$kode=$this->input->post("kode");
		$this->m_proposal_pencairan->hapus_proposal_pencairan($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("proposal_pencairan");
	}


		public function carihrg()
	{

		function rupiah3($angka){
  
  $hasil_rupiah = "" . number_format((int)$angka,0,',','.');
  return $hasil_rupiah;
}

		function tgl_indo3($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
			$id_pertimbangan = $this->input->post('id_pertimbangan');
			$base_url = base_url();
	        $dt_pertimbangan = $this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND pertimbangan.id_pertimbangan='".$id_pertimbangan."'")->row();
	        $lists='<div class="form-group m-t-20">';
	        $lists.='<label>Pemohon <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->nama_lengkap.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Judul Proposal <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->judul_proposal.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Jenis Penerima <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->jenis_penerima.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Nama Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->nama_penerima.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>File Proposal </label><br>';
	        $lists.='<a target="_blank" style="margin: 2px;" type="button" href="'.$base_url.'assets/image/'.$dt_pertimbangan->file_proposal.'" class="btn btn-info mdi mdi-pencil  form-control col-4" > VIEW</a>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Anggaran yg diajukan <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.rupiah3($dt_pertimbangan->anggaran_yg_diajukan).'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Anggaran yg disetujui <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.rupiah3($dt_pertimbangan->anggaran_yg_disetujui).'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Tanggal Pertimbangan <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.tgl_indo3($dt_pertimbangan->tanggal_pertimbangan).'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Status Pertimbangan <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->status_pertimbangan.'" readonly>';
	        $lists.='</div>';
	        $callback = array('list_barang'=>$lists); 
	        echo json_encode($callback);
	}


}
			