
$(document).ready(function(){
    setLoginOrProfileButton();
    var url_string = window.location;
    var url = new URL(url_string);
    var sellerId = url.searchParams.get("seller");
    if (sellerId){
        viewSellerInDetail(sellerId, showSellerInDetailScreen);
    }

});

function viewSellerInDetail(sellerId, actionFunction){
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/details.php",
        headers: {
            'action': 'SELLER',
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { sellerId: sellerId },
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

function showSellerInDetailScreen(sellerData){
    var sellerUI = "";

    if (sellerData){
        const sellerDetails = sellerData.sellerDetails ? sellerData.sellerDetails : {};
        const sellerImages = sellerData.sellerImages ? sellerData.sellerImages : [];

        sellerUI = `<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">`;

        sellerImages.forEach(function(sellerImage, index){
            if (sellerImage != null){
                sellerUI += `<li data-target="#carouselExampleIndicators" data-slide-to="${index}"></li>`;
            }
        })
        sellerUI += `</ol>`;
        sellerUI += `<div class="carousel-inner">`;
        sellerImages.forEach(function(sellerImage, index){
            if (sellerImage != null){
                const imageName = sellerImage.image_name ? sellerImage.image_name : DEFAULT_SELLER_IMAGE;
                const imagePath = getFilePath(4, imageName);
                if (index == 0){
                    sellerUI += `<div class="carousel-item active">
<img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
</div>`;
                }else{
                    sellerUI += `<div class="carousel-item">
<img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
</div>`;
                }
            }
        })

        sellerUI += `</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>`;
        const sellerName = sellerDetails.seller_name ? sellerDetails.seller_name : '';
        const sDesc = sellerDetails.seller_description ? sellerDetails.seller_description : '';
        const sellerId = sellerDetails.seller_id ? sellerDetails.seller_id : 0;
        const sStreet = sellerDetails.street ? sellerDetails.street : '';
        const sBuildingNum = sellerDetails.building_number ? sellerDetails.building_number : '';
        const sCity = sellerDetails.city ? sellerDetails.city : '';
        const sZip = sellerDetails.zip ? sellerDetails.zip : '';
        const sImageName = sellerDetails.image_name ? sellerDetails.image_name : DEFAULT_SELLER_IMAGE;
        const sImagePath = getFilePath(4, sImageName);

        const sPhone = sellerDetails.phone ? sellerDetails.phone : '';
        const sEmail = sellerDetails.seller_email ? sellerDetails.seller_email : '';
        const sWeb = sellerDetails.seller_website ? sellerDetails.seller_website : '';
        const sellerAddress = sStreet + ' ' + sBuildingNum + ', ' + sCity + ' ' + sZip;
        
        const chatUserName = sellerDetails.chat_user_name ? sellerDetails.chat_user_name : '';
        const userChatAvailable = localStorage.getItem('isChatLoggedIn') == 'true' ? true :  false;


        sellerUI += `<div>
<div class="row justify-content-between p-3">
<div class="">
<h2>${sellerName}</h2>
</div>
<button type="button" class="btn btn-secondary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg></button>

</div>

<h4>${sStreet} ${sBuildingNum}<br>${sZip} ${sCity}</h4>
<div class="row justify-content-between p-3">`;

        if (sPhone != ''){
            sellerUI += `<div class="row">
<button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg></button>


<h5 class="my-auto ml-3">${sPhone}</h5>
</div>`;
        }

        if (sEmail != ''){
            sellerUI += `<div class="row">
<button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg></button>


<h5 class="my-auto ml-3">${sEmail}</h5>
</div>`;
        }

        if (sWeb != ''){
            sellerUI += `<div class="row">
<button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
<path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
</svg></button>


<h5 class="my-auto ml-3">${sWeb}</h5>
</div>`;
        }
        
        if (userChatAvailable == true && chatUserName != ''){

                sellerUI += `<div class="row">
<button type="button" class="btn btn-secondary ml-2" onclick="gotoDirectMessage('${chatUserName}')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
Direct Message
</button>



</div>`;

            }

        sellerUI += `</div>


<p>${sDesc}</p>

<div>
<h5 class="mt-5"><?php echo gettext("Opening Hours"); ?></h5>
<table class="table table-borderless">
<tbody>`;

        const isMonAvailable = sellerDetails.is_mon_available ? sellerDetails.is_mon_available : false;
        const isTueAvailable = sellerDetails.is_tue_available ? sellerDetails.is_tue_available : false;
        const isWedAvailable = sellerDetails.is_wed_available ? sellerDetails.is_wed_available : false;
        const isThuAvailable = sellerDetails.is_thu_available ? sellerDetails.is_thu_available : false;
        const isFriAvailable = sellerDetails.is_fri_available ? sellerDetails.is_fri_available : false;
        const isSatAvailable = sellerDetails.is_sat_available ? sellerDetails.is_sat_available : false;
        const isSunAvailable = sellerDetails.is_sun_available ? sellerDetails.is_sun_available : false;

        const monOpen = sellerDetails.mon_open_time ? sellerDetails.mon_open_time : '';
        const monClose = sellerDetails.mon_close_time ? sellerDetails.mon_close_time : '';

        const tueOpen = sellerDetails.tue_open_time ? sellerDetails.tue_open_time : '';
        const tueClose = sellerDetails.tue_close_time ? sellerDetails.tue_close_time : '';

        const wedOpen = sellerDetails.wed_open_time ? sellerDetails.wed_open_time : '';
        const wedClose = sellerDetails.wed_close_time ? sellerDetails.wed_close_time : '';

        const thuOpen = sellerDetails.thu_open_time ? sellerDetails.thu_open_time : '';
        const thuClose = sellerDetails.thu_close_time ? sellerDetails.thu_close_time : '';

        const friOpen = sellerDetails.fri_open_time ? sellerDetails.fri_open_time : '';
        const friClose = sellerDetails.fri_close_time ? sellerDetails.fri_close_time : '';

        const satOpen = sellerDetails.sat_open_time ? sellerDetails.sat_open_time : '';
        const satClose = sellerDetails.sat_close_time ? sellerDetails.sat_close_time : '';

        const sunOpen = sellerDetails.sun_open_time ? sellerDetails.sun_open_time : '';
        const sunClose = sellerDetails.sun_close_time ? sellerDetails.sun_close_time : '';



        sellerUI += `<tr>
<th scope="row"><?php echo gettext("Monday"); ?></th>`;

        if (isMonAvailable){
            sellerUI += `<td>${monOpen}</td>
<td>${monClose}</td>`;
        }else{
            sellerUI +=`<td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `<th scope="row"><?php echo gettext("Tuesday"); ?></th>`;
        if (isTueAvailable){
            sellerUI += `<td>${tueOpen}</td>
<td>${tueClose}</td>`;
        }else{
            sellerUI +=`<td><td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `</tr>
<tr>`;


        sellerUI += `<th scope="row"><?php echo gettext("Wednesday"); ?></th>`;
        if (isWedAvailable){
            sellerUI += `<td>${wedOpen}</td>
<td>${wedClose}</td>`;
        }else{
            sellerUI +=`<td><td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `<th scope="row"><?php echo gettext("Thursday"); ?></th>`;
        if (isThuAvailable){
            sellerUI += `<td>${thuOpen}</td>
<td>${thuClose}</td>`;
        }else{
            sellerUI +=`<td><td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `</tr>
<tr>`;

        sellerUI += `<th scope="row"><?php echo gettext("Friday"); ?></th>`;
        if (isFriAvailable){
            sellerUI += `<td>${friOpen}</td>
<td>${friClose}</td>`;
        }else{
            sellerUI +=`<td><td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `<th scope="row"><?php echo gettext("Saturday"); ?></th>`;
        if (isSatAvailable){
            sellerUI += `<td>${satOpen}</td>
<td>${satClose}</td>`;
        }else{
            sellerUI +=`<td><td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `</tr>
<tr>`;

        sellerUI += `<th scope="row"><?php echo gettext("Sunday"); ?><td></th>`;
        if (isSunAvailable){
            sellerUI += `<td>${sunOpen}</td>
<td>${sunClose}</td>`;
        }else{
            sellerUI +=`<td><td><?php echo gettext("Closed"); ?></td>`;
        }

        sellerUI += `</tr>`;


        sellerUI += `</tbody>
</table>
</div>
</div>

<h3 class="my-5"><?php echo gettext("PRODUCTS"); ?></h3>

<section>
<div>
<div class="row">`;


        //        const openingHours = [
        //            {
        //                available: isMonAvailable,
        //                day: 'Monday',
        //                open: monOpen,
        //                close: monClose
        //            },
        //            {
        //                available: isTueAvailable,
        //                day: 'Tuesday',
        //                open: tueOpen,
        //                close: tueClose
        //            },
        //            {
        //                available: isWedAvailable,
        //                day: 'Wednesday',
        //                open: wedOpen,
        //                close: wedClose
        //            },
        //            {
        //                available: isThuAvailable,
        //                day: 'Thursday',
        //                open: thuOpen,
        //                close: thuClose
        //            },
        //            {
        //                available: isFriAvailable,
        //                day: 'Friday',
        //                open: friOpen,
        //                close: friClose
        //            },
        //            {
        //                available: isSatAvailable,
        //                day: 'Saturday',
        //                open: satOpen,
        //                close: satClose
        //            },
        //            {
        //                available: isSunAvailable,
        //                day: 'Sunday',
        //                open: sunOpen,
        //                close: sunClose
        //            }
        //        ];


        //        openingHours.forEach(function(openingDay, index){
        //            if (openingDay.available == true){
        //                const sellerUI += ``;
        //            }else{
        //                const sellerUI += ``;
        //            }
        //        })



        const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
        const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];


        const productDetails = sellerData.productDetails ? sellerData.productDetails : [];
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
                sellerUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="goToProductDetailsPage(${productId})">
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
                        sellerUI += `<img class="img-responsive feature-img ml-3" src="${featureImagePath}" />`;
                    }
                })

                sellerUI += `</div>
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

        sellerUI += `</div>
</div>
</section>
<h3 class="my-5"><?php echo gettext("PRODUCTION POINT"); ?></h3>

<section>
<div>
<div class="row">`;

        const productionPoints = sellerData.productionPoints ? sellerData.productionPoints : [];
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

                const ppImageName = productionPointDetails.image_name ? productionPointDetails.image_name : DEFAULT_PRODUCTION_POINT_IMAGE;
                const ppImagePath = getFilePath(3, ppImageName);

                const producerId = productionPointDetails.producer_id ? productionPointDetails.producer_id : 0;
                const firstName = productionPointDetails.first_name ? productionPointDetails.first_name : '';
                const lastName = productionPointDetails.last_name ? productionPointDetails.last_name : '';
                const uPhone = productionPointDetails.phone ? productionPointDetails.phone : '';
                const uEmail = productionPointDetails.email ? productionPointDetails.email : '';

                const producerImageName = productionPointDetails.user_image_name ? productionPointDetails.user_image_name : DEFAULT_USER_IMAGE;
                const producerImage = getFilePath(1, producerImageName);

                sellerUI += `<div class="col-lg-6 mb-4 cursor-pointer" onclick="goToProductionPointDeatailsScreen(${ppID})">
<div class="card border-0 shadow-sm rounded">
<div class="card-body p-4">
<div class="row align-items-center justify-content-between">
<div class="col-md-8">
<h3 class="">${ppName}</h3>
<h5>${ppStreet} ${ppBuildingNum}<br>${ppZip} ${ppCity}</h5>`;

                if (uPhone != ''){
                    sellerUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
</svg>

<p class="ml-3 my-auto">${uPhone}</p>

</div>`;
                }

                if (uEmail != ''){
                    sellerUI += `<div class="row align-items-center ml-auto">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>

<p class="ml-3 my-auto">${uEmail}</p>

</div>`;
                }

                sellerUI += `<p class="mt-2">${ppDesc}</p>
</div>
<div class="col-md-4">
<img class="d-block" src="${ppImagePath}" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
</div>
</div>
<div class="justify-content-center">
<div class="row justify-content-center rounded-pill border border-secondary d-inline-flex p-1 mx-auto cursor-pointer bring-to-front" onclick="gotoProducerDetails(${producerId})">
<img class="d-block rounded-circle" src="${producerImage}" alt="Third slide" style="width: 32px; height: 32px; object-fit: cover;">
<p class="my-auto ml-2 text-dark font-weight-bold">${firstName} ${lastName}</p>

</div>
</div>
</div>
</div>
</div>`;
            }
        })
        sellerUI += `</div>
</div>
</section>`;
    }

    document.getElementById('sellerDetails').innerHTML = sellerUI;
}

function showSellerSidebar(sellerData){
    var sellerSideBarUI = "";
    clearMapPolylines()
    const sellerDetails = sellerData.sellerDetails ? sellerData.sellerDetails : {};
    const sellerName = sellerDetails.seller_name ? sellerDetails.seller_name : '';
    const sDesc = sellerDetails.seller_description ? sellerDetails.seller_description : '';
    const latitude = sellerDetails.latitude ? sellerDetails.latitude : 0.0;
    const longitude = sellerDetails.longitude ? sellerDetails.longitude : 0.0;
    const sellerId = sellerDetails.seller_id ? sellerDetails.seller_id : 0;
    const sStreet = sellerDetails.street ? sellerDetails.street : '';
    const sBuildingNum = sellerDetails.building_number ? sellerDetails.building_number : '';
    const sCity = sellerDetails.city ? sellerDetails.city : '';
    const sZip = sellerDetails.zip ? sellerDetails.zip : '';
    const sImageName = sellerDetails.image_name ? sellerDetails.image_name : DEFAULT_SELLER_IMAGE;
    const sImagePath = getFilePath(4, sImageName);

    const sPhone = sellerDetails.phone ? sellerDetails.phone : '';
    const sEmail = sellerDetails.seller_email ? sellerDetails.seller_email : '';
    const sWeb = sellerDetails.seller_website ? sellerDetails.seller_website : '';

    const productDetails = sellerData.productDetails ? sellerData.productDetails : [];
    const productsCount = productDetails.length;


    sellerSideBarUI += `<img src="${sImagePath}" width="100%" height="220px"  style="object-fit: cover;" alt="">
<div class="p-2">
<h4>${sellerName}</h4>
<p class="text-dark cst-desc">${sDesc}</p>


<div class="mx-auto row justify-content-center">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
<p class="ml-2 cst-line-space-contact">${sStreet} ${sBuildingNum}, ${sZip} ${sCity}</p>
</div>
<div class="row mx-auto justify-content-between">
<div class="mx-auto row my-0">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
<p class="ml-2 cst-line-space-contact">${sPhone}</p>
</div>
<div class="mx-auto row my-0">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<p class="ml-2 cst-line-space-contact">${sEmail}</p>
</div>
<div class="mx-auto row my-0">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
<path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
</svg>
<p class="ml-2 cst-line-space-contact">${sWeb}</p>
</div>
</div>

<div class="row mx-auto justify-content-between">

<div class="row ml-2">
<img class="rounded-circle" src="https://image.flaticon.com/icons/png/128/1384/1384053.png" id="socialImage" alt="">
<img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/733/733579.svg?token=exp=1620563776~hmac=db6f2d43cd6da2272e3e5cc0c9dd4d18" id="socialImage" alt="">
<img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/1384/1384055.svg?token=exp=1619102525~hmac=05c3613c4bd211205f4445a5e04188b2" id="socialImage" alt="">
</div>
<div>
<p class="text-dark my-auto">${productsCount} products</p>
</div>
</div>`;
    const productFeaturesMasterString = localStorage['productFeatures'] ? localStorage['productFeatures'] : '';
    const productFeaturesMasterArray = JSON.parse(productFeaturesMasterString) ? JSON.parse(productFeaturesMasterString) : [];



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


            const ppID = product.farm_id ? product.farm_id : 0;
            const ppName = product.farm_name ? product.farm_name : '';
            const ppImageName = product.farm_image_name ? product.farm_image_name : '';
            const ppImagePath = getFilePath(3, ppImageName);

            const productionPointLat = product.latitude ? product.latitude : null;
            const productionPointLong = product.longitude ? product.longitude : null;
            if (productionPointLat > 0 && productionPointLong > 0 && latitude > 0 && longitude > 0){
                createConnectionBetweenSellerAndProductionPoint(latitude, longitude, productionPointLat, productionPointLong);
            }

            sellerSideBarUI += `<div class="my-3 cursor-pointer" onClick="goToProductDetailsPage(${productId})">
<div class="rounded bg-white py-2 px-4">
<div class="row">

<img class="cst-image-cover" src="${productImage}" width="30%" height="160px" alt="">

<div class="mx-3">
<h5>${productName}</h5>
<p>${productCategory}</p>
<h5>€${price}/${unit}</h5>
<div class="row justify-content-between mx-1">`;

            productFeatureArray.forEach(function(featureType){
                var feature = $.map( productFeaturesMasterArray, function(e,i){
                    if( e.feature_type_id == featureType ) return e; 
                });
                if (feature != null && feature.length > 0){
                    const featureObj = feature[0] ? feature[0] : [];
                    const featureImagePath = featureObj.image_path ? featureObj.image_path : '';
                    const featureName = featureObj.feature_name ? featureObj.feature_name : '';
                    sellerSideBarUI += `<img class="cst-image-cover cst-feature-images" src="${featureImagePath}" alt="">`;
                }
            })
            sellerSideBarUI += `</div>
</div>
</div>
<div class="">
<p class="mt-2 cst-desc cst-product-desc">${productDesc}</p>
</div>


<div class="cst-page-break">
<div class="row rounded-pill mb-1 cst-bg-gray cursor-pointer" onclick="goToProductionPointDeatailsScreen(${ppID})">
<div>
<img class="cst-feature-images rounded-circle m-1" src="${ppImagePath}" alt="">
</div>
<div class="my-auto">
<h5 class="text-white align-self-center my-auto">${ppName}</h5>
</div>

</div>

</div>

</div>`;
        }
    })
    sellerSideBarUI += `</div>`;
    sellerSideBarUI += `</div>`;


    document.getElementById('mapSidebar').innerHTML = sellerSideBarUI;
    sidebar.toggle();
    mymap.panTo(new L.LatLng(latitude, longitude));
}