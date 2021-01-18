<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}else{
}

//Header of the HTML page
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php";
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/getFarmData.php";
getProductCategories();
getProductFeatures();
getProductUnits();
fetchFarmLandData();
?>


<?php
//MAP to show products and point features which is implemented using leafletJs and mapBox. A tocken should generate from mapbox and use inorder to display the map here.
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/map.php";
getAllProducts();

?>


<?php
//Footer Html containig jquery scripts and other dependent bootstrap cdns
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php";
?>