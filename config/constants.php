<?php 

    //PAGE SOURCES

    
$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';

$SIGN_UP_LOC = '/kleinerzeugernetzwerk/src/signUp.php';
$LOGO_LOC = '/kleinerzeugernetzwerk/images/logo.svg';
$HOME_LOC = '/kleinerzeugernetzwerk/index.php';
$PROFILE_IMAGE_DEFAULT = '/kleinerzeugernetzwerk/images/profile_placeholder.png';
$LOG_OUT_IMG = '/kleinerzeugernetzwerk/images/logout.png';
$VIEW_PROFILE = '/kleinerzeugernetzwerk/src/dashboard.php';



function getChatServerURL(){
    return 'http://ec2-3-68-74-178.eu-central-1.compute.amazonaws.com:3000';
}

function getChatAPI(){
    return  getChatServerURL().'/api/v1/';
}


?>