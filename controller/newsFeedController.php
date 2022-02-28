<?php
/****************************************************************
   FILE             :   sellerController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   06.03.2021

   PURPOSE          :   To manage sellers and details of sellign points.
                        CRUD operations on sellers table
****************************************************************/


session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/newsFeedModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        $feedPost = new newsFeed($_POST);
        switch ($action){
            case 'CREATE':
                if (isAccessTokenValid()){
                    echo createNewsFeed($feedPost);
                }else{
                    http_response_code(401);
                }
                break;
            case 'READ_ALL_BY_USER':
                if (isAccessTokenValid()){
                    echo fetchAllNewsFeedsByUser($feedPost);
                }else{
                    http_response_code(401);
                }
                break;

            case 'READ_TO_EDIT':
                if (isAccessTokenValid()){
                    echo fetchNewsFeedInDetail($feedPost);
                }else{
                    http_response_code(401);
                }
                break;
            case 'READ':
                echo fetchNewsFeedInDetail($feedPost);
                break;
            case 'READ_ALL':
                echo fetchAllNewsFeeds();
                break;
            case 'UPDATE':
                if (isAccessTokenValid()){
                    echo editFeedPost($feedPost);
                }else{
                    http_response_code(401);
                }
                break;
            case 'DELETE':
                if (isAccessTokenValid()){
                    echo deleteFeedPost($feedPost);
                }else{
                    http_response_code(401);
                }
                break;
            default:
                http_response_code(400);
                break;
        }
        break;
    default:
        http_response_code(400);
        break;
}



/*
    FUNCTION    :   Function to add new feed article.
                    Also images of the feed article.
    INPUT       :   details of the feed article which is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
function createNewsFeed($feed){
    global $dbConnection;
//    $feedUplaodLocation = "$_SERVER[DOCUMENT_ROOT]".getImagePath(5);
    $feedUplaodLocation = getImagePath(5);
    $feedImagepath = getServerRootAddress().getImagePath(5);

    $feedInsertQuery = "INSERT INTO news_feed (title, article, author_first_name, author_last_name, user_id)"
        . "VALUES ('$feed->feedTitle', '$feed->feedArticle', '$feed->authorFirstName', '$feed->authorLastName', $feed->feedUserId)";
    try{
        if (mysqli_query($dbConnection, $feedInsertQuery)){
            $feedId = $dbConnection->insert_id;
            $fileNames = uploadPictures($feed->feedImageNameArray, $feedUplaodLocation);
            $imageQuery = createFileUploadQuery($feed->feedImageNameArray, $feed->feedImageIdArray, $feedImagepath, $feedId, 5);

            $feedImageCount = count($feed->feedImageNameArray);
            $feedImageIdCount = count($feed->feedImageIdArray);

            ob_end_clean();
            if ($feedImageCount > 0 || $feedImageIdCount > 0){
                try{
                    if (mysqli_multi_query($dbConnection, $imageQuery)){
                        http_response_code(200);
                        return true;
                    }else{
                        http_response_code(400);
                    }
                }catch(mysqli_sql_exception $exception){
                    http_response_code(400);
                }
            }else{
                http_response_code(200);
                return true;
            }
        }
    }catch(mysqli_sql_exception $exception){
        var_dump($exception);
        throw $exception;
        ob_end_clean();
        http_response_code(400);
        return false;
    }
}


/*
    FUNCTION    :   Function to update feed article and images.
    INPUT       :   details of the feed article which is passed from the web service with id
    OUTPUT      :   success/failure message on completion
*/
function editFeedPost($feed){
    global $dbConnection;
//    $feedUplaodLocation = "$_SERVER[DOCUMENT_ROOT]".getImagePath(5);
    $feedUplaodLocation = getImagePath(5);
    $feedImagepath = getServerRootAddress().getImagePath(5);
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);


    $feedUpdateQuery = "UPDATE news_feed SET title = '$feed->feedTitle', article = '$feed->feedArticle', author_first_name = '$feed->authorFirstName', author_last_name = '$feed->authorLastName', user_id = $feed->feedUserId where id = $feed->feedId";


    try{
        if (mysqli_query($dbConnection, $feedUpdateQuery)){

            $fileNames = uploadPictures($feed->feedImageNameArray, $feedUplaodLocation);
            $imageQuery = createFileUploadQuery($feed->feedImageNameArray, $feed->feedImageIdArray, $feedImagepath, $feed->feedId, 5);

            $feedImageCount = count($feed->feedImageNameArray);
            $feedImageIdCount = count($feed->feedImageIdArray);

            ob_end_clean();
            if ($feedImageCount > 0 || $feedImageIdCount > 0){
                try{
                    if (mysqli_multi_query($dbConnection, $imageQuery)){
                        mysqli_commit($dbConnection);
                        http_response_code(200);
                        return true;
                    }else{
                        mysqli_rollback($dbConnection);
                        http_response_code(400);
                    }
                }catch(mysqli_sql_exception $exception){
                    mysqli_rollback($dbConnection);
                    http_response_code(400);
                }
            }else{
                mysqli_commit($dbConnection);
                http_response_code(200);
                return true;
            }
        }
    }catch(mysqli_sql_exception $exception){
        //        echo "faild to update seller,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
        http_response_code(400);
        ob_end_clean();
        return false;
    }
    http_response_code(400);
    ob_end_clean();
    return false;
}

/*
    FUNCTION    :   function deletes an entry of news feed by a user from the database
    INPUT       :   id of the news feed to be deleted
    OUTPUT      :   return true if product deleted successully otherwise false
*/
function deleteFeedPost($feed){
    ob_start();
    global $dbConnection;
    $deleteFeedQuery = "DELETE FROM news_feed ";
    $deleteFeedQuery .= "WHERE id = $feed->feedId AND user_id = $feed->feedUserId;";
    $deleteFeedResult = mysqli_query($dbConnection, $deleteFeedQuery);
    confirmQuery($deleteFeedResult);
    if ($deleteFeedResult == true){
        ob_end_clean();
        http_response_code(200);
        return true;
    }else{
        http_response_code(400);
        return "<script>console.log('PHP: No Feeds found with the given data');</script>";
    }
    http_response_code(400);
    return false;
}
/*
    FUNCTION    :   function to fetch all news feeds sort by date
    INPUT       :   nil
    OUTPUT      :   return news feed object
*/
function fetchAllNewsFeeds(){
    $feedDataArray = [];

    global $dbConnection;
    /* Start transaction */

    $fetchAllFeedsQuery = "SELECT * from news_feed nf
LEFT JOIN images i ON i.entity_id = nf.id and i.image_type = 5";

    $getAllFeedsQuery = mysqli_query($dbConnection, $fetchAllFeedsQuery);
    confirmQuery($getAllFeedsQuery);
    $feedCount = mysqli_num_rows($getAllFeedsQuery);
    if ($feedCount == 0){
        $feedArray = [];
        http_response_code(200);
        return $feedArray;
    }else{
        while($row = mysqli_fetch_assoc($getAllFeedsQuery)) {
            $feed = $row;
            array_push($feedDataArray, $feed);
        }
        http_response_code(200);
        ob_end_clean();
        return json_encode($feedDataArray, JSON_UNESCAPED_SLASHES);
    }
    http_response_code(401);
    ob_end_clean();
    return false;
}

/*
    FUNCTION    :   function to fetch all news feeds sort by date
    INPUT       :   nil
    OUTPUT      :   return news feed object
*/
function fetchAllNewsFeedsByUser($feed){
    $feedDataArray = [];

    global $dbConnection;
    /* Start transaction */

    $fetchAllFeedsQuery = "SELECT * from news_feed nf
LEFT JOIN images i ON i.entity_id = nf.id and i.image_type = 5
WHERE nf.user_id = $feed->feedUserId";

    $getAllFeedsQuery = mysqli_query($dbConnection, $fetchAllFeedsQuery);
    confirmQuery($getAllFeedsQuery);
    $feedCount = mysqli_num_rows($getAllFeedsQuery);
    if ($feedCount == 0){
        $feedArray = [];
        http_response_code(200);
        return $feedArray;
    }else{
        while($row = mysqli_fetch_assoc($getAllFeedsQuery)) {
            $feed = $row;
            array_push($feedDataArray, $feed);
        }
        http_response_code(200);
        ob_end_clean();
        return json_encode($feedDataArray);
    }
    http_response_code(401);
    ob_end_clean();
    return false;
}

/*
    FUNCTION    :   function to fetch all news feeds sort by date
    INPUT       :   nil
    OUTPUT      :   return news feed object
*/
function fetchNewsFeedInDetail($feed){
    $feedDataArray = [];

    global $dbConnection;
    /* Start transaction */

    $fetchAllFeedsQuery = "SELECT nf.id,
nf.title,
nf.article,
nf.author_first_name,
nf.author_last_name,
nf.user_id,
nf.created_date,
i.image_id,
i.image_type,
i.image_name,
i.image_path from news_feed nf
LEFT JOIN images i ON i.entity_id = nf.id and i.image_type = 5
WHERE nf.id = $feed->feedId;";

    $fetchAllFeedsQuery .= "SELECT nf.id as prev_id,
nf.title as prev_title,
nf.article as prev_article,
nf.author_first_name as prev_author_first_name,
nf.author_last_name as prev_author_last_name,
nf.user_id as prev_user_id,
nf.created_date as prev_created_date,
i.image_id as prev_image_id,
i.image_type as prev_image_type,
i.image_name as prev_image_name,
i.image_path as prev_image_path from news_feed nf LEFT JOIN images i ON i.entity_id = nf.id and i.image_type = 5 WHERE nf.created_date < (SELECT nf_prev.created_date from news_feed nf_prev WHERE nf_prev.id = $feed->feedId) ORDER BY nf.created_date DESC LIMIT 1;";

    $fetchAllFeedsQuery .= "SELECT nf.id as next_id,
nf.title as next_title,
nf.article as next_article,
nf.author_first_name as next_author_first_name,
nf.author_last_name as next_author_last_name,
nf.user_id as next_user_id,
nf.created_date as next_created_date,
i.image_id as next_image_id,
i.image_type as next_image_type,
i.image_name as next_image_name,
i.image_path as next_image_path from news_feed nf LEFT JOIN images i ON i.entity_id = nf.id and i.image_type = 5 WHERE nf.created_date > (SELECT nf_prev.created_date from news_feed nf_prev WHERE nf_prev.id = $feed->feedId) ORDER BY nf.created_date LIMIT 1;";


    if (mysqli_multi_query($dbConnection, $fetchAllFeedsQuery)) {
        do {
            // Store first result set
            if ($result = mysqli_store_result($dbConnection)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $feedDataArray = $feedDataArray + $row;

                }
            }

        } while(mysqli_more_results($dbConnection) && mysqli_next_result($dbConnection));

        http_response_code(200);
        ob_end_clean();
        return json_encode($feedDataArray, JSON_UNESCAPED_SLASHES);

    }
    http_response_code(401);
    ob_end_clean();
    return false;
}
?>