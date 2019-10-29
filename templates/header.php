<?php
$PageTitle = isset($_GET['route']) ? htmlspecialchars($_GET['route']) : "Index";
$PageTitleReal = $frontController->outputTitle();
?>

<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="shortcut icon" href="images/iq_owo_pMX_icon.ico">
    <title><?php echo $PageTitleReal ?></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 
	<link rel="stylesheet" href="style/styles.css">
	<script src="content/js/bootstrap.min.js"></script>
	<script src="scripts/jquery.js"></script>
	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

   
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  </head>
  <body>