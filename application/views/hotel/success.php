<?php
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",	$_SERVER['SCRIPT_NAME']);?>
	<a href="logout" class="logout">Logout</a>
<div id="cen">	
<h2>Table booked successfully</h2>
</div>
<style type="text/css">
.btn-large{
	margin: 8px 0 0 68px;
    position: absolute;
}
#tables{
width:269px;
}
body{
	background:url("<?php echo $root; ?>img/hotelb.jpg");
}
#cen{
	margin: 100px auto 0;
    width: 233px;
	height:100px;
	padding:1px 25px 25px 25px;
	background: none repeat scroll 0 0 #dfdfdf;
    border-radius: 10px 10px 10px 10px;
	-moz-box-shadow:    inset 0 0 10px #999;
	-webkit-box-shadow: inset 0 0 10px #999;
	box-shadow:         inset 0 0 10px #999;
}
#cen h2{
text-align:center;
font:normal 39px Arial;
 color:#ffffff;
 text-shadow: 0 1px 0 #ccc,
 0 2px 0 #c9c9c9,
 0 3px 0 #bbb,
 0 4px 0 #b9b9b9,
 0 5px 0 #aaa,
 0 6px 1px rgba(0,0,0,.1),
 0 0 5px rgba(0,0,0,.1),
 0 1px 3px rgba(0,0,0,.3),
 0 3px 5px rgba(0,0,0,.2),
 0 5px 10px rgba(0,0,0,.25),
 0 10px 10px rgba(0,0,0,.2),
 0 20px 20px rgba(0,0,0,.15);
}
.logout {
	-moz-box-shadow:inset 0px 1px 0px 0px #f29c93;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f29c93;
	box-shadow:inset 0px 1px 0px 0px #f29c93;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #fe1a00), color-stop(1, #ce0100) );
	background:-moz-linear-gradient( center top, #fe1a00 5%, #ce0100 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fe1a00', endColorstr='#ce0100');
	background-color:#fe1a00;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #b23e35;
	float:right;
	margin-top:10px;
}.logout:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ce0100), color-stop(1, #fe1a00) );
	background:-moz-linear-gradient( center top, #ce0100 5%, #fe1a00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ce0100', endColorstr='#fe1a00');
	background-color:#ce0100;
	text-decoration:none;
	color:#fff;
}.logout:active {
	position:relative;
	top:1px;
}
</style>