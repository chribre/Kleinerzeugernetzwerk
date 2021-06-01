/****************************************************************
   FILE             :   seller_api.js
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   javaScript functions for CRUD operations in seller module
****************************************************************/

function createSeller() {
    const sellerFormValues = fetchSellerFormData()
    const sellerFormDataFormatted = createSellerFormData(sellerFormValues);
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

        headers: {
            'access-token': localStorage.getItem('token'),
            'user_id': userId,
            'action': "CREATE"
        },
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: sellerFormDataFormatted,
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
    const sellerFormValues = fetchSellerFormData()
    const sellerFormDataFormatted = createSellerFormData(sellerFormValues);
    const userId = localStorage.getItem('userId');
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
        cache: false,
        contentType: false,
        processData: false,
        data: sellerFormDataFormatted,
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
            var sellers = [];
            try {
                sellers = JSON.parse(data);
            } catch(e) {
                //                    alert(e); // error in the above string (in this case, yes)!
            }
            if (sellers.length == 0){
                noDataAvailable('seller', 'sellerList')
                return;
            }
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
            if (sellerDetails.length > 0){
                switch (action){
                    case 'EDIT':
                        setSellerModalValue(sellerDetails);
                        setSellerLocationOnMap();
                        $('#addSellingPoint').modal('toggle');

                        break;
                }
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

            const isFavourite = seller.isFavourite ? seller.isFavourite == 1 ? true : false : false;

            const defaultImage = "https://images.westend61.de/0000910140pw/people-buying-groceries-while-standing-in-supermarket-MASF02959.jpg";
            const imageName = seller.imageName ? seller.imageName : DEFAULT_SELLER_IMAGE;
            const imagePath = getFilePath(4, imageName);

            const favouriteBtn = `<button type="button" class="btn btn-outline-danger" onclick="markSellerAsFavourite('${pointId}')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg></button>`;

            const unfavouriteButton = `<button type="button" class="btn btn-outline-danger" onclick="markSellerAsUnfavourite('${pointId}')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
<path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
</svg></button>`;


            const card = `<div class="blog-card">
<div class="meta">
<div class="photo" style="background-image: url(${imagePath})"></div>
</div>
<div class="description">
<h1>${pointName}</h1>
<h2>${address}</h2>
<p> ${pointDesc}</p>

<div id="manipulationBtnSeller" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${pointId}>
<button type="button" class="btn btn-danger" id="deleteSellerBtn" onclick="sellerDeleteConfirmation('${pointId}', '${pointName}','${address}')">Delete</button>
<button type="button" class="btn btn-primary" id="editSellerBtn" onclick="getSellerDetails('${pointId}', 'EDIT')">Edit</button>
<button type="button" class="btn btn-success" id="viewSellerBtn" onclick="gotoSellerDetailsScreen('${pointId}')">View</button>

${isFavourite ? unfavouriteButton : favouriteBtn}


</div>





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


function createSellerFormData(sellerData){
    const userId = localStorage.getItem('userId');
    var file_data = $('#seller-gallery-photo-add').prop('files');
    var formDataCollection = new FormData();
    for (let i = 0; i < file_data.length; i++) {
        let file = file_data[i];

        formDataCollection.append('files[]', file);
    }

    var sellerImageId = $('#sellerImageIdArray').data('id') ? $('#sellerImageIdArray').data('id') : [];
    var sellerImageIdArray = [];
    if (sellerImageId != ""){
        if (typeof sellerImageId == "string"){
            sellerImageIdArray = sellerImageId.split(',')
        }else{
            sellerImageIdArray = [sellerImageId];
        }
    }

    formDataCollection.append("producer_id", userId);
    formDataCollection.append("seller_name", sellerData.sellingPointName);
    formDataCollection.append("seller_description", sellerData.sellingPointDesc);
    formDataCollection.append("street", sellerData.sp_street);
    formDataCollection.append("building_number", sellerData.sp_houseNumber);
    formDataCollection.append("zip", sellerData.sp_zipCode);
    formDataCollection.append("city", sellerData.sp_city);
    formDataCollection.append("latitude", sellerData.sp_latitude);
    formDataCollection.append("longitude", sellerData.sp_longitude);
    formDataCollection.append("seller_id", sellerData.sellingPointId);
    formDataCollection.append("mobile", sellerData.sp_mobile);
    formDataCollection.append("phone", sellerData.sp_phone);
    formDataCollection.append("seller_email", sellerData.sp_email);
    formDataCollection.append("seller_website", sellerData.sp_website);
    formDataCollection.append("is_blocked", false);
    formDataCollection.append("is_mon_available", sellerData.mon_switch);
    formDataCollection.append("mon_open_time", sellerData.mon_openHourTxt);
    formDataCollection.append("mon_close_time", sellerData.mon_closeHourTxt);
    formDataCollection.append("is_tue_available", sellerData.tue_switch);
    formDataCollection.append("tue_open_time", sellerData.tue_openHourTxt);
    formDataCollection.append("tue_close_time", sellerData.tue_closeHourTxt);
    formDataCollection.append("is_wed_available", sellerData.wed_switch);
    formDataCollection.append("wed_open_time", sellerData.wed_openHourTxt);
    formDataCollection.append("wed_close_time", sellerData.wed_closeHourTxt);
    formDataCollection.append("is_thu_available", sellerData.thu_switch);
    formDataCollection.append("thu_open_time", sellerData.thu_openHourTxt);
    formDataCollection.append("thu_close_time", sellerData.thu_closeHourTxt);
    formDataCollection.append("is_fri_available", sellerData.fri_switch);
    formDataCollection.append("fri_open_time", sellerData.fri_openHourTxt);
    formDataCollection.append("fri_close_time", sellerData.fri_closeHourTxt);
    formDataCollection.append("is_sat_available", sellerData.sat_switch);
    formDataCollection.append("sat_open_time", sellerData.sat_openHourTxt);
    formDataCollection.append("sat_close_time", sellerData.sat_closeHourTxt);
    formDataCollection.append("is_sun_available", sellerData.sun_switch);
    formDataCollection.append("sun_open_time", sellerData.sun_openHourTxt);
    formDataCollection.append("sun_close_time", sellerData.sun_closeHourTxt);
    formDataCollection.append("seller_images_id", JSON.stringify(sellerImageIdArray));

    return formDataCollection;
}


function setSellerModalValue(sellerData){

    const sellerDetails = sellerData[0] ? sellerData[0] : [];
    const sellerImageData = sellerData[1] ? sellerData[1] : [];


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

    setSellerImages(sellerImageData);

}

function setSellerImages(imageData){
    document.getElementById("seller-gallery").innerHTML = '';
    var sellerImageId = []; 
    var sellerImageGallery = "";
    imageData.forEach(element =>{
        const name = element.image_name;
        const path = getFilePath(4, name);
        const id = element.image_id;

        sellerImageGallery += `<div class="image">
<div class="overlay"></div>
<img src="${path}" id="test" key="2">
</div>`;
        sellerImageId.push(id); 
    })
    document.getElementById("sellerImageIdArray").setAttribute('data-id', sellerImageId);
    document.getElementById("seller-gallery").innerHTML = sellerImageGallery;
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


function markSellerAsFavourite(sellerId){
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

        headers: {
            'access-token': localStorage.getItem('token'),
            'user_id': userId,
            'action': "FAVOURITE"
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
            is_favourite: true,
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

function markSellerAsUnfavourite(sellerId){
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/sellerController.php",

        headers: {
            'access-token': localStorage.getItem('token'),
            'user_id': userId,
            'action': "FAVOURITE"
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
            is_favourite: false,
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