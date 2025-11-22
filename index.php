<!DOCTYPE html>
<head>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
<!-- Main content table below -->
<div class="mx-5">
<table class="table">
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
	$output = "<thead><tr>";
	foreach($headers as $val){
		$output .= "<th scope='col'>" . $val . "</th>";
	}
	echo $output . "</tr></thead><tbody>\n";

	// Create assoc. array using headers
	$films = [];
	foreach($arr as $film){
		$films[] = array_combine($headers, $film);
	}

	// Sort by year
	// In the future, can use ajax call to resort based on selected col
	$year = array_column($films, 'release year');
	array_multisort($year, SORT_DESC,$films);

	foreach($films as $film){
		$output = "<tr>";
		foreach($film as $x){
		    $output .= "<td>" . $x . "</td>";
		}
		$output .= "</tr>\n";	
		echo $output;
		$row++;
	    }
    echo "</tbody>";
    fclose($handle);
}
?>
</div>
</body>
</html>
