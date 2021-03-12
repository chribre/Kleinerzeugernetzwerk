/****************************************************************
   FILE             :   seller_api.js
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   javaScript functions for CRUD operations in seller module
****************************************************************/

function createSeller(){
    const userId = localStorage.getItem('userId');
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
            seller_name: 'Bio Store', 
            seller_description: 'Your value proposition or unique selling proposition focuses on what you can give your audience that’s unique. This should be the focal point of your Instagram bio, because it’s highlighting why users should care about your brand at all.', 
            street: 'Katharinenstraße', 
            building_number: '17', 
            city: 'Neubrandenburg', 
            zip: '17033', 
            latitude: '53.556555', 
            longitude: '13.272375',
            seller_email: 'biostore@gmail.com', 
            seller_website: 'www.biostore.com', 
            mobile: '017630142345', 
            phone: '0125586369', 
            is_blocked: false, 
            is_mon_available: true, mon_open_time: '08:00', mon_close_time: '10:00', 
            is_tue_available: true, tue_open_time: '10:30', tue_close_time: '11:40', 
            is_wed_available: true, wed_open_time: '12:05', wed_close_time: '12:45', 
            is_thu_available: true, thu_open_time: '08:30', thu_close_time: '09:15', 
            is_fri_available: true, fri_open_time: '08:00', fri_close_time: '08:00', 
            is_sat_available: true, sat_open_time: '08:00', sat_close_time: '08:00', 
            is_sun_available: true, sun_open_time: '08:00', sun_close_time: '08:00'

        },
        success: function( data ) {
            console.log(data)
            const userDetails = JSON.parse(data);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}


function editSellerDetails(){
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
        data: { 
            seller_id: 1,
            producer_id: userId, 
            seller_name: 'Bio Store NB', 
            seller_description: 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice it would be difficult to write literature that drew on just one of the four basic modes.', 
            street: 'Buttelstraße', 
            building_number: '13', 
            city: 'Belin', 
            zip: '18001', 
            latitude: '53.557388', 
            longitude: '13.273532',
            seller_email: 'biostore@yahoo.com', 
            seller_website: 'www.biostore.co.in', 
            mobile: '017630123456', 
            phone: '01255123456', 
            is_blocked: true, 
            is_mon_available: false, mon_open_time: '08:30', mon_close_time: '10:30', 
            is_tue_available: false, tue_open_time: '10:00', tue_close_time: '11:30', 
            is_wed_available: false, wed_open_time: '12:30', wed_close_time: '12:30', 
            is_thu_available: false, thu_open_time: '08:00', thu_close_time: '09:30', 
            is_fri_available: false, fri_open_time: '08:30', fri_close_time: '08:30', 
            is_sat_available: false, sat_open_time: '08:33', sat_close_time: '08:30', 
            is_sun_available: false, sun_open_time: '08:30', sun_close_time: '08:30'

        },
        success: function( data ) {
            console.log(data)
            const userDetails = JSON.parse(data);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}

function deleteSeller(){
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
            seller_id: 2,
            producer_id: userId, 
        },
        success: function( data ) {
            console.log(data)
            const userDetails = JSON.parse(data);
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
            seller_id: 2,
            producer_id: userId, 
        },
        success: function( data ) {
            console.log(data)
            const userDetails = JSON.parse(data);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}
function getSellerDetails(){
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
            seller_id: 1,
            producer_id: userId, 
        },
        success: function( data ) {
            console.log(data)
            const userDetails = JSON.parse(data);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}