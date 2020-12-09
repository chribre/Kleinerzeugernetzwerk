<style>
<?php include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/productCard.css"; ?>
</style>
<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductModal.php");
?>

<div class="d-flex justify-content-center">
    <!--   <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>-->
    <button data-toggle="modal" data-target="#addNewProduct" data-backdrop="static" data-keyboard="false" type="button" class="col-sm-11 col-md-5 btn btn-success mb-3 align-self-center"><i class="material-icons align-self-center m-0">&#xE147;</i><span>   Add a new product</span></button>
</div>


<div class="card-deck overflow-hidden">
    <!--    <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/productCard.php");?>-->

</div>
<div class="row d-flex justify-content-center">
    <?php 
    $carrotImg ="$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/images/carrot_1.jpg";
    global $dbConnection;
    if (isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
        $getProductsQuery = mysqli_query($dbConnection, "SELECT * FROM `products` WHERE `producer_id` = '$userId'");
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

    ?>

    <div class="w3-card-4 test m-4 shadow bg-white rounded productCard" id:"productCard">
        <div class="overflow-hidden" width="280" height="180">
            <img src="/kleinerzeugernetzwerk/images/carrot_1.jpg" alt="Avatar" width="280">
        </div>
        <div class="w3-container p-2">
            <h4><b><?php echo $productName ?></b></h4>   
            <p><?php echo $productDesc ?></p> 
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
                <button class="btn btn-sm btn-primary rounded-pill px-4">Edit</button>
                <button class="btn btn-sm btn-danger rounded-pill">Delete</button>
            </div>

        </div>
    </div>
    <?php
            }
        }
    }


    ?>
    
</div>  




<!--
<div class="row d-flex justify-content-center">
<?php 
$carrotImg ="$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/images/carrot_1.jpg";
$abc = '<div class="w3-card-4 test m-4 shadow bg-white rounded" id:"productCard">
    <div class="overflow-hidden" width="280" height="180">
        <img src="/kleinerzeugernetzwerk/images/carrot_1.jpg" alt="Avatar" width="280">
    </div>
    <div class="w3-container p-2">
        <h4><b>Product Name</b></h4>   
        <p>55% fruit spread suitable for baking also ideal for desserts Our dmBio fruit spread with 55% berries is made from sun-ripened fruits. Delicious on bread, for baking or for desserts.</p> 
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
            <button class="btn btn-sm btn-primary rounded-pill px-4">Edit</button>
            <button class="btn btn-sm btn-danger rounded-pill">Delete</button>
        </div>
    </div>
</div>';
     $x = 1;
    while($x <= 7) {
        echo $abc;
        $x++;
    }
    ?>
    </div>-->
