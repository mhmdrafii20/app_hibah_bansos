


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
                 <h4 class="card-title"> <b>DAFTAR PERTIMBANGAN</b>  
                    <?php if($this->session->userdata('level')!="user"):?>
                  <?php if($this->session->userdata('level')!="pemohon"):?>
                  <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PERTIMBANGAN</button> 
                 <?php endif;?>
               <?php endif;?>
             </h4>
              


               
                </div>

                    <div class="row">
                   
                              <div class="col-md-3" style="margin-left:20px;">
                                <form action="<?php echo site_url("pertimbangan/view") ?>" method="post">
                                  <select class="form-control" name="jenis_penerima"  >
                                    <option value="0">--pilih jenis penerima--</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Rumah Ibadah")?'selected':'';?><?php endif;?> >Rumah Ibadah</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Lembaga atau Badan")?'selected':'';?><?php endif;?> >Lembaga atau Badan</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Organisasi Kemasyarakatan atau Keagamaan")?'selected':'';?><?php endif;?> >Organisasi Kemasyarakatan atau Keagamaan</option>
                                </select>
                              </div>

                              <div class="col-md-3">
                                  <select class="form-control" name="status_pertimbangan" >
                                    <option value="0">--pilih status pertimbangan--</option>
                                    <option <?php if(!empty($status_pertimbangan)):?><?= ($status_pertimbangan=="Ditunda")?'selected':'';?><?php endif;?> >Ditunda</option>
                                    <option <?php if(!empty($status_pertimbangan)):?><?= ($status_pertimbangan=="Ditolak")?'selected':'';?><?php endif;?> >Ditolak</option>
                                    <option <?php if(!empty($status_pertimbangan)):?><?= ($status_pertimbangan=="Diterima")?'selected':'';?><?php endif;?> >Diterima</option>
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
				<th>Kode Pertimbangan</th>
          <?php if($this->session->userdata('level')!="pemohon"):?>
        <th>Pemohon</th>
         <?php endif;?>
        <th>Jenis Penerima</th>
        <th>Judul Proposal</th>
        <th>Anggaran Yg Diajukan</th>
        <th>File Proposal</th>
        <th>Tanggal Pengajuan</th>
				<th>Anggaran Yg Disetujui</th>
				<th>Tanggal Pertimbangan</th>
				<th>Bukti Survey</th>
				<th>Status Pertimbangan</th>
				<th>Catatan Petugas </th>
          <?php if($this->session->userdata('level')!="user"):?>
                          <th style="text-align: right;">Action</th>
                          <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_pertimbangan->result_array() as $i) :
                                            $id_pertimbangan=$i["id_pertimbangan"];
                                          ?>
                                    
                                            <tr>
                                              
				<td><?php echo $i["kode_pertimbangan"];?></td>
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
        <td><?php echo rupiah($i["anggaran_yg_disetujui"]);?></td>
        <td><?php echo tgl_indo($i["tanggal_pertimbangan"]);?></td>
         <?php if(!empty($i["bukti_survey"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['bukti_survey'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>
        <td><?php echo $i["status_pertimbangan"];?></td>
        <td><?php echo $i["catatan_petugas_"];?></td>
                                         <?php if($this->session->userdata('level')!="user"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                  <?php if($i["status_pertimbangan"]=="Diterima"):?>
                                                 <button style="margin: 2px;" type="button" class="btn btn-success mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#pencairan<?php echo $id_pertimbangan;?>"> AJUKAN PENCAIRAN</button>
                                               <?php endif;?>
                                                
                                           <?php if($this->session->userdata('level')!="pemohon"):?>
                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_pertimbangan;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_pertimbangan;?>"> DELETE</button>
                                                
                                              <?php endif;?>


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



  <?php foreach ($data_pertimbangan->result_array() as $i) :
                                            $id_pertimbangan=$i["id_pertimbangan"];
                                          ?>
       <form  action="<?php echo base_url()."proposal_pencairan/simpan_proposal_pencairan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="pencairan<?php echo $id_pertimbangan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>AJUKAN PROPOSAL PENCAIRAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pertimbangan" value="<?php echo $id_pertimbangan;?>">


                                <div class="form-group m-t-20">
                                    <label>Kode pertimbangan <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['id_pertimbangan'];?>" readonly type="hidden" class="form-control" name="id_pertimbangan" required >
                                    <input readonly value="<?php echo $i['kode_pertimbangan'];?>" readonly type="text" class="form-control" name="kode_pertimbangan" required >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Pemohon <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['nama_lengkap'];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama Pemohon" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Jenis Penerima <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['jenis_penerima'];?>" type="text" class="form-control" name="jenis_penerima" required  placeholder="Jenis Penerima" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Judul Proposal <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['judul_proposal'];?>" type="text" class="form-control" name="judul_proposal" required  placeholder="Judul Proposal" >
                                </div>
                                
                                <div class="form-group m-t-20">
                                    <label>Anggaran Yg Disetujui <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['anggaran_yg_disetujui'];?>" type="text" class="form-control uang" name="anggaran_yg_disetujui" required  placeholder="Anggaran Yg Disetujui" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Pertimbangan <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $i['tanggal_pertimbangan'];?>" type="date" class="form-control" name="tanggal_pertimbangan" required  placeholder="Tanggal Pertimbangan" >
                                </div>

                     <?php 
                        $this->db->select('RIGHT(proposal_pencairan.id_proposal_pencairan,3) as kode', FALSE);
        $this->db->order_by('id_proposal_pencairan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('proposal_pencairan');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PR".$kodemax;

        ?>

                                    <input value="<?php echo $kodejadi;?>" readonly type="hidden" class="form-control" name="kode_proposal_pencairan" required >


                                <div class="form-group m-t-20">
                                    <label>Tanggal Proposal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo date('Y-m-d');?>" readonly type="date" class="form-control" name="tanggal_proposal_pencairan" required  placeholder="Tanggal Proposal Pencairan" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Nama Pemilik Sesuai di Buku Rekening Pemohon (Wajib Bank Kalteng) <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_bank" required  placeholder="Nama Pemilik Sesuai di Buku Rekening Pemohon (Wajib Bank Kalteng)" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nomor Rekening <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nomor_rekening" required  placeholder="Nomor Rekening" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File Proposal Pencairan </label>
                                    <input type="file" class="form-control" name="file_proposal_pencairan"   >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan Pemohon </label>
                                    <textarea class="form-control" name="catatan_pemohon" >Mohon Segera Dicairkan</textarea>
                                </div>





                              
                                


                                
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">AJUKAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



    <form  action="<?php echo base_url()."pertimbangan/simpan_pertimbangan"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PERTIMBANGAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                          <?php 
                        $this->db->select('RIGHT(pertimbangan.id_pertimbangan,3) as kode', FALSE);
        $this->db->order_by('id_pertimbangan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pertimbangan');
        if ($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PB".$kodemax;

        ?>

                                <div class="form-group m-t-20">
                                    <label>Kode pertimbangan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $kodejadi;?>" readonly type="text" class="form-control" name="kode_pertimbangan" required >
                                </div>
                                                
                                <div class="form-group m-t-20">
                                    <label> Proposal <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_proposal" id="id_proposal" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon AND status_proposal='Diverifikasi'")->result_array() as $key):?>
                                      <?php 
                                      $lewat="";
                                      foreach ($data_pertimbangan->result_array() as $i5){
                                            if($i5["kode_proposal"]==$key['kode_proposal']){
                                              $lewat="ya";
                                            }
                                      }
                                          if($lewat==""){
                                          ?>
                                        <option value="<?php echo $key['id_proposal'];?>"><?php echo $key['kode_proposal'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php } endforeach;?>
                                    </select>
                                </div>

                                <div id="testt"></div>


																<div class="form-group m-t-20">
                                    <label>Anggaran Yg Disetujui <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control uang" name="anggaran_yg_disetujui" required  placeholder="Anggaran Yg Disetujui" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Tanggal Pertimbangan <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" name="tanggal_pertimbangan" required  placeholder="Tanggal Pertimbangan" >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Bukti Survey </label>
                                    <input type="file" class="form-control" name="bukti_survey"   >
                                </div>

																<div class="form-group m-t-20">
                                    <label>Status Pertimbangan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_pertimbangan" required>
                                      <option value="">--pilih status pertimbangan--</option>
                                      <option>Ditunda</option>
                                      <option>Ditolak</option>
                                      <option>Diterima</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Notifikasi <span style="color: red;">*</span></label>
                                    <select class="form-control" name="notif" required>
                                      <option value="">--pilih notifikasi--</option>
                                      <option value="1">Kirim Notifikasi Whatsapp ke Pemohon</option>
                                      <option value="2">Jangan Kirimkan Notifikasi</option>\
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan Petugas  </label>
                                    <textarea class="form-control" name="catatan_petugas_" ></textarea>
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







  <?php foreach ($data_pertimbangan->result_array() as $i) :
                                            $id_pertimbangan=$i["id_pertimbangan"];
                                          ?>
       <form  action="<?php echo base_url()."pertimbangan/update_pertimbangan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_pertimbangan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PERTIMBANGAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_pertimbangan" value="<?php echo $id_pertimbangan;?>">


                                <div class="form-group m-t-20">
                                    <label>Kode pertimbangan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['kode_pertimbangan'];?>" readonly type="text" class="form-control" name="kode_pertimbangan" required >
                                </div>
                                                
                                <div class="form-group m-t-20">
                                    <label> Proposal <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_proposal" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal WHERE proposal.id_pemohon=pemohon.id_pemohon")->result_array() as $key):?>
                                        <option <?= ($i["id_proposal"]==$key['id_proposal'])?"selected":"";?> value="<?php echo $key['id_proposal'];?>"><?php echo $key['kode_proposal'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Anggaran Yg Disetujui <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['anggaran_yg_disetujui'];?>" type="text" class="form-control uang" name="anggaran_yg_disetujui" required  placeholder="Anggaran Yg Disetujui" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Pertimbangan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_pertimbangan'];?>" type="date" class="form-control" name="tanggal_pertimbangan" required  placeholder="Tanggal Pertimbangan" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Bukti Survey </label>
                                    <input type="file" class="form-control" name="bukti_survey"   >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Status Pertimbangan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_pertimbangan" required>
                                      <option value="">--pilih status pertimbangan--</option>
                                      <option <?= ($i["status_pertimbangan"]=="Ditunda")?"selected":"";?> >Ditunda</option>
                                      <option <?= ($i["status_pertimbangan"]=="Ditolak")?"selected":"";?> >Ditolak</option>
                                      <option <?= ($i["status_pertimbangan"]=="Diterima")?"selected":"";?> >Diterima</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan Petugas  </label>
                                    <textarea class="form-control" name="catatan_petugas_" ><?php echo $i["catatan_petugas_"];?></textarea>
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



   <?php foreach ($data_pertimbangan->result_array() as $i) :
                                            $id_pertimbangan=$i["id_pertimbangan"];
                                          ?>
       <form  action="<?php echo base_url()."pertimbangan/hapus_pertimbangan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_pertimbangan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PERTIMBANGAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_pertimbangan;?>">
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
  text: "Pertimbangan Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Pertimbangan Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Pertimbangan Berhasil di HAPUS"
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





			