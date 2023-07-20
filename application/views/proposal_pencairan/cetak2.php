<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
 <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <?php 
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
  <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <span style="float: left;">PEMERINTAH KABUPATEN KAPUAS<hr>
                Lembar ke I, II, III, IV, V
              </span>
            </td>
           <td>
            <img width="70px" src="<?= base_url() ?>assets/logo.png"><br>
                <font size="2">KWITANSI</font> 
            </td>
            <td>
              
                  <table border="0"  style="margin-left: 30px; font-size: 10pt!important; font-family: 'Times New Roman';  "  class="table " >
                <div> 
                <tbody>
                <tr style="vertical-align: top;">
                    <td width="140px" >Dibayar dan dibukukan</td>
                    <td width="20px">: </td>
                    <td width="70px"></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td width="140px" >Pada Tanggal</td>
                    <td width="20px">: </td>
                    <td ></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td width="140px" >Bukti Kas / No</td>
                    <td width="20px">: </td>
                    <td ></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td width="140px" >Pada Kode Rekening</td>
                    <td width="20px">: </td>
                    <td ></td>
                </tr>
                
                </tbody>
              </div>
              </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr size="2px" color="black">
            </td>
        </tr>
    </table>
    <br>

     <table border="0"  style="margin-left: 30px; font-size: 12pt!important; font-family: 'Times New Roman';  "  class="table " >
                <div> 
                <tbody>
                <tr style="vertical-align: top;">
                    <td width="170px" >Sudah terima dari</td>
                    <td width="20px">: </td>
                    <td >KUASA BENDAHARA UMUM DAERAH KABUPATEN KAPUAS</td>
                </tr>
                <tr style="vertical-align: top;">
                    <td width="170px" >Banyaknya uang</td>
                    <td width="20px">: </td>
                    <td ><?= Terbilang($data_proposal_pencairan['anggaran_yg_disetujui']) ?> Rupiah</td>
                </tr>
                <tr style="vertical-align: top;">
                    <td width="170px" >Untuk Pembayaran</td>
                    <td width="20px">: </td>
                    <td >Hibah Kepada <?php echo $data_proposal_pencairan['nama_penerima'];?> TA.<?php echo date('Y');?></td>
                </tr>
                
                </tbody>
              </div>
              </table>

              <br>

              <hr width="250px" size="2px" style="float: left;">
              <br>
              <?php echo rupiah($data_proposal_pencairan['anggaran_yg_disetujui']);?>
              <br>
              
              <hr width="250px" size="2px" style="float: left;">


<br>
<br>
<br>

 <br><br><br>



    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Kuala Kapuas <?= tgl_indo(date('Y-m-d')) ?>
            <br>
            <p style="text-align: center;">
                <b>TANDA TERIMA</b>
            </p>
            <br><br>
            <br><br>
            <p style="text-align: center;">
                 <table border="0"  style="margin-left: 30px; font-size: 12pt!important; font-family: 'Times New Roman';  "  class="table " >
                <div> 
                <tbody>
                <tr style="vertical-align: top;">
                    <td width="40px" >Nama</td>
                    <td width="20px"> </td>
                    <td ><?php echo $data_proposal_pencairan['nama_lengkap'];?></td>
                </tr>
                <tr style="vertical-align: top;">
                    <td width="40px" >Alamat</td>
                    <td width="20px"> </td>
                    <td ><?php echo $data_proposal_pencairan['alamat'];?></td>
                </tr>
                </tbody>
              </div>
              </table>
            </p>
        </label>
    </div>




    <div style="text-align: left; display: inline-block; float: left; margin-right: 50px; font-size: 11pt;">
        <label>
            <p style="text-align: center;">
                <b>Disetujui</b><br>
                <b> Pengguna Anggaran </b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>Drs. SEPTEDY, M. Si</u></b><br>
                NIP. 19641231 198903 1 002
            </p>
        </label>
    </div>


     <div style="text-align: left; display: inline-block; float: left; margin-right: 150px; font-size: 11pt;">
        <label>
            <p style="text-align: center;">
                <b>Telah dibayar</b><br>
                <b>Bendahara Pengeluaran, </b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>ELIZABETH INDRIYANI, A.Md</u></b><br>
                NIP. 19831125 201001 2 023
            </p>
        </label>
    </div>


   
</body>

</html>