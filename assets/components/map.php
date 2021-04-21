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
<script src="<?php echo $leaflet_sidebar_js ?>"></script>


<div id="mapid" class="full-height"></div>




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


            const farmPopupContent = `<a data-id="${productionPointId}" style="text-decoration: none" id="productionPointLoc" onclick='return showProductsInProductionPoint()'><div class="d-inline-flex m-1 p-1"> <img src="${imagePath}" alt="" width="90px" height="60px" style="object-fit: cover;" class="m-auto"> <div class="pl-2"> <div id="productTitle">${productionPointName}</div> <div>${productionPointAddress}</div> </div> </div></a>`;




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