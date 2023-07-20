

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
                 <h4 class="card-title"> <b>DAFTAR ARSIP PENCAIRAN HIBAH BANSOS</b>
                    <?php if($this->session->userdata('level')!="user"):?>
                 <!-- <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH ARSIP PENCAIRAN HIBAH BANSOS</button> -->
               <?php endif;?>
               </h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration" id="mytable">
                      <thead>
                        <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>No. NPHD </th>
                          <th>Nama Penerima </th>
                          <th>Tanggal Pencairan</th>
                          <th>File Arsip</th>
                          <th>Tanggal Arsip</th>
                            <?php if($this->session->userdata('level')!="user"):?>
                          <th style="text-align: right;">Action</th>
                           <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_arsip_pencairan_hibah_bansos->result_array() as $i) :
                                            $id_arsip_pencairan_hibah_bansos=$i['id_arsip_pencairan_hibah_bansos'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['No_NPHD'];?></td>
                                              <td><?php echo $i['nama_penerima'];?></td>
                                              <td><?php echo tgl_indo($i['tanggal_pencairan']);?></td>
                                              <td>
                                                <?php 
                                                $cek_string=substr($i['file_arsip'], -4);
                                                if(($cek_string==".jpg")OR($cek_string==".png")OR($cek_string=="jpeg")):?>
                                                    <a target="_blank" href="<?php echo base_url();?>assets/image/<?php echo $i['file_arsip'];?>"><img src="<?php echo base_url();?>assets/image/<?php echo $i['file_arsip'];?>" width="90px" height="110px"></a>
                                                  <?php elseif($cek_string==".pdf"):?>
                                                    <a target="_blank" href="<?php echo base_url();?>assets/image/<?php echo $i['file_arsip'];?>"><img src="<?php echo base_url();?>assets/pdf.png" width="90px" height="110px"></a>
                                                   <?php elseif(($cek_string=="docx")OR($cek_string==".doc")):?>
                                                    <a target="_blank" href="<?php echo base_url();?>assets/image/<?php echo $i['file_arsip'];?>"><img src="<?php echo base_url();?>assets/docx.png" width="90px" height="110px"></a>
                                                  <?php endif;?>

                                              </td>
                                              <td><?php echo tgl_indo(date('Y-m-d',strtotime($i['tanggal_arsip'])));?>, <?php echo date('H:i',strtotime($i['tanggal_arsip']));?></td>
                                             <?php if($this->session->userdata('level')!="user"):?>
                                              <td style="flex: 0 0 auto; min-width: 3em; text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_arsip_pencairan_hibah_bansos;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_arsip_pencairan_hibah_bansos;?>"> DELETE</button>
                                                
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
      
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>






    <form  action="<?php echo base_url().'arsip_pencairan_hibah_bansos/simpan_arsip_pencairan_hibah_bansos'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH ARSIP PENCAIRAN HIBAH BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                                 <div class="form-group m-t-20">
                                    <label>No. NPHD <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="No_NPHD" required  placeholder="No. NPHD" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Nama Penerima <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Penerima" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Tanggal Pencairan <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_pencairan" required  placeholder="Tanggal Pencairan" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>File Arsip (File yang diperbolehkan jpg,png,docx,pdf)<span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="file_arsip" required  placeholder="File Arsip" >
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







  <?php foreach ($data_arsip_pencairan_hibah_bansos->result_array() as $i) :
                                            $id_arsip_pencairan_hibah_bansos=$i['id_arsip_pencairan_hibah_bansos'];
                                          ?>
       <form  action="<?php echo base_url().'arsip_pencairan_hibah_bansos/update_arsip_pencairan_hibah_bansos'?>" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_arsip_pencairan_hibah_bansos;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE ARSIP PENCAIRAN HIBAH BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_arsip_pencairan_hibah_bansos" value="<?php echo $id_arsip_pencairan_hibah_bansos;?>">




                                 <div class="form-group m-t-20">
                                    <label>No. NPHD <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['No_NPHD'];?>" type="text" class="form-control" name="No_NPHD" required  placeholder="No. NPHD" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Nama Penerima <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nama_penerima'];?>" type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Penerima" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Tanggal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_pencairan'];?>" type="date" class="form-control" name="tanggal_pencairan" required  placeholder="Tanggal Pencairan" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>File Arsip </label>
                                    <input type="file" class="form-control" name="file_arsip"   placeholder="File Arsip" >
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



   <?php foreach ($data_arsip_pencairan_hibah_bansos->result_array() as $i) :
                                            $id_arsip_pencairan_hibah_bansos=$i['id_arsip_pencairan_hibah_bansos'];
                                          ?>
       <form  action="<?php echo base_url().'arsip_pencairan_hibah_bansos/hapus_arsip_pencairan_hibah_bansos'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_arsip_pencairan_hibah_bansos;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS ARSIP PENCAIRAN HIBAH BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_arsip_pencairan_hibah_bansos;?>">
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
<?php if($this->session->flashdata('berhasil_simpan') == TRUE): ?>
 <script type="text/javascript">
   Swal.fire({
  icon: 'success',
  text: 'Arsip Pencairan Hibah Bansos Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Arsip Pencairan Hibah Bansos Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Arsip Pencairan Hibah Bansos Behasil di HAPUS'
})
 </script>
<?php endif; ?>


<?php if($this->session->flashdata('gagal_up') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  text: 'Format File Gambar SALAH'
})
 </script>
<?php endif; ?>



