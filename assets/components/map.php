<div id="mapid" class="full-height"></div>

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


                $.each(result,function(i,obj){
                    console.log(obj)
                    const productName = obj.product_name;
                    const productDesc = obj.product_description;
                    const latitude = parseFloat(obj.Lat);
                    const longitude = parseFloat(obj.Lon);
                    const productId = parseInt(obj.product_id);
                    const tempProductPoints = {
                        "geometry": {
                            "type": "Point",
                            "coordinates": [
                                longitude, latitude
                            ]
                        },
                        "type": "Feature",
                        "properties": {
                            "popupContent": productName
                        },
                        "id": productId
                    };
                    products.features = [...products.features, tempProductPoints];
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



    console.log(bicycleRental)

    function onEachFeature(feature, layer) {
        var popupContent = "<p>I started out as a GeoJSON " +
            feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

        if (feature.properties && feature.properties.popupContent) {
            popupContent += feature.properties.popupContent;
        }

        layer.bindPopup(popupContent);
    }
</script>