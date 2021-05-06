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


<link rel="stylesheet" type="text/css" href="<?php echo $leaflet_sidebar_css ?>" />
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/production_point_api/production_point_api.js"></script>
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
</style>


<script src="<?php echo $leaflet_sidebar_js ?>"></script>


<div id="mapid" class="full-height"></div>



<!--

<div id="mapSidebar">
<ul style="list-style-type: none; padding: 0" class="mx-auto" id="productList">
<li class="">
<div>
<div class="overflow-hidden" width="100%">
<img src="/kleinerzeugernetzwerk/images/default_products.jpg" alt="" width="240" class="img-rounded">
</div>
<div>
<h3>Product Name</h3>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<p>Category Name</p>
<div class="row p-3">
<p>Feature 1</p>
<p>Feature 2</p>
<p>Feature 3</p>
<p>Feature 4</p>
</div>
</div>
</div>
</li>
</ul>
</div>

-->

<div class="p-0" id="mapSidebar">




    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" width="100%" height="220px"  style="object-fit: cover;" alt="">
    <div class="p-2">
        <h4>John Doe James</h4>
        <p class="text-dark cst-desc">In the tranquil idyll of the family game My Farm Shopplayers can experience just that without leaving their home. In turn, three dice are thrown each turn. The active player uses one die to choose a new expansion for his farm. The combination of the other two dice determines which field is activated on the farm - not only for the active player, but also for everyone else. The extensions improve the actions with which the players milk cows, shear sheep, harvest honey or collect eggs. These raw materials can then be sold. Whoever made the most money in the end wins.</p>

        <div class="row px-4 align-items-center justify-content-between">
            <div class="">
                <h5>+91 9846 194 609</h5>
                <h5>knfse@gmail.com</h5>
            </div>
            <div class="row justify-content-around">
                <img class="rounded-circle" src="https://image.flaticon.com/icons/png/128/1384/1384053.png" id="socialImage" alt="">
                <img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/1384/1384065.svg?token=exp=1619102216~hmac=5208539dcadea913c800c5be1ae781bd" id="socialImage" alt="">
                <img class="rounded-circle" src="https://www.flaticon.com/svg/vstatic/svg/1384/1384055.svg?token=exp=1619102525~hmac=05c3613c4bd211205f4445a5e04188b2" id="socialImage" alt="">
            </div>
            <div>
                <p class="text-dark">20 products</p>
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
                        <div>
                            <h5 class="text-white align-self-center">Bio Markt</h5>
                        </div>

                    </div>
                    <div class="row rounded-pill mb-1 cst-bg-gray">
                        <div>
                            <img class="cst-feature-images rounded-circle m-1" src="https://www.eu-startups.com/wp-content/uploads/2020/05/supermarket-vegetables-fruits.jpg" alt="">
                        </div>
                        <div>
                            <h5 class="text-white align-self-center">Bio Markt</h5>
                        </div>

                    </div>
                    <div class="row rounded-pill mb-1 cst-bg-gray">
                        <div>
                            <img class="cst-feature-images rounded-circle m-1" src="https://www.eu-startups.com/wp-content/uploads/2020/05/supermarket-vegetables-fruits.jpg" alt="">
                        </div>
                        <div>
                            <h5 class="text-white align-self-center">Bio Markt</h5>
                        </div>

                    </div>
                    <div class="row rounded-pill mb-1 cst-bg-gray">
                        <div>
                            <img class="cst-feature-images rounded-circle m-1" src="https://www.eu-startups.com/wp-content/uploads/2020/05/supermarket-vegetables-fruits.jpg" alt="">
                        </div>
                        <div>
                            <h5 class="text-white align-self-center">Bio Markt</h5>
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








    $(document).ready(function(){
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
            success:function(result){
                console.log(result)
                products = {
                    "type": "FeatureCollection",
                    "features": []
                }
                const jsonData = JSON.parse(result) ? JSON.parse(result) : [];
                const sellerData = jsonData.sellers ? jsonData.sellers : [];
                const productionPointData = jsonData.productionPoints ? jsonData.productionPoints : [];
                if (productionPointData.length > 0){
                    addProductionPointsToMap(productionPointData);
                }
                if (sellerData.length > 0){
                    addSellersToMap(sellerData);
                }
            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });
    });



    function addProductionPointsToMap(productionPoints){
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
            const imagePath = productionPoint.image_path ? productionPoint.image_path : ''

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


            //            const farmPopupContent = `<a data-id="${productionPointId}" style="text-decoration: none" id="productionPointLoc" onclick='return showProductsInProductionPoint()'><div class="d-inline-flex m-1 p-1"> <img src="${imagePath}" alt="" width="90px" height="60px" style="object-fit: cover;" class="m-auto"> <div class="pl-2"> <div id="productTitle">${productionPointName}</div> <div>${productionPointAddress}</div> </div> </div></a>`;
            const farmPopupContent = `<a data-id="${productionPointId}" onclick="viewProductionPointInDetail(${productionPointId}, listproductsOnSideBar)" style="text-decoration: none" id="productionPointLoc"><div class="d-inline-flex m-1 p-1"> <img src="${imagePath}" alt="" width="90px" height="60px" style="object-fit: cover;" class="m-auto"> <div class="pl-2"> <div id="productTitle">${productionPointName}</div> <div>${productionPointAddress}</div> </div> </div></a>`;




            if (productionPointMarker.features.some((e) => {
                console.log(e.geometry)
                return JSON.stringify(e.geometry) === JSON.stringify(geom)
            })) {
                console.log('Exists');
                productionPointMarker.features.some((feats) => {
                    feats.properties.popupContent += farmPopupContent   
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
                productionPointMarker.features = [...productionPointMarker.features, tempProductionPoint];
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
            const imagePath = sellingPoint.image_path ? sellingPoint.image_path : ''


            const productionPointIds = sellingPoint.production_points ? sellingPoint.production_points : '';
            const productionPointIdArray = createArrayFromString(productionPointIds);

            if (productionPointIdArray.length > 0){
                $.each(productionPointIdArray,function(index,id){
                    const productionPointLoc = productionPointLocations[id] ? productionPointLocations[id] : {};
                    const productionPointLat = productionPointLoc.latitude ? productionPointLoc.latitude : null;
                    const productionPointLong = productionPointLoc.longitude ? productionPointLoc.longitude : null;
                    if (productionPointLat > 0 && productionPointLong > 0 && latitude > 0 && longitude > 0){
                        createConnectionBetweenSellerAndProductionPoint(latitude, longitude, productionPointLat, productionPointLong);
                    }
                })
            }


            const geom = {
                "type": "Point",
                "coordinates": [
                    longitude, latitude
                ]
            }


            const sellerPopupContent = `<a data-id="${sellerId}" style="text-decoration: none" id="sellerLoc" onclick='return 'seler details'><div class="d-inline-flex m-1 p-1"> <img src="${imagePath}" alt="" width="90px" height="60px" style="object-fit: cover;" class="m-auto"> <div class="pl-2"> <div id="sellerTitle">${sellerName}</div> <div>${sellerAddress}</div> </div> </div></a>`;




            if (sellingPointMarker.features.some((e) => {
                console.log(e.geometry)
                return JSON.stringify(e.geometry) === JSON.stringify(geom)
            })) {
                console.log('Exists');
                sellingPointMarker.features.some((feats) => {
                    feats.properties.popupContent += sellerPopupContent   
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
                sellingPointMarker.features = [...sellingPointMarker.features, tempSellingPoint];
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





    function createArrayFromString(stringValues){
        var array = stringValues.split(',') ? stringValues.split(',') : [];
        return array;
    }



    function createConnectionBetweenSellerAndProductionPoint(latseller, longseller, latProductionPoint, longProductionPoint){
        var pointA = new L.LatLng(latseller, longseller);
        var pointB = new L.LatLng(latProductionPoint, longProductionPoint);
        var pointList = [pointA, pointB];

        var connectingPolyline = new L.Polyline(pointList, {
            color: '#adb5bd',
            weight: 2,
            opacity: 1,
            smoothFactor: 1
        });
        connectingPolyline.addTo(mymap);

        //        L.featureGroup(getArrows(pointList, 'red', 6,mymap)).addTo(mymap);
    }



    //
    //
    //
    //    $(document).ready(function(){
    //        $.ajax({
    //            url:"/kleinerzeugernetzwerk/src/getProductsToMap.php",    //the page containing php script
    //            type: "get",    //request type,
    //            contentType: "application/json",
    //            dataType: 'json',
    //            success:function(result){
    //                console.log(result)
    //                products = {
    //                    "type": "FeatureCollection",
    //                    "features": []
    //                }
    //                $.each(result,function(i,obj){
    //                    console.log(obj)
    //                    const productName = obj.product_name;
    //                    const productDesc = obj.product_description;
    //                    const productAddr = obj.farm_address;
    //                    const latitude = parseFloat(obj.Lat);
    //                    const longitude = parseFloat(obj.Lon);
    //                    const productId = parseInt(obj.product_id);
    //
    //
    //
    //                    const farmId = obj.farm_id;
    //                    const farmName = obj.farm_name;
    //                    const farmAddress = obj.farm_address;
    //
    //                    const geom = {
    //                        "type": "Point",
    //                        "coordinates": [
    //                            longitude, latitude
    //                        ]
    //                    }
    //
    //                    const farmPopupContent = `<a data-id="${farmId}" style="text-decoration: none" id="productionPointLoc" onclick='return showProductsInProductionPoint()'><div class="d-inline-flex m-1 p-1"> <img src="<?php echo $imagePath ?>" alt="" width="90" height="60" class="m-auto"> <div class="pl-2"> <div id="productTitle">${farmName}</div> <div>${farmAddress}</div> </div> </div></a>`
    //
    //                    if (products.features.some((e) => {
    //                        console.log(e.geometry)
    //                        return JSON.stringify(e.geometry) === JSON.stringify(geom)
    //                    })) {
    //                        console.log('Exists');
    //                        products.features.some((feats) => {
    //                            feats.properties.popupContent += farmPopupContent   
    //                        })
    //                    }else{
    //                        const tempProductPoints = {
    //                            "geometry": {
    //                                "type": "Point",
    //                                "coordinates": [
    //                                    longitude, latitude
    //                                ]
    //                            },
    //                            "type": "Feature",
    //                            "properties": {
    //                                "popupContent": farmPopupContent
    //                            },
    //                            "id": productId
    //                        };
    //                        products.features = [...products.features, tempProductPoints];
    //                    }
    //                })
    //                console.log(products)
    //                L.geoJSON([products], {
    //
    //                    style: function (feature) {
    //                        return feature.properties && feature.properties.style;
    //                    },
    //
    //                    onEachFeature: onEachFeature,
    //
    //                    pointToLayer: function (feature, latlng) {
    //                        return L.circleMarker(latlng, {
    //                            radius: 6,
    //                            fillColor: "#ff7800",
    //                            color: "#000",
    //                            weight: 1,
    //                            opacity: 1,
    //                            fillOpacity: 0.8
    //                        });
    //                    }
    //                }).addTo(mymap);
    //            },
    //            error: function (request, status, error) {
    //                alert(request.responseText);
    //                console.log(error)
    //            }
    //        });
    //    });





    // initialize the map
    var mymap = L.map('mapid').setView([53.55657001703077, 13.246793875395099], 15);

    // load a tile layer
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZnJlZHl0aGVra2Vra2FyYSIsImEiOiJja2hybmpxaDMxd2VsMzJteGxhNW1oa3lpIn0.Ca1L1-selQY4MnJB_p9-7Q', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/light-v10',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

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

    var marker = L.marker([51.2, 7]).addTo(mymap).on('click', function () {
        sidebar.toggle();
    });

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



    function showProductsInProductionPoint(){
        console.log('farming location clicked')
        const farmId = $("#productionPointLoc").data("id")
        console.log(farmId)
        getProductsFromFarmLand(farmId);
    }



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