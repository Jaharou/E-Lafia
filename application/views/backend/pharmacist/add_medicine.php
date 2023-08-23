<?php $medicine_category_info = $this->db->get('medicine_category')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('ajouter un médicament'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>pharmacist/medicine/create" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nom'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('catégorie'); ?></label>
                        <div class="col-sm-9">
                            <select name="medicine_category_id" class="form-control">
                                <option value=""><?php echo get_phrase('sélectionner une catégorie'); ?></option>
                                <?php foreach ($medicine_category_info as $row) { ?>
                                    <option value="<?php echo $row['medicine_category_id']; ?>"><?php echo $row['name_categorie']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('DCI'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="dci" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('dosage'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="dosage" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('condition'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="condit" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('forme'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="forme" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('prix'); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="price" class="form-control" id="field-1" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                       <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('statut'); ?></label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control">
                                <option value=""><?php echo get_phrase('sélectionner un statut'); ?></option>
                               <option value="Disponible"><?php echo get_phrase('disponible'); ?></option>
                               <option value="Indisponible"><?php echo get_phrase('indisponible'); ?></option>
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