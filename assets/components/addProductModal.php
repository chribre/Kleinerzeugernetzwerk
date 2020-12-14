
<?php
global $dbConnection;
//PHP code to recieve post method with registartion data. it is identified by a hidden value 'signUp' to get the hit here.
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo('add product post method hit,');
    if (isset($_POST['addProductMethod'])){
        $productName = escapeSQLString($_POST['productName']);
        $productDesc = escapeSQLString($_POST['productDesc']);
        $productCategory = escapeSQLString($_POST['productCategory']);
        $productPrice = floatval(escapeSQLString($_POST['productPrice']));
        $productQuantity = escapeSQLString($_POST['quantity']);
        $productUnit = escapeSQLString($_POST['unit']);
        $isProcessedFood = escapeSQLString($_POST['isProcessed']);

        addProduct($productName, $productDesc, $productCategory, $productPrice, $productQuantity, $productUnit, $isProcessedFood);
    }
}

?>




<div class="modal fade" id="addNewProduct">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <script type="text/javascript">
                    function readURL(input) {
                        if (input.files && input.files.length > 0) {


                            var i;
                            for (i = 0; i < input.files.length; i++) {
                                text += cars[i] + "<br>";
                            }




                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#test').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    function addImage() {
                        const div = document.createElement('div');

                        div.className = 'row';

                        div.innerHTML = `
<input type="text" name="name" value="" />
<input type="text" name="value" value="" />
<label> 
<input type="checkbox" name="check" value="1" /> Checked? 
                    </label>
<input type="button" value="-" onclick="removeRow(this)" />
`;

                        document.getElementById('content').appendChild(div);
                    }

                    function removeRow(input) {
                        document.getElementById('content').removeChild(input.parentNode);
                    }






                    $(function() {
                        // Multiple images preview in browser
                        var imagesPreview = function(input, placeToInsertImagePreview) {

                            if (input.files) {
                                var filesAmount = input.files.length;

                                for (i = 0; i < filesAmount; i++) {
                                    var reader = new FileReader();

                                    reader.onload = function(event) {
                                        $($.parseHTML('<img>')).attr('src', event.target.result)
                                            .attr('id', "test")
                                            .appendTo(placeToInsertImagePreview);
                                    }

                                    reader.readAsDataURL(input.files[i]);
                                }
                            }

                        };

                        $('#gallery-photo-add').on('change', function() {
                            imagesPreview(this, 'div.gallery');
                        });
                    });







                </script>
                <h5 class="modal-title text-center"><i class="material-icons">&#xE147;</i>Add a new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <p>Modal body text goes here.</p>
                <form method="post" id="newProductForm">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" aria-describedby="productName01" placeholder="Product name" name="productName">
                    </div>
                    <div class="form-group">
                        <label for="productDesc">Product Description</label>
                        <textarea class="form-control" id="productDesc" name="productDesc" rows="4" placeholder="Write a description about your product."></textarea>
                    </div>






                    <div class="form-group">
                       <label for="productCategoryList">Product Category</label>
                        <div class="ui fluid selection dropdown" id="productCategoryList">
                            <input type="hidden" name="productCategory">
                            <i class="dropdown icon"></i>
                            <div class="default text">Select Product Category</div>
                            <div class="menu">
                               
                               
                               <?php 
                                if (isset($_SESSION['productCategories'])){
                                    $categories = $_SESSION['productCategories'];
                                    if (count($categories) > 0){
                                        for ($i = 0; $i < count($categories); $i++) {
                                            $category = $categories[$i];
                                                $categoryName = isset($category['category_name']) ? $category['category_name'] : "";
                                            $categoryId = isset($category['category_id']) ? $category['category_id'] : 0;

                                ?>
                               
                               
                               
                               
                                <div class="item" data-value="<?php echo $categoryId ?>">
                                    <img class="ui mini avatar image" src="/kleinerzeugernetzwerk/images/vegan.png">
                                    <?php echo $categoryName ?>
                                </div>
                                
                                
                                <?php 
                                        }
                                    }
                                }else{

                                }
                                ?>
                                
                            </div>
                        </div>



                    </div>


                    <div class="form-group">
                        <label>Product Features</label>
                        <div class="ui fluid multiple search selection dropdown" id="productFeatureList">
                            <input type="hidden" name="productFeatures">
                            <i class="dropdown icon"></i>
                            <div class="default text" >Select features of the product</div>
                            <div class="menu">

                                <?php 
                                if (isset($_SESSION['productFeatures'])){
                                    $features = $_SESSION['productFeatures'];
                                    if (count($features) > 0){
                                        for ($i = 0; $i < count($features); $i++) {
                                            $feature = $features[$i];
                                            $FeatureName = isset($feature['feature_name']) ? $feature['feature_name'] : "";
                                            $FeatureId = isset($feature['feature_type_id']) ? $feature['feature_type_id'] : 0;

                                ?>


                                <div class="item" data-value=<?php echo $FeatureId?> data-text="<?php echo $FeatureName?>">
                                    <img class="ui mini avatar image" src="/kleinerzeugernetzwerk/images/vegan.png">
                                    <?php echo $FeatureName?>
                                </div>


                                <?php 
                                        }
                                    }
                                }else{

                                }
                                ?>

                            </div>
                        </div>
                    </div>



                    <script>

                        $(document).ready(function(){
                            $('#productFeatureList').dropdown({
                            });
                            $('#productCategoryList').dropdown({
                            });
                        });
                    </script>


                    <div class="row form-group">
                        <div class="col">
                            <label for="productPrice">Product Price</label>
                            <input type="text" class="form-control" name="productPrice" placeholder="Price in Euro">
                        </div>
                        <div class="col">
                            <label for="quantity">Quantity of Price</label>
                            <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                        </div>
                        <div class="col">
                            <label for="unit">Unit</label>
                            <select class="form-control" name="unit">
                                <option>Liter</option>
                                <option>Kilogram</option>
                                <option>Gram</option>
                                <option>Millilitre</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group" id="productionPointSelection">
                        <label for="productionPoint">Production Point</label>
                        <div class="field">
                            <div class="ui selection dropdown col-12" id="productionPointDropdown">
                                <input type="hidden" name="productionPoint" >
                                <i class="dropdown icon"></i>
                                <div class="default text">Select point of production</div>
                                <div class="menu" id="productionPointMenu">
                                    <!--
<div class="item" data-value="1"><h5>Farm Land Name</h5><div>address</div></div>
<div class="item" data-value="0">Female</div>
-->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Add product images</label>
                        <div class="mx-4 justify-content-center align-middle row">
                            <div class="gallery row"></div>
                            <label class="btn btn-default rounded-circle" id="addBtn">
                                <i class="fa fa-plus"></i> <input onchange="readURL(this);" type="file" hidden id="gallery-photo-add" name="files" multiple>
                            </label>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">

                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="isProcessed" value="true">
                                <label class="form-check-label" for="inlineCheckbox5">It is a processed food.</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="addProductMethod" value="true" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--
<script>
$("#newProductForm").submit(function(e) {
e.preventDefault();
});
</script>
-->



<style>
    #test{
        width: 150px;
        height: 150px;
        margin: 10px;
        object-fit: cover;
    }
    #addButton{
        width: 50px;
        height: 50px;
        background-color: aqua;
    }
</style>