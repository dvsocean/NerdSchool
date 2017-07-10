<!DOCTYPE html>
<?php require_once"../classes/ini.php"; ?>
<html>
<head>
	<title>All Products</title>
	<style>
		td{
			padding: 35px;
		}
	</style>
</head>
<body>
	<h1>All Products</h1>

	<?php 
	$sql="SELECT * FROM beers";
	$result= $db->query($sql);
	?>	

	<select>
	<?php while($opt= $result->fetch_object()) {?>
		<option><p><?php echo $opt->name . " " . $opt->quantity . " remaining"; ?></p></option>
	<?php } ?>
	</select>

</body>
</html>