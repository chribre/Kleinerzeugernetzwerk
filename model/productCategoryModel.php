<?php
/****************************************************************
   FILE             :   userModel.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   10.02.2021

   PURPOSE          :   Data model of the product categories and 
                        product feature types and initialisation function
****************************************************************/
class productCategory{
    public categoryId;
    public categoryName;
    public categoryDesc;
    
    
    function __construct($productCategoryData){
        $this.categoryId = isset($productCategoryData['category_id']) ? $productCategoryData['category_id'] : 0;
        $this.categoryName = isset($productCategoryData['category_name']) ? $productCategoryData['category_name'] : '';
        $this.categoryDesc = isset($productCategoryData['category_description']) ? $productCategoryData['category_description'] : '';
    }
}


class productFeatures{
    public featureTypeId;
    public featureName;
    public featureDesc;
    
    function __construct($productFeatureData){
        $this.featureTypeId = isset($productFeatureData['feature_type_id']) ? $productFeatureData['feature_type_id'] : 0;
        $this.featureName = isset($productFeatureData['feature_name']) ? $productFeatureData['feature_name'] : '';
        $this.featureDesc = isset($productFeatureData['feature_description']) ? $productFeatureData['feature_description'] : '';
    }
}
?>