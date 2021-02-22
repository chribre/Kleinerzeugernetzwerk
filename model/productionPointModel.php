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
    public $farmLocation;
    public $farmArea;


    function __construct($productDataDict){

        $this->farmId = isset($productDataDict['farm_id']) ? escapeSQLString($productDataDict['farm_id']) : 0;
        $this->producerId = isset($productDataDict['producer_id']) ? escapeSQLString($productDataDict['producer_id']) : "";
        $this->farmName = isset($productDataDict['farm_name']) ? escapeSQLString($productDataDict['farm_name']) : "";
        $this->farmDesc = isset($productDataDict['farm_desc']) ? escapeSQLString($productDataDict['farm_desc']) : "";
        $this->farmAddress = isset($productDataDict['farm_address']) ? escapeSQLString($productDataDict['farm_address']) : 0;
        $this->farmLocation = isset($productDataDict['farm_location']) ? escapeSQLString($productDataDict['farm_location']): 0;
        $this->farmArea = (isset($productDataDict['is_processed_product']) && $productDataDict['is_processed_product'] == true) ? 1 : 0;
        $this->pricePerUnit = isset($productDataDict['farm_area']) ? floatval(escapeSQLString($productDataDict['farm_area'])) : 0;
    }
}
?>