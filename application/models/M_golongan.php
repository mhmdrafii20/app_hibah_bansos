<?php
class M_golongan extends CI_Model{

	function get_all_golongan(){
		$hsl=$this->db->query("SELECT * FROM golongan");
		return $hsl;
	}


	function hapus_golongan($kode){
		$hsl=$this->db->query("DELETE FROM golongan where id_golongan='$kode'");
		return $hsl;
	}

	public function add_golongan($data){
			$this->db->insert('golongan', $data);
			return true;
		}

		public function get_golongan_by_id($id){
			$query = $this->db->get_where('golongan', array('id_golongan' => $id));
			return $result = $query->row_array();
		}

		public function edit_golongan($data, $id){
			$this->db->where('id_golongan', $id);
			$this->db->update('golongan', $data);
			return true;
		}

}	