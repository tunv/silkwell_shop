<!DOCTYPE html>
<html>
<head>
<title>Silkwell Paper | Home</title>
<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url()?>assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />    
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery-ui.css">
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="I wear Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/easing.js"></script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'>
<!--//fonts-->
<!-- start menu -->
<!--//slider-script-->
<script src="<?php echo base_url()?>assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>   
<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="<?php echo base_url()?>assets/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script> 
<!-- /start menu -->
</head>
<body> 
<?php if($this->uri->segment(1)=="home" || empty($this->uri->segment(1))) {
  $header = 'header-home';
} else {
  $header = 'header';
}
?>
<div class="<?php echo $header;?> header5">
  <div class="header-top">
    <div class="header-bottom">
      <div class="container">
        <div class="logo">
          <h1><a href="/shop/home">Silkwell<span>Paper</span></a></h1>
        </div>
        <div class="top-nav">
          <ul class="memenu skyblue">
            <li class="active">
              <a href="/shop/home" style="font-family: arial;">Trang chủ</a>
            </li>
            <li class="grid">
              <a href="contact.html" style="font-family: arial;"> Liên hệ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
