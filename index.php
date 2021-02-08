/****************************************************************
   FILE:      index.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  08.02.2021

   PURPOSE:   Home page of Kleinerzeugernetzwerk project. 
****************************************************************/

<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}else{
}

//Header of the HTML page
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php";
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/getFarmData.php";
getProductCategories();
getProductFeatures();
getProductUnits();
fetchFarmLandData();
?>


<script>
    window.onload = function() {
//        pass user_id instead of 0 to get user defined cache daat
        getCache(0);
    };
    //cache service to get product category, product features and unit to show in the add product page.
    //This service also want to be updated in the respose of successfull user login
    function getCache(userID){
        $.ajax({
            type: "GET",
            url: "/kleinerzeugernetzwerk/controller/getCache.php",
            data: { userId: userID },
            dataType: "json",
            contentType: "application/json",
            cache: false,
            success: function( data ) {
                console.log(data)
                const productCategories = data['product_category'] != null ? data['product_category'] : []
                const productFeatures = data['product_feature'] != null ? data['product_feature'] : []
                const productUnits = data['product_unit'] != null ? data['product_unit'] : []
                
                
                localStorage['productCategories'] = JSON.stringify(productCategories);
                localStorage['productFeatures'] = JSON.stringify(productFeatures);
                localStorage['productUnits'] = JSON.stringify(productUnits);
                
//                var myVar = localStorage['myKey'] || 'defaultValue';
            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });

    }
</script>

<?php
//MAP to show products and point features which is implemented using leafletJs and mapBox. A token should generate from mapbox and use inorder to display the map here.
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/map.php";
getAllProducts();

?>


<?php
//Footer Html containig jquery scripts and other dependent bootstrap cdns
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php";
?>