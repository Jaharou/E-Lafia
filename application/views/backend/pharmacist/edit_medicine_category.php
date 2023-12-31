<?php
$single_medicine_category_info = $this->db->get_where('medicine_category', array('medicine_category_id' => $param2))->result_array();
foreach ($single_medicine_category_info as $row) {
?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('modifier la catégorie'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>pharmacist/medicine_category/update/<?php echo $row['medicine_category_id']; ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nom'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" name="name_categorie" class="form-control" id="field-1" value="<?php echo $row['name_categorie']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="field-ta"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-3 control-label col-sm-offset-2">
                            <input type="submit" class="btn btn-success" value="Modifier">
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>