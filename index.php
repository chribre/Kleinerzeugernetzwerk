<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}else{
}

include "assets/components/header.php";
?>


<?php include "assets/components/map.php"?>

       


<?php include "assets/components/footer.php"?>