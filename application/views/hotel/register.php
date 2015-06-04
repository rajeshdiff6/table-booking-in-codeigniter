<?php
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",	$_SERVER['SCRIPT_NAME']);	
	?>
<div id="cen">	
<h2>Register</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('hotel/register') ?>
	<input type="text" name="name" id="name1" placeholder="Name"/><br />
	<input type="text" name="username" id="username1" placeholder="User Name"/><br />
	<input type="password" name="password" placeholder="Password"/><br />
	<input type="password" name="confirmpassword" placeholder="Confirm Password"/><br />
	<textarea name="address" id="address" placeholder="Address"/></textarea><br />
	<input type="text" name="phoneno" id="phoneno" placeholder="Phone No."/><br />
	<input class="btn btn-large btn-primary" type="submit" name="submit" value="Register" /> 
</form>
</div>
<script type="text/javascript">
$('form').attr('style','text-align:center');
</script>
<style type="text/css">
body{
	background:url("<?php echo $root; ?>img/hotelb.jpg");
}
#cen{
	margin: 100px auto 0;
    width: 233px;
	height:380px;
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
</style>