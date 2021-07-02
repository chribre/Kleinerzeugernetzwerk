function noDataAvailable(content, element){
    const message = `No ${content} data available<br>Try adding ${content} using add button.`;
    const noDataUI = `<div class="container mx-auto mt-5">
<div class="text-center">
<img class="text-center" height="120px" width="120px" src="https://img-premium.flaticon.com/png/512/4202/premium/4202134.png?token=exp=1622546384~hmac=298124444d9fa305993fae5f7c38c4d2">
</div>
<p class="m-auto text-center">${message}</p>
</div>`
    document.getElementById(element).innerHTML = noDataUI;
}

function showError(errorCode, title, message){
    var errorTitle = title;
    var errorMessage = message;
    switch (errorCode){
        case 400:
            errorTitle = 'Error';
            errorMessage = 'Oops! Something went wrong. Try again.';
        case 401:
            errorTitle = 'Unauthorized  Request';
            errorMessage = 'Oops! Your authentication failed.';
        case 412:
            errorTitle = 'Request Failed';
            errorMessage = 'You have no permission to add more than 3 entries';
        case 409:
            errorTitle = 'User already exist!';
            errorMessage = 'A user with the email address exists. Try sign in';
        case 460:
            errorTitle = 'Error reset password';
            errorMessage = 'Unable to reset password due to an unknown error. PLease check the inforamtion provided and try again.';
    }
    document.getElementById('error-title').innerHTML = errorTitle;
    document.getElementById('error-message').innerHTML = errorMessage;
    $('#error-modal').modal('show');
}