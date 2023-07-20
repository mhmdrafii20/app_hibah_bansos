
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
                 <h4 class="card-title"> <b>Laporan Pertimbangan</b>
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
                        <div class="col-md-2">
                            DARI TANGGAL
                        </div>
                          <div class="col-md-2">
                        SAMPAI TANGGAL
                        </div>
                        <div class="col-md-3">
                        JENIS PENERIMA
                        </div>
                          <div class="col-md-3">
                        STATUS PERTIMBANGAN
                        </div>
                      </div>
                   <div class="row">
                        <div class="col-md-2 text-right">
                             <form target="_blank" action="<?php echo site_url("pertimbangan/filter") ?>" method="post">
                            <input type="date" name="tgl1" class="form-control" required autocomplete="off" />
                        </div>
                          <div class="col-md-2 text-right">
                        <input type="date" name="tgl2" class="form-control" required autocomplete="off" />
                        </div>
                        <div class="col-md-3 text-right">
                            <select class="form-control" name="jenis_penerima"  >
                                    <option value="0">--pilih jenis penerima--</option>
                                    <option >Rumah Ibadah</option>
                                    <option >Lembaga atau Badan</option>
                                    <option >Organisasi Kemasyarakatan atau Keagamaan</option>
                            </select>
                        </div>
                        <div class="col-md-3 text-right">
                            <select class="form-control" name="status_pertimbangan" required>
                                      <option value="0">--pilih status pertimbangan--</option>
                                      <option>Ditunda</option>
                                      <option>Ditolak</option>
                                      <option>Diterima</option>
                            </select>
                        </div>
                          
                         <div class="col-md-1 text-right">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak" >
                        </div>
                      </form>
                      </div>
              </div>
              <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12">
                <div class="row">
                            <form target="_blank" action="<?php echo site_url("pertimbangan/cetak") ?>" method="post">
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
           <th>Kode Pertimbangan</th>
        <th>Pemohon</th>
        <th>Judul Proposal</th>
        <th>Tanggal Pengajuan</th>
        <th>Tanggal Pertimbangan</th>
        <th>Status Pertimbangan</th>
        <th>Catatan Petugas </th>
        <th>Anggaran Yg Diajukan</th>
        <th>Anggaran Yg Disetujui</th>
        
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; $a=0; $b=0; foreach ($data_pertimbangan->result_array() as $i) :
                                            $id_pertimbangan=$i["id_pertimbangan"];
                                            $a=$a+$i["anggaran_yg_diajukan"];
                                            $b=$b+$i["anggaran_yg_disetujui"];
                                          ?>
                                    
                                            <tr>
                                              
        <td><?php echo $i["kode_pertimbangan"];?></td>
        <td><?php echo $i["nama_lengkap"];?></td>
        <td><?php echo $i["judul_proposal"];?></td>
        <td><?php echo tgl_indo($i["tanggal_pengajuan"]);?></td>
        <td><?php echo tgl_indo($i["tanggal_pertimbangan"]);?></td>
        <td><?php echo $i["status_pertimbangan"];?></td>
        <td><?php echo $i["catatan_petugas_"];?></td>
        <td><?php echo rupiah($i["anggaran_yg_diajukan"]);?></td>
        <td><?php echo rupiah($i["anggaran_yg_disetujui"]);?></td>
        
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
      