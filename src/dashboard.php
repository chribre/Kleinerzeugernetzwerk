<?php 
/****************************************************************
   FILE             :   dashboard.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   side bar of the dashbord is incorporated here
                        controls are defined in assets/components/sideBar.php
****************************************************************/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/sideBar.php");
?>
 
<script>
    window.onload = function() {
        setLoginOrProfileButton();
        const url = window.location.href;
        const params = parseURLParams(url);
        const menu = params['menu'];
        const data = params['data'];

        if (menu == 'profile' && data == 'personal'){
            getUserDetails();
        }else if (menu == 'profile' && data == 'productionPoint'){
            getAllProductionPoint();
        }else if (menu == 'profile' && data == 'seller'){
            getAllSellers();
        }
    };


    function getUserDetails(){
        const userId = localStorage.getItem('userId')

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/userController.php",

            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
                'action': "READ"
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: { 
                user_id: userId,
            },
            success: function( data ) {
                console.log(data)
                const userDetails = JSON.parse(data);
                setProfileDeatils(userDetails);
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }

    function setProfileDeatils(userDetails){
        document.getElementById("fullName").innerHTML = fetchFullName(userDetails);
        document.getElementById("address").innerHTML = formatAddress(userDetails);
        document.getElementById("phoneNumber").innerHTML = userDetails.phone ? userDetails.phone : "";
        document.getElementById("mobileNumber").innerHTML = userDetails.mobile ? userDetails.mobile : "";
        document.getElementById("emailAddress").innerHTML = userDetails.email ? userDetails.email : "";
        document.getElementById("aboutMe").innerHTML = userDetails.description ? userDetails.description : "";
        document.getElementById("profileImage").src=userDetails.imagePath ? userDetails.imagePath : "";
    }

    function fetchFullName(data){
        const firstname = data.firstName ? data.firstName : "";
        const middlename = data.middleName ? data.middleName : "";
        const lastname = data.lastName ? data.lastName : "";

        return firstname + ' ' + middlename + ' ' + lastname;
    }

    function formatAddress(data){
        const street = data.street ? data.street : "";
        const houseNum = data.houseNumber ? data.houseNumber : "";
        const zip = data.zip ? data.zip : "";
        const city = data.city ? data.city : "";
        const country = data.country ? data.country : "";
        
        return (street + ", " + houseNum + "\n" + zip + " " + city + "\n" + country);
    }
    function parseURLParams(url) {
        var queryStart = url.indexOf("?") + 1,
            queryEnd   = url.indexOf("#") + 1 || url.length + 1,
            query = url.slice(queryStart, queryEnd - 1),
            pairs = query.replace(/\+/g, " ").split("&"),
            parms = {}, i, n, v, nv;

        if (query === url || query === "") return;

        for (i = 0; i < pairs.length; i++) {
            nv = pairs[i].split("=", 2);
            n = decodeURIComponent(nv[0]);
            v = decodeURIComponent(nv[1]);

            if (!parms.hasOwnProperty(n)) parms[n] = [];
            parms[n].push(nv.length === 2 ? v : null);
        }
        return parms;
    }
    
    
    function getAllProductionPoint(){
        const formData = fetchProductionPointFormData();
        const userId = localStorage.getItem('userId');

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/productionPointController.php",

            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
                'action': "READ_ALL"
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: { 
                producer_id: userId
            },
            success: function( data ) {
                console.log(data)
                const productionPoints = JSON.parse(data);
                listAllProductionPoints(productionPoints);
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }
    
    
</script>




<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>