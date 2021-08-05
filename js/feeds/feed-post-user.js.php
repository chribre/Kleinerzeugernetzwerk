/****************************************************************
FILE             :   feed-post-user.js
AUTHOR           :   Fredy Davis
LAST EDIT DATE   :   20.07.2021

PURPOSE          :   javaScript functions for CRUD operations in feed post module
****************************************************************/

$(document).ready(function(){
setLoginOrProfileButton();
getFeedsByUser()

});

function openAddFeedPostModal(feedDetails){
setFeedPostModal(feedDetails);
$('#feed-modal').modal('toggle');
}

function setFeedPostModal(feedData){

const userId = localStorage.getItem('userId');
const feedImageName = feedData.image_name ? feedData.image_name : "";
document.getElementById('feed-id').value = feedData.id ? feedData.id : "";
document.getElementById('feed-title').value = feedData.title ? feedData.title : "";
document.getElementById('feed-article').value = feedData.article ? feedData.article : "";
document.getElementById('feed-author-first-name').value = feedData.author_first_name ? feedData.author_first_name : "";
document.getElementById('feed-author-last-name').value = feedData.author_last_name ? feedData.author_last_name : "";

document.getElementById("feed-gallery").innerHTML = '';
var feedImageId = feedData.image_id ? feedData.image_id : 0;

var feedImageGallery = "";
const path = getFilePath(5, feedImageName);
if (feedImageName != ""){
feedImageGallery = `<div class="image">
    <div class="overlay"></div>
    <img src="${path}" id="test" key="2">
</div>`;
}
document.getElementById("feedImageId").setAttribute('data-id', feedImageId);
document.getElementById("feed-gallery").innerHTML = feedImageGallery;
}


function getFeedDataToEdit(feedId, actionFunction){
const userId = localStorage.getItem('userId');
$.ajax({
type: "POST",
url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",
headers: {
'access-token': localStorage.getItem('token'),
'user_id': userId,
'action': 'READ_TO_EDIT',
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

function createFeedPostFormData(){
const userId = localStorage.getItem('userId');
var file_data = $('#feed-gallery-photo-add').prop('files');
var formDataCollection = new FormData();
for (let i = 0; i < file_data.length; i++) {
                                     let file = file_data[i];

                                     formDataCollection.append('files[]', file);
                                     }

                                     var feedImageId = $('#feedImageId').data('id') ? $('#feedImageId').data('id') : 0;

                                     const feedId = document.getElementById('feed-id').value != null ? document.getElementById('feed-id').value: 0;
                                     const feedTitle = document.getElementById('feed-title').value != null ? document.getElementById('feed-title').value: "";
                                     const feedArticle = document.getElementById('feed-article').value != null ? document.getElementById('feed-article').value: "";
                                     const firstName = document.getElementById('feed-author-first-name').value != null ? document.getElementById('feed-author-first-name').value: "";
                                     const lastName = document.getElementById('feed-author-last-name').value != null ? document.getElementById('feed-author-last-name').value: "";

                                     formDataCollection.append("feed_id", feedId);
                                     formDataCollection.append("feed_title", feedTitle);
                                     formDataCollection.append("article", feedArticle);
                                     formDataCollection.append("user_id", userId);
                                     formDataCollection.append("first_name", firstName);
                                     formDataCollection.append("last_name", lastName);

                                     formDataCollection.append("feed_images_id", JSON.stringify(feedImageId > 0 ? [feedImageId] : []));

    return formDataCollection;
    }

    function addFeedPost(){
    const newsFeedData = createFeedPostFormData();
    const userId = localStorage.getItem('userId');
    $.ajax({
    type: "POST",
    url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",

    headers: {
    'access-token': localStorage.getItem('token'),
    'user_id': userId,
    'action': "CREATE"
    },
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(){
    $("#overlay").fadeIn(300);　
    },
    complete: function(){
    $("#overlay").fadeOut(300);
    },
    data: newsFeedData,
    success: function( data ) {
    console.log(data)
    //            $('#addSellingPoint').modal('hide');
    location.reload();
    },
    error: function (request, status, error) {               
    console.log(error)
    }
    });
    }

    function getFeedsByUser(){
    const userId = localStorage.getItem('userId');
    $.ajax({
    type: "POST",
    url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",

    headers: {
    'access-token': localStorage.getItem('token'),
    'user_id': userId,
    'action': "READ_ALL_BY_USER"
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
    setFeedListByUser(feedData);
    },
    error: function (request, status, error) {               
    console.log(error)
    }
    });
    }

    function setFeedListByUser(feeds){
    document.getElementById("user-feed-list").innerHTML = "";
    if (feeds.length > 0){
    feeds.forEach(function(feed) {
    const feedId = feed.id ? feed.id : 0;
    const title = feed.title ? feed.title : '';
    const article = feed.article ? feed.article : '';
    const article_short = article.substring(0,180);
    const author_first_name = feed.author_first_name ? feed.author_first_name : '';
    const author_last_name = feed.author_last_name ? feed.author_last_name : '';
    const created_date = feed.created_date ? feed.created_date : '';
    const image_name = feed.image_name ? feed.image_name : DEFAULT_FEED_IMAGE;
    const imagePath = getFilePath(5, image_name);

    const feedCard = `<div class="row">
    <div class="col-md-4">
        <img class="feed-img" src="${imagePath}" alt="" width="100%" height="180px">
    </div>

    <div class="col-md-8">
        <h3>${title}</h3>
        <p>${article_short}</p>

        <div id="manipulationBtnFeed" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${feedId}>
            <button type="button" class="btn btn-danger" id="deleteFeedBtn" onclick="showDeleteFeedModal(${feedId})" value="${feedId}"><?php echo gettext("Delete"); ?></button>
            <button type="button" class="btn btn-primary" id="editFeedBtn" onclick="getFeedDataToEdit(${feedId}, openAddFeedPostModal)" value="${feedId}"><?php echo gettext("Edit"); ?></button>
            <button type="button" class="btn btn-success" id="viewFeedBtn" onclick="goToFeedDetailsPage(${feedId})"><?php echo gettext("View"); ?></button>


        </div>

    </div>

    </div>
    <hr class="solid">`;

    var feedListObj = document.getElementById("user-feed-list");
    feedListObj.innerHTML = feedListObj.innerHTML + feedCard;

    })
    }else{

    }
    }

    function updateFeedPostDetails(){
    const newsFeedData = createFeedPostFormData();
    const userId = localStorage.getItem('userId');
    $.ajax({
    type: "POST",
    url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",

    headers: {
    'access-token': localStorage.getItem('token'),
    'user_id': userId,
    'action': "UPDATE"
    },
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(){
    $("#overlay").fadeIn(300);　
    },
    complete: function(){
    $("#overlay").fadeOut(300);
    },
    data: newsFeedData,
    success: function( data ) {
    console.log(data)
    //            $('#addSellingPoint').modal('hide');
    location.reload();
    },
    error: function (request, status, error) {               
    console.log(error)
    }
    });
    }

    function showDeleteFeedModal(feedId){
    document.getElementById("confirmFeedDelete").addEventListener("click", function() {
    deleteFeedPost(feedId);
    });

    $('#feedDeleteModal').modal('toggle');
    }


    function deleteFeedPost(feedId){
    const userId = localStorage.getItem('userId');
    $.ajax({
    type: "POST",
    url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",

    headers: {
    'access-token': localStorage.getItem('token'),
    'user_id': userId,
    'action': "DELETE"
    },
    beforeSend: function(){
    $("#overlay").fadeIn(300);　
    },
    complete: function(){
    $("#overlay").fadeOut(300);
    },
    data: { 
    feed_id: feedId,
    user_id: userId
    },
    success: function( data ) {
    console.log(data)
    location.reload();
    },
    error: function (request, status, error) {               
    console.log(error)
    }
    });
    }


    function getFeedPostDetailsByUser(feedId){
    const userId = localStorage.getItem('userId');
    $.ajax({
    type: "POST",
    url: "/kleinerzeugernetzwerk/controller/newsFeedController.php",

    headers: {
    'access-token': localStorage.getItem('token'),
    'user_id': userId,
    'action': "READ_ALL_BY_USER"
    },
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function(){
    $("#overlay").fadeIn(300);　
    },
    complete: function(){
    $("#overlay").fadeOut(300);
    },
    data: newsFeedData,
    success: function( data ) {
    console.log(data)
    },
    error: function (request, status, error) {               
    console.log(error)
    }
    });
    }

    function publishFeedPost(){
    const feedId = document.getElementById('feed-id').value != null ? document.getElementById('feed-id').value: 0;
    if (feedId == 0){
    addFeedPost();
    }else{
    updateFeedPostDetails();
    }
    }