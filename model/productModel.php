<?php
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
        $this->productId = isset($productDataDict['productId']) ? escapeSQLString($productDataDict['productId']) : 0;
        $this->producerId = isset($productDataDict['producerId']) ? escapeSQLString($productDataDict['producerId']) : "";
        $this->productName = isset($productDataDict['productName']) ? escapeSQLString($productDataDict['productName']) : "";
        $this->productDesc = isset($productDataDict['productDesc']) ? escapeSQLString($productDataDict['productDesc']) : "";
        $this->productCategory = isset($productDataDict['productCategory']) ? escapeSQLString($productDataDict['productCategory']) : 0;
        $this->productionLocation = isset($productDataDict['productionPoint']) ? escapeSQLString($productDataDict['productionPoint']): 0;
        $this->isProcessedProduct = (isset($productDataDict['isProcessed']) && $productDataDict['isProcessed'] == true) ? 1 : 0;
        $this->pricePerUnit = isset($productDataDict['productPrice']) ? floatval(escapeSQLString($productDataDict['productPrice'])) : 0;
        $this->quantityOfPrice = isset($productDataDict['quantity']) ? floatval(escapeSQLString($productDataDict['quantity'])) : 0;
        $this->unit = isset($productDataDict['unit']) ? escapeSQLString($productDataDict['unit']): 0;
        
//        $productFeaturesString = isset($_POST['productFeatures']) ? escapeSQLString($_POST['productFeatures']) : "";
        $this->productFeatures = isset($_POST['productFeatures']) ? $_POST['productFeatures'] : [];
        

        $this->productRating = 0;
        $this->isAvailable = true;
        
        $this->isDelete = isset($_POST['isDelete']) ? $_POST['isDelete'] : false;
        
    }
    
    
}

class productFeatures{
    public $productFeatureId;
    public $productId;
    public $featureType;
    
    
    function __construct($featureId, $productId, $featureType){
        $this->$productFeatureId = $featureId;//isset($productFeatures['productFeatureId']) ? escapeSQLString($productFeatures['productFeatureId']) : 0;
        $this->$productId = $productId;//isset($productFeatures['producerId']) ? escapeSQLString($productFeatures['producerId']) : "";
        $this->$featureType = $featureType;//isset($productFeatures['productName']) ? escapeSQLString($productFeatures['productName']) : "";
    }
}
?>