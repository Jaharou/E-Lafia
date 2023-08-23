<?php
$bed_info = $this->db->get('bed')->result_array();
$patient_info = $this->db->get('patient')->result_array();
$single_bed_allotment_info = $this->db->get_where('bed_allotment', array('bed_allotment_id' => $param2))->result_array();
foreach ($single_bed_allotment_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase("modifier_l'attribution"); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/bed_allotment/update/<?php echo $row['bed_allotment_id']; ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('numéro de lit'); ?></label>

                            <div class="col-sm-9">
                                <select name="bed_id" class="form-control">
                                    <option value=""><?php echo get_phrase('selectionner le numéro de lit'); ?></option>
                                    <?php foreach ($bed_info as $row2) { ?>
                                        <option value="<?php echo $row2['bed_id']; ?>" <?php if ($row['bed_id'] == $row2['bed_id']) echo 'selected'; ?>>
                                            <?php echo $row2['bed_number'] . ' - ' . $row2['type']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?></label>

                            <div class="col-sm-9">
                                <select name="patient_id" class="form-control">
                                
                     <optgroup>
                        <option>Sélectionner le patient</option>
                        <?php
                        $patients = $this->db->get('patient')->result_array();
                        $patients = array_reverse($patients); // Inverser l'ordre des patients
                        foreach ($patients as $row2):
                            ?>
                       <option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
                        <?php echo $row2['name']; ?>
                        </option>
                        <?php endforeach; ?>
                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase("heure d'attribution"); ?></label>

                            <div class="col-sm-9">
                                <input type="text" name="allotment_timestamp" class="form-control datepicker" id="field-1" value="<?php echo date("m/d/Y", $row['allotment_timestamp']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('heure de décharge'); ?></label>

                            <div class="col-sm-9">
                                <input type="text" name="discharge_timestamp" class="form-control datepicker" id="field-1" value="<?php echo date("m/d/Y", $row['discharge_timestamp']); ?>">
                            </div>
                        </div>

                        <div class="col-sm-3 control-label col-sm-offset-3">
                            <input type="submit" class="btn btn-success" value="Valider">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>