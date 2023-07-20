


 <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Stats -->
      <style type="text/css">
  #munculkan{
      display: none;
    }
  @media only screen
  and (min-device-width : 320px) and (max-device-width : 980px){
    #hilangkan{
      display: none;
    }
    #munculkan{
      display: inline;
    }
  }
</style>
     <section id="server-processing">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                 <h4 class="card-title"> <b>DAFTAR PENGAJUAN PROPOSAL</b>  
                   <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGAJUAN PROPOSAL</button> <?php endif;?></h4>
                

               
                </div>

                 <div class="row">
                   
                              <div class="col-md-3" style="margin-left:20px;">
                                <form action="<?php echo site_url("proposal/view") ?>" method="post">
                                  <select class="form-control" name="jenis_penerima"  >
                                    <option value="0">--pilih jenis penerima--</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Rumah Ibadah")?'selected':'';?><?php endif;?> >Rumah Ibadah</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Lembaga atau Badan")?'selected':'';?><?php endif;?> >Lembaga atau Badan</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Organisasi Kemasyarakatan atau Keagamaan")?'selected':'';?><?php endif;?> >Organisasi Kemasyarakatan atau Keagamaan</option>
                                </select>
                              </div>

                              <div class="col-md-3">
                                  <select class="form-control" name="status_proposal" >
                                    <option value="0">--pilih status proposal--</option>
                                    <option <?php if(!empty($status_proposal)):?><?= ($status_proposal=="Diverifikasi")?'selected':'';?><?php endif;?> >Diverifikasi</option>
                                    <option <?php if(!empty($status_proposal)):?><?= ($status_proposal=="Ditolak")?'selected':'';?><?php endif;?> >Ditolak</option>
                                    <option <?php if(!empty($status_proposal)):?><?= ($status_proposal=="Belum Diverifikasi")?'selected':'';?><?php endif;?> >Belum Diverifikasi</option>
                                </select>
                              </div>

                              <div class="col-md-2">
                                <input type="submit" class="btn btn-info" value="View" >
                              </div>
                            </form>
                </div>

                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
				<th>Kode Proposal</th>
          <?php if($this->session->userdata('level')!="pemohon"):?>
        <th>Pemohon</th>
         <?php endif;?>
				<th>Jenis Penerima</th>
        <th>Judul Proposal</th>
				<th>Anggaran Yg Diajukan</th>
				<th>File Proposal</th>
				<th>Tanggal Pengajuan</th>
				<th>Status Proposal</th>
        <th>Catatan Petugas</th>
          <?php if($this->session->userdata('level')!="user"):?>
				<?php if($this->session->userdata('level')!="pemohon"):?>
                          <th style="text-align: right;">Action</th>
                          <?php endif;?>
                          <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_proposal->result_array() as $i) :
                                            $id_proposal=$i["id_proposal"];
                                          ?>
                                    
                                            <tr>
                                              
				<td><?php echo $i["kode_proposal"];?></td>
          <?php if($this->session->userdata('level')!="pemohon"):?>
        <td><?php echo $i["nama_lengkap"];?></td>
         <?php endif;?>
        <td><?php echo $i["jenis_penerima"];?></td>
        <td><?php echo $i["judul_proposal"];?></td>
        <td><?php echo rupiah($i["anggaran_yg_diajukan"]);?></td>
         <?php if(!empty($i["file_proposal"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_proposal'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>
        <td><?php echo tgl_indo($i["tanggal_pengajuan"]);?></td>
        <td><?php echo $i["status_proposal"];?></td>
        <td><?php echo $i["catatan_petugas_"];?></td>
                                            
                                             <?php if($this->session->userdata('level')!="user"):?>
                                           <?php if($this->session->userdata('level')!="pemohon"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                   <?php if($i['status_proposal']=="Belum Diverifikasi"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#konfir<?php echo $id_proposal;?>"> KONFIRMASI</button> 
                                              <?php endif;?>   
                                                  
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_proposal;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_proposal;?>"> DELETE</button>
                                                
                                                </div>
                                              </td>
                                              <?php endif;?>
                                              <?php endif;?>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
      </div>
    </div>
  </div>






    <form  action="<?php echo base_url()."proposal/simpan_proposal"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PENGAJUAN PROPOSAL</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">


                            <?php 
                        $this->db->select('RIGHT(proposal.id_proposal,3) as kode', FALSE);
        $this->db->order_by('id_proposal', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('proposal');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PP".$kodemax;

        ?>

                                <div class="form-group m-t-20">
                                    <label>Kode Proposal <span style="color: red;">*</span></label>
                                    <input value="<?php echo $kodejadi;?>" readonly type="text" class="form-control" name="kode_proposal" required >
                                </div>
                     
                              <?php if($this->session->userdata('level')!="pemohon"):?>                  							
                                <div class="form-group m-t-20">
                                    <label> Pemohon <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pemohon" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_pemohon'];?>"><?php echo $key['nama_lengkap'];?> | <?php echo $key['jenis_penerima'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>
                              <?php else:?>
                                <div class="form-group m-t-20">
                                    <label>Pemohon <span style="color: red;">*</span></label>
                                    <input type="hidden" readonly value="<?php echo $this->session->userdata('id_pengguna2');?>" class="form-control" name="id_pemohon"  >
                                    <input type="text" readonly value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control">
                                </div>
                              <?php endif;?>

																<div class="form-group m-t-20">
                                    <label>Judul Proposal <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="judul_proposal" required  placeholder="Judul Proposal" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Anggaran Yg Diajukan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control uang" name="anggaran_yg_diajukan" required  placeholder="Anggaran Yg Diajukan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Pengajuan <span style="color: red;">*</span></label>
                                    <input value="<?php echo date('Y-m-d');?>" readonly type="date" class="form-control" name="tanggal_pengajuan" required  placeholder="Tanggal Pengajuan" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>File Proposal <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="file_proposal" required   >
                                </div>

																



                                


                               

                               

                              
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>







  <?php foreach ($data_proposal->result_array() as $i) :
                                            $id_proposal=$i["id_proposal"];
                                          ?>
       <form  action="<?php echo base_url()."proposal/update_proposal"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_proposal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PENGAJUAN PROPOSAL</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">

                  						

																 <div class="form-group m-t-20">
                                    <label>Kode Proposal <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['kode_proposal'];?>" readonly type="text" class="form-control" name="kode_proposal" required >
                                </div>
                     

                                <div class="form-group m-t-20">
                                    <label> Pemohon <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pemohon" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon")->result_array() as $key):?>
                                        <option <?= ($i['id_pemohon']==$key['id_pemohon'])?'selected':'';?> value="<?php echo $key['id_pemohon'];?>"><?php echo $key['nama_lengkap'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Judul Proposal <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['judul_proposal'];?>" type="text" class="form-control" name="judul_proposal" required  placeholder="Judul Proposal" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Anggaran Yg Diajukan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['anggaran_yg_diajukan'];?>" type="text" class="form-control uang" name="anggaran_yg_diajukan" required  placeholder="Anggaran Yg Diajukan" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Tanggal Pengajuan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_pengajuan'];?>" type="date" class="form-control" name="tanggal_pengajuan" required  placeholder="Tanggal Pengajuan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File Proposal </label>
                                    <input  type="file" class="form-control" name="file_proposal"    >
                                </div>

                               
                                


                                
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">UPDATE</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



  <?php foreach ($data_proposal->result_array() as $i) :
                                            $id_proposal=$i["id_proposal"];
                                          ?>
       <form  action="<?php echo base_url()."proposal/update_proposal2"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="konfir<?php echo $id_proposal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>KONFIRMASI PENGAJUAN PROPOSAL</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_proposal" value="<?php echo $id_proposal;?>">
                       <input type="hidden" name="nama_lengkap" value="<?php echo $i['nama_lengkap'];?>">
                       <input type="hidden" name="no_hp" value="<?php echo $i['no_hp_pemohon'];?>">

                              


                               <div class="form-group m-t-20">
                                    <label>Status Proposal <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_proposal" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($i['status_proposal'] == "Diverifikasi")?'selected': '' ?> >Diverifikasi</option>
                                      <option <?= ($i['status_proposal'] == "Ditolak")?'selected': '' ?> >Ditolak</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan Petugas </label>
                                   <textarea class="form-control" name="catatan_petugas_" ><?php echo $i["catatan_petugas_"];?></textarea>
                                </div>
                                


                                
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">KONFIRMASI</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



   <?php foreach ($data_proposal->result_array() as $i) :
                                            $id_proposal=$i["id_proposal"];
                                          ?>
       <form  action="<?php echo base_url()."proposal/hapus_proposal"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_proposal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PENGAJUAN PROPOSAL</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_proposal;?>">
                         Apakah Anda yakin ingin menghapus data ini?
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-warning">HAPUS</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>


  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $().DataTable();
</script>


<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>
<?php if($this->session->flashdata("berhasil_simpan") == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: "success",
  text: "Proposal Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Proposal Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit2") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Proposal Berhasil di KONFIRMASI"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Proposal Berhasil di HAPUS"
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata("gagal_up") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "error",
  text: "Format File Gambar SALAH"
})
 </script>
<?php endif; ?>





			