<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/sideBar.php");
?>




<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>