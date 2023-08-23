<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Système de gestion scolaire Dhorla PRO | installateur Web</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/install/install.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/install/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/install/sliding.form.js"></script>
    </head>
    <style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:10px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
            text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;

        }
        h1 a{
            color:#ccc;
            font-size:26px;
            text-shadow:1px 1px 1px #fff;
            padding:20px;
            text-decoration:none;
        }
    </style>
    <body>
    <center><br>
        <h1>
            <a href="http://codecanyon.net" target="_blank">
                Dhorla School Management System PRO
            </a>
        </h1>


    </center>
    <div id="content">

        <?php if ($this->session->flashdata('installation_result') == 'failed'): ?>
            <div class="result_error">Installation failed due to invalid settings</div>
        <?php endif; ?>

        <?php if (($this->session->flashdata('flash_message')) != ""): ?>
            <div class="result_error"> <?php echo $this->session->flashdata('flash_message'); ?> </div>
        <?php endif; ?>
        <center>
            <div id="wrapper">
                <div id="steps">
                    <?php echo form_open('install/do_install', array('id' => '', 'name' => '')); ?>
                    <fieldset class="step">
                        <legend>Bienvenue dans l'installateur Web</legend>
                        <br><br><br><br><br><br>
                        <p>
                            Installez le script en quelques clics.
                            <br>
                            Fournir le code d'achat, la base de données et les paramètres d'administration,
                            <br>
                            et exécutez le programme d'installation. C'est facile !


                        </p>
                        <ol style="clear:both;margin-top:100px;margin-left:50px; text-align:left;">
                            <li><span style="color:#900;font-weight:bold;">Required</span> - 
                                application/config/database.php to be <span style="color:#063;font-weight:bold;">writtable</span>

                                <?php
                                // Checking whether db config file is writtable
                                if (is_writable('./application/config/database.php')):
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/install/tick.png" title="writtable" style="vertical-align:middle;"/>
                                <?php else:
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/install/cross.png" title="not writtable" style="vertical-align:middle;"/>
                                <?php endif; ?>
                            </li>

                            <li><span style="color:#900;font-weight:bold;">Required</span> - 
                                application/config/routes.php to be <span style="color:#063;font-weight:bold;">writtable</span>


                                <?php
                                // Checking whether routing config file is writtable
                                if (is_writable('./application/config/routes.php')):
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/install/tick.png" title="writtable" style="vertical-align:middle;"/>
                                <?php else:
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/install/cross.png" title="not writtable" style="vertical-align:middle;"/>
                                <?php endif; ?>
                            </li>

                            <li><span style="color:#900;font-weight:bold;">Required</span> - 
                                php CURL function <span style="color:#063;font-weight:bold;">enabled </span>

                                <?php
                                // Checking whether CURL installed or not
                                if (in_array('curl', get_loaded_extensions())):
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/install/tick.png" title="curl found" style="vertical-align:middle;"/>
                                <?php else:
                                    ?>
                                    <img src="<?php echo base_url(); ?>assets/install/cross.png" title="curl not found" style="vertical-align:middle;"/>
                                <?php endif; ?>
                            </li>
                        </ol>
                    </fieldset>                     
                    <fieldset class="step">
                        <legend>Paramètres de la base de données</legend>
                        <p>
                            <label for="name">Nom de la base de données</label>
                            <input id="db_name" name="db_name" type="text" AUTOCOMPLETE=OFF />
                        </p>
                        <p>
                            <label for="country">Nom d'utilisateur</label>
                            <input id="db_uname" name="db_uname" type="text" AUTOCOMPLETE=OFF />
                        </p>
                        <p>
                            <label for="phone">Mot de passe</label>
                            <input id="db_password" name="db_password" type="text" AUTOCOMPLETE=OFF />
                        </p>
                        <p>
                            <label for="website">Nom d'hôte</label>
                            <input id="db_hname" name="db_hname" type="text" AUTOCOMPLETE=OFF value="localhost" />
                        </p>
                    </fieldset>
                    <fieldset class="step">
                        <legend>Paramétres</legend>
                        <p>
                            <label for="namecard">Nom de l'école</label>
                            <textarea  name="system_name" AUTOCOMPLETE=OFF></textarea>
                        </p>
                        <p>
                            <label for="cardnumber">Email de l'administrateur </label>
                            <input id="email" name="email" type="text" AUTOCOMPLETE=OFF />
                        </p>
                        <p>
                            <label for="secure">Mot de passe</label>
                            <input id="password" name="password" type="password" AUTOCOMPLETE=OFF />
                        </p>
                    </fieldset>
                    <fieldset class="step">
                        <legend>Confirmer</legend>
                        <p>
                            Tout dans le formulaire a été correctement rempli
                            si toutes les étapes ont une icône de coche verte.
                            Une coche rouge indique qu'un champ
                            est manquant ou rempli avec des données invalides.
                        </p>
                        <p class="submit">
                            <button id="" type="submit">Exécutez le programme d'installation</button>
                        </p>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
                <div id="navigation" style="display:none;">
                    <ul> 
                        <li>
                            <a href="#">Bienvenue</a>
                        </li>                    
                        <li>
                            <a href="#">Base de données</a>
                        </li>
                        <li>
                            <a href="#">Paramétres</a>
                        </li>
                        <li>
                            <a href="#">Installer</a>
                        </li>
                    </ul>
                </div>
                <!--steps finishes here-->
            </div>
        </center>


    </div>
</body>
</html>