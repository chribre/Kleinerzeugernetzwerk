$(document).ready(function(){
    setLoginOrProfileButton();
    var url_string = window.location;
    var url = new URL(url_string);
    var searchTerm = url.searchParams.get("search_term");
    if (searchTerm != ''){
        searchWithText(searchTerm, searchResultUI);
    }

});

function searchWithText(searchText, actionFunction){
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/search.php",
        headers: {
            'action': 'SEARCH',
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { searchText: searchText },
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


function searchResultUI(searchResults){

    var searchUI = "";
    if (searchResults != null){
        const products = searchResults.productDetails ? searchResults.productDetails : [];
        products.forEach(function(productDeatils){
            if (productDeatils){
                const productId = productDeatils.product_id ? productDeatils.product_id : 0;
                const productName = productDeatils.product_name ? productDeatils.product_name : '';
                const productDesc = productDeatils.product_description ? productDeatils.product_description : '';
                const productCategory = productDeatils.category_name ? productDeatils.category_name : '';
                const price = productDeatils.price_per_unit ? productDeatils.price_per_unit : '';
                const unit = productDeatils.unit_name ? productDeatils.unit_name : '';
                const availableQuantity = productDeatils.quantity_of_price ? productDeatils.quantity_of_price : '';
                const street = productDeatils.street ? productDeatils.street : '';
                const houseNum = productDeatils.house_number ? productDeatils.house_number : '';
                const city = productDeatils.city ? productDeatils.city : '';
                const zip = productDeatils.zip ? productDeatils.zip : '';

                const producerId = productDeatils.producer_id ? productDeatils.producer_id : 0;
                const firstName = productDeatils.first_name ? productDeatils.first_name : '';
                const lastName = productDeatils.last_name ? productDeatils.last_name : '';
                const producerImage = productDeatils.user_image ? productDeatils.user_image : DEFAULT_USER_IMAGE;
                const productImage = productDeatils.product_image ? productDeatils.product_image : DEFAULT_PRODUCT_IMAGE;
                
                
                searchUI += `<div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="${productImage}"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">${productName}</h4>
                            <p class="my-auto">${productCategory}</p>
                        </div>
                        <div class="row my-auto">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">${street} ${houseNum}<br>${zip} ${city}</p>
                        </div>
                        <div class="my-auto">
                            <div class="row rounded-pill border border-secondary p-1 mx-auto">
                                <img class="rounded-circle" src="${producerImage}" width="32px" height="32px" alt="">
                                <p class="my-auto ml-2">${firstName} ${lastName}</p>
                            </div>
                            <div class="my-auto">
                                <h4 class="text-right">€${price}/${unit}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="mx-auto addr-line-height">${productDesc}</p>  
                    </div>

                </div>

            </div>`;
            }
        })




        const productionPoints = searchResults.productionPointDetails ? searchResults.productionPointDetails : [];
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
                
                
                searchUI += `<div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="${ppImagePath}"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">${ppName}</h4>
                        </div>
                        <div class="row my-auto">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">${ppStreet} ${ppBuildingNum}<br>${ppZip} ${ppCity}</p>
                        </div>
                        <div class="my-auto">
                            <div class="row rounded-pill border border-secondary p-1 mx-auto">
                                <img class="rounded-circle" src="${producerImage}" width="32px" height="32px" alt="">
                                <p class="my-auto ml-2">${firstName} ${lastName}</p>
                            </div>
                        </div>
                    </div>
                    <div class="my-auto">
                        <p class="addr-line-height mt-2">${ppDesc}</p>  
                    </div>

                </div>

            </div>`;

            }
        })



        const productSellers = searchResults.sellerDetails ? searchResults.sellerDetails : [];
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


            searchUI += `<div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="${sImagePath}"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">${sellerName}</h4>
                        </div>
                        <div class="row my-auto mr-2">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">${sStreet} ${sBuildingNum}<br>${sZip} ${sCity}</p>
                        </div>
                    </div>
                    <div class="my-auto">
                        <p class="addr-line-height mt-2">${sDesc}</p>  
                    </div>

                    <div class="row my-auto mx-auto">

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Monday</p>
                        </div>
                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Tuesday</p>
                        </div>


                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Wednesday</p>
                        </div>


                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Thursday</p>
                        </div>

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Friday</p>
                        </div>

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Saturday</p>
                        </div>

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Sunday</p>
                        </div>
                    </div>
                </div>
            </div>`;
        })




        const producers = searchResults.userDetails ? searchResults.userDetails : [];
        producers.forEach(function(producerDetails){
            const producerId = producerDetails.user_id ? producerDetails.user_id : 0;
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


            searchUI += `<div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="${producerImage}"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">${firstName} ${lastName}</h4>
                            <div class="row mx-auto">
                                <div class="row mx-auto my-auto">
                                    <svg class="my-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                    <p class="my-auto ml-2">${phone}</p>
                                </div>

                                <div class="row my-auto ml-5">
                                    <svg class="my-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                    </svg>
                                    <p class="my-auto ml-2">${email}</p>
                                </div>


                            </div>
                        </div>
                        <div class="row my-auto mr-2">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">${street} ${houseNum}<br>${zip} ${city}</p>
                        </div>
                    </div>
                    <div class="my-auto">
                        <p class="addr-line-height mt-2">${description}</p>  
                    </div>
                </div>
            </div>`;
        })


        
        document.getElementById('searchResultUI').innerHTML = searchUI;

    }
}