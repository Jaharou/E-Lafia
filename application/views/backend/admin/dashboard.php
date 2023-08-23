<?php
/* 	
 * 	Tamplate: Dashboard
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>                             
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="<?php echo base_url(); ?>admin/doctor">
                                            <span class="number counter"><?php echo $this->db->count_all('doctor'); ?></span>
                                            <span class="name"><?php echo get_phrase('docteur') ?></span>
                                            <span class="bg-icon"><i class="fa fa-user-md"></i></span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="<?php echo base_url(); ?>admin/receptionist">
                                            <span class="number counter"><?php echo $this->db->count_all('receptionist'); ?></span>
                                            <span class="name"><?php echo get_phrase('receptionniste') ?></span>
                                            <span class="bg-icon"><i class="fa fa-wheelchair"></i></span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="<?php echo base_url(); ?>admin/nurse">
                                            <span class="number counter"><?php echo $this->db->count_all('nurse'); ?></span>
                                            <span class="name"><?php echo get_phrase('infirmière') ?></span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="<?php echo base_url(); ?>admin/pharmacist">
                                            <span class="number counter"><?php echo $this->db->count_all('pharmacist'); ?></span>
                                            <span class="name"><?php echo get_phrase('pharmacien') ?></span>
                                            <span class="bg-icon"><i class="fa fa-medkit"></i></span>
                                        </a>                                 
                                    </div>
                                </div>
								<hr/>
								<div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary-100" href="<?php echo base_url(); ?>admin/laboratorist">
                                            <span class="number counter"><?php echo $this->db->count_all('laboratorist'); ?></span>
                                            <span class="name"><?php echo get_phrase('laborantin') ?></span>
                                            <span class="bg-icon"><i class="fa fa-user"></i></span>
                                        </a>
                                    </div>
                                    <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger-100" href="</?php echo base_url(); ?>admin/accountant">
                                            <span class="number counter"></?php echo $this->db->count_all('accountant'); ?></span>
                                            <span class="name"></?php echo get_phrase('comptable') ?></span>
                                            <span class="bg-icon"><i class="fa fa-money"></i></span>
                                        </a>
                                    </div>-->
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning-100" href="<?php echo base_url(); ?>admin/payment_history">
                                            <span class="number counter"><?php echo $this->db->count_all('invoice'); ?></span>
                                            <span class="name"><?php echo get_phrase('journal_de_paiement_des_reçus') ?></span>
                                            <span class="bg-icon"><i class="fa fa-list-alt"></i></span>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success-100" href="<?php echo base_url(); ?>admin/medicine">
                                            <span class="number counter"><?php echo $this->db->count_all('medicine'); ?></span>
                                            <span class="name"><?php echo get_phrase('médicament') ?></span>
                                            <span class="bg-icon"><i class="fa fa-medkit"></i></span>
                                        </a>                                 
                                    </div>
                                </div>     
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div id="chart1" class="op-chart"></div>
                                     </div>
                                </div>                                                      