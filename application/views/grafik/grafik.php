
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <body>
   <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,",",".");
  return $hasil_rupiah;
}
?>

<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    );
    $pecahkan = explode("-", $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . " " . $bulan[(int) $pecahkan[1]] . " " . $pecahkan[0];
}?>
       <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo.png">
            </td>
           <td>
                <font style="margin-right: 70px;" size="5">PEMERINTAH KABUPATEN KAPUAS</font> <br>
                <font style="margin-right: 70px;" size="6">SEKRETARIAT DAERAH</font> <br>
                <font style="margin-right: 70px;" size="3">Jalan Pemuda Km. 5,5 No. 1 Telp. (0513) – 21005 KODE POS 73515</font> <br>
                <font style="margin-right: 70px;" size="3">K U A L A   K A P U A S</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN GRAFIK PENGAJUAN HIBAH BANSOS </u> <br> </h3>
    <br>

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







<script type="text/javascript">
  var delayInMilliseconds = 1000; 

setTimeout(function() {
  window.print()
}, delayInMilliseconds);
</script>
  </body>
</html>

      