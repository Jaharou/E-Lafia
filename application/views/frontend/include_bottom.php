<!-- Core -->
<script src="<?php echo base_url('assets/fronted/js/poper.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/esing.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/bug.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/sidebar.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/classie.js'); ?>"></script>
<!-- Bootstrap Extensions -->
<script src="<?php echo base_url('assets/fronted/js/hover.js'); ?>"></script>
<!-- Plugins -->
<script src="<?php echo base_url('assets/fronted/js/flicker.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/swiper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/fronted/js/tost.min.js'); ?>"></script>
<!-- App JS -->
<script src="<?php echo base_url('assets/fronted/js/app.js'); ?>"></script>
 <script src="<?php echo base_url('assets/js/form-validator/jquery.form-validator.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/select2/select2.min.js'); ?>"></script> 
 <script src="<?php echo base_url('assets/js/toastr/toastr.min.js'); ?>"></script>

<script>    
   $(function($) {
        $.validate({
            form : '#form-validate',
            modules : 'security'
        });
    });
    $(function($) {
        $(".js-states").select2();      
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