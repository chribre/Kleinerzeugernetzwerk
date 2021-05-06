function viewProductionPointInDetail(productionPointId, actionFunction){
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/details.php",
        headers: {
            'action': 'PRODUCTION_POINT',
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { productionPointId: productionPointId },
        dataType: "json",
        success: function( data ) {
            console.log(data);
            actionFunction(data);
            //            const jsonData = JSON.parse(data) ? JSON.parse(data) : [];
            //            actionFunction(jsonData);
        },
        error: function (request, status, error) {
            alert(request.responseText);
            console.log(error)
        }
    });
}

function listproductsOnSideBar(productsData){
    var sideBarUI = "";
    const productionPoint = productsData.productionPointDetails ? productsData.productionPointDetails : [];
    const ppId = productionPoint.farm_id ? productionPoint.farm_id : 0;
    const ppName = productionPoint.farm_name ? productionPoint.farm_name : '';
    const ppDesc = productionPoint.farm_desc ? productionPoint.farm_desc : '';
    const ppStreet = productionPoint.street ? productionPoint.street : '';
    const ppHouseNum = productionPoint.house_number ? productionPoint.house_number : '';
    const ppCity = productionPoint.city ? productionPoint.city : '';
    const ppZip = productionPoint.zip ? productionPoint.zip : '';
    const ppImagePath = productionPoint.image_path ? productionPoint.image_path : 'https://live.staticflickr.com/913/41611654110_532ca32b8f_b.jpg';

    const userData = productsData.userData ? productsData.userData : [];
    const phone = userData.phone ? userData.phone : '';
    const email = userData.email ? userData.email : '';
    const firstName = userData.first_name ? userData.first_name : '';
    const lastName = userData.last_name ? userData.last_name : '';

    const name = firstName + ' ' + lastName;

    const userImagePath = userData.image_path ? userData.image_path : '';

    const products = productsData.productDetails ? productsData.productDetails : [];
    const productsCount = products.length;

    sideBarUI = `<img src="${ppImagePath}" width="100%" height="220px"  style="object-fit: cover;" alt="">
<div class="p-2">
<h4>${ppName}</h4>
<p class="text-dark cst-desc">${ppDesc}</p>

<div class="row px-4 align-items-center justify-content-between">
<div class="">
<h5>${phone}</h5>
<h5>${email}</h5>
</div>
<div class="row justify-content-around">
<img class="rounded-circle" src="https://image.flaticon.com/icons/png/128/1384/1384053.png" id="socialImage" alt="">
<img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/1384/1384065.svg?token=exp=1619102216~hmac=5208539dcadea913c800c5be1ae781bd" id="socialImage" alt="">
<img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/1384/1384055.svg?token=exp=1619102525~hmac=05c3613c4bd211205f4445a5e04188b2" id="socialImage" alt="">
</div>
<div>
<p class="text-dark">${productsCount} products</p>
</div>
</div>`;


    var productCardUI = "";
    if (productsCount > 0){
        products.forEach(function(product) {
            var productCard = ""
            const productId = product.product_id ? product.product_id : 0;
            const productName = product.product_name ? product.product_name : '';
            const productDesc = product.product_description ? product.product_description : '';
            const productCategory = product.category_name ? product.category_name : '';
            const productUnit = product.unit_name ? product.unit_name : '';
            const productImagePath = product.image_path ? product.image_path : 'http://localhost/kleinerzeugernetzwerk_uploads/vegetables_bw.jpg';

            const price = product.price_per_unit ? product.price_per_unit : '';
            const quantity = product.quantity_of_price ? product.quantity_of_price : 0;
            const unitType = product.unit ? product.unit : 0;

            const productfeatures = product.features ? product.features : '';
            const productFeatureArray = productfeatures.split(',');
            const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
            const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];




            const productSellerIds = product.sellers ? product.sellers : '';
            const productSellerIdArray = productSellerIds.split(',');


            productCard = `<div class="my-3">
<div class="rounded bg-white py-2 px-4">
<div class="row">

<img class="cst-image-cover" src="${productImagePath}" width="30%" height="160px" alt="">

<div class="mx-3">
<h5>${productName}</h5>
<p>${productCategory}</p>
<h5>€${price}/${productUnit}</h5>
<div class="row justify-content-between mx-1">`,


                productFeatureArray.forEach(function(featureType){
                var feature = $.map( productFeaturesMasterArray, function(e,i){
                    if( e.feature_type_id == featureType ) return e; 
                });
                if (feature != null && feature.length > 0){
                    const featureObj = feature[0] ? feature[0] : [];
                    const featureImagePath = featureObj.image_path ? featureObj.image_path : '';
                    const featureName = featureObj.feature_name ? featureObj.feature_name : '';
                    productCard += `<img class="cst-image-cover cst-feature-images" src="${featureImagePath}" alt="">`
                }
            })
            productCard += `</div>
</div>
</div>
<div class="">
<p class="mt-2 cst-desc cst-product-desc">${productDesc}</p>
</div><div class="cst-page-break">`;

            const sellerArray = productsData.sellerDetails ? productsData.sellerDetails : [];

            productSellerIdArray.forEach(function(productSellerId){
                var seller = $.map( sellerArray, function(e,i){
                    if( e.seller_id == productSellerId ) return e; 
                });
                if (seller != null && seller.length > 0){
                    const sellerObj = seller[0] ? seller[0] : [];
                    const sellerName = sellerObj.seller_name ? sellerObj.seller_name : '';
                    const sellerId = sellerObj.seller_id ? sellerObj.seller_id : 0;
                    const sStreet = sellerObj.street ? sellerObj.street : '';
                    const sBuildingNum = sellerObj.building_number ? sellerObj.building_number : '';
                    const sCity = sellerObj.city ? sellerObj.city : '';
                    const sZip = sellerObj.zip ? sellerObj.zip : '';
                    const sImagePath = sellerObj.image_path ? sellerObj.image_path : '';

                    const sellerAddress = sStreet + ' ' + sBuildingNum + ', ' + sCity + ' ' + sZip;
                    productCard += `<div class="row rounded-pill mb-1 cst-bg-gray">
<div>
<img class="cst-feature-images rounded-circle m-1" src="${sImagePath}" alt="">
</div>
<div>
<h5 class="text-white align-self-center">${sellerName}</h5>
</div>

</div>`;
                }
            })
            productCard += '</div>';
            productCard += '</div>';
            productCard += '</div>';
            productCardUI += productCard;
        })
        sideBarUI += productCardUI;
        sideBarUI += '</div>';

        document.getElementById('mapSidebar').innerHTML = sideBarUI;
        sidebar.toggle();
    }

}