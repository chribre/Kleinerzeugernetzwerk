<?php
/****************************************************************
   FILE             :   productionPointModel.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   22.02.2021

   PURPOSE          :   Data model of the farmland table and initialisation function
****************************************************************/


class productionPoint{
    public $farmId;
    public $producerId;
    public $farmName;
    public $farmDesc;
    public $farmAddress;
    public $street;
    public $houseNumber;
    public $city;
    public $zip;
    public $farmLocation;
    public $latitude;
    public $longitude;
    public $farmArea;

    public $productionPointImageIdArray = [];
    public $productionPointImageNameArray = [];

    function __construct($productDataDict){

        $this->farmId = isset($productDataDict['farm_id']) ? escapeSQLString($productDataDict['farm_id']) : 0;
        $this->producerId = isset($productDataDict['producer_id']) ? escapeSQLString($productDataDict['producer_id']) : "";
        $this->farmName = isset($productDataDict['farm_name']) ? escapeSQLString($productDataDict['farm_name']) : "";
        $this->farmDesc = isset($productDataDict['farm_desc']) ? escapeSQLString($productDataDict['farm_desc']) : "";
        $this->farmAddress = isset($productDataDict['farm_address']) ? escapeSQLString($productDataDict['farm_address']) : "";
        $this->street = isset($productDataDict['street']) ? escapeSQLString($productDataDict['street']) : "";
        $this->houseNumber = isset($productDataDict['house_number']) ? escapeSQLString($productDataDict['house_number']) : "";
        $this->city = isset($productDataDict['city']) ? escapeSQLString($productDataDict['city']) : "";
        $this->zip = isset($productDataDict['zip']) ? escapeSQLString($productDataDict['zip']) : "";
        $this->farmLocation = isset($productDataDict['farm_location']) ? escapeSQLString($productDataDict['farm_location']): "";
        $this->latitude = isset($productDataDict['latitude']) ? escapeSQLString($productDataDict['latitude']): 0;
        $this->longitude = isset($productDataDict['longitude']) ? escapeSQLString($productDataDict['longitude']): 0;
        $this->farmArea = isset($productDataDict['farm_area']) ? floatval(escapeSQLString($productDataDict['farm_area'])) : 0;
        
        
        $productionPointPictures = $_FILES['files']['name'] ? $_FILES['files']['name']: [];
        $productionPointImageIds = isset($productDataDict['production_point_images_id']) && $productDataDict['production_point_images_id'] != null ? escapeSQLString($productDataDict['production_point_images_id']) : [];
        $productionPointImageIds = json_decode($productionPointImageIds) ? json_decode($productionPointImageIds) : [];
        
        $fileData = parseFileData($productionPointPictures, $productionPointImageIds);
        $this->productionPointImageIdArray = $fileData['fileIds'] != null ? $fileData['fileIds'] : [];
        $this->productionPointImageNameArray = $fileData['fileName'] != null ? $fileData['fileName'] : [];
        
        
    }
}
?>