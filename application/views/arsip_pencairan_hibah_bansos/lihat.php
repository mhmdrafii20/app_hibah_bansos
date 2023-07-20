
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
                 <h4 class="card-title"> <b>Laporan Arsip Pencairan Hibah Bansos</b>
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
                             <form target="_blank" action="<?php echo site_url("arsip_pencairan_hibah_bansos/filter") ?>" method="post">
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
                            <form target="_blank" action="<?php echo site_url("arsip_pencairan_hibah_bansos/cetak") ?>" method="post">
                            <input type="submit" class="btn btn-success" target="_blank" value="Cetak Semua" >
                      </form>
                      </div>


              </div>
            </div>

          </div>
          <hr>
          <div class="card-body card-dashboard">
                 
                    <table class="table table-striped table-bordered zero-configuration " id="mytable">
                      <thead>
                        <tr>
          <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                          <th>No. NPHD </th>
                          <th>Nama Penerima </th>
                          <th>Tanggal Pencairan</th>
                          <!-- <th>File Arsip</th> -->
                          <th>Tanggal Arsip</th>
                        </tr>
                      </thead>
                        <tbody>
                                             <?php $no=1; foreach ($data_arsip_pencairan_hibah_bansos->result_array() as $i) :
                                            $id_arsip_pencairan_hibah_bansos=$i['id_arsip_pencairan_hibah_bansos'];
                                          ?>
                                    
                                            <tr>
                                              
                                              <td style="flex: 0 0 auto; min-width: 2em;"><?php echo $no++;?></td>
                                              <td><?php echo $i['No_NPHD'];?></td>
                                              <td><?php echo $i['nama_penerima'];?></td>
                                              <td><?php echo tgl_indo($i['tanggal_pencairan']);?></td>
                                             <!--  <td>
                                                <?php// 
                                                //$cek_string=substr($i['file_arsip'], -4);
                                                //if(($cek_string==".jpg")OR($cek_string==".png")OR($cek_string=="jpeg")):?>
                                                    <a target="_blank" href="<?php// echo base_url();?>assets/image/<?php// echo $i['file_arsip'];?>"><img src="<?php// echo base_url();?>assets/image/<?php// echo $i['file_arsip'];?>" width="90px" height="110px"></a>
                                                  <?php// elseif($cek_string==".pdf"):?>
                                                    <a target="_blank" href="<?php// echo base_url();?>assets/image/<?php// echo $i['file_arsip'];?>"><img src="<?php// echo base_url();?>assets/pdf.png" width="90px" height="110px"></a>
                                                   <?php// elseif(($cek_string=="docx")OR($cek_string==".doc")):?>
                                                    <a target="_blank" href="<?php// echo base_url();?>assets/image/<?php// echo $i['file_arsip'];?>"><img src="<?php// echo base_url();?>assets/docx.png" width="90px" height="110px"></a>
                                                  <?php// endif;?>

                                              </td> -->
                                              <td><?php echo tgl_indo(date('Y-m-d',strtotime($i['tanggal_arsip'])));?>, <?php echo date('H:i',strtotime($i['tanggal_arsip']));?></td>
        
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
      