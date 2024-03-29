<?php
/****************************************************************
   FILE             :   errorPage.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   redirected to this page if there is any error occures.
****************************************************************/


$ERROR_CSS_LOC = '/kleinerzeugernetzwerk/css/style.css';

?>


<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>404 HTML Tempalte by Colorlib</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php echo $ERROR_CSS_LOC ?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
			</div>
			<h2><?php echo gettext("404 - Page not found"); ?></h2>
			<p><?php echo gettext("The page you are looking for might have been removed had its name changed or is temporarily unavailable."); ?></p>
			<a href="/kleinerzeugernetzwerk/index.php"><?php echo gettext("Go To Homepage"); ?></a>
		</div>
	</div>

</body>

</html>
