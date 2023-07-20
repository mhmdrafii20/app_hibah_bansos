
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
  <body onload="window.print()">
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


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN LPJ HIBAH BANSOS <br> <?php echo strtoupper(tgl_indo($tgl1));?> SAMPAI DENGAN <?php echo strtoupper(tgl_indo($tgl2));?> </u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
     <thead style=" text-align: center; ">
  <tr>
          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
        <th>Pemohon</th>
        <th>Jenis Penerima</th>
        <th>Judul Proposal</th>
        <th>Bendahara</th>
        <th>Uraian</th>
        <th>Sisa Anggaran</th>
        <th>Keterangan</th>
        <th>Tanggal Lpj</th>
        <th>Anggaran Yg Disetujui</th>
        <th>Realisasi Anggaran</th>
        
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; $a=0; $b=0; foreach ($data_lpj_bantuan->result_array() as $i) :
                                            $id_lpj_bantuan=$i["id_lpj_bantuan"];
                                            $a=$a+$i["anggaran_yg_disetujui"];
                                            $b=$b+$i["realisasi_anggaran"];
                                          ?>
                                    
                                            <tr>
                                              
        <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
        <td><?php echo $i["nama_lengkap"];?></td>
        <td><?php echo $i["jenis_penerima"];?></td>
        <td><?php echo $i["judul_proposal"];?></td>
        <td><?php echo $i["bendahara"];?></td>
        <td><?php echo $i["uraian"];?></td>
        <td><?php echo rupiah($i["sisa_anggaran"]);?></td>
        <td><?php echo $i["keterangan"];?></td>
        <td><?php echo tgl_indo($i["tanggal_lpj"]);?></td>
        <td><?php echo rupiah($i["anggaran_yg_disetujui"]);?></td>
        <td><?php echo rupiah($i["realisasi_anggaran"]);?></td>
        
        </tr>
            <?php endforeach;?>
             <tr>
                <td colspan="9" style="text-align: center;">TOTAL</td>
                <td><?php echo rupiah($a);?></td>
                <td><?php echo rupiah($b);?></td>
            </tr>
        
        </tr>
    </table>
<BR><BR>
   <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Ditetapkan di Kuala Kapuas<br>
            Pada tanggal <?= tgl_indo(date("Y-m-d")) ?>
            <br>
            <p style="text-align: center;">
                <b>BUPATI KAPUAS</b><br>
                <b>SEKRETARIS DAERAH</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>Drs. SEPTEDY, M. Si</u></b><br>
                Pembina Utama Muda (IV/c)<br>
                NIP. 19690924 199012 1 002
            </p>
        </label>
    </div>
  </body>
</html>

      