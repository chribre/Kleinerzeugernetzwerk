<?php 
session_start();
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/userModel.php");

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $user = new user($_POST);
        creatUser($user->userId, $user->firstName, $user->lastName, $user->dob, $user->street, $user->houseNumber, $user->zip, $user->city, $user->country, $user->phone, $user->email, $user->mobile, $user->userType, $user->isActive, $user->isBlocked);
        break;
}

    
function createUser($userId, $firstName, $lastName, $dob, $street, $houseNumber, $zip, $city, $country, $phone, $email, $mobile, $userType, $isActive, $isBlocked){
    global $dbConnection;
    $sql = "INSERT INTO user (salutations, first_name, middle_name, last_name, dob, street, house_number, zip, city, country, phone, mobile, email, profile_image_name, user_type, is_active, is_blocked)"
        . "VALUES ('$salutation', '$firstName', '$mName', '$lastName', '$dob', '$street', '$houseNumber', '$zip', '$city', '$country', '$phone', '$mobile', '$email', '$profileImageName', $userType, $isActive, $isBlocked)";
    
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
        return true;
    }catch(mysqli_sql_exception $exception){
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
?>