
<?php
class M_pertimbangan extends CI_Model{

		function get_all_pertimbangan(){
			if($this->session->userdata('level')=="pemohon"){
				$id=$this->session->userdata('id_pengguna2');
				$hsl=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal.id_pemohon='$id'");
			}else{
				$hsl=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal");
			}
			return $hsl;
		}


		function hapus_pertimbangan($kode){
			$hsl=$this->db->query("DELETE FROM pertimbangan where id_pertimbangan=".$kode."");
			return $hsl;
		}

		public function add_pertimbangan($data){
			$this->db->insert("pertimbangan", $data);
			return true;
		}

		public function get_pertimbangan_by_id($id){
			$query = $this->db->get_where("pertimbangan", array("id_pertimbangan" => $id));
			return $result = $query->row_array();
		}

		public function edit_pertimbangan($data, $id){
			$this->db->where("id_pertimbangan", $id);
			$this->db->update("pertimbangan", $data);
			return true;
		}

}	
			