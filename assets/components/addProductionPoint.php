
<?php
//MAP to caputure production point locations.



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




<div class="modal fade" id="addProductionPoint">
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







                <div class="text-center"><h5 class="modal-title"><i class="material-icons">&#xE147;</i>Add new production point</h5></div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <p>Modal body text goes here.</p>
                <form method="post" id="newProductionPointForm">
                    <div class="form-group">
                        <label for="productionPointName">Production Point Name</label>
                        <input type="text" class="form-control" id="productionPointName" aria-describedby="productionPointName" placeholder="Production Point Name" name="productionPointName">
                    </div>
                    <div class="form-group">
                        <label for="productionPointDesc">Production Point Description</label>
                        <textarea class="form-control" id="productionPointDesc" name="productionPointDesc" rows="4" placeholder="Write a description about your production point."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/productionPointMap.php");?>
                        </div>


                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label for="validationCustom03">Street</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Street" required name="street">
                                    <div class="invalid-feedback">
                                        Please provide a valid Street Name.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="validationCustom04">House Number</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="House Number" required name="house_number">
                                    <div class="invalid-feedback">
                                        Please provide a valid hosue number.
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Zip</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Zip" required name="zip">
                                    <div class="invalid-feedback">
                                        Please provide a valid Zip.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="City" required name="city">
                                    <div class="invalid-feedback">
                                        Please provide a valid City.
                                    </div>
                                </div>
                            </div>
                            <div class="m-4"><button type="button" class="btn btn-link col-md-12">Locate on map</button></div>
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