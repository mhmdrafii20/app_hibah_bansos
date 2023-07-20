<?php
class M_agenda_kegiatan extends CI_Model{

	function get_all_agenda_kegiatan(){
		$hsl=$this->db->query("SELECT * FROM agenda_kegiatan");
		return $hsl;
	}


	function hapus_agenda_kegiatan($kode){
		$hsl=$this->db->query("DELETE FROM agenda_kegiatan where id_agenda_kegiatan='$kode'");
		return $hsl;
	}

	public function add_agenda_kegiatan($data){
			$this->db->insert('agenda_kegiatan', $data);
			return true;
		}

		public function get_agenda_kegiatan_by_id($id){
			$query = $this->db->get_where('agenda_kegiatan', array('id_agenda_kegiatan' => $id));
			return $result = $query->row_array();
		}

		public function edit_agenda_kegiatan($data, $id){
			$this->db->where('id_agenda_kegiatan', $id);
			$this->db->update('agenda_kegiatan', $data);
			return true;
		}

}	