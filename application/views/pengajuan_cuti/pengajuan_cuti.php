


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
                 <h4 class="card-title"> <b>DAFTAR PENGAJUAN CUTI</b>  
                  <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENGAJUAN CUTI</button><?php endif;?></h4>
              
               
                </div>
                 <div class="row">
                   
                              <div class="col-md-3" style="margin-left:20px;">
                                <form action="<?php echo site_url("pengajuan_cuti/view") ?>" method="post">
                                  <select class="form-control" name="status_pengajuan"  >
                                    <option value="0">--pilih jenis cuti--</option>
          <option <?php if(!empty($status_pengajuan)):?><?= ($status_pengajuan=="Disetujui")?'selected':'';?><?php endif;?> >Disetujui</option>
          <option <?php if(!empty($status_pengajuan)):?><?= ($status_pengajuan=="Ditolak")?'selected':'';?><?php endif;?> >Ditolak</option>
          <option <?php if(!empty($status_pengajuan)):?><?= ($status_pengajuan=="Menunggu Konfirmasi")?'selected':'';?><?php endif;?> >Menunggu Konfirmasi</option>
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
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
				<th>Nama Pegawai</th>
        <th>NIP</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Jenis Cuti</th>
				<th>Keterangan</th>
				<th>Status Pengajuan</th>
        <th>Catatan Pimpinan</th>
                          <th style="text-align: right;">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_pengajuan_cuti->result_array() as $i) :
                                            $id_pengajuan_cuti=$i["id_pengajuan_cuti"];
                                          ?>
                                    
                                            <tr>
                                              
       	<td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
				<td><?php echo $i["nama_pegawai"];?></td>
        <td><?php echo $i["nip"];?></td>
        <td><?php echo tgl_indo($i["tanggal_mulai"]);?></td>
        <td><?php echo tgl_indo($i["tanggal_selesai"]);?></td>
        <td><?php echo $i["jenis_cuti"];?></td>
        <td><?php echo $i["keterangan"];?></td>
        <td><?php echo $i["status_pengajuan"];?></td>
        <td><?php echo $i["catatan_pimpinan"];?></td>
        
                                              <td style="text-align: right;">

                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                  <?php if($i['status_pengajuan']=="Disetujui"):?>
                                                <a target="_blank" style="margin: 2px;" href="pengajuan_cuti/cetak2/<?php echo $id_pengajuan_cuti;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" > CETAK</a>
                                                <?php endif;?>  

                                                 <?php if($this->session->userdata('level')=="user"):?>
                                                  <?php if($i['status_pengajuan']=="Menunggu Konfirmasi"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#konfir<?php echo $id_pengajuan_cuti;?>"> KONFIRMASI</button> 
                                              <?php endif;?>   
                                              <?php endif;?>   
                                                <?php if($this->session->userdata('level')!="pegawai"):?>
                                                  <?php if($this->session->userdata('level')!="user"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pengajuan_cuti;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pengajuan_cuti;?>"> DELETE</button>
                                               <?php endif;?>  
                                               <?php endif;?>  
                                                
                                                </div>
                                              </td>
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






    <form  action="<?php echo base_url()."pengajuan_cuti/simpan_pengajuan_cuti"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PENGAJUAN CUTI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                      <?php if($this->session->userdata('level')!="pegawai"):?>
                  							<div class="form-group m-t-20">
                                    <label>Pegawai <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pegawai,jabatan,golongan where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                      <?php else:?>
                              <div class="form-group m-t-20">
                                    <label>Pegawai <span style="color: red;">*</span></label>
                                    <input type="hidden" class="form-control" name="id_pegawai" value="<?php echo $this->session->userdata('id_pengguna2');?>" required  placeholder="Tanggal Mulai" >
                                    <input type="text" value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control" readonly >
                                </div>

                      <?php endif;?>

																<div class="form-group m-t-20">
                                    <label>Tanggal Mulai <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_mulai" required  placeholder="Tanggal Mulai" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Selesai <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_selesai" required  placeholder="Tanggal Selesai" >
                                    
                                </div>

																<div class="form-group m-t-20">
                                    <label>Jenis Cuti <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_cuti" required>
                                      <option value="">--pilih jenis cuti--</option>
                                      <option>Cuti Besar</option>
          <option>Cuti Sakit</option>
          <option>Cuti Melahirkan</option>
          <option>Cuti Karena Alasan Penting</option>
          <option>Cuti Diluar Tanggungan Negara</option>
          
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="keterangan" ></textarea>
                                </div>

                                <input type="hidden" value="Menunggu Konfirmasi" name="status_pengajuan"  >


                                


                               

                               

                              
                  

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







  <?php foreach ($data_pengajuan_cuti->result_array() as $i) :
                                            $id_pengajuan_cuti=$i["id_pengajuan_cuti"];
                                          ?>
       <form  action="<?php echo base_url()."pengajuan_cuti/update_pengajuan_cuti"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pengajuan_cuti;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PENGAJUAN CUTI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengajuan_cuti" value="<?php echo $id_pengajuan_cuti;?>">

                  							<div class="form-group m-t-20">
                                    <label>Pegawai <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pegawai,jabatan,golongan where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan")->result_array() as $key):?>
                                        <option <?= ($i["id_pegawai"]==$key['id_pegawai'])?"selected":"";?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Mulai <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_mulai"];?>" type="date" class="form-control" name="tanggal_mulai" required  placeholder="Tanggal Mulai" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Selesai <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_selesai"];?>" type="date" class="form-control" name="tanggal_selesai" required  placeholder="Tanggal Selesai" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Jenis Cuti <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_cuti" required>
                                      <option value="">--pilih jenis cuti--</option>
                                      <option <?= ($i["jenis_cuti"]=="Cuti Besar")?"selected":"";?> >Cuti Besar</option>
          <option <?= ($i["jenis_cuti"]=="Cuti Sakit")?"selected":"";?> >Cuti Sakit</option>
          <option <?= ($i["jenis_cuti"]=="Cuti Melahirkan")?"selected":"";?> >Cuti Melahirkan</option>
          <option <?= ($i["jenis_cuti"]=="Cuti Karena Alasan Penting")?"selected":"";?> >Cuti Karena Alasan Penting</option>
          <option <?= ($i["jenis_cuti"]=="Cuti Diluar Tanggungan Negara")?"selected":"";?> >Cuti Diluar Tanggungan Negara</option>
          
                                    </select>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="keterangan" ><?php echo $i["keterangan"];?></textarea>
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




  <?php foreach ($data_pengajuan_cuti->result_array() as $i) :
                                            $id_pengajuan_cuti=$i["id_pengajuan_cuti"];
                                          ?>
       <form  action="<?php echo base_url()."pengajuan_cuti/update_pengajuan_cuti2"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="konfir<?php echo $id_pengajuan_cuti;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>KONFIRMASI PENGAJUAN CUTI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pengajuan_cuti" value="<?php echo $id_pengajuan_cuti;?>">


                                <div class="form-group m-t-20">
                                    <label>Nama Pegawai Pemohon <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_pegawai"];?>" readonly type="text" class="form-control" placeholder="Nama Pemohon" >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Status Pengajuan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_pengajuan" required>
                                      <option value="">--pilih status pengajuan--</option>
                                      <option  >Disetujui</option>
                                      <option  >Ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group m-t-20">
                                    <label>Catatan Pimpinan </label>
                                    <textarea class="form-control" name="catatan_pimpinan" ><?php echo $i["catatan_pimpinan"];?></textarea>
                                </div>

                                DATA PEGAWAI YG CUTI DI TANGGAL SAMA: 
                                <hr>
                                   <table class="table table-striped table-bordered zero-configuration " id="mytable">
                      <thead>
                        <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Nama Pegawai</th>
        <th>NIP</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($this->db->query("SELECT * FROM pegawai,jabatan,golongan,pengajuan_cuti where pegawai.id_jabatan=jabatan.id_jabatan AND pegawai.id_golongan=golongan.id_golongan AND pengajuan_cuti.id_pegawai=pegawai.id_pegawai")->result_array() as $i2) :
                                            $i2d_pengajuan_cuti=$i2["id_pengajuan_cuti"];
                                            if (($i['tanggal_mulai'] >= $i2["tanggal_mulai"]) && ($i['tanggal_mulai'] <= $i2["tanggal_selesai"])) {
                                            if($i2d_pengajuan_cuti!=$id_pengajuan_cuti){
                                          ?>
                                    
                                            <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i2["nama_pegawai"];?></td>
        <td><?php echo $i2["nip"];?></td>
        <td><?php echo tgl_indo($i2["tanggal_mulai"]);?></td>
        <td><?php echo tgl_indo($i2["tanggal_selesai"]);?></td>
        
                                            </tr>
                                            <?php }} endforeach;?>
                                        </tbody>
                    </table>

                                
                  

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



   <?php foreach ($data_pengajuan_cuti->result_array() as $i) :
                                            $id_pengajuan_cuti=$i["id_pengajuan_cuti"];
                                          ?>
       <form  action="<?php echo base_url()."pengajuan_cuti/hapus_pengajuan_cuti"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pengajuan_cuti;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PENGAJUAN CUTI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pengajuan_cuti;?>">
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
  text: "Pengajuan Cuti Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pengajuan Cuti Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit2") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pengajuan Cuti Berhasil di KONFIRMASI"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Pengajuan Cuti Berhasil di HAPUS"
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





			