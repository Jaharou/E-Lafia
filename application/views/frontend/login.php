<?php
/*  
 *  Tamplate: Index
 *  @author : Raju Ahmed
 *  Date    : 20 August, 2021
 */


if ( ! defined( 'BASEPATH' ) ) {
    exit( 'Direct script access denied.' );
}
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title><?php echo get_phrase('connexion'); ?> | <?php echo $system_title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icheck/skins/flat/blue.css" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" media="screen" >
        <script src="<?php echo base_url(); ?>assets/js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">
            <div class="login-bg-color bg-black-300">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box" style="background-color: whitesmoke;">
                            <header align="center">
                                <div class="form-group">
                                <label for="name13"><img src="<?php echo base_url(); ?>assets/images/medecin.webp" class="img-circle" width="170px" height="170px">
                                
                                </label>     
                            </div>
                            </header>
                            <div class="error-msg" style="color:red;text-align: center;">
                             <?php if($this->session->flashdata('error_msg')){
                                echo $this->session->flashdata('error_msg');
                               }?>
                             </div>
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h6>Veuillez saisir votre nom d'utilisateur et votre mot de passe</h6>
                                </div>
                            </div>
                            <div class="panel-body p-20">
                                <form method="post" role="form" action="<?php echo base_url(); ?>login/ajax_login">
                                    <div class="form-group">
                                        <label for="exampleInputName1"></label>
                                        <input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Votre nom" autocomplete="off" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"></label> 
                                        <input class="col-md-11" name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" style="padding: 3px;"><i class="fa fa-eye fa-lg fa-pull-center text-danger" aria-hidden="true" id="view" style="background-color: #3DA0DB;padding: 10px;padding-right: 5px; cursor: pointer;" onclick="changer()"></i>
                                    </div>
                                    <div class="form-group mt-20">
                                        <div class="">                                            
                                            <button name="submit" type="submit" class="btn btn-primary btn-labeled pull-right">Connexion<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p class="text-muted text-center"><small></small></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/iscroll/iscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>
        <script>
            e=true;
            function changer(){
                if (e) {
                    document.getElementById("exampleInputPassword1").setAttribute("type","text");
                    e=false;
                }
                else{
                 document.getElementById("exampleInputPassword1").setAttribute("type","password");
                 e=true;
                }
            }
        </script>
    </body>
</html>