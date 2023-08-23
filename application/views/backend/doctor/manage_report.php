<?php
/* 	
 * 	Tamplate: Show Report
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<?php $doctor_id    = $this->session->userdata('login_user_id'); ?>
<button onclick="showAjaxModal('<?php echo base_url();?>modal/popup/add_report/');" 
    class="btn btn-primary pull-right">
        <?php echo get_phrase('ajouter'); ?>
</button>
<div style="clear:both;"></div>
<br>
<div class="row">
    <div class="col-md-12">
		<div class="panel">		
			<div class="panel-body p-20">	
        <ul class="nav nav-tabs border-bottom border-primary" role="tablist">
            <li class="active">
                <a href="#operation" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('opération');?></span>
                </a>
            </li>
            <li>
                <a href="#birth" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('naissance');?></span>
                </a>
            </li>
            <li>
                <a href="#death" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('décés');?></span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            
            <div class="tab-pane active" id="operation">
                    
                <table class="table table-bordered table-striped datatable" id="example">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('description'); ?></th>
                            <th><?php echo get_phrase('date'); ?></th>
                            <th><?php echo get_phrase('patient'); ?></th>
                            <th><?php echo get_phrase('options'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $report_info    = $this->db->get_where('report', array('type' => 'operation', 'doctor_id' => $doctor_id))->result_array();
                        foreach ($report_info as $row) { ?>   
                            <tr>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
                                <td>
                                    <?php $name = $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name;
                                        echo $name;
                                    ?>
                                </td>
                                <td>
                                    <a  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_report/<?php echo $row['report_id'] ?>');" 
                                        class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i>
                                        Modifier
                                    </a>
									<a class="btn btn-danger btn-sm btn-icon icon-left" href="#" onclick="confirm_modal('<?php echo base_url(); ?>doctor/report/delete/<?php echo $row['report_id']; ?>');">
										<i class="fa fa-user-md"></i>
										Supprimer
									</a> 
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="tab-pane" id="birth">
                    
                <table class="table table-bordered table-striped datatable" id="example-two">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('description'); ?></th>
                            <th><?php echo get_phrase('date'); ?></th>
                            <th><?php echo get_phrase('patient'); ?></th>
                            <th><?php echo get_phrase('options'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $report_info    = $this->db->get_where('report', array('type' => 'birth', 'doctor_id' => $doctor_id))->result_array();
                        foreach ($report_info as $row) { ?>   
                            <tr>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
                                <td>
                                    <?php $name = $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name;
                                        echo $name;
                                    ?>
                                </td>
                                <td>
                                    <a  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_report/<?php echo $row['report_id'] ?>');" 
                                        class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i>
                                        Modifier
                                    </a>
									<a class="btn btn-danger btn-sm btn-icon icon-left" href="#" onclick="confirm_modal('<?php echo base_url(); ?>doctor/report/delete/<?php echo $row['report_id']; ?>');">
										<i class="fa fa-user-md"></i>
										Supprimer
									</a> 
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="tab-pane" id="death">
                    
                <table class="table table-bordered table-striped datatable" id="example-three">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('description'); ?></th>
                            <th><?php echo get_phrase('date'); ?></th>
                            <th><?php echo get_phrase('patient'); ?></th>
                            <th><?php echo get_phrase('options'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $report_info    = $this->db->get_where('report', array('type' => 'death', 'doctor_id' => $doctor_id))->result_array();
                        foreach ($report_info as $row) { ?>   
                            <tr>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
                                <td>
                                    <?php $name = $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name;
                                        echo $name;
                                    ?>
                                </td>
                                <td>
                                    <a  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_report/<?php echo $row['report_id'] ?>');" 
                                        class="btn btn-default btn-sm btn-icon icon-left">
                                        <i class="entypo-pencil"></i>
                                        Modifier
                                    </a>
									<a class="btn btn-danger btn-sm btn-icon icon-left" href="#" onclick="confirm_modal('<?php echo base_url(); ?>doctor/report/delete/<?php echo $row['report_id']; ?>');">
										<i class="fa fa-user-md"></i>
										Supprimer
									</a> 
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>            
        </div>        
    </div>    
</div>
</div>
</div>
<?php 
$output .= ob_get_clean();
echo $output;