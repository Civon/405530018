<?php
	// array defin
	$data=array(
		array("Volvo",22,18),
		array("BMW",15,13),
		array("Saab",5,2),
		array("Land Rover",17,15)   
	);
?>
<!-- html table start -->
	<table border="1">
		<tr>
			<th>Name</th>
			<th>Stock</th>
			<th>Sold</th>
		</tr>
	<!-- insert part start -->
<?php
	# for
	for ($i=0; $i < count($data); $i++) { 
		echo "<tr bgcolor=skyblue>";
		for ($j=0; $j < count($data[$i]); $j++) { 
			$temp = $data[$i][$j];
			echo "<td>$temp</td>";
		}
		echo "</tr>";
	}

	# foreach
	foreach ($data as $key => $row) {
		echo "<tr bgcolor=lime>";
		foreach ($row as $key => $col) {
			echo "<td>$col</td>";			
		}
		echo "</tr>";
	}

	# map + join
	$table = join("",array_map("parseRow", $data));
	echo $table;

	function parseRow($row){
		$rowContent = join("", array_map("parseCol",$row));
		return "<tr>$rowContent</tr>";
	}
	function parseCol($col){
		return "<td>$col</td>";
	}
	
	// function parseRow($col){
	// 	return "<td>$col</td>";
	// }
	// function parseCol($data){
	// 	return "<tr>$data</tr>";
	// }
	// $col = join("", array_map("parseCol", $data));
	// join("", array_map("parseRow", $col));

?>
	</table>