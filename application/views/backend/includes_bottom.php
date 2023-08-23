<?php
/* 	
 * 	Tamplate: Basic Script
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2017
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
  		<?php //COMMON JS FILES ?>
        <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/iscroll/iscroll.js"></script>
      	<?php //PAGE JS FILES ?>		
        <script src="<?php echo base_url(); ?>assets/js/prism/prism.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waypoint/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/counterUp/jquery.counterup.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/amcharts/amcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/amcharts/serial.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/amcharts/pie.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/amcharts/plugins/animate/animate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="<?php echo base_url(); ?>assets/js/amcharts/themes/light.js"></script>


        <script src="<?php echo base_url(); ?>assets/js/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>	     
        <script src="<?php echo base_url(); ?>assets/js/DataTables/datatables.min.js"></script>	
		<?php //THEME JS ?>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/production-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/traffic-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/task-list.js"></script>	
        <script src="<?php echo base_url(); ?>assets/js/form-validator/jquery.form-validator.min.js"></script> 
         <script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>   

<script>
    
     $(function($) {
        $.validate({
            form : '#form-validate',
            modules : 'security'
        });
    });
      $(function($) {
        $.validate({
            form : '#form2-validate',
            modules : 'security'
        });
    });
    $(function($) {
        $(".js-states").select2();      
    });
</script>   
 <script>
    $(function($) {
        $('#example').DataTable();
        $('#example-two').DataTable();
        $('#example-three').DataTable();
    });
</script>
<?php if ($this->session->flashdata('message') != ""):?>
<script type="text/javascript">
     toastr.success("<?php echo $this->session->flashdata("message");?>");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error') != ""):?>
<script type="text/javascript">
     toastr.error("<?php echo $this->session->flashdata("error");?>");
</script>
<?php endif;?>