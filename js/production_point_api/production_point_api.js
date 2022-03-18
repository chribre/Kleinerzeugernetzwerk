$(document).ready(function(){
    setLoginOrProfileButton();
    var url_string = window.location;
    var url = new URL(url_string);
    var productionPointId = url.searchParams.get("productionpoint");
    if (productionPointId){
        viewProductionPointInDetail(productionPointId, showProductionPointInDetailScreen);
    }

});

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
    clearMapPolylines()
    const productionPoint = productsData.productionPointDetails ? productsData.productionPointDetails : [];
    const ppId = productionPoint.farm_id ? productionPoint.farm_id : 0;
    const ppName = productionPoint.farm_name ? productionPoint.farm_name : '';
    const ppDesc = productionPoint.farm_desc ? productionPoint.farm_desc : '';
    const latitude = productionPoint.latitude ? productionPoint.latitude : 0.0;
    const longitude = productionPoint.longitude ? productionPoint.longitude : 0.0;
    const ppStreet = productionPoint.street ? productionPoint.street : '';
    const ppHouseNum = productionPoint.house_number ? productionPoint.house_number : '';
    const ppCity = productionPoint.city ? productionPoint.city : '';
    const ppZip = productionPoint.zip ? productionPoint.zip : '';
    const ppImageName = productionPoint.image_name ? productionPoint.image_name : DEFAULT_PRODUCTION_POINT_IMAGE;
    const ppImagePath = getFilePath(3, ppImageName);

    const userData = productsData.userData ? productsData.userData : [];
    const phone = userData.phone ? userData.phone : '';
    const email = userData.email ? userData.email : '';
    const firstName = userData.first_name ? userData.first_name : '';
    const lastName = userData.last_name ? userData.last_name : '';

    const name = firstName + ' ' + lastName;

    const userImageName = userData.image_name ? userData.image_name : '';
    const userImagePath = getFilePath(1, userImageName);

    const products = productsData.productDetails ? productsData.productDetails : [];
    const productsCount = products.length;

    sideBarUI = `<img class="cursor-pointer" onclick="goToProductionPointDeatailsScreen(${ppId})" src="${ppImagePath}" width="100%" height="220px"  style="object-fit: cover;" alt="">
<div class="p-2">
<h4 class="cursor-pointer" onclick="goToProductionPointDeatailsScreen(${ppId})">${ppName}</h4>
<p class="text-dark cst-desc">${ppDesc}</p>


<div class="mx-auto row justify-content-center">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
<p class="ml-2 cst-line-space-contact">${ppStreet} ${ppHouseNum}, ${ppZip} ${ppCity}</p>
</div>
<div class="row mx-auto justify-content-between">
<div class="mx-auto row my-0">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
<a class="ml-2 cst-line-space-contact" href="tel:${phone}">${phone}</a>
</div>
<div class="mx-auto row my-0">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<a class="ml-2 cst-line-space-contact" href="mailto:{email}">${email}</a>
</div>
</div>


<div class="row px-4 align-items-center justify-content-between">
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
            const productImageName = product.image_name ? product.image_name : DEFAULT_PRODUCT_IMAGE;
            const productImagePath = getFilePath(2, productImageName);

            const price = product.price_per_unit ? product.price_per_unit : '';
            const quantity = product.quantity_of_price ? product.quantity_of_price : 0;
            const unitType = product.unit ? product.unit : 0;

            const productfeatures = product.features ? product.features : '';
            const productFeatureArray = productfeatures.split(',');
            const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
            const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];




            const productSellerIds = product.sellers ? product.sellers : '';
            const productSellerIdArray = productSellerIds.split(',');


            productCard = `<div class="my-3 cursor-pointer" onClick="goToProductDetailsPage(${productId})">
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
                    const featImage = featureObj.image_name ? featureObj.image_name : '';
                    const featureImagePath = getFilePath(6, featImage);
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
                    const sImageName = sellerObj.image_name ? sellerObj.image_name : DEFAULT_SELLER_IMAGE;
                    const sImagePath = getFilePath(4, sImageName);

                    const sellerLat = sellerObj.latitude ? sellerObj.latitude : null;
                    const sellerLong = sellerObj.longitude ? sellerObj.longitude : null;
                    if (sellerLat > 0 && sellerLong > 0 && latitude > 0 && longitude > 0){
                        createConnectionBetweenSellerAndProductionPoint(latitude, longitude, sellerLat, sellerLong);
                    }

                    const sellerAddress = sStreet + ' ' + sBuildingNum + ', ' + sCity + ' ' + sZip;
                    productCard += `<div class="row rounded-pill mb-1 cst-bg-gray cursor-pointer bring-to-front" onclick="gotoSellerDetailsScreen(${sellerId})">
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
    }
    sideBarUI += productCardUI;
    sideBarUI += '</div>';

    document.getElementById('mapSidebar').innerHTML = sideBarUI;
    sidebar.show();;
    mymap.panTo(new L.LatLng(latitude, longitude));

}


function showProductionPointInDetailScreen(productionPointData){

    var productionPointUI = "";

    if (productionPointData){
        const productionPointDetails = productionPointData.productionPointDetails ? productionPointData.productionPointDetails : [];
        const producerDetails = productionPointData.userData ? productionPointData.userData : [];
        const producerImageName = producerDetails.image_name ? producerDetails.image_name : DEFAULT_USER_IMAGE;
        const producerImage = getFilePath(1, producerImageName);
        const producerId = producerDetails.user_id ? producerDetails.user_id : 0;
        productionPointUI  = `<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">`;
        const productionPointImages = productionPointData.productionPointImages ? productionPointData.productionPointImages : [];

        if (productionPointImages.length == 0){
            productionPointUI += `<li data-target="#carouselExampleIndicators" data-slide-to="0"></li>`;
        }
        productionPointImages.forEach(function(productionPointImage, index){
            if (productionPointImage != null){
                productionPointUI  += `<li data-target="#carouselExampleIndicators" data-slide-to="${index}"></li>`;
            }
        })
        productionPointUI += `</ol>
<div class="carousel-inner">`;
        if (productionPointImages.length == 0){
            productionPointUI += `<div class="carousel-item active">
<img class="d-block w-100" src="${getFilePath(3, DEFAULT_PRODUCTION_POINT_IMAGE)}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
</div>`;
        }
        productionPointImages.forEach(function(productionPointImage, index){
            if (productionPointImage != null){
                const imageName = productionPointImage.image_name ? productionPointImage.image_name : DEFAULT_PRODUCTION_POINT_IMAGE;
                const imagePath = getFilePath(3, imageName);


                if (index == 0){
                    productionPointUI += `<div class="carousel-item active">
<img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
</div>`;
                }else{
                    productionPointUI += `<div class="carousel-item">
<img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
</div>`;
                }
            }
        })

        productionPointUI += `</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

<div class="position-absolute float-profile cursor-pointer" onclick="gotoProducerDetails(${producerId})">
<img class=" rounded-circle float-profile-image" src="${producerImage}" alt="" style="width: 60px; height: 60px; object-fit: cover;">
</div>

</div>`;

        const ppID = productionPointDetails.farm_id ? productionPointDetails.farm_id : 0;
        const ppName = productionPointDetails.farm_name ? productionPointDetails.farm_name : '';
        const ppDesc = productionPointDetails.farm_desc ? productionPointDetails.farm_desc : '';

        const ppStreet = productionPointDetails.street ? productionPointDetails.street : '';
        const ppBuildingNum = productionPointDetails.house_number ? productionPointDetails.house_number : '';
        const ppCity = productionPointDetails.city ? productionPointDetails.city : '';
        const ppZip = productionPointDetails.zip ? productionPointDetails.zip : '';
        const ppAddress = ppStreet + ' ' + ppBuildingNum + ', ' + ppCity + ' ' + ppZip;

        const ppImageName = productionPointDetails.image_name ? productionPointDetails.image_name : DEFAULT_PRODUCTION_POINT_IMAGE;
        const ppImagePath = getFilePath(3, ppImageName);


        const firstName = producerDetails.first_name ? producerDetails.first_name : '';
        const lastName = producerDetails.last_name ? producerDetails.last_name : '';
        const phone = producerDetails.phone ? producerDetails.phone : '';
        const email = producerDetails.email ? producerDetails.email : '';

        const chatUserName = producerDetails.chat_user_name ? producerDetails.chat_user_name : '';
        const userChatAvailable = localStorage.getItem('isChatLoggedIn') == 'true' ? true :  false;


        productionPointUI += `<div>
<div class="row justify-content-between p-3">
<div class="">
<h2>${ppName}</h2>
</div>
<button type="button" class="btn btn-secondary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg></button>

</div>

<h4>${ppStreet} ${ppBuildingNum}<br>${ppZip} ${ppCity}</h4>
<div class="row justify-content-between p-3">
<div class="row">


<button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg></button>


<h5 class="my-auto ml-3">${phone}</h5>
</div>
<div class="row">
<button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg></button>


<h5 class="my-auto ml-3">${email}</h5>
</div>`;
        
        
        if (userChatAvailable == true && chatUserName != ''){
            
            productionPointUI += `<div class="row">
<button type="button" class="btn btn-secondary ml-2" onclick="gotoDirectMessage('${chatUserName}')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
  Direct Message
</button>



</div>`;
            
     }
        
        
        

        productionPointUI += `</div>


<p>${ppDesc}</p>
</div>`;

        productionPointUI += `<h3 class="my-5">PRODUCTS</h3>`;
        productionPointUI += `<section>
<div>
<div class="row">`;
        const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
        const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];

        const productDetails = productionPointData.productDetails ? productionPointData.productDetails : [];
        productDetails.forEach(function(product, index){
            if (product != null){
                const productId = product.product_id ? product.product_id : 0;
                const productName = product.product_name ? product.product_name : '';
                const productDesc = product.product_description ? product.product_description : '';
                const productCategory = product.category_name ? product.category_name : '';
                const price = product.price_per_unit ? product.price_per_unit : '';
                const unit = product.unit_name ? product.unit_name : '';
                const availableQuantity = product.quantity_of_price ? product.quantity_of_price : '';
                const productFeatureString = product.features ? product.features : '';
                const productFeatureArray = productFeatureString.split(',');
                const productImageName = product.image_name ? product.image_name : DEFAULT_PRODUCT_IMAGE;
                const productImage = getFilePath(2, productImageName);
                productionPointUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="goToProductDetailsPage(${productId})">
<div class="card border-0 shadow-sm rounded">
<div class="card-body p-4">
<div class="row align-items-center justify-content-between">
<div class="col-md-8">
<h3 class="mb-0">${productName}</h3>
<p class="text-muted mb-2">${productCategory}</p>
<h4>€ ${price}/${unit}</h4>
<div class="row">`;

                productFeatureArray.forEach(function(featureType){
                    var feature = $.map( productFeaturesMasterArray, function(e,i){
                        if( e.feature_type_id == featureType ) return e; 
                    });
                    if (feature != null && feature.length > 0){
                        const featureObj = feature[0] ? feature[0] : [];
                        const featImage = featureObj.image_name ? featureObj.image_name : '';
                        const featureImagePath = getFilePath(6, featImage);
                        productionPointUI += `<img class="img-responsive feature-img ml-3" src="${featureImagePath}" />`;
                    }
                })

                productionPointUI += `</div>
<p class="mt-3">${productDesc}</p>

</div>
<div class="col-md-4">
<img class="d-block" src="${productImage}" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
</div>
</div>
</div>
</div>
</div>`;
            }
        })

        productionPointUI += `</div>
</div>
</section>`;


        productionPointUI += `<h3 class="my-5">SELLERS</h3>

<section>
<div>
<div class="row">`;
        const productSellers = productionPointData.sellerDetails ? productionPointData.sellerDetails : [];

        productSellers.forEach(function(seller){
            const sellerName = seller.seller_name ? seller.seller_name : '';
            const sDesc = seller.seller_description ? seller.seller_description : '';
            const sellerId = seller.seller_id ? seller.seller_id : 0;
            const sStreet = seller.street ? seller.street : '';
            const sBuildingNum = seller.building_number ? seller.building_number : '';
            const sCity = seller.city ? seller.city : '';
            const sZip = seller.zip ? seller.zip : '';
            const sImageName = seller.image_name ? seller.image_name : DEFAULT_SELLER_IMAGE;
            const sImagePath = getFilePath(4, sImageName);

            const sPhone = seller.phone ? seller.phone : '';
            const sEmail = seller.seller_email ? seller.seller_email : '';
            const sWeb = seller.seller_website ? seller.seller_website : '';
            const sellerAddress = sStreet + ' ' + sBuildingNum + ', ' + sCity + ' ' + sZip;

            productionPointUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="gotoSellerDetailsScreen(${sellerId})">
<div class="card border-0 shadow-sm rounded">
<div class="card-body p-4">
<div class="row align-items-center justify-content-between">
<div class="col-md-8">
<h3 class="">${sellerName}</h3>
<h5>${sStreet} ${sBuildingNum}<br>${sZip} ${sCity}</h5>`;
            if (sPhone != ''){
                productionPointUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
</svg>

<p class="ml-3 my-auto">${sPhone}</p>

</div>`;
            }

            if (sEmail != ''){
                productionPointUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>

<p class="ml-3 my-auto">${sEmail}</p>

</div>`;
            }

            if (sWeb != ''){
                productionPointUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
<path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
</svg>

<p class="ml-3 my-auto">${sWeb}</p>

</div>`;
            }


            productionPointUI += `
<p class="mt-2 mx-auto">${sDesc}</p>
</div>
<div class="col-md-4">
<img class="d-block" src="${sImagePath}" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
</div>
</div>
</div>
</div>
</div>`;
        })


        productionPointUI += `</div>
</div>
</section>`;


        productionPointUI += `</div>
</div>
</section>`;
    }

    //    productionPointUI += ``;*------

    document.getElementById('productionpointDetails').innerHTML = productionPointUI;
}
