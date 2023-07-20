
<?php
class M_proposal extends CI_Model{

		function get_all_proposal(){
			if($this->session->userdata('level')=="pemohon"){
				$id=$this->session->userdata('id_pengguna2');
				$hsl=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND proposal.id_pemohon='$id'");
			}else{
				$hsl=$this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon");
			}
			
			return $hsl;
		}


		function hapus_proposal($kode){
			$hsl=$this->db->query("DELETE FROM proposal where id_proposal=".$kode."");
			return $hsl;
		}

		public function add_proposal($data){
			$this->db->insert("proposal", $data);
			return true;
		}

		public function get_proposal_by_id($id){
			$query = $this->db->get_where("proposal", array("id_proposal" => $id));
			return $result = $query->row_array();
		}

		public function edit_proposal($data, $id){
			$this->db->where("id_proposal", $id);
			$this->db->update("proposal", $data);
			return true;
		}

}	
			