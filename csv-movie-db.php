<!--	csv movie db php function
	=========================
	This file loads rows from
	movies.csv dynamically,
	allowing any number of
	rows, and renders it into
	a table in html.
	
	Dependencies:
	-Datatables
	-bootstrap 

	V 2.0
	by laikahaskell

-->


<div class="container-fluid">
<table id="movies" class="display">
<?php
$arr = [];
$row = 1;
if (($handle = fopen("movies.csv", "r")) !== FALSE) {

	while(($data = fgetcsv($handle,0,",")) !== FALSE){
		$arr[] = $data;
	}
	fclose($handle);

	$headers = array_shift($arr);

	// Header	
	$output = "";
	echo "<thead><tr>";
	foreach($headers as $val){
		$output .= "<th>" . $val . "</th>";
	}
	$footers = $output;
	echo $output . "</tr></thead><tbody>\n";

	// Create assoc. array using headers
	$films = [];
	foreach($arr as $film){
		$films[] = array_combine($headers, $film);
	}

	foreach($films as $film){
		$output = "<tr>";
		foreach($film as $x){
		    $output .= "<td>" . $x . "</td>";
		}
		$output .= "</tr>\n";	
		echo $output;
		$row++;
	}
	echo "</tbody><tfoot><tr>" . $footers . "</tr></tfoot></table>";

}
?>

</div>
<!-- The user must initialize the datatable below this include.  -->
