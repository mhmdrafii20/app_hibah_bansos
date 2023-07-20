


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
                 <h4 class="card-title"> <b>DAFTAR PEMOHON</b>  
                  <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PEMOHON</button><?php endif;?></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
				<th>NIK</th>
				<th>Nama Lengkap</th>
				<th>Alamat</th>
        <th>No HP/WA</th>
				<th>File Ktp</th>
				<th>Jenis Penerima</th>
        <th>Nama Rumah Ibadah <br>/Lembaga/Ormas</th>
        <th>Alamat Rumah Ibadah <br>/Lembaga/Ormas</th>
        <th>Tanggal Mendaftar</th>
        <th>Status Pemohon</th>
        <th>Catatan Petugas</th>
				 <?php if($this->session->userdata('level')!="user"):?>
                          <th style="text-align: right;">Action</th>
                          <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_pemohon->result_array() as $i) :
                                            $id_pemohon=$i["id_pemohon"];
                                          ?>
                                    
                                            <tr>
                                              
       	<td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
				<td><?php echo $i["nik"];?></td>
        <td><?php echo $i["nama_lengkap"];?></td>
        <td><?php echo $i["alamat"];?></td>
        <td><?php echo $i["no_hp_pemohon"];?></td>
        
          <?php if(!empty($i["file_ktp"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_ktp'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>

        
        <td><?php echo $i["jenis_penerima"];?></td>
        <td><?php echo $i["nama_penerima"];?></td>
        <td><?php echo $i["alamat_penerima"];?></td>
        <td><?php echo date("d-F-Y, H:i",strtotime($i["tanggal_mendaftar"]));?></td>
        <td><?php echo $i["status_pemohon"];?></td>
        <td><?php echo $i["catatan_petugas"];?></td>
        
                                            <?php if($this->session->userdata('level')!="user"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                  <?php if($i['status_pemohon']=="Menunggu Konfirmasi"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#konfir<?php echo $id_pemohon;?>"> KONFIRMASI</button> 
                                              <?php endif;?>   
                                                
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pemohon;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pemohon;?>"> DELETE</button>
                                                
                                                </div>
                                              </td>
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






    <form  action="<?php echo base_url()."pemohon/simpan_pemohon"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PEMOHON</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     

                  							<div class="form-group m-t-20">
                                    <label>NIK <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nik" required  placeholder="NIK" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Nama Lengkap <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama Lengkap" >
                                </div>

															

                                <div class="form-group m-t-20">
                                    <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="">--pilih--</option>
                                      <option>Laki-Laki</option>
                                      <option>Perempuan</option>
                                    </select>
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tempat Lahir <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tempat_lahir" required  placeholder="Tempat Lahir" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_lahir" required  placeholder="Tanggal Lahir" >
                                </div>

                                

																<div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>No HP/WA <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="no_hp_pemohon" required  placeholder="No HP/WA" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Status Perkawinan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_perkawinan" required>
                                      <option value="">--pilih--</option>
                                       <option >Belum Menikah</option>
                                        <option >Sudah Menikah</option>
                                        <option >Janda / Duda</option>
                                    </select>
                                </div>

                                  <div class="form-group m-t-20">
                                    <label>Jenis Penerima <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_penerima" required>
                                          <option value="">-pilih jenis penerima-</option>
                                          <option >Rumah Ibadah</option>
                                          <option >Lembaga atau Badan</option>
                                          <option >Organisasi Kemasyarakatan atau Keagamaan</option>
                                  </select>  
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input  type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Rumah Ibadah/Lembaga/Ormas" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input  type="text" class="form-control" name="alamat_penerima" required  placeholder="Alamat Rumah Ibadah/Lembaga/Ormas" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>File Ktp </label>
                                    <input type="file" class="form-control" name="file_ktp"    >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Password </label>
                                    <input autocomplete="new-password" type="password" class="form-control" name="password"    >
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







  <?php foreach ($data_pemohon->result_array() as $i) :
                                            $id_pemohon=$i["id_pemohon"];
                                          ?>
       <form  action="<?php echo base_url()."pemohon/update_pemohon"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pemohon;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PEMOHON</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pemohon" value="<?php echo $id_pemohon;?>">

                  						



                                <div class="form-group m-t-20">
                                    <label>NIK <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nik"];?>" type="text" class="form-control" name="nik" required  placeholder="NIK" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Lengkap <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_lengkap"];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama Lengkap" >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($i['jenis_kelamin'] == "Laki-Laki")?'selected': '' ?> >Laki-Laki</option>
                                  <option <?= ($i['jenis_kelamin'] == "Perempuan")?'selected': '' ?> >Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Lahir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tempat_lahir"];?>" type="text" class="form-control" name="tempat_lahir" required  placeholder="Tempat Lahir" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_lahir"];?>" type="date" class="form-control" name="tanggal_lahir" required  placeholder="Tanggal Lahir" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required><?php echo $i["alamat"];?></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>No HP/WA <span style="color: red;">*</span></label>
                                    <input type="text" value="<?php echo $i["no_hp_pemohon"];?>" class="form-control" name="no_hp_pemohon" required  placeholder="No HP/WA" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Status Perkawinan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_perkawinan" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($i['status_perkawinan'] == "Belum Menikah")?'selected': '' ?> >Belum Menikah</option>
                                  <option <?= ($i['status_perkawinan'] == "Sudah Menikah")?'selected': '' ?> >Sudah Menikah</option>
                                  <option <?= ($i['status_perkawinan'] == "Janda / Duda")?'selected': '' ?> >Janda / Duda</option>
                                    </select>
                                </div>

                                
                                <div class="form-group m-t-20">
                                    <label>Jenis Penerima <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_penerima" required>
                                          <option value="">-pilih jenis penerima-</option>
                                          <option <?= ($i['jenis_penerima'] == "Rumah Ibadah")?'selected': '' ?> >Rumah Ibadah</option>
                                          <option <?= ($i['jenis_penerima'] == "Lembaga atau Badan")?'selected': '' ?> >Lembaga atau Badan</option>
                                          <option <?= ($i['jenis_penerima'] == "Organisasi Kemasyarakatan atau Keagamaan")?'selected': '' ?> >Organisasi Kemasyarakatan atau Keagamaan</option>
                                  </select>  
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_penerima"];?>" type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Rumah Ibadah/Lembaga/Ormas" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["alamat_penerima"];?>" type="text" class="form-control" name="alamat_penerima" required  placeholder="Alamat Rumah Ibadah/Lembaga/Ormas" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File Ktp </label>
                                    <input type="file" class="form-control" name="file_ktp"    >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Password </label>
                                    <input autocomplete="new-password" type="password" class="form-control" name="password"    >
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




  <?php foreach ($data_pemohon->result_array() as $i) :
                                            $id_pemohon=$i["id_pemohon"];
                                          ?>
       <form  action="<?php echo base_url()."pemohon/update_pemohon2"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="konfir<?php echo $id_pemohon;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>KONFIRMASI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pemohon" value="<?php echo $id_pemohon;?>">

                              

                                <div class="form-group m-t-20">
                                    <label>Status Pemohon <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_pemohon" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($i['status_pemohon'] == "Disetujui")?'selected': '' ?> >Disetujui</option>
                                      <option <?= ($i['status_pemohon'] == "Ditolak")?'selected': '' ?> >Ditolak</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan Petugas </label>
                                   <textarea class="form-control" name="catatan_petugas" ><?php echo $i["catatan_petugas"];?></textarea>
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



   <?php foreach ($data_pemohon->result_array() as $i) :
                                            $id_pemohon=$i["id_pemohon"];
                                          ?>
       <form  action="<?php echo base_url()."pemohon/hapus_pemohon"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pemohon;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PEMOHON</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pemohon;?>">
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
  text: "Pemohon Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pemohon Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit2") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pemohon Berhasil di KONFIRMASI"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Pemohon Berhasil di HAPUS"
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





			