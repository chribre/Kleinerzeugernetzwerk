<?php
/****************************************************************
   FILE             :   productionPointMap.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   leaflet map using mapbox for geocoding and reverse to add/edit production location
****************************************************************/
?>
<div id="productionPointMap"></div>
<script>

    // initialize the map
    var mymap = L.map('productionPointMap').setView([53.55657001703077, 13.246793875395099], 15);
    mymap.on('click', onMapClick);

    // load a tile layer    
    var CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });
    
    
    CartoDB_Positron.addTo(mymap);

    var popup = L.popup();
    window.setTimeout(function() {
        mymap.invalidateSize();
    }, 4000);
    
/*
    FUNCTION    :   function returns address of latitude and logitude from osm using nominatim : geocoding
    INPUT       :   event containing latitude and longitude
    OUTPUT      :   display address on fields
*/
    function onMapClick(e) {
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



                document.getElementById("street").value = street;
                document.getElementById("houseNumber").value = houseNum;
                document.getElementById("zipCode").value = zip;
                document.getElementById("city").value = city;

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;
                
                popup.setContent(displayAddr)
            }else{
                document.getElementById('latitude').value = "";
                document.getElementById('longitude').value = "";
            }
        })
            .catch(err => console.warn(err.message));


        popup
            .setLatLng(e.latlng)
            .setContent(displayAddr)
            .openOn(mymap);
    }


/*
    FUNCTION    :   find geolocation from address
    INPUT       :   house number, street, city, zip
    OUTPUT      :   display address on map
*/
    function findLocation() {

        const houseNumber = document.getElementById("houseNumber").value
        const street = houseNumber + " " + document.getElementById("street").value;
        const city = document.getElementById("city").value;
        const zip = document.getElementById("zipCode").value;
        
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
                    .openOn(mymap);
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            }else{
                document.getElementById('latitude').value = "";
                document.getElementById('longitude').value = "";
            }

        })
            .catch(err => console.warn(err.message));
    }


/*
    FUNCTION    :   set location marker on map when an address is identified
    INPUT       :   longitude, atitude
    OUTPUT      :   display address on map
*/
    function setproductionPointLocationOnMap(){
        const point_latitude = document.getElementById('latitude').value;
        const point_longitude = document.getElementById('longitude').value;
        if (point_latitude && point_longitude){
            const point_latlong = {lat: point_latitude, lng: point_longitude}
            popup
                .setLatLng(point_latlong)
                .setContent("You clicked the map at " + point_latlong.toString())
                .openOn(mymap);
        }
    }

</script>

<style>
    #productionPointMap { 
        height: 300px; 
    }
</style>