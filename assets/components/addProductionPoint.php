<?php
/****************************************************************
   FILE             :   addProductionPoint.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   To add a new production point or edit existing product details into the database.
                        a form having space to enter the details of the production point
****************************************************************/

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

                        $('#production-point-gallery-photo-add').on('change', function() {
                            imagesPreview(this, 'production-point-gallery');
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
                <form id="newProductionPointForm" enctype="multipart/form-data" onsubmit="event.preventDefault()">
                    <!--                    <form method="post" id="newProductionPointForm" enctype="multipart/form-data">-->
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
                            <?php require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/productionPointMap.php");?>
                        </div>


                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="Street" required name="street">
                                    <div class="invalid-feedback">
                                        Please provide a valid Street Name.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="houseNumber">House Number</label>
                                    <input type="text" class="form-control" id="houseNumber" placeholder="House Number" required name="house_number">
                                    <div class="invalid-feedback">
                                        Please provide a valid hosue number.
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="zipCode">Zip</label>
                                    <input type="text" class="form-control" id="zipCode" placeholder="Zip" required name="zip">
                                    <div class="invalid-feedback">
                                        Please provide a valid Zip.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="City" required name="city">
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
                        <input type="hidden" id="productionPointId" name="productionPointId" value="0" />
                    </div>



                    <div id="productionPointImageIdArray" hidden></div>
                    <div class="form-group">
                        <label>Add Production Point Images</label>
                        <div class="mx-4 justify-content-center row">
                            <div id="production-point-gallery" class="row">

                            </div>
                            <div class="my-auto">
                                <label type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                    </svg>


                                    <input id="production-point-gallery-photo-add" hidden type="file" name="file[]" id="file" multiple accept="image/*">
                                    <span class="visually-hidden"></span>
                                </label>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-end">
                        <div>
                            <button class="btn btn-primary" id="saveProductionPointBtn">Save</button>
                            <!--                            <button type="submit" name="addProductionPointMethod" value="true" class="btn btn-primary">Save</button>-->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById("saveProductionPointBtn").onclick = function () { 
        if (document.getElementById('productionPointId').value == 0){
            addNewProductionPoint();
            //            updateProductionPoint();
            //            getAllProductionPoint();
            //            getProductionPointDetails();
            //            deleteProductionPoint()
        }else{
            updateProductionPoint();
        }

    }

    function fetchProductionPointFormData(){
        const ids = ['productionPointName', 'productionPointDesc', 'street', 'houseNumber', 'zipCode', 'city', 'latitude', 'longitude', 'productionPointId'];
        var formData = [];

        ids.forEach(function(element) {
            const value = document.getElementById(element).value != null ? document.getElementById(element).value: "";
            formData[element] = value;
        }); 
        const address = formData.street + ', ' + formData.houseNumber + ', ' + formData.city + ' - ' + formData.zipCode;
        formData['address'] = address;
        return formData
    }



    function createProductionPointFormData(productionPointData){
        const userId = localStorage.getItem('userId');
        var file_data = $('#production-point-gallery-photo-add').prop('files');
        var formDataCollection = new FormData();
        for (let i = 0; i < file_data.length; i++) {
            let file = file_data[i];

            formDataCollection.append('files[]', file);
        }

        var productionPointImageId = $('#productionPointImageIdArray').data('id') ? $('#productionPointImageIdArray').data('id') : [];
        var productionPointImageIdArray = [];
        if (productionPointImageId != ""){
            if (typeof productionPointImageId == "string"){
                productionPointImageIdArray = productionPointImageId.split(',')
            }else{
                productionPointImageIdArray = [productionPointImageId];
            }
        }


        formDataCollection.append("farm_id", productionPointData.productionPointId);
        formDataCollection.append("producer_id", userId);
        formDataCollection.append("farm_name", productionPointData.productionPointName);
        formDataCollection.append("farm_desc", productionPointData.productionPointDesc);
        formDataCollection.append("farm_address", productionPointData.address);
        formDataCollection.append("street", productionPointData.street);
        formDataCollection.append("house_number", productionPointData.houseNumber);
        formDataCollection.append("city", productionPointData.city);
        formDataCollection.append("zip", productionPointData.zipCode);
        formDataCollection.append("latitude", productionPointData.latitude);
        formDataCollection.append("longitude", productionPointData.longitude);
        formDataCollection.append("production_point_image_id", JSON.stringify(productionPointImageIdArray));

        return formDataCollection;
    }



    function addNewProductionPoint(){
        const formData = fetchProductionPointFormData();
        const formDataCollection = createProductionPointFormData(formData);
        const userId = localStorage.getItem('userId');

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/productionPointController.php",

            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
                'action': "CREATE"
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            cache: false,
            contentType: false,
            processData: false,
            data: formDataCollection,
            //            data: { 
            //                farm_id: 0,
            //                producer_id: userId,
            //                farm_name: formData.productionPointName,
            //                farm_desc:formData.productionPointDesc,
            //                farm_address:formData.address,
            //                street:formData.street,
            //                house_number:formData.houseNumber,
            //                city:formData.city,
            //                zip:formData.zipCode,
            //                latitude:formData.latitude,
            //                longitude:formData.longitude,
            //
            //            },
            success: function( data ) {
                console.log(data)
                $('#addProductionPointPoint').modal('hide');
                location.reload();
                //                const userDetails = JSON.parse(data);
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }


    $('#addProductionPointPoint').on('hide.bs.modal', function (e) {
        // do something...
        getAllProductionPoint();
    })

    $("#addProductionPointPoint").on("hidden.bs.modal", function () {
        // put your default event here
        getAllProductionPoint();
    });




    function updateProductionPoint(){
        const formData = fetchProductionPointFormData();
        const formDataCollection = createProductionPointFormData(formData);
        const userId = localStorage.getItem('userId');

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/productionPointController.php",

            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
                'action': "UPDATE"
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            cache: false,
            contentType: false,
            processData: false,
            data: formDataCollection,
            //            data: { 
            //                farm_id: 17,
            //                producer_id: userId,
            //                farm_name: 'Rooster Orchard',
            //                farm_desc:'This name generator will give you 10 names fit for farms, ranches, and pastures. All the names are heavily based on real life farm names, which are often either named after whichever lifestock or crops they farm, or after the surrounding nature,. Theres a wide variety to pick from though, so, no matter the type of farm, theres bound to be a name that fits. To start, simply click on the button to generate 10 random names. Dont like the names? Simply click again to get 10 new random names.',
            //                farm_address:'Zur Schwedenschanze 15, 18435 Stralsund',
            //                street:formData.street,
            //                house_number:formData.houseNumber,
            //                city:formData.city,
            //                zip:formData.zipCode,
            //                latitude:'53.56435',
            //                longitude:'13.213578'
            //
            //            },
            success: function( data ) {
                console.log(data)
                $('#addProductionPointPoint').modal('hide');
                location.reload();
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }


</script>






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