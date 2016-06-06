<?php

session_start();



try {

	$pdo = new PDO("mysql:host=localhost;dbname=trouve_ta_team", 'root', '');

} catch (PDOException $e) {

    die('Échec lors de la connexion : ' . $e->getMessage());
}

?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Am.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title>Trouve ta Team</title>
</head>
<?php
include('barrec.php'); 
?>
<body>
	<h1><p class="titrevert" href="./">Forum</p></h1>
	<?php 
		if(isset($_GET['page'])) {

			$page = basename($_GET['page']);

			if(is_file( $page . '-1.php')) {

				include(  $page . '-1.php');

			} else {

				include('forum-1.php');
			}

		} else {

			include('forum-1.php');
		}
	?>
	<?php include('barrer.php')?>
</body>
</html>