<?php
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",	$_SERVER['SCRIPT_NAME']);		?>
	<a href="logout" class="logout">Logout</a>
<div id="cen">	
<h2>Reservation Details</h2>

<?php //echo validation_errors(); ?>
<?php echo form_open('hotel/status');?>
<div class="reservation">
	<?php echo $table; ?>
</div>	
</form>
</div>
<div id="message"></div>
<script type="text/javascript">
function cancel(id){
$("#cancel"+id).parent().parent().remove();

$.ajaxSetup ({
			cache: false
		});
		
		$.ajax({
url: "delete?booking_id="+id,
context: document.body
}).done(function() {
$("#message").show();
$("#message").css("visibility","visible");
$("#message").html("Booking cancelled for ID# "+id);
//$("#message").animate({"bottom":"+=200px"},"slow");
$("#message").delay(2000).hide("slow");
});
}
$('form').attr('style','text-align:center');
</script>
<style type="text/css">
body{
	background:url("<?php echo $root; ?>img/hotelb.jpg");
}
#cen{
	margin: 100px auto 0;
	height:380px;
	padding:1px 25px 25px 25px;
}
#cen h2{
	color: #CC009F;
    font: 39px Arial;
    text-align: center;
    text-shadow: 0 1px 0 #ED8BD6, 0 2px 0 #ED8BD6, 0 3px 0 #ED8BD6, 0 4px 0 #B9B9B9, 0 5px 0 #AAAAAA, 0 6px 1px rgba(0, 0, 0, 0.1), 0 0 5px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.3), 0 3px 5px rgba(0, 0, 0, 0.2), 0 5px 10px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.2), 0 20px 20px rgba(0, 0, 0, 0.15);
}
.reservation {

	margin:0px;padding:0px;

	width:100%;
	box-shadow: 10px 10px 5px #888888;

	border:1px solid #ffffff;

	

	-moz-border-radius-bottomleft:9px;

	-webkit-border-bottom-left-radius:9px;

	border-bottom-left-radius:9px;

	

	-moz-border-radius-bottomright:9px;

	-webkit-border-bottom-right-radius:9px;

	border-bottom-right-radius:9px;

	

	-moz-border-radius-topright:9px;

	-webkit-border-top-right-radius:9px;

	border-top-right-radius:9px;

	

	-moz-border-radius-topleft:9px;

	-webkit-border-top-left-radius:9px;

	border-top-left-radius:9px;

}.reservation table{

	width:100%;

	margin:0px;padding:0px;

}.reservation tr:last-child td:last-child {

	-moz-border-radius-bottomright:9px;

	-webkit-border-bottom-right-radius:9px;

	border-bottom-right-radius:9px;

}

.reservation table tr:first-child td:first-child {

	-moz-border-radius-topleft:9px;

	-webkit-border-top-left-radius:9px;

	border-top-left-radius:9px;

}

.reservation table tr:first-child td:last-child {

	-moz-border-radius-topright:9px;

	-webkit-border-top-right-radius:9px;

	border-top-right-radius:9px;

}.reservation tr:last-child td:first-child{

	-moz-border-radius-bottomleft:9px;

	-webkit-border-bottom-left-radius:9px;

	border-bottom-left-radius:9px;

}.reservation tr:hover td{

	background-color:#82c0ff;

	

}

.reservation tr:first-child td{

		background:-o-linear-gradient(bottom, #0088cc 5%, #0044cc 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0088cc), color-stop(1, #0044cc) );
	background:-moz-linear-gradient( center top, #0088cc 5%, #0044cc 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0088cc", endColorstr="#0044cc");	background: -o-linear-gradient(top,#0088cc,0044cc);


	background-color:#0088cc;

	border:0px solid #ffffff;

	text-align:center;

	border-width:0px 0px 1px 1px;

	font-size:18px;

	font-family:Helvetica;

	font-weight:bold;

	color:#ffffff;

}.CSSTableGenerator tr:first-child:hover td{

		background:-o-linear-gradient(bottom, #0088cc 5%, #0044cc 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #0088cc), color-stop(1, #0044cc) );
	background:-moz-linear-gradient( center top, #0088cc 5%, #0044cc 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#0088cc", endColorstr="#0044cc");	background: -o-linear-gradient(top,#0088cc,0044cc);


	background-color:#0088cc;

}

.reservation tr:first-child td:first-child{

	border-width:0px 0px 1px 0px;

}

.reservation tr:first-child td:last-child{

	border-width:0px 0px 1px 1px;

}

.reservation td{

	

	background-color:#52a2f2;

	border:1px solid #ffffff;

	border-width:0px 1px 1px 0px;

	text-align:center;

	padding:7px;

	font-size:12px;

	font-family:Helvetica;

	font-weight:bold;

	color:#000000;

}.reservation tr:last-child td{

	border-width:0px 1px 0px 0px;

}.reservation tr td:last-child{

	border-width:0px 0px 1px 0px;

}.reservation tr:last-child td:last-child{

	border-width:0px 0px 0px 0px;

}
#message{
    background: none repeat scroll 0 0 #FFFFFF;
    border: 2px solid #C2D1DF;
    border-radius: 5px 5px 5px 5px;
    font-family: verdana;
	visibility: hidden;
    bottom: 0px;
    height: 50px;
    padding: 10px;
    position: absolute;
    right: 45px;
    width: 208px;
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