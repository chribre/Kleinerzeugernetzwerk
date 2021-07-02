<?php 
/****************************************************************
   FILE             :   userAuthController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   20.06.2021

   PURPOSE          :   user authentication when sign in & reset password.
****************************************************************/
session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/userAuthModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        switch ($action){
            case 'CREATE':
                $userCredential = new userAuth($_POST);
                echo loginUser($userCredential->email, $userCredential->password);
                break;
            case 'RESET_PASSWORD_REQUEST':
                $email = $_POST["email"];
                echo sendResetPasswordEmail($email);
                break;
            case 'RESET_PASSWORD':
                $email = $_POST["email"] ? $_POST["email"] : '';
                $password = $_POST["password"] ? $_POST["password"] : '';
                $token = $header['token'] ? $header['token'] : '';
                echo changePassword($email, $password, $token);
                break;
            default:
                http_response_code(400);
                break;
        }

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

function sendResetPasswordEmail($email){
    global $dbConnection;
    $selectEmail = mysqli_query($dbConnection, "SELECT user_id, email FROM `user` WHERE `email` = '$email';");
    confirmQuery($selectEmail);
    while ($row = $selectEmail->fetch_assoc()) {
        $user = $row;
        $userId = $user['user_id'] != null ? $user['user_id'] : 0;
        $resetToken = uniqid(php_uname('n'), true);
        if (insertPasswordResetToken($userId, $email, $resetToken)){
            if (sendEmailToUser($email, $resetToken)){
                http_response_code(200);
                return true;
            }
        }
    }
    http_response_code(400);
    return false;
}

function insertPasswordResetToken($userId, $email, $resetToken){
    global $dbConnection;
    /* Start transaction */
    $resetTokenInsertQuery = "UPDATE user_credential
SET password_reset_token = '$resetToken'
WHERE user_id = $userId and user_name = '$email';";

    try{
        if (mysqli_query($dbConnection, $resetTokenInsertQuery)){
            return true;
        }
    }catch(mysqli_sql_exception $exception){
        return false;
    }
    return false;
}

function sendEmailToUser($email, $resetToken){
    //get data from form  

    //    $to = $email;
    $to = 'fredythekkekkara@gmail.com';
    $subject = "Reset Password - Kleinerzeugernetzwerk";
    $txt ="Hello,\n\n
We've received a request to reset the password for the Kleinerzeugernetzwerk
account associated with $email. No changes
have been made to your account yet.\n
You can reset your password by clicking the link below:\n\n

kleinerzeugernetzwerk.com/src/reset_password.php?auth=$resetToken
\nIf you did not request a new password, please let us know
immediately by replying to this email.
You can find answers to most questions and get in touch with us at
info@kleinerzeugernetzwerk.com. We're here to help you at any step along the
way.\
— Kleinerzeugernetzwerk team\n\n";

    $headers = 'From: fredythekkekkara@gmail.com' . "\r\n" .
        'Reply-To: fredythekkekkara@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if($email!=NULL){
        if (mail($to,$subject,$txt,$headers)){
            return true;
        }

    }
    return false;
}


function changePassword($email, $password, $token){
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    global $dbConnection;
    $user_credential_query = "UPDATE user_credential uc 
    SET uc.password = '$passwordHashed', 
        uc.password_reset_token = null 
    WHERE uc.password_reset_token = '$token' AND uc.user_name = '$email'";

    try{
        $result = mysqli_query($dbConnection, $user_credential_query);
        confirmQuery($user_credential_query);
        http_response_code(200);
        return true;
    }catch(mysqli_sql_exception $exception){
        //        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }        
    http_response_code(409);
    return false;
}
?>