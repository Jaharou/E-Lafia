<?php
$medicine_category_info = $this->db->get('medicine_category')->result_array();
$single_medicine_info   = $this->db->get_where('medicine', array('medicine_id' => $param2))->result_array();
foreach ($single_medicine_info as $row) {
?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('modification'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>pharmacist/medicine/update/<?php echo $row['medicine_id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nom'); ?></label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="field-1" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('catégorie'); ?></label>
                            <div class="col-sm-9">
                                <select name="medicine_category_id" class="form-control">
                                    <option value=""><?php echo get_phrase('sélectionner une catégorie'); ?></option>
                                    <?php foreach ($medicine_category_info as $row2) { ?>
                          <option value="<?php echo $row2['medicine_category_id']; ?>" <?php if ($row['medicine_category_id'] == $row2['medicine_category_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name_categorie']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('DCI'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="dci" class="form-control" id="field-1" value="<?php echo $row['dci']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('dosage'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="dosage" class="form-control" id="field-1" value="<?php echo $row['dosage']; ?>">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('condition'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="condit" class="form-control" id="field-1" value="<?php echo $row['condit']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('forme'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="forme" class="form-control" id="field-1" value="<?php echo $row['forme']; ?>">
                        </div>
                    </div>
                        
                        <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('prix'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="price" class="form-control" id="field-1" value="<?php echo $row['price']; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('statut'); ?></label>
                        <div class="col-sm-9">
                            <select name="status" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup>
                                        <option>Sélectionner un statut</option>
                                    <option value="disponible"><?php echo get_phrase('disponible'); ?></option>
                                    <option value="indiponible"><?php echo get_phrase('indisponible'); ?></option>
                                    </optgroup>
                                </select>
                        </div>
                    </div>

                        <div class="col-sm-3 control-label col-sm-offset-3">
                            <input type="submit" class="btn btn-success" value="Modifier">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>