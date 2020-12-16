<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}else{
}

//Header of the HTML page
include "assets/components/header.php";
getProductCategories();
getProductFeatures();
getProductUnits();
?>


<?php
//MAP to show products and point features which is implemented using leafletJs and mapBox. A tocken should generate from mapbox and use inorder to display the map here.
getAllProducts();
include "assets/components/map.php";
?>



<?php
//Footer Html containig jquery scripts and other dependent bootstrap cdns
include "assets/components/footer.php";
?>