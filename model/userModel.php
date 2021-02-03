<?php

class user{
    public userId;
    public firstName;
    public lastName;
    public dob;
    public street;
    public houseNumber;
    public zip;
    public city;
    public country;
    public phone;
    public email;
    public mobile;
    public userType;
    public isActive;
    public isBlocked;
    
    function __construct($userData){
        $this->userId = isset($userData['user_id']) ? escapeSQLString($userData['user_id']) : 0;
        $this->firstName = isset($userData['first_name']) ? escapeSQLString($userData['first_name']) : "";
        $this->lastName = isset($userData['last_name']) ? escapeSQLString($userData['last_name']) : "";
        $this->dob = isset($userData['dob']) ? escapeSQLString($userData['dob']) : "";
        $this->street = isset($userData['street']) ? escapeSQLString($userData['street']) : "";
        $this->houseNumber = isset($userData['house_number']) ? escapeSQLString($userData['house_number']) :"";
        $this->zip = isset($userData['zip']) ? escapeSQLString($userData['zip']) : "";
        $this->city = isset($userData['city']) ? escapeSQLString($userData['city']) : 0;
        $this->country = isset($userData['country']) ? escapeSQLString($userData['country']) : "";
        $this->phone = isset($userData['phone']) ? escapeSQLString($userData['phone']) : "";
        $this->email = isset($userData['email']) ? escapeSQLString($userData['email']) : "";
        $this->mobile = isset($userData['mobile']) ? escapeSQLString($userData['mobile']) : "";
        $this->userType = isset($userData['user_type']) ? escapeSQLString($userData['user_type']) : 0;
        $this->isActive = isset($userData['is_active']) ? escapeSQLString($userData['is_active']) : 0;
        $this->isBlocked = isset($userData['is_blocked']) ? escapeSQLString($userData['is_blocked']) : 0;
    }
}
?>