
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
                <h5 class="modal-title"><i class="material-icons">&#xE147;</i>Add a new product</h5>
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
                        <label for="productCategory">Product Category</label>
                        <select class="form-control" name="productCategory">
                            <option>Vegitables</option>
                            <option>Fruits</option>
                            <option>Dairy Products</option>
                            <option>Honey</option>
                            <option>Oil</option>
                            <option>Egg</option>
                            <option>Meat</option>
                            <option>Seafood</option>
                            <option>Desserts</option>
                            <option>Cereals</option>
                            <option>Baked goods</option>
                            <option>Dried foods</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productFeatures">Product Features</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Bio</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Vegan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                <label class="form-check-label" for="inlineCheckbox3">Vegetarian</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option3">
                                <label class="form-check-label" for="inlineCheckbox4">Non-vegetarian</label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="productPrice">Product Price</label>
                            <input type="text" class="form-control" name="productPrice" placeholder="Price in Euro">
                        </div>
                        <div class="col">
                            <label for="quantity">Quantity</label>
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