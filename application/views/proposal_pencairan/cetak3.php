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
        <font size="5"><b>NASKAH PERJANJIAN HIBAH DAERAH</b></font><br><br>
        <font size="4"><b>ANTARA</b></font><br><br>
        <font size="4"><b>PEMERINTAH KABUPATEN KAPUAS</b></font><br><br>
        <font size="4"><b>DENGAN</b></font><br><br>
        <font size="4"><b>PENGURUS <?php echo strtoupper($data_proposal_pencairan["nama_penerima"]);?></b></font><br>
         <font size="2">Nomor : 451.2/<?= sprintf("%03d",$data_proposal_pencairan['id_proposal_pencairan']) ?>/KESRA.<?php echo date('Y',strtotime($data_proposal_pencairan["tanggal_proposal_pencairan"]));?></font><br><br>
         <font size="4"><b>Tentang </b></font><br><br>
         <font size="4"><b>PEMBERIAN HIBAH DALAM BENTUK UANG DARI PEMERINTAH </b></font><br>
         <font size="4"><b>KABUPATEN KAPUAS KEPADA  <?php echo strtoupper($data_proposal_pencairan["nama_penerima"]);?></b></font><br>
         <font size="4"><b>TAHUN ANGGARAN <?php echo date('Y',strtotime($data_proposal_pencairan["tanggal_proposal_pencairan"]));?></b></font>
    </div>
  <hr>
<div style="margin-left:40px; margin-right:40px;">
<br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini <?php echo getDayIndonesia($data_proposal_pencairan["tanggal_proposal_pencairan"]);?> Tanggal <?php echo Terbilang(date('d',strtotime($data_proposal_pencairan["tanggal_proposal_pencairan"]))+0);?> Bulan <?php echo tgl_indo2($data_proposal_pencairan["tanggal_proposal_pencairan"]);?> Tahun Dua Ribu Dua Puluh Tiga, Kami yang bertanda tangan di bawah ini, masing-masing :<br>
<table border="0"  style="margin-left: 30px; font-size: 11pt;"  class="table" >
  <tbody>
   
      <tr>
        <td width="10px">1. </td>
        <td width="130px">Nama</td>
        <td width="10px">:</td>
        <td><b>Drs. SEPTEDY, M.Si</b></td>
      <tr>
        
      <tr>
        <td width="10px"></td>
        <td width="130px">Jabatan</td>
        <td width="10px">:</td>
        <td>Sekretaris Daerah Kabupaten Kapuas</td>
      <tr>
        
      <tr>
        <td width="10px"></td>
        <td width="130px">Alamat</td>
        <td width="10px">:</td>
        <td>Jl. Pemuda KM 5.5 Kuala Kapuas</td>
      <tr>
        
  </tbody>
</table>
<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam hal ini bertindak untuk dan atas nama Bupati Kapuas, selaku <b>PEMBERI HIBAH</b> selanjutnya disebut  sebagai <b>PIHAK PERTAMA</b>.
 <table border="0"  style="margin-left: 30px; font-size: 11pt;"  class="table" >
  <tbody>
   
      <tr>
        <td width="10px">2. </td>
        <td width="130px">Nama</td>
        <td width="10px">:</td>
        <td><b><?php echo $data_proposal_pencairan["nama_lengkap"];?></b></td>
      <tr>
        
      <tr>
        <td width="10px"></td>
        <td width="130px">Alamat</td>
        <td width="10px">:</td>
        <td><?php echo $data_proposal_pencairan["alamat"];?></td>
      <tr>
        
  </tbody>
</table>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dalam hal ini bertindak untuk dan atas Nama <?php echo $data_proposal_pencairan["nama_penerima"];?> selaku <b>PENERIMA HIBAH</b> selanjutnya disebut sebagai <b>PIHAK KEDUA</b>. <br><br>
 Secara bersama-sama disebut <b>PARA PIHAK</b><br>

<p>Berdasarkan Surat Keputusan Bupati Kapuas Nomor : 316/KESRA.<?php echo date('Y',strtotime($data_proposal_pencairan["tanggal_proposal_pencairan"]));?> Tentang Pemberian Hibah dalam Bentuk Uang kepada Badan, Lembaga, dan Organisasi Kemasyarakatan di Wilayah Kabupaten Kapuas Pada Anggaran Pendapatan Belanja Daerah Kabupaten Kapuas Tahun Anggaran 2023, maka <b>PIHAK PERTAMA</b> menyalurkan pemberian hibah dalam bentuk uang dari Pemerintah Kabupaten Kapuas kepada <b>PIHAK KEDUA</b> dan <b>PIHAK KEDUA</b> menerima hibah dari <b>PIHAK PERTAMA</b>.
</p> 
<p>Selanjutnya <b>PARA PIHAK</b> melakukan Perjanjian Hibah dengan syarat-syarat sebagaimana dalam Pasal-Pasal sebagai berikut :</p>
<br>
<br>
<style>
    @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
</style>
<div class="pagebreak"> </div>


 <div style="text-align: center;">
<font size="4"><b>JUMLAH DAN TUJUAN PEMBERIAN HIBAH</b></font><br>
<font size="3">Pasal 1</font><br><br>
</div>
<ol>
    <li>PIHAK PERTAMA memberikan hibah kepada PIHAK KEDUA, berupa uang sebesar <?php echo rupiah($data_proposal_pencairan['anggaran_yg_disetujui']);?></li>
    <li>Pemberian hibah sebagaimana dimaksud dalam ayat (1) dengan tujuan dipergunakan untuk <?php echo $data_proposal_pencairan["nama_penerima"];?></li>
</ol>


 <div style="text-align: center;">
<font size="4"><b>PENCAIRAN DANA HIBAH</b></font><br>
<font size="3">Pasal 2</font><br><br>
</div>
<ol>
    <li>Pencairan dana hibah sebagaimana dimaksud pada Pasal 1 ayat (1) bersumber dari Anggaran Pendapatan dan Belanja Daerah Kabupaten Kapuas Tahun Anggaran <?php echo date('Y',strtotime($data_proposal_pencairan["tanggal_proposal_pencairan"]));?>.</li>
    <li>Penyaluran sebagaimana dimaksud pada ayat (1) dapat menyesuaikan dengan kebutuhan dan ketersediaan anggaran.</li>
    <li>Untuk pencairan hibah, PIHAK KEDUA mengajukan permohonan kepada PIHAK PERTAMA, dengan dilampiri :
<ul><li>Naskah Perjanjian Hibah Daerah;</li>
<li>Fotocopy Rekening Bank PIHAK KEDUA yang masih aktif</li>
<li>Surat Pernyataan Tanggungjawab, bahwa hibah yang diterima akan dipergunakan sesuai dengan peruntukannya</li>
</ul>
</li>
<li>Penyaluran dana Hibah langsung ditransfer ke rekening PIHAK KEDUA.</li>
<li>PIHAK KEDUA setelah menerima dana hibah dari PIHAK PERTAMA, segera melaksanakan kegiatan sesuai ketentuan perundang-undangan yang berlaku.</li>
</ol>



<div style="text-align: center;">
<font size="4"><b>KEWAJIBAN PIHAK KEDUA
</b></font><br>
<font size="3">Pasal 3</font><br><br>
</div>
<ol>
    <li>PIHAK KEDUA melaksanakan dan bertanggungjawab penuh atas pelaksanaan program dan kegiatan yang didanai dari hibah dengan berpedoman pada ketentuan perundang-undangan.</li>
    <li>PIHAK KEDUA berkewajiban untuk membuat dan menyampaikan laporan penggunaan hibah disertai dengan dokumen dan bukti pertanggungjawaban yang sah dan lengkap kepada PIHAK PERTAMA.
</li>
    <li>Asli bukti-bukti pengeluaran yang lengkap dan sah sesuai peraturan perundang-undangan disimpan dan digunakan PIHAK KEDUA selaku obyek pemeriksaan</li>
    <li>Laporan Pertanggungjawaban sebagaimana dimaksud dalam ayat (2) disampaikan paling lambat sebelum berakhirnya Tahun Anggaran <?php echo date('Y');?>.</li>
    <li>Apabila sampai dengan berakhirnya Tahun Anggaran <?php echo date('Y',strtotime($data_proposal_pencairan["tanggal_proposal_pencairan"]));?> masih terdapat sisa dana hibah pada PIHAK KEDUA yang belum dapat dipertanggungjawabkan, maka PIHAK KEDUA wajib menyetorkan kembali sisa dana hibah tersebut ke Kas Daerah</li>
</ol>




<div style="text-align: center;">
<font size="4"><b>HAK DAN KEWAJIBAN PIHAK PERTAMA
</b></font><br>
<font size="3">Pasal 4</font><br><br>
</div>
<ol>
    <li>PIHAK PERTAMA berhak menunda pencairan dana hibah apabila PIHAK KEDUA tidak atau belum memenuhi persyaratan yang ditetapkan.</li>
    <li>PIHAK PERTAMA dapat melaksanakan evaluasi dan monitoring atas penggunaan dana hibah berdasarkan laporan pertanggungjawaban penggunaan yang disampaikan oleh PIHAK KEDUA.
</li>
    <li>PIHAK PERTAMA berkewajiban mencairkan dana hibah apabila seluruh persyaratan dan kelengkapan pengajuan pencairan dana hibah telah dipenuhi PIHAK KEDUA yang dinyatakan lengkap melalui verifikasi oleh Pemerintah Daerah.</li>
</ol>




<div style="text-align: center;">
<font size="4"><b>PENUTUP
</b></font><br>
<font size="3">Pasal 5</font><br><br>
</div>
Naskah Perjanjian Hibah Daerah ini dibuat dan ditandatangani dalam rangkap 4 (empat) dan bermaterai cukup dan masing-masing mempunyai kekuatan hukum yang sama.<br><br>
Demikian Naskah Perjanjian Hibah ini dibuat dengan niat dan semangat kerja yang baik untuk dipatuhi dan dilaksanakan oleh <b>PARA PIHAK</b>.
<br><br>




</div>


    <br><br><br>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            <p style="text-align: center;">
                <b>PIHAK PERTAMA</b><br>
                <b>SEKRETARIS DAERAH</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>Drs. SEPTEDY, M. Si</u></b><br>
            </p>
        </label>
    </div>

    <div style="text-align: left; display: inline-block; float: left; margin-left: 50px; font-size: 11pt;">
        <label>
            <p style="text-align: center;">
                <b>PIHAK KEDUA</b><br>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u><?php echo $data_proposal_pencairan['nama_lengkap'];?></u></b><br>
            </p>
        </label>
    </div>

   
</body>

</html>