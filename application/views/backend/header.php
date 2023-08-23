<?php
/* 	
 * 	Tamplate: Header
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2017
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="<?php echo base_url(); ?>">
                			    <img src="<?php echo base_url(); ?>uploads/logo.jpeg" alt="<?php echo $system_name; ?>" class="logo" style="height: 50px;width: 120px; white-space: normal;">
                			</a>
                            <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                				<span class="sr-only">Basculer la navigation</span>
                				<i class="fa fa-ellipsis-v"></i>
                			</button>
                            <button type="button" class="navbar-toggle mobile-nav-toggle" >
                				<i class="fa fa-bars"></i>
                			</button>
                		</div>
                		<div class="collapse navbar-collapse" id="navbar-collapse-1">                		
							<ul class="nav navbar-nav">
                                <li class="dropdown">
									<a href="<?php echo base_url(); ?>" class="dropdown-toggle" style="font-size: 25px;">
                                      <span><strong>E-Lafia</span></strong></a>
								</li>
                			</ul>							
                			<ul class="nav navbar-nav navbar-right">                              
                				<li class="dropdown">
                					<a href="<?php echo base_url(); ?>login/logout" class="dropdown-toggle">
									<i class="fa fa-sign-out"></i> <?php echo get_phrase(' déconnecter'); ?></a>                					
                				</li>
                			</ul>
                		</div>
                    </div>
            	</div>
            </nav>
<?php 
	$output .= ob_get_clean();
	echo $output;	