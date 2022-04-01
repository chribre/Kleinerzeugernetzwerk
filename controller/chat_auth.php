<?php 

/****************************************************************
   FILE             :   chat_auth.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   CRUD operations on rocket chat. 
                        add new user to chat, login user to chat system.
****************************************************************/
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/constants.php");

function registerUserToChat($userId, $email, $name, $password){
    $isChatEnabled = isRocketChatEnabled();
    if ($isChatEnabled == false){
        return false;
    }
    $chatUserData = [];
    $data = [
        "username" => createUserName($email),
        "email" => $email,
        "pass" => $password,
        "name" => $name
    ];
    $result =callAPI('POST', getChatAPI().'users.register', json_encode($data));
    $result = json_decode($result, true);
    if ($result['success'] == 'true'){
        $userData = $result['user'] ? $result['user'] : [];
        $chatUserId = $userData['_id'] ? $userData['_id'] : '';
        $chatUserName = $userData['username'] ? $userData['username'] : '';


        $passwordHashed = encrypt_decrypt_password($password, $action = 'encrypt');
        $result = saveChatUserCredentials($userId, $chatUserId, $chatUserName, $passwordHashed);
        $chatUserData = [ "success" => $result,
                         "chatUserId" => $chatUserId,
                         "chatUserName" => $chatUserName];

    }
    return $chatUserData;
}

function createUserName($email){
    $userName = str_replace('@', '', $email);
    return $userName;
}


function encrypt_decrypt_password($string, $action = 'encrypt'){
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'bpkGKAT12ERTjtWT0F4VlKrUM5juCJN3'; // user define private key
    $secret_iv = 'IFw6AkaYkt'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


function loginUserToChat($userName, $password){
    $authData = [];
    $data = [
        "user" => $userName,
        "password" => $password
    ];
    $result =callAPI('POST', getChatAPI().'login', json_encode($data));
    $result = json_decode($result, true);
    if ($result['status'] == 'success'){
        $userData = $result['data'] ? $result['data'] : [];
        $chatUserId = $userData['userId'] ? $userData['userId'] : '';
        $chatAuthToken = $userData['authToken'] ? $userData['authToken'] : '';

        $authData = [ "chatUserId" => $chatUserId,
                     "chatAuthToken" => $chatAuthToken];


    }
    return $authData;
}


function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 111111111111111111111',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}

function saveChatUserCredentials($userId, $chatUserId, $userName, $passwordHashed){

    global $dbConnection;
    $chatUserQuery = "INSERT INTO chat_user_credentials (user_id, chat_user_id, chat_user_name, chat_user_password)"
        . "VALUES ($userId, '$chatUserId', '$userName', '$passwordHashed')";

    try{
        mysqli_query($dbConnection, $chatUserQuery);
        confirmQuery($chatUserQuery);
        return true;
    }catch(mysqli_sql_exception $exception){
        var_dump($exception);
        throw $exception;
    }        
    return false;
}

function getChatUserCredentials($userId){
    global $dbConnection;
    $selectChatUser = mysqli_query($dbConnection, "SELECT user_id, chat_user_id, chat_user_name, chat_user_password FROM `chat_user_credentials` WHERE `user_id` = $userId;");
    confirmQuery($selectChatUser);
    while ($row = $selectChatUser->fetch_assoc()) {
        $user = $row;
        $userId = $user['user_id'] != null ? $user['user_id'] : 0;
        if ($userId != 0){
            return $user;
        }
    }
    return null;
}
?>