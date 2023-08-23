<?php
/* 	
 * 	Tamplate: Edit Patient
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<section class="slice slice--arrow bg-base-1">
    <div class="sct-inner container">
        <div class="section-title section-title-inverse section-title--style-1 text-center">
            <h3 class="section-title-inner">
                <span> <?php echo get_phrase('our_professionals') ?></span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>
    </div>
</section>
<section class="slice">
    <div class="container">
        <div class="row-wrapper"> 
<?php $output = ''; ?>
<?php ob_start(); ?>
<?php
$single_doctor_info = $this->db->get_where('doctor', array('doctor_id' => $doctor_id))->result_array();
foreach ($single_doctor_info as $row):
?>
<div class="row">
    <div class="col-md-4">

<img src="<?php echo $this->crud_model->get_image_url('doctor' , $row['doctor_id']);?>" class="img-circle" width="100px" height="100px">
 </div>
 <div class="col-md-4"><center> <h1><?php echo $row['name']; ?></h1></center></div>
 <div class="col-md-4"> 
<a href="<?php echo base_url(); ?>home/appointment" class="btn btn-info btn-wide pull-right"> <i class="fa fa-plus"></i>
                <?php echo get_phrase('book_a_appointment'); ?>
            </a>
  </div>
</div>
 <div class="row">
    <div class="col-md-12">
<table class="display table table-striped table-bordered" cellspacing="0" width="100%">
    
     <tr>
        <td><?php echo get_phrase('doctor_id'); ?></td>
        <td><?php echo $row['doctor_id']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('name'); ?></td>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('department'); ?></td>
        <td><?php $name = $this->db->get_where('department' , array('department_id' => $row['department_id'] ))->row()->name;  echo $name;?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('email'); ?></td>
        <td><?php echo $row['email']; ?></td>
    </tr>
     <tr>
        <td><?php echo get_phrase('address'); ?></td>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('phone'); ?></td>
        <td><?php echo $row['phone']; ?></td>
    </tr>
     <tr>
        <td><?php echo get_phrase('profile'); ?></td>
        <td><?php echo $row['profile']; ?></td>
    </tr>

</table>
</div>
</div>
    </div>
    </div>
</section>
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;