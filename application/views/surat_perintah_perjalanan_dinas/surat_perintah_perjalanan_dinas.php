


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
                 <h4 class="card-title"> <b>DAFTAR SURAT PERINTAH PERJALANAN DINAS</b>  

                   <?php if($this->session->userdata('level')!="pegawai"):?>

                  <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH SPPD</button>
                 <?php endif;?>
                 <?php endif;?>
               </h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
        <th>No.Surat</th>
        <th>Pegawai yang diperintahkan</th>
        <th>Maksud Perjalanan</th>
        <th>Alat Angkut</th>
        <th>Tempat Berangkat</th>
        <th>Tempat Tujuan</th>
        <th>Tgl Berangkat</th>
        <th>Tgl Harus Kembali</th>
        <th>Total Biaya Pengeluaran</th>
        <th>Pengikut</th>
        <th>Tanggal Input</th>

                          <th style="text-align: right;">Action</th>

                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_surat_perintah_perjalanan_dinas->result_array() as $i) :
                                            $id_surat_perintah_perjalanan_dinas=$i["id_surat_perintah_perjalanan_dinas"];
                                             $id_pengikut=$i['id_pengikut'];
                                            $check2 = explode(',', $id_pengikut);
                                          ?>
                                    
                                            <tr>
                                              
        <td><?= sprintf("%03d",$i['id_surat_perintah_perjalanan_dinas']) ?></td>
        <td><?php echo $i["nama_pegawai"];?> - <?php echo $i["nip"];?></td>
        <td><?php echo $i["maksud_perjalanan"];?></td>
        <td><?php echo $i["alat_angkut"];?></td>
        <td><?php echo $i["tempat_berangkat"];?></td>
        <td><?php echo $i["tempat_tujuan"];?></td>
        <td><?php echo tgl_indo($i["tgl_berangkat"]);?></td>
        <td><?php echo tgl_indo($i["tgl_harus_kembali"]);?></td>
        <td><?php echo rupiah($i["total_biaya_pengeluaran"]);?></td>
        <td>
                                              <?php foreach ($this->db->get('pegawai')->result_array() as $i3) : 
                                                $id2=$i3['id_pegawai']; 
                                                $nama2=$i3['nama_pegawai']; 
                                                $nip2=$i3['nip']; 
                                              ?>
                                              <?php in_array($id2, $check2) ? print "#".$nama2." - ".$nip2." <br>" : ""; ?>
                                              <?php endforeach;?>
                                                </td>
        <td><?php echo tgl_indo(date("Y-m-d",strtotime($i["tanggal_input"])));?>, <?php echo date("H:i",strtotime($i["tanggal_input"]));?></td>
        

                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="surat_perintah_perjalanan_dinas/cetak2/<?php echo $id_surat_perintah_perjalanan_dinas;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" > CETAK</a>

                                                <?php if($this->session->userdata('level')!="user"):?>
                                                    <?php if($this->session->userdata('level')!="pegawai"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_surat_perintah_perjalanan_dinas;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_surat_perintah_perjalanan_dinas;?>"> DELETE</button>
                                              
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






    <form  action="<?php echo base_url()."surat_perintah_perjalanan_dinas/simpan_surat_perintah_perjalanan_dinas"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH SURAT PERINTAH PERJALANAN DINAS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     

                                <div class="form-group m-t-20">
                                    <label>Pegawai yang diperintahkan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih pegawai--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> | <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Pengikut <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pengikut ..." class="form-control js-example-basic-multiple"  name="id_pengikut[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option  value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Maksud Perjalanan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="maksud_perjalanan" required  placeholder="Maksud Perjalanan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alat Angkut <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="alat_angkut" required  placeholder="Alat Angkut" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Berangkat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tempat_berangkat" required  placeholder="Tempat Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Tujuan <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="tempat_tujuan" required  placeholder="Tempat Tujuan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tgl Berangkat <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tgl_berangkat" required  placeholder="Tgl Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tgl Harus Kembali <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tgl_harus_kembali" required  placeholder="Tgl Harus Kembali" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Total Biaya Pengeluaran <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control uang" name="total_biaya_pengeluaran" required  placeholder="Total Biaya Pengeluaran" >
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







  <?php foreach ($data_surat_perintah_perjalanan_dinas->result_array() as $i) :
                                            $id_surat_perintah_perjalanan_dinas=$i["id_surat_perintah_perjalanan_dinas"];
                                             $id_pengikut=$i['id_pengikut'];
                                            $check = explode(',', $id_pengikut);
                                          ?>
       <form  action="<?php echo base_url()."surat_perintah_perjalanan_dinas/update_surat_perintah_perjalanan_dinas"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_surat_perintah_perjalanan_dinas;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE SURAT PERINTAH PERJALANAN DINAS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_surat_perintah_perjalanan_dinas" value="<?php echo $id_surat_perintah_perjalanan_dinas;?>">

                                <div class="form-group m-t-20">
                                    <label>Pegawai <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pegawai" required>
                                      <option value="">--pilih pegawai--</option>
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?= ($i['id_pegawai']==$key['id_pegawai'])?'selected':'';?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> | <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Pengikut <span style="color: red;">*</span></label>
                                    <select data-placeholder="Pilih Pengikut ..." class="form-control js-example-basic-multiple"  name="id_pengikut[]" required multiple="multiple">
                                      <?php foreach ($this->db->get('pegawai')->result_array() as $key):?>
                                        <option <?php if(in_array($key['id_pegawai'], $check)){echo "selected";}else{};?> value="<?php echo $key['id_pegawai'];?>"><?php echo $key['nip'];?> # <?php echo $key['nama_pegawai'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Maksud Perjalanan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["maksud_perjalanan"];?>" type="text" class="form-control" name="maksud_perjalanan" required  placeholder="Maksud Perjalanan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alat Angkut <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["alat_angkut"];?>" type="text" class="form-control" name="alat_angkut" required  placeholder="Alat Angkut" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Berangkat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tempat_berangkat"];?>" type="text" class="form-control" name="tempat_berangkat" required  placeholder="Tempat Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Tujuan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tempat_tujuan"];?>" type="text" class="form-control" name="tempat_tujuan" required  placeholder="Tempat Tujuan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tgl Berangkat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tgl_berangkat"];?>" type="date" class="form-control" name="tgl_berangkat" required  placeholder="Tgl Berangkat" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tgl Harus Kembali <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tgl_harus_kembali"];?>" type="date" class="form-control" name="tgl_harus_kembali" required  placeholder="Tgl Harus Kembali" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Total Biaya Pengeluaran <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["total_biaya_pengeluaran"];?>" type="text" class="form-control uang" name="total_biaya_pengeluaran" required  placeholder="Total Biaya Pengeluaran" >
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



   <?php foreach ($data_surat_perintah_perjalanan_dinas->result_array() as $i) :
                                            $id_surat_perintah_perjalanan_dinas=$i["id_surat_perintah_perjalanan_dinas"];
                                          ?>
       <form  action="<?php echo base_url()."surat_perintah_perjalanan_dinas/hapus_surat_perintah_perjalanan_dinas"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_surat_perintah_perjalanan_dinas;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS SURAT PERINTAH PERJALANAN DINAS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_surat_perintah_perjalanan_dinas;?>">
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
  text: "Surat Perintah Perjalanan Dinas Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Surat Perintah Perjalanan Dinas Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Surat Perintah Perjalanan Dinas Berhasil di HAPUS"
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





      