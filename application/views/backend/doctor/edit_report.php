<?php
$patient_info = $this->db->get('patient')->result_array();
$single_report_info = $this->db->get_where('report', array('report_id' => $param2))->result_array();
foreach ($single_report_info as $row) {
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

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>index.php?doctor/report/update/<?php echo $row['report_id']; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('type'); ?></label>

                            <div class="col-sm-9">
                                <select name="type" class="form-control">
                                    <option value=""><?php echo get_phrase('selectionner le type'); ?></option>
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
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="field-ta"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>

                            <div class="col-sm-9">
                                <input type="text" name="timestamp" class="form-control datepicker" id="field-1" value="<?php echo date("d/m/Y", $row['timestamp']); ?>">
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

                        <div class="col-sm-3 control-label col-sm-offset-3">
                            <input type="submit" class="btn btn-success" value="Valider">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>