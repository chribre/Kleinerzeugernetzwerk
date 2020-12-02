<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductModal.php");
?>

<div class="d-flex justify-content-center">
    <button data-toggle="modal" data-target="#addNewProduct" data-backdrop="static" data-keyboard="false" type="button" class="col-sm-11 col-md-5 btn btn-primary btn-lg btn-block mb-3">+ Add a new product</button>
</div>


<div class="card-deck overflow-hidden">
    <!--    <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/productCard.php");?>-->

</div>
<div class="row d-flex justify-content-center">
    <?php 
    $carrotImg ="$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/images/carrot_1.jpg";
    $abc = '<div class="w3-card-4 test m-4 shadow bg-white rounded" id:"productCard">
    <div class="overflow-hidden" width="280" height="180">
        <img src="/kleinerzeugernetzwerk/images/carrot_1.jpg" alt="Avatar" width="280">
    </div>
    <div class="w3-container p-2">
        <h4><b>Product Name</b></h4>   
        <p>Description</p> 
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






    $card = '<div class="col-md-2">
                <div class="card mb-4 box-shadow">
                   <div class="position-relative">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="/kleinerzeugernetzwerk/images/carrot_1.jpg" data-holder-rendered="true">
                        </div>
                    <div class="card-body">
                        <h4>Product Name</h4>
                        <label for="">Category</label>
                        <p class="card-text">December 1st: Just in time for the start of December...</p>
                        <div class="row mx-0 mb-2">
                            <div class="rounded-pill bg-success align-items-center">
                                <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                                <h class="text-gray mx-1">Bio</h>
                            </div>
                            <div class="rounded-pill bg-success align-items-center ml-2">
                                <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/vegan.png" width="20" height="20">
                                <h class="text-gray mx-1">Vegan</h>
                            </div>
                            <div class="rounded-pill bg-success align-items-center  ml-2">
                                <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                                <h class="text-gray mx-1">Bio</h>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary rounded-pill px-4">Edit</button>
                            <button class="btn btn-danger rounded-pill"><span class="fa fa-trash-o"></span></button>
                        </div>
                    </div>
                </div>
            </div>';






    $x = 1;

    while($x <= 25) {
        echo $abc;
        $x++;
    }
    ?>
</div>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="position-relative">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="/kleinerzeugernetzwerk/images/carrot_1.jpg" data-holder-rendered="true">
                        <div class="position-absolute float-right"><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span></div>
                    </div>
                    <div class="card-body">
                        <h4>Product Name</h4>
                        <label for="">Category</label>
                        <p class="card-text">December 1st: Just in time for the start of December...</p>
                        <div class="row mx-0 mb-2">
                            <div class="rounded-pill bg-light align-items-center">
                                <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                                <h class="text-gray mx-1">Bio</h>
                            </div>
                            <div class="rounded-pill bg-light align-items-center ml-2">
                                <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/vegan.png" width="20" height="20">
                                <h class="text-gray mx-1">Vegan</h>
                            </div>
                            <div class="rounded-pill bg-light align-items-center  ml-2">
                                <img class="rounded-circle ml-1" src="/kleinerzeugernetzwerk/images/bio.jpg" width="20" height="20">
                                <h class="text-gray mx-1">Bio</h>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary rounded-pill px-4">Edit</button>
                            <button class="btn btn-danger rounded-pill">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="w3-card-4 test m-4 shadow bg-white rounded" id:"productCard">
    <div class="overflow-hidden" width="280" height="180">
        <img src="/kleinerzeugernetzwerk/images/carrot_1.jpg" alt="Avatar" width="280">
    </div>
    <div class="w3-container p-4">
        <h4><b>Product Name</b></h4>   
        <p>Description</p> 
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



