$(document).ready(function(){
    setLoginOrProfileButton();

    var url_string = window.location;
    var url = new URL(url_string);
    var producerId = url.searchParams.get("producer");
    if (producerId){
        viewProducerInDetail(producerId, showProducerInDetailScreen);
    }

});

function viewProducerInDetail(producerId, actionFunction){
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/details.php",
        headers: {
            'action': 'PRODUCER',
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { producerId: producerId },
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

function showProducerInDetailScreen(producerData){

    var producerUI = '';

    const producerDetails = producerData.userDetails ? producerData.userDetails : [];
    const firstName = producerDetails.first_name ? producerDetails.first_name : '';
    const lastName = producerDetails.last_name ? producerDetails.last_name : '';
    const phone = producerDetails.phone ? producerDetails.phone : '';
    const email = producerDetails.email ? producerDetails.email : '';

    const street = producerDetails.street ? producerDetails.street : '';
    const houseNum = producerDetails.house_number ? producerDetails.house_number : '';
    const city = producerDetails.city ? producerDetails.city : '';
    const zip = producerDetails.zip ? producerDetails.zip : '';

    const description = producerDetails.description ? producerDetails.description : '';

    const producerImage = producerDetails.image_path ? producerDetails.image_path : DEFAULT_USER_IMAGE;

    
    producerUI += `<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="${producerImage}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
            </div>
        </div>
    </div>



    <div>
        <div class="row justify-content-between p-3">
            <div class="">
                <h2>${firstName} ${lastName}</h2>
            </div>
        </div>

        <h4>${street} ${houseNum}<br>${zip} ${city}</h4>
        <div class="row justify-content-between p-3">`;
    
    if (phone != ''){
        producerUI += `<div class="row">


                <button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg></button>


                <h5 class="my-auto ml-3">${phone}</h5>
            </div>`;
    }
    if (email != ''){
        producerUI += `<div class="row">
                <button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                    </svg></button>


                <h5 class="my-auto ml-3">${email}</h5>
            </div>`;
    }
    
    producerUI += `</div>


        <p>${description}</p>

    </div>`;


    producerUI += `<h3 class="my-5">PRODUCTS</h3>`;
    producerUI += `<section>
<div>
<div class="row">`;
    const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
    const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];

    const productDetails = producerData.productDetails ? producerData.productDetails : [];
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
            const productImage = product.image_path ? product.image_path : DEFAULT_PRODUCT_IMAGE;
            producerUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="goToProductDetailsPage(${productId})">
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
                    const featureImagePath = featureObj.image_path ? featureObj.image_path : '';
                    const featureName = featureObj.feature_name ? featureObj.feature_name : '';
                    producerUI += `<img class="img-responsive feature-img ml-3" src="${featureImagePath}" />`;
                }
            })

            producerUI += `</div>
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

    producerUI += `</div>
</div>
</section>`;



    producerUI += `<h3 class="my-5">PRODUCTION POINT</h3>

<section>
<div>
<div class="row">`;

    const productionPoints = producerData.productionPointDetails ? producerData.productionPointDetails : [];
    productionPoints.forEach(function(productionPointDetails, index){
        if (productionPointDetails != null){
            const ppID = productionPointDetails.farm_id ? productionPointDetails.farm_id : 0;
            const ppName = productionPointDetails.farm_name ? productionPointDetails.farm_name : '';
            const ppDesc = productionPointDetails.farm_desc ? productionPointDetails.farm_desc : '';

            const ppStreet = productionPointDetails.street ? productionPointDetails.street : '';
            const ppBuildingNum = productionPointDetails.house_number ? productionPointDetails.house_number : '';
            const ppCity = productionPointDetails.city ? productionPointDetails.city : '';
            const ppZip = productionPointDetails.zip ? productionPointDetails.zip : '';
            const ppAddress = ppStreet + ' ' + ppBuildingNum + ', ' + ppCity + ' ' + ppZip;

            const ppImagePath = productionPointDetails.image_path ? productionPointDetails.image_path : DEFAULT_PRODUCTION_POINT_IMAGE;


            const firstName = productionPointDetails.first_name ? productionPointDetails.first_name : '';
            const lastName = productionPointDetails.last_name ? productionPointDetails.last_name : '';
            const uPhone = productionPointDetails.phone ? productionPointDetails.phone : '';
            const uEmail = productionPointDetails.email ? productionPointDetails.email : '';

            const producerImage = productionPointDetails.user_image_path ? productionPointDetails.user_image_path : DEFAULT_USER_IMAGE;

            producerUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="goToProductionPointDeatailsScreen(${ppID})">
<div class="card border-0 shadow-sm rounded">
<div class="card-body p-4">
<div class="row align-items-center justify-content-between">
<div class="col-md-8">
<h3 class="">${ppName}</h3>
<h5>${ppStreet} ${ppBuildingNum}<br>${ppZip} ${ppCity}</h5>`;

//            if (uPhone != ''){
//                producerUI += `<div class="row align-items-center ml-auto">
//<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
//<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
//</svg>
//
//<p class="ml-3 my-auto">${uPhone}</p>
//
//</div>`;
//            }
//
//            if (uEmail != ''){
//                producerUI += `<div class="row align-items-center ml-auto">
//<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
//<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
//</svg>
//
//<p class="ml-3 my-auto">${uEmail}</p>
//
//</div>`;
//            }

            producerUI += `<p class="mt-2">${ppDesc}</p>
</div>
<div class="col-md-4">
<img class="d-block" src="${ppImagePath}" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
</div>
</div>  
</div>
</div>
</div>`;
        }
    })
    producerUI += `</div>
</div>
</section>`;



    producerUI += `<h3 class="my-5">SELLERS</h3>

<section>
<div>
<div class="row">`;
    const productSellers = producerData.sellerDetails ? producerData.sellerDetails : [];

    productSellers.forEach(function(seller){
        const sellerName = seller.seller_name ? seller.seller_name : '';
        const sDesc = seller.seller_description ? seller.seller_description : '';
        const sellerId = seller.seller_id ? seller.seller_id : 0;
        const sStreet = seller.street ? seller.street : '';
        const sBuildingNum = seller.building_number ? seller.building_number : '';
        const sCity = seller.city ? seller.city : '';
        const sZip = seller.zip ? seller.zip : '';
        const sImagePath = seller.image_path ? seller.image_path : DEFAULT_SELLER_IMAGE;

        const sPhone = seller.phone ? seller.phone : '';
        const sEmail = seller.seller_email ? seller.seller_email : '';
        const sWeb = seller.seller_website ? seller.seller_website : '';
        const sellerAddress = sStreet + ' ' + sBuildingNum + ', ' + sCity + ' ' + sZip;

        producerUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="gotoSellerDetailsScreen(${sellerId})">
<div class="card border-0 shadow-sm rounded">
<div class="card-body p-4">
<div class="row align-items-center justify-content-between">
<div class="col-md-8">
<h3 class="">${sellerName}</h3>
<h5>${sStreet} ${sBuildingNum}<br>${sZip} ${sCity}</h5>`;
        
        if (sPhone != ''){
            producerUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
</svg>

<p class="ml-3 my-auto">${sPhone}</p>

</div>`;
        }

        if (sEmail != ''){
            producerUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>

<p class="ml-3 my-auto">${sEmail}</p>

</div>`;
        }

        if (sWeb != ''){
            producerUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
<path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
</svg>

<p class="ml-3 my-auto">${sWeb}</p>

</div>`;
        }


        producerUI += `
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


    producerUI += `</div>
</div>
</section>`;


    document.getElementById('producerDetails').innerHTML = producerUI;
}

