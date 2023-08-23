<?php
/*  
 *  Tamplate: Show Payment History
 *  @author : Raju Ahmed
 *  Date    : 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
    exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<div class="row">
                            
                            <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="<?php echo base_url(); ?>receptionist/patient">
                                            <span class="number counter"><?php echo $this->db->count_all('patient'); ?></span>
                                            <span class="name"><?php echo get_phrase('patients') ?></span>
                                            <span class="bg-icon"><i class="fa fa-wheelchair"></i></span>
                                        </a>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="<?php echo base_url(); ?>receptionist/invoice_manage">
                                            <span class="number counter"><?php echo $this->db->count_all('invoice'); ?></span>
                                            <span class="name"><?php echo get_phrase('reçus') ?></span>
                                            <span class="bg-icon"><i class="fa fa-user-md"></i></span>
                                        </a>
                                    </div>
                                    
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <a class="dashboard-stat bg-primary" href="#">
        <span class="number counter"><?php echo $this->db->count_all('invoice'); ?></span>
        <span class="name"><?php echo get_phrase('reçus') ?></span>
        <span class="bg-icon"><i class="fa fa-user-md"></i></span>
    </a>
  </div>
                                    <!--<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning-100" href="</?php echo base_url(); ?>receptionist/payment_history">
                                            <span class="number counter"></?php echo $this->db->count_all('payment'); ?></span>
                                            <span class="name"></?php echo get_phrase('Montants') ?></span>
                                            <span class="bg-icon"><i class="fa fa-list-alt"></i></span>
                                        </a>
                                    </div>-->
                                    
                                </div>     
                                  

<div class="row">
    <div class="col-md-12">
        <div class="panel">     
            <div class="panel-body p-20">
                  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                  
                                <th><?php echo get_phrase('numéro de reçu'); ?></th>
                                <th><?php echo get_phrase('patient'); ?></th>
                                <th><?php echo get_phrase('date_de_creation'); ?></th>
                                <th><?php echo get_phrase('titre'); ?></th>
                                <th><?php echo get_phrase('statut'); ?></th>
                                <th><?php echo get_phrase('montant'); ?></th>
                                <th><?php echo get_phrase('options'); ?></th>
                            </tr>
                        </thead>
                            <tbody>

                            <?php
                 
                                $this->db->order_by('invoice_id', 'DESC');
                                $this->db->limit(10);
                                $invoice_info   = $this->db->get('invoice')->result_array();  
                                foreach ($invoice_info as $row):
                                ?>   
                                <tr>
                                    <td><?php echo $row['invoice_number'] ?></td>
                                    <td>
                                        <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                                            echo $name;?>
                                    </td>
                                    <td><?php echo $row['creation_timestamp'] ?></td>
                                    <td><?php echo $row['title'] ?></td>
                                    
                                    
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <?php $net_amount = $this->db->get_where('invoice' , array('invoice_id' => $row['invoice_id'] ))->row()->net_amount;
                                            echo $net_amount;?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo base_url(); ?>Invoice/invoice_print/<?php echo $row['invoice_id']; ?>" 
                                            class="btn btn-default btn-sm btn-icon icon-left">
                                            <i class="fa fa-pencil"></i>
                                            Voir le reçu
                                        </a>
                                    </td>
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