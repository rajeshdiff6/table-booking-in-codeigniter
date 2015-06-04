<?php
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",	$_SERVER['SCRIPT_NAME']);?>
<html>
<head>
	<title><?php echo "Hotel Paradise"; ?></title>
	<script src="<?php echo $root; ?>js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo $root; ?>js/bootstrap.min.js"></script>
	<script type="text/javascript"
     src="<?php echo $root; ?>js/bootstrap-datetimepicker.min.js"></script>
	<link href="<?php echo $root; ?>css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo $root; ?>css/bootstrap-datetimepicker.min.css">
</head>
<body>
	<div class="container">