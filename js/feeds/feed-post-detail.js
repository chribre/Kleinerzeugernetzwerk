/****************************************************************
FILE             :   feed-post-detail.js
AUTHOR           :   Fredy Davis
LAST EDIT DATE   :   20.07.2021

PURPOSE          :   javaScript functions to view feed post in detail
****************************************************************/

$(document).ready(function(){
    setLoginOrProfileButton();
    var url_string = window.location;
    var url = new URL(url_string);
    var feedId = url.searchParams.get("feed");
    if (feedId){
        viewFeedInDetail(feedId, showFeedInDetailScreen);
    }

});

function viewFeedInDetail(feedId, actionFunction){
    $.ajax({
        type: "POST",
        url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",
        headers: {
            'action': 'READ',
        },
        beforeSend: function(){
            $("#overlay").fadeIn(300);　
        },
        complete: function(){
            $("#overlay").fadeOut(300);
        },
        data: {feed_id: feedId },
        dataType: "json",
        success: function( data ) {
            const feedData = data;
            console.log(data);
            actionFunction(feedData);
        },
        error: function (request, status, error) {
            alert(request.responseText);
            console.log(error)
        }
    });
}

function showFeedInDetailScreen(feedData){
    if (feedData){
        const feed_id = feedData.id ? feedData.id : 0;
        const feed_title = feedData.title ? feedData.title : '';
        const feed_article = feedData.article ? feedData.article : '';
        const feed_article_aray = feed_article.split("\n");

        const feed_author_first_name = feedData.author_first_name ? feedData.author_first_name : '';
        const feed_author_last_name = feedData.author_last_name ? feedData.author_last_name : '';
        const feed_time = feedData.created_date ? feedData.created_date : '';
        const feed_image_name = feedData.image_name ? feedData.image_name : '';
        const feed_image_path = getFilePath(5, feed_image_name);



        const prev_feed_id = feedData.prev_id ? feedData.prev_id : 0;
        const prev_feed_title = feedData.prev_title ? feedData.prev_title : '';
        const prev_feed_article = feedData.prev_article ? feedData.prev_article : '';
        const prev_article_short = prev_feed_article.substring(0,180);
        //        const feed_author_first_name = feedData.author_first_name ? feedData.author_first_name : '';
        //        const feed_author_last_name = feedData.author_last_name ? feedData.author_last_name : '';
        //        const feed_time = feedData.created_date ? feedData.created_date : '';
        const prev_feed_image_name = feedData.prev_image_name ? feedData.prev_image_name : '';
        const prev_feed_image_path = getFilePath(5, prev_feed_image_name);


        const next_feed_id = feedData.next_id ? feedData.next_id : 0;
        const next_feed_title = feedData.next_title ? feedData.next_title : '';
        const next_feed_article = feedData.next_article ? feedData.next_article : '';
        const next_article_short = next_feed_article.substring(0,180);
        //        const feed_author_first_name = feedData.author_first_name ? feedData.author_first_name : '';
        //        const feed_author_last_name = feedData.author_last_name ? feedData.author_last_name : '';
        //        const feed_time = feedData.created_date ? feedData.created_date : '';
        const next_feed_image_name = feedData.next_image_name ? feedData.next_image_name : '';
        const next_feed_image_path = getFilePath(5, next_feed_image_name);


        var next_prev_feed_ui = "";
        if (prev_feed_id > 0){
            next_prev_feed_ui += `<div class="cursor-pointer" onclick="goToFeedDetailsPage(${prev_feed_id})">
<h5>${prev_feed_title}</h5>
<div class=" row my-auto">
<div class="col-7">
<p>${prev_article_short}</p> 
</div>
<div class="col-5">
<img class="feed-img" src="${prev_feed_image_path}" alt="" width="100%" height="80px">
</div> 

</div>
</div>
<hr class="solid">`;
        }

        if (next_feed_id > 0){
            next_prev_feed_ui += `<div class="cursor-pointer" onclick="goToFeedDetailsPage(${next_feed_id})">
<h5>${next_feed_title}</h5>
<div class=" row my-auto">
<div class="col-7">
<p>${next_article_short}</p> 
</div>
<div class="col-5">
<img class="feed-img" src="${next_feed_image_path}" alt="" width="100%" height="80px">
</div> 

</div>
</div>`;
        }




        var feed_detail_ui = `<h1>${feed_title}</h1>
<div>
<div id="article">
<div id="floated">
<img class="feed-img" src="${feed_image_path}" alt="" width="100%" height="240px">
</div>`;

        feed_article_aray.forEach(function(articles) {
            feed_detail_ui += `<p>${articles}</p> `;
            //${feed_article}

        })
        feed_detail_ui += `</div>

</div>`;

        var next_prev_feed_obj = document.getElementById("next-prev-feeds");
        next_prev_feed_obj.innerHTML = next_prev_feed_ui;

        var feed_detail_obj = document.getElementById("feed-details");
        feed_detail_obj.innerHTML = feed_detail_ui;

    }else{

    }
}