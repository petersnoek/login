<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Demo application</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<style>
		ul { display:inline; list-style-type: none; border: 1px solid grey; background-color: silver; width: 100%; }
		li { float:left; margin-right: 1em; }

	</style>
</head>
<body>

<nav>
<ul><li>Home</li>

<?php if (isset($_SESSION['username'])){ ?>
	<li><?php "Welkom " . $_SESSION['username']; ?></li>
	<li><a href="logout.php">Uitloggen</a>
<?php } else { ?>
	<li><a href='loginform.php'>Inloggen</a></li>
<?php } ?>

</ul>
</nav>



