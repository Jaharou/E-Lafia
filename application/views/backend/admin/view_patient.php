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
$single_patient_info = $this->db->get_where('patient', array('patient_id' => $param2))->result_array();
foreach ($single_patient_info as $row):
?>
<div class="row">
    <div class="col-md-12">

<img src="<?php echo $this->crud_model->get_image_url('patient' , $row['patient_id']);?>" class="img-circle" width="100px" height="100px">
 </div></div>                 
 <div class="row">
    <div class="col-md-12">
<table class="display table table-striped table-bordered" cellspacing="0" width="100%">
    
     <tr>
        <td><?php echo get_phrase('identifiant de patient'); ?></td>
        <td><?php echo $row['patient_id']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('nom'); ?></td>
        <td><?php echo $row['name']; ?></td>
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
        <td><?php echo get_phrase('sexe'); ?></td>
        <td><?php echo $row['sex']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('date de naissance'); ?></td>
        <td><?php echo $row['birth_date']; ?></td>
    </tr>
     <tr>
        <td><?php echo get_phrase('age'); ?></td>
        <td><?php echo $row['age']; ?></td>
    </tr>
    <tr>
        <td><?php echo get_phrase('groupe sanguin'); ?></td>
        <td><?php echo $row['blood_group']; ?></td>
    </tr>

</table>
</div>
</div>
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;