<?php
/****************************************************************
   FILE             :   userModel.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   Data model of the product table and initialisation function
****************************************************************/


class product{
    public $productId;
    public $producerId;
    public $productName;
    public $productDesc;
    public $productCategory;
    public $productionLocation;
    public $isProcessedProduct;
    public $isAvailable;
    public $pricePerUnit;
    public $quantityOfPrice;
    public $unit;
    public $productRating;
    public $productFeatures = [];
    public $productFeaturesId = [];
    public $isDelete = false;


    function formatProductFeatures($productFeatureInputString){
        $tempFeatureArray = []; 
        $productFeaturesArray = explode (",", $productFeatures);
        $featureCount = count($productFeaturesArray);
        if ($featureCount > 0){
            for($i = 0; $i<$featureCount;$i++){
                $featureType = $productFeaturesArray[$i];
                $tempFeature = new productFeatures(0, $this->productId, $featureType);
                array_push($tempFeatureArray, $tempFeature);
            }
        }
        return $tempFeatureArray;
    }



    function __construct($productDataDict){

        $this->productId = isset($productDataDict['product_id']) ? escapeSQLString($productDataDict['product_id']) : 0;
        $this->producerId = isset($productDataDict['producer_id']) ? escapeSQLString($productDataDict['producer_id']) : "";
        $this->productName = isset($productDataDict['product_name']) ? escapeSQLString($productDataDict['product_name']) : "";
        $this->productDesc = isset($productDataDict['product_description']) ? escapeSQLString($productDataDict['product_description']) : "";
        $this->productCategory = isset($productDataDict['product_category']) ? escapeSQLString($productDataDict['product_category']) : 0;
        $this->productionLocation = isset($productDataDict['production_location']) ? escapeSQLString($productDataDict['production_location']): 0;
        $this->isProcessedProduct = (isset($productDataDict['is_processed_product']) && $productDataDict['is_processed_product'] == true) ? 1 : 0;
        $this->pricePerUnit = isset($productDataDict['price_per_unit']) ? floatval(escapeSQLString($productDataDict['price_per_unit'])) : 0;
        $this->quantityOfPrice = isset($productDataDict['quantity_of_price']) ? floatval(escapeSQLString($productDataDict['quantity_of_price'])) : 0;
        $this->unit = isset($productDataDict['unit']) ? escapeSQLString($productDataDict['unit']): 0;

        //        $productFeaturesString = isset($_POST['productFeatures']) ? escapeSQLString($_POST['productFeatures']) : "";
        $productFeatures = isset($productDataDict['product_features']) ? $productDataDict['product_features'] : [];
        $productFeaturesId = isset($productDataDict['product_features_id']) ? $productDataDict['product_features_id'] : [];

        $featureCount = count($productFeatures);
        $featureIdCount = count($productFeaturesId);

        $deleteFeatureCount = $featureIdCount - $featureCount;
        $addNewFeatureCount = $featureCount - $featureIdCount;

        if ($deleteFeatureCount > 0){
            $productFeatures = array_pad($productFeatures, $featureIdCount, 0);
        }
        if ($addNewFeatureCount > 0){
            $productFeaturesId = array_pad($productFeaturesId, $featureCount, 0);
        }

        if (count($productFeatures) > 0){
            $this->productFeatures = $productFeatures;
            $this->productFeaturesId = $productFeaturesId;
        }


        $this->productRating = 0;
        $this->isAvailable = true;

        $this->isDelete = isset($_POST['is_delete']) ? $_POST['is_delete'] : false;

    }


}

class productFeatures{
    public $productFeatureId;
    public $productId;
    public $featureType;
    public $action;


    function __construct($featureId, $productId, $featureType, $action){
        $this->$productFeatureId = $featureId;//isset($productFeatures['productFeatureId']) ? escapeSQLString($productFeatures['productFeatureId']) : 0;
        $this->$productId = $productId;//isset($productFeatures['producerId']) ? escapeSQLString($productFeatures['producerId']) : "";
        $this->$featureType = $featureType;//isset($productFeatures['productName']) ? escapeSQLString($productFeatures['productName']) : "";
        $this->action = $action;
    }
}
?>