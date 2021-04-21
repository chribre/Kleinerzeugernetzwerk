<?php
/****************************************************************
   FILE:      products.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  09.02.2021

   PURPOSE:   Page to view/edit/delete products by the user.
              products are displayed as cards.
****************************************************************/
?>


<style>
    <?php require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/productCard.css"; ?>
</style>
<?php
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductModal.php");
?>
<div class="d-flex justify-content-center">
    <button id="addProductModalBtn" onclick="openAddProductModal(0)" type="button" class="col-sm-11 col-md-5 m-3 btn btn-success">
        <i class="plus icon"></i>
        Add a new product
    </button>
</div>
<div class="container" id="productListContainer">
    <ul class="my-5" id="productList">
    </ul>
</div>

<div class="d-flex justify-content-center">

    <!--
<button id="addProductModalBtn" onclick="openAddProductModal(0)" type="button" class="col-sm-11 col-md-5 m-3 btn btn-success">
<i class="plus icon"></i>
Add a new product
</button>
-->



    <script>



        $(document).ready(function(){
            $('#productionPointDropdown').dropdown();
            const userId = localStorage.getItem("userId");
            loadAllProducts(userId);
        });

        //        window.onload = function() {
        //            loadAllProducts(<?php echo $_SESSION['userId']?>)
        //        };

        /*
            PURPOSE     :   Fetch products from backend and load data as a card
            INPUT       :   userId (products are fetched based on user id)
            OUTPUT      :   HTML card element for each product is created and added to product list.
        */
        function loadAllProducts(userId){
            $.ajax({
                type: "GET",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                headers: {
                    'access-token': localStorage.getItem('token'),
                    'user_id': userId,
                },
                data: { userId: userId, fetchAllProducts: true },
                dataType: "json",
                success: function( data ) {
                    console.log(data) 
                    const features = localStorage.getItem("productFeatures");
                    const featureJson = JSON.parse(features);

                    const categories = localStorage.getItem("productCategories");
                    const categoryJson = JSON.parse(categories);

                    document.getElementById("productContainer").innerHTML = "";
                    if (data != null || data.length != 0){
                        data.forEach(productData => {

                            const productId = productData.product_id != null ? productData.product_id : 0;
                            const productName = productData.product_name != null ? productData.product_name : "";
                            const productDesc = productData.product_description != null ? productData.product_description : "";
                            const productCategory = productData.product_category != null ? productData.product_category : 0;

                            const categoryDict = categoryJson.filter(
                                function(data){ return data.category_id == productCategory }
                            );
                            const categoryName = categoryDict.category_name;
                            const productPrice = productData.price_per_unit != null ? productData.price_per_unit : "";
                            const productQuantity = productData.quantity_of_price != null ? productData.quantity_of_price : "";
                            const productUnit = productData.unit != null ? productData.unit : 0;
                            const isProcessedProduct = productData.is_processed_product != null ? productData.is_processed_product : false;
                            const productLocation = productData.production_location != null ? productData.production_location : 0;

                            const defaultImage = "https://previews.123rf.com/images/mcjvil40yahoocom/mcjvil40yahoocom1804/mcjvil40yahoocom180400001/98805032-low-light-food-photography-of-a-broccoli.jpg"
                            var imagePath = productData.image_path != null ? productData.image_path : defaultImage;

                            const featureData = productData.product_feature != null ? productData.product_feature : [];
                            var featureArray = [];
                            if (featureData.length !=0){
                                const featureDataArray = parseProductFeature(featureData);
                                featureArray = featureDataArray.featureTypeArray;
                                //                                editProductFeatureId = featureDataArray.featureIdArray;
                            }



                            imageName = '/kleinerzeugernetzwerk/images/default_products.jpg'


                            var card = `<div class="blog-card">
<div class="meta">
<div class="photo" style="background-image: url(${imagePath})"></div>
        </div>
<div class="description">
<h1>${productName}</h1>
<h2>${categoryName}</h2>
<p> ${productDesc}</p> <div class="row mx-0 mb-2 d-flex justify-content-start mt-2">`;

                            var featureUI = ``;
                            featureArray.forEach(feature =>{
                                const featureName = featureJson.forEach(featureDict => {
                                    const id = featureDict.feature_type_id;
                                    if(id == feature){
                                        //                                        return featureDict.feature_name;
                                        featureUI += `<div class="rounded-pill border border-secondary align-items-center mb-1 mr-1">
<img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
<h class="text-gray mx-1">${featureDict.feature_name}</h>
        </div>`;
                                    }                                    
                                },"");

                                card += featureUI;
                            })

                            card += `</div> <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
<button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}">Delete</button>
<button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}">Edit</button>
<button type="button" class="btn btn-success" id="viewProductBtn" onclick="viewProductInDetail(${productId})">View</button>


        </div>





        </div>


        </div>`;




































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
                                const featureName = featureJson.forEach(featureDict => {
                                    const id = featureDict.feature_type_id;
                                    if(id == feature){
                                        //                                        return featureDict.feature_name;
                                        featureUI += `<div class="rounded-pill border border-secondary align-items-center mb-1">
<img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
<h class="text-gray mx-1">${featureDict.feature_name}</h>
        </div>`;
                                    }                                    
                                },"");
                                console.log(featureName);
                                //                                featureUI += `<div class="rounded-pill border border-secondary align-items-center mb-1">
                                //<img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                                //<h class="text-gray mx-1">${featureName}</h>
                                //        </div>`;
                            })

                            productCard += featureUI;


                            productCard += `</div>
<div class="row justify-content-between align-items-center px-3">
<button type="button" class="btn btn-primary btn-sm col-3" onclick="openAddProductModal(${productId})" value="${productId}">Edit</button>
<button type="button" class="btn btn-danger btn-sm col-3" onclick="showDeleteProductModal(${productId})" value="${productId}">Delete</button>

        </div>

        </div>
        </div>`;
                            //                            document.getElementById("productContainer").innerHTML += productCard;
                            //                            document.getElementById("productContainer").innerHTML += card;

                            var productListObj = document.getElementById("productListContainer");
                            productListObj.innerHTML = productListObj.innerHTML + card;
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


        /*
            function to set product categories on to the product category drop down list 
            in the new product modal form from cached values
        */
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


        /*
            function to set product features on to the product feature drop down list 
            in the new product modal form from cached values
        */
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

        /*
            function to set product units on to the unit drop down list 
            in the new product modal form from cached values
        */
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


        /*
            function to set product features on to the product feature drop down list 
            in the new product modal form from cached values
        */
        function setProductionPointList(){
            const productionPointJsonString = localStorage['productionPoints'] || "";
            const productionPoints = JSON.parse(productionPointJsonString) || [];
            var productionPointOptions = ``;
            if (productionPoints.length != 0){
                productionPoints.forEach(element =>{
                    const productionPointId = element['farm_id'] != null ? element['farm_id'] : 0;
                    const productionPointName = element['farm_name'] != null ? element['farm_name'] : "";

                    const street = element['street'] != null ? element['street'] : "";
                    const houseNum = element['house_number'] != null ? element['house_number'] : "";
                    const city = element['city'] != null ? element['city'] : "";
                    const zip = element['zip'] != null ? element['zip'] : "";

                    const productionPointAddress = `${street} ${houseNum}, ${city} - ${zip}`;

                    productionPointOptions += `<option value="${productionPointId}" data-subtext="${productionPointAddress}">${productionPointName}</option>`
                })
            }
            document.getElementById("productionPointOptions").innerHTML = productionPointOptions;
            $('#productionPointOptions').selectpicker('refresh');
        }

        /*        
            FUNCTION    :   To open add product modal to add new product or edit existing product. 

            INPUT       :   id of the product in the database
            OUTPUT      :     
            NOTES       :   First initialize modal form with default data, product id to fetch details from backend if it is not 0
        */
        function openAddProductModal(productId){
            const userId = localStorage.getItem('userId');
            setCategories();
            setFeatureList();
            setUnits();
            setProductionPointList();
            getSellingPoints();
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

            var editProductSellers = [];
            var editProductSellerId = [];

            var productImageId = [];
            var imagePathArray = [];
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

                $('#productSellers').selectpicker('val', editProductSellers);
                document.getElementById("sellerIdArray").setAttribute('data-id', editProductSellerId);
                document.getElementById("productImageIdArray").setAttribute('data-id', productImageId);
                document.getElementById("gallery").innerHTML = '';
                return 0;
            }



            $.ajax({
                type: "GET",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                headers: {
                    'access-token': localStorage.getItem('token'),
                    'user_id': userId,
                },
                data: { productId: productId, producerId: userId},
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


                        const sellerData = data[2] != null ? data[2] : [];
                        if (sellerData.length !=0){
                            const sellerDataArray =  parseProductSellers(sellerData);

                            editProductSellers = sellerDataArray.sellerArray;
                            editProductSellerId = sellerDataArray.prductSellerIdArray;

                        }


                        const productImageData = data[3] != null ? data[3] : [];
                        if (productImageData.length !=0){
                            const productImages =  parseProductImages(productImageData);

                            productImageId = productImages.productImageIdArray;
                            imagePathArray = productImages.imagePathArray;
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

                        $('#productSellers').selectpicker('val', editProductSellers);
                        document.getElementById("sellerIdArray").setAttribute('data-id', editProductSellerId);


                        document.getElementById("productPrice").value = editProductPrice;
                        document.getElementById("quantity").value = editProductQuantity;
                        document.getElementById("unit").value = editProductUnit;
                        document.getElementById("isProcessed").checked = editIsProcessedProduct;
                        $('#productionPointOptions').selectpicker('val', editProductLocation);

                        document.getElementById("productImageIdArray").setAttribute('data-id', productImageId);
                        setProductImages(imagePathArray);
                    }


                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                }
            });

        }

        function setProductImages(imagePathArray){
            var productImageGallery = "";
            imagePathArray.forEach(element =>{
                const path = element;
                productImageGallery += `<div class="image">
<div class="overlay"></div>
<img src="${path}" id="test" key="2">
        </div>`;
            })
            document.getElementById("gallery").innerHTML = productImageGallery;
        }

        /*
            function to set product seller on to the selling point drop down list 
            in the new product modal form from cached values
        */
        function setSellingPointList(sellingPoints){
            //            const sellingPointJsonString = localStorage['sellingPoints'] || "";
            //            const sellingPoints = JSON.parse(sellingPointJsonString) || [];
            var sellingPointOptions = ``;
            if (sellingPoints.length != 0){
                sellingPoints.forEach(element =>{
                    const sellingPointId = element['sellerId'] != null ? element['sellerId'] : 0;
                    const sellingPointName = element['sellerName'] != null ? element['sellerName'] : "";

                    const street = element['street'] != null ? element['street'] : "";
                    const buildingNumber = element['buildingNumber'] != null ? element['buildingNumber'] : "";
                    const city = element['city'] != null ? element['city'] : "";
                    const zip = element['zip'] != null ? element['zip'] : "";

                    const sellingPointAddress = `${street} ${buildingNumber}, ${city} - ${zip}`;

                    sellingPointOptions += `<option value="${sellingPointId}" data-subtext="${sellingPointAddress}">${sellingPointName}</option>`
                })
            }
            document.getElementById("productSellers").innerHTML = sellingPointOptions;
            $('#productSellers').selectpicker('refresh');
        }



        function getSellingPoints(){
            const userId = localStorage.getItem('userId');
            $.ajax({
                type: "POST",
                url: "/kleinerzeugernetzwerk/controller/sellerController.php",

                headers: {
                    'access-token': localStorage.getItem('token'),
                    'user_id': userId,
                    'action': "READ_ALL"
                },
                beforeSend: function(){
                    $("#overlay").fadeIn(300);　
                },
                complete: function(){
                    $("#overlay").fadeOut(300);
                },
                data: { 
                    producer_id: userId, 
                },
                success: function( data ) {
                    console.log(data)
                    const sellers = JSON.parse(data);
                    setSellingPointList(sellers);
                },
                error: function (request, status, error) {               
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

        function parseProductSellers(sellers){
            var sellerArray = [];
            var prductSellerIdArray = [];
            sellers.forEach(element => {
                seller = element.seller_id !== null ? element.seller_id : 0;
                productSellerId = element.id !== null ? element.id : 0;
                sellerArray.push(seller);
                prductSellerIdArray.push(productSellerId);
            });
            return {sellerArray, prductSellerIdArray};
        }
        function parseProductImages(imageData){
            var productImageIdArray = [];
            var imagePathArray = [];
            imageData.forEach(element => {
                imageId = element.image_id !== null ? element.image_id : 0;
                imagePath = element.image_path !== null ? element.image_path : "";
                productImageIdArray.push(imageId);
                imagePathArray.push(imagePath);
            });
            return {productImageIdArray, imagePathArray};
        }


        /*        
            FUNCTION:   Deletes a product from the list.

            INPUT:     id of the product in the database
            OUTPUT:    show message as a modal, success or failure 
            NOTES:     Ask confirmation before get deleted.
        */
        function deleteProduct(productId){
            const userId = localStorage.getItem('userId');
            $.ajax({
                type: "POST",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                headers: {
                    'access-token': localStorage.getItem('token'),
                    'user_id': userId,
                },
                data: { product_id: productId, is_delete: true, producer_id: userId },
                dataType: "json",
                success: function( data ) {
                    window.location.reload();
                    //Success Message Modal
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                    //Failure Message Modal
                }
            });
        }



        function showDeleteProductModal(productId){

            if (productId != 0){
                $('#deleteModal').modal('toggle');
                document.getElementById("deleteConfirmBtn").setAttribute("onClick", `deleteProduct(${productId})`);

            }

        }




        function viewProductInDetail(productId){
            $.ajax({
                type: "POST",
                url: "/kleinerzeugernetzwerk/controller/details.php",
                headers: {
                    'action': 'PRODUCT',
                },
                beforeSend: function(){
                    $("#overlay").fadeIn(300);　
                },
                complete: function(){
                    $("#overlay").fadeOut(300);
                },
                data: { productId: productId },
                dataType: "json",
                success: function( data ) {
                    console.log(data);
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                }
            });
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
