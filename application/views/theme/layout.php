<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <title><?= $this->template->titulo_site; ?></title>
        <!-- Meta tag aqu -->

        <?= get_asset('css', 'bootstrap.min.css', 'lib'); ?>
        <?= get_asset('css', 'font-awesome.min.css', 'lib'); ?>
        <?= get_asset('css', 'style.css'); ?>
           
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>
    <body data-spy="scroll" data-target=".navbar-fixed-top">
        
        <!--NAVBAR SECTION-->
        <div class="navbar navbar-inverse navbar-fixed-top scrollclass" >
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php //echo $this->template->title->default("Default title"); ?></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">HOME</a></li>
                        
                        <li><a href="#portfolio">PORTFOLIO</a></li>
                         <li><a href="#about">ABOUT</a></li>
                         <li><a href="#contact">CONTACT</a></li>
                    </ul>
                </div>
               
            </div>
        </div>
        <!--END NAVBAR SECTION-->

        <?php echo $this->template->content;//echo $view_content; ?>
        
        <!--FOOTER SECTION-->
        <div id="footer">
            2014 www.yourdomain.com | All Right Reserved  | Design by <a href="http://www.binarytheme.com/" target="_blank" >www.binarytheme.com</a> | <?= $this->template->rodape_site; ?>
        </div>
        <!--FOOTER SECTION-->

        <?= get_asset('js', 'jquery-1.10.2.js', 'lib'); ?>
        <?= get_asset('js', 'bootstrap.min.js', 'lib'); ?>
        <?= get_asset('js', 'jquery.easing.min.js', 'lib'); ?>
        <?= get_asset('js', 'custom.js'); ?>

    </body>
</html>