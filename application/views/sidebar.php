   <!-- main menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <!-- main menu header-->
      
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
             <li class=" navigation-header">
        <center>
          <span>Menu Utama</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
          data-original-title="General"></i>
        </center>
        </li>


    
        <li class="<?php if($sidebar=="dashboard"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>


<?php if($this->session->userdata('level')!="pegawai"):?>
<?php if($this->session->userdata('level')!="pemohon"):?>
        <li class=" nav-item"><a href="#"><i class="fa fa-database"></i><span class="menu-title" data-i18n="">Data Master</span></a>
          <ul class="menu-content">


            <li class="<?php if($sidebar=="pemohon"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pemohon"><i class="fa fa-circle-o"></i>Pemohon</a>
            </li>

            <li class="<?php if($sidebar=="jabatan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>jabatan"><i class="fa fa-circle-o"></i>Jabatan</a>
            </li>

            <li class="<?php if($sidebar=="golongan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>golongan"><i class="fa fa-circle-o"></i>Golongan</a>
            </li>

            <li class="<?php if($sidebar=="pengguna"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pengguna"><i class="fa fa-circle-o"></i>Pengguna</a>
            </li>
            
          </ul>
        </li>


         <li class=" nav-item"><a href="#"><i class="fa fa-user"></i><span class="menu-title" data-i18n="">Kepegawaian </span></a>
          <ul class="menu-content">

            <li class="<?php if($sidebar=="pegawai"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pegawai"><i class="fa fa-circle-o"></i>Pegawai</a>
            </li>

            <li class="<?php if($sidebar=="surat_perintah_perjalanan_dinas"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>surat_perintah_perjalanan_dinas"><i class="fa fa-circle-o"></i>SPPD</a>
            </li>

            <li class="<?php if($sidebar=="pengajuan_cuti"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pengajuan_cuti"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a>
            </li>
            
          </ul>
        </li>

          <li class=" nav-item"><a href="#"><i class="fa fa-book"></i><span class="menu-title" data-i18n="">Proposal</span></a>
          <ul class="menu-content">



            <li class="<?php if($sidebar=="proposal"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>proposal"><i class="fa fa-circle-o"></i>Pengajuan Proposal</a>
            </li>

            <li class="<?php if($sidebar=="pertimbangan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>pertimbangan"><i class="fa fa-circle-o"></i>Pertimbangan</a>
            </li>

            <li class="<?php if($sidebar=="proposal_pencairan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>proposal_pencairan"><i class="fa fa-circle-o"></i>Proposal Pencairan</a>
            </li>

           
            
          </ul>
        </li>


          <li class=" nav-item"><a href="#"><i class="fa fa-usd"></i><span class="menu-title" data-i18n="">Pencairan</span></a>
          <ul class="menu-content">



            <li class="<?php if($sidebar=="penyaluran_bansos"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>penyaluran_bansos"><i class="fa fa-circle-o"></i>Penyaluran Bansos</a>
            </li>


             <li class="<?php if($sidebar=="lpj_bantuan"): ?>active<?php endif;?>"><a class="menu-item" href="<?php echo base_url();?>lpj_bantuan"><i class="fa fa-circle-o"></i>LPJ Bansos</a>
            </li>

           

           
            
          </ul>
        </li>




        

      



         <li class=" nav-item"><a href="#"><i class="fa fa-print"></i><span class="menu-title" data-i18n="">Laporan</span></a>
          <ul class="menu-content">



           

            <li class="<?php if($sidebar=="proposal2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>proposal/lihat"><i class="fa fa-circle-o"></i>Pengajuan Proposal</a>
            </li>

            <li class="<?php if($sidebar=="pertimbangan2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>pertimbangan/lihat"><i class="fa fa-circle-o"></i>Pertimbangan</a>
            </li>

            <li class="<?php if($sidebar=="proposal_pencairan2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>proposal_pencairan/lihat"><i class="fa fa-circle-o"></i>Proposal Pencairan</a>
            </li>

            <li class="<?php if($sidebar=="penyaluran_bansos2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>penyaluran_bansos/lihat"><i class="fa fa-circle-o"></i>Penyaluran Bansos</a>
            </li>

            <li class="<?php if($sidebar=="lpj_bantuan2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>lpj_bantuan/lihat"><i class="fa fa-circle-o"></i>LPJ Bansos</a>
            </li>

             <li class="<?php if($sidebar=="surat_perintah_perjalanan_dinas2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>surat_perintah_perjalanan_dinas/lihat"><i class="fa fa-circle-o"></i>SPPD</a>
            </li>

            <li class="<?php if($sidebar=="arsip_pencairan_hibah_bansos2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>arsip_pencairan_hibah_bansos/lihat"><i class="fa fa-circle-o"></i>Arsip Pencairan <br>Hibah Bansos</a>
            </li>

            <li class="<?php if($sidebar=="pengajuan_cuti2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>pengajuan_cuti/lihat"><i class="fa fa-circle-o"></i>Pengajuan Cuti</a>
            </li>

            <li class="<?php if($sidebar=="grafik2"): ?>active<?php endif;?>"><a  class="menu-item" href="<?php echo base_url();?>grafik/lihat"><i class="fa fa-circle-o"></i>Grafik Pengajuan</a>
            </li>



            
          </ul>
        </li>


      <?php else:

  $id_pemohon22=$this->session->userdata('id_pengguna2');
  $row=$this->db->query("SELECT * FROM pemohon where id_pemohon='$id_pemohon22'")->row_array();
if($row['status_pemohon']=="Disetujui"):
  ?>

        <!-- MENU PEMOHON -->
         <li class="<?php if($sidebar=="proposal"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>proposal"><i class="fa fa-book"></i><span class="menu-title" data-i18n="">Pengajuan Proposal</span></a>
        </li>

        <li class="<?php if($sidebar=="pertimbangan"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>pertimbangan"><i class="fa fa-book"></i><span class="menu-title" data-i18n="">Pertimbangan</span></a>
        </li>

        <li class="<?php if($sidebar=="proposal_pencairan"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>proposal_pencairan"><i class="fa fa-book"></i><span class="menu-title" data-i18n="">Proposal Pencairan</span></a>
        </li>


      <?php endif;?>
      <?php endif;?>
      <?php endif;?>

<?php if($this->session->userdata('level')=="pegawai"):?>
<!-- MENU PEGAWAI -->
  <li class="<?php if($sidebar=="pengajuan_cuti"): ?>active<?php endif;?> nav-item"><a href="<?php echo base_url();?>pengajuan_cuti"><i class="fa fa-book"></i><span class="menu-title" data-i18n="">Pengajuan Cuti</span></a>
        </li>
<?php endif;?>



      <li><a href="<?php echo base_url();?>login/logout"><i class="ft-log-out"></i><span class="menu-title" data-i18n="">Logout</span></a>
        </li>
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->