<?php 
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/config.php");

function redirect($location){


    header("Location:" . $location);
    exit;

}


function createUser($salutation, $fName, $mName, $lName, $dob, $street, $houseNum, $zip, $city, $country, $phone, $mobile, $email, $password, $userType, $isActive, $isBlocked, $profileImageName){

    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);

    $sql = "INSERT INTO user (salutations, first_name, middle_name, last_name, dob, street, house_number, zip, city, country, phone, mobile, email, profile_image_name, user_type, is_active, is_blocked)"
        . "VALUES ('$salutation', '$fName', '$mName', '$lName', '$dob', '$street', '$houseNum', '$zip', '$city', '$country', '$phone', '$mobile', '$email', '$profileImageName', $userType, $isActive, $isBlocked)";

    try{
        echo "trying to insert";
        echo "\n ".$sql."\n";
        mysqli_query($dbConnection, $sql);
        $user_id = $dbConnection->insert_id;
        echo "inserted";
        echo "user id is $user_id, ";
        if (saveUserCredentials($user_id, $email, $password)){
            return true;
        }else{
            return false;
        }
    }catch(mysqli_sql_exception $exception){
        echo "user creation failed,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }
    return false;
}

function saveUserCredentials($userId, $email, $password){
    global $dbConnection;
    $user_credential_query = "INSERT INTO user_credential(user_id, user_name, password)"
        ."VALUES($userId, '$email', '$password')";

    try{
        mysqli_query($dbConnection, $user_credential_query);
        confirmQuery($user_credential_query);
        mysqli_commit($dbConnection);
        echo "account created, ";
        return true;
    }catch(mysqli_sql_exception $exception){
        echo "user creation failed,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }        
    return false;
}

function isUserAlreadyExist($email){
    global $dbConnection;
    $selectEmail = mysqli_query($dbConnection, "SELECT `email` FROM `user` WHERE `email` = '$email'");
    confirmQuery($selectEmail);
    if(mysqli_num_rows($selectEmail)) {
        //        exit(mysqli_error($dbConnection));
        return true;
    }
    return false;
}


function confirmQuery($result) {

    global $dbConnection;

    if(!$result ) {

        die("QUERY FAILED ." . mysqli_error($connection));


    }
}

function escapeSQLString($string) {

    global $dbConnection;

    return mysqli_real_escape_string($dbConnection, trim($string));


}


function loginUser($email, $password){
    global $dbConnection;
    $select_user = mysqli_query($dbConnection, "SELECT `user_id` FROM `user_credential` WHERE `user_name` = '$email' && password = '$password'");
    confirmQuery($select_user);
    if(mysqli_num_rows($select_user)) {
        $row = mysqli_fetch_array($select_user);
        $userId = $row['user_id'];
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["userId"] = $userId;
        echo "User_Found $userId";
        insertSignInToken();
        getUserDetails($userId);
        return true;
    }else{
        $_SESSION["isLoggedIn"] = false;
        redirect("/kleinerzeugernetzwerk/src/errorPage.php");
        echo $loginFailAlert;
    }
    return false;
}

function getUserDetails($userId){
    global $dbConnection;
    $userSelectQuery = mysqli_query($dbConnection, "SELECT * FROM `user` WHERE `user_id` = '$userId'");
    confirmQuery($userSelectQuery);
    if (mysqli_num_rows($userSelectQuery)){
        $row = mysqli_fetch_array($userSelectQuery);
        $fName = $row['first_name'];
        $mName = $row['middle_name'];
        $lName = $row['last_name'];
        $_SESSION["userName"] = $fName." ".$mName." ".$lName;
        $email = $row['email'];
        $_SESSION["email"] = $email;
        redirect("/kleinerzeugernetzwerk/index.php");
    }else{

    }
}
function getNameFormatted($firstName, $middleName, $lastName){
}




function logout(){
    removeAuthToken();
}

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


function insertSignInToken(){
    global $dbConnection;
    $uid = uniqid(php_uname('n'), true);
    $userId = $_SESSION["userId"];
    $accessTokenSql = "INSERT INTO access_token (user_id, token)"
        . "VALUES ($userId,'$uid')";
    try{
        mysqli_query($dbConnection, $accessTokenSql);
        confirmQuery($accessTokenSql);
        $accessTokenId = $dbConnection->insert_id;
        mysqli_commit($dbConnection);
        $_SESSION["token"] = $uid;
        $_SESSION["tokenId"] = $accessTokenId;
    }catch(mysqli_sql_exception $exception){
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }   

}

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


//Add product details to product table
function addProduct($productName, $productDescription, $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating, $fileNameArray){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);
    if (isTokenValid()){
        $producerId = $_SESSION["userId"];
        mysqli_begin_transaction($dbConnection);
        $productInsertQuery = "INSERT INTO products (producer_id, product_name, product_description, product_category, production_location, is_processed_product, is_available, price_per_unit, quantity_of_price, unit, product_rating)"
            . "VALUES ($producerId, '$productName', '$productDescription', $productCategory, $productionLocation, $isProcessedProduct, $isAvailable, $productPrice, $priceQuantity, $unit, $productRating)";


        try{
            echo "trying to insert";
            echo "\n ".$productInsertQuery."\n";
            if (mysqli_query($dbConnection, $productInsertQuery))
                echo "   inserted succesfully   ";
            //            confirmQuery($productInsertQuery);
            $productId = $dbConnection->insert_id;
            $fileCount = count($fileNameArray);
            $productImageQuery = "";
            if ($fileCount > 0){
                for ($i = 0; $i<$fileCount; $i++){
                    $imageName = $fileNameArray[$i];
                    $productImageQuery .= "INSERT INTO images (image_type, image_name, entity_id) VALUES (1, '$imageName', $productId);";
                }
                echo $productImageQuery;
                if (mysqli_query($dbConnection, $productImageQuery)){
                    echo "  Files inserted succesfully   ";
                    mysqli_commit($dbConnection);
                }else{
                    echo "product creation failed at inserting images,";
                    mysqli_rollback($dbConnection);
                }
            }else{
                mysqli_commit($dbConnection);
                echo "inserted";
                echo "product id is $productId, ";
            }

        }catch(mysqli_sql_exception $exception){
            echo "product creation failed,";
            mysqli_rollback($dbConnection);
            var_dump($exception);
            throw $exception;

        }

    }

}


function addProductionPoint($pointName, $pointDescription, $pointAddress, $latitude, $longitude, $area){
    global $dbConnection;
    /* Start transaction */
    mysqli_begin_transaction($dbConnection);
    if (isTokenValid()){
        $producerId = $_SESSION["userId"];
        mysqli_begin_transaction($dbConnection);
        $productionPointInsertQuery = "INSERT INTO farm_land (producer_id, farm_name, farm_desc, farm_address, farm_location, farm_area	)"
            . "VALUES ($producerId, '$pointName', '$pointDescription', '$pointAddress', POINT($latitude, $longitude), $area)";

        try{
            echo "trying to insert";
            echo "\n ".$productionPointInsertQuery."\n";
            if (mysqli_query($dbConnection, $productionPointInsertQuery))
                echo "   inserted succesfully   ";
            //            confirmQuery($productInsertQuery);
            $productionPointId = $dbConnection->insert_id;
            mysqli_commit($dbConnection);

            echo "inserted";
            echo "production Point id is $productionPointId, ";
        }catch(mysqli_sql_exception $exception){
            echo "faild to add a new production point,";
            mysqli_rollback($dbConnection);
            var_dump($exception);
            throw $exception;

        }

    }

}


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

function getAllProducts(){
    ob_start();
    global $dbConnection;
    $productsQuery = mysqli_query($dbConnection, "SELECT p.product_id, p.product_name, p.product_description, p.product_category, X(f.farm_location) as Lat, Y(f.farm_location) as Lon FROM `products` p JOIN farm_land f ON p.production_location=f.farm_id");
    confirmQuery($productsQuery);
    if ($productsQuery->num_rows > 0){
        $result = mysqli_fetch_all($productsQuery, MYSQLI_ASSOC);
        ob_end_clean();
        return json_encode($result);
    }else{
        echo "No products found. Try Adding some products";
    }
}


?>