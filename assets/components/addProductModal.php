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


                <h5 class="modal-title text-center"><i class="material-icons">&#xE147;</i><?php echo gettext("Add a new product"); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <p><?php echo gettext("Modal body text goes here."); ?></p>
                <form method="post" id="newProductForm" enctype='multipart/form-data'>
                    <input type="hidden" name="productId" id="productId" >
                    <div class="form-group">
                        <label for="productName"><?php echo gettext("Product Name"); ?></label>
                        <input type="text" class="form-control" id="productName" aria-describedby="productName01" placeholder="Product name" name="productName" >
                    </div>
                    <div class="form-group">
                        <label for="productDesc"><?php echo gettext("Product Description"); ?></label>
                        <textarea class="form-control" id="productDesc" name="productDesc" rows="4" placeholder="Write a description about your product."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="productCategoryList"><?php echo gettext("Product Category"); ?></label>
                        <div>
                            <select class="selectpicker form-control" name="productCategory" id="productCategory">

                            </select>
                        </div>

                    </div>


                    <div class="form-group">
                        <label><?php echo gettext("Product Features"); ?></label>

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
                            <label for="productPrice"><?php echo gettext("Product Price"); ?></label>
                            <input type="text" id="productPrice" class="form-control" name="productPrice" placeholder="Price in Euro">
                        </div>
                        <div class="col">
                            <label for="quantity"><?php echo gettext("Quantity of Price"); ?></label>
                            <input type="text" id="quantity" class="form-control" name="quantity" placeholder="Quantity">
                        </div>
                        <div class="col">
                            <label for="unit"><?php echo gettext("Unit"); ?></label>
                            <select class="form-control" id="unit" name="unit">


                            </select>
                        </div>
                    </div>



                    <div class="form-group" id="productionPointSelection">
                        <label for="productionPoint"><?php echo gettext("Production Point"); ?></label>
                        <div>
                            <select class="selectpicker form-control" id="productionPointOptions" name="productionPoint">

                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label><?php echo gettext("Selling Points"); ?></label>

                        <div id="sellerIdArray" hidden></div>
                        <div>
                            <select class="selectpicker form-control" multiple data-actions-box="true" name="productSeller[]" id="productSellers">

                            </select>
                        </div>


                    </div>

                    <div id="productImageIdArray" hidden></div>
                    <div class="form-group">
                        <label><?php echo gettext("Add product images"); ?></label>
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
                                <label class="form-check-label" for="isProcessed"><?php echo gettext("It is a processed food."); ?></label>
                            </div>
                        </div>
                        <div>
                            <button type="button" id="addProductSubmitBtn" name="addProductMethod" value="true" class="btn btn-primary"><?php echo gettext("Save"); ?></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo gettext("Close"); ?></button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
   
/*
    FUNCTION    :   ajax call to create a product on submit of product form data
    INPUT       :   
    OUTPUT      :   create form data dictionary and reload window on success
*/
    document.getElementById("addProductSubmitBtn").onclick = function () { 

        const userId = localStorage.getItem('userId');
        const fd = createFormData();
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
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
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

    
/*
    FUNCTION    :   function to create product form data to submit to the backend
    INPUT       :   
    OUTPUT      :   returns dictionary of form data along with the files
*/
    function createFormData(){

        var file_data = $('#gallery-photo-add').prop('files');

        var productId = document.getElementById("productId").value;
        var productName = document.getElementById("productName").value;
        var productDesc = document.getElementById("productDesc").value;
        var productCategory = document.getElementById("productCategory").value;
        var productFeatures = $('#productFeatures').val(); //document.getElementById("productFeatures").value;
        var productFeatureId = $('#featureIdArray').data('id');
        var productFeatureIdArray = [];
        if (productSellerId != ""){
            if (typeof productFeatureId == "string"){
                productFeatureIdArray = productFeatureId.split(',')
            }else{
                productFeatureIdArray = [productFeatureId];
            }
        }


        var productSeller = $('#productSellers').val();
        var productSellerId = $('#sellerIdArray').data('id');
        var productSellerIdArray = [];
        if (productSellerId != ""){
            if (typeof productSellerId == "string"){
                productSellerIdArray = productSellerId.split(',')
            }else{
                productSellerIdArray = [productSellerId];
            }
        }


        var productImageId = $('#productImageIdArray').data('id');
        var productImageIdArray = [];
        if (productImageId != ""){
            if (typeof productImageId == "string"){
                productImageIdArray = productImageId.split(',')
            }else{
                productImageIdArray = [productImageId];
            }
        }



        var productPrice = document.getElementById("productPrice").value;
        var productQuantity = document.getElementById("quantity").value;
        var productUnit = document.getElementById("unit").value;
        var isProcessedProduct = document.getElementById("isProcessed").value;
        var productLocation = document.getElementById("productionPointOptions").value;

        const userId = localStorage.getItem('userId');


        var fd = new FormData();
        fd.append("product_id", productId);
        fd.append("producer_id", userId);
        fd.append("product_name", productName);
        fd.append("product_description", productDesc);
        fd.append("product_category", productCategory);
        fd.append("product_features", productFeatures);
        fd.append("product_features_id", productFeatureIdArray);
        fd.append("selling_points", productSeller);
        fd.append("product_seller_ids", productSellerIdArray);
        fd.append("production_location", productLocation);
        fd.append("is_processed_product", isProcessedProduct);
        fd.append("price_per_unit", productPrice);
        fd.append("quantity_of_price", productQuantity);
        fd.append("unit", productUnit);
        fd.append("product_images_id", JSON.stringify(productImageIdArray));


        for (let i = 0; i < file_data.length; i++) {
            let file = file_data[i];

            fd.append('files[]', file);
        }

        //        fd.append("files[]", file_data);

        return fd;
    }

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