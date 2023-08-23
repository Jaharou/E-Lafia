<?php $output = ''; 
 ob_start(); 
$single_department_info = $this->db->get_where('department', array('department_id' => $param2))->result_array();
foreach ($single_department_info as $row):
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
             <a href="<?php echo base_url(); ?>admin/department" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>admin/department/update/<?php echo $row['department_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">   
                    <h5 class="mt-n"><?php echo get_phrase('information de département'); ?></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
        <input type="text" class="form-control" id="name13" name="name" data-validation="required" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>    
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('description'); ?><sup class="color-danger">*</sup></label>
<input type="text" class="form-control" id="name12" name="description" data-validation="required" value="<?php echo $row['description']; ?>">
                            </div>
                        </div>                                               
                   
                        <div class="col-md-4">
                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
                                <button type="submit" class="btn btn-info btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
                            </div>                
                        </div>
                    </div>
                 </form>    
            </div>              
        </div>              
    </div>              
</div>
<?php endforeach;
$output .= ob_get_clean();
echo $output;