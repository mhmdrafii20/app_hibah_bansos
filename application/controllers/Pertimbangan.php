
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Pertimbangan extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_pertimbangan");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_pertimbangan"]=$this->m_pertimbangan->get_all_pertimbangan();
		$x["sidebar"]="pertimbangan";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("pertimbangan/pertimbangan");
    $this->load->view("footer");
	}

	public function view()
	{
		$jenis_penerima = $this->input->post("jenis_penerima");
		$status_pertimbangan = $this->input->post("status_pertimbangan");

		if (($jenis_penerima=="0")AND($status_pertimbangan=="0")) {
			$x['data_pertimbangan']=$this->m_pertimbangan->get_all_pertimbangan();
		}elseif (($jenis_penerima!="0")AND($status_pertimbangan=="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND jenis_penerima='$jenis_penerima'");
		}elseif (($jenis_penerima=="0")AND($status_pertimbangan!="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND pertimbangan.status_pertimbangan='$status_pertimbangan'");
		}elseif (($jenis_penerima!="0")AND($status_pertimbangan!="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND pertimbangan.status_pertimbangan='$status_pertimbangan' AND jenis_penerima='$jenis_penerima'");
		}
		$x['jenis_penerima']=$jenis_penerima;
		$x['status_pertimbangan']=$status_pertimbangan;
		$x['sidebar']="pertimbangan";
		$this->load->view("header",$x);
	    $this->load->view("sidebar");
	    $this->load->view("pertimbangan/pertimbangan");
	    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_pertimbangan"]=$this->m_pertimbangan->get_all_pertimbangan();
		$this->load->view("pertimbangan/cetak",$x);
	}


	public function lihat()
	{
		$x["data_pertimbangan"]=$this->m_pertimbangan->get_all_pertimbangan();
    $x["sidebar"]="pertimbangan2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("pertimbangan/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$jenis_penerima=$this->input->post("jenis_penerima");
		$status_pertimbangan=$this->input->post("status_pertimbangan");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["jenis_penerima"]=$this->input->post("jenis_penerima");
		$x["status_pertimbangan"]=$this->input->post("status_pertimbangan");
		if (($jenis_penerima=="0")AND($status_pertimbangan=="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND date(tanggal_pertimbangan) BETWEEN date('$tgl1') AND date('$tgl2')");
		}elseif (($jenis_penerima!="0")AND($status_pertimbangan=="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND jenis_penerima='$jenis_penerima' AND date(tanggal_pertimbangan) BETWEEN date('$tgl1') AND date('$tgl2') ");
		}elseif (($jenis_penerima=="0")AND($status_pertimbangan!="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND pertimbangan.status_pertimbangan='$status_pertimbangan' AND date(tanggal_pertimbangan) BETWEEN date('$tgl1') AND date('$tgl2') ");
		}elseif (($jenis_penerima!="0")AND($status_pertimbangan!="0")) {
			$x['data_pertimbangan']=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND pertimbangan.status_pertimbangan='$status_pertimbangan' AND jenis_penerima='$jenis_penerima' AND date(tanggal_pertimbangan) BETWEEN date('$tgl1') AND date('$tgl2') ");
		}
		$this->load->view("pertimbangan/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_pertimbangan"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND pertimbangan.id_pertimbangan=".$id."")->row_array();
		$this->load->view("pertimbangan/cetak2",$x);
	}
	

		public function simpan_pertimbangan()
	{
				$data["kode_pertimbangan"] = $this->input->post("kode_pertimbangan");
				$data["id_proposal"] = $this->input->post("id_proposal");
				$data["anggaran_yg_disetujui"] = str_replace(".", "", $this->input->post("anggaran_yg_disetujui"));
				$data["tanggal_pertimbangan"] = $this->input->post("tanggal_pertimbangan");
				$data["status_pertimbangan"] = $this->input->post("status_pertimbangan");
				$status_pertimbangan = $this->input->post("status_pertimbangan");
				$data["catatan_petugas_"] = $this->input->post("catatan_petugas_");

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['bukti_survey']['name']))
			        {
			        if($this->upload->do_upload('bukti_survey'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["bukti_survey"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pertimbangan');
			            }
			        }

			        if($this->input->post("notif")==1){
			        	$no_hp=$this->input->post("no_hp_pemohon");
			        	$nama_lengkap=$this->input->post("nama_lengkap");
$userkey = 'fbb13a7909ae';
$passkey = '748411ab05590d3e375c4b66';
$telepon = $no_hp;
$message = 'Yth Bpk/Ibu '.$nama_lengkap.'

Pengajuan proposal bantuan sosial Anda telah dikonfirmasi, berdasarkan hasil dari pertimbangan maka kami putuskan pengajuan Anda '.$status_pertimbangan.'';
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
			        }
				
				
					$result = $this->m_pertimbangan->add_pertimbangan($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("pertimbangan"));
					}
	}



		public function update_pertimbangan()
	{
		$id = $this->input->post("id_pertimbangan"); 
		
				$data["kode_pertimbangan"] = $this->input->post("kode_pertimbangan");
				$data["id_proposal"] = $this->input->post("id_proposal");
				$data["anggaran_yg_disetujui"] = str_replace(".", "", $this->input->post("anggaran_yg_disetujui"));
				$data["tanggal_pertimbangan"] = $this->input->post("tanggal_pertimbangan");
				$data["status_pertimbangan"] = $this->input->post("status_pertimbangan");
				$data["catatan_petugas_"] = $this->input->post("catatan_petugas_");

					$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['bukti_survey']['name']))
			        {
			        if($this->upload->do_upload('bukti_survey'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["bukti_survey"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('pertimbangan');
			            }
			        }
				
				
					$result = $this->m_pertimbangan->edit_pertimbangan($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("pertimbangan"));
					}
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
			$id_proposal = $this->input->post('id_proposal');
			$base_url = base_url();
	        $dt_proposal = $this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.id_proposal='".$id_proposal."'")->row();
	        $lists='<div class="form-group m-t-20">';
	        $lists.='<label>Pemohon <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_proposal->nama_lengkap.'" name="nama_lengkap" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>No HP/WA Pemohon <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_proposal->no_hp_pemohon.'" name="no_hp_pemohon" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Jenis Penerima <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_proposal->jenis_penerima.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Nama Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_proposal->nama_penerima.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Judul Proposal <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_proposal->judul_proposal.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Anggaran yg diajukan <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.rupiah3($dt_proposal->anggaran_yg_diajukan).'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>File Proposal </label><br>';
	        $lists.='<a target="_blank" style="margin: 2px;" type="button" href="'.$base_url.'assets/image/'.$dt_proposal->file_proposal.'" class="btn btn-info mdi mdi-pencil  form-control col-4" > VIEW</a>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Tanggal Pengajuan <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.tgl_indo3($dt_proposal->tanggal_pengajuan).'" readonly>';
	        $lists.='</div>';
	        $callback = array('list_barang'=>$lists); 
	        echo json_encode($callback);
	}

	function hapus_pertimbangan(){
		$kode=$this->input->post("kode");
		$this->m_pertimbangan->hapus_pertimbangan($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("pertimbangan");
	}
}
			