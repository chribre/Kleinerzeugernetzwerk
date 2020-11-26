<?php 

include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/config.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
?>


<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>