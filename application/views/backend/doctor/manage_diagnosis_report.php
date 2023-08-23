<?php
$prescription_id        = $param2;
$doctor_id              = $param3;
$diagnosis_report_info  = $this->db->get_where('diagnosis_report', array('prescription_id' => $param2))->result_array();
?>
<?php if ( !empty($diagnosis_report_info) ) { ?>
<table class="table table-bordered table-striped dataTable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('date');?></th>
            <th><?php echo get_phrase('type de rapport');?></th>
            <th><?php echo get_phrase('type de document');?></th>
            <th><?php echo get_phrase('description');?></th>
            <th><?php echo get_phrase('options');?></th>           
        </tr>
    </thead>

    <tbody>
        <?php foreach ($diagnosis_report_info as $row) { ?>   
            <tr>
                <td><?php echo date("d M, Y -  H:i", $row['timestamp']); ?></td>
                <td><?php echo $row['report_type']; ?></td>
                <td><?php echo $row['document_type']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                        <a href="<?php echo base_url().'uploads/diagnosis_report/'.$row['file_name']; ?>" class="btn btn-warning btn-rounded icon-only btn-animated" >
                            <i class="fa fa-bars"></i>          
                        </a>
              
                <?php if($doctor_id == $this->session->userdata('login_user_id')): ?>
               
					
                    <a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>doctor/diagnosis_report/delete/<?php echo $row['diagnosis_report_id']; ?>');">
                                        <i class="fa fa-trash-o"></i>
                                    </a>  
                </td>
               <?php endif; ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    <p style="font-size: 15px;">Aucun rapport de diagnostic n'a encore été créé pour cette prescription.</p>
<?php } if($doctor_id == $this->session->userdata('login_user_id')) { ?>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>doctor/diagnosis_report/create" class="p-20" id="form-validate" enctype="multipart/form-data">             
                    <h5 class="mt-n"><?php echo get_phrase('ajouter un rapport de diagnostic'); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="name13" name="date_timestamp"  data-validation="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('heure'); ?><sup class="color-danger">*</sup></label>
                                <input type="time" class="form-control" id="name13" name="time_timestamp"  data-validation="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                            <div class="form-group">
                                <label for="report_type"><?php echo get_phrase('type de rapport'); ?><sup class="color-danger">*</sup></label>
                                <select name="report_type" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le type de rapport'); ?>">  
                                <option value="xray"><?php echo get_phrase('radiographie'); ?></option>
                                <option value="blood_test"><?php echo get_phrase('test sanguin'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('document'); ?><sup class="color-danger">*</sup></label>
                                <input type="file" class="form-control" id="name13" name="file_name" data-validation="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                            <div class="form-group">
                                <label for="document_type"><?php echo get_phrase('type de document'); ?><sup class="color-danger">*</sup></label>
                                <select name="document_type" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le type de document'); ?>"> 
                                <option value="image"><?php echo get_phrase('image'); ?></option>
                                <option value="doc"><?php echo get_phrase('doc'); ?></option>
                                <option value="pdf"><?php echo get_phrase('pdf'); ?></option>
                                <option value="excel"><?php echo get_phrase('excel'); ?></option>
                                <option value="other"><?php echo get_phrase('autre'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('description'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="description"  data-validation="required">
                            </div>
                        </div>
                    </div>
                     <input type="hidden" name="prescription_id" value="<?php echo $prescription_id; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
                                <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
                            </div>                
                        </div>
                     </div> 
                 </form>    
            </div>              
        </div>              
    </div>              
</div>
<?php } ?>