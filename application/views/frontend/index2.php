<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="robots" content="index, follow">
<meta name="description" content="Bayanno Hospital Management System">
<meta name="keywords" content="bootstrap, responsive, template, website, html, theme, ux, ui, web, design, developer, support, business, corporate, real estate, education, medical, school, education, demo, css, framework">
<meta name="author" content="Creativeitem">
        <title></*?php echo $page_title; ?*/> - </*?php echo $system_title; ?*/></title>

 <?php include 'login.php'; ?>
    </head>

    <body>
        <!-- MAIN WRAPPER -->
        <div class="body-wrap">
            <div id="st-container" class="st-container">
                <div id="doctor_details"></div>   
                <div class="st-pusher">
                    <div class="st-content">
                        <div class="st-content-inner">      
                            <?php include 'navbar.php'; ?>
                        <?php 
                            switch ($page_name) {
                                case 'appointment_form':
                                    include 'appointment_form.php';
                                    break;
                                case 'contact_form':
                                    include 'contact_form.php';
                                    break;
                                case 'view_doctor':
                                    include 'view_doctor.php';
                                    break;
                                case 'view_nurse':
                                    include 'view_nurse.php';
                                    break;
                                default:
                                    include 'slider.php'; 
                                    include 'top_widget.php'; 
                                    include 'welcome.php'; 
                                    include 'services.php'; 
                                    include 'department.php'; 
                                    include 'doctors.php';
                                    include 'nurse.php'; 
                                    include 'apointment.php'; 
                                    break;
                            }
                        ?>                          
                            <?php include 'footer.php'; ?>
                        </div>
                    </div>
                </div><!-- END: st-pusher -->
            </div><!-- END: st-container -->
        </div><!-- END: body-wrap -->
        
<!-- SCRIPTS -->
<a href="#" class="back-to-top btn-back-to-top"></a>

 </?php include 'include_bottom.php'; ?>
    </body>
</html>