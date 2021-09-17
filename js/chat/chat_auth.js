/****************************************************************
   FILE             :   chat_auth.js
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.08.2021

   PURPOSE          :   javaScript functions for CRUD operations in chat module
                        Authentication to rocketchat server through iFrames
****************************************************************/

function registerUserInChat(userData) {
//    const userData = prepareUserData(userData)
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: chatServerAPI('users.register'),
        contentType: "application/json",
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: userData,
        success: function( data ) {
            console.log(data)
            location.reload();
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}


//Register a user

//http://ec2-18-194-139-62.eu-central-1.compute.amazonaws.com:3000/api/v1/users.register

//{
//"username": "fredy",
//"email": "fredythekkekkara@gmail.com1",
//"pass": "test",
//"name": "fredy davis"
//}

//Meteor.loginWithPassword('kleinerzeugernetzwerk', 'kleinerzeugernetzwerk');

//Registration page secret url: 7e289z6N4Txph5k3B
//keep the password and username in database to avoid password change conflict during changing the password in kleinerzeugernetzwerk

//Login
//http://ec2-18-194-139-62.eu-central-1.compute.amazonaws.com:3000/api/v1/login

//{
//"user": "fredy",
//"password": "test"
//}

//prev auth token: 6s08r0u7yMH3oR4nBEOo-gSbm9Y8AGa754dTWVUaTA9
function loginUserIntoChat(userData) {
//    const userData = prepareUserLoginData(userData)
    $.ajax({
        type: "POST",
        url: chatServerAPI('login'),        
        contentType: "application/json",
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: userData,
        success: function( data ) {
            console.log(data)
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}

function logoutUserFromChat(actionFunction) {
    const chatUserId = localStorage.getItem('chatUserId');
    const chatUserToken = localStorage.getItem('chatAuthToken');
    $.ajax({
        type: "POST",
        url: chatServerAPI('logout'),
        contentType: "application/json",
        headers: {
            'X-Auth-Token' : chatUserToken,
            'X-User-Id': chatUserId
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        success: function( data ) {
            if (data.status == 'success'){
                actionFunction();
            }
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}

function changeUserChatPassword(){

}