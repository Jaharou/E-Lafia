<?php
/* 	
 * 	Tamplate: Add Bed
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
$single_blood_donor_info = $this->db->get_where('blood_donor', array('blood_donor_id' => $param2))->result_array();
foreach ($single_blood_donor_info as $row):
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('ajouter un donneur de sang'); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>nurse/blood_donor/update/<?php echo $row['blood_donor_id']; ?>" method="post" enctype="multipart/form-data" >
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('nom'); ?></span>
						<input name="name" type="text" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('email'); ?></span>
						<input name="email" type="text" value="<?php echo $row['email']; ?>" class="form-control" placeholder="email" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('adresse'); ?></span>
						<input name="address" type="text" value="<?php echo $row['address']; ?>" class="form-control" placeholder="address" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('téléphone'); ?></span>
						<input name="phone" type="text" value="<?php echo $row['name']; ?>" class="form-control" placeholder="phone" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('sexe'); ?></span>
						 <select name="sex" class="form-control">
							<option value=""><?php echo get_phrase('sélectionner le sexe'); ?></option>
							<option value="male" <?php if ($row['sex'] == 'male')echo 'selected';?>>
								<?php echo get_phrase('masculin'); ?>
							</option>
							<option value="female" <?php if ($row['sex'] == 'female')echo 'selected';?>>
								<?php echo get_phrase('feminin'); ?>
							</option>
						</select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('age'); ?></span>
						<input name="age" type="number" value="<?php echo $row['age']; ?>" class="form-control" placeholder="age" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('groupe sanguin'); ?></span>
						 <select name="blood_group" class="form-control">
							<option value=""><?php echo get_phrase('sélectionner le groupe sanguin'); ?></option>
							<option value="A+" <?php if ($row['blood_group'] == 'A+')echo 'selected';?>>A+</option>
							<option value="A-" <?php if ($row['blood_group'] == 'A-')echo 'selected';?>>A-</option>
							<option value="B+" <?php if ($row['blood_group'] == 'B+')echo 'selected';?>>B+</option>
							<option value="B-" <?php if ($row['blood_group'] == 'B-')echo 'selected';?>>B-</option>
							<option value="AB+" <?php if ($row['blood_group'] == 'AB+')echo 'selected';?>>AB+</option>
							<option value="AB-" <?php if ($row['blood_group'] == 'AB-')echo 'selected';?>>AB-</option>
							<option value="O+" <?php if ($row['blood_group'] == 'O+')echo 'selected';?>>O+</option>
							<option value="O-" <?php if ($row['blood_group'] == 'O-')echo 'selected';?>>O-</option>
						</select>				
					</div>					
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('date du dernier don'); ?></span>
						<input name="last_donation_timestamp" type="date" value="<?php echo date("m/d/Y", $row['last_donation_timestamp']); ?>" class="form-control" placeholder="" aria-describedby="basic-addon5">
					</div>
                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input name="submit" type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;