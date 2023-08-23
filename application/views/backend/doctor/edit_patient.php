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
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('modifier le patient'); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>doctor/patient/update/<?php echo $row['patient_id']; ?>" method="post" enctype="multipart/form-data" >
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Nom</span>
						<input name="name" type="text" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Name" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Email</span>
						<input name="email" type="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="email" aria-describedby="basic-addon5">
					</div>						
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Mot de passe</span>
						<input name="password" type="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="password" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Adresse</span>
						<input name="address" type="text" value="<?php echo $row['address']; ?>" class="form-control" placeholder="address" aria-describedby="basic-addon5">

					</div>											
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">téléphone</span>
						<input name="phone" type="text" value="<?php echo $row['phone']; ?>" class="form-control" placeholder="phone" aria-describedby="basic-addon5">
					</div>																
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><i class="fa fa-globe"></i></span>
							<select name="sex" class="form-control">								
								<option value=""><?php echo get_phrase('selectionner le sex'); ?></option>
								<option value="male" <?php if ($row['sex'] == 'male')echo 'selected';?>>
									<?php echo get_phrase('masculin'); ?>
								</option>
								<option value="female" <?php if ($row['sex'] == 'female')echo 'selected';?>>
									<?php echo get_phrase('feminin'); ?>
								</option>
                            </select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Date de naissance</span>
						<input name="birth_date" type="text" value="<?php echo $row['birth_date']; ?>" class="form-control datepicker">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Age</span>
						<input name="age" type="number" value="<?php echo $row['age']; ?>" class="form-control" placeholder="phone" aria-describedby="basic-addon5">
					</div>	
																					
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><i class="fa fa-globe"></i></span>							
                            <select name="blood_group" class="form-control">								
                                    <option value=""><?php echo get_phrase('selectionner le groupe sanguin'); ?></option>
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
					  <div class="input-group mb-20 dropzone" id="my-awesome-dropzone">
						<div class="dz-message needsclick">
							<img src="<?php echo $this->crud_model->get_image_url('patient' , $row['patient_id']);?>" alt="...">
							<input name="image" type="file">
						</div>
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