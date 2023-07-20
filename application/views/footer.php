
 
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; SISTEM INFORMASI MANAJEMEN PENGARSIPAN DOKUMEN PENCAIRAN HIBAH BANSOS DAN CUTI PEGAWAI PADA SETDA KABUPATEN KAPUAS. </span>
    </p>
  </footer>
   <noscript>
   <P class="alert bg-danger alert-dismissible mb-2" role="alert">
      <strong>MOHON MAAF HALAMAN INI WAJIB MENGGUNAKAN JAVASCRIPT, HARAP AKTIFKAN JAVASCRIPT ANDA</strong>
    </P>
   <style>div { display:none; }</style>
 </noscript>
  <!-- BEGIN VENDOR JS-->
<!--   <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script> -->
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/template/app-assets/js/scripts/forms/validation/form-validation.js"
  type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/myscript.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.js-example-basic-multiple').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
</script>


 <script src="<?php echo base_url();?>assets/alert/query.js"></script>
<script type="text/javascript">
    $( '.uang' ).mask('00.000.000.000', {reverse: true});
</script>
</body>
</html>

<?php if($this->session->flashdata('notif_withdrawal_admin') == TRUE): ?>
 <script type="text/javascript">
    Swal.fire({
  icon: 'success',
  text: '-',
})
 </script>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#mySelect2').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
});

</script>

  <script type="text/javascript">
         $("#id_proposal").change(function(){ 
            $.ajax({
              type: "POST", // Method pengiriman data bisa dengan GET atau POST
              url: "<?php echo base_url("/pertimbangan/carihrg"); ?>", // Isi dengan url/path file php yang dituju
              data: {id_proposal : $("#id_proposal").val()}, // data yang akan dikirim ke file yang dituju
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#testt").html(response.list_barang).show();
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
              }
            });
          });
      </script>

  <script type="text/javascript">
         $("#id_pertimbangan").change(function(){ 
            $.ajax({
              type: "POST", // Method pengiriman data bisa dengan GET atau POST
              url: "<?php echo base_url("/proposal_pencairan/carihrg"); ?>", // Isi dengan url/path file php yang dituju
              data: {id_pertimbangan : $("#id_pertimbangan").val()}, // data yang akan dikirim ke file yang dituju
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#testt").html(response.list_barang).show();
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
              }
            });
          });
      </script>

  <script type="text/javascript">
         $("#id_proposal_pencairan").change(function(){ 
            $.ajax({
              type: "POST", // Method pengiriman data bisa dengan GET atau POST
              url: "<?php echo base_url("/penyaluran_bansos/carihrg"); ?>", // Isi dengan url/path file php yang dituju
              data: {id_proposal_pencairan : $("#id_proposal_pencairan").val()}, // data yang akan dikirim ke file yang dituju
              dataType: "json",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#testt").html(response.list_barang).show();
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
              }
            });
          });
      </script>


      <script>
  $(document).ready(function(){ 

   
    
    $("#jenis_penerima").change(function(){ 
            inputTextValue = document.getElementById('jenis_penerima').value;
            inputTextValuev2 = document.getElementById('status_proposal').value;
            window.location = "<?php echo base_url();?>proposal/view/" + inputTextValue + "/"  + inputTextValuev2;
          
    });
    $("#status_proposal").change(function(){ 
            inputTextValue = document.getElementById('jenis_penerima').value;
            inputTextValuev2 = document.getElementById('status_proposal').value;
            window.location = "<?php echo base_url();?>proposal/view/" + inputTextValue + "/"  + inputTextValuev2;
          
    });
   
    


  });
  </script>