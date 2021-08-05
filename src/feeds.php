<?php
/****************************************************************
   FILE:      feeds.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  13.07.2021

   PURPOSE:   Page to view details of a feed news.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");

?>

<script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/navigation.js"></script>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/feeds/feed-posts.js"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">




<style>

    #feed-div{
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* More style: */
        background-color: #888;


        font-size: 35px;
        /*        letter-spacing: -2.2px;*/
        /*        word-spacing: 2px;*/
        color: #FFFFFF;
        font-weight: 700;
        /*
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        */
        text-transform: uppercase;
    }

    .feed-img{
        object-fit: cover;
    }
</style>



<div>
    <div class="mx-auto my-2 bg-secondary" id="feed-div">
        News & Feeds
    </div>
    <div id="all-feed-list">
        <div class="row mx-auto my-5">
            <div class="col-md-6" id="latest-feed-post">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" height="340px" width="100%">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-6 my-auto px-5">
                <div class="row py-2 justify-content-between" id="second-feed">

                    <div class="mx-3 my-auto">
                        <h3>Drought Monitor has pockets of improvement</h3>
                        <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
                    </div>
                    <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="250px" height="160px">

                </div>
                <div class="row py-2 justify-content-between" id="third-feed">

                    <div class="mx-3 my-auto">
                        <h3>Drought Monitor has pockets of improvement</h3>
                        <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
                    </div>
                    <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="250px" height="160px">

                </div>

            </div>
        </div>
        <div class="row mx-auto my-5" id="all-feeds">
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>
            <div class="col-md-4 my-5 px-5">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="250px">
                <h3>Drought Monitor has pockets of improvement</h3>
                <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p>
            </div>

        </div>
    </div>

</div>





<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>




