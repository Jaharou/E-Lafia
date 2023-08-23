                      
<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-light bg-default navbar--link-arrow navbar--uppercase bayanno-nav">
    <div class="container navbar-container">
        <!-- Brand/Logo -->
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>/uploads/logo.jpeg" width="80px" height="80px"
                alt="logo">
                &nbsp; <?php echo $system_title; ?>      </a>

        <div class="d-inline-block">
            <!-- Navbar toggler  -->
            <button class="navbar-toggler hamburger hamburger-js hamburger--spring" 
                type="button" data-toggle="collapse" data-target="#navbar_main" 
                    aria-controls="navbarsExampleDefault" aria-expanded="false" 
                        aria-label="Toggle navigation">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>

        <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbar_main">

            <!-- Navbar links -->
            <ul class="navbar-nav" data-hover="dropdown">
                <li class="nav-item
                    active">
                    <a class="nav-link" aria-haspopup="true" aria-expanded="false"
                        href="<?php echo base_url(); ?>">
                             <?php echo get_phrase('Accueil') ?>               </a>
                </li>
                <li class="nav-item
                ">
                    <a class="nav-link" aria-haspopup="true" aria-expanded="false"
                        href="<?php echo base_url(); ?>home/appointment">
                     <?php echo get_phrase('rendez-vous') ?>                   </a>
                </li>
                <li class="nav-item
                ">
                    <a class="nav-link" aria-haspopup="true" aria-expanded="false"
                        href="<?php echo base_url(); ?>home/contact_us">
                      <?php echo get_phrase('contact') ?>                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-haspopup="true" aria-expanded="false"
                        href="<?php echo base_url(); ?>login" target="_blank">
                         <?php echo get_phrase('connexion') ?>                  </a>
                </li>
            </ul>
        </div>
    </div>
</nav>