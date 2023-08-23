<?php
/* 	
 * 	Tamplate: Show Blood Bank
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#blood_donor_list" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('liste des donneurs de sang');?></span>
                </a>
            </li>
            <li>
                <a href="#blood_bank_status" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('statut banque de sang');?></span>
                </a>
            </li>
        </ul>
        <div class="tab-content">            
            <div class="tab-pane active" id="blood_donor_list">                    
                <table id="example" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('nom'); ?></th>
                            <th><?php echo get_phrase('age'); ?></th>
                            <th><?php echo get_phrase('sexe'); ?></th>
                            <th><?php echo get_phrase('groupe sanguin'); ?></th>
                            <th><?php echo get_phrase('date du dernier don'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blood_donor_info as $row): ?>   
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['age'] ?></td>
                                <td><?php echo $row['sex'] ?></td>
                                <td><?php echo $row['blood_group'] ?></td>
                                <td><?php echo date("m/d/Y", $row['last_donation_timestamp']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>            
            <div class="tab-pane" id="blood_bank_status">                
                <table id="example-two" class="table table-bordered table-striped datatable" >
                    <thead>
                        <tr>
                            <th><?php echo get_phrase('groupe sanguin'); ?></th>
                            <th><?php echo get_phrase('statut'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blood_bank_info as $row): ?>   
                            <tr>
                                <td><?php echo $row['blood_group'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>                
            </div>            
        </div>        
    </div>    
</div>
<?php 
$output .= ob_get_clean();
echo $output;