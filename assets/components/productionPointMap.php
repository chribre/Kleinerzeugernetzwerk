<div id="productionPointMap"></div>
<script>

    // initialize the map
    var mymap = L.map('productionPointMap').setView([53.55657001703077, 13.246793875395099], 15);
    mymap.on('click', onMapClick);

    // load a tile layer
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZnJlZHl0aGVra2Vra2FyYSIsImEiOiJja2hybmpxaDMxd2VsMzJteGxhNW1oa3lpIn0.Ca1L1-selQY4MnJB_p9-7Q', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/light-v10',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
    
    var popup = L.popup();

    //    function returns address of latitude and logitude from osm using nominatim : geocoding
    function onMapClick(e) {
        const lat = e.latlng.lat;
        const lon = e.latlng.lng;
        let url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=27&addressdetails=1`
        fetch(url)
            .then(response => response.json())
            .then(data => {
            console.log(data)
            if (data != null){
                let street = data.address.road
                let houseNum = data.address.house_number
                let city = data.address.town
                let zip = data.address.postcode
                
                console.log(street)
                console.log(houseNum)
                console.log(city)
                console.log(zip)
                
                
                document.getElementById("validationCustom03").value = street;
                document.getElementById("validationCustom04").value = houseNum;
                document.getElementById("validationCustom05").value = zip;
                document.getElementById("validationCustom06").value = city;
                
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;
            }else{
                document.getElementById('latitude').value = "";
                document.getElementById('longitude').value = "";
            }
        })
            .catch(err => console.warn(err.message));


        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(mymap);
    }

    //    document.getElementById("locateOnMapBtn").onclick(function(){
    //        findLocation();
    //    });

    function findLocation() {

        const houseNumber = document.getElementById("validationCustom04").value
        const street = houseNumber + " " + document.getElementById("validationCustom03").value;
        const city = document.getElementById("validationCustom06").value;
        const zip = document.getElementById("validationCustom05").value;

        let url = `https://nominatim.openstreetmap.org/search?format=json&street=${street}&city=${city}&postalcode=${zip}&zoom=27&addressdetails=1`
        fetch(url)
            .then(response => response.json())
            .then(data => {
            console.log(data)


            if (data.length > 0){
                let latitude = data[0].lat
                let longitude = data[0].lon
                let address = data[0].address
                console.log(latitude)
                console.log(longitude)
                
                let latlong = {lat: latitude, lng: longitude}
                popup
            .setLatLng(latlong)
            .setContent("You clicked the map at " + latlong.toString())
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



</script>

<style>
    #productionPointMap { 
        height: 300px; 
    }
</style>