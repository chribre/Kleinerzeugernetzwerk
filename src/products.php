<style>
    <?php include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/productCard.css"; ?>
</style>
<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductModal.php");
?>

<div class="d-flex justify-content-center">

    <button id="addProductModalBtn" onclick="openAddProductModal(0)" type="button" class="col-sm-11 col-md-5 m-3 btn btn-success">
        <i class="plus icon"></i>
        Add a new product
    </button>



    <script>



        $(document).ready(function(){
            $('#productionPointDropdown').dropdown();
        });

        window.onload = function() {
            loadAllProducts(<?php echo $_SESSION['userId']?>)
        };

        function loadAllProducts(userId){
            $.ajax({
                type: "GET",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                data: { userId: userId, fetchAllProducts: true },
                dataType: "json",
                success: function( data ) {
                    console.log(data) 
                    document.getElementById("productContainer").innerHTML = "";
                    if (data != null || data.length != 0){
                        data.forEach(productData => {

                            const productId = productData.product_id != null ? productData.product_id : 0;
                            const productName = productData.product_name != null ? productData.product_name : "";
                            const productDesc = productData.product_description != null ? productData.product_description : "";
                            const productCategory = productData.product_category != null ? productData.product_category : 0;

                            const productPrice = productData.price_per_unit != null ? productData.price_per_unit : "";
                            const productQuantity = productData.quantity_of_price != null ? productData.quantity_of_price : "";
                            const productUnit = productData.unit != null ? productData.unit : 0;
                            const isProcessedProduct = productData.is_processed_product != null ? productData.is_processed_product : false;
                            const productLocation = productData.production_location != null ? productData.production_location : 0;

                            var imageName = productData.image_name != null ? productData.image_name : '/images/default_products.jpg';

                            const featureData = productData.product_feature != null ? productData.product_feature : [];
                            var featureArray = [];
                            if (featureData.length !=0){
                                const featureDataArray = parseProductFeature(featureData);
                                featureArray = featureDataArray.featureTypeArray;
                                //                                editProductFeatureId = featureDataArray.featureIdArray;
                            }



                            imageName = '/kleinerzeugernetzwerk/images/default_products.jpg'
                            var productCard = `<div class="w3-card-4 m-4 shadow bg-white rounded productCard" id="productCard">
<div class="overflow-hidden" width="280" height="180">
<img src="${imageName}" alt="Avatar" width="280">
        </div>
<div class="p-2">
<h4><b>${productName}</b></h4>   
<p id="productDesc" class="overflow-hidden" style="line-height: 1.4">${productDesc}</p> 
<div class="row mx-0 mb-2 d-flex justify-content-between">`;

                            var featureUI = ``;
                            featureArray.forEach(feature =>{
                                featureUI += `<div class="rounded-pill border border-secondary align-items-center mb-1">
<img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
<h class="text-gray mx-1">Bio</h>
        </div>`
                            })

                            productCard += featureUI;


                            productCard += `</div>
<div class="row justify-content-between align-items-center px-3">
<button type="button" class="btn btn-primary btn-sm col-3" onclick="openAddProductModal(${productId})" value="${productId}">Edit</button>
<button type="button" class="btn btn-danger btn-sm col-3" onclick="showDeleteProductModal(${productId})" value="${productId}">Delete</button>

        </div>

        </div>
        </div>`;
                            document.getElementById("productContainer").innerHTML += productCard;
                        })
                    }

                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                }
            });
        }





        //        //Ajax call to get all the farms of a producer to list in add product screen
        //        $('#addNewProduct').on('shown.bs.modal', function (e) {
        //            $.ajax({
        //                url:"/kleinerzeugernetzwerk/src/getFarmData.php",    //the page containing php script
        //                type: "get",    //request type,
        //                contentType: "application/json",
        //                dataType: 'json',
        //                success:function(result){
        //                    console.log(result)     
        //                     $("#productionPointOptions").attr('disabled', false);
        //                    $.each(result,function(i,obj){
        //                        console.log(obj)
        //                        const fName = obj.farm_name;
        //                        const fAddress = obj.farm_address;
        //                        const fId = obj.farm_id;
        //
        //                        
        //                        
        //                        var div_data="<div class='item' data-value="+fId+"><h5>"+fName+"</h5><div>"+fAddress+"</div></div>";
        //                        var productionPointOptions="<option value="+fId+" >"+fName+ "-"+fAddress+"</option>";
        //
        //                        $("#productionPointOptions").append(productionPointOptions);
        ////                        $(div_data).appendTo('#productionPointMenu');
        //                    })
        ////                                        $("#productionPointOptions").load(" #productionPointOptions");
        //                },
        //                error: function (request, status, error) {
        //                    alert(request.responseText);
        //                    console.log(error)
        //                }
        //            });
        //        })


        function setCategories(){
            const categoriesJsonString = localStorage['productCategories'] || "";
            const categories = JSON.parse(categoriesJsonString) || [];
            var categoryOptions = ``;
            if (categories.length != 0){
                categories.forEach(element =>{
                    const categoryId = element['category_id'] != null ? element['category_id'] : 0;
                    const categoryName = element['category_name'] != null ? element['category_name'] : "";
                    const categoryDesc = element['category_description'] != null ? element['category_description'] : "";

                    categoryOptions += `<option value="${categoryId}" >${categoryName}</option>`

                })
            }
            document.getElementById("productCategory").innerHTML = categoryOptions;
            $('#productCategory').selectpicker('refresh');
        }
        function setFeatureList(){
            const featuresJsonString = localStorage['productFeatures'] || "";
            const features = JSON.parse(featuresJsonString) || [];
            var featureOptions = ``;
            if (features.length != 0){
                features.forEach(element =>{
                    const featureId = element['feature_type_id'] != null ? element['feature_type_id'] : 0;
                    const featureName = element['feature_name'] != null ? element['feature_name'] : "";
                    const featureDesc = element['feature_description'] != null ? element['feature_description'] : "";

                    featureOptions += `<option value="${featureId}" >${featureName}</option>`
                })
            }
            document.getElementById("productFeatures").innerHTML = featureOptions;
            $('#productFeatures').selectpicker('refresh');
        }
        function setUnits(){
            const unitJsonString = localStorage['productUnits'] || "";
            const units = JSON.parse(unitJsonString) || [];
            var unitOptions = ``;
            if (units.length != 0){
                units.forEach(element =>{
                    const unitId = element['unit_id'] != null ? element['unit_id'] : 0;
                    const unitName = element['unit_name'] != null ? element['unit_name'] : "";
                    const unitDesc = element['unit_description'] != null ? element['unit_description'] : "";

                    unitOptions += `<option value="${unitId}" >${unitName}</option>`
                })
            }
            document.getElementById("unit").innerHTML = unitOptions;
            $('#unit').selectpicker('refresh');
        }


        function openAddProductModal(productId){
            setCategories();
            setFeatureList();
            setUnits();
            var editProductId = 0;
            var editProductName = "";
            var editProductDesc = "";
            var editProductCategory = 0;
            var editProductFeatures = [];
            var editProductFeatureId = [];
            var editProductPrice = "";
            var editProductQuantity = "";
            var editProductUnit = 0;
            var editIsProcessedProduct = false;
            var editProductLocation = 0;            

            if (productId == 0){
                $('#addNewProduct').modal('show');

                document.getElementById("productId").value = editProductId;
                document.getElementById("productName").value = editProductName;
                document.getElementById("productDesc").value = editProductDesc;
                document.getElementById("productCategory").value = editProductCategory;
                $('#productFeatures').selectpicker('val', editProductFeatures);
                document.getElementById("featureIdArray").setAttribute('data-id', editProductFeatureId);

                //                document.getElementById("productFeatures").contentWindow.location.reload(true);
                document.getElementById("productPrice").value = editProductPrice;
                document.getElementById("quantity").value = editProductQuantity;
                document.getElementById("unit").value = editProductUnit;
                document.getElementById("isProcessed").checked = editIsProcessedProduct;
                document.getElementById("productionPointOptions").value = editProductLocation;

                return 0;
            }



            $.ajax({
                type: "GET",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                data: { productId: productId },
                dataType: "json",
                contentType: "application/json",
                cache: false,
                success: function( data ) {
                    if (data != null && data.length !== 0){
                        const productData = data[0][0] != null ? data[0][0] : {};
                        const featureData = data[1] != null ? data[1] : [];
                        if (featureData.length !=0){
                            const featureDataArray = parseProductFeature(featureData);
                            editProductFeatures = featureDataArray.featureTypeArray;
                            editProductFeatureId = featureDataArray.featureIdArray;
                            //                            {editProductFeatures, editProductFeatureId} = parseProductFeature(featureData);

                        }

                        editProductId = productData.product_id != null ? productData.product_id : 0;
                        editProductName = productData.product_name != null ? productData.product_name : "";
                        editProductDesc = productData.product_description != null ? productData.product_description : "";
                        editProductCategory = productData.product_category != null ? productData.product_category : 0;

                        editProductPrice = productData.price_per_unit != null ? productData.price_per_unit : "";
                        editProductQuantity = productData.quantity_of_price != null ? productData.quantity_of_price : "";
                        editProductUnit = productData.unit != null ? productData.unit : 0;
                        editIsProcessedProduct = productData.is_processed_product != null ? productData.is_processed_product : false;
                        editProductLocation = productData.production_location != null ? productData.production_location : 0;

                        $('#addNewProduct').modal('show');

                        document.getElementById("productId").value = editProductId;
                        document.getElementById("productName").value = editProductName;
                        document.getElementById("productDesc").value = editProductDesc;
                        $('#productCategory').selectpicker('val', editProductCategory);
                        $('#productFeatures').selectpicker('val', editProductFeatures);
                        document.getElementById("featureIdArray").setAttribute('data-id', editProductFeatureId);

                        document.getElementById("productPrice").value = editProductPrice;
                        document.getElementById("quantity").value = editProductQuantity;
                        document.getElementById("unit").value = editProductUnit;
                        document.getElementById("isProcessed").checked = editIsProcessedProduct;
                        $('#productionPointOptions').selectpicker('val', editProductLocation);
                    }


                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                }
            });

        }

        function parseProductFeature(features){
            var featureTypeArray = [];
            var featureIdArray = [];
            features.forEach(element => {
                feature = element.feature_type !== null ? element.feature_type : 0;
                featureId = element.id !== null ? element.id : 0;
                featureTypeArray.push(feature);
                featureIdArray.push(featureId);
            });
            return {featureTypeArray, featureIdArray};
        }

        function deleteProduct(productId){
            $.ajax({
                type: "POST",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                data: { product_id: productId, is_delete: true },
                dataType: "json",
                success: function( data ) {
                    window.location.reload();
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                }
            });
        }

        function showDeleteProductModal(productId){

            if (productId != 0){
                $('#deleteModal').modal('toggle');
                document.getElementById("deleteConfirmBtn").setAttribute("onClick", `deleteProduct(${productId})`);

            }

        }

    </script>


</div>


<div class="row d-flex justify-content-center" id="productContainer">

    <!--   Fetch all the products by the producer and dispplay it as cards-->

    <div class="w3-card-4 test m-4 shadow bg-white rounded productCard" id="productCard">
        <div class="overflow-hidden" width="280" height="180">
            <img src="" alt="Avatar" width="280">
        </div>
        <div class="p-2">
            <h4><b>Product Name</b></h4>   
            <p id="productDesc" class="overflow-hidden">Product Name</p> 
            <div class="row mx-0 mb-2">
                <div class="rounded-pill border border-secondary align-items-center">
                    <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                    <h class="text-gray mx-1">Bio</h>
                </div>
                <div class="rounded-pill border border-secondary align-items-center ml-2">
                    <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/vegan.png" width="20" height="20">
                    <h class="text-gray mx-1">Vegan</h>
                </div>
                <div class="rounded-pill border border-secondary align-items-center  ml-2">
                    <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                    <h class="text-gray mx-1">Bio</h>
                </div>
            </div>


            <div class="d-flex justify-content-between align-items-center">
                <!--                <div class="ui teal vertical animated button m-2" tabindex="0" data-target="#addNewProduct" data-toggle="modal"  data-backdrop="static" data-keyboard="false" type="button">-->
                <button type="button m-2" class="btn btn-primary btn-sm" onclick="" value="Product Name">Edit</button>
                <button type="button m-2" class="btn btn-danger btn-sm" onclick="" value="Product Name">Delete</button>


            </div>

        </div>
    </div>

</div>  

<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this product?.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteConfirmBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<style>
    /*    to make the product description only two lines*/
    #productDesc{
        max-height: 38px;
    }
</style>
