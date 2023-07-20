
<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Penyaluran_bansos extends CI_Controller {

		function __construct(){
		parent::__construct();
		if($this->session->userdata("status2") != "loggg"){
			redirect(base_url("login"));
		}
		$this->load->model("m_penyaluran_bansos");
		$this->load->library("upload");
		$this->load->model("m_data");
	}

	public function index()
	{
		$x["data_penyaluran_bansos"]=$this->m_penyaluran_bansos->get_all_penyaluran_bansos();
		$x["sidebar"]="penyaluran_bansos";
    $this->load->view("header",$x);
    $this->load->view("sidebar");
    $this->load->view("penyaluran_bansos/penyaluran_bansos");
    $this->load->view("footer");
	}


	public function cetak()
	{
		$x["data_penyaluran_bansos"]=$this->m_penyaluran_bansos->get_all_penyaluran_bansos();
		$this->load->view("penyaluran_bansos/cetak",$x);
	}


	public function lihat()
	{
		$x["data_penyaluran_bansos"]=$this->m_penyaluran_bansos->get_all_penyaluran_bansos();
    $x["sidebar"]="penyaluran_bansos2";
		$this->load->view("header",$x);
    $this->load->view("sidebar");
		$this->load->view("penyaluran_bansos/lihat");
		$this->load->view("footer");
	}

	public function filter()
	{	
		$tgl1=$this->input->post("tgl1");
		$tgl2=$this->input->post("tgl2");
		$x["tgl1"]=$this->input->post("tgl1");
		$x["tgl2"]=$this->input->post("tgl2");
		$x["data_penyaluran_bansos"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan,penyaluran_bansos WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND penyaluran_bansos.id_proposal_pencairan=proposal_pencairan.id_proposal_pencairan AND date(tanggal_transfer) BETWEEN date('$tgl1') AND date('$tgl2')");
		$this->load->view("penyaluran_bansos/cetak_filter",$x);
	}

	public function cetak2($id)
	{	
		$x["data_penyaluran_bansos"]=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan,penyaluran_bansos WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND penyaluran_bansos.id_proposal_pencairan=proposal_pencairan.id_proposal_pencairan AND penyaluran_bansos.id_penyaluran_bansos=".$id."")->row_array();
		$this->load->view("penyaluran_bansos/cetak2",$x);
	}
	

		public function simpan_penyaluran_bansos()
	{
				$data["kode_penyaluran_bansos"] = $this->input->post("kode_penyaluran_bansos");
				$data["id_proposal_pencairan"] = $this->input->post("id_proposal_pencairan");
				$id_proposal_pencairan = $this->input->post("id_proposal_pencairan");
				$data["tanggal_transfer"] = $this->input->post("tanggal_transfer");

				$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['bukti_transfer']['name']))
			        {
			        if($this->upload->do_upload('bukti_transfer'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["bukti_transfer"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('penyaluran_bansos');
			            }
			        }

			        $this->db->query("UPDATE proposal_pencairan set penerimaan='1' where id_proposal_pencairan='$id_proposal_pencairan'");
				
				
					$result = $this->m_penyaluran_bansos->add_penyaluran_bansos($data);
					if($result){
						$this->session->set_flashdata("berhasil_simpan", "Record is Added Successfully!");
						redirect(base_url("penyaluran_bansos"));
					}
	}



		public function update_penyaluran_bansos()
	{
		$id = $this->input->post("id_penyaluran_bansos"); 
		
			$data["kode_penyaluran_bansos"] = $this->input->post("kode_penyaluran_bansos");
				$data["id_proposal_pencairan"] = $this->input->post("id_proposal_pencairan");
				$data["tanggal_transfer"] = $this->input->post("tanggal_transfer");

				$config['upload_path'] = './assets/image/';
			        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
			        $config['encrypt_name'] = TRUE;
			        $config['max_size']    = 0;
			        $this->upload->initialize($config);
			        if(!empty($_FILES['bukti_transfer']['name']))
			        {
			        if($this->upload->do_upload('bukti_transfer'))
			            {
								$gbr = $this->upload->data();
			                    $dok=$gbr['file_name'];
			                    	$data["bukti_transfer"] = $dok;

			            }else{
			                $this->session->set_flashdata('gagal_up', 'Record is Added Successfully!');
			                redirect('penyaluran_bansos');
			            }
			        }
				
				
					$result = $this->m_penyaluran_bansos->edit_penyaluran_bansos($data,$id);
					if($result){
						$this->session->set_flashdata("berhasil_edit", "Record is Added Successfully!");
						redirect(base_url("penyaluran_bansos"));
					}
	}

	function hapus_penyaluran_bansos(){
		$kode=$this->input->post("kode");
		$this->m_penyaluran_bansos->hapus_penyaluran_bansos($kode);
		echo $this->session->set_flashdata("berhasil_hapus","berhasil_hapus");
		redirect("penyaluran_bansos");
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
			$id_proposal_pencairan = $this->input->post('id_proposal_pencairan');
			$base_url = base_url();
	        $dt_pertimbangan = $this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND proposal_pencairan.id_proposal_pencairan='".$id_proposal_pencairan."'")->row();
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
	        $lists.='<label>File Proposal Pencairan </label><br>';
	        $lists.='<a target="_blank" style="margin: 2px;" type="button" href="'.$base_url.'assets/image/'.$dt_pertimbangan->file_proposal_pencairan.'" class="btn btn-info mdi mdi-pencil  form-control col-4" > VIEW</a>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Anggaran yg disetujui <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.rupiah3($dt_pertimbangan->anggaran_yg_disetujui).'" name="anggaran_yg_disetujui" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Nama Bank <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->nama_bank.'" readonly>';
	        $lists.='</div>';
	        $lists.='<div class="form-group m-t-20">';
	        $lists.='<label>Nomor Rekening <span style="color: red;">*</span></label>';
	        $lists.='<input type="text" class="form-control" value="'.$dt_pertimbangan->nomor_rekening.'" readonly>';
	        $lists.='</div>';
	        $callback = array('list_barang'=>$lists); 
	        echo json_encode($callback);
	}
	
}
			