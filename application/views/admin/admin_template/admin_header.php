<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo (isset($title)) ? $title : 'Admin Dashboard | OpenSource Online Commerce'; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">
<!-- Bootstrap 3.3.4 -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/font-awesome.min.css">
<!-- Ionicons 2.0.0 -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/skins/_all-skins.min.css">
</head>
<script type="text/javascript">
var site_url = '<?php echo base_url()?>';
</script>
<body class="skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index2.html" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span> <!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><i class="fa fa-shopping-cart"></i> <b>Admin</b></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas"
					role="button"> <span class="sr-only">Toggle navigation</span>
				</a>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->