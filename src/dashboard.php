<?php 
/****************************************************************
   FILE             :   dashboard.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   side bar of the dashbord is incorporated here
                        controls are defined in assets/components/sideBar.php
****************************************************************/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/sideBar.php");
?>





<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>