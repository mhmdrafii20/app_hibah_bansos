<?php
class M_history_penggunaan extends CI_Model{

	function get_all_history_penggunaan(){
		$hsl=$this->db->query("SELECT * FROM history_penggunaan,pengguna where history_penggunaan.id_pengguna=pengguna.id_pengguna");
		return $hsl;
	}


	function hapus_history_penggunaan($kode){
		$hsl=$this->db->query("DELETE FROM history_penggunaan where id_history_penggunaan='$kode'");
		return $hsl;
	}

	public function add_history_penggunaan($data){
			$this->db->insert('history_penggunaan', $data);
			return true;
		}

		public function get_history_penggunaan_by_id($id){
			$query = $this->db->get_where('history_penggunaan', array('id_history_penggunaan' => $id));
			return $result = $query->row_array();
		}

		public function edit_history_penggunaan($data, $id){
			$this->db->where('id_history_penggunaan', $id);
			$this->db->update('history_penggunaan', $data);
			return true;
		}

}	