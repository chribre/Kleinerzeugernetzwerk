<?php
$leaflet_sidebar_css = "/kleinerzeugernetzwerk/assets/leaflet_sidebar/L.Control.Sidebar.css";
$leaflet_sidebar_js = "/kleinerzeugernetzwerk/assets/leaflet_sidebar/L.Control.Sidebar.js";
$imagePath = "/kleinerzeugernetzwerk/images/default_products.jpg";

?>


<link rel="stylesheet" type="text/css" href="<?php echo $leaflet_sidebar_css ?>" />
<script src="<?php echo $leaflet_sidebar_js ?>"></script>


<div id="mapid" class="full-height"></div>




<div id="mapSidebar">
    <h1>leaflet-sidebar</h1>
</div>

<script>

    var products = {
        "type": "FeatureCollection",
        "features": []
    }
    $(document).ready(function(){
        $.ajax({
            url:"/kleinerzeugernetzwerk/src/getProductsToMap.php",    //the page containing php script
            type: "get",    //request type,
            contentType: "application/json",
            dataType: 'json',
            success:function(result){
                console.log(result)
                products = {
                    "type": "FeatureCollection",
                    "features": []
                }
                $.each(result,function(i,obj){
                    console.log(obj)
                    const productName = obj.product_name;
                    const productDesc = obj.product_description;
                    const productAddr = obj.farm_address;
                    const latitude = parseFloat(obj.Lat);
                    const longitude = parseFloat(obj.Lon);
                    const productId = parseInt(obj.product_id);
                    
                    
                    
                    const farmId = obj.farm_id;
                    const farmName = obj.farm_name;
                    const farmAddress = obj.farm_address;

                    const geom = {
                        "type": "Point",
                        "coordinates": [
                            longitude, latitude
                        ]
                    }
                    
                    const farmPopupContent = `<a data-id="${farmId}" style="text-decoration: none" id="productionPointLoc" onclick='return showProductsInProductionPoint()'><div class="d-inline-flex m-1 p-1"> <img src="<?php echo $imagePath ?>" alt="" width="90" height="60" class="m-auto"> <div class="pl-2"> <div id="productTitle">${farmName}</div> <div>${farmAddress}</div> </div> </div></a>`

                    if (products.features.some((e) => {
                        console.log(e.geometry)
                        return JSON.stringify(e.geometry) === JSON.stringify(geom)
                    })) {
                        console.log('Exists');
                        products.features.some((feats) => {
                            feats.properties.popupContent += farmPopupContent   
                        })
                    }else{
                        const tempProductPoints = {
                            "geometry": {
                                "type": "Point",
                                "coordinates": [
                                    longitude, latitude
                                ]
                            },
                            "type": "Feature",
                            "properties": {
                                "popupContent": farmPopupContent



                                //                            "popupContent": '<div class="container bg-secondary"> <div class="row bg-success"> <div class="col-xs bg-warning"> 1 of 2 </div> <div class="col-xs">University of Neubrandenburg, Brodaer Straße 2, 17033 Neubrandenburg</div> </div> <div class="row"> <div class="col"> 1 of 3 </div> <div class="col"> 2 of 3 </div> <div class="col"> 3 of 3 </div> </div></div>'



                                //                            "popupContent": '<div id="block_container" class=""> <img id="bloc1" src="<?php echo $imagePath ?>" alt="" width="80" height="50" class=""> <div id="bloc2" class=""> <div>Farm Land</div> <div>University of Neubrandenburg, Brodaer Straße 2, 17033 Neubrandenburg</div> </div> </div>'
                            },
                            "id": productId
                        };
                        products.features = [...products.features, tempProductPoints];
                    }



                    //                    const tempProductPoints = {
                    //                        "geometry": {
                    //                            "type": "Point",
                    //                            "coordinates": [
                    //                                longitude, latitude
                    //                            ]
                    //                        },
                    //                        "type": "Feature",
                    //                        "properties": {
                    //                            "popupContent": `<div class="d-inline-flex"> <img src="<?php echo $imagePath ?>" alt="" width="90" height="60" class="m-auto"> <div class="pl-2"> <div id="productTitle">${productName}</div> <div>${productAddr}</div> </div> </div>`
                    //
                    //
                    //
                    //                            //                            "popupContent": '<div class="container bg-secondary"> <div class="row bg-success"> <div class="col-xs bg-warning"> 1 of 2 </div> <div class="col-xs">University of Neubrandenburg, Brodaer Straße 2, 17033 Neubrandenburg</div> </div> <div class="row"> <div class="col"> 1 of 3 </div> <div class="col"> 2 of 3 </div> <div class="col"> 3 of 3 </div> </div></div>'
                    //
                    //
                    //
                    //                            //                            "popupContent": '<div id="block_container" class=""> <img id="bloc1" src="<?php echo $imagePath ?>" alt="" width="80" height="50" class=""> <div id="bloc2" class=""> <div>Farm Land</div> <div>University of Neubrandenburg, Brodaer Straße 2, 17033 Neubrandenburg</div> </div> </div>'
                    //                        },
                    //                        "id": productId
                    //                    };
                    //                    products.features = [...products.features, tempProductPoints];
                })
                console.log(products)
                L.geoJSON([products], {

                    style: function (feature) {
                        return feature.properties && feature.properties.style;
                    },

                    onEachFeature: onEachFeature,

                    pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, {
                            radius: 6,
                            fillColor: "#ff7800",
                            color: "#000",
                            weight: 1,
                            opacity: 1,
                            fillOpacity: 0.8
                        });
                    }
                }).addTo(mymap);
            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });
    });





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
        position: 'left'
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
        $.ajax({
                type: "GET",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                data: { productionLocationId: farmId },
                dataType: "json",
                contentType: "application/json",
                cache: false,
                success: function( data ) {
                    if (data != null && data.length !== 0){
                        sidebar.toggle();
                    }


                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                    $('#addNewProduct').modal('toggle');
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