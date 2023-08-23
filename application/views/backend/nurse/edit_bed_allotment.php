<?php
/* 	
 * 	Tamplate: Edit Bed Allotment
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
$bed_info                   = $this->db->get('bed')->result_array();
$patient_info               = $this->db->get('patient')->result_array();
$single_bed_allotment_info  = $this->db->get_where('bed_allotment', array('bed_allotment_id' => $param2))->result_array();
foreach ($single_bed_allotment_info as $row):
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase("modifier l'attribution des lits"); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>nurse/bed_allotment/update/<?php echo $row['bed_allotment_id']; ?>" method="post" enctype="multipart/form-data" >
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('numéro de lit'); ?></span>
							 <select name="bed_id" class="form-control">
								<option value=""><?php echo get_phrase('sélectionner le numéro de lit'); ?></option>
								<?php foreach ($bed_info as $row2) { ?>
									<option value="<?php echo $row2['bed_id']; ?>" <?php if ($row['bed_id'] == $row2['bed_id']) echo 'selected'; ?>>
										<?php echo $row2['bed_number'] . ' - ' . $row2['type']; ?>
									</option>
								<?php } ?>
							</select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('patient'); ?></span>
							<select name="patient_id" class="form-control">
								<option value=""><?php echo get_phrase('sélectionner le patient'); ?></option>
								<?php foreach ($patient_info as $row2) { ?>
									<option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
										<?php echo $row2['name']; ?>
									</option>
								<?php } ?>
							</select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase("heure d'attribution"); ?></span>
						<input name="allotment_timestamp"  value="<?php echo date("m/d/Y", $row['allotment_timestamp']); ?>" type="date" class="form-control" placeholder="Name" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('heure de décharge'); ?></span>
						<input name="discharge_timestamp" value="<?php echo date("m/d/Y", $row['discharge_timestamp']); ?>" type="date" class="form-control" placeholder="Name" aria-describedby="basic-addon5">
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