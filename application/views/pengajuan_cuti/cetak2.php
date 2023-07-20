<!DOCTYPE html>
<html lang="en">
<?php
    $tgl1 = new DateTime($data_pengajuan_cuti['tanggal_mulai']);
    $tgl2 = new DateTime($data_pengajuan_cuti['tanggal_selesai']);
    $ddd = $tgl2->diff($tgl1)->days + 1;

    function Terbilang($nilai)
{
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai == 0) {
        return "Kosong";
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
}?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keputusan Cuti</title>
</head>

<body onLoad="window.print()">
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
    <br>

    <br>

    <div style="text-align: center;">
        <font size="4"><b><u>SURAT KEPUTUSAN CUTI</u></b></font><br>
        <font size="2">Nomor : <?= sprintf("%03d",$data_pengajuan_cuti['id_pengajuan_cuti']) ?>/SETDA-TL/<?php echo date('Y');?></font>
    </div>
    <br>
    1.  Diberikan cuti tahunan tahun <?php echo date('Y');?> kepada Pegawai Negeri Sipil :
    <table border="0"  style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  "  class="table " >
  <div> 
  <tbody>
  <tr >
      <td width="140px" >Nama</td>
      <td width="10px">:</td>
      <td ><?= $data_pengajuan_cuti['nama_pegawai'] ?></td>
  </tr>
  <br>
  <tr>
      <td>NIP</td>
      <td>:</td>
      <td><?= $data_pengajuan_cuti['nip'] ?></td>
  </tr>
  <tr>
      <td>Gol. Ruang</td>
      <td>:</td>
      <td><?= $data_pengajuan_cuti['nama_golongan'] ?></td>
  </tr>
  <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td><?= $data_pengajuan_cuti['nama_jabatan'] ?></td>
  </tr>
  <tr style="vertical-align: top;">
      <td>Unit Kerja</td>
      <td>:</td>
      <td>SEKRETARIAT DAERAH KABUPATEN KAPUAS</td>
  </tr>
  </tbody>
</div>
</table>
    <p>   Selama <?= $ddd ?> (<?= terbilang($ddd) ?>) hari, terhitung mulai tanggal <?= tgl_indo($data_pengajuan_cuti['tanggal_mulai']) ?> sampai dengan tanggal <?= tgl_indo($data_pengajuan_cuti['tanggal_selesai']) ?> dengan  ketentuan sebagai berikut :<p>
    <div style="margin-left: 10px;">a.  Sebelum menjalankan cuti tahunan wajib menyerahkan pekerjaan kepada atasan langsungnya atau pejabat lain yang &nbsp;&nbsp;&nbsp; ditunjuk.<br>
    b.  Setelah selesai menjalankan cuti tahunan wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali &nbsp;&nbsp;&nbsp;&nbsp;sebagaimana biasa.</div>
    <p>
    2.  Demikian surat izin cuti tahunan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>

    

    <br><br><br>

     <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Ditetapkan di Kuala Kapuas<br>
            Pada tanggal <?= tgl_indo(date('Y-m-d')) ?>
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

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    
   
</body>

</html>