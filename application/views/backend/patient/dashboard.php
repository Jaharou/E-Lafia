<?php
/* 	
 * 	Tamplate: Notice
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
        <div id="chart1" class="op-chart"></div>
     </div>
</div>
<?php 
$output .= ob_get_clean();
echo $output;