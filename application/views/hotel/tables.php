<?php 
if($tablesreserved!=null){
	for($i=1;$i<=10;$i++){
		if(in_array($i,$tablesreserved)){ ?>
			<div id="<?php echo $i; ?>" class="table3"><?php echo $i; ?></div>
	<?php }else{ ?>
			<div id="<?php echo $i; ?>" class="table1" onclick="select(this);"><?php echo $i; ?></div>
	<?php	}	
	}
}else{
	for($i=1;$i<=10;$i++){	 ?>
		<div id="<?php echo $i; ?>" class="table1" onclick="select(this);"><?php echo $i; ?></div>
	<?php	}	
}	
?>
<style type="text/css">
.table3 {
	-moz-box-shadow:inset 0px 1px 0px 0px #fbafe3;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fbafe3;
	box-shadow:inset 0px 1px 0px 0px #fbafe3;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff5bb0), color-stop(1, #ef027d) );
	background:-moz-linear-gradient( center top, #ff5bb0 5%, #ef027d 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bb0', endColorstr='#ef027d');
	background-color:#ff5bb0;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #ee1eb5;
	display:inline-block;
	color:#ffffff;
	cursor:pointer;
	font-family:arial;
	font-size:15px;
	margin-bottom:10px;
	margin-right:11px;
	font-weight:bold;
	padding:5px 12px;
	text-decoration:none;
	text-shadow:1px 1px 0px #c70067;
}.table3:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ef027d), color-stop(1, #ff5bb0) );
	background:-moz-linear-gradient( center top, #ef027d 5%, #ff5bb0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ef027d', endColorstr='#ff5bb0');
	background-color:#ef027d;
}.table3:active {
	position:relative;
	top:1px;
}
</style>		
<script type="text/javascript">
	$("#10").css('padding','5px 8px');
</script>