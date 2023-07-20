

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
                 <h4 class="card-title"> <b>DAFTAR PEGAWAI</b>
                    <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PEGAWAI</button>
               <?php endif;?>
               </h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
                          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>Image </th>
                          <th>Nama </th>
                          <th>NIP</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>No Telp</th>
                          <th>Jabatan</th>
                          <th>Golongan</th>
                          <th>TMT Pegawai</th>
                            <?php if($this->session->userdata('level')!="user"):?>
                          <th style="text-align: right;">Action</th>
                           <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_pegawai->result_array() as $i) :
                                            $id_pegawai=$i['id_pegawai'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td>
                                              <?php if(!empty($i['foto_pegawai'])):?>
                                                <img src="<?php echo base_url();?>assets/image/<?php echo $i['foto_pegawai'];?>" width="100px" height="120px">
                                              <?php else:?>
                                                <img src="<?php echo base_url();?>assets/image/profil3.png" width="100px" height="120px">
                                              <?php endif;?>
                                              </td>
                                              <td><?php echo $i['nama_pegawai'];?></td>
                                              <td><?php echo $i['nip'];?></td>
                                              <td><?php echo $i['jenis_kelamin'];?></td>
                                              <td><?php echo $i['alamat'];?></td>
                                              <td><?php echo $i['no_telp'];?></td>
                                              <td><?php echo $i['nama_jabatan'];?></td>
                                              <td><?php echo $i['nama_golongan'];?></td>
                                              <td><?php echo tgl_indo($i['tmt_peg']);?></td>
                                             <?php if($this->session->userdata('level')!="user"):?>
                                              <td style="flex: 0 0 auto; min-width: 3em; text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pegawai;?>"> EDIT</button>
                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pegawai;?>"> DELETE</button>
                                                
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






    <form  action="<?php echo base_url().'pegawai/simpan_pegawai'?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PEGAWAI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                                 <div class="form-group m-t-20">
                                    <label>Nama Pegawai <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_pegawai" required  placeholder="Nama Pegawai" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>NIP <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nip" required  placeholder="NIP" >
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
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="alamat" required  placeholder="Alamat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>No Telp <span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" name="no_telp" required  placeholder="No Telp" >
                                </div>

                                 

                                 <div class="form-group m-t-20">
                                    <label>Jabatan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_jabatan" required>
                                      <option value="">-- Pilih Jabatan --</option>
                                      <?php foreach ($this->db->get('jabatan')->result_array() as $key):?>
                                      <option value="<?php echo $key['id_jabatan'];?>"><?php echo $key['nama_jabatan'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Golongan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_golongan" required>
                                      <option value="">-- Pilih Golongan --</option>
                                      <?php foreach ($this->db->get('golongan')->result_array() as $key):?>
                                      <option value="<?php echo $key['id_golongan'];?>"><?php echo $key['nama_golongan'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Foto Pegawai </label>
                                    <input type="file" class="form-control" name="foto_pegawai"   placeholder="Foto Pegawai" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>TMT Pegawai <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tmt_peg" required  placeholder="TMT Pegawai" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Password </label>
                                    <input autocomplete="new-password" type="password" class="form-control" name="password"  placeholder="Password" >
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







  <?php foreach ($data_pegawai->result_array() as $i) :
                                            $id_pegawai=$i['id_pegawai'];
                                          ?>
       <form  action="<?php echo base_url().'pegawai/update_pegawai'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PEGAWAI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai;?>">



                                <div class="form-group m-t-20">
                                    <label>Nama Pegawai <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nama_pegawai'];?>" type="text" class="form-control" name="nama_pegawai" required  placeholder="Nama Pegawai" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>NIP <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nip'];?>" type="text" class="form-control" name="nip" required  placeholder="NIP" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($i['jenis_kelamin']=="Laki-Laki")?'selected':'';?> >Laki-Laki</option>
                                      <option <?= ($i['jenis_kelamin']=="Perempuan")?'selected':'';?> >Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['alamat'];?>" type="text" class="form-control" name="alamat" required  placeholder="Alamat" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>No Telp <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['no_telp'];?>" type="number" class="form-control" name="no_telp" required  placeholder="No Telp" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Jabatan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_jabatan" required>
                                      <option value="">-- Pilih Jabatan --</option>
                                      <?php foreach ($this->db->get('jabatan')->result_array() as $key):?>
                                      <option <?= ($i['id_jabatan']==$key['id_jabatan'])?'selected':'';?> value="<?php echo $key['id_jabatan'];?>"><?php echo $key['nama_jabatan'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Golongan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_golongan" required>
                                      <option value="">-- Pilih Golongan --</option>
                                      <?php foreach ($this->db->get('golongan')->result_array() as $key):?>
                                      <option <?= ($i['id_golongan']==$key['id_golongan'])?'selected':'';?> value="<?php echo $key['id_golongan'];?>"><?php echo $key['nama_golongan'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Foto Pegawai </label>
                                    <input type="file" class="form-control" name="foto_pegawai"   placeholder="Foto Pegawai" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>TMT Pegawai <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tmt_peg'];?>" type="date" class="form-control" name="tmt_peg" required  placeholder="TMT Pegawai" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Password </label>
                                    <input autocomplete="new-password" type="password" class="form-control" name="password"  placeholder="Password" >
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



   <?php foreach ($data_pegawai->result_array() as $i) :
                                            $id_pegawai=$i['id_pegawai'];
                                          ?>
       <form  action="<?php echo base_url().'pegawai/hapus_pegawai'?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pegawai;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PEGAWAI</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pegawai;?>">
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
  text: 'Pegawai Berhasil di SIMPAN',
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_edit') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: 'Pegawai Berhasil di EDIT'
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata('berhasil_hapus') == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  text: 'Pegawai Behasil di HAPUS'
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



