
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
                 <h4 class="card-title"> <b>Laporan Grafik Pengajuan Hibah Bansos</b>
       </h4>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
              
           <div class="card-body">
               <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<a style="margin: 2px; float: right;" type="button" class="btn btn-success " target="_blank" href="<?php echo base_url();?>grafik/filter"><i class="fa fa-print"></i> CETAK GRAFIK</a>
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

<table border="1"width="100%" style="font-size: 14px;">
     <thead style=" text-align: center; ">
  <tr>
        <th style="text-align:center;">Status</th>
        <th>2018</th>
        <th>2019</th>
        <th>2020</th>
        <th>2021</th>
        <th>2022</th>
        <th>2023</th>
        <th>2024</th>
        <th>2025</th>
        
                        </tr>
                      </thead>
                                          
                                    
                                            <tr>
                                              
        <td style="text-align: center;">Disetujui</td>

        <?php $numtahun=2018; $jum_hslv1=""; for ($i4=0; $i4 < 8; $i4++){
                            $jumlah_pengaduan=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$numtahun' AND status_pertimbangan='Diterima'")->num_rows();
                            if($jumlah_pengaduan==0){
                                $jum_hsl=0;
                            }else{
                                 $jumlah_pengaduan2=$this->db->query("SELECT SUM(anggaran_yg_disetujui) as hasil FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$numtahun' AND status_pertimbangan='Diterima'")->row();
                                $jum_hsl=$jumlah_pengaduan2->hasil;
                            }
                           
                            $numtahun++;
                            $jum_hslv1.="<td style='text-align: right;'>".rupiah($jum_hsl)."</td>";
                        }
                        echo $jum_hslv1;
            ?>
               
        
        </tr>


                                            <tr>
                                              
        <td style="text-align: center;">Ditunda</td>

        <?php $numtahun2=2018; $jum_hslv2=""; for ($i4=0; $i4 < 8; $i4++){
                            $jumlah_pengaduan=$this->db->query("SELECT * FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$numtahun2' AND status_pertimbangan='Ditunda'")->num_rows();
                            if($jumlah_pengaduan==0){
                                $jum_hsl=0;
                            }else{
                                 $jumlah_pengaduan2=$this->db->query("SELECT SUM(anggaran_yg_disetujui) as hasil FROM pemohon,proposal,pertimbangan WHERE proposal.id_pemohon=pemohon.id_pemohon AND pertimbangan.id_proposal=proposal.id_proposal AND YEAR(pertimbangan.tanggal_pertimbangan)='$numtahun2' AND status_pertimbangan='Ditunda'")->row();
                                $jum_hsl=$jumlah_pengaduan2->hasil;
                            }
                           
                            $numtahun2++;
                            $jum_hslv2.="<td style='text-align: right;'>".rupiah($jum_hsl)."</td>";
                        }
                        echo $jum_hslv2;
            ?>
               
        
        </tr>
    </table>

          </div>
          </div>
      
        </div>



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


  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
      