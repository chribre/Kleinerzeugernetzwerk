<?php 
/****************************************************************
   FILE             :   userController.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   CRUD operations on user model
                        Add a new user, edit user details etc.
****************************************************************/
session_start();
require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php";
include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/model/userModel.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        break;

    case 'POST':
        $header = apache_request_headers();
        $action = $header['action'];
        $user = new user($_POST);
        switch ($action){
            case 'CREATE':
                $password = $_POST["password"] != null ? $_POST["password"] : "";
                echo createUser($user->userId, $user->firstName, $user->lastName, $user->dob, $user->street, $user->houseNumber, $user->zip, $user->city, $user->country, $user->phone, $user->email, $user->mobile, $user->userType, $user->isActive, $user->isBlocked,$password, $user->description, $user->profileImageIdArray, $user->profileImageNameArray);
                break;
            case 'READ':
                if (isAccessTokenValid()){
                    echo getUser($user->userId);
                }else{
                    http_response_code(401);
                }
                break;
            case 'UPDATE':
                if (isAccessTokenValid()){
                    echo updateUserDetails($user->userId, $user->salutation, $user->firstName, $user->lastName, $user->dob, $user->street, $user->houseNumber, $user->zip, $user->city, $user->country, $user->phone, $user->mobile, $user->description, $user->profileImageIdArray, $user->profileImageNameArray);
                }else{
                    http_response_code(401);
                }
                break;
        }
        break;
    default:
        http_response_code(400);
        break;
}

/*
    FUNCTION    :   to store user data when a new user is registering.
    INPUT       :   user details -> sign up form data.
    OUTPUT      :   return true if the user is successfully registered otherwise false
*/    
function createUser($userId, $firstName, $lastName, $dob, $street, $houseNumber, $zip, $city, $country, $phone, $email, $mobile, $userType, $isActive, $isBlocked, $password, $description,$profileImageIdArray, $profileImageNameArray){
    global $dbConnection;
    $profileUplaodLocation = "$_SERVER[DOCUMENT_ROOT]".getImagePath(1);
    $profileImagepath = getServerRootAddress().getImagePath(1);
    if (!isUserAlreadyExist($email)){
        $sql = "INSERT INTO user (salutations, first_name, last_name, dob, street, house_number, zip, city, country, phone, mobile, email, profile_image_name, user_type, is_active, is_blocked, description)"
            . "VALUES ('$salutation', '$firstName', '$lastName', '$dob', '$street', '$houseNumber', '$zip', '$city', '$country', '$phone', '$mobile', '$email', '$profileImageName', $userType, $isActive, $isBlocked, '$description')";

        try{
            echo "trying to insert";
            echo "\n ".$sql."\n";
            mysqli_query($dbConnection, $sql);
            $user_id = $dbConnection->insert_id;
            echo "inserted";
            echo "user id is $user_id, ";
            if (saveUserCredentials($user_id, $email, $password)){
                $fileNames = uploadPictures($profileImageNameArray, $profileUplaodLocation);
                $imageQuery = createFileUploadQuery($profileImageNameArray, $profileImageIdArray, $profileImagepath, $user_id, 1);

                $profileImageCount = count($profileImageNameArray);
                $profileImageIdCount = count($profileImageIdArray);

                if ($profileImageCount > 0 || $profileImageIdCount > 0){
                    try{
                        if (mysqli_multi_query($dbConnection, $imageQuery)){
                            //                        mysqli_commit($dbConnection);
                            http_response_code(200);
                            return true;
                        }else{
                            //                        mysqli_rollback($dbConnection);
                            http_response_code(400);
                            return false;
                        }
                    }catch(mysqli_sql_exception $exception){
                        //                    mysqli_rollback($dbConnection);
                        http_response_code(400);
                        return false;
                    }
                }else{
                    //                mysqli_commit($dbConnection);
                    http_response_code(200);
                    return true;
                }
            }else{
                http_response_code(400);
                return false;
            }
        }catch(mysqli_sql_exception $exception){
            echo "user creation failed,";
            //            mysqli_rollback($dbConnection);
            var_dump($exception);
            throw $exception;
            http_response_code(400);
        }
        http_response_code(400);
        return false;
    }
    http_response_code(400);
    return false;
}

/*
    FUNCTION    :   to save user name and password when a new user is registering.
    INPUT       :   user credentials -> sign up form data.
    OUTPUT      :   return true if the user is successfully registered otherwise false
*/
function saveUserCredentials($userId, $email, $password){
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    global $dbConnection;
    $user_credential_query = "INSERT INTO user_credential(user_id, user_name, password)"
        ."VALUES($userId, '$email', '$passwordHashed')";

    try{
        mysqli_query($dbConnection, $user_credential_query);
        confirmQuery($user_credential_query);
        //        mysqli_commit($dbConnection);
        return true;
    }catch(mysqli_sql_exception $exception){
        //        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }        
    return false;
}
/*
    FUNCTION    :   to check whether the user email address is already registered in the system
    INPUT       :   email
    OUTPUT      :   return true if the user is already registered otherwise false
*/
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

/*
    FUNCTION    :   to fetch details of a user to show in the profile screen
    INPUT       :   user Id
    OUTPUT      :   returns json dictionary with all details of the user.
*/
function getUser($userId){
    global $dbConnection;
    global $PROFILE_IMAGE_DEFAULT;

    $userDetailsQuery = "SELECT * FROM `user` 
    JOIN images i on (i.image_type = 1 AND i.entity_id = $userId)
    WHERE `user_id` = '$userId'";

    $userSelectQuery = mysqli_query($dbConnection, $userDetailsQuery);
    confirmQuery($userSelectQuery);
    if (mysqli_num_rows($userSelectQuery)){
        $row = mysqli_fetch_array($userSelectQuery);
        $userData = new user($row);
        http_response_code(200); //OK
        return json_encode($userData, JSON_UNESCAPED_SLASHES);
    }
    http_response_code(400); //400 Bad Request
    return null;
}

/*
    FUNCTION    :   to update details of a user from the profile screen
    INPUT       :   user details as an array
    OUTPUT      :   returns json dictionary with all details of the user.
*/
function updateUserDetails($userId, $salutation, $firstName, $lastName, $dob, $street, $houseNumber, $zip, $city, $country, $phone, $mobile, $description,$profileImageIdArray, $profileImageNameArray){
    global $dbConnection;
    $profileUplaodLocation = "$_SERVER[DOCUMENT_ROOT]".getImagePath(1);
    $profileImagepath = getServerRootAddress().getImagePath(1);


    $sql = "UPDATE user
SET salutations = '$salutation',
    first_name = '$firstName',
    last_name = '$lastName',
    dob = '$dob',
    street = '$street',
    house_number = '$houseNumber',
    zip = '$zip',
    city = '$city',
    country = '$country',
    phone = '$phone',
    mobile = '$mobile',
    description = '$description'
WHERE user_id = $userId;";

    try{
        //        echo "trying to update";
        //        echo "\n ".$sql."\n";
        mysqli_query($dbConnection, $sql);
        $fileNames = uploadPictures($profileImageNameArray, $profileUplaodLocation);
        $imageQuery = createFileUploadQuery($profileImageNameArray, $profileImageIdArray, $profileImagepath, $userId, 1);

        $profileImageCount = count($profileImageNameArray);
        $profileImageIdCount = count($profileImageIdArray);

        if ($profileImageCount > 0 || $profileImageIdCount > 0){
            try{
                if (mysqli_multi_query($dbConnection, $imageQuery)){
                    //                        mysqli_commit($dbConnection);

                    http_response_code(200);
                    return getUser($userId);
                }else{
                    //                        mysqli_rollback($dbConnection);
                    http_response_code(400);
                    return false;
                }
            }catch(mysqli_sql_exception $exception){
                //                    mysqli_rollback($dbConnection);
                http_response_code(400);
                return false;
            }
        }else{
            //                mysqli_commit($dbConnection);
            http_response_code(200);
            return getUser($userId);
        }
    }catch(mysqli_sql_exception $exception){
        //        echo "user creation failed,";
        mysqli_rollback($dbConnection);
        var_dump($exception);
        throw $exception;
    }
    http_response_code(400); //400 Bad Request
    return false;
}
?>