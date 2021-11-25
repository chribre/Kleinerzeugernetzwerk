<?php
/****************************************************************
   FILE             :   map.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   map using leafletJS to show production points as dots.
****************************************************************/

$leaflet_sidebar_css = "/kleinerzeugernetzwerk/assets/leaflet_sidebar/L.Control.Sidebar.css";
$leaflet_sidebar_js = "/kleinerzeugernetzwerk/assets/leaflet_sidebar/L.Control.Sidebar.js";
$imagePath = "/kleinerzeugernetzwerk/images/default_products.jpg";

?>


<link rel="stylesheet" type="text/css" href="/kleinerzeugernetzwerk/css/custom/fab.css" />

<link rel="stylesheet" type="text/css" href="<?php echo $leaflet_sidebar_css ?>" />
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/production_point_api/production_point_api.js"></script>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/seller_web_services/seller_details.js.php"></script>
<style>
    .arrow-icon {
        width: 14px;
        height: 14px;
    }

    .arrow-icon > div {
        margin-left: -1px;
        margin-top: -3px;
        transform-origin: center center;
        font: 12px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif;
    }

    #productionPointLoc, #sellerLoc:hover {
        cursor: pointer;
    }

    .cst-desc {
        text-align: justify;
    }
    #socialImage{
        width: 28px;
        height: 28px;
        object-fit: cover;
        margin-right: 5px;
    }
    .cst-bg-gray{
        background-color: gainsboro;
    }
    #mapSidebar{
        background-color: gainsboro;
    }
    .cst-image-cover{
        object-fit: cover;
    }
    .cst-feature-images{
        width: 30px;
        height: 30px;
    }
    .cst-page-break {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cst-product-desc {
        line-height: 1.5em;
        height: 3em;
        overflow: hidden;
        /*        white-space: nowrap; */
        text-overflow: ellipsis; 
    }

    .cst-line-space-contact{
        line-height: 1.5em;
    }


    #mapid .leaflet-popup-content-wrapper {
        background: #dfeeea;
        border: 1px solid #dfeeea;
        border-radius: 5px;
    }

</style>


<script src="<?php echo $leaflet_sidebar_js ?>"></script>




<!-- No Data Modal -->
<div class="modal fade" id="no-map-data-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="no-data-title"><?php echo gettext("No Data Available!"); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="no-data-content">
                <?php echo gettext("No products available under the category"); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo gettext("Close"); ?></button>
            </div>
        </div>
    </div>
</div>




<div id="mapid" class="full-height"></div>
<div class="fab-container" id="category-menu">
    <div class="fab fab-icon-holder">

        <span id="category-loading" hidden class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <svg id="category-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg>
        <!--                        <i class="bi bi-three-dots-vertical"></i>-->
        <!--        <img class="category-icon" width="30px" height="30px" src="https://img-premium.flaticon.com/png/512/847/847581.png?token=exp=1621266229~hmac=6a680992b11ab1c9b1631dbde5800e7c" alt="">-->
    </div>

    <ul class="fab-options" id="category-options">

    </ul>
</div>


<div class="p-0" id="mapSidebar">


    <!--Selling point side bar-->



    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" width="100%" height="220px"  style="object-fit: cover;" alt="">
    <div class="p-2">
        <h4>Selling Point Name</h4>
        <p class="text-dark cst-desc">In the tranquil idyll of the family game My Farm Shopplayers can experience just that without leaving their home. In turn, three dice are thrown each turn. The active player uses one die to choose a new expansion for his farm. The combination of the other two dice determines which field is activated on the farm - not only for the active player, but also for everyone else. The extensions improve the actions with which the players milk cows, shear sheep, harvest honey or collect eggs. These raw materials can then be sold. Whoever made the most money in the end wins.</p>


        <div class="mx-auto row justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
            </svg>
            <p class="ml-2 cst-line-space-contact">Brodaer Straße 4, 17033 Neubrandenburg</p>
        </div>
        <div class="row mx-auto justify-content-between">
            <div class="mx-auto row my-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                <p class="ml-2 cst-line-space-contact">+91946194609</p>
            </div>
            <div class="mx-auto row my-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                </svg>
                <p class="ml-2 cst-line-space-contact">testemail@gmail.com</p>
            </div>
            <div class="mx-auto row my-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                </svg>
                <p class="ml-2 cst-line-space-contact">www.biomarkttesttest.com</p>
            </div>
        </div>

        <div class="row mx-auto justify-content-between">

            <div class="row ml-2">
                <img class="rounded-circle" src="https://image.flaticon.com/icons/png/128/1384/1384053.png" id="socialImage" alt="">
<!--
                <img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/733/733579.svg?token=exp=1620563776~hmac=db6f2d43cd6da2272e3e5cc0c9dd4d18" id="socialImage" alt="">
                <img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/1384/1384055.svg?token=exp=1619102525~hmac=05c3613c4bd211205f4445a5e04188b2" id="socialImage" alt="">
-->
            </div>
            <div>
                <p class="text-dark my-auto">20 products</p>
            </div>
        </div>

        <div class="my-3">
            <div class="rounded bg-white py-2 px-4">
                <div class="row">

                    <img class="cst-image-cover" src="https://www.jessicagavin.com/wp-content/uploads/2019/04/types-of-lemons-1-1200.jpg" width="30%" height="160px" alt="">

                    <div class="mx-3">
                        <h5>Lemon Home Made</h5>
                        <p>Vegetable</p>
                        <h5>€2,5/kg</h5>
                        <div class="row justify-content-between mx-1">
                            <img class="cst-image-cover cst-feature-images" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg/1200px-Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg.png" alt="">
                            <img class="cst-image-cover cst-feature-images" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg/1200px-Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg.png" alt="">
                            <img class="cst-image-cover cst-feature-images" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg/1200px-Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg.png" alt="">
                            <img class="cst-image-cover cst-feature-images" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg/1200px-Bio-Siegel-EG-%C3%96ko-VO-Deutschland.svg.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="">
                    <p class="mt-2 cst-desc cst-product-desc">The lemon, Citrus limon, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily Northeast India. The tree's ellipsoidal yellow fruit is used for culinary and non-culinary purposes throughout the world, primarily for its juice, which has both culinary and cleaning uses.</p>
                </div>


                <div class="cst-page-break">
                    <div class="row rounded-pill mb-1 cst-bg-gray">
                        <div>
                            <img class="cst-feature-images rounded-circle m-1" src="https://www.eu-startups.com/wp-content/uploads/2020/05/supermarket-vegetables-fruits.jpg" alt="">
                        </div>
                        <div class="my-auto">
                            <h5 class="text-white align-self-center my-auto">Producer Name</h5>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>




</div>


<script>

    //    var products = {
    //        "type": "FeatureCollection",
    //        "features": []
    //    }



    var productionPointMarker = {
        "type": "FeatureCollection",
        "features": []
    }

    var sellingPointMarker = {
        "type": "FeatureCollection",
        "features": []
    }


    var connectingSellerIds = [];

    var productionPointLocations = [];

    var sellerIcon = L.icon({
        iconUrl: '/kleinerzeugernetzwerk/images/shopping.png',
        iconSize: [25, 25],
    });

    var productionPointIcon = L.icon({
        iconUrl: '/kleinerzeugernetzwerk/images/greenhouse.png',
        iconSize: [25, 25],
    });




/*
    FUNCTION    :   filter map based on the cateory user selects
    INPUT       :   category id
    OUTPUT      :   show selling points/production point which produces or 
                    selles the selected category products
*/
    function filterMapByCategory(category){
        cancelBubbleEvent();
        window.location = "/kleinerzeugernetzwerk/index.php?category="+category;
    }

/*
    FUNCTION    :   get name of the category from id to show in category filter pop up
    INPUT       :   category id
    OUTPUT      :   returns name of the category
*/
    function getCategoryName(categoryId){
        const categories = localStorage.getItem("productCategories");
        const categoryJson = JSON.parse(categories);

        var category = categoryJson.filter(function(obj) {
            return obj.category_id == categoryId;
        });


        if (category){
            if (category.length != 0){
                const categoryObj = category[0];
                return categoryObj.category_name ? categoryObj.category_name : '';
            }

        }

        return '';
    }


/*
    FUNCTION    :   ajax call on window load to get all production points and selling points to show in map
    INPUT       :   category id; category id 0 return all points
    OUTPUT      :   returns list of production point and selling points in array of dictionaries
*/
    $(document).ready(function(){
        var categoryId = 0;
        var url_string = window.location;
        var url = new URL(url_string);
        categoryId = url.searchParams.get("category") ? url.searchParams.get("category") : 0;

        categoryName = getCategoryName(categoryId);

        $.ajax({
            url: "/kleinerzeugernetzwerk/controller/details.php",    //the page containing php script
            type: "POST",
            headers: {
                'action': 'MAP_DATA',
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: { category: categoryId },
            success:function(result){
                console.log(result)
                products = {
                    "type": "FeatureCollection",
                    "features": []
                }
                const jsonData = JSON.parse(result) ? JSON.parse(result) : [];
                const sellerData = jsonData.sellers ? jsonData.sellers : [];
                const productionPointData = jsonData.productionPoints ? jsonData.productionPoints : [];
                const ppCount = productionPointData.length;
                const sellerCount = sellerData.length;
                if (ppCount > 0){
                    addProductionPointsToMap(productionPointData);
                }
                if (sellerCount > 0){
                    addSellersToMap(sellerData);
                }
                if (ppCount == 0 && sellerCount == 0){
                    document.getElementById('no-data-content').innerHTML = `No products available under the category '${categoryName}'`
                    $('#no-map-data-modal').modal('toggle')
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });
    });

/*
    FUNCTION    :   show all categories of production points and selling points
                    on hiding no data alert on selected category
    INPUT       :   category id as zero
    OUTPUT      :   returns list of all production point and selling points in array of dictionaries
*/
    $('#no-map-data-modal').on('hide.bs.modal', function (e) {
        filterMapByCategory(0)
    })

/*
    FUNCTION    :   add a production points as markers to map
    INPUT       :   production points array
    OUTPUT      :   mark location of production points on map
*/
    function addProductionPointsToMap(productionPoints){
        productionPointMarker = {
            "type": "FeatureCollection",
            "features": []
        }
        $.each(productionPoints,function(i,productionPoint){
            const productionPointId = productionPoint.farm_id ? productionPoint.farm_id : '';
            const productionPointName = productionPoint.farm_name ? productionPoint.farm_name : '';
            const street = productionPoint.street ? productionPoint.street : '';
            const houseNum = productionPoint.house_number ? productionPoint.house_number : '';
            const city = productionPoint.city ? productionPoint.city : '';
            const zip = productionPoint.zip ? productionPoint.zip : '';

            const productionPointAddress = street + ' ' + houseNum + '\n' + city + ' ' + zip;


            const latitude = productionPoint.latitude ? productionPoint.latitude : 0;
            const longitude = productionPoint.longitude ? productionPoint.longitude : 0;
            const imageName = productionPoint.image_name ? productionPoint.image_name : ''
            const imagePath = getFilePath(3, imageName)

            const sellerIds = productionPoint.production_points ? productionPoint.production_points : '';
            const sellerIdArray = createArrayFromString(sellerIds);
            connectingSellerIds[productionPointId] = sellerIdArray;
            productionPointLocations[productionPointId] = {latitude: latitude, longitude: longitude};

            const geom = {
                "type": "Point",
                "coordinates": [
                    longitude, latitude
                ]
            }


            const farmPopupContent = `<div class="hover-background"><a data-id="${productionPointId}" onclick="viewProductionPointInDetail(${productionPointId}, listproductsOnSideBar)" style="text-decoration: none" id="productionPointLoc"><div class="d-inline-flex m-1 p-1"> <img src="${imagePath}" alt="" width="90px" height="60px" style="object-fit: cover;" class="m-auto"> <div class="pl-2"> <div id="productTitle">${productionPointName}</div> <div>${productionPointAddress}</div> </div> </div></a></div>`;



            if (productionPointMarker.features.some((e) => {
                console.log(e.geometry)
                return JSON.stringify(e.geometry) === JSON.stringify(geom)
            })) {
                console.log('Exists');
                productionPointMarker.features.some((feats) => {
                    if (JSON.stringify(feats.geometry) === JSON.stringify(geom)){
                        feats.properties.popupContent += farmPopupContent 
                    }
                })
            }else{
                const tempProductionPoint = {
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            longitude, latitude
                        ]
                    },
                    "type": "Feature",
                    "properties": {
                        "popupContent": farmPopupContent
                    },
                    "id": productionPointId
                };
//                productionPointMarker.features = [...productionPointMarker.features, tempProductionPoint];
                productionPointMarker.features.push(tempProductionPoint);
            }
        })


        console.log(productionPointMarker);
        L.geoJSON([productionPointMarker], {

            style: function (feature) {
                return feature.properties && feature.properties.style;
            },

            onEachFeature: onEachFeature,

            pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {icon: productionPointIcon});
            }
        }).addTo(mymap);
    }


/*
    FUNCTION    :   add a selling points as markers to map
    INPUT       :   selling points array
    OUTPUT      :   mark location of selling points on map
*/
    function addSellersToMap(sellingPoints){
        $.each(sellingPoints,function(i,sellingPoint){

            const sellerId = sellingPoint.seller_id ? sellingPoint.seller_id : 0;
            const sellerName = sellingPoint.seller_name ? sellingPoint.seller_name : '';
            const street = sellingPoint.street ? sellingPoint.street : '';
            const buildingNum = sellingPoint.building_number ? sellingPoint.building_number : '';
            const city = sellingPoint.city ? sellingPoint.city : '';
            const zip = sellingPoint.zip ? sellingPoint.zip : '';

            const sellerAddress = street + ' ' + buildingNum + '\n' + city + ' ' + zip;

            const latitude = sellingPoint.latitude ? sellingPoint.latitude : 0;
            const longitude = sellingPoint.longitude ? sellingPoint.longitude : 0;
            const imageName = sellingPoint.image_name ? sellingPoint.image_name : ''
            const imagePath = getFilePath(4, imageName)


            const productionPointIds = sellingPoint.production_points ? sellingPoint.production_points : '';
            const productionPointIdArray = createArrayFromString(productionPointIds);

            if (productionPointIdArray.length > 0){
                $.each(productionPointIdArray,function(index,id){
                    const productionPointLoc = productionPointLocations[id] ? productionPointLocations[id] : {};
                    const productionPointLat = productionPointLoc.latitude ? productionPointLoc.latitude : null;
                    const productionPointLong = productionPointLoc.longitude ? productionPointLoc.longitude : null;
                    if (productionPointLat > 0 && productionPointLong > 0 && latitude > 0 && longitude > 0){
                        //                        createConnectionBetweenSellerAndProductionPoint(latitude, longitude, productionPointLat, productionPointLong);
                    }
                })
            }


            const geom = {
                "type": "Point",
                "coordinates": [
                    longitude, latitude
                ]
            }


            const sellerPopupContent = `<div class="hover-background"><a data-id="${sellerId}" style="text-decoration: none" id="sellerLoc" onclick="viewSellerInDetail(${sellerId}, showSellerSidebar)"><div class="d-inline-flex m-1 p-1"> <img src="${imagePath}" alt="" width="90px" height="60px" style="object-fit: cover;" class="m-auto"> <div class="pl-2"> <div id="productTitle">${sellerName}</div> <div>${sellerAddress}</div> </div> </div></a></div>`;




            if (sellingPointMarker.features.some((e) => {
                console.log(e.geometry)
                return JSON.stringify(e.geometry) === JSON.stringify(geom)
            })) {
                console.log('Exists');
                sellingPointMarker.features.some((feats) => {
                    if (JSON.stringify(feats.geometry) === JSON.stringify(geom)){
                        feats.properties.popupContent += sellerPopupContent   
                    }
                })
            }else{
                const tempSellingPoint = {
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            longitude, latitude
                        ]
                    },
                    "type": "Feature",
                    "properties": {
                        "popupContent": sellerPopupContent
                    },
                    "id": sellerId
                };
//                sellingPointMarker.features = [...sellingPointMarker.features, tempSellingPoint];
                sellingPointMarker.features.push(tempSellingPoint);
            }
        })


        console.log(sellingPointMarker);
        L.geoJSON([sellingPointMarker], {

            style: function (feature) {
                return feature.properties && feature.properties.style;
            },

            onEachFeature: onEachFeature,

            pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {icon: sellerIcon});
            }
        }).addTo(mymap);
    }




/*
    FUNCTION    :   function to split string into array on , delimiter
    INPUT       :   comma separated string of values
    OUTPUT      :   array of values
*/
    function createArrayFromString(stringValues){
        var array = stringValues.split(',') ? stringValues.split(',') : [];
        return array;
    }


    var connectingPolyline = null;
/*
    FUNCTION    :   creates connection between selling point and production point on 
                    clicking a production point or selling point
    INPUT       :   latitude, longitude of seller and production point
    OUTPUT      :   create a polyline on map that connects selling points and production point
*/
    function createConnectionBetweenSellerAndProductionPoint(latseller, longseller, latProductionPoint, longProductionPoint){
        var pointA = new L.LatLng(latseller, longseller);
        var pointB = new L.LatLng(latProductionPoint, longProductionPoint);
        var pointList = [pointA, pointB];

        connectingPolyline = new L.Polyline(pointList, {
            color: '#adb5bd',
            weight: 2,
            opacity: 1,
            smoothFactor: 1
        });
        connectingPolyline.addTo(mymap);

        //        L.featureGroup(getArrows(pointList, 'red', 6,mymap)).addTo(mymap);
    }

/*
    FUNCTION    :   to remove all existing polyline from the map on user clicks a new point
    INPUT       :   
    OUTPUT      :   map with production points and selling point without polyline connection
*/
    function clearMapPolylines() {
        for(i in mymap._layers) {
            if(mymap._layers[i]._path != undefined) {
                try {
                    mymap.removeLayer(mymap._layers[i]);
                }
                catch(e) {
                    console.log("problem with " + e + mymap._layers[i]);
                }
            }
        }
    }







    // initialize the map
    var mymap = L.map('mapid').setView([53.55657001703077, 13.246793875395099], 15);

    // load a tile layer
    //    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZnJlZHl0aGVra2Vra2FyYSIsImEiOiJja2hybmpxaDMxd2VsMzJteGxhNW1oa3lpIn0.Ca1L1-selQY4MnJB_p9-7Q', {
    //        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //        maxZoom: 20,
    //        id: 'mapbox/light-v10',
    //        tileSize: 512,
    //        zoomOffset: -1,
    //        accessToken: 'your.mapbox.access.token'
    //    }).addTo(mymap);


    var CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });


    CartoDB_Positron.addTo(mymap);

    L.popup({maxHeight: 350});

    function onEachFeature(feature, layer) {
        var popupContent = "";

        if (feature.properties && feature.properties.popupContent) {
            popupContent = feature.properties.popupContent;
        }

        layer.bindPopup(popupContent);
        layer.on('mouseover', function() { layer.openPopup(); });
        //        layer.on('mouseout', function() { layer.closePopup(); });
    }



    var sidebar = L.control.sidebar('mapSidebar', {
        closeButton: true,
        position: 'right'
    });
    mymap.addControl(sidebar);

    //    setTimeout(function () {
    //        sidebar.show();
    //    }, 500);

    //    var marker = L.marker([51.2, 7]).addTo(mymap).on('click', function () {
    //        sidebar.toggle();
    //    });

    mymap.on('click', function () {
        sidebar.hide();
    })

    sidebar.on('show', function () {
        console.log('Sidebar will be visible.');
    });

    sidebar.on('shown', function () {
        console.log('Sidebar is visible.');
    });

    sidebar.on('hide', function () {
        console.log('Sidebar will be hidden.');
    });

    sidebar.on('hidden', function () {
        console.log('Sidebar is hidden.');
    });

    L.DomEvent.on(sidebar.getCloseButton(), 'click', function () {
        console.log('Close button clicked.');
    });

    mymap.on('moveend', function() { 
        const bound = mymap.getBounds();
        const boundEnvelope = getMapBoundEnvelope(bound);
        if (boundEnvelope){
            boundEnvelope.then(result => fetchProductCategoriesInMapBound(result));
        }
    });


    async function getMapBoundEnvelope(bounds){
        if (bounds){
            const northEast = bounds._northEast ?  bounds._northEast : null
            const southWest = bounds._southWest ?  bounds._southWest : null
            if (northEast && southWest){
                const xmax = northEast.lat ? northEast.lat : null
                const ymax = northEast.lng ? northEast.lng : null
                const xmin = southWest.lat ? southWest.lat : null
                const ymin = southWest.lng ? southWest.lng : null

                if (xmax && ymax && xmin && ymin){
                    var coordinateEnvelope =  `${xmin} ${ymax}, ${xmax} ${ymax}, ${xmax} ${ymin}, ${xmin} ${ymin}, ${xmin} ${ymax}`;
                    return coordinateEnvelope;
                }
            }
        }
        return null;
    }

/*
    FUNCTION    :   get list of categories of producs in the current map boundary
    INPUT       :   bounday envelope cordinates
    OUTPUT      :   list of categories
*/
    async function fetchProductCategoriesInMapBound(boundEnvelope){
        $.ajax({
            url: "/kleinerzeugernetzwerk/controller/details.php",    //the page containing php script
            type: "POST",
            beforeSend: function(){
                $("#category-loading").show();
                $("#category-icon").hide();　
            },
            complete: function(){
                $("#category-loading").hide();
                $("#category-icon").show();
            },
            headers: {
                'action': 'CATEGORIES',
            },
            data: { map_boundary: boundEnvelope },
            success:function(result){
                console.log(result)
                const categories = JSON.parse(result) ? JSON.parse(result) : [];
                setCategoryFilter(categories);
            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });
    }

/*
    FUNCTION    :   show products from a production point on sidebar 
                    when user clicks on a production point on map
    INPUT       :   id of production point
    OUTPUT      :   list of products
*/
    function showProductsInProductionPoint(){
        console.log('farming location clicked')
        const farmId = $("#productionPointLoc").data("id")
        console.log(farmId)
        getProductsFromFarmLand(farmId);
    }


/*
    FUNCTION    :   ajax call to get list of products from a production point
    INPUT       :   id of production point
    OUTPUT      :   list of products
*/
    function getProductsFromFarmLand(farmId){
        const userId = localStorage.getItem('userId');
        document.getElementById("productList").innerHTML = "";
        $.ajax({
            type: "GET",
            url: "/kleinerzeugernetzwerk/controller/productController.php",
            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
            },
            data: { productionLocationId: farmId },
            dataType: "json",
            contentType: "application/json",
            cache: false,
            success: function( data ) {
                if (data != null && data.length !== 0){

                    data.forEach(product => {
                        const productName = product.product_name;
                        const productDesc = product.product_description;
                        const productCategory = product.product_category;

                        const productListDiv = `<li class="">
<div>
<div class="overflow-hidden" width="100%">
<img src="/kleinerzeugernetzwerk/images/default_products.jpg" alt="" width="240" class="img-rounded">
    </div>
<div>
<h3>${productName}</h3>
<p>${productDesc}</p>
<p>${productCategory}</p>
<div class="row p-3">
<p>Feature 1</p>
<p>Feature 2</p>
<p>Feature 3</p>
<p>Feature 4</p>
    </div>
    </div>
    </div>
    </li>`;

                        document.getElementById("productList").innerHTML += productListDiv;
                    })

                    sidebar.toggle();
                }else{

                }


            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });
    }




    //Functions related to arrows for showing directions on connection between selling point and production point

    function getArrows(arrLatlngs, color, arrowCount, mapObj) {

        if (typeof arrLatlngs === undefined || arrLatlngs == null ||    
            (!arrLatlngs.length) || arrLatlngs.length < 2)          
            return [];

        if (typeof arrowCount === 'undefined' || arrowCount == null)
            arrowCount = 1;

        if (typeof color === 'undefined' || color == null)
            color = '';
        else
            color = 'color:' + color;

        var result = [];
        for (var i = 1; i < arrLatlngs.length; i++) {
            var icon = L.divIcon({ className: 'arrow-icon', bgPos: [5, 5], html: '<div style="' + color + ';transform: rotate(' + getAngle(arrLatlngs[i - 1], arrLatlngs[i], -1).toString() + 'deg)">▶</div>' });
            for (var c = 1; c <= arrowCount; c++) {
                result.push(L.marker(myMidPoint(arrLatlngs[i], arrLatlngs[i - 1], (c / (arrowCount + 1)), mapObj), { icon: icon }));
            }
        }
        return result;
    }

    function getAngle(latLng1, latlng2, coef) {
        var dy = latlng2[0] - latLng1[0];
        var dx = Math.cos(Math.PI / 180 * latLng1[0]) * (latlng2[1] - latLng1[1]);
        var ang = ((Math.atan2(dy, dx) / Math.PI) * 180 * coef);
        return (ang).toFixed(2);
    }

    function myMidPoint(latlng1, latlng2, per, mapObj) {
        if (!mapObj)
            throw new Error('map is not defined');

        var halfDist, segDist, dist, p1, p2, ratio,
            points = [];

        p1 = mapObj.project(new L.latLng(latlng1));
        p2 = mapObj.project(new L.latLng(latlng2));

        halfDist = distanceTo(p1, p2) * per;

        if (halfDist === 0)
            return mapObj.unproject(p1);

        dist = distanceTo(p1, p2);

        if (dist > halfDist) {
            ratio = (dist - halfDist) / dist;
            var res = mapObj.unproject(new Point(p2.x - ratio * (p2.x - p1.x), p2.y - ratio * (p2.y - p1.y)));
            return [res.lat, res.lng];
        }

    }

    function distanceTo(p1, p2) {
        var x = p2.x - p1.x,
            y = p2.y - p1.y;

        return Math.sqrt(x * x + y * y);
    }

    function toPoint(x, y, round) {
        if (x instanceof Point) {
            return x;
        }
        if (isArray(x)) {
            return new Point(x[0], x[1]);
        }
        if (x === undefined || x === null) {
            return x;
        }
        if (typeof x === 'object' && 'x' in x && 'y' in x) {
            return new Point(x.x, x.y);
        }
        return new Point(x, y, round);
    }

    function Point(x, y, round) {
        this.x = (round ? Math.round(x) : x);
        this.y = (round ? Math.round(y) : y);
    }
</script>


<style>

    body > #sidebar {
        display: none;
    }
    body {
        padding: 0;
        margin: 0;
    }

    #productTitle{
        font-size: 15px;
        font-weight: bold;
    }

    .custom-popup {
        border-radius: 2px;
        color: #504e4e;
        font-family: 'Molengo', sans-serif;
        font-size: 12px;
        line-height: 10px;
        height: 10 px ;
        max-height: 300px;
    }

    .custom-popup, .leaflet-popup-tip {
        background: #e7e7e7;
        border: none;
        box-shadow: none;
    }

    .leaflet-popup-content-wrapper {
        background: #e7e7e7;
        border-radius: 2px;
    }

    .leaflet-popup {
        position: absolute;
        text-align: center;
    }

    .leaflet-popup-content {
        margin-top: 20px;
        margin-right: 2px;
        padding-right: 12px;
        min-width: 100 px !important;
        max-height: 300px;
        overflow: auto;
    }

</style>