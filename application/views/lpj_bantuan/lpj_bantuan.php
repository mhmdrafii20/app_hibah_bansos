


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
                 <h4 class="card-title"> <b>DAFTAR LPJ HIBAH BANSOS</b>  
                 <!--  <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH LPJ HIBAH BANSOS</button><?php endif;?> --></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
        <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
				<th>Pemohon</th>
        <th>Jenis Penerima</th>
        <th>Judul Proposal</th>
        <th>Anggaran Yg Disetujui</th>
				<th>Bendahara</th>
				<th>Uraian</th>
				<th>Realisasi Anggaran</th>
				<th>Sisa Anggaran</th>
				<th>Keterangan</th>
				<th>File LPJ </th>
				<th>Tanggal Lpj</th>
				
                          <th style="text-align: right;">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_lpj_bantuan->result_array() as $i) :
                                            $id_lpj_bantuan=$i["id_lpj_bantuan"];
                                          ?>
                                    
                                            <tr>
                                              
       	<td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
				<td><?php echo $i["nama_lengkap"];?></td>
        <td><?php echo $i["jenis_penerima"];?></td>
        <td><?php echo $i["judul_proposal"];?></td>
        <td><?php echo rupiah($i["anggaran_yg_disetujui"]);?></td>
        <td><?php echo $i["bendahara"];?></td>
        <td><?php echo $i["uraian"];?></td>
        <td><?php echo rupiah($i["realisasi_anggaran"]);?></td>
        <td><?php echo rupiah($i["sisa_anggaran"]);?></td>
        <td><?php echo $i["keterangan"];?></td>
         <?php if(!empty($i["foto_bukti"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['foto_bukti'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>
         
        <td><?php echo tgl_indo($i["tanggal_lpj"]);?></td>
        
                                           
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                               <a target="_blank" style="margin: 2px;" href="lpj_bantuan/cetak2/<?php echo $id_lpj_bantuan;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" > CETAK</a>    
                                                  <?php if($this->session->userdata('level')!="user"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_lpj_bantuan;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_lpj_bantuan;?>"> DELETE</button>
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






    <form  action="<?php echo base_url()."lpj_bantuan/simpan_lpj_bantuan"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH LPJ BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     

                  						

																<div class="form-group m-t-20">
                                    <label>Bendahara <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="bendahara" required  placeholder="Bendahara" >
                                </div>

                                  <div class="form-group m-t-20">
                                    <label>Proposal Pencairan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_proposal_pencairan" id="id_proposal_pencairan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan")->result_array() as $key):?>
                                        <option value="<?php echo $key['id_proposal_pencairan'];?>"><?php echo $key['kode_proposal_pencairan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php  endforeach;?>
                                    </select>
                                </div>

                                <div id="testt"></div>

																<div class="form-group m-t-20">
                                    <label>Uraian <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="uraian" required></textarea>
                                </div>

																

                                <div class="form-group m-t-20">
                                    <label>Realisasi Anggaran <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control uang" name="realisasi_anggaran" required  placeholder="Realisasi Anggaran" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="keterangan" ></textarea>
                                </div>

																<div class="form-group m-t-20">
                                    <label>File LPJ <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="foto_bukti" required   >
                                </div>


                                

																<div class="form-group m-t-20">
                                    <label>Tanggal Lpj <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_lpj" required  placeholder="Tanggal Lpj" >
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







  <?php foreach ($data_lpj_bantuan->result_array() as $i) :
                                            $id_lpj_bantuan=$i["id_lpj_bantuan"];
                                          ?>
       <form  action="<?php echo base_url()."lpj_bantuan/update_lpj_bantuan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_lpj_bantuan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE LPJ BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_lpj_bantuan" value="<?php echo $id_lpj_bantuan;?>">

                                <div class="form-group m-t-20">
                                    <label>Bendahara <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["bendahara"];?>" type="text" class="form-control" name="bendahara" required  placeholder="Bendahara" >
                                </div>

                                  <div class="form-group m-t-20">
                                    <label>Proposal Pencairan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_proposal_pencairan" id="id_proposal_pencairan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan")->result_array() as $key):?>
                                        <option <?= ($i['id_proposal_pencairan']==$key['id_proposal_pencairan'])?'selected':'';?> value="<?php echo $key['id_proposal_pencairan'];?>"><?php echo $key['kode_proposal_pencairan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php  endforeach;?>
                                    </select>
                                </div>

                                <div id="testt"></div>

                                <div class="form-group m-t-20">
                                    <label>Uraian <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="uraian" required><?php echo $i["uraian"];?></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Realisasi Anggaran <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["realisasi_anggaran"];?>" type="text" class="form-control uang" name="realisasi_anggaran" required  placeholder="Realisasi Anggaran" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Keterangan </label>
                                    <textarea class="form-control" name="keterangan" ><?php echo $i["keterangan"];?></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File LPJ </label>
                                    <input type="file" class="form-control" name="foto_bukti"    >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Tanggal Lpj <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_lpj"];?>" type="date" class="form-control" name="tanggal_lpj" required  placeholder="Tanggal Lpj" >
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



   <?php foreach ($data_lpj_bantuan->result_array() as $i) :
                                            $id_lpj_bantuan=$i["id_lpj_bantuan"];
                                          ?>
       <form  action="<?php echo base_url()."lpj_bantuan/hapus_lpj_bantuan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_lpj_bantuan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS LPJ BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_lpj_bantuan;?>">
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
  text: "Lpj Hibah Bansos Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Lpj Hibah Bansos Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Lpj Hibah Bansos Berhasil di HAPUS"
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


<?php if($this->session->flashdata("gagal_up2") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "error",
  text: "Gagal, Realisasi anggaran melebihi anggaran yg disetujui"
})
 </script>
<?php endif; ?>





			