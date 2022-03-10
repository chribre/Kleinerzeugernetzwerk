<?php 
/****************************************************************
   FILE             :   header.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   file containg all dependencies and header files
****************************************************************/
session_start(); 
?>

<?php 
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/constants.php");
include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
$SIDE_BAR_CSS = '/kleinerzeugernetzwerk/css/custom/sideBar.css';
$DATE_PICKER_JS = '/kleinerzeugernetzwerk/assets/date_picker/datedropper.pro.min.js';
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--         Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">

        <script type="text/javascript" src="/kleinerzeugernetzwerk/js/constants.js"></script>
        <script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/common_functions.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo $HOME_CSS_LOC ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $SIDE_BAR_CSS ?>" />

        <!--    LEAFLET JS-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script
                src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>

<!--        <script src="https://cdn.datedropper.com/get/xm7ommbtksza213pj1kj2ugzudj0rfxc"></script>-->
        <script src="<?php echo $DATE_PICKER_JS ?>"></script>


        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


        <!-- Annimation-->
        <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
              />




        <!-- Latest compiled and minified CSS for bootstrap select -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->



        <!-- ClockPicker Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" integrity="sha512-MT4B7BDQpIoW1D7HNPZNMhCD2G6CDXia4tjCdgqQLyq2a9uQnLPLgMNbdPY7g6di3hHjAI8NGVqhstenYrzY1Q==" crossorigin="anonymous" />

        <!-- ClockPicker script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js" integrity="sha512-x0qixPCOQbS3xAQw8BL9qjhAh185N7JSw39hzE/ff71BXg7P1fkynTqcLYMlNmwRDtgdoYgURIvos+NJ6g0rNg==" crossorigin="anonymous"></script>


        <script type="text/javascript" src="/kleinerzeugernetzwerk/js/seller_web_services/seller_api.js"></script>


        <script type="text/javascript" src="/kleinerzeugernetzwerk/js/config/constant.js"></script>
        <script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/navigation.js"></script>
<!--        Chat authentication functions-->
        <script type="text/javascript" src="/kleinerzeugernetzwerk/js/chat/chat_auth.js"></script>

        <link rel="stylesheet" href="/kleinerzeugernetzwerk/css/custom/card.css">

        <title>Kleinerzeuger Netzwerk</title>




        <!--    Enjoy Hint For onboarding-->
        <!-- From external libraries -->
        <!--        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/kineticjs/5.2.0/kinetic.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>

        <!-- Or from internal libraries from node_modules-->
        <!--        <script src="/kleinerzeugernetzwerk/assets/jquery/dist/jquery.min.js"></script>-->
        <!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/kineticjs/5.2.0/kinetic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
-->

        <!-- Enjoyhint library -->
        <link href="/kleinerzeugernetzwerk/assets/enjoyhint/enjoyhint.css" rel="stylesheet">
        <script src="/kleinerzeugernetzwerk/assets/enjoyhint/enjoyhint.min.js"></script>

        <!--    Enjoy Hint For onboarding-->

    </head> 
    <body>
        <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/loadingSpinner.php");

              include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/terms_and_conditions.php");
              include_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/error_modal.php");
        ?>
        <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/navigationBar.php");

        ?>
