
<?php
class M_penyaluran_bansos extends CI_Model{

		function get_all_penyaluran_bansos(){
			$hsl=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan,penyaluran_bansos WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND penyaluran_bansos.id_proposal_pencairan=proposal_pencairan.id_proposal_pencairan");
			return $hsl;
		}


		function hapus_penyaluran_bansos($kode){
			$hsl=$this->db->query("DELETE FROM penyaluran_bansos where id_penyaluran_bansos=".$kode."");
			return $hsl;
		}

		public function add_penyaluran_bansos($data){
			$this->db->insert("penyaluran_bansos", $data);
			return true;
		}

		public function get_penyaluran_bansos_by_id($id){
			$query = $this->db->get_where("penyaluran_bansos", array("id_penyaluran_bansos" => $id));
			return $result = $query->row_array();
		}

		public function edit_penyaluran_bansos($data, $id){
			$this->db->where("id_penyaluran_bansos", $id);
			$this->db->update("penyaluran_bansos", $data);
			return true;
		}

}	
			