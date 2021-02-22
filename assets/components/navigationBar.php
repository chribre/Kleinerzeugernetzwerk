<?php
/****************************************************************
   FILE             :   navigationBar.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   navigation bar containing project logo, menu and search bar. 
                        it is incorporated into header.php to get it in all pages
****************************************************************/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* Tell mysqli to throw an exception if an error occurs */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$isLoggedIn = true;

echo "Connected successfully, ";

$loginFailAlert = '<div class="alert alert-success" id="success-alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Success! </strong> Product have added to your wishlist.
</div>';
//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//    if (isset($_POST['signIn'])){
//        echo('Post method hit,');
//        $email = escapeSQLString($_POST['email']);
//        $password = escapeSQLString($_POST['password']);
//        if(loginUser($email, $password)){
//            echo "login success";
//        }else{
//            echo "login faield. retry!";
//        }
//    }
//
//}

$SIGN_UP_LOC = '/kleinerzeugernetzwerk/src/signUp.php';
$LOGO_LOC = '/kleinerzeugernetzwerk/images/logo.svg';
$HOME_LOC = '/kleinerzeugernetzwerk/index.php';
$PROFILE_IMAGE_DEFAULT = '/kleinerzeugernetzwerk/images/profile_placeholder.png';
$LOG_OUT_IMG = '/kleinerzeugernetzwerk/images/logout.png';
$VIEW_PROFILE = '/kleinerzeugernetzwerk/src/dashboard.php?menu=profile&data=personal';


//if(isset($_GET['logOut'])){
//    logOut();
//
//}
//function logOutUser(){
//    $_SESSION["isLoggedIn"] = false;
//}

?>


<div id="nav_bar" class="shadow-sm">


    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top my-0">
        <a class="navbar-brand" href="<?php echo $HOME_LOC ?>">


            <img src= "<?php echo $LOGO_LOC?>" width="160" height="33" class="d-inline-block align-center" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/signInModal.php"); ?>


        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav font-weight-bold">
                <div class="navbar-nav mr-auto">
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">Map<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">About Us<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">Events<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">Contact Us<span class="sr-only">(current)</span></a>
                    </li>

                    <!--
<li class="nav-item active ml-3">
<a href="#" class="nav-link" data-toggle="modal" data-target="#elegantModalForm">Sign In</a>
</li>
-->

                </div>

            </ul>
            <div class="row mr-3" id="navEndSpace">
                <div class="bg-white rounded rounded-pill shadow-sm mx-sm-4 align-items-center align-self-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button id="button-addon2" type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
                        </div>
                        <input type="search" placeholder="Search" aria-describedby="button-addon2" class="form-control border-0 bg-white rounded-pill align-middle">
                    </div>
                </div>

               <div id="signInOrProfileBtn"></div>

            </div>           
        </div>
    </nav>
</div>


<script>
    //        window.onload = function() {
    //            setLoginOrProfileButton();
    //        };

    function setLoginOrProfileButton(){
        const signInButton = '<button data-toggle="modal" data-target="#elegantModalForm" type="button" class="btn btn-primary rounded-pill font-weight-bold text-white px-4 mx-3 float-right id="signInOrProfileBtn">Sign In</button>';       


//        if (!$('#signInOrProfileBtn').length > 0) {
//            // Not Exists.
//            document.getElementById('navEndSpace').innerHTML += signInButton;
//        }

        if (localStorage.getItem('isLoggedIn')){
            const userName = localStorage.getItem('userName');
            const email = localStorage.getItem('email');
            const profileImage = '/kleinerzeugernetzwerk/images/profile_placeholder.png';
            const viewProfilePath = '/kleinerzeugernetzwerk/src/dashboard.php?menu=profile&data=personal';
            const logOutImage = '/kleinerzeugernetzwerk/images/logout.png';

            const profileBtn = `<div class="dropdown rounded-circle bg-info p-1 ml-3" id="signInOrProfileBtn"> <div id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="rounded-circle bg-info"> <img src="${profileImage}" class="d-block rounded-circle" width="36px" height="36px"> </div> <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel"> <a class="dropdown-item font-weight-bold text-uppercase" href="${viewProfilePath}">${userName}</br><span class=" text font-weight-light text-lowercase">${email}</span> </a> <div class="dropdown-divider"></div>  <a class="dropdown-item" href="javascript:logOut()"><img class="mr-2" src="${logOutImage}" width=20px, height=20px/>Log Out</a> </div> </div>`


            $("#signInOrProfileBtn").replaceWith(profileBtn);
            if (window.location.pathname.includes('signUp')){
                window.location.href = "/kleinerzeugernetzwerk/index.php";
            }
        }else{
            $("#signInOrProfileBtn").replaceWith(signInButton);
        }
    }
    function logOut(){
        console.log('log out');
        removeLoginCache();
        window.location.href = "/kleinerzeugernetzwerk/index.php";
    }
    function removeLoginCache(){
        localStorage.removeItem('userId');
        localStorage.removeItem('userName');
        localStorage.removeItem('email');
        localStorage.removeItem('token');
        localStorage.removeItem('tokenId');
        localStorage.removeItem('isLoggedIn');
    }
    
    function userLogin(userName, password){

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/userController.php",
            data: { userName: userName, password: password },
            dataType: "json",
            contentType: "application/json",
            cache: false,
            success: function( data ) {

            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        });

    }
</script>



