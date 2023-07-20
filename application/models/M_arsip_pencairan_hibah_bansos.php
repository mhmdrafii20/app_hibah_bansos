<?php
class M_arsip_pencairan_hibah_bansos extends CI_Model{

	function get_all_arsip_pencairan_hibah_bansos(){
		$hsl=$this->db->query("SELECT * FROM arsip_pencairan_hibah_bansos");
		return $hsl;
	}


	function hapus_arsip_pencairan_hibah_bansos($kode){
		$hsl=$this->db->query("DELETE FROM arsip_pencairan_hibah_bansos where id_arsip_pencairan_hibah_bansos='$kode'");
		return $hsl;
	}

	public function add_arsip_pencairan_hibah_bansos($data){
			$this->db->insert('arsip_pencairan_hibah_bansos', $data);
			return true;
		}

		public function get_arsip_pencairan_hibah_bansos_by_id($id){
			$query = $this->db->get_where('arsip_pencairan_hibah_bansos', array('id_arsip_pencairan_hibah_bansos' => $id));
			return $result = $query->row_array();
		}

		public function edit_arsip_pencairan_hibah_bansos($data, $id){
			$this->db->where('id_arsip_pencairan_hibah_bansos', $id);
			$this->db->update('arsip_pencairan_hibah_bansos', $data);
			return true;
		}

}	