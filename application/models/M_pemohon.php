
<?php
class M_pemohon extends CI_Model{

		function get_all_pemohon(){
			$hsl=$this->db->query("SELECT * FROM pemohon");
			return $hsl;
		}


		function hapus_pemohon($kode){
			$hsl=$this->db->query("DELETE FROM pemohon where id_pemohon=".$kode."");
			return $hsl;
		}

		public function add_pemohon($data){
			$this->db->insert("pemohon", $data);
			return true;
		}

		public function get_pemohon_by_id($id){
			$query = $this->db->get_where("pemohon", array("id_pemohon" => $id));
			return $result = $query->row_array();
		}

		public function edit_pemohon($data, $id){
			$this->db->where("id_pemohon", $id);
			$this->db->update("pemohon", $data);
			return true;
		}

}	
			