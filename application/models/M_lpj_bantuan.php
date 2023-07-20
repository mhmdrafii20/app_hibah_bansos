
<?php
class M_lpj_bantuan extends CI_Model{

		function get_all_lpj_bantuan(){
			$hsl=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan,lpj_bantuan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND lpj_bantuan.id_proposal_pencairan=proposal_pencairan.id_proposal_pencairan ");
			return $hsl;
		}


		function hapus_lpj_bantuan($kode){
			$hsl=$this->db->query("DELETE FROM lpj_bantuan where id_lpj_bantuan=".$kode."");
			return $hsl;
		}

		public function add_lpj_bantuan($data){
			$this->db->insert("lpj_bantuan", $data);
			return true;
		}

		public function get_lpj_bantuan_by_id($id){
			$query = $this->db->get_where("lpj_bantuan", array("id_lpj_bantuan" => $id));
			return $result = $query->row_array();
		}

		public function edit_lpj_bantuan($data, $id){
			$this->db->where("id_lpj_bantuan", $id);
			$this->db->update("lpj_bantuan", $data);
			return true;
		}

}	
			