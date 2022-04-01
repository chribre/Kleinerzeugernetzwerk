<?php
/****************************************************************
   FILE             :   productionPointMap.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   leaflet map using mapbox for geocoding and reverse to add/edit production location
****************************************************************/
?>
<div id="sellerMap"></div>
<style>
    #sellerMap { 
        height: 300px; 
    }
</style>
<script>

    // initialize the map
    var sellerMap = L.map('sellerMap').setView([53.55657001703077, 13.246793875395099], 12);
         
    sellerMap.on('click', onSellerMapClick);

    // load a tile layer
    //    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZnJlZHl0aGVra2Vra2FyYSIsImEiOiJja2hybmpxaDMxd2VsMzJteGxhNW1oa3lpIn0.Ca1L1-selQY4MnJB_p9-7Q', {
    //        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //        maxZoom: 20,
    //        id: 'mapbox/light-v10',
    //        tileSize: 512,
    //        zoomOffset: -1,
    //        accessToken: 'your.mapbox.access.token'
    //    }).addTo(sellerMap);

    var CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });


    CartoDB_Positron.addTo(sellerMap);

    var popup = L.popup();
    
    window.setTimeout(function() {
        sellerMap.invalidateSize();
    }, 4000);
    
/*
    FUNCTION    :   function returns address of latitude and logitude from osm using nominatim : geocoding
    INPUT       :   event containing latitude and longitude
    OUTPUT      :   display address on fields
*/
    function onSellerMapClick(e) {
        const lat = e.latlng.lat;
        const lon = e.latlng.lng;
        var displayAddr = 'Address not found!'
        let url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=27&addressdetails=1`
        fetch(url)
            .then(response => response.json())
            .then(data => {
            console.log(data)
            if (data != null){
                let street = data.address.road ? data.address.road : '';
                let houseNum = data.address.house_number ? data.address.house_number : '';
                let city = data.address.city ? data.address.city : '';
                let zip = data.address.postcode ? data.address.postcode : '';
                
                displayAddr = data.display_name ? data.display_name : displayAddr;

                console.log(street)
                console.log(houseNum)
                console.log(city)
                console.log(zip)



                document.getElementById("sp_street").value = street;
                document.getElementById("sp_houseNumber").value = houseNum;
                document.getElementById("sp_zipCode").value = zip;
                document.getElementById("sp_city").value = city;

                document.getElementById('sp_latitude').value = lat;
                document.getElementById('sp_longitude').value = lon;
                
                popup.setContent(displayAddr)
            }else{
                document.getElementById('sp_latitude').value = "";
                document.getElementById('sp_longitude').value = "";
            }
        })
            .catch(err => console.warn(err.message));


        popup
            .setLatLng(e.latlng)
            .setContent(displayAddr)
            .openOn(sellerMap);
    }

/*
    FUNCTION    :   find geolocation from address
    INPUT       :   house number, street, city, zip
    OUTPUT      :   display address on map
*/
    function findSllerLocation() {

        const houseNumber = document.getElementById("sp_houseNumber").value
        const street = houseNumber + " " + document.getElementById("sp_street").value;
        const city = document.getElementById("sp_city").value;
        const zip = document.getElementById("sp_zipCode").value;

        var displayAddr = 'Address not found!'
        let url = `https://nominatim.openstreetmap.org/search?format=json&street=${street}&city=${city}&postalcode=${zip}&zoom=27&addressdetails=1`
        fetch(url)
            .then(response => response.json())
            .then(data => {
            console.log(data)


            if (data.length > 0){
                let latitude = data[0].lat
                let longitude = data[0].lon
                let address = data[0].address
                displayAddr = data[0].display_name ? data[0].display_name : displayAddr;
                console.log(latitude)
                console.log(longitude)

                let latlong = {lat: latitude, lng: longitude}
                
                
                popup
                    .setLatLng(latlong)
                    .setContent(displayAddr)
                    .openOn(sellerMap);
                document.getElementById('sp_latitude').value = latitude;
                document.getElementById('sp_longitude').value = longitude;
            }else{
                document.getElementById('sp_latitude').value = "";
                document.getElementById('sp_longitude').value = "";
            }

        })
            .catch(err => console.warn(err.message));
    }


/*
    FUNCTION    :   set location marker on map when an address is identified
    INPUT       :   longitude, atitude
    OUTPUT      :   display address on map
*/
    function setSellerLocationOnMap(){
        const point_latitude = document.getElementById('sp_latitude').value;
        const point_longitude = document.getElementById('sp_longitude').value;
        if (point_latitude && point_longitude){
            const point_latlong = {lat: point_latitude, lng: point_longitude}
            popup
                .setLatLng(point_latlong)
                .setContent("You clicked the map at " + point_latlong.toString())
                .openOn(sellerMap);
        }
    }

</script>

