$(document).ready(function(){
    removeLoginCache();
    setLoginOrProfileButton();
    var url_string = window.location;
    var url = new URL(url_string);
    var authToken = url.searchParams.get("auth");
    if (authToken == null || authToken == ''){
//        window.location.href = "/kleinerzeugernetzwerk/index.php";
    }else{
        
    }

});

function getPasswordResetParams(){
    const email = document.getElementById('reset-email') ? document.getElementById('reset-email').value : '';
    const password = document.getElementById('reset-password') ? document.getElementById('reset-password').value : '';
    const repeatPassword = document.getElementById('reset-repeat-password') ? document.getElementById('reset-repeat-password').value : '';
    
    if (email == ''){
        return false
    }
    if (password == '' || password !== repeatPassword){
        return false;
    }
    const resetparams = {
        email: email,
        password: password
    }
    return resetparams
}

function resetPasswordAPI(){
    var url_string = window.location;
    var url = new URL(url_string);
    var authToken = url.searchParams.get("auth");
    if (authToken == null || authToken == ''){
    }
    const params = getPasswordResetParams();
    if (params == false){
        return;
    }
    $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/userAuthController.php",
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            headers: {
                'action': "RESET_PASSWORD",
                'token': authToken
            },
            data: params,
            success: function( data ) {
                console.log(data)
            },
            error: function (request, status, error) {
                console.log(error)
                showError(request.status, 'Error reset password', 'Unable to reset password due to an unknown error. PLease check the inforamtion provided and try again.');
            }
        });
}