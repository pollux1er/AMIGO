<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>AMIGO | <?php echo $title ?></title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.smartWizard-2.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/charCount.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom/general.js"></script>

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <img alt="AMIGO" src="<?php echo base_url(); ?>/assets/images/amigologo.png" style="float:left;height:41px">
            <span class="slogan">Programme de fidélisation</span>
            
            <div class="search">
            	<!--<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>
                </form>-->
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
 <div class="right">
        	<a href="<?php echo base_url('index.php/dashboard/logout'); ?>" class="btn btn2 btn_info"><span>Deconnexion</span></a>	
        </div><!--userinfodrop-->    </div><!--topheader-->
    
    
    <div class="header">
    	<?php include ('headermenu.php'); ?> 
    </div><!--header-->