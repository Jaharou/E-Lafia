<?php
/* 	
 * 	Tamplate: Index
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php
$system_name    = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title   = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$account_type   = $this->session->userdata('login_type');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
         <title><?php echo $page_title; ?> - <?php echo $system_title; ?></title>
	 <?php include 'includes_top.php'; ?>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
           <?php include 'header.php'; ?>
            <div class="content-wrapper">
                <div class="content-container">
				<?php include $account_type.'/navigation.php'; ?>
				 <div class="main-page">
                        
						<section class="section">
                            <div class="container-fluid">						
								<?php include $account_type . '/' . $page_name . '.php'; ?>
                            </div>
                        </section>						 
                    </div>				
                </div>               
            </div>      
        </div>
		<?php include 'modal.php'; ?>
    	 <?php include 'includes_bottom.php'; ?>
         <?php 
                switch ($page_name) {
                    case 'dashboard':
                        switch ($account_type) {
                            case 'admin':
                            case 'doctor':
                            case 'patient':
                            case 'nurse':
                                include 'dashboard-chart.php';
                                break;
                        }
                        break;
                }
          ?>
    </body>
</html>