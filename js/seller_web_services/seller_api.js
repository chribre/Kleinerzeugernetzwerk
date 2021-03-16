/****************************************************************
   FILE             :   seller_api.js
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   javaScript functions for CRUD operations in seller module
****************************************************************/

function createSeller() {
    const userId = localStorage.getItem('userId');
    const sellerFormData = fetchSellerFormData()
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

        headers: {
            'access-token': localStorage.getItem('token'),
            'user_id': userId,
            'action': "CREATE"
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { 

            producer_id: userId, 
            seller_name: sellerFormData.sellingPointName, 
            seller_description: sellerFormData.sellingPointDesc, 
            street: sellerFormData.sp_street, 
            building_number: sellerFormData.sp_houseNumber, 
            city: sellerFormData.sp_city, 
            zip: sellerFormData.sp_zipCode, 
            latitude: sellerFormData.sp_latitude, 
            longitude: sellerFormData.sp_longitude,
            seller_email: sellerFormData.sp_email, 
            seller_website: sellerFormData.sp_website, 
            mobile: sellerFormData.sp_mobile, 
            phone: sellerFormData.sp_phone, 
            is_blocked: false, 
            is_mon_available: checkboxStatus(sellerFormData.mon_switch), mon_open_time: sellerFormData.mon_openHourTxt, mon_close_time: sellerFormData.mon_closeHourTxt, 
            is_tue_available: checkboxStatus(sellerFormData.tue_switch), tue_open_time: sellerFormData.tue_openHourTxt, tue_close_time: sellerFormData.tue_closeHourTxt, 
            is_wed_available: checkboxStatus(sellerFormData.wed_switch), wed_open_time: sellerFormData.wed_openHourTxt, wed_close_time: sellerFormData.wed_closeHourTxt, 
            is_thu_available: checkboxStatus(sellerFormData.thu_switch), thu_open_time: sellerFormData.thu_openHourTxt, thu_close_time: sellerFormData.thu_closeHourTxt, 
            is_fri_available: checkboxStatus(sellerFormData.fri_switch), fri_open_time: sellerFormData.fri_openHourTxt, fri_close_time: sellerFormData.fri_closeHourTxt, 
            is_sat_available: checkboxStatus(sellerFormData.sat_switch), sat_open_time: sellerFormData.sat_openHourTxt, sat_close_time: sellerFormData.sat_closeHourTxt, 
            is_sun_available: checkboxStatus(sellerFormData.sun_switch), sun_open_time: sellerFormData.sun_openHourTxt, sun_close_time: sellerFormData.sun_closeHourTxt

        },
        success: function( data ) {
            console.log(data)
            $('#addSellingPoint').modal('hide');
            location.reload();
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}


function editSellerDetails(){
    const userId = localStorage.getItem('userId');
    const sellerFormData = fetchSellerFormData()
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

        headers: {
            'access-token': localStorage.getItem('token'),
            'user_id': userId,
            'action': "UPDATE"
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { 
            seller_id: sellerFormData.sellingPointId,
            producer_id: userId, 
            seller_name: sellerFormData.sellingPointName, 
            seller_description: sellerFormData.sellingPointDesc, 
            street: sellerFormData.sp_street, 
            building_number: sellerFormData.sp_houseNumber, 
            city: sellerFormData.sp_city, 
            zip: sellerFormData.sp_zipCode, 
            latitude: sellerFormData.sp_latitude, 
            longitude: sellerFormData.sp_longitude,
            seller_email: sellerFormData.sp_email, 
            seller_website: sellerFormData.sp_website, 
            mobile: sellerFormData.sp_mobile, 
            phone: sellerFormData.sp_phone, 
            is_blocked: false, 
            is_mon_available: checkboxStatus(sellerFormData.mon_switch), mon_open_time: sellerFormData.mon_openHourTxt, mon_close_time: sellerFormData.mon_closeHourTxt, 
            is_tue_available: checkboxStatus(sellerFormData.tue_switch), tue_open_time: sellerFormData.tue_openHourTxt, tue_close_time: sellerFormData.tue_closeHourTxt, 
            is_wed_available: checkboxStatus(sellerFormData.wed_switch), wed_open_time: sellerFormData.wed_openHourTxt, wed_close_time: sellerFormData.wed_closeHourTxt, 
            is_thu_available: checkboxStatus(sellerFormData.thu_switch), thu_open_time: sellerFormData.thu_openHourTxt, thu_close_time: sellerFormData.thu_closeHourTxt, 
            is_fri_available: checkboxStatus(sellerFormData.fri_switch), fri_open_time: sellerFormData.fri_openHourTxt, fri_close_time: sellerFormData.fri_closeHourTxt, 
            is_sat_available: checkboxStatus(sellerFormData.sat_switch), sat_open_time: sellerFormData.sat_openHourTxt, sat_close_time: sellerFormData.sat_closeHourTxt, 
            is_sun_available: checkboxStatus(sellerFormData.sun_switch), sun_open_time: sellerFormData.sun_openHourTxt, sun_close_time: sellerFormData.sun_closeHourTxt

        },
        success: function( data ) {
            console.log(data)
            $('#addSellingPoint').modal('hide');
            location.reload();
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}

function deleteSeller(sellerId){
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

        headers: {
            'access-token': localStorage.getItem('token'),
            'user_id': userId,
            'action': "DELETE"
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: { 
            seller_id: sellerId,
            producer_id: userId, 
        },
        success: function( data ) {
            console.log(data)
            location.reload();
//            const userDetails = JSON.parse(data);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}

function getAllSellers(){
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

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
            producer_id: userId, 
        },
        success: function( data ) {
            console.log(data)
            const sellers = JSON.parse(data);
            listAllSellers(sellers);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}
function getSellerDetails(sellerId, action){
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

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
            seller_id: sellerId,
            producer_id: userId, 
        },
        success: function( data ) {
            console.log(data)
            const sellerDetails = JSON.parse(data);
            switch (action){
                case 'EDIT':
                    setSellerModalValue(sellerDetails);
                    setSellerLocationOnMap();
                    $('#addSellingPoint').modal('toggle');

                    break;
            }
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}


function listAllSellers(sellerArray){
    document.getElementById("sellerList").innerHTML = "";
    if (sellerArray.length > 0){
        sellerArray.forEach(function(seller) {
            console.log(seller);

            const pointId = seller.sellerId ? seller.sellerId : 0;
            const pointName = seller.sellerName ? seller.sellerName : "";
            const pointDesc = seller.sellerDescription ? seller.sellerDescription : "";

            const street = seller.street ? seller.street : "";
            const houseNumber = seller.buildingNumber ? seller.buildingNumber : "";
            const city = seller.city ? seller.city : "";
            const zip = seller.zip ? seller.zip : "";

            const address = street + ', ' + houseNumber + ', ' + city + ' - ' + zip;
            const pointLatitude = seller.latitude ? seller.latitude : 0;
            const pointLongitude = seller.longitude ? seller.longitude : 0;



            const card = `<div class="blog-card">
<div class="meta">
<div class="photo" style="background-image: url(https://images.westend61.de/0000910140pw/people-buying-groceries-while-standing-in-supermarket-MASF02959.jpg)"></div>
</div>
<div class="description">
<h1>${pointName}</h1>
<h2>${address}</h2>
<p> ${pointDesc}</p>

<div id="manipulationBtnSeller" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${pointId}>
<button type="button" class="btn btn-danger" id="deleteSellerBtn" onclick="sellerDeleteConfirmation('${pointId}', '${pointName}','${address}')">Delete</button>
<button type="button" class="btn btn-primary" id="editSellerBtn" onclick="getSellerDetails('${pointId}', 'EDIT')">Edit</button>
<button type="button" class="btn btn-success" id="viewSellerBtn">View</button></div>

</div>
</div>`;

            //                                var productionPointHTMLObject = $(card);
            var prodcutionPointListObj = document.getElementById("sellerListContainer");
            prodcutionPointListObj.innerHTML = prodcutionPointListObj.innerHTML + card;

        });
    }
}

function sellerDeleteConfirmation(id, pointName, address){
    const deleteMessage = `Are you sure want to delete ${pointName} at ${address}.`
    document.getElementById('sellerDeleteMessageText').innerHTML = deleteMessage;
    document.getElementById("confirmSellerDelete").addEventListener("click", function() {
        deleteSeller(id);
    });

    $('#sellerDeleteModal').modal('toggle');
}

function fetchSellerFormData(){
    const ids = ['sellingPointName','sellingPointDesc', 'sp_street', 'sp_houseNumber', 'sp_zipCode', 'sp_city', 'sp_latitude', 'sp_longitude', 'sellingPointId', 'sp_mobile', 'sp_phone', 'sp_email', 'sp_website', 'mon_switch', 'mon_openHourTxt', 'mon_closeHourTxt', 'tue_switch', 'tue_openHourTxt', 'tue_closeHourTxt', 'wed_switch', 'wed_openHourTxt', 'wed_closeHourTxt', 'thu_switch', 'thu_openHourTxt', 'thu_closeHourTxt', 'fri_switch', 'fri_openHourTxt', 'fri_closeHourTxt', 'sat_switch', 'sat_openHourTxt', 'sat_closeHourTxt', 'sun_switch', 'sun_openHourTxt', 'sun_closeHourTxt'];
    var formData = [];

    ids.forEach(function(element) {
        if (document.getElementById(element).type == "checkbox"){
            const value = document.getElementById(element).checked != null ? document.getElementById(element).checked: false;
            formData[element] = value;
        }else{
            const value = document.getElementById(element).value != null ? document.getElementById(element).value: "";
            formData[element] = value;
        }

    }); 
    return formData
}

function setSellerModalValue(sellerDetails){

    document.getElementById('sellingPointName').value = sellerDetails.sellerName ? sellerDetails.sellerName : "";
    document.getElementById('sellingPointDesc').value = sellerDetails.sellerDescription ? sellerDetails.sellerDescription : "";
    document.getElementById('sp_street').value = sellerDetails.street ? sellerDetails.street : "";
    document.getElementById('sp_houseNumber').value = sellerDetails.buildingNumber ? sellerDetails.buildingNumber : "";
    document.getElementById('sp_zipCode').value = sellerDetails.zip ? sellerDetails.zip : "";
    document.getElementById('sp_city').value = sellerDetails.city ? sellerDetails.city : "";
    document.getElementById('sp_latitude').value = sellerDetails.latitude ? sellerDetails.latitude : "";
    document.getElementById('sp_longitude').value = sellerDetails.longitude ? sellerDetails.longitude : "";
    document.getElementById('sellingPointId').value = sellerDetails.sellerId ? sellerDetails.sellerId : 0;
    document.getElementById('sp_mobile').value = sellerDetails.mobile ? sellerDetails.mobile : "";
    document.getElementById('sp_phone').value = sellerDetails.phone ? sellerDetails.phone : "";
    document.getElementById('sp_email').value = sellerDetails.email ? sellerDetails.email : "";
    document.getElementById('sp_website').value = sellerDetails.website ? sellerDetails.website : "";
    document.getElementById('mon_switch').checked = checkboxStatus(sellerDetails.isMonAvailable);
    document.getElementById('mon_openHourTxt').value = sellerDetails.monOpenTime ? sellerDetails.monOpenTime : "";
    document.getElementById('mon_closeHourTxt').value = sellerDetails.monCloseTime ? sellerDetails.monCloseTime : "";
    document.getElementById('tue_switch').checked = checkboxStatus(sellerDetails.isTueAvailable);
    document.getElementById('tue_openHourTxt').value = sellerDetails.tueOpenTime ? sellerDetails.tueOpenTime : "";
    document.getElementById('tue_closeHourTxt').value = sellerDetails.tueCloseTime ? sellerDetails.tueCloseTime : "";
    document.getElementById('wed_switch').checked = checkboxStatus(sellerDetails.isWedAvailable);
    document.getElementById('wed_openHourTxt').value = sellerDetails.wedOpenTime ? sellerDetails.wedOpenTime : "";
    document.getElementById('wed_closeHourTxt').value = sellerDetails.wedCloseTime ? sellerDetails.wedCloseTime : "";
    document.getElementById('thu_switch').checked = checkboxStatus(sellerDetails.isThuAvailable);
    document.getElementById('thu_openHourTxt').value = sellerDetails.thuOpenTime ? sellerDetails.thuOpenTime : "";
    document.getElementById('thu_closeHourTxt').value = sellerDetails.thuCloseTime ? sellerDetails.thuCloseTime : "";
    document.getElementById('fri_switch').checked = checkboxStatus(sellerDetails.isFriAvailable);
    document.getElementById('fri_openHourTxt').value = sellerDetails.friOpenTime ? sellerDetails.friOpenTime : "";
    document.getElementById('fri_closeHourTxt').value = sellerDetails.friCloseTime ? sellerDetails.friCloseTime : "";
    document.getElementById('sat_switch').checked = checkboxStatus(sellerDetails.isSatAvailable);
    document.getElementById('sat_openHourTxt').value = sellerDetails.satOpenTime ? sellerDetails.satOpenTime : "";
    document.getElementById('sat_closeHourTxt').value = sellerDetails.satCloseTime ? sellerDetails.satCloseTime : "";
    document.getElementById('sun_switch').checked = checkboxStatus(sellerDetails.isSunAvailable);
    document.getElementById('sun_openHourTxt').value = sellerDetails.sunOpenTime ? sellerDetails.sunOpenTime : "";
    document.getElementById('sun_closeHourTxt').value = sellerDetails.sunCloseTime ? sellerDetails.sunCloseTime : "";

}

function checkboxStatus(value){
    if (value){
        if (value == 1 || value == 'on'){
            return true;
        }
    }
    return false;
}

function openAddSellarModal(){
    setSellerModalValue([]);
    $('#addSellingPoint').modal('toggle');
}

$('#addSellingPoint').on('hide.bs.modal', function (e) {
  // do something...
    getAllSellers();
})

$("#addSellingPoint").on("hidden.bs.modal", function () {
    // put your default event here
    getAllSellers();
});