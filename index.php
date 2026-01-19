<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/8/8e/Kino.png">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>
<title>Movies</title>

</head>

<body>
<!-- Main content table below -->
<div class="mx-5">
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
	$footers = "";
	echo "</tbody><tfoot><tr>" . $footers . "</tr></tfoot></table>";

}
?>

</div>
<script>new DataTable('#movies');</script>
</body>
