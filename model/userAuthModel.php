<?php
/****************************************************************
   FILE             :   userAuth.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   15.02.2021

   PURPOSE          :   Data model of the user authentication table and initialisation function
****************************************************************/

class userAuth{
    public $email;
    public $password;
    public $userId;
    
    function __construct($userData){
        $this->userId = isset($userData['user_id']) ? escapeSQLString($userData['user_id']) : 0;
        $this->email = isset($userData['email']) ? escapeSQLString($userData['email']) : "";
        $this->password = isset($userData['password']) ? escapeSQLString($userData['password']) : "";
    }
}

class authToken{
    public $userId;
    public $token;
    
    function __construct($userData){
        $this->userId = isset($userData['user_id']) ? escapeSQLString($userData['user_id']) : 0;
        $this->$token = isset($userData['token']) ? escapeSQLString($userData['token']) : 0;
    }
}
?>