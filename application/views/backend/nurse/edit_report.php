<?php
/* 	
 * 	Tamplate: Add Report
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
$patient_info = $this->db->get('patient')->result_array();
$doctor_info = $this->db->get('doctor')->result_array();
$single_report_info = $this->db->get_where('report', array('report_id' => $param2))->result_array();
foreach ($single_report_info as $row) :
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('modifier le rapport'); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>nurse/report/update/<?php echo $row['report_id']; ?>" method="post" enctype="multipart/form-data" >
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('type'); ?></span>						
						<select name="type" class="form-control">
								<option value=""><?php echo get_phrase('sélectionner le type de rapport'); ?></option>
								<option value="operation" <?php if ($row['type'] == 'operation') echo 'selected';?>>
									<?php echo get_phrase('opération'); ?>
								</option>
								<option value="birth" <?php if ($row['type'] == 'birth') echo 'selected';?>>
									<?php echo get_phrase('naissance'); ?>
								</option>
								<option value="death" <?php if ($row['type'] == 'death') echo 'selected';?>>
									<?php echo get_phrase('décés'); ?>
								</option>
						</select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('description'); ?></span>
						 <textarea name="description" class="form-control" id="field-ta"><?php echo $row['description']; ?></textarea>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('date'); ?></span>
						<input name="timestamp" type="date" value="<?php echo date("m/d/Y", $row['timestamp']); ?>" class="form-control" placeholder="" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('patient'); ?></span>
                             <select name="patient_id" class="form-control">
                                    <option value=""><?php echo get_phrase('sélectionner le patient'); ?></option>
								<?php foreach ($patient_info as $row2): ?>
									<option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected';?>>
										<?php echo $row2['name']; ?>
									</option>
								<?php endforeach; ?>
							</select>
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('docteur'); ?></span>
                            <select name="doctor_id" class="form-control">
								<option value=""><?php echo get_phrase('sélectionner le docteur'); ?></option>
								<?php foreach ($doctor_info as $row3): ?>
									<option value="<?php echo $row3['doctor_id']; ?>" <?php if ($row['doctor_id'] == $row3['doctor_id']) echo 'selected';?>>
										<?php echo $row3['name']; ?>
									</option>
								<?php endforeach; ?>
							</select>
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