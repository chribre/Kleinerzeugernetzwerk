<?php 
/****************************************************************
   FILE             :   userAuthController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   user authentication when sign in.
****************************************************************/
session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/userAuthModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $userCredential = new userAuth($_POST);
        echo loginUser($userCredential->email, $userCredential->password);
}

/*
    FUNCTION    :   to authenticate user login and create a authentication token.
    INPUT       :   email and password.
    OUTPUT      :   return user id and authentication token
*/   
function loginUser($email, $password){
    $loginData = [];
    global $dbConnection;
    //    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    //    $select_user = mysqli_query($dbConnection, "SELECT `user_id` FROM `user_credential` WHERE `user_name` = '$email' && password = '$passwordHashed'");
    $select_user = mysqli_query($dbConnection, "SELECT `user_id`, password FROM `user_credential` WHERE `user_name` = '$email'");
    confirmQuery($select_user);
    if(mysqli_num_rows($select_user)) {
        $row = mysqli_fetch_array($select_user);
        if (password_verify($password, $row['password'])){
            $userId = $row['user_id'];
            $token = insertSignInToken($userId);
            $userData = getUserDetails($userId);
            $loginData = $token + $userData;
            $loginData["userId"] = $userId;

            $_SESSION["isLoggedIn"] = true;
            $_SESSION["userId"] = $userId;

            $_SESSION["token"] = $token;


            http_response_code(200); //OK
            return json_encode($loginData, JSON_UNESCAPED_SLASHES);
        }
    }else{

    }
    http_response_code(400); //400 Bad Request
    return json_encode($loginData, JSON_UNESCAPED_SLASHES);
}

/*
    FUNCTION    :   Create an entry in access_token table to validate whether 
                    any web service called by a valid user.
                    A random token is generated using PHP function.
    INPUT       :   ----------------
    OUTPUT      :   authentication token and currespoding id is stored into user session for further access
*/
function insertSignInToken($userId){
    $userAuth = [];
    global $dbConnection;
    $uid = uniqid(php_uname('n'), true);
    //    $userId = $_SESSION["userId"];
    $accessTokenSql = "INSERT INTO access_token (user_id, token)"
        . "VALUES ($userId,'$uid')";
    try{
        mysqli_query($dbConnection, $accessTokenSql);
        confirmQuery($accessTokenSql);
        $accessTokenId = $dbConnection->insert_id;
        mysqli_commit($dbConnection);
        $_SESSION["token"] = $uid;
        $_SESSION["tokenId"] = $accessTokenId;

        $userAuth["token"] = $uid;
        $userAuth["tokenId"] = $accessTokenId;
        return $userAuth;
    }catch(mysqli_sql_exception $exception){
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }   
    return $userAuth;
}
?>