
<?php
//MAP to caputure production point locations.



global $dbConnection;
//PHP code to recieve post method with registartion data. it is identified by a hidden value 'signUp' to get the hit here.
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo('add production point post method hit,');
    $fileNameArray = [];
    if (isset($_FILES['file'])){
        $fileCount = count($_FILES['file']['name']);
        for ($idx = 0; $idx < $fileCount; $idx++){
            $fileNameNew = null;
            $fileName = $_FILES['file']['name'][$idx];
            $fileTmpName = $_FILES['file']['tmp_name'][$idx];
            $fileSize = $_FILES['file']['size'][$idx];
            $fileError = $_FILES['file']['error'][$idx];
            $fileType = $_FILES['file']['type'][$idx];


            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpeg', 'jpg', 'png');
            echo $fileActualExt;
            if (in_array($fileActualExt, $allowed)){
                if ($fileError === 0){
                    if ($fileSize < 10000000 ){
                        $fileNameNew = generateFileName().".".$fileActualExt;//uniqid('', true).".".$fileActualExt;
                        $fileDestination = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/production_point_img/".$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);  
                        array_push($fileNameArray,$fileNameNew);
                        echo "filed upload success";
                    }else{
                        echo "your file size is too high";
                    }
                }else{
                    echo "There was an error uploading your profile image";
                }
            }else{
                echo "Cannot upload file of this type";
            }
        }
    }
    if (isset($_POST['addProductionPointMethod'])){
        $pointName = escapeSQLString($_POST['productionPointName']);
        $pointDesc = escapeSQLString($_POST['productionPointDesc']);
        $pStreet = escapeSQLString($_POST['street']);
        $pHouseNum = escapeSQLString($_POST['house_number']);
        $pCity = escapeSQLString($_POST['city']);
        $pZip = escapeSQLString($_POST['zip']);
        $pointAddress = $pStreet . " " . $pHouseNum . ", " . $pCity . ", " . $pZip;

        $latitude = floatval(escapeSQLString($_POST['latitude']));
        $longitude = floatval(escapeSQLString($_POST['longitude']));
        $pointArea = 0;//escapeSQLString($_POST['pointArea']);


        addProductionPoint($pointName, $pointDesc, $pointAddress, $latitude, $longitude, $pointArea,$fileNameArray);
    }
}

?>



<div class="modal fade" id="addProductionPoint">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="form">
        <div class="modal-content">
            <div class="modal-header">




                <script type="text/javascript">


                    $(function() {
                        // Multiple images preview in browser
                        var imagesPreview = function(input, placeToInsertImagePreview) {

                            if (input.files) {
                                var filesAmount = input.files.length;
                                document.getElementById(placeToInsertImagePreview).innerHTML = ''
                                document.getElementById('addImageBtn').className = 'plus circle icon big'
                                for (i = 0; i < filesAmount; i++) {
                                    var reader = new FileReader();

                                    reader.onload = function(event) {


                                        const imgdiv = document.createElement('div');

                                        imgdiv.className = 'image';

                                        imgdiv.innerHTML = `
<div class="overlay">

                    </div>
<img src="${event.target.result}" id="test" key="${i}">
`;
                                        
//If overlay botton needed then copy below code into inner html
//                                        <button type="button" class="btn btn-default edit-image-btn pull-right mt-2">
//<i class="minus circle icon colorRed"></i>
//                    </button>

                                        document.getElementById(placeToInsertImagePreview).appendChild(imgdiv);
                                        document.getElementById('addImageBtn').className = 'edit icon large'





                                        //                                        $($.parseHTML('<img>')).attr('src', event.target.result)
                                        //                                            .attr('id', "test")
                                        //                                            .appendTo(placeToInsertImagePreview);
                                    }

                                    reader.readAsDataURL(input.files[i]);
                                }
                            }

                        };

                        $('#gallery-photo-add').on('change', function() {
                            imagesPreview(this, 'gallery');
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
                <form method="post" id="newProductionPointForm" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required name="zip">
                                    <div class="invalid-feedback">
                                        Please provide a valid Zip.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" id="validationCustom06" placeholder="City" required name="city">
                                    <div class="invalid-feedback">
                                        Please provide a valid City.
                                    </div>
                                </div>
                            </div>
                            <div class="m-4"><button type="button" class="btn btn-link col-md-12" id="locateOnMapBtn" onclick="findLocation()">Locate on map</button>
                            <input type="hidden" id="latitude" name="latitude" value="" />
                            <input type="hidden" id="longitude" name="longitude" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Add product images</label>
                        <div class="mx-4 justify-content-center align-middle row">
                            <div id="gallery" class="gallery row">

                            </div>
                            <div class="my-auto">
                                <label class="btn btn-default rounded-circle" id="addBtn">
                                    <i id="addImageBtn" class="plus circle icon big"></i>
                                    <input id="gallery-photo-add" hidden type="file" name="file[]" id="file" multiple accept="image/*">
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-end">
                        <div>
                            <button type="submit" name="addProductionPointMethod" value="true" class="btn btn-primary">Save</button>
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