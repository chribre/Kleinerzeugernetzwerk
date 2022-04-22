<?php 
/****************************************************************
   FILE:      functions.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  09.02.2021

   PURPOSE:   All commonly used functions are written here
****************************************************************/

require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/config.php");
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/ftp_config.php");

/*
    FUNCTION    :   To redirect to different location.
    INPUT       :   location as path of the page.
    OUTPUT      :   content from the specified location is loaded.
*/
function redirect($location){
    header("Location:" . $location);
    exit;
}


/*
    FUNCTION    :   to store user data when a new user is registering.
    INPUT       :   user details -> sign up form data.
    OUTPUT      :   return true if the user is successfully registered otherwise false
*/
//function createUser($salutation, $fName, $mName, $lName, $dob, $street, $houseNum, $zip, $city, $country, $phone, $mobile, $email, $password, $userType, $isActive, $isBlocked, $profileImageName){
//
//    global $dbConnection;
//    /* Start transaction */
//    mysqli_begin_transaction($dbConnection);
//
//    $sql = "INSERT INTO user (salutations, first_name, middle_name, last_name, dob, street, house_number, zip, city, country, phone, mobile, email, profile_image_name, user_type, is_active, is_blocked)"
//        . "VALUES ('$salutation', '$fName', '$mName', '$lName', '$dob', '$street', '$houseNum', '$zip', '$city', '$country', '$phone', '$mobile', '$email', '$profileImageName', $userType, $isActive, $isBlocked)";
//
//    try{
//        echo "trying to insert";
//        echo "\n ".$sql."\n";
//        mysqli_query($dbConnection, $sql);
//        $user_id = $dbConnection->insert_id;
//        echo "inserted";
//        echo "user id is $user_id, ";
//        if (saveUserCredentials($user_id, $email, $password)){
//            return true;
//        }else{
//            return false;
//        }
//    }catch(mysqli_sql_exception $exception){
//        echo "user creation failed,";
//        mysqli_rollback($dbConnection);
//        var_dump($exception);
//        throw $exception;
//    }
//    return false;
//}

/*
    FUNCTION    :   to store user name and password during new user registration.
    INPUT       :   user id, email and password.
    OUTPUT      :   return true if the user crediantials stored successfully otherwise false
*/
//function saveUserCredentials($userId, $email, $password){
//    global $dbConnection;
//    $user_credential_query = "INSERT INTO user_credential(user_id, user_name, password)"
//        ."VALUES($userId, '$email', '$password')";
//
//    try{
//        mysqli_query($dbConnection, $user_credential_query);
//        confirmQuery($user_credential_query);
//        mysqli_commit($dbConnection);
//        echo "account created, ";
//        return true;
//    }catch(mysqli_sql_exception $exception){
//        echo "user creation failed,";
//        mysqli_rollback($dbConnection);
//        var_dump($exception);
//        throw $exception;
//    }        
//    return false;
//}


/*
    FUNCTION    :   to check whether the user's email address already registererd in the system
    INPUT       :   email address
    OUTPUT      :   return true if the user already exist otherwise false
*/
//function isUserAlreadyExist($email){
//    global $dbConnection;
//    $selectEmail = mysqli_query($dbConnection, "SELECT `email` FROM `user` WHERE `email` = '$email'");
//    confirmQuery($selectEmail);
//    if(mysqli_num_rows($selectEmail)) {
//        //        exit(mysqli_error($dbConnection));
//        return true;
//    }
//    return false;
//}


/*
    FUNCTION    :   to check the sql query returns any valid results
    INPUT       :   result from the sql query
    OUTPUT      :   exit and print failure message
*/
function confirmQuery($result) {

    global $dbConnection;
    if(!$result ) {

        die("QUERY FAILED ." . mysqli_error($connection));


    }
}


/*
    FUNCTION    :   Escapes special characters in a string for use in an SQL statement to avoid SQL injections
    INPUT       :   connection string and query string
    OUTPUT      :   Returns the escaped string, or false on error.
*/
function escapeSQLString($string) {

    global $dbConnection;

    return mysqli_real_escape_string($dbConnection, trim($string));


}


/*
    FUNCTION    :   handle user login by supplying username amd password
    INPUT       :   email & password
    OUTPUT      :   success: if it is a valid username and pasword, failure: display error message
*/
//function loginUser($email, $password){
//    global $dbConnection;
//    $select_user = mysqli_query($dbConnection, "SELECT `user_id` FROM `user_credential` WHERE `user_name` = '$email' && password = '$password'");
//    confirmQuery($select_user);
//    if(mysqli_num_rows($select_user)) {
//        $row = mysqli_fetch_array($select_user);
//        $userId = $row['user_id'];
//        $_SESSION["isLoggedIn"] = true;
//        $_SESSION["userId"] = $userId;
//        echo "User_Found $userId";
//        insertSignInToken();
//        getUserDetails($userId);
//        return true;
//    }else{
//        $_SESSION["isLoggedIn"] = false;
//        redirect("/kleinerzeugernetzwerk/src/errorPage.php");
//        echo $loginFailAlert;
//    }
//    return false;
//}

/*
    FUNCTION    :   to fetch details of the user and store in session for further use
    INPUT       :   user id
    OUTPUT      :   store name, email into the session variable
*/
function getUserDetails($userId){
    $userData = [];
    global $dbConnection;

    $userDetailsQuery = "SELECT * FROM `user` 
    LEFT JOIN images i on (i.image_type = 1 AND i.entity_id = $userId)
    WHERE `user_id` = '$userId'";

    $userSelectQuery = mysqli_query($dbConnection, $userDetailsQuery);
    confirmQuery($userSelectQuery);
    if (mysqli_num_rows($userSelectQuery)){
        $row = mysqli_fetch_array($userSelectQuery);
        $fName = $row['first_name'];
        $mName = $row['middle_name'];
        $lName = $row['last_name'];
        $_SESSION["userName"] = $fName." ".$mName." ".$lName;
        $email = $row['email'];
        $_SESSION["email"] = $email;
        $userData["userName"] = $fName." ".$mName." ".$lName;
        $userData["email"] = $email;
        $userData['isProfessional'] = $row['is_professional'];
        $userData['imagePath'] = $row['image_path'];
        $userData['imageName'] = $row['image_name'];
        return $userData;
        //        redirect("/kleinerzeugernetzwerk/index.php");
    }else{

    }
    return $userData;
}
function getNameFormatted($firstName, $middleName, $lastName){
}

/*
    FUNCTION    :   Function to call logout service  
*/
function logout(){
    removeAuthToken();
}


/*
    FUNCTION    :   Function to remove user login details when logged out
    INPUT       :   
    OUTPUT      :   deletes authentication token, user id and token id from user session as well as backend
                    resirect user to the index page after successful logout
*/
function removeAuthToken(){
    global $dbConnection;
    $token = $_SESSION["token"];
    $userId = $_SESSION["userId"];
    $tokenId = $_SESSION["tokenId"];
    $clearAccessTokenQuery = "DELETE FROM `access_token` WHERE `token_id` = '$tokenId' AND `user_id` = '$userId'";
    try{
        mysqli_query($dbConnection, $clearAccessTokenQuery);
        confirmQuery($clearAccessTokenQuery);
        mysqli_commit($dbConnection);
        $_SESSION["token"] = null;
        $_SESSION["tokenId"] = null;
        $_SESSION["isLoggedIn"] = false;
        $_SESSION["userName"] = "";
        $_SESSION["email"] = "";
        redirect("/kleinerzeugernetzwerk/index.php");
    }catch(mysqli_sql_exception $exception){
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }   
}

//Show profile screen in <div> when clicking on Profile in sidebar
function showUserProfileScreen() {
    echo 'I just ran a php function';
}

if (isset($_GET['user'])) {
    showUserProfileScreen();

}

/*
    FUNCTION    :   Create an entry in access_token table to validate whether 
                    any web service called by a valid user.
                    A random token is generated using PHP function.
    INPUT       :   ----------------
    OUTPUT      :   authentication token and currespoding id is stored into user session for further access
*/
//function insertSignInToken(){
//    global $dbConnection;
//    $uid = uniqid(php_uname('n'), true);
//    $userId = $_SESSION["userId"];
//    $accessTokenSql = "INSERT INTO access_token (user_id, token)"
//        . "VALUES ($userId,'$uid')";
//    try{
//        mysqli_query($dbConnection, $accessTokenSql);
//        confirmQuery($accessTokenSql);
//        $accessTokenId = $dbConnection->insert_id;
//        mysqli_commit($dbConnection);
//        $_SESSION["token"] = $uid;
//        $_SESSION["tokenId"] = $accessTokenId;
//    }catch(mysqli_sql_exception $exception){
//        mysqli_rollback($dbConnection);
//        var_dump($exception);
//        throw $exception;
//    }   
//
//}

/*
    FUNCTION    :   To valide user authenticity on each web service call
                    A random token is generated using PHP function.
    INPUT       :   user id and authentication token string
    OUTPUT      :   return true if it is by a valid user otherwise return false
*/
function isTokenValid(){
    global $dbConnection;

    if (isset($_SESSION["token"]) && isset($_SESSION["userId"])){
        $token = $_SESSION["token"];
        $userId = $_SESSION["userId"];
        $validAccessTokenQuery = mysqli_query($dbConnection, "SELECT * FROM `access_token` WHERE `token` = '$token' AND `user_id` = '$userId'");
        confirmQuery($validAccessTokenQuery);
        if (mysqli_num_rows($validAccessTokenQuery)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function isAccessTokenValid(){
    global $dbConnection;
    $header = apache_request_headers();
    $token = $header['access-token'];
    $userId = $header['user_id'];
    $validAccessTokenQuery = mysqli_query($dbConnection, "SELECT * FROM `access_token` WHERE `token` = '$token' AND `user_id` = '$userId'");
    confirmQuery($validAccessTokenQuery);
    if (mysqli_num_rows($validAccessTokenQuery)){
        return true;
    }
    return false;
}

//Add product details to product table
//function addProduct($productName, $productDescription, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating, $fileNameArray, $productFeaturesArray){
//    global $dbConnection;
//    /* Start transaction */
//    mysqli_begin_transaction($dbConnection);
//    if (isTokenValid()){
//        $producerId = $_SESSION["userId"];
//        mysqli_begin_transaction($dbConnection);
//        $productInsertQuery = "INSERT INTO products (producer_id, product_name, product_description, product_category, production_location, is_processed_product, is_available, price_per_unit, quantity_of_price, unit, product_rating)"
//            . "VALUES ($producerId, '$productName', '$productDescription', $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating)";
//
//
//        try{
//            echo "trying to insert";
//            echo "\n ".$productInsertQuery."\n";
//            if (mysqli_query($dbConnection, $productInsertQuery))
//                echo "   inserted succesfully   ";
//            //            confirmQuery($productInsertQuery);
//            $productId = $dbConnection->insert_id;
//
//
//            $productFeaturesCount = count($productFeaturesArray);
//            $productfeatureQuery = "INSERT INTO product_feature (product_id, feature_type) VALUES ";
//            if ($productFeaturesCount > 0){
//                for ($i = 0; $i<$productFeaturesCount; $i++){
//                    $featureType = $productFeaturesArray[$i];
//                    $productfeatureQuery .= "($productId, $featureType)";
//                    if ($i===$productFeaturesCount-1){
//                        $productfeatureQuery .= ";";
//                    }else{
//                        $productfeatureQuery .= ", ";
//                    }
//                }
//                echo $productImageQuery;
//                if (mysqli_query($dbConnection, $productfeatureQuery)){
//                    echo "  Files inserted succesfully   ";
////                    mysqli_commit($dbConnection);
//                }else{
//                    echo "product creation failed at inserting images,";
//                    mysqli_rollback($dbConnection);
//                }
//            }
//
//            $fileCount = count($fileNameArray);
//            $productImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";
//            if ($fileCount > 0){
//                for ($i = 0; $i<$fileCount; $i++){
//                    $imageName = $fileNameArray[$i];
//                    $productImageQuery .= "(1, '$imageName', $productId)";
//                    if ($i===$fileCount-1){
//                        $productImageQuery .= ";";
//                    }else{
//                        $productImageQuery .= ", ";
//                    }
//                }
//                echo $productImageQuery;
//                if (mysqli_query($dbConnection, $productImageQuery)){
//                    echo "  Files inserted succesfully   ";
//                    mysqli_commit($dbConnection);
//                }else{
//                    echo "product creation failed at inserting images,";
//                    mysqli_rollback($dbConnection);
//                }
//            }else{
//                mysqli_commit($dbConnection);
//                echo "inserted";
//                echo "product id is $productId, ";
//            }
//
//        }catch(mysqli_sql_exception $exception){
//            echo "product creation failed,";
//            mysqli_rollback($dbConnection);
//            var_dump($exception);
//            throw $exception;
//
//        }
//
//    }
//
//}



/*
    FUNCTION    :   Function to add new production point details into the table.
                    Also images of the production point.
    INPUT       :   details of the product which is passed from the web service
    OUTPUT      :   success/failure message on completion
*/
//function addProductionPoint($pointName, $pointDescription, $pointAddress, $latitude, $longitude, $area, $fileNameArray){
//    global $dbConnection;
//    /* Start transaction */
//    if (isTokenValid()){
//        $producerId = $_SESSION["userId"];
//        mysqli_begin_transaction($dbConnection);
//        $productionPointInsertQuery = "INSERT INTO farm_land (producer_id, farm_name, farm_desc, farm_address, farm_location, farm_area	)"
//            . "VALUES ($producerId, '$pointName', '$pointDescription', '$pointAddress', POINT($latitude, $longitude), $area)";
//
//        try{
//            echo "trying to insert";
//            echo "\n ".$productionPointInsertQuery."\n";
//            if (mysqli_query($dbConnection, $productionPointInsertQuery))
//                echo "   inserted succesfully   ";
//            //            confirmQuery($productInsertQuery);
//            $productionPointId = $dbConnection->insert_id;
//            $fileCount = count($fileNameArray);
//            $productionPointImageQuery = "INSERT INTO images (image_type, image_name, entity_id) VALUES ";
//            if ($fileCount > 0){
//                for ($i = 0; $i<$fileCount; $i++){
//                    $imageName = $fileNameArray[$i];
//                    $productionPointImageQuery .= "(2, '$imageName', $productionPointId)";
//                    if ($i===$fileCount-1){
//                        $productionPointImageQuery .= ";";
//                    }else{
//                        $productionPointImageQuery .= ", ";
//                    }
//                }
//                echo $productionPointImageQuery;
//                if (mysqli_query($dbConnection, $productionPointImageQuery)){
//                    echo "  Files inserted succesfully   ";
//                    mysqli_commit($dbConnection);
//                }else{
//                    echo "product creation failed at inserting images,";
//                    mysqli_rollback($dbConnection);
//                }
//            }else{
//                mysqli_commit($dbConnection);
//
//                echo "inserted";
//                echo "production Point id is $productionPointId, ";
//            }
//        }catch(mysqli_sql_exception $exception){
//            echo "faild to add a new production point,";
//            mysqli_rollback($dbConnection);
//            var_dump($exception);
//            throw $exception;
//
//        }
//
//    }
//
//}

/*
    FUNCTION    :   generate a random unique file name to store images into database. 

    INPUT       :   ----------------
    OUTPUT      :   a unique random string is returned
*/
function generateFileName(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/*
    FUNCTION    :   generate a random unique file name to store images into database. 

    INPUT       :   ----------------
    OUTPUT      :   a unique random string is returned as file name
*/
function getProductCategories(){
    global $dbConnection;
    $productCategoryQuery = mysqli_query($dbConnection, "SELECT * FROM `product_category`");
    confirmQuery($productCategoryQuery);
    if ($productCategoryQuery->num_rows > 0){
        $result = mysqli_fetch_all($productCategoryQuery, MYSQLI_ASSOC);
        $_SESSION["productCategories"] = $result;
    }else{
        echo "No categories found. Try Adding some categories";
    }
}
/*
    FUNCTION    :   fetch all product features from the backend to show 
                    it when addign a new product in the add product modal 

    INPUT       :   ----------------
    OUTPUT      :   list of features and their ids stored into the session variable
*/
function getProductFeatures(){
    global $dbConnection;
    $productFeatureQuery = mysqli_query($dbConnection, "SELECT * FROM `feature_type`");
    confirmQuery($productFeatureQuery);
    if ($productFeatureQuery->num_rows > 0){
        $result = mysqli_fetch_all($productFeatureQuery, MYSQLI_ASSOC);
        $_SESSION["productFeatures"] = $result;
    }else{
        echo "No Features found. Try Adding some categories";
    }
}

/*
    FUNCTION    :   fetch all product units from the backend to show 
                    it when addign a new product in the add product modal 

    INPUT       :   ----------------
    OUTPUT      :   list of units and their ids stored into the session variable
*/
function getProductUnits(){
    global $dbConnection;
    $unitQuery = mysqli_query($dbConnection, "SELECT * FROM `units`");
    confirmQuery($unitQuery);
    if ($unitQuery->num_rows > 0){
        $result = mysqli_fetch_all($unitQuery, MYSQLI_ASSOC);
        $_SESSION["productUnits"] = $result;
    }else{
        echo "No units found. Try Adding some units";
    }
}

/*
    FUNCTION    :   fetch all products from the backend to show it in the map

    INPUT       :   ----------------
    OUTPUT      :   list of products with name, desc, category, address, and location
*/
function getAllProducts(){
    ob_start();
    global $dbConnection;
    $productsQuery = mysqli_query($dbConnection, "SELECT p.product_id, p.product_name, p.product_description, p.product_category, X(f.farm_location) as Lat, Y(f.farm_location) as Lon, f.farm_address FROM `products` p JOIN farm_land f ON p.production_location=f.farm_id");
    confirmQuery($productsQuery);
    if ($productsQuery->num_rows > 0){
        $result = mysqli_fetch_all($productsQuery, MYSQLI_ASSOC);
        ob_end_clean();
        return json_encode($result, JSON_UNESCAPED_SLASHES);
    }else{
        echo "No products found. Try Adding some products";
    }
}

/*
    FUNCTION    :   fetch all production points of all users from the backend to show it in the map

    INPUT       :   ----------------
    OUTPUT      :   list of production points with name, desc, owner details, address, and location
*/
function getAllProducersAndSellers(){
    ob_start();
    global $dbConnection;
    $producersQuery = mysqli_query($dbConnection, "SELECT f.farm_id, f.farm_name, f.farm_address, X(f.farm_location) as Lat, Y(f.farm_location) as Lon, u.user_id, u.first_name, u.last_name, u.middle_name, u.street, u.house_number, u.zip, u.city, u.mobile, u.phone, u.email, u.user_type from farm_land f JOIN user u on(f.producer_id = u.user_id)");
    confirmQuery($producersQuery);
    if ($producersQuery->num_rows > 0){
        $result = mysqli_fetch_all($producersQuery, MYSQLI_ASSOC);
        ob_end_clean();
        return json_encode($result, JSON_UNESCAPED_SLASHES);
    }else{
        echo "No products found. Try Adding some products";
    }
}


/*
    FUNCTION    :   to add pictures into file storage
    INPUT       :   pictures
    OUTPUT      :   return true if files uplaoded successfully successully
*/
function uploadPictures($fileNames, $fileUploadLocation){
    $fileNameArray = [];
//    $fileUploadLocation = '';
    $productPictures = $_FILES['files']['name'] ? $_FILES: [];
    if (count($productPictures['files']['name']) > 0){
        $totalFiles = count($_FILES['files']['name']);
        for( $i=0 ; $i < $totalFiles ; $i++ ) {

            //Get the temp file path
            $tmpFilePath = $_FILES['files']['tmp_name'][$i];

            //Make sure we have a file path
            if ($tmpFilePath != ""){
                //create a new unique file name
                $newFileName = $fileNames[$i] ? $fileNames[$i] : uniqid();
                //Setup our new file path
                $newFilePath = $fileUploadLocation . $newFileName;

                //Upload the file into the temp dir
//                uplaodFileToFTP($tmpFilePath, $newFilePath);
                if(uplaodFileToFTP($tmpFilePath, $newFilePath)) {
                    array_push($fileNameArray, $newFileName);
                    //Handle other code here

                }else{
                    return false;
                }
//                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
//                    array_push($fileNameArray, $newFileName);
//                    //Handle other code here
//
//                }
            }
        }
    }
    return $fileNameArray;
}




function uplaodFileToFTP($file, $targetFile){
//    $ftp_server="202.61.242.150";
//    $ftp_user_name="kn_uploads";
//    $ftp_user_pass="kleinerzeugernetzwerk";
    
    $ftp_server=FTP_SERVER;
    $ftp_user_name=FTP_USER_NAME;
    $ftp_user_pass=FTP_USER_PASS;
    
//    ($FTP_SERVER, $FTP_USER_NAME, $FTP_USER_PASS) = ftpConfig();
    $file = $file;//tobe uploaded
    $remote_file = $targetFile;

    // set up basic connection
    $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

    // login with username and password
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    ftp_pasv($conn_id, true);
    // upload a file
    if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
        echo "successfully uploaded $file\n";
        return true;
    } else {
        echo "There was a problem while uploading $file\n";
        return false;
    }
    // close the connection
    ftp_close($conn_id);
    return false;
}








/*
    FUNCTION    :   to add product image path and file names into database
    INPUT       :   file names and product id
    OUTPUT      :   return query string to add to database
*/
function createFileUploadQuery($fileNames, $fileIdArray, $fileAccessPath, $entityId, $entityType){
    $fileQuery = "";
    for ($i = 0; $i < count($fileIdArray); $i++){
        $fileName = $fileNames[$i];
        $fileId = $fileIdArray[$i];
        $filePath = $fileAccessPath . $fileName;
        if ($fileId == 0 && $fileName != ""){
            $fileQuery .= "INSERT INTO images (image_type, image_name, image_path, entity_id) VALUES ";
            $fileQuery .= "($entityType, '$fileName', '$filePath', $entityId);";
        }elseif($fileId != 0 && $fileName != ""){
            $fileQuery .= "UPDATE images  SET image_type = $entityType, image_name = '$fileName', image_path = '$filePath', entity_id =  $entityId WHERE image_id = $fileId;";
        }elseif($fileId != 0 && $fileName == ""){
            $fileQuery .= "DELETE FROM images WHERE image_id = $fileId;";
        }
    }
    return $fileQuery;
}

/*
    FUNCTION    :   parse details of uploading files from ajax call
    INPUT       :   files and ids
    OUTPUT      :   returns newly generated unique file names and files id 
                    filled with 0 if anything want to be deleted
*/
function parseFileData($files, $fileIds){
    $imageCount = count($files);
    $imageIdCount = count($fileIds);

    $productImageFileName = [];
    $imageIds = $fileIds;
    
    $deleteImageCount = 0;
    $addNewImageCount = 0;


    if ($imageCount > 0){
        foreach ($files as &$name) {
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $newFileName = uniqid().'.'.$ext;
            array_push($productImageFileName,$newFileName);

        }
    
    $deleteImageCount = $imageIdCount - $imageCount;
    $addNewImageCount = $imageCount - $imageIdCount; 
    
    }

    if ($deleteImageCount > 0){
        $productImageFileName = array_pad($productImageFileName, $imageIdCount, "");
    }else{
        $productImageFileName = [];
    }
    if ($addNewImageCount > 0){
        $imageIds = array_pad($imageIds, $imageCount, 0);
    }else{
        $imageIds = [];
    }

    return ['fileName' => $productImageFileName, 'fileIds' => $imageIds];
}

/*
    FUNCTION    :   get root address of the server
    INPUT       :   -----
    OUTPUT      :   returns root address of the server as string
*/
function getServerRootAddress(){
    $localServer = 'http://localhost';
    $awsServer = 'http://ec2-18-184-142-200.eu-central-1.compute.amazonaws.com';

        return $localServer;
//    return $awsServer;
}


/*
    FUNCTION    :   get image path to store images
    INPUT       :   -----
    OUTPUT      :   returns imagePath where the images stored as string
*/
function getImagePath($imageType){
    $basePath = FTP_BASE_PATH;
    switch($imageType){
        case 1:
            return $basePath . "/kleinerzeugernetzwerk_uploads/profile_img/";
        case 2:
            return $basePath . "/kleinerzeugernetzwerk_uploads/product_img/";
        case 3:
            return $basePath . "/kleinerzeugernetzwerk_uploads/production_point_img/";
        case 4:
            return $basePath . "/kleinerzeugernetzwerk_uploads/seller_img/";
        case 5:
            return $basePath . "/kleinerzeugernetzwerk_uploads/news_feeds/";
        default:
            return "";
    }
}
?>