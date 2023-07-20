


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
                 <h4 class="card-title"> <b>DAFTAR PROPOSAL PENCAIRAN</b>  
                   <?php if($this->session->userdata('level')!="user"):?>
                 <!-- <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> TAMBAH PROPOSAL PENCAIRAN</button> -->
                 <?php endif;?></h4>
              
               
                </div>

                   <div class="row">
                   
                              <div class="col-md-3" style="margin-left:20px;">
                                <form action="<?php echo site_url("proposal_pencairan/view") ?>" method="post">
                                  <select class="form-control" name="jenis_penerima"  >
                                    <option value="0">--pilih jenis penerima--</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Rumah Ibadah")?'selected':'';?><?php endif;?> >Rumah Ibadah</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Lembaga atau Badan")?'selected':'';?><?php endif;?> >Lembaga atau Badan</option>
                                    <option <?php if(!empty($jenis_penerima)):?><?= ($jenis_penerima=="Organisasi Kemasyarakatan atau Keagamaan")?'selected':'';?><?php endif;?> >Organisasi Kemasyarakatan atau Keagamaan</option>
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
       <th>Kode Proposal Pencairan</th>
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
				<th>Tanggal Proposal Pencairan</th>
				<th>Nama Bank</th>
				<th>Nomor Rekening</th>
				<th>File Proposal Pencairan</th>
				<th>Catatan Pemohon</th>
        <th>Arsip Proposal</th>
				<?php if($this->session->userdata('level')!="pemohon"):?>
                          <th style="text-align: right;">Action</th>
                            <?php endif;?>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_proposal_pencairan->result_array() as $i) :
                                            $id_proposal_pencairan=$i["id_proposal_pencairan"];
                                            $kd="451.2/".sprintf('%03d',$i['id_proposal_pencairan'])."/KESRA.".date('Y',strtotime($i['tanggal_proposal_pencairan']));
                                            $hsl=$this->db->query("SELECT * FROM arsip_pencairan_hibah_bansos");
                                            $sdh=0;
                                            $file_arsip="";
                                            foreach ($this->db->query("SELECT * FROM arsip_pencairan_hibah_bansos")->result_array() as $iv){
                                              if ($kd==$iv['No_NPHD']) {
                                                $sdh=1;
                                                $file_arsip=$iv['file_arsip'];
                                              }
                                            }
                                          ?>
                                    
                                            <tr>
                                              
        <td><?php echo $i["kode_proposal_pencairan"];?></td>       
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
        <td><?php echo tgl_indo($i["tanggal_proposal_pencairan"]);?></td>
        <td><?php echo $i["nama_bank"];?></td>
        <td><?php echo $i["nomor_rekening"];?></td>
        <?php if(!empty($i["file_proposal_pencairan"])):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $i['file_proposal_pencairan'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td>  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button></td>
                                              <?php endif;?>
        <td><?php echo $i["catatan_pemohon"];?></td>
                                              <?php if($sdh==1):?>
                                                  <td>  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $file_arsip;?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a></td>
                                              <?php else:?>
                                                  <td> - </td>
                                              <?php endif;?>
        
                                            <?php if($this->session->userdata('level')!="pemohon"):?>
                                              <td style="text-align: right;">
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                <a target="_blank" style="margin: 2px;" href="proposal_pencairan/cetak2/<?php echo $id_proposal_pencairan;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" > KWITANSI</a>

                                                <a target="_blank" style="margin: 2px;" href="proposal_pencairan/cetak3/<?php echo $id_proposal_pencairan;?>" type="button" class="btn btn-success mdi mdi-pencil btn-sm" > NPHD</a>
                                                 <?php if($this->session->userdata('level')!="user"):?>
                                                  <?php if($sdh==0):?>
                                            <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#arsip<?php echo $id_proposal_pencairan;?>"> ARSIPKAN</button>
                                          <?php endif;?>


                                              <button style="margin: 2px;" type="button" class="btn btn-info mdi mdi-pencil btn-sm" data-toggle="modal" data-target="#ModalUpdate<?php echo $id_proposal_pencairan;?>"> EDIT</button>

                                              <button style="margin: 2px;" type="button" class="btn btn-danger mdi mdi-delete-empty btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $id_proposal_pencairan;?>"> DELETE</button>
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



  <?php foreach ($data_proposal_pencairan->result_array() as $i) :
                                            $id_proposal_pencairan=$i["id_proposal_pencairan"];
                                          ?>
       <form  action="<?php echo base_url()."arsip_pencairan_hibah_bansos/simpan_arsip_pencairan_hibah_bansos"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="arsip<?php echo $id_proposal_pencairan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>ARSIPKAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_proposal_pencairan" value="<?php echo $id_proposal_pencairan;?>">



                                <div class="form-group m-t-20">
                                    <label>No. NPHD <span style="color: red;">*</span></label>
                                    <input value="451.2/<?= sprintf("%03d",$i['id_proposal_pencairan']) ?>/KESRA.<?php echo date('Y',strtotime($i["tanggal_proposal_pencairan"]));?>" type="text" class="form-control" readonly name="No_NPHD" required  placeholder="No. NPHD" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Nama Penerima <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["nama_lengkap"];?>" type="text" class="form-control" readonly name="nama_penerima" required  placeholder="Nama Penerima" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>Tanggal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i["tanggal_proposal_pencairan"];?>" type="hidden" class="form-control" name="tanggal_pencairan" required  placeholder="Tanggal Pencairan" >
                                    <input value="<?php echo tgl_indo($i["tanggal_proposal_pencairan"]);?>" type="text" readonly class="form-control" required  placeholder="Tanggal Pencairan" >
                                </div>
                     
                                 <div class="form-group m-t-20">
                                    <label>File Arsip (File yang diperbolehkan jpg,png,docx,pdf)<span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="file_arsip" required  placeholder="File Arsip" >
                                </div>
                               

                                


                                
                  

                 </div>
                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">TUTUP</button>
                                  <button type="submit" class="btn btn-success">ARSIPKAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>
 <?php endforeach;?>



    <form  action="<?php echo base_url()."proposal_pencairan/simpan_proposal_pencairan"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>TAMBAH PROPOSAL PENCAIRAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
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

                                <div class="form-group m-t-20">
                                    <label>Kode Proposal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $kodejadi;?>" readonly type="text" class="form-control" name="kode_proposal_pencairan" required >
                                </div>


                              <?php if($this->session->userdata('level')!="pemohon"):?>                               
                                <div class="form-group m-t-20">
                                    <label>Pertimbangan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pertimbangan" id="id_pertimbangan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND status_pertimbangan!='Ditolak'")->result_array() as $key):?>
                                        <?php 
                                      $lewat="";
                                      foreach ($data_proposal_pencairan->result_array() as $i5){
                                            if($i5["kode_pertimbangan"]==$key['kode_pertimbangan']){
                                              $lewat="ya";
                                            }
                                      }
                                          if($lewat==""){
                                          ?>
                                        <option value="<?php echo $key['id_pertimbangan'];?>"><?php echo $key['kode_pertimbangan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php } endforeach;?>
                                    </select>
                                </div>
                              <?php else:
                                  $id_pemohon3=$this->session->userdata('id_pengguna2');
                                ?>
                                <div class="form-group m-t-20">
                                    <label>Pertimbangan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pertimbangan" id="id_pertimbangan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND proposal.id_pemohon='$id_pemohon3' AND status_pertimbangan!='Ditolak'")->result_array() as $key):?>
                                        <?php 
                                      $lewat="";
                                      foreach ($data_proposal_pencairan->result_array() as $i5){
                                            if($i5["kode_pertimbangan"]==$key['kode_pertimbangan']){
                                              $lewat="ya";
                                            }
                                      }
                                          if($lewat==""){
                                          ?>
                                        <option value="<?php echo $key['id_pertimbangan'];?>"><?php echo $key['kode_pertimbangan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php } endforeach;?>
                                    </select>
                                </div>
                              <?php endif;?>

                              <div id="testt"></div>

                  							

																<div class="form-group m-t-20">
                                    <label>Tanggal Proposal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo date('Y-m-d');?>" readonly type="date" class="form-control" name="tanggal_proposal_pencairan" required  placeholder="Tanggal Proposal Pencairan" >
                                </div>

											           <div class="form-group m-t-20">
                                    <label>Nama Bank <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_bank" required  placeholder="Nama Bank" >
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
                                  <button type="submit" class="btn btn-success">SIMPAN</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
   </form>







  <?php foreach ($data_proposal_pencairan->result_array() as $i) :
                                            $id_proposal_pencairan=$i["id_proposal_pencairan"];
                                          ?>
       <form  action="<?php echo base_url()."proposal_pencairan/update_proposal_pencairan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalUpdate<?php echo $id_proposal_pencairan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PROPOSAL PENCAIRAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="id_proposal_pencairan" value="<?php echo $id_proposal_pencairan;?>">


															 <div class="form-group m-t-20">
                                    <label>Kode Proposal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['kode_proposal_pencairan'];?>" readonly type="text" class="form-control" name="kode_proposal_pencairan" required >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Pertimbangan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="id_pertimbangan" required>
                                      <option value="">--pilih--</option>
                                      <?php foreach ($this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal")->result_array() as $key):?>
                                        <option <?= ($i['id_pertimbangan']==$key['id_pertimbangan'])?'selected':'';?> value="<?php echo $key['id_pertimbangan'];?>"><?php echo $key['kode_pertimbangan'];?> | <?php echo $key['judul_proposal'];?></option>
                                      <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Proposal Pencairan <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['tanggal_proposal_pencairan'];?>"  type="date" class="form-control" name="tanggal_proposal_pencairan" required  placeholder="Tanggal Proposal Pencairan" >
                                </div>

                                 <div class="form-group m-t-20">
                                    <label>Nama Pemilik Sesuai di Buku Rekening Pemohon (Wajib Bank Kalteng) <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nama_bank'];?>"  type="text" class="form-control" name="nama_bank" required  placeholder="Nama Pemilik Sesuai di Buku Rekening Pemohon (Wajib Bank Kalteng)" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nomor Rekening <span style="color: red;">*</span></label>
                                    <input value="<?php echo $i['nomor_rekening'];?>"  type="text" class="form-control" name="nomor_rekening" required  placeholder="Nomor Rekening" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File Proposal Pencairan </label>
                                    <input   type="file" class="form-control" name="file_proposal_pencairan"   >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Catatan Pemohon </label>
                                    <textarea class="form-control" name="catatan_pemohon" ><?php echo $i['catatan_pemohon'];?></textarea>
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



   <?php foreach ($data_proposal_pencairan->result_array() as $i) :
                                            $id_proposal_pencairan=$i["id_proposal_pencairan"];
                                          ?>
       <form  action="<?php echo base_url()."proposal_pencairan/hapus_proposal_pencairan"?>" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="ModalHapus<?php echo $id_proposal_pencairan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-info white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>HAPUS PROPOSAL PENCAIRAN</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     
                       <input type="hidden" name="kode" value="<?php echo $id_proposal_pencairan;?>">
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
  text: "Proposal Pencairan Berhasil di SIMPAN"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_edit") == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: "success",
  text: "Proposal Pencairan Berhasil di EDIT"
})
 </script>
<?php endif; ?>

<?php if($this->session->flashdata("berhasil_hapus") == TRUE): ?>
 <script type="text/javascript">
     Swal.fire({
  icon: "success",
  text: "Proposal Pencairan Berhasil di HAPUS"
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





			