
<?php
class M_pengajuan_cuti extends CI_Model{

		function get_all_pengajuan_cuti(){
			if ($this->session->userdata('level')=="pegawai") {
				$id=$this->session->userdata('id_pengguna2');
				$hsl=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai AND pengajuan_cuti.id_pegawai='$id'");
			}else{
				$hsl=$this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai");
			}
			return $hsl;
		}


		function hapus_pengajuan_cuti($kode){
			$hsl=$this->db->query("DELETE FROM pengajuan_cuti where id_pengajuan_cuti=".$kode."");
			return $hsl;
		}

		public function add_pengajuan_cuti($data){
			$this->db->insert("pengajuan_cuti", $data);
			return true;
		}

		public function get_pengajuan_cuti_by_id($id){
			$query = $this->db->get_where("pengajuan_cuti", array("id_pengajuan_cuti" => $id));
			return $result = $query->row_array();
		}

		public function edit_pengajuan_cuti($data, $id){
			$this->db->where("id_pengajuan_cuti", $id);
			$this->db->update("pengajuan_cuti", $data);
			return true;
		}

}	
			