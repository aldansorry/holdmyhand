<!-- <footer class="container bg-white p-3 rounded-top mt-3">
	<div class="">
		Footer
	</div>
</footer> -->
<div class="back-to-top">
  <button type="button" id="toTop" class="btn btn-white px-3 py-2"><i class="fa fa-arrow-up"></i></button>
</div>
<!-- Sweeralert -->
<script src="<?php echo base_url('assets_elaadmin/'); ?>js/lib/sweetalert/sweetalert.min.js"></script>


<!-- Cart -->
<script src="<?php echo base_url('assets_elaadmin/'); ?>js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url('assets_elaadmin/'); ?>js/lib/chart-js/chartjs-init.js"></script>
    <script src="<?php echo base_url('assets_elaadmin/'); ?>js/scripts.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  $(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});

$("#toTop").click(function() {
    $("html, body").animate({scrollTop: 0}, 1000);
 });
</script>
</body>
</html>
