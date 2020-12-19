<style>
    <?php include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/productCard.css"; ?>
</style>
<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductModal.php");
?>

<div class="d-flex justify-content-center">

    <button id="addProductModalBtn" data-target="#addNewProduct" data-toggle="modal"  data-backdrop="static" data-keyboard="false" type="button" class="col-sm-11 col-md-5 m-3 ui green button">
        <i class="plus icon"></i>
        Add a new product
    </button>
    

    <script>
        
        $(document).ready(function(){
          $('#productionPointDropdown').dropdown();
    });
        
        
        //Ajax call to get all the farms of a producer to list in add product screen
        $('#addNewProduct').on('shown.bs.modal', function (e) {
            $.ajax({
                url:"/kleinerzeugernetzwerk/src/getFarmData.php",    //the page containing php script
                type: "get",    //request type,
                contentType: "application/json",
                dataType: 'json',
                success:function(result){
                    console.log(result)
                    $.each(result,function(i,obj){
                        console.log(obj)
                        const fName = obj.farm_name;
                        const fAddress = obj.farm_address;
                        const fId = obj.farm_id;
                        var div_data="<div class='item' data-value="+fId+"><h5>"+fName+"</h5><div>"+fAddress+"</div></div>";
                         $(div_data).appendTo('#productionPointMenu'); 
                    })
//                    $("#productionPointSelection").load(" #productionPointSelection");
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                    console.log(error)
                }
            });
        })
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
            <div class="d-flex justify-content-between align-items-center">
                <div class="ui teal vertical animated button m-2" tabindex="0">
                    <div class="hidden content">Edit</div>
                    <div class="visible content">
                        <i class="edit icon"></i>
                    </div>
                </div>
                <div class="ui red vertical animated button m-2" tabindex="0">
                    <div class="hidden content">Delete</div>
                    <div class="visible content">
                        <i class="trash icon"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
            }
        }
    }


    ?>

</div>  
<style>
/*    to make the product description only two lines*/
    #productDesc{
        max-height: 38px;
    }
</style>
