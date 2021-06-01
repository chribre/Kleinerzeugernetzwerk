$(document).ready(function(){
    setLoginOrProfileButton();
    //    $("#side-bar-menu").load("/kleinerzeugernetzwerk/assets/components/sideBar.php");
    var url_string = window.location;
    var url = new URL(url_string);
    var productId = url.searchParams.get("product");
    viewProduct(productId, showProductInDetail);
});

function viewProduct(productId, actionFunction){

    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/details.php",
        headers: {
            'action': 'PRODUCT',
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { productId: productId },
        dataType: "json",
        success: function( data ) {
            console.log(data);
            actionFunction(data);
        },
        error: function (request, status, error) {
            alert(request.responseText);
            console.log(error)
        }
    });
}

function showProductInDetail(productData){
    var productDetailsUI = ""


    if (productData) {
        const productDeatils = productData.productDetails ? productData.productDetails : {};
        const productImages = productData.productImages ? productData.productImages : [];
        if (Object.keys(productDeatils).length != 0){

            productDetailsUI = `<div id="carouselExampleIndicators" class="carousel slide bg-secondary" data-ride="carousel">
<ol class="carousel-indicators">`;

            if (productImages.length == 0){
                productDetailsUI += `<li data-target="#carouselExampleIndicators" data-slide-to="0"></li>`;
            }
            productImages.forEach(function(productImage, index){
                if (productImage != null){
                    const imagePath = productImage.image_path ? productImage.image_path : DEFAULT_PRODUCT_IMAGE;
                    productDetailsUI += `<li data-target="#carouselExampleIndicators" data-slide-to="${index}"></li>`;
                }
            })

            productDetailsUI += `</ol>
<div class="carousel-inner">`;

            if (productImages.length == 0){
                productDetailsUI += `<div class="carousel-item active">
<img class="d-block w-100" src="${getFilePath(2, DEFAULT_PRODUCT_IMAGE)}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;" onerror="this.src=${getFilePath(2, DEFAULT_PRODUCT_IMAGE)}">
</div>`;
            }

            productImages.forEach(function(productImage, index){
                if (productImage != null){
                    const imageName = productImage.image_name ? productImage.image_name : DEFAULT_PRODUCT_IMAGE;
                    const imagePath = getFilePath(2, imageName);
                    if (index == 0){
                        productDetailsUI += `<div class="carousel-item active">
<img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;" onerror="this.src=${imagePath}">
</div>`;
                    }else{
                        productDetailsUI += `<div class="carousel-item">
<img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
</div>`;
                    }
                }
            })

            productDetailsUI += `</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>`;

            const productId = productDeatils.product_id ? productDeatils.product_id : 0;
            const productName = productDeatils.product_name ? productDeatils.product_name : '';
            const productDesc = productDeatils.product_description ? productDeatils.product_description : '';
            const productCategory = productDeatils.category_name ? productDeatils.category_name : '';
            const price = productDeatils.price_per_unit ? productDeatils.price_per_unit : '';
            const unit = productDeatils.unit_name ? productDeatils.unit_name : '';
            const availableQuantity = productDeatils.quantity_of_price ? productDeatils.quantity_of_price : '';
            const productFeatureString = productDeatils.product_features ? productDeatils.product_features : '';
            const productFeatureArray = productFeatureString.split(',');
            const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
            const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];


            productDetailsUI += `<div>
<div class="row justify-content-between p-3">
<div class="">
<h2>${productName}</h2>
<h4>${productCategory}</h4>
</div>
<button type="button" class="btn btn-secondary btn-lg"><h2 class="btn-price">€ ${price}/${unit}</h2>
<p class="btn-available">${availableQuantity} ${unit} available</p></button>

</div>

<p>${productDesc}</p>
</div>`;

            productDetailsUI += `<div class="row my-5 justify-content-between">`;

            productFeatureArray.forEach(function(featureType){
                var feature = $.map( productFeaturesMasterArray, function(e,i){
                    if( e.feature_type_id == featureType ) return e; 
                });
                if (feature != null && feature.length > 0){
                    const featureObj = feature[0] ? feature[0] : [];
                    const featureImagePath = featureObj.image_path ? featureObj.image_path : '';
                    const featureName = featureObj.feature_name ? featureObj.feature_name : '';
                    productDetailsUI += `<div class="col-md-1 col-md-offset-1">
<img class="img-responsive" src="${featureImagePath}" />
</div>`;
                }
            })

            productDetailsUI += `</div>`;
            productDetailsUI += `<h3 class="my-5">SELLING POINTS</h3>`;
            productDetailsUI += `<section>
<div>
<div class="row">`;
            //            const productSellerIds = productDeatils.sellers ? productDeatils.sellers : '';
            //            const productSellerIdArray = productSellerIds.split(',');

            const sellerArray = productData.sellerDetails ? productData.sellerDetails : [];

            sellerArray.forEach(function(seller){
                //                var seller = $.map( sellerArray, function(e,i){
                //                    if( e.seller_id == productSellerId ) return e; 
                //                });
                if (seller != null){
                    const sellerObj = seller;
                    const sellerName = sellerObj.seller_name ? sellerObj.seller_name : '';
                    const sDesc = seller.seller_description ? seller.seller_description : '';
                    const sellerId = sellerObj.seller_id ? sellerObj.seller_id : 0;
                    const sStreet = sellerObj.street ? sellerObj.street : '';
                    const sBuildingNum = sellerObj.building_number ? sellerObj.building_number : '';
                    const sCity = sellerObj.city ? sellerObj.city : '';
                    const sZip = sellerObj.zip ? sellerObj.zip : '';
                    const sImageName = sellerObj.image_name ? sellerObj.image_name : DEFAULT_SELLER_IMAGE;
                    const sImagePath = getFilePath(4, sImageName);

                    const sellerAddress = sStreet + ' ' + sBuildingNum + ', ' + sCity + ' ' + sZip;

                    const sPhone = sellerObj.phone ? sellerObj.phone : '';
                    const sEmail = sellerObj.seller_email ? sellerObj.seller_email : '';
                    const sWeb = sellerObj.seller_website ? seller.seller_website : '';


                    productDetailsUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="gotoSellerDetailsScreen(${sellerId})">
<div class="card border-0 shadow-sm rounded">
<div class="card-body p-4">
<div class="row align-items-center justify-content-between">
<div class="col-md-8">
<h3 class="">${sellerName}</h3>
<h5>${sStreet} ${sBuildingNum}<br>${sZip} ${sCity}</h5>`;

                    if (sPhone != ''){
                        productDetailsUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
</svg>

<p class="ml-3 my-auto">${sPhone}</p>

</div>`;
                    }


                    if (sEmail != ''){
                        productDetailsUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>

<p class="ml-3 my-auto">${sEmail}</p>

</div>`;
                    }


                    if (sWeb != ''){
                        productDetailsUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
<path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
</svg>

<p class="ml-3 my-auto">${sWeb}</p>

</div>`;
                    }


                    productDetailsUI += `
<p class="mt-2 mx-auto">${sDesc}</p>
</div>
<div class="col-md-4">
<img class="d-block" src="${sImagePath}" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
</div>
</div>
</div>
</div>
</div>`;
                }
            })


            productDetailsUI += `</div>
</div>
</section>`;


            productDetailsUI += `<h3 class="my-5">PRODUCTION POINT</h3>`;
            const productionPointDetails = productData.productionPointDetails ? productData.productionPointDetails : [];
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


            const producerDetails = productData.userData ? productData.userData : [];
            const producerId = producerDetails.user_id ? producerDetails.user_id : '';
            const firstName = producerDetails.first_name ? producerDetails.first_name : '';
            const lastName = producerDetails.last_name ? producerDetails.last_name : '';
            const phone = producerDetails.phone ? producerDetails.phone : '';
            const email = producerDetails.email ? producerDetails.email : '';

            const userStreet = producerDetails.street ? producerDetails.street : '';
            const userHouseNum = producerDetails.house_number ? producerDetails.house_number : '';
            const userZip = producerDetails.zip ? producerDetails.zip : '';
            const userCity = producerDetails.city ? producerDetails.city : '';

            const producerImageName = producerDetails.image_name ? producerDetails.image_name : DEFAULT_USER_IMAGE;
            const producerImage = getFilePath(1, producerImageName);
            productDetailsUI += `<div class="row justify-content-center my-5 cursor-pointer" onclick="goToProductionPointDeatailsScreen(${ppID})">
<div class="col-md-6 mr-0">
<img class="d-block" src="${ppImagePath}" alt="Third slide" style="height: 350px; object-fit: cover;">
</div>
<div class="col-md-6">
<h3 class="">${ppName}</h3>

<div class="row ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill my-auto" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
<p class="text-muted my-auto ml-3">${ppStreet} ${ppBuildingNum}<br>
${ppCity} - ${ppZip}</p>
</div>

<br>
<br>

<div class="row ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
<p class="text-muted my-auto ml-3">${phone}</p>
</div>


<div class="row ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<p class="text-muted my-auto ml-3">${email}</p>
</div>


<div class="row mx-1 my-3 justify-content-between">
<img src="https://image.flaticon.com/icons/png/128/145/145802.png" alt="" height="50px" width="50px">
<img src="https://image.flaticon.com/icons/png/128/145/145812.png" alt="" height="50px" width="50px">
<img src="https://image.flaticon.com/icons/png/128/2111/2111646.png" alt="" height="50px" width="50px">
<img src="https://image.flaticon.com/icons/png/128/145/145807.png" alt="" height="50px" width="50px">
<img src="https://image.flaticon.com/icons/png/128/355/355980.png" alt="" height="50px" width="50px">


</div>


<div class="row border-0 shadow-sm rounded  align-items-center justify-content-center mt-2 p-2 cursor-pointer bring-to-front" onclick="gotoProducerDetails(${producerId})">
<img class="rounded-circle" src="${producerImage}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
<div class="ml-4">
<h3 class="my-auto">${firstName} ${lastName}</h3>
<p class="my-auto">${userStreet} ${userHouseNum}<br>${userZip} ${userCity}</p>

</div>


</div>




</div>

</div>`;


            //            productDetailsUI += `<div class="row awesome-project-content">`;
            //
            //
            //
            //            productImages.forEach(function(productImage, index){
            //                if (productImage != null){
            //                    const imagePath = productImage.image_path ? productImage.image_path : '';
            //                    productDetailsUI += `<div class="col-md-4 col-sm-4 col-xs-12 design development">
            //<div class="single-awesome-project">
            //<div class="awesome-img">
            //<a href="#"><img src="${imagePath}" alt="" /></a>
            //<div class="add-actions text-center">
            //<div class="project-dec">
            //<a class="venobox" data-gall="myGallery" href="${imagePath}">
            //</a>
            //</div>
            //</div>
            //</div>
            //</div>
            //</div>`;
            //                }
            //            })


            //            productDetailsUI += `</div>`;

            document.getElementById('productDetails').innerHTML = productDetailsUI;
//            document.getElementById('sideBarContent').innerHTML = productDetailsUI;
//            $('#productDetails').remove();
        }
    }
}
