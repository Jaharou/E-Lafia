<?php $patient_id = $this->session->userdata('login_user_id'); ?>
<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
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
                            <th><?php echo get_phrase('docteur'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $operation_history_info    = $this->db->get_where('report', array('type' => 'operation', 'patient_id' => $patient_id))->result_array();
                        foreach ($operation_history_info as $row) { ?>   
                            <tr>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
                                <td>
                                    <?php $name = $this->db->get_where('doctor', array('doctor_id' => $row['doctor_id']))->row()->name;
                                        echo $name;
                                    ?>
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
                            <th><?php echo get_phrase('docteur'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $operation_history_info    = $this->db->get_where('report', array('type' => 'birth', 'patient_id' => $patient_id))->result_array();
                        foreach ($operation_history_info as $row) { ?>   
                            <tr>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
                                <td>
                                    <?php $name = $this->db->get_where('doctor', array('doctor_id' => $row['doctor_id']))->row()->name;
                                        echo $name;
                                    ?>
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
                            <th><?php echo get_phrase('docteur'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $operation_history_info    = $this->db->get_where('report', array('type' => 'death', 'patient_id' => $patient_id))->result_array();
                        foreach ($operation_history_info as $row) { ?>   
                            <tr>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
                                <td>
                                    <?php $name = $this->db->get_where('doctor', array('doctor_id' => $row['doctor_id']))->row()->name;
                                        echo $name;
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            
        </div>
        
    </div>
    
</div>