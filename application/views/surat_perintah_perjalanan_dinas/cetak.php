
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


    <h3 align="center" style="font-size: 16px;"><u>LAPORAN SURAT PERINTAH PERJALANAN DINAS</u> <br> </h3>
    <br>
    <table border="1"width="100%" style="font-size: 14px;">
     <thead style=" text-align: center; ">
   <tr>
        <th>No.Surat</th>
        <th>Pegawai yang diperintahkan</th>
        <th>Maksud Perjalanan</th>
        <th>Alat Angkut</th>
        <th>Tempat Berangkat</th>
        <th>Tempat Tujuan</th>
        <th>Tgl Berangkat</th>
        <th>Tgl Harus Kembali</th>
        <th>Pengikut</th>
        <th>Tanggal Input</th>
        <th>Total Biaya Pengeluaran</th>
        
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; $a=0; foreach ($data_surat_perintah_perjalanan_dinas->result_array() as $i) :
                                            $id_surat_perintah_perjalanan_dinas=$i["id_surat_perintah_perjalanan_dinas"];
                                             $id_pengikut=$i['id_pengikut'];
                                            $check2 = explode(',', $id_pengikut);
                                            $a=$a+$i["total_biaya_pengeluaran"];
                                          ?>
                                    
                                            <tr>
                                              
        <td><?= sprintf("%03d",$i['id_surat_perintah_perjalanan_dinas']) ?></td>
        <td><?php echo $i["nama_pegawai"];?> - <?php echo $i["nip"];?></td>
        <td><?php echo $i["maksud_perjalanan"];?></td>
        <td><?php echo $i["alat_angkut"];?></td>
        <td><?php echo $i["tempat_berangkat"];?></td>
        <td><?php echo $i["tempat_tujuan"];?></td>
        <td><?php echo tgl_indo($i["tgl_berangkat"]);?></td>
        <td><?php echo tgl_indo($i["tgl_harus_kembali"]);?></td>
        <td>
                                              <?php foreach ($this->db->get('pegawai')->result_array() as $i3) : 
                                                $id2=$i3['id_pegawai']; 
                                                $nama2=$i3['nama_pegawai']; 
                                                $nip2=$i3['nip']; 
                                              ?>
                                              <?php in_array($id2, $check2) ? print "#".$nama2." - ".$nip2." <br>" : ""; ?>
                                              <?php endforeach;?>
                                                </td>
        <td><?php echo tgl_indo(date("Y-m-d",strtotime($i["tanggal_input"])));?>, <?php echo date("H:i",strtotime($i["tanggal_input"]));?></td>
         <td><?php echo rupiah($i["total_biaya_pengeluaran"]);?></td>
        
        </tr>
            <?php endforeach;?>
             <tr>
                <td colspan="10" style="text-align: center;">TOTAL</td>
                <td><?php echo rupiah($a);?></td>
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

            