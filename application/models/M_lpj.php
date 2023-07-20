<?php
class M_lpj extends CI_Model{

	function get_all_lpj(){
		$hsl=$this->db->query("SELECT * FROM lpj,program where lpj.id_program=program.id_program");
		return $hsl;
	}


	function hapus_lpj($kode){
		$hsl=$this->db->query("DELETE FROM lpj where id_lpj='$kode'");
		return $hsl;
	}

	public function add_lpj($data){
			$this->db->insert('lpj', $data);
			return true;
		}

		public function get_lpj_by_id($id){
			$query = $this->db->get_where('lpj', array('id_lpj' => $id));
			return $result = $query->row_array();
		}

		public function edit_lpj($data, $id){
			$this->db->where('id_lpj', $id);
			$this->db->update('lpj', $data);
			return true;
		}

}	