
<?php
class M_surat_perintah_perjalanan_dinas extends CI_Model{

		function get_all_surat_perintah_perjalanan_dinas(){
			if($this->session->userdata('level')=="pegawai"){
			$dd=$this->session->userdata('id_pengguna2');
 			$hsl=$this->db->query("SELECT * FROM surat_perintah_perjalanan_dinas,pegawai WHERE surat_perintah_perjalanan_dinas.id_pegawai=pegawai.id_pegawai AND surat_perintah_perjalanan_dinas.id_pegawai='$dd'");
			}else{
				$hsl=$this->db->query("SELECT * FROM surat_perintah_perjalanan_dinas,pegawai WHERE surat_perintah_perjalanan_dinas.id_pegawai=pegawai.id_pegawai");
			}
			return $hsl;
		}


		function hapus_surat_perintah_perjalanan_dinas($kode){
			$hsl=$this->db->query("DELETE FROM surat_perintah_perjalanan_dinas where id_surat_perintah_perjalanan_dinas=".$kode."");
			return $hsl;
		}

		public function add_surat_perintah_perjalanan_dinas($data){
			$this->db->insert("surat_perintah_perjalanan_dinas", $data);
			return true;
		}

		public function get_surat_perintah_perjalanan_dinas_by_id($id){
			$query = $this->db->get_where("surat_perintah_perjalanan_dinas", array("id_surat_perintah_perjalanan_dinas" => $id));
			return $result = $query->row_array();
		}

		public function edit_surat_perintah_perjalanan_dinas($data, $id){
			$this->db->where("id_surat_perintah_perjalanan_dinas", $id);
			$this->db->update("surat_perintah_perjalanan_dinas", $data);
			return true;
		}

}	
			