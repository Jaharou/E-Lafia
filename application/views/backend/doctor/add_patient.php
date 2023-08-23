<?php
/* 	
 * 	Tamplate: Add Patient
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('ajouter un patient'); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>doctor/patient/create" method="post" enctype="multipart/form-data" >
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Nom</span>
						<input name="name" type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Email</span>
						<input name="email" type="email" class="form-control" placeholder="email" aria-describedby="basic-addon5">
					</div>						
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Mot de passe</span>
						<input name="password" type="password" class="form-control" placeholder="password" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Adresse</span>
						<input name="address" type="text" class="form-control" placeholder="address" aria-describedby="basic-addon5">

					</div>											
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Mobile</span>
						<input name="phone" type="text" class="form-control" placeholder="phone" aria-describedby="basic-addon5">
					</div>																
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><i class="fa fa-globe"></i></span>
							<select name="sex" class="form-control">
                                <option value=""><?php echo get_phrase('selectionner le sexe'); ?></option>
                                <option value="male"><?php echo get_phrase('masculin'); ?></option>
                                <option value="female"><?php echo get_phrase('feminin'); ?></option>
                            </select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Date de naissance</span>
						<input name="birth_date" type="text" class="form-control datepicker">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5">Age</span>
						<input name="age" type="number" class="form-control" placeholder="phone" aria-describedby="basic-addon5">
					</div>	
																					
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><i class="fa fa-globe"></i></span>							
                            <select name="blood_group" class="form-control">
                                <option value=""><?php echo get_phrase('select_blood_group'); ?></option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
					</div>
					  <div class="input-group mb-20 dropzone" id="my-awesome-dropzone">
						<div class="dz-message needsclick">							
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
<?php 
$output .= ob_get_clean();
echo $output;