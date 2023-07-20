


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
                 <h4 class="card-title"> <b>DAFTAR PENYALURAN BANSOS</b>  
                   <?php if($this->session->userdata('level')!="user"):?>
                 <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PENYALURAN BANSOS</button><?php endif;?></h4>
              
               
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
				<th>Kode Penyaluran Bansos</th>
        <th>Pemohon</th>
        <th>Jenis Penerima</th>
        <th>Judul Proposal</th>
        <th>Anggaran Yg Diajukan</th>
        <th>File Proposal</th>
        <th>Tanggal Pengajuan</th>
        <th>Anggaran Yg Disetujui</th>
        <th>Tanggal Pertimbangan</th>
        <th>Tanggal Proposal Pencairan</th>
        <th>Nama Bank</th>
        <th>Nomor Rekening</th>
				<th>Tanggal Transfer</th>
				<th>Bukti Transfer</th>
				   <?php if($this->session->userdata('level')!="user"):?>
                          <th style="text-align: right;">Action</th>
                          <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_penyaluran_bansos->result_array() as $i) :
                                            $id_penyaluran_bansos=$i["id_penyaluran_bansos"];
                                          ?>
                                    
                                            <tr>
                                              
				<td><?php echo $i["kode_penyaluran_bansos"];?></td>
        <td><?php echo $i["nama_lengkap"];?></td>
        <td><?php echo $i["jenis_penerima"];?></td>
        <td><?php echo $i["judul_proposal"];?></td>
        <td><?php echo rupiah($i["anggaran_yg_diajukan"]);?></td>
         <?php if(!empty($i["file_proposal"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_proposal'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>
        <td><?php echo tgl_indo($i["tanggal_pengajuan"]);?></td>
        <td><?php echo rupiah($i["anggaran_yg_disetujui"]);?></td>
        <td><?php echo tgl_indo($i["tanggal_pertimbangan"]);?></td>
        <td><?php echo tgl_indo($i["tanggal_proposal_pencairan"]);?></td>
        <td><?php echo $i["nama_bank"];?></td>
        <td><?php echo $i["nomor_rekening"];?></td>
        <td><?php echo tgl_indo($i["tanggal_transfer"]);?></td>
        <?php if(!empty($i["bukti_transfer"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['bukti_transfer'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>
        
                                            <?php if($this->session->userdata('level')!="user"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                 <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdatev<?php echo $id_penyaluran_bansos;?>"> LPJ BANSOS</button>
                                                
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_penyaluran_bansos;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_penyaluran_bansos;?>"> DELETE</button>
                                                
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






    <form  action="<?php echo base_url()."penyaluran_bansos/simpan_penyaluran_bansos"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PENYALURAN BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
             <?php 
                        $this->db->select('RIGHT(penyaluran_bansos.id_penyaluran_bansos,3) as kode', FALSE);
        $this->db->order_by('id_penyaluran_bansos', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penyaluran_bansos');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PS".$kodemax;

        ?>          

                  							<div class="form-group m-t-20">
                                    <label>Kode Penyaluran Bansos <span style="color: red;">*</span></label>
                                    <input value="<?php echo $kodejadi;?>" readonly type="text" class="form-control" name="kode_penyaluran_bansos" required >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Proposal Pencairan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_proposal_pencairan" id="id_proposal_pencairan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan")->result_array() as $key):?>
                                      <?php 
                                      $lewat="";
                                      foreach ($data_penyaluran_bansos->result_array() as $i5){
                                            if($i5["kode_proposal_pencairan"]==$key['kode_proposal_pencairan']){
                                              $lewat="ya";
                                            }
                                      }
                                          if($lewat==""){
                                          ?>
                                        <option value="<?php echo $key['id_proposal_pencairan'];?>"><?php echo $key['kode_proposal_pencairan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php } endforeach;?>
                                    </select>
                                </div>

                                <div id="testt"></div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Transfer <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_transfer" required  placeholder="Tanggal Transfer" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Bukti Transfer <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="bukti_transfer" required  >
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







  <?php foreach ($data_penyaluran_bansos->result_array() as $i) :
                                            $id_penyaluran_bansos=$i["id_penyaluran_bansos"];
                                          ?>
       <form  action="<?php echo base_url()."penyaluran_bansos/update_penyaluran_bansos"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_penyaluran_bansos;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PENYALURAN BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_penyaluran_bansos" value="<?php echo $id_penyaluran_bansos;?>">

                                <div class="form-group m-t-20">
                                    <label>Kode Penyaluran Bansos <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['kode_penyaluran_bansos'];?>" readonly type="text" class="form-control" name="kode_penyaluran_bansos" required >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Proposal Pencairan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_proposal_pencairan"  required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan,proposal_pencairan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal_pencairan.id_pertimbangan=pertimbangan.id_pertimbangan")->result_array() as $key):?>
                                        <option <?= ($i['id_proposal_pencairan']==$key['id_proposal_pencairan'])?'selected':'';?> value="<?php echo $key['id_proposal_pencairan'];?>"><?php echo $key['kode_proposal_pencairan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Transfer <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_transfer'];?>" type="date" class="form-control" name="tanggal_transfer" required  placeholder="Tanggal Transfer" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Bukti Transfer </label>
                                    <input  type="file" class="form-control" name="bukti_transfer"   >
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




  <?php foreach ($data_penyaluran_bansos->result_array() as $i) :
                                            $id_penyaluran_bansos=$i["id_penyaluran_bansos"];
                                          ?>
     <form  action="<?php echo base_url()."lpj_bantuan/simpan_lpj_bantuan"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdatev<?php echo $id_penyaluran_bansos;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>LPJ BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_proposal_pencairan" value="<?php echo $i['id_proposal_pencairan'];?>">

                             

                               

                                <div class="form-group m-t-20">
                                    <label>Pemohon <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['nama_lengkap'];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Pemohon" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Judul Proposal <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['judul_proposal'];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Judul Proposal" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Jenis Penerima <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['jenis_penerima'];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Jenis Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['nama_penerima'];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File Proposal <span style="color: red;">*</span></label><br>
                                    <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_proposal'];?>" class="btn btn-info mdi mdi-pencil  form-control col-4" > VIEW</a>
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Anggaran Yang Disetujui <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['anggaran_yg_disetujui'];?>" type="hidden" class="form-control" name="anggaran_yg_disetujui" required  placeholder="Anggaran Yang Disetujui" >
                                    <input readonly value="<?php echo rupiah($i['anggaran_yg_disetujui']);?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Anggaran Yang Disetujui" >
                                </div>



                                  <div class="form-group m-t-20">
                                    <label>Bendahara <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="bendahara" required  placeholder="Bendahara" >
                                </div>

                                 

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
                                    <label>File LPJ </label>
                                    <input type="file" class="form-control" name="foto_bukti"    >
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
 <?php endforeach;?>



   <?php foreach ($data_penyaluran_bansos->result_array() as $i) :
                                            $id_penyaluran_bansos=$i["id_penyaluran_bansos"];
                                          ?>
       <form  action="<?php echo base_url()."penyaluran_bansos/hapus_penyaluran_bansos"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_penyaluran_bansos;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PENYALURAN BANSOS</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_penyaluran_bansos;?>">
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
  text: "Penyaluran Bansos Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Penyaluran Bansos Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Penyaluran Bansos Berhasil di HAPUS"
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





			