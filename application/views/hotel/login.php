<?php
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",	$_SERVER['SCRIPT_NAME']);?>
<div id="cen">	
<h2>Book ur table</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('hotel/book') ?>
	<div id="datetimepicker" class="input-append date">
      <input type="text" placeholder="From" name="timein"id="timein" onchange="a()"/>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>
	<div id="datetimepicker2" class="input-append date">
      <input id="timeout" type="text" placeholder="To" name="timeout" onchange="a();"/>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>
	<div id="tables">
	<?php for($i=1;$i<=10;$i++){ ?>
		<div id="<?php echo $i; ?>" style="float:left;" class="table1" onclick="select(this);"><?php echo $i; ?></div>
	<?php }	?>
	</div>
	<input type="text" name="recipe" id="recipe" placeholder="Recipe"/><br />
	<input type="text" name="customername" placeholder="Customer name"/><br />
	<input type="hidden" id="table" name="table" value="" />
	<input class="btn btn-large btn-primary" type="submit" name="submit" value="Submit" /> 

</form>
</div>
<script type="text/javascript">
var i=0;
document.getElementById("table").value="";
function select(id){
	if($(id).attr('class')=="table2"){
		$(id).attr('class','table1');
		var m=document.getElementById("table").value.split(",");
		var removeItem = $(id).attr('id');;

		var n = jQuery.grep(m, function(value) {
		  return value != removeItem;
		});
		document.getElementById("table").value=n;
		if(n.length==0){i=0;}
	}else{
		$(id).attr('class','table2');
		if(i==0){
			document.getElementById("table").value+=$(id).attr('id');
			i=1;
		}else{
			var j=document.getElementById("table").value.split(",");	
			if(jQuery.inArray($(id).attr('id'), j)==-1)			{
				document.getElementById("table").value+=","+$(id).attr('id');
			}
		}	
	}
}
$('#datetimepicker').datetimepicker({
        format: 'yyyy/MM/dd hh:mm:ss',
        language: 'pt-BR',
		pick12HourFormat: true
});
$('#datetimepicker2').datetimepicker({
		format: 'yyyy/MM/dd hh:mm:ss',
		language: 'pt-BR',
		pick12HourFormat: true
});
$('#datetimepicker2').on('changeDate', function(e) {
	var timein=$("#timein").val();
	var timeout=$("#timeout").val();
	timein=timein.split(" ");
	timeinhours=timein[1].substr(0,2);
	timeinmins=timein[1].substr(3,2);
	timeinsecs=timein[1].substr(6,2);
	timeout=timeout.split(" ");
	timeouthours=timeout[1].substr(0,2);
	timeoutmins=timeout[1].substr(3,2);
	timeoutsecs=timeout[1].substr(6,2);
	$.ajaxSetup ({
			cache: false
		});
		var ajax_load = "<img src='<?php echo $root?>img/ajax-loader.gif' alt='loading...' />";
		
	//	load() functions
		var loadUrl = "tables?timeindate="+timein[0]+"&timeinhours="+timeinhours+"&timeinmins="+timeinmins+"&timeinsecs="+timeinsecs+"&timeoutdate="+timeout[0]+"&timeouthours="+timeouthours+"&timeoutmins="+timeoutmins+"&timeoutsecs="+timeoutsecs;
		$("#tables").html(ajax_load).load(loadUrl);
});
$("#10").css('padding','5px 8px');
</script>
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
	height:350px;
	padding:1px 25px 25px 25px;
	background: none repeat scroll 0 0 #dfdfdf;
    border-radius: 10px 10px 10px 10px;
	-moz-box-shadow:    inset 0 0 10px #999;
	-webkit-box-shadow: inset 0 0 10px #999;
	box-shadow:         inset 0 0 10px #999;
}
.table1 {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
	background-color:#79bbff;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	cursor:pointer;
	margin-right:11px;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:5px 12px;
	text-decoration:none;
	text-shadow:1px 1px 0px #528ecc;
	margin-bottom:10px;
}.table1:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
	background-color:#378de5;
}.table1:active {
	position:relative;
	top:1px;
}
.table2 {
	-moz-box-shadow:inset 0px 1px 0px 0px #d9fbbe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #d9fbbe;
	box-shadow:inset 0px 1px 0px 0px #d9fbbe;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #b8e356), color-stop(1, #a5cc52) );
	background:-moz-linear-gradient( center top, #b8e356 5%, #a5cc52 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8e356', endColorstr='#a5cc52');
	background-color:#b8e356;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	cursor:pointer;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	margin-right:11px;
	margin-bottom:10px;
	padding:5px 12px;
	text-decoration:none;
	text-shadow:1px 1px 0px #86ae47;
}.table2:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #a5cc52), color-stop(1, #b8e356) );
	background:-moz-linear-gradient( center top, #a5cc52 5%, #b8e356 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a5cc52', endColorstr='#b8e356');
	background-color:#a5cc52;
}.table2:active {
	position:relative;
	top:1px;
}
#cen h2{
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