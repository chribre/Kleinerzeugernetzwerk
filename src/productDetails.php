<?php
/****************************************************************
   FILE:      productDetails.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  23.03.2021

   PURPOSE:   Page to view details of a product.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");

?>
<div>
    product details page
</div>

<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>

