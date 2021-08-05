<?php
/****************************************************************
   FILE:      feed-in.detail.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  13.07.2021

   PURPOSE:   Page to view list of feeds by all users.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");

?>

<script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/navigation.js"></script>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/feeds/feed-post-detail.js"></script>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">




<style>


    .feed-img{
        object-fit: cover;
    }

    #container{
        background: yellow;
    }
    #floated{
        float: right;
        width: 450px;
        background: red;
    }
</style>



<div class="container">
    <div class="row mt-5">
        <div class="col-md-3" id="next-prev-feeds">
            <div>
                <h5>Drought Monitor has pockets of improvement</h5>
                <div class=" row my-auto">
                    <div class="col-7">
                        <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p> 
                    </div>
                    <div class="col-5">
                        <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="80px">
                    </div> 

                </div>
            </div>
            
            <div>
                <h5>Drought Monitor has pockets of improvement</h5>
                <div class=" row my-auto">
                    <div class="col-7">
                        <p>Weather service computer models match well with an equatorial rain pattern that influences our weather.</p> 
                    </div>
                    <div class="col-5">
                        <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="80px">
                    </div> 

                </div>
            </div>





        </div>
        <div class="col-md-9" id="feed-details">
            <h1>Drought Monitor has pockets of improvement</h1>
            <div>
                <div id="article">
                    <div id="floated">
                        <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="240px">
                    </div>
                    Some private weather services are expecting a hot and dry July. David Tolleris, WxRisk.com, isn’t one of them. The weather models he watches and analyzes from Europe, the U.S., and Canada aren’t in complete agreement but they’re showing rain in much of the Corn Belt for the first half of this month.
                    Tolleris expects a drier second half of the month, but not the hot temperatures currently to the west of the Corn Belt.
                    “In order for that heat ridge to come east, we need that trough in the jet stream that’s over the Great Lakes and New England to go away. So far, that’s not happening,” he says.
                    5-DAY WEATHER OUTLOOK
                    Rain is already developing in the western Corn Belt that’s expected in the most recent one- to five-day outlook for July 8-12.  It’s following a cold front.
                    “In the one-to-five day, a lot depends on where you’re located,” he says.
                    Tolleris says the operational GFS model used in the U.S. is driving the cold front too far to the south too fast, resulting in less rain in northern and western Iowa than other models. But the European and Canadian models have a much more uniform rain shield in the western Corn Belt, which makes more sense to Tolleris.
                    “The key to this whole situation is the development of the closed upper low in the western Corn Belt. If that feature does not form, the rainfall amounts are going to be considerably less,” he says in his daily report.
                    6- TO 10-DAY WEATHER OUTLOOK
                    Starting this weekend, and continuing into the six- to 10-day period, “there is going to be a large, closed upper low over Missouri and Iowa,” Tolleris says. “What does that do? It creates a very unstable atmosphere.” That has the potential to “bring about significant if not heavy rains for much of the next 10 days.”  The GFS model used by the U.S. has that rainfall weakening in the western Corn Belt. The European and Canadian models do not.  
                    11- TO 15-DAY OUTLOOK
                    “There is no doubt that the rainy pattern is going to come to an end in the 11-to-15 day,” Tolleris says. “When we get into the last 10 days of July, it’s going to turn dry again in the Midwest.”
                    Both the intermediate and longer-term outlooks from computer models match well with the historical pattern tied to the Madden-Julian Oscillation, he says. The MJO is characterized by thunderstorms that develop over the Indian ocean and move eastward over the Pacific toward Peru. These storms send out energy that affects weather far from that region, even into the Midwest.
                    Currently, the MJO is going into phase 3, a cluster of storms that “is the wettest possible signal you can get from the MJO for the summer months,” Tolleris says. However, by the last half of July, the MJO will be moving into phase 4, which is dry but not unusually hot for summer months.
                    That doesn’t necessarily spell troubles for corn during pollination, Tolleris believes.
                    “It’s 88°F. to 90°F., but if you’ve gotten 3 inches of rain, you can survive that,” he says.


                </div>

            </div>
        </div>


    </div>

</div>





<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>




