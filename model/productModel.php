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

    function __construct($productDataDict){
        $this->productId = isset($productDataDict['productId']) ? escapeSQLString($productDataDict['productId']) : 0;
        $this->producerId = isset($_POST['producerId']) ? escapeSQLString($_POST['producerId']) : "";
        $this->productName = isset($_POST['productName']) ? escapeSQLString($_POST['productName']) : "";
        $this->productDesc = isset($_POST['productDesc']) ? escapeSQLString($_POST['productDesc']) : "";
        $this->productCategory = isset($_POST['productCategory']) ? escapeSQLString($_POST['productCategory']) : 0;
        $this->productionLocation = isset($_POST['productionPoint']) ? escapeSQLString($_POST['productionPoint']): 0;
        $this->isProcessedProduct = (isset($_POST['isProcessed']) && $_POST['isProcessed'] === true) ? 1 : 0;
        $this->pricePerUnit = isset($_POST['productPrice']) ? floatval(escapeSQLString($_POST['productPrice'])) : 0;
        $this->quantityOfPrice = isset($_POST['quantity']) ? floatval(escapeSQLString($_POST['quantity'])) : 0;
        $this->unit = isset($_POST['unit']) ? escapeSQLString($_POST['unit']): 0;

        $this->productRating = 0;
        $this->isAvailable = true;



    }
}
?>