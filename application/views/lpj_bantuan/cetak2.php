<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
  <?php 
   function getDayIndonesia($date)
    {
        if($date != '0000-00-00'){
            $data = hari(date('D', strtotime($date)));
        }else{
            $data = '-';
        }
  
        return $data;
    }
  
  
    function hari($day) {
        $hari = $day;
  
        switch ($hari) {
            case "Sun":
                $hari = "Minggu";
                break;
            case "Mon":
                $hari = "Senin";
                break;
            case "Tue":
                $hari = "Selasa";
                break;
            case "Wed":
                $hari = "Rabu";
                break;
            case "Thu":
                $hari = "Kamis";
                break;
            case "Fri":
                $hari = "Jum'at";
                break;
            case "Sat":
                $hari = "Sabtu";
                break;
        }
        return $hari;
    }
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

  <?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
function tgl_indo2($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return ' ' . $bulan[(int) $pecahkan[1]] . ' ';
}

function hari_ini($tanggal_meninggal3){
    $hari = date("D",strtotime($tanggal_meninggal3));
    switch($hari){
        case 'Sun':
            $hari_ini = "Minggu";
        break;
 
        case 'Mon':         
            $hari_ini = "Senin";
        break;
 
        case 'Tue':
            $hari_ini = "Selasa";
        break;
 
        case 'Wed':
            $hari_ini = "Rabu";
        break;
 
        case 'Thu':
            $hari_ini = "Kamis";
        break;
 
        case 'Fri':
            $hari_ini = "Jumat";
        break;
 
        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Tidak di ketahui";     
        break;
    }
    return "" . $hari_ini . "";
}



function Terbilang($nilai)
{
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai == 0) {
        return "";
    } elseif ($nilai < 12 & $nilai != 0) {
        return "" . $huruf[$nilai];
    } elseif ($nilai < 20) {
        return Terbilang($nilai - 10) . " Belas ";
    } elseif ($nilai < 100) {
        return Terbilang($nilai / 10) . " Puluh " . Terbilang($nilai % 10);
    } elseif ($nilai < 200) {
        return " Seratus " . Terbilang($nilai - 100);
    } elseif ($nilai < 1000) {
        return Terbilang($nilai / 100) . " Ratus " . Terbilang($nilai % 100);
    } elseif ($nilai < 2000) {
        return " Seribu " . Terbilang($nilai - 1000);
    } elseif ($nilai < 1000000) {
        return Terbilang($nilai / 1000) . " Ribu " . Terbilang($nilai % 1000);
    } elseif ($nilai < 1000000000) {
        return Terbilang($nilai / 1000000) . " Juta " . Terbilang($nilai % 1000000);
    } elseif ($nilai < 1000000000000) {
        return Terbilang($nilai / 1000000000) . " Milyar " . Terbilang($nilai % 1000000000);
    } elseif ($nilai < 100000000000000) {
        return Terbilang($nilai / 1000000000000) . " Trilyun " . Terbilang($nilai % 1000000000000);
    } elseif ($nilai <= 100000000000000) {
        return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
    }
}


?>
<body onLoad="window.print()">


    <div style="text-align: center;">
        <font size="4"><b>PENGURUS <?php echo strtoupper($data_lpj_bantuan["nama_penerima"]);?></b></font><br>
        <font size="4">Alamat <?php echo strtoupper($data_lpj_bantuan["alamat_penerima"]);?></font>
    </div>
  <hr>




  <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
  
    <table border="0"  style=" font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <tbody>
  <tr >
      <td >  Kuala Kapuas, <?= tgl_indo(date('Y-m-d')) ?></td>
  </tr>
  <tr >
      <td >Kepada :</td>
  </tr>
  <tr >
      <td ><b>Yth. Bagian Kesra Setda Kab. Kapuas</b></td>
  </tr>
  <tr >
      <td >Di-</td>
  </tr>
  <tr >
      <td >Kuala Kapuas</td>
  </tr>
  </tbody>
</table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="text-align: center;">
        <font size="4"><b>LAPORAN PENGGUNAAN HIBAH BERUPA UANG </b></font><br>
        <font size="4">Nomor : <?= sprintf("%03d",$data_lpj_bantuan['id_lpj_bantuan']) ?>/VII/<?php echo date('Y');?></font>
    </div>

<div style="margin-left:40px; margin-right:40px;">
<br>
<table border="0"   class="table" >
  <tbody>
   
      <tr>
        <td width="130px">Hibah Dari</td>
        <td width="10px">:</td>
        <td>Pemerintah Daerah Kabupaten Kapuas</td>
      <tr>
   
      <tr>
        <td width="130px">Besarnya Dana</td>
        <td width="10px">:</td>
        <td><?php echo rupiah($data_lpj_bantuan['anggaran_yg_disetujui']);?> (<?php echo Terbilang($data_lpj_bantuan['anggaran_yg_disetujui']);?>)</td>
      <tr>
        
      <tr>
        <td width="130px">Tahun Anggaran</td>
        <td width="10px">:</td>
        <td><?php echo date('Y');?></td>
      <tr>
        
        
  </tbody>
</table>
<br>
Bahwa dana hibah yang diterima dari pemerintah daerah kabupaten Kapuas telah dipergunakan sebagaimana peruntukannya sesuai permohonan/ proposal yang disampaikan, dengan uraian sebagai berikut .
<table border="1"width="100%" style="font-size: 14px;">
     <thead style=" text-align: center; ">
  <tr>
                 <th>Uraian</th>
        <th>Anggaran (Rp)</th>
        <th>Realisasi (Rp)</th>
        <th>Sisa (Rp)</th>
        <th>Keterangan</th>
                        </tr>
                      </thead>
                                    
                                            <tr>
                                              
        <td><?php echo $data_lpj_bantuan["uraian"];?></td>       
        <td><?php echo rupiah($data_lpj_bantuan["anggaran_yg_disetujui"]);?></td>       
        <td><?php echo rupiah($data_lpj_bantuan["realisasi_anggaran"]);?></td>       
        <td><?php echo rupiah($data_lpj_bantuan["sisa_anggaran"]);?></td>       
        <td><?php echo $data_lpj_bantuan["keterangan"];?></td>
        </tr>
    </table>
<br>
Demikian Laporan ini disampaikan dengan sebenarnya dan disertai dengan salinan/ Fotocopy bukti pengeluaran sah. Apabila dikemudian hari ternyata laporan ini tidak benar, maka kami siap mempertanggungjawabkan sesuai ketentuan perundang-undangan yang berlaku, terima kasih.
<br>
<br>

<!-- </div>
<style>
    @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
</style> -->


    <br>
    <br>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            <p style="text-align: center;">
                <b>Bendahara</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u><?php echo $data_lpj_bantuan['bendahara'];?></u></b><br>
            </p>
        </label>
    </div>

    <div style="text-align: left; display: inline-block; float: left; margin-left: 50px; font-size: 11pt;">
        <label>
            <p style="text-align: center;">
                <b>Ketua</b><br>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u><?php echo $data_lpj_bantuan['nama_lengkap'];?></u></b><br>
            </p>
        </label>
    </div>

   <div class="pagebreak"> </div>


</body>

</html>