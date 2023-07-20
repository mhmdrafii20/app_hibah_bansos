
<?php
class M_proposal_pencairan extends CI_Model{

		function get_all_proposal_pencairan(){
			if($this->session->userdata('level')=="pemohon"){
				$id=$this->session->userdata('id_pengguna2');
				$hsl=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan AND proposal.id_pemohon='$id'");
			}else{
				$hsl=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan");
			}
			return $hsl;
		}


		function hapus_proposal_pencairan($kode){
			$hsl=$this->db->query("DELETE FROM proposal_pencairan where id_proposal_pencairan=".$kode."");
			return $hsl;
		}

		public function add_proposal_pencairan($data){
			$this->db->insert("proposal_pencairan", $data);
			return true;
		}

		public function get_proposal_pencairan_by_id($id){
			$query = $this->db->get_where("proposal_pencairan", array("id_proposal_pencairan" => $id));
			return $result = $query->row_array();
		}

		public function edit_proposal_pencairan($data, $id){
			$this->db->where("id_proposal_pencairan", $id);
			$this->db->update("proposal_pencairan", $data);
			return true;
		}

}	
			