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

function addNewProductionPoint(){
    const formData = fetchProductionPointFormData();
    const userId = localStorage.getItem('userId');

    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/productionPointController.php",

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
            farm_id: 0,
            producer_id: userId,
            farm_name: formData.productionPointName,
            farm_desc:formData.productionPointDesc,
            farm_address:formData.address,
            street:formData.street,
            house_number:formData.houseNumber,
            city:formData.city,
            zip:formData.zipCode,
            latitude:formData.latitude,
            longitude:formData.longitude,

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