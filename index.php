<?php 
include "config/config.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "assets/components/header.php";
?>


<?php include "assets/components/map.php"?>

       


<?php include "assets/components/footer.php"?>