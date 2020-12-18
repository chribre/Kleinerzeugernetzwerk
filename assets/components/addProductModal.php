<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/10.31.0/js/jquery.fileupload.min.js" integrity="sha512-qPkNWpUqYz8bhO5bGNPBvlCB9hPZBil2ez5Mo8yVmpCKI315UDDPQeg/TE7KwZ+U/wdSO8JguwVxYY/Ha7U+vQ==" crossorigin="anonymous"></script>

<?php

function generateFileName(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

global $dbConnection;
//PHP code to recieve post method with registartion data. it is identified by a hidden value 'signUp' to get the hit here.
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo('add product post method hit,');
    $fileNameArray = [];
    if (isset($_FILES['file'])){
        $fileCount = count($_FILES['file']['name']);
        for ($idx = 0; $idx < $fileCount; $idx++){
            $fileNameNew = null;
            $fileName = $_FILES['file']['name'][$idx];
            $fileTmpName = $_FILES['file']['tmp_name'][$idx];
            $fileSize = $_FILES['file']['size'][$idx];
            $fileError = $_FILES['file']['error'][$idx];
            $fileType = $_FILES['file']['type'][$idx];


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpeg', 'jpg', 'png');
            echo $fileActualExt;
            if (in_array($fileActualExt, $allowed)){
                if ($fileError === 0){
                    if ($fileSize < 10000000 ){
                        $fileNameNew = generateFileName().".".$fileActualExt;//uniqid('', true).".".$fileActualExt;
                        $fileDestination = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/product_img/".$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);  
                        array_push($fileNameArray,$fileNameNew);
                        echo "filed upload success";
                    }else{
                        echo "your file size is too high";
                    }
                }else{
                    echo "There was an error uploading your profile image";
                }
            }else{
                echo "Cannot upload file of this type";
            }
        }
    }


    if (isset($_POST['addProductMethod'])){
        print_r($_POST);
        $productName = isset($_POST['productName']) ? escapeSQLString($_POST['productName']) : "";
        $productDesc = isset($_POST['productDesc']) ? escapeSQLString($_POST['productDesc']) : "";
        $productCategory = isset($_POST['productCategory']) ? escapeSQLString($_POST['productCategory']) : 0;
        $productFeatures = isset($_POST['productFeatures']) ? escapeSQLString($_POST['productFeatures']) : null;
        $productionPoint = isset($_POST['productionPoint']) ? escapeSQLString($_POST['productionPoint']): 0;
        $productPrice = isset($_POST['productPrice']) ? floatval(escapeSQLString($_POST['productPrice'])) : 0;
        $productQuantity = isset($_POST['quantity']) ? floatval(escapeSQLString($_POST['quantity'])) : 0;
        $productUnit = isset($_POST['unit']) ? escapeSQLString($_POST['unit']): 0;
        $isProcessedFood = (isset($_POST['isProcessed']) && $_POST['isProcessed'] === true) ? 1 : 0;
        $isAvailable = true;
        $productRating = 0;
        $isprocessed = true;

        addProduct($productName, $productDesc, $productCategory, $productionPoint, $isProcessedFood, $isAvailable, $productPrice, $productQuantity, $productUnit, $productRating, $fileNameArray);
    }
}

?>




<div class="modal fade" id="addNewProduct">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="form">
        <div class="modal-content">
            <div class="modal-header">


                <script type="text/javascript">
                    //                    function readURL(input) {
                    //                        if (input.files && input.files.length > 0) {
                    //
                    //
                    //                            var i;
                    //                            for (i = 0; i < input.files.length; i++) {
                    //                                text += cars[i] + "<br>";
                    //                            }
                    //
                    //
                    //
                    //
                    //                            var reader = new FileReader();
                    //                            reader.onload = function (e) {
                    //                                $('#test').attr('src', e.target.result);
                    //                            }
                    //                            reader.readAsDataURL(input.files[0]);
                    //                        }
                    //                    }





                    $(function() {
                        // Multiple images preview in browser
                        var imagesPreview = function(input, placeToInsertImagePreview) {

                            if (input.files) {
                                var filesAmount = input.files.length;
                                document.getElementById(placeToInsertImagePreview).innerHTML = ''
                                document.getElementById('addImageBtn').className = 'plus circle icon big'
                                for (i = 0; i < filesAmount; i++) {
                                    var reader = new FileReader();

                                    reader.onload = function(event) {


                                        const imgdiv = document.createElement('div');

                                        imgdiv.className = 'image';

                                        imgdiv.innerHTML = `
<div class="overlay">

                    </div>
<img src="${event.target.result}" id="test" key="${i}">
`;
                                        
//If overlay botton needed then copy below code into inner html
//                                        <button type="button" class="btn btn-default edit-image-btn pull-right mt-2">
//<i class="minus circle icon colorRed"></i>
//                    </button>

                                        document.getElementById(placeToInsertImagePreview).appendChild(imgdiv);
                                        document.getElementById('addImageBtn').className = 'edit icon large'





                                        //                                        $($.parseHTML('<img>')).attr('src', event.target.result)
                                        //                                            .attr('id', "test")
                                        //                                            .appendTo(placeToInsertImagePreview);
                                    }

                                    reader.readAsDataURL(input.files[i]);
                                }
                            }

                        };

                        $('#gallery-photo-add').on('change', function() {
                            imagesPreview(this, 'gallery');
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
                <form method="post" id="newProductForm" enctype='multipart/form-data'>
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

                                <?php 
                                if (isset($_SESSION['productUnits'])){
                                    $units = $_SESSION['productUnits'];
                                    if (count($units) > 0){
                                        for ($i = 0; $i < count($units); $i++) {
                                            $unit = $units[$i];
                                            $unitName = isset($unit['unit_name']) ? $unit['unit_name'] : "";
                                            $unitId = isset($unit['unit_id']) ? $unit['unit_id'] : 0;
                                            $unitAbbr = isset($unit['unit_abbr']) ? $unit['unit_abbr'] : "";
                                ?>
                                <option value="<?php echo $unitId?>"><?php echo "$unitName ($unitAbbr)" ?></option>
                                <?php 
                                        }
                                    }
                                }else{
                                }
                                ?>
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
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Add product images</label>
                        <div class="mx-4 justify-content-center row">
                            <div id="gallery" class="gallery row">

                            </div>
                            <div class="my-auto">
                                <label class="btn btn-default rounded-circle" id="addBtn">
                                    <!--<i class="fa fa-plus"></i> <input onchange="readURL(this);" type="file" hidden id="gallery-photo-add" name="files[]" multiple>-->
                                    <i id="addImageBtn" class="plus circle icon big"></i>
                                    <input id="gallery-photo-add" hidden type="file" name="file[]" id="file" multiple>
                                </label>
                            </div>


                            <!--
<button id="addBtn" class="circular ui icon button">
<i class="icon settings"></i>
<input id="gallery-photo-add" hidden type="file" name="file[]" id="file" multiple>
</button>
-->
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
    .image {
        position: relative;
        display: inline-block;
    }

    .overlay {
        position: absolute;
        right: 0;
        z-index: 5;
    }
    .colorRed {
        color: red;
    }
</style>