<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Admin</title>
	    <?= get_asset('css', 'bootstrap.css', 'lib'); ?>
		<?= get_asset('css', 'font-awesome.css', 'lib'); ?>
		<?= get_asset('css', 'custom.css', 'lib'); ?>
	    <!-- GOOGLE FONTS-->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
	    <div id="wrapper">
	        <div class="navbar navbar-inverse navbar-fixed-top">
	            <div class="adjust-nav">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;X-Cms</a>
	                </div>
	                <div class="navbar-collapse collapse">
	                    <ul class="nav navbar-nav navbar-right">
	                        <li><?= anchor('', 'Website', array('target' => '_blank')); ?></li>
	                        <li><?= anchor('admin/auth/logout', 'Sair'); ?></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	        <!-- /. NAV TOP  -->
	        <nav class="navbar-default navbar-side" role="navigation">
	            <div class="sidebar-collapse">
	                <ul class="nav" id="main-menu">
	                    <li class="text-center user-image-back">
	                        <img src="<?= base_url('lib/img/find_user.png'); ?>" class="img-responsive" />
	                    </li>
	                    <li>
	                    	<?= anchor('admin', '<i class="fa fa-desktop "></i> Dashboard'); ?>
	                    </li>
	                    <li>
	                    	<?= anchor('admin/users', '<i class="fa fa-users "></i> Usuários'); ?>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-edit "></i>UI Elements<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="#">Notifications</a>
	                            </li>
	                            <li>
	                                <a href="#">Elements</a>
	                            </li>
	                            <li>
	                                <a href="#">Free Link</a>
	                            </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-table "></i>Table Examples</a>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-edit "></i>Forms </a>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-sitemap "></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            <li>
	                                <a href="#">Second Level Link</a>
	                            </li>
	                            <li>
	                                <a href="#">Second Level Link</a>
	                            </li>
	                            <li>
	                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
	                                <ul class="nav nav-third-level">
	                                    <li>
	                                        <a href="#">Third Level Link</a>
	                                    </li>
	                                    <li>
	                                        <a href="#">Third Level Link</a>
	                                    </li>
	                                    <li>
	                                        <a href="#">Third Level Link</a>
	                                    </li>

	                                </ul>

	                            </li>
	                        </ul>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-qrcode "></i>Tabs & Panels</a>
	                    </li>
	                    <li>
	                        <a href="#"><i class="fa fa-bar-chart-o"></i>Mettis Charts</a>
	                    </li>

	                    <li>
	                        <a href="#"><i class="fa fa-edit "></i>Last Link </a>
	                    </li>
	                    <li>
	                        <a href="blank.html"><i class="fa fa-table "></i>Blank Page</a>
	                    </li>
	                </ul>
	            </div>
	        </nav>
	        <!-- /. NAV SIDE  -->
	        <div id="page-wrapper">
	            <div id="page-inner">
	            	<?= $this->template->content; ?>
	            </div>
	            <!-- /. PAGE INNER  -->
	        </div>
	        <!-- /. PAGE WRAPPER  -->
	    </div>
	    <!-- /. WRAPPER  -->
	    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	    <?= get_asset('js', 'jquery-1.10.2.js', 'lib'); ?>
      	<!-- BOOTSTRAP SCRIPTS -->
	    <?= get_asset('js', 'bootstrap.min.js', 'lib'); ?>
	    <!-- METISMENU SCRIPTS -->
	    <?= get_asset('js', 'jquery.metisMenu.js', 'lib'); ?>
	      <!-- CUSTOM SCRIPTS -->
	    <?= get_asset('js', 'custom.js', 'lib'); ?>
	</body>
</html>
