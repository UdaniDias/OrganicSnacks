<!DOCTYPE html>
<html lang="en">

<head>
	<title>Our Products</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel=stylesheet type=text/css href=style.css>
</head>

<body>
	<div class="header">
		OrganicSnacks
	</div>

	<div class="row">
		<div class="column side">
			<?php include 'navigation.html'; ?>
		</div>
		<div class="column middle">

			<?php
			include "../private/initialize.php";
			$records = Product::find_all();
			//print_r($records);

			echo "<table border = 1 width=100%>";
			echo "<tr bgcolor=#ADD8E6>";
			echo "<th> Product Id </th>";
			echo "<th> Name </th>";
			echo "<th> Description</th>";
			echo "<th> Price </th>";
			echo "</tr>";

			foreach ($records as $v_object) {
				echo "<tr>";
				echo "<td>" . $v_object->id . "</td>";
				echo "<td>" . $v_object->name . "</td>";
				echo "<td>" . $v_object->description . "</td>";
				echo "<td>" . $v_object->price . "</td>";
			}
			echo "</tr>";
			/*
			$Product_records = $records->fetch_assoc();
			print_r($Product_records);

			foreach($Product_records as $k=>$v){
				echo $k . ":" . $v . "<br>";
			}*/

			?>

		</div>


		<div class="footer">
			BIS Design & Development Module <br>
			A site by w1985414 Udani Dias </div>

</body>


</html>