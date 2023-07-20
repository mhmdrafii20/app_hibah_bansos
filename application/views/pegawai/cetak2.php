
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo base_url();?>"/>
  </head>
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
                <font style="" size="5">PEMERINTAH KABUPATEN KAPUAS</font> <br>
                <font style="" size="6">SEKRETARIAT DAERAH</font> <br>
                <font style="" size="3">Jalan Pemuda Km. 5,5 No. 1 Telp. (0513) – 21005 KODE POS 73515</font> <br>
                <font style="" size="3">K U A L A   K A P U A S</font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN PEGAWAI</u> <br> </h3>
    <br>

<table border="0"  style="margin-left: 30px; font-size: 11pt;"  class="table" >
  <tbody>


      <tr>
        <td width="130px">Nama Lengkap</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["nama_pegawai"];?></td>
      <tr>
   
      <tr>
        <td width="130px">NIP</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["nip"];?></td>
      <tr>

        
      <tr>
        <td width="130px">Jabatan</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["nama_jabatan"];?></td>
      <tr>
        
        
      <tr>
        <td width="130px">Golongan</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["nama_golongan"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Tempat Lahir</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["tempat_lahir"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Tanggal Lahir</td>
        <td width="10px">:</td>
        <td><?php echo tgl_indo($data_pegawai["tanggal_lahir"]);?></td>
      <tr>
        
      <tr>
        <td width="130px">Jenis Kelamin</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["jenis_kelamin"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Alamat</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["alamat"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Agama</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["agama"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Pendidikan Terakhir</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["pendidikan_terakhir"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Status Perkawinan</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["status_perkawinan"];?></td>
      <tr>
        
      <tr>
        <td width="130px">No Hp</td>
        <td width="10px">:</td>
        <td><?php echo $data_pegawai["no_hp"];?></td>
      <tr>
        
      <tr>
        <td width="130px">Tanggal Input</td>
        <td width="10px">:</td>
        <td><?php echo date("d-F-Y, H:i",strtotime($data_pegawai["tanggal_input"]));?></td>
      <tr>
        
  </tbody>
</table>

<BR><BR>
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
  </body>
</html>

      