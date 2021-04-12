<?php
class seller{
    public $sellerId;
    public $producerId;
    public $sellerName;
    public $sellerDesc;
    public $street;
    public $buildingNumber;
    public $city;
    public $zip;
    public $latitude;
    public $longitude;
    public $email;
    public $website;
    public $mobile;
    public $phone;
    public $isBlocked;
    public $isFavourite;
    public $imagePath;
    
    public $isMonAvailable;
    public $monOpenTime;
    public $monCloseTime;
    
    
    public $isTueAvailable;
    public $tueOpenTime;
    public $tueCloseTime;
    
    public $isWedAvailable;
    public $wedOpenTime;
    public $wedCloseTime;
    
    public $isThuAvailable;
    public $thuOpenTime;
    public $thuCloseTime;
    
    public $isFriAvailable;
    public $friOpenTime;
    public $friCloseTime;
    
    public $isSatAvailable;
    public $satOpenTime;
    public $satCloseTime;
    
    public $isSunAvailable;
    public $sunOpenTime;
    public $sunCloseTime;
    
    public $sellerImageIdArray = [];
    public $sellerImageNameArray = [];
    
    function __construct($userData){
        $this->sellerId = isset($userData['seller_id']) ? escapeSQLString($userData['seller_id']) : 0;
        $this->producerId = isset($userData['producer_id']) ? escapeSQLString($userData['producer_id']) : 0;
        $this->sellerName = isset($userData['seller_name']) ? escapeSQLString($userData['seller_name']) : "";
        $this->sellerDescription = isset($userData['seller_description']) ? escapeSQLString($userData['seller_description']) : "";
        $this->street = isset($userData['street']) ? escapeSQLString($userData['street']) : "";
        $this->buildingNumber = isset($userData['building_number']) ? escapeSQLString($userData['building_number']) : "";
        
        $this->city = isset($userData['city']) ? escapeSQLString($userData['city']) : "";
        $this->zip = isset($userData['zip']) ? escapeSQLString($userData['zip']) : "";
        $this->latitude = isset($userData['latitude']) ? escapeSQLString($userData['latitude']) : "";
        $this->longitude = isset($userData['longitude']) ? escapeSQLString($userData['longitude']) : "";
        $this->email = isset($userData['seller_email']) ? escapeSQLString($userData['seller_name']) : "";
        $this->website = isset($userData['seller_website']) ? escapeSQLString($userData['seller_website']) : "";
        $this->mobile = isset($userData['mobile']) ? escapeSQLString($userData['mobile']) : "";
        $this->phone = isset($userData['phone']) ? escapeSQLString($userData['phone']) : "";
        $this->isBlocked = isset($userData['is_blocked']) ? escapeSQLString($userData['is_blocked']) : false;
        $this->isFavourite = isset($userData['is_favourite']) ? escapeSQLString($userData['is_favourite']) : false;
        $this->imagePath = isset($userData['image_path']) ? escapeSQLString($userData['image_path']) : null;
        
        
        
        $this->isMonAvailable = isset($userData['is_mon_available']) ? escapeSQLString($userData['is_mon_available']) : false;
        $this->monOpenTime = isset($userData['mon_open_time']) ? escapeSQLString($userData['mon_open_time']) : "";
        $this->monCloseTime = isset($userData['mon_close_time']) ? escapeSQLString($userData['mon_close_time']) : "";
        
        
        $this->isTueAvailable = isset($userData['is_tue_available']) ? escapeSQLString($userData['is_tue_available']) : false;
        $this->tueOpenTime = isset($userData['tue_open_time']) ? escapeSQLString($userData['tue_open_time']) : "";
        $this->tueCloseTime = isset($userData['tue_close_time']) ? escapeSQLString($userData['tue_close_time']) : "";
        
        
        $this->isWedAvailable = isset($userData['is_wed_available']) ? escapeSQLString($userData['is_wed_available']) : false;
        $this->wedOpenTime = isset($userData['wed_open_time']) ? escapeSQLString($userData['wed_open_time']) : "";
        $this->wedCloseTime = isset($userData['wed_close_time']) ? escapeSQLString($userData['wed_close_time']) : "";
        
        
        $this->isThuAvailable = isset($userData['is_thu_available']) ? escapeSQLString($userData['is_thu_available']) : false;
        $this->thuOpenTime = isset($userData['thu_open_time']) ? escapeSQLString($userData['thu_open_time']) : "";
        $this->thuCloseTime = isset($userData['thu_close_time']) ? escapeSQLString($userData['thu_close_time']) : "";
        
        
        $this->isFriAvailable = isset($userData['is_fri_available']) ? escapeSQLString($userData['is_fri_available']) : false;
        $this->friOpenTime = isset($userData['fri_open_time']) ? escapeSQLString($userData['fri_open_time']) : "";
        $this->friCloseTime = isset($userData['fri_close_time']) ? escapeSQLString($userData['fri_close_time']) : "";
        
        
        
        $this->isSatAvailable = isset($userData['is_sat_available']) ? escapeSQLString($userData['is_sat_available']) : false;
        $this->satOpenTime = isset($userData['sat_open_time']) ? escapeSQLString($userData['sat_open_time']) : "";
        $this->satCloseTime = isset($userData['sat_close_time']) ? escapeSQLString($userData['sat_close_time']) : "";
        
        
        $this->isSunAvailable = isset($userData['is_sun_available']) ? escapeSQLString($userData['is_sun_available']) : false;
        $this->sunOpenTime = isset($userData['sun_open_time']) ? escapeSQLString($userData['sun_open_time']) : "";
        $this->sunCloseTime = isset($userData['sun_close_time']) ? escapeSQLString($userData['sun_close_time']) : "";
        
        $sellerPictures = $_FILES['files']['name'] ? $_FILES['files']['name']: [];
        $sellerImageIds = isset($userData['seller_images_id']) && $userData['seller_images_id'] != null ? escapeSQLString($userData['seller_images_id']) : [];
        $sellerImageIds = json_decode($sellerImageIds);
        
        $fileData = parseFileData($sellerPictures, $sellerImageIds);
        $this->sellerImageIdArray = $fileData['fileIds'] != null ? $fileData['fileIds'] : [];
        $this->sellerImageNameArray = $fileData['fileName'] != null ? $fileData['fileName'] : [];
    }
    
}

?>