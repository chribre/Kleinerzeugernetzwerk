<?php 

/****************************************************************
   FILE:      index.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  08.02.2021

   PURPOSE:   Home page of Kleinerzeugernetzwerk project. 
****************************************************************/


if (session_status() == PHP_SESSION_NONE) {
    session_start();

}else{
}
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/languagePreference.php";
echo gettext("Good Morning");
//Header of the HTML page
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php";
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/getFarmData.php";
/*
    fetch production points of the user, product categories, product features, 
    product unit types from database. which can be used in add 
    a new product modal as options in curresponding fields. the result is stored locally in the session
*/
getProductCategories();
getProductFeatures();
getProductUnits();
fetchFarmLandData(); //Optional call, this function call has to be deleted becuase the same function is called when loading getFarmData.php file
?>


<script>
    window.onload = function() {
        //        pass user_id instead of 0 to get user defined cache daat
        const userId = localStorage.getItem('userId') ? localStorage.getItem('userId') : 0;
        getCache(userId);
        setLoginOrProfileButton();
    };
    /*
        cache service to get product category, product features and unit to show in the add product page.
        This service also want to be updated in the respose of successfull user login to get user prefered cache data
    */
    function getCache(userID){
        const headerValue = {
            'access-token': localStorage.getItem('token'),
            'user_id': userID,
            'action': "READ"
        };
        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/getCache.php",
            headers: headerValue,
            data: { userId: userID },
            //            dataType: "json",
            //            contentType: "application/json",
            //            cache: false,
            success: function( data ) {
                console.log(data)
                const cacheJSON = JSON.parse(data);
                const productCategories = cacheJSON['product_category'] != null ? cacheJSON['product_category'] : []
                setCategoryFilter(productCategories);
                const productFeatures = cacheJSON['product_feature'] != null ? cacheJSON['product_feature'] : []
                const productUnits = cacheJSON['product_unit'] != null ? cacheJSON['product_unit'] : []
                const productionPoint = cacheJSON['production_point'] != null ? cacheJSON['production_point'] : []

                localStorage['productCategories'] = JSON.stringify(productCategories);
                localStorage['productFeatures'] = JSON.stringify(productFeatures);
                localStorage['productUnits'] = JSON.stringify(productUnits);
                localStorage['productionPoints'] = JSON.stringify(productionPoint);



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
//getAllProducts();

?>

<script>

    function setCategoryFilter(categories){
        var categoryName = '';
        const locale = localStorage.getItem('language') ? localStorage.getItem('language') : DEUTSCH;
        var categoryOptionsUI = '';
        if (categories){
            categories.forEach(function (category, i) {
                const categoryId = category.category_id ? category.category_id : 0;
                switch (locale){
                    case ENGLISH:
                        categoryName = category.category_name ? category.category_name : '';
                    default:
                        categoryName = category.category_name_de ? category.category_name_de : '';
                }
                const categoryImage = category.image_name ? category.image_name : '';

                categoryOptionsUI += `<li onclick="filterMapByCategory(${categoryId})">
<div class="fab-icon-holder">
<img class="icon-image fab-icon-holder-img" src="${getServerRootAddress()}/kleinerzeugernetzwerk_uploads/others/categories/${categoryImage}" alt="">
    </div>
<span class="fab-label">${categoryName}</span>
    </li>`;

            });
        }
        if (document.getElementById('category-options')){
            document.getElementById('category-options').innerHTML = categoryOptionsUI;
        }
    }
</script>
<?php
//Footer Html containig jquery scripts and other dependent bootstrap cdns
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php";
?>