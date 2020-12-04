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
        $_SESSION["userId"] = $userId;
        redirect("/kleinerzeugernetzwerk/index.php");
    }else{

    }
}
function getNameFormatted($firstName, $middleName, $lastName){
}




function logout(){
    $_SESSION["isLoggedIn"] = false;
    $_SESSION["userName"] = "";
    $_SESSION["email"] = "";
    redirect("/kleinerzeugernetzwerk/index.php");
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
        mysqli_commit($dbConnection);
        $_SESSION["token"] = $uid;
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
        confirmQuery($validAccessToken);
        if (mysqli_num_rows($validAccessTokenQuery)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function clearAccessToken(){
    
}


//Add product details to product table
function addProduct($productName, $productDescription, $productCategory, $productPrice, $priceQuantity, $unit, $isProcessedFood){
    global $dbConnection;
    if (isTokenValid()){
        $producerId = $_SESSION["userId"];
        mysqli_begin_transaction($dbConnection);
        $productInsertQuery = "INSERT INTO products (producer_id, product_name, product_description, product_category, is_processed_product, is_available, price_per_unit, unit, product_rating, created_date)"
            . "VALUES ($producerId, '$productName', '$productDescription', 1, true, true, $productPrice, 1, 0)";
        
        try{
        echo "trying to insert";
        echo "\n ".$sql."\n";
        mysqli_query($dbConnection, $productInsertQuery);
        $productId = $dbConnection->insert_id;
        echo "inserted";
        echo "product id is $productId, ";
    }catch(mysqli_sql_exception $exception){
        echo "user creation failed,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }
        
    }

}
?>