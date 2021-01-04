<style>
    <?php include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/productCard.css"; ?>
</style>
<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductModal.php");
?>

<div class="d-flex justify-content-center">

    <button id="addProductModalBtn" onclick="openAddProductModal(0)" type="button" class="col-sm-11 col-md-5 m-3 ui green button">
        <i class="plus icon"></i>
        Add a new product
    </button>



    <script>



        $(document).ready(function(){
            $('#productionPointDropdown').dropdown();
        });






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


        function openAddProductModal(productId){

            var editProductId = 0;
            var editProductName = "";
            var editProductDesc = "";
            var editProductCategory = 0;
            var editProductFeatures = [];
            var editProductPrice = "";
            var editProductQuantity = "";
            var editProductUnit = 0;
            var editIsProcessedProduct = false;
            var editProductLocation = 0;            

            if (productId == 0){
                $('#addNewProduct').modal('toggle');

                document.getElementById("productId").value = editProductId;
                document.getElementById("productName").value = editProductName;
                document.getElementById("productDesc").value = editProductDesc;
                document.getElementById("productCategory").value = editProductCategory;
                $('#productFeatures').selectpicker('val', editProductFeatures);

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
                    if (data != null){
                        editProductId = data.product_id != null ? data.product_id : 0;
                        editProductName = data.product_name != null ? data.product_name : "";
                        editProductDesc = data.product_description != null ? data.product_description : "";
                        editProductCategory = data.product_category != null ? data.product_category : 0;
                        editProductFeatures = data.product_features != null ? data.product_features : [];
                        editProductPrice = data.price_per_unit != null ? data.price_per_unit : "";
                        editProductQuantity = data.quantity_of_price != null ? data.quantity_of_price : "";
                        editProductUnit = data.unit != null ? data.unit : 0;
                        editIsProcessedProduct = data.is_processed_product != null ? data.is_processed_product : false;
                        editProductLocation = data.production_location != null ? data.production_location : 0;

                        $('#addNewProduct').modal('toggle');

                        document.getElementById("productId").value = editProductId;
                        document.getElementById("productName").value = editProductName;
                        document.getElementById("productDesc").value = editProductDesc;
                        document.getElementById("productCategory").value = editProductCategory;
                        $('#productFeatures').selectpicker('val', editProductFeatures);

                        document.getElementById("productFeatures").contentWindow.location.reload(true);
                        document.getElementById("productPrice").value = editProductPrice;
                        document.getElementById("quantity").value = editProductQuantity;
                        document.getElementById("unit").value = editProductUnit;
                        document.getElementById("isProcessed").checked = editIsProcessedProduct;
                        document.getElementById("productionPointOptions").value = editProductLocation;
                    }


                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                    $('#addNewProduct').modal('toggle');
                }
            });

        }
        function deleteProduct(productId){
            $.ajax({
                type: "POST",
                url: "/kleinerzeugernetzwerk/controller/productController.php",
                data: { productId: productId, isDelete: true },
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


<div class="card-deck overflow-hidden">
    <!--    <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/productCard.php");?>-->

</div>
<div class="row d-flex justify-content-center">

    <!--   Fetch all the products by the producer and dispplay it as cards-->
    <?php 
    $carrotImg ="$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/images/carrot_1.jpg";
    global $dbConnection;
    if (isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];

        $fetchProductQuery = "SELECT * from products p
LEFT JOIN images i on (i.entity_id = p.product_id and i.image_type = 1)
WHERE p.producer_id = '$userId'
GROUP BY p.product_id ORDER BY p.created_date DESC";


        $getProductsQuery = mysqli_query($dbConnection, $fetchProductQuery  );
        confirmQuery($getProductsQuery);
        $productCount = mysqli_num_rows($getProductsQuery);
        if ($productCount == 0){
            echo "<h1> No products availabe. Try adding some products.</h1>";
        }else{
            while($row = mysqli_fetch_assoc($getProductsQuery)) {
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $productDesc = $row['product_description'];
                $productCategory = $row['product_category'];
                $productPrice = $row['price_per_unit'];
                //                $productQuantity = $row['product_quantity'];
                $productUnit = $row['unit'];
                $imageName = $row['image_name'];
                $imagePath = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/product_img/";
                if ($imageName === null){
                    $imagePath = "/kleinerzeugernetzwerk/images/default_products.jpg";
                }else{
                    $imagePath .= $imageName;
                }

    ?>

    <div class="w3-card-4 test m-4 shadow bg-white rounded productCard" id="productCard">
        <div class="overflow-hidden" width="280" height="180">
            <img src="<?php echo $imagePath ?>" alt="Avatar" width="280">
        </div>
        <div class="p-2">
            <h4><b><?php echo $productName ?></b></h4>   
            <p id="productDesc" class="overflow-hidden"><?php echo $productDesc ?></p> 
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


            <!--
<button id="addProductModalBtn" data-target="#addNewProduct" data-toggle="modal"  data-backdrop="static" data-keyboard="false" type="button" class="col-sm-11 col-md-5 m-3 ui green button">
<i class="plus icon"></i>
Add a new product
</button>
-->

            <!--<div class="ui teal vertical animated button m-2" tabindex="0" onclick="editProduct(<?php //echo $productId?>)" value="<?php //echo $productId?>" type="button">-->

            <!--            onclick="editProduct(<?php //echo $productId?>)" value="<?php //echo $productId?>"-->

            <div class="d-flex justify-content-between align-items-center">
                <!--                <div class="ui teal vertical animated button m-2" tabindex="0" data-target="#addNewProduct" data-toggle="modal"  data-backdrop="static" data-keyboard="false" type="button">-->
                <button type="button m-2" class="btn btn-primary btn-sm" onclick="openAddProductModal(<?php echo $productId?>)" value="<?php echo $productId?>">Edit</button>
                <button type="button m-2" class="btn btn-danger btn-sm" onclick="showDeleteProductModal(<?php echo $productId?>)" value="<?php echo $productId?>">Delete</button>

                <!--
<div class="ui teal vertical animated button m-2" tabindex="0" onclick="openAddProductModal(<?php echo $productId?>)" value="<?php echo $productId?>" type="button">
<div class="hidden content">Edit</div>
<div class="visible content">
<i class="edit icon"></i>
</div>
</div>
-->
                <!--
<div class="ui red vertical animated button m-2" tabindex="0">
<div class="hidden content">Delete</div>
<div class="visible content">
<i class="trash icon"></i>
</div>
</div>
-->
            </div>

        </div>
    </div>
    <?php
            }
        }
    }


    ?>

</div>  

<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
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
