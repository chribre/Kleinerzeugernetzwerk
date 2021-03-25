<?php
/****************************************************************
   FILE             :   addProductModal.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   To add a new product or edit existing product details into the database.
                        a form having space to enter the details of the product
****************************************************************/
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/10.31.0/js/jquery.fileupload.min.js" integrity="sha512-qPkNWpUqYz8bhO5bGNPBvlCB9hPZBil2ez5Mo8yVmpCKI315UDDPQeg/TE7KwZ+U/wdSO8JguwVxYY/Ha7U+vQ==" crossorigin="anonymous"></script>

<?php
//global $dbConnection;
//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//    echo('add product post method hit,');
//    $fileNameArray = [];
//    if (isset($_FILES['file'])){
//        $fileCount = count($_FILES['file']['name']);
//        for ($idx = 0; $idx < $fileCount; $idx++){
//            $fileNameNew = null;
//            $fileName = $_FILES['file']['name'][$idx];
//            $fileTmpName = $_FILES['file']['tmp_name'][$idx];
//            $fileSize = $_FILES['file']['size'][$idx];
//            $fileError = $_FILES['file']['error'][$idx];
//            $fileType = $_FILES['file']['type'][$idx];
//
//
//            $fileExt = explode('.', $fileName);
//            $fileActualExt = strtolower(end($fileExt));
//
//            $allowed = array('jpeg', 'jpg', 'png');
//            echo $fileActualExt;
//            if (in_array($fileActualExt, $allowed)){
//                if ($fileError === 0){
//                    if ($fileSize < 10000000 ){
//                        $fileNameNew = generateFileName().".".$fileActualExt;//uniqid('', true).".".$fileActualExt;
//                        $fileDestination = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/product_img/".$fileNameNew;
//                        move_uploaded_file($fileTmpName, $fileDestination);  
//                        array_push($fileNameArray,$fileNameNew);
//                        echo "filed upload success";
//                    }else{
//                        echo "your file size is too high";
//                    }
//                }else{
//                    echo "There was an error uploading your profile image";
//                }
//            }else{
//                echo "Cannot upload file of this type";
//            }
//        }
//    }
//
//    //PHP code to recieve post method with product data. it is identified by a hidden value 'addProductMethod' to get the hit here.
//    if (isset($_POST['addProductMethod'])){
//        print_r($_POST);
//        $productName = isset($_POST['productName']) ? escapeSQLString($_POST['productName']) : "";
//        $productDesc = isset($_POST['productDesc']) ? escapeSQLString($_POST['productDesc']) : "";
//        $productCategory = isset($_POST['productCategory']) ? escapeSQLString($_POST['productCategory']) : 0;
//        $productFeatures = isset($_POST['productFeatures']) ? $_POST['productFeatures'] : [];
//        $productionPoint = isset($_POST['productionPoint']) ? escapeSQLString($_POST['productionPoint']): 0;
//        $productPrice = isset($_POST['productPrice']) ? floatval(escapeSQLString($_POST['productPrice'])) : 0;
//        $productQuantity = isset($_POST['quantity']) ? floatval(escapeSQLString($_POST['quantity'])) : 0;
//        $productUnit = isset($_POST['unit']) ? escapeSQLString($_POST['unit']): 0;
//        $isProcessedFood = (isset($_POST['isProcessed']) && $_POST['isProcessed'] === true) ? 1 : 0;
//        $isAvailable = true;
//        $productRating = 0;
//
//
//        $productFeaturesArray = explode (",", $productFeatures);
//
//        addProduct($productName, $productDesc, $productCategory, $productionPoint, $isProcessedFood, $isAvailable, $productPrice, $productQuantity, $productUnit, $productRating, $fileNameArray, $productFeaturesArray);
//    }
//}

?>



<script type="text/javascript">

    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;
                document.getElementById(placeToInsertImagePreview).innerHTML = ''
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {


                        const imgdiv = document.createElement('div');

                        imgdiv.className = 'image';

                        imgdiv.innerHTML = `
<div class="overlay">
    </div>
<img src="${event.target.result}" id="test" key="${i}">`;

                        document.getElementById(placeToInsertImagePreview).appendChild(imgdiv);

                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'gallery');
        });
    });



    //    $('#addNewProduct').on('show.bs.modal', function () {
    //        setCategories()
    //    });

</script>



<div class="modal fade" id="addNewProduct">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="form">
        <div class="modal-content">
            <div class="modal-header">


                <h5 class="modal-title text-center"><i class="material-icons">&#xE147;</i>Add a new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <p>Modal body text goes here.</p>
                <form method="post" id="newProductForm" enctype='multipart/form-data'>
                    <input type="hidden" name="productId" id="productId" >
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" aria-describedby="productName01" placeholder="Product name" name="productName" >
                    </div>
                    <div class="form-group">
                        <label for="productDesc">Product Description</label>
                        <textarea class="form-control" id="productDesc" name="productDesc" rows="4" placeholder="Write a description about your product."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="productCategoryList">Product Category</label>
                        <div>
                            <select class="selectpicker form-control" name="productCategory" id="productCategory">

                            </select>
                        </div>

                    </div>


                    <div class="form-group">
                        <label>Product Features</label>

                        <div id="featureIdArray" hidden></div>
                        <div>
                            <select class="selectpicker form-control" multiple data-actions-box="true" name="productFeatures[]" id="productFeatures">

                            </select>
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
                            <input type="text" id="productPrice" class="form-control" name="productPrice" placeholder="Price in Euro">
                        </div>
                        <div class="col">
                            <label for="quantity">Quantity of Price</label>
                            <input type="text" id="quantity" class="form-control" name="quantity" placeholder="Quantity">
                        </div>
                        <div class="col">
                            <label for="unit">Unit</label>
                            <select class="form-control" id="unit" name="unit">


                            </select>
                        </div>
                    </div>



                    <div class="form-group" id="productionPointSelection">
                        <label for="productionPoint">Production Point</label>
                        <div>
                            <select class="selectpicker form-control" id="productionPointOptions" name="productionPoint">

                            </select>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label>Selling Points</label>

                        <div id="sellerIdArray" hidden></div>
                        <div>
                            <select class="selectpicker form-control" multiple data-actions-box="true" name="productSeller[]" id="productSellers">

                            </select>
                        </div>


                    </div>


                    <div class="form-group">
                        <label>Add product images</label>
                        <div class="mx-4 justify-content-center row">
                            <div id="gallery" class="row">

                            </div>
                            <div class="my-auto">
                                <label type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                    </svg>


                                    <input id="gallery-photo-add" hidden type="file" name="file[]" id="file" multiple accept="image/*">
                                    <span class="visually-hidden"></span>
                                </label>

                            </div>

                        </div>
                    </div>



                    <div class="modal-footer justify-content-between">

                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="isProcessed" name="isProcessed">
                                <label class="form-check-label" for="isProcessed">It is a processed food.</label>
                            </div>
                        </div>
                        <div>
                            <button type="button" id="addProductSubmitBtn" name="addProductMethod" value="true" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("addProductSubmitBtn").onclick = function () { 

        var productId = document.getElementById("productId").value;
        var productName = document.getElementById("productName").value;
        var productDesc = document.getElementById("productDesc").value;
        var productCategory = document.getElementById("productCategory").value;
        var productFeatures = $('#productFeatures').val(); //document.getElementById("productFeatures").value;
        var productFeatureId = $('#featureIdArray').data('id');
        var productFeatureIdArray = [];
        if (typeof productFeatureId == "string"){
            productFeatureIdArray = productFeatureId.split(',')
        }else{
            productFeatureIdArray = [productFeatureId];
        }
        
        
        var productSeller = $('#productSellers').val();
        var productSellerId = $('#sellerIdArray').data('id');
        var productSellerIdArray = [];
        if (typeof productSellerId == "string"){
            productSellerIdArray = productSellerId.split(',')
        }else{
            productSellerIdArray = [productSellerId];
        }
        
        

        //        var productFeatureIdArray = productFeatureId.split(',') != null ? productFeatureId.split(',') : [productFeatureId];
        var productPrice = document.getElementById("productPrice").value;
        var productQuantity = document.getElementById("quantity").value;
        var productUnit = document.getElementById("unit").value;
        var isProcessedProduct = document.getElementById("isProcessed").value;
        var productLocation = document.getElementById("productionPointOptions").value;

        const userId = localStorage.getItem('userId');
        
        $.ajax({
            url:"/kleinerzeugernetzwerk/controller/productController.php",    //the page containing php script
            type: "POST",    //request type,
            //                contentType: "application/json",
            //                dataType: 'json',
            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut (300);
            },
            data: {



                product_id: productId,
                producer_id: userId, 
                product_name: productName,
                product_description: productDesc,
                product_category: productCategory,
                product_features: productFeatures,
                product_features_id: productFeatureIdArray,
                selling_points: productSeller,
                product_seller_ids: productSellerIdArray,
                production_location: productLocation,
                is_processed_product: isProcessedProduct,
                price_per_unit: productPrice,
                quantity_of_price: productQuantity,
                unit: productUnit
            },
            success:function(result){
                console.log(result)
                window.location.reload();
            },
            error: function (request, status, error) {
                alert(request.responseText);
                console.log(error)
            }
        })
    };



</script>



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