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
<?php $output = ''; ?>
<?php ob_start(); ?>
<?php
$single_doctor_info = $this->db->get_where('doctor', array('doctor_id' => $param2))->result_array();
foreach ($single_doctor_info as $row):
?>
<div class="row">
    <div class="col-md-12">

<img src="<?php echo $this->crud_model->get_image_url('doctor' , $row['doctor_id']);?>" class="img-circle" width="100px" height="100px">
 </div></div>
 <div class="row">
    <div class="col-md-12">
<table class="display table table-striped table-bordered" cellspacing="0" width="100%">
    
     <tr>
        <td><?php echo get_phrase('identifiant de docteur'); ?></td>
        <td><?php echo $row['doctor_id']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('nom'); ?></td>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('département'); ?></td>
        <td><?php $name = $this->db->get_where('department' , array('department_id' => $row['department_id'] ))->row()->name;  echo $name;?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('email'); ?></td>
        <td><?php echo $row['email']; ?></td>
    </tr>
     <tr>
        <td><?php echo get_phrase('adresse'); ?></td>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('téléphone'); ?></td>
        <td><?php echo $row['phone']; ?></td>
    </tr>
     <tr>
        <td><?php echo get_phrase('profil'); ?></td>
        <td><?php echo $row['profile']; ?></td>
    </tr>

</table>
</div>
</div>
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;