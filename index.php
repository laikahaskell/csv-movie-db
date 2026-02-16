<!DOCTYPE html>
<!-- 	csv movie db - index php page
	==============================
	The purpose of this page is to
	load the dependencies of the 
	php code, then render it. The
	user is then able to customize
	this page to a further degree
	than if the php file were
	loaded directly.

	V 1.0.1
	By laikahaskell
-->
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.6/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<!-- Load data -->
<?php
include 'csv-movie-db.php';
?>

<!-- Initialize Datatable from html table -->
<script>new DataTable('#movies');</script>

</body>

