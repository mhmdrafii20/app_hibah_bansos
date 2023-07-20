
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
                 <h4 class="card-title"> <b>Laporan Surat Perintah Perjalanan Dinas</b>
       </h4>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body card-dashboard">
                 
              
           <div class="card-body">
            <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#tab11" role="tab" aria-selected="true">Periode Pertanggal</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12" href="#tab12" role="tab" aria-selected="false"> Seluruh</a>
              </li>
            </ul>
            <div class="tab-content px-1 pt-1">
              <div class="tab-pane active" id="tab11" role="tabpanel" aria-labelledby="base-tab11">
                     <div class="row">
                        <div class="col-md-3">
                            DARI TANGGAL
                        </div>
                          <div class="col-md-3">
                        SAMPAI TANGGAL
                        </div>
                      </div>
                   <div class="row">
                        <div class="col-md-3 text-right">
                             <form target="_blank" action="<?php echo site_url("surat_perintah_perjalanan_dinas/filter") ?>" method="post">
                            <input type="date" name="tgl1" class="form-control" required autocomplete="off" />
                        </div>
                          <div class="col-md-3 text-right">
                        <input type="date" name="tgl2" class="form-control" required autocomplete="off" />
                        </div>
                          
                         <div class="col-md-1 text-right">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak" >
                        </div>
                      </form>
                      </div>
              </div>
              <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12">
                <div class="row">
                            <form target="_blank" action="<?php echo site_url("surat_perintah_perjalanan_dinas/cetak") ?>" method="post">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak Semua" >
                      </form>
                      </div>


              </div>
            </div>

          </div>
          <hr>
          <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration table-responsive" id="mytable">
                      <thead>
                        <tr>
          <th>No.Surat</th>
        <th>Pegawai yang diperintahkan</th>
        <th>Maksud Perjalanan</th>
        <th>Alat Angkut</th>
        <th>Tempat Berangkat</th>
        <th>Tempat Tujuan</th>
        <th>Tgl Berangkat</th>
        <th>Tgl Harus Kembali</th>
        <th>Total Biaya Pengeluaran</th>
        <th>Pengikut</th>
        <th>Tanggal Input</th>


                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_surat_perintah_perjalanan_dinas->result_array() as $i) :
                                            $id_surat_perintah_perjalanan_dinas=$i["id_surat_perintah_perjalanan_dinas"];
                                             $id_pengikut=$i['id_pengikut'];
                                            $check2 = explode(',', $id_pengikut);
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
        <td><?php echo rupiah($i["total_biaya_pengeluaran"]);?></td>
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
        
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                    </table>
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
      