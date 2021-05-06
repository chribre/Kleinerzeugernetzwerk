$(document).ready(function(){

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
            
            productDetailsUI = `<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">`;
            productImages.forEach(function(productImage, index){
                if (productImage != null){
                    const imagePath = productImage.image_path ? productImage.image_path : '';
                    productDetailsUI += `<li data-target="#carouselExampleIndicators" data-slide-to="${index}"></li>`;
                }
            })

            productDetailsUI += `</ol>
        <div class="carousel-inner">`;
            
            productImages.forEach(function(productImage, index){
                if (productImage != null){
                    const imagePath = productImage.image_path ? productImage.image_path : '';
                    if (index == 0){
                        productDetailsUI += `<div class="carousel-item active">
                <img class="d-block w-100" src="${imagePath}" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
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
            const productSellerIds = productDeatils.sellers ? productDeatils.sellers : '';
            const productSellerIdArray = productSellerIds.split(',');

            const sellerArray = productData.sellerDetails ? productData.sellerDetails : [];

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
                    
                    productDetailsUI += `<div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">${sellerName}</h3>
                                    <p class="text-muted mb-0">${sellerAddress}</p>
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
            
            const ppImagePath = productionPointDetails.image_path ? productionPointDetails.image_path : '';
            
            
            const producerDetails = productData.userData ? productData.userData : [];
            const firstName = producerDetails.first_name ? producerDetails.first_name : '';
            const lastName = producerDetails.last_name ? producerDetails.last_name : '';
            const phone = producerDetails.phone ? producerDetails.phone : '';
            const email = producerDetails.email ? producerDetails.email : '';
            
            const producerImage = producerDetails.image_path ? producerDetails.image_path : '';
            productDetailsUI += `<div class="row justify-content-center my-5">
        <div class="col-md-6 mr-0">
            <img class="d-block" src="${ppImagePath}" alt="Third slide" style="height: 350px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h3 class="">${ppName}</h3>
            <p class="text-muted mb-0">${ppStreet} ${ppBuildingNum}<br>
                ${ppCity} - ${ppZip}</p>
            <br>
            <br>
            <p class="text-muted mb-0">${phone}</p>
            <p class="text-muted mb-0">${email}</p>
            <div class="row mx-1 my-3 justify-content-between">
                <img src="https://image.flaticon.com/icons/png/128/145/145802.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/145/145812.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/2111/2111646.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/145/145807.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/355/355980.png" alt="" height="50px" width="50px">


            </div>
            <div class="row card border-0 shadow-sm rounded  align-items-center justify-content-around mt-2">
                <h3>${firstName} ${lastName}</h3>
                <img class="rounded-circle" src="${producerImage}" alt="" style="width: 50px; height: 50px; object-fit: cover;">
            </div>
        </div>

    </div>`;
            
            
            productDetailsUI += `<div class="row awesome-project-content">`;
            
            
            
            productImages.forEach(function(productImage, index){
                if (productImage != null){
                    const imagePath = productImage.image_path ? productImage.image_path : '';
                    productDetailsUI += `<div class="col-md-4 col-sm-4 col-xs-12 design development">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="${imagePath}" alt="" /></a>
                    <div class="add-actions text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="${imagePath}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
                }
            })
            
            
             productDetailsUI += `</div>`;
            
            document.getElementById('productDetails').innerHTML = productDetailsUI;
        }
    }
}
