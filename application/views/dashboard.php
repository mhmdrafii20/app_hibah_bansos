
<style type="text/css">
  #overlay4 {
    background: #ffffff;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    display: none;
  }
</style>
<div id="overlay4">
  <img src="<?php echo base_url();?>assets/load2.gif" alt="Loading" /><br/>
  HARAP TUNGGU, SEDANG MEMPROSES DATA
</div>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/app-assets/css/pages/users.css"> 

 <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Stats -->



      
        
          
          



        <div class="row">

 
 <?php if($this->session->userdata('level')!="pemohon"):?>
    <div class="alert alert-info" role="alert" >
 SISTEM INFORMASI MANAJEMEN PENGARSIPAN DOKUMEN PENCAIRAN HIBAH BANSOS DAN CUTI PEGAWAI PADA SETDA KABUPATEN KAPUAS
</div>
    <div class="card col-12">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;"> GRAFIK PENGAJUAN HIBAH BANSOS</h6>
                <div class="card-body">
                  
                     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <canvas id="myChart" style="width:100%; height: 350px;"></canvas>
   
<BR><BR>
<?php
$no1=rand(0,255);
$no2=rand(0,255);


?>


<script type="text/javascript">
   var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar', // also try bar or other graph types

        // The data for our dataset
        data: {
            labels: ["2018","2019","2020","2021","2022","2023","2024","2025"],
            // Information about the dataset
        datasets: [{
                label: 'Hibah Bansos Disetujui',
                 backgroundColor: ['rgba(60, 179, 113)'],
                borderColor: ['rgba(60, 179, 113)'],
                data: [<?php $numtahun=2018; for ($i4=0; $i4 < 8; $i4++){
                            $jumlah_pengaduan=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$numtahun' AND status_pertimbangan='Diterima'")->num_rows();
                            if($jumlah_pengaduan==0){
                                $jum_hsl=0;
                            }else{
                                 $jumlah_pengaduan2=$this->db->query("SELECT SUM(anggaran_yg_disetujui) as hasil FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$numtahun' AND status_pertimbangan='Diterima'")->row();
                                $jum_hsl=$jumlah_pengaduan2->hasil;
                            }
                           
                            $numtahun++;
            ?><?php echo $jum_hsl;?>,<?php } ?>],
            },{
                label: 'Hibah Bansos Ditunda',
                 backgroundColor: ['rgba(106, 90, 205)'],
                borderColor: ['rgba(106, 90, 205)'],
                data: [<?php $nummonth=2018; for ($i4=0; $i4 < 12; $i4++){
                            $jumlah_pengaduanv=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$nummonth' AND status_pertimbangan='Ditunda' ")->num_rows();
                            if($jumlah_pengaduanv==0){
                                $jum_hsl=0;
                            }else{
                                 $jumlah_pengaduan3=$this->db->query("SELECT SUM(anggaran_yg_disetujui) as hasil FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$nummonth' AND status_pertimbangan='Ditunda' ")->row();
                                $jum_hsl=$jumlah_pengaduan3->hasil;
                            }
                            $nummonth++;
            ?><?php echo $jum_hsl;?>,<?php } ?>],
            }]
        },

       
    });

</script>
            </div>
            </div>
            
        </div>

    <div class="card col-12">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;"> KANTOR SEKRETARIAT DAERAH KABUPATEN KAPUAS</h6>
                <div class="card-body">
                  <img src="http://localhost/app_surat_setda/assets/bg3.jpeg" width="100%" height="400px">
            </div>
            </div>
            
        </div>
        <div class="card col-12">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">VISI & MISI</h6>
                <div class="card-body">
                  <b>VISI</b><br>
                  <ol>
                 <li> Terwujudnya Kabupaten Kapuas yang Lebih Maju, Sejahtera dan Mandiri Melalui Pembangunan yang Adil dan Merata serta Berkelanjutan</li>
                  </ol>
                  <br>
                  <br>
                  <b>MISI</b><br>
                  <ol>
                  <li>Meningkatkan kualitas pelayanan Administrasi dibidang pemerintahan, pembangunan dan kemasyarakatan.</li>
<li>Menyelenggarakan pemerintahan yang transparan dan akuntabel.</li>
<li>Meningkatkan Sumber Daya Aparatur guna mendukung sistem pelayanan publik.</li>
  </ol>
            </div>
            </div>
            
        </div>
        <div class="card col-12">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">TUGAS DAN FUNGSI</h6>
                <div class="card-body">
                 
                 Sebagaimana Peraturan Bupati Kapuas Nomor 39 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas Dan Fungsi Serta Tata Kerja Sekretariat Daerah Kabupaten Kapuas, Sekretariat Daerah melaksanakan tugas :<br><br>

Sekretariat Daerah mempunyai tugas membantu Bupati dalam penyusunan kebijakan dan pengkoordinasian administratif terhadap pelaksanaan tugas Perangkat Daerah serta pelayanan administratif.<br><br>

Dalam melaksanakan tugas sebagaimana dimaksud diatas, Sekretariat Daerah menyelenggarakan fungsi :<br><br>


                  <ol>
                 <li>pengkoordinasian penyusunan kebijakan Pemerintah Daerah</li>
<li>pengkoordinasian pelaksanaan tugas satuan kerja Perangkat Daerah</li>
<li>pemantauan dan evaluasi pelaksanaan Kebijakan Daerah</li>
<li>pelayanan administratif dan pembinaan aparatur sipil negara pada Instansi Daerah</li>
<li>pelaksanaan fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya.</li>
                  </ol>
            </div>
            </div>
            
        </div>


<!-- 
    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left w-100">
                            <h3 class="warning"><?php// echo $this->db->query("SELECT * FROM arsip_pencairan_hibah_bansos")->num_rows();?></h3>
                            <span>Total Arsip Pencairan Hibah Bansos</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-file warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left w-100">
                            <h3 class="danger"><?php// echo $this->db->query("SELECT * FROM surat_perintah_perjalanan_dinas,pegawai WHERE surat_perintah_perjalanan_dinas.id_pegawai=pegawai.id_pegawai")->num_rows();?></h3>
                            <span>Total Surat Perintah Perjalanan Dinas (SPPD)</span>
                        </div> 
                        <div class="media-right media-middle">
                            <i class="fa fa-bus danger font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Content Column -->
    

       <?php else:
                    //jika pemohon
                    ?>

    <?php

  $id_pemohon22=$this->session->userdata('id_pengguna2');
  $row=$this->db->query("SELECT * FROM pemohon where id_pemohon='$id_pemohon22'")->row_array();

?>


   <div class="col-xl-12 col-lg-12 col-12">

 <?php if($row['alamat']==""):?>
<div class="alert alert-warning" role="alert" >
  Mohon segera lengkapi biodata diri Anda untuk dapat melakukan pengajuan pada layanan kami dan mohon tunggu konfirmasi dari Admin untuk verifikasi
</div>
<?php endif;?>
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary" style="text-align: center; ">BIODATA</h6>
                    <hr>

                    <table border="0"  style="font-size: 11pt;font-family: 'Times New Roman'; margin: 10px 20px 20px 20px; " >
  <div> 
  <tbody>
  <tr>
      <td width="30%">NIK</td>
      <td width="5%">: </td>
      <td width="65%"><?php echo $row['nik'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Nama Lengkap</td>
      <td width="10px">: </td>
      <td><?php echo $row['nama_lengkap'];?></td>
      <td></td>
  </tr>
  <?php if($row['alamat']!=""):?>
  <tr>
      <td width="220px">Tempat, Tanggal Lahir</td>
      <td width="10px">: </td>
      <td><?php echo $row['tempat_lahir'];?> - <?php echo tgl_indo($row['tanggal_lahir']);?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Jenis Kelamin</td>
      <td width="10px">: </td>
      <td><?php echo $row['jenis_kelamin'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Alamat</td>
      <td width="10px">: </td>
      <td><?php echo $row['alamat'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">No HP/WA</td>
      <td width="10px">: </td>
      <td><?php echo $row['no_hp_pemohon'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Status Perkawinan</td>
      <td width="10px">: </td>
      <td><?php echo $row['status_perkawinan'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">File KTP</td>
      <td width="10px">: </td>
      <td> <?php if(!empty($row["file_ktp"])):?>
                                                  <a target="_blank" style="margin: 2px;" type="button" href="<?php echo base_url();?>assets/image/<?php echo $row['file_ktp'];?>" class="btn btn-info mdi mdi-pencil btn-sm" > VIEW</a>
                                              <?php else:?>
                                                  <button style="margin: 2px;" type="button"  class="btn btn-danger mdi mdi-pencil btn-sm" > EMPTY</button>
                                              <?php endif;?>
        </td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Jenis Penerima</td>
      <td width="10px">: </td>
      <td><?php echo $row['jenis_penerima'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Nama Rumah Ibadah/Lembaga/Ormas</td>
      <td width="10px">: </td>
      <td><?php echo $row['nama_penerima'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Alamat Rumah Ibadah/Lembaga/Ormas</td>
      <td width="10px">: </td>
      <td><?php echo $row['alamat_penerima'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Tanggal Mendaftar</td>
      <td width="10px">: </td>
      <td><?php echo tgl_indo(date("Y-m-d",strtotime($row["tanggal_mendaftar"])));?>, <?php echo date("H:i",strtotime($row["tanggal_mendaftar"]));?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Status Pemohon</td>
      <td width="10px">: </td>
      <td><?php echo $row['status_pemohon'];?></td>
      <td></td>
  </tr>
  <tr>
      <td width="220px">Catatan Petugas</td>
      <td width="10px">: </td>
      <td><?php echo $row['catatan_petugas'];?></td>
      <td></td>
  </tr>
<?php endif;?>
</tbody>
</div>
</table>
<hr>
                                <button style="margin: 2px; float: right;" type="button" class="btn btn-success " data-toggle="modal" data-target="#modaltambah"><i class="fa fa-edit"></i> UPDATE PROFILE</button>
                                <br><br>
                </div>
            </div>
        </div>
    </div>




    <form  action="<?php echo base_url()."dashboard/update"?>" method="post" method="post" enctype="multipart/form-data">
   <div class="form-group">
                          <div class="modal fade text-left" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel9"
                          aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header bg-success white">
                                  <h4 class="modal-title" id="myModalLabel9"> <b>UPDATE PROFILE</b></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

    
                 <div class="modal-body">
                     

                    <input readonly value="<?php echo $row["id_pemohon"];?>" type="hidden" class="form-control" name="id_pemohon" required  placeholder="NIK" >
                                   <div class="form-group m-t-20">
                                    <label>NIK <span style="color: red;">*</span></label>
                                    <input readonly value="<?php echo $row["nik"];?>" type="text" class="form-control" name="nik" required  placeholder="NIK" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Lengkap <span style="color: red;">*</span></label>
                                    <input value="<?php echo $row["nama_lengkap"];?>" type="text" class="form-control" name="nama_lengkap" required  placeholder="Nama Lengkap" >
                                </div>


                                <div class="form-group m-t-20">
                                    <label>Jenis Kelamin <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($row['jenis_kelamin'] == "Laki-Laki")?'selected': '' ?> >Laki-Laki</option>
                                  <option <?= ($row['jenis_kelamin'] == "Perempuan")?'selected': '' ?> >Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tempat Lahir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $row["tempat_lahir"];?>" type="text" class="form-control" name="tempat_lahir" required  placeholder="Tempat Lahir" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input value="<?php echo $row["tanggal_lahir"];?>" type="date" class="form-control" name="tanggal_lahir" required  placeholder="Tanggal Lahir" >
                                </div>

                                

                                <div class="form-group m-t-20">
                                    <label>Alamat <span style="color: red;">*</span></label>
                                    <textarea class="form-control" name="alamat" required><?php echo $row["alamat"];?></textarea>
                                </div>

                                <div class="form-group m-t-20">
                                    <label>No HP/WA <span style="color: red;">*</span></label>
                                    <input value="<?php echo $row["no_hp_pemohon"];?>" type="text" class="form-control" name="no_hp_pemohon" required  placeholder="No HP/WA" >
                                </div>

                                

                                <div class="form-group m-t-20">
                                    <label>Status Perkawinan <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status_perkawinan" required>
                                      <option value="">--pilih--</option>
                                      <option <?= ($row['status_perkawinan'] == "Belum Menikah")?'selected': '' ?> >Belum Menikah</option>
                                  <option <?= ($row['status_perkawinan'] == "Sudah Menikah")?'selected': '' ?> >Sudah Menikah</option>
                                  <option <?= ($row['status_perkawinan'] == "Janda / Duda")?'selected': '' ?> >Janda / Duda</option>
                                    </select>
                                </div>

                                
                                <div class="form-group m-t-20">
                                    <label>Jenis Penerima <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jenis_penerima" required>
                                          <option value="">-pilih jenis penerima-</option>
                                          <option <?= ($row['jenis_penerima'] == "Rumah Ibadah")?'selected': '' ?> >Rumah Ibadah</option>
                                          <option <?= ($row['jenis_penerima'] == "Lembaga atau Badan")?'selected': '' ?> >Lembaga atau Badan</option>
                                          <option <?= ($row['jenis_penerima'] == "Organisasi Kemasyarakatan atau Keagamaan")?'selected': '' ?> >Organisasi Kemasyarakatan atau Keagamaan</option>
                                  </select>  
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Nama Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input value="<?php echo $row["nama_penerima"];?>" type="text" class="form-control" name="nama_penerima" required  placeholder="Nama Rumah Ibadah/Lembaga/Ormas" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Alamat Rumah Ibadah/Lembaga/Ormas <span style="color: red;">*</span></label>
                                    <input value="<?php echo $row["alamat_penerima"];?>" type="text" class="form-control" name="alamat_penerima" required  placeholder="Alamat Rumah Ibadah/Lembaga/Ormas" >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>File Ktp </label>
                                    <input type="file" class="form-control" name="file_ktp"    >
                                </div>

                                <div class="form-group m-t-20">
                                    <label>Password <span style="color:red;">(kosongkan jika tidak ada perubahan)</span></label>
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

<?php endif;?>


























</div>


        <!--/ Product sale & buyers -->
        
        <!-- Social & Weather -->
      
        <!-- Basic Horizontal Timeline -->
      
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>

    <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>





  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/extensions/jquery.knob.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/pages/dashboard-fitness.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/alert/sweetalert2@9"></script>



<?php if($this->session->flashdata('berhasil_simpan_topten') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: '----',
})
 </script>
<?php endif; ?>




 


