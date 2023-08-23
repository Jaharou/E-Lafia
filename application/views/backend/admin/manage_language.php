<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <?php if(isset($edit_profile)):?>
            <li class="active">
                <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
                    <?php echo get_phrase('modifier la phrase
');?>
                        </a></li>
            <?php endif;?>
            <li class="<?php if(!isset($edit_profile))echo 'active';?>">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('liste de langues
');?>
                        </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('ajouter une phrase
');?>
                        </a></li>
            <li class="">
                <a href="#add_lang" data-toggle="tab"><i class="entypo-plus-circled"></i> 
                    <?php echo get_phrase('ajouter une langue
');?>
                        </a></li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
            <!----PHRASE EDITING TAB STARTS-->
            <?php if (isset($edit_profile)):?>
            <div class="tab-pane active" id="edit" style="padding: 5px">
                <div class="">


                        <div class="row">
                        <?php 
                        $current_editing_language   =   $edit_profile;
                        echo form_open(base_url() . 'admin/manage_language/update_phrase/'.$current_editing_language  , array('id' => 'phrase_form'));
                        $count = 1;
                        $language_phrases   =   $this->db->query("SELECT `phrase_id` , `phrase` , `$current_editing_language` FROM `language`")->result_array();
                        foreach($language_phrases as $row)
                        {
                            $count++;
                            $phrase_id          =   $row['phrase_id'];                  //id number of phrase
                            $phrase             =   $row['phrase'];                     //basic phrase text
                            $phrase_language    =   $row[$current_editing_language];    //phrase of current editing language
                            ?>
                            <!----phrase box starts-->
                            <div class="col-sm-3">
                                <div class="tile-stats tile-gray">
                                    <div class="icon"><i class="entypo-mail"></i></div>
                                    
                                    
                                    <h3><?php echo $row['phrase'];?></h3>
                                    <p>
                                        <input type="text" name="phrase<?php echo $row['phrase_id'];?>"     
                                            value="<?php echo $phrase_language;?>" class="form-control"/>
                                    </p>
                                </div>
                                
                            </div>
                            <!----phrase box ends-->
                            <?php 
                        }
                        ?>
                        </div>
                        <input type="hidden" name="total_phrase" value="<?php echo $count;?>" />
                        <input type="submit" value="<?php echo get_phrase('mise à jour de phrase');?>" onClick="document.getElementById('phrase_form').submit();" class="btn btn-info btn-rounded icon-only"/>    
                        <?php
                        echo form_close();
                        ?>
                                     
                </div>                
            </div>
            <?php endif;?>
            <!----PHRASE EDITING TAB ENDS-->
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane <?php if(!isset($edit_profile))echo 'active';?>" id="list">
                
                
                <table class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('langue');?></th>
                            <th><?php echo get_phrase('option');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $fields = $this->db->list_fields('language');
                                foreach($fields as $field)
                                {
                                     if($field == 'phrase_id' || $field == 'phrase')continue;
                                    ?>
                        <tr>
                            <td><?php echo ucwords($field);?></td>
                            <td>
                                <a href="<?php echo base_url();?>admin/manage_language/edit_phrase/<?php echo $field;?>"
                                     class="btn btn-info">
                                        <?php echo get_phrase('modifier la phrase');?>
                                </a>
                                <a href="<?php echo base_url();?>admin/manage_language/delete_language/<?php echo $field;?>"
                                    rel="tooltip" data-placement="top" data-original-title="<?php echo get_phrase('supprimer la langue');?>" class="btn btn-gray" onclick="return confirm('Delete Language ?');">
                                        <i class="icon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->
            
            
            <!----PHRASE CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'admin/manage_language/add_phrase/' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('phrase');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phrase" data-validate="required" data-message-required="<?php echo get_phrase('valeur requise
');?>"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('ajouter une phrase');?></button>
                              </div>
                            </div>
                    <?php echo form_close();?>                
                </div>                
            </div>
            <!----PHRASE CREATION FORM ENDS--->
            
            <!----ADD NEW LANGUAGE---->
            <div class="tab-pane box" id="add_lang" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open(base_url() . 'admin/manage_language/add_language/' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('langue');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="language" data-validate="required" data-message-required="<?php echo get_phrase('valeur requise
');?>"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('ajouter une langue');?></button>
                              </div>
                            </div>
                    <?php echo form_close();?> 
                </div>
            </div>
            <!----LANGUAGE ADDING FORM ENDS-->
            
        </div>
    </div>
</div>