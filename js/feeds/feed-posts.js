/****************************************************************
FILE             :   feed-posts.js
AUTHOR           :   Fredy Davis
LAST EDIT DATE   :   20.07.2021

PURPOSE          :   javaScript functions to list all feed posts
****************************************************************/

$(document).ready(function(){
    setLoginOrProfileButton();
    getFeeds()

});

function getFeeds(){
    const userId = localStorage.getItem('userId');
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",

        headers: {
            'action': "READ_ALL"
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: {user_id: userId},
        success: function( data ) {
            console.log(data)
            const feedData = JSON.parse(data);
            setFeedList(feedData);
        },
        error: function (request, status, error) {               
            console.log(error)
        }
    });
}

function setFeedList(feeds){
    document.getElementById("latest-feed-post").innerHTML = "";
    document.getElementById("second-feed").innerHTML = "";
    document.getElementById("third-feed").innerHTML = "";
    document.getElementById("all-feeds").innerHTML = "";
    if (feeds.length > 0){
        feeds.forEach(function(feed, index) {
            const feedId = feed.id ? feed.id : 0;
            const title = feed.title ? feed.title : '';
            const article = feed.article ? feed.article : '';
            const article_short = article.substring(0,180);
            const author_first_name = feed.author_first_name ? feed.author_first_name : '';
            const author_last_name = feed.author_last_name ? feed.author_last_name : '';
            const created_date = feed.created_date ? feed.created_date : '';
            const image_name = feed.image_name ? feed.image_name : DEFAULT_FEED_IMAGE;
            const imagePath = getFilePath(5, image_name);


            switch(index){
                case 0:
                    const latest_feed = `<div class="cursor-pointer" onclick="goToFeedDetailsPage(${feedId})">
<img class="feed-img" src="${imagePath}" alt="" height="340px" width="100%">
<h3>${title}</h3>
<p>${article_short}</p></div>`;
                    var feedListObj = document.getElementById("latest-feed-post");
                    feedListObj.innerHTML = latest_feed;
                    break;
                case 1:
                    const second_feed = `<div class="row cursor-pointer" onclick="goToFeedDetailsPage(${feedId})">
<div class="mx-3 my-auto col-md-8">
<h3>${title}</h3>
<p>${article_short}</p>
</div>
<img class="feed-img" src="${imagePath}" alt="" width="250px" height="160px"></div>`;
                    var feedListObj = document.getElementById("second-feed");
                    feedListObj.innerHTML = second_feed;
                    break;
                case 2:
                    const third_feed = `<div class="row cursor-pointer" onclick="goToFeedDetailsPage(${feedId})">
<div class="mx-3 my-auto col-md-8">
<h3>${title}</h3>
<p>${article_short}</p>
</div>
<img class="feed-img" src="${imagePath}" alt="" width="250px" height="160px"></div>`;
                    var feedListObj = document.getElementById("third-feed");
                    feedListObj.innerHTML = third_feed;
                    break;
                default:
                    const feed = `<div class="col-md-4 my-5 px-5 cursor-pointer" onclick="goToFeedDetailsPage(${feedId})">
<img class="feed-img" src="${imagePath}" alt="" width="100%" height="250px">
<h3>${title}</h3>
<p>${article_short}</p>
</div>`;
                    var feedListObj = document.getElementById("all-feeds");
                    feedListObj.innerHTML = feedListObj.innerHTML + feed;
                    break;
            }

        })
    }else{

    }
}