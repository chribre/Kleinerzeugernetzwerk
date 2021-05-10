<?php
/****************************************************************
   FILE             :   farmLand.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   fetch and list all farmland and their details in the dashboard page
                        productions poitns can be added/edited or deleted
****************************************************************/
?>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/production_point_api/production_point_api.js"></script>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/navigation.js"></script>
<div class="container" id="productionPointListContainer">







    <!--
<div class="blog-card">
<div class="meta">
<div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
</div>
<div class="description">
<h1>Learning to Code</h1>
<h2>Opening a door to the future</h2>
<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
<div class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="">
<button type="button" class="btn btn-danger">Delete</button>
<button type="button" class="btn btn-primary">Edit</button>
<button type="button" class="btn btn-success">View</button>
</div>
</div>
</div>
-->
























    <ul class="my-5" id="productionPointList">





        <?php 
        $carrotImg ="$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/images/carrot_1.jpg";
        global $dbConnection;
        if (isTokenValid()){
            if (isset($_SESSION['userId'])){
                $userId = $_SESSION['userId'];
                $fetchProductionPointQuery = "SELECT * FROM farm_land f
LEFT JOIN images i on (i.entity_id = f.farm_id and i.image_type = 2)
WHERE f.producer_id = '$userId'
GROUP BY f.farm_id ORDER BY f.created_date DESC";
                $getProductionPointQuery = mysqli_query($dbConnection, $fetchProductionPointQuery);
                confirmQuery($getProductionPointQuery);
                $productCount = mysqli_num_rows($getProductionPointQuery);
                if ($productCount == 0){
                    echo "<h1> No products availabe. Try adding some products.</h1>";
                }else{
                    while($row = mysqli_fetch_assoc($getProductionPointQuery)) {
                        $pointName = $row['farm_name'];
                        $pointDesc = $row['farm_desc'];
                        $pointAddress = $row['farm_address'];
                        $imageName = $row['image_name'];
                        $imagePath = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/production_point_img/";
                        if ($imageName === null){
                            $imagePath = "/kleinerzeugernetzwerk/images/defaul_agricultural-land.jpg";
                        }else{
                            $imagePath .= $imageName;
                        }

        ?>









        <li class="row p-2 farmLandLI">
            <div class=" d-md-flex align-items-center w-100 justify-content-between">
                <img class="rounded" id="farmImg" src="<?php echo $imagePath ?>" width="240" alt="">
                <div id="farmDetails" class="flex-grow-1 mx-4">
                    <h3><?php echo $pointName ?></h3>
                    <p><?php echo $pointDesc ?></p>
                    <p><small class="text-muted"><?php echo $pointAddress ?></small></p>
                </div>
                <div class="mr-0">
                    <div class="ui teal vertical animated button m-2" tabindex="0">
                        <div class="hidden content">Edit</div>
                        <div class="visible content">
                            <i class="edit icon"></i>
                        </div>
                    </div>
                    <br>
                    <div class="ui red vertical animated button m-2" tabindex="0">
                        <div class="hidden content">Delete</div>
                        <div class="visible content">
                            <i class="trash icon"></i>
                        </div>
                    </div>

                </div>

            </div>
        </li>







        <?php
                    }
                }
            }
        }


        ?>

    </ul>
</div>


<!-- Button trigger modal -->
<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Launch demo modal
</button>
-->

<!-- Modal -->
<div class="modal fade" id="productionPointDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Production Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="deleteMessageText">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmProductionPointDelete">Delete</button>
            </div>
        </div>
    </div>
</div>



<script>
    function listAllProductionPoints(productionPointArray){
        document.getElementById("productionPointList").innerHTML = "";
        if (productionPointArray.length > 0){
            productionPointArray.forEach(function(productionPoint) {
                console.log(productionPoint);

                const pointId = productionPoint.farmId ? productionPoint.farmId : 0;
                const pointName = productionPoint.farmName ? productionPoint.farmName : "";
                const pointDesc = productionPoint.farmDesc ? productionPoint.farmDesc : "";

                const street = productionPoint.street ? productionPoint.street : "";
                const houseNumber = productionPoint.house_number ? productionPoint.house_number : "";
                const city = productionPoint.city ? productionPoint.city : "";
                const zip = productionPoint.zip ? productionPoint.zip : "";

                const pointAddress = productionPoint.farmAddress ? productionPoint.farmAddress : "";

                const address = street + ', ' + houseNumber + ', ' + city + ' - ' + zip;
                const pointLatitude = productionPoint.latitude ? productionPoint.latitude : 0;
                const pointLongitude = productionPoint.longitude ? productionPoint.longitude : 0;

                const defaultImage = "https://lh3.googleusercontent.com/dG2c5YCNllE6dM2SVc0JFzfVBYA7IVoS_zdWbcniA5sDwIOkVZL_yGd65F1aKD2EVd7iUx6aH83fxVO96jbTAlbnS_o=w640-h400-e365-rj-sc0x00ffffff";
                const imagePath = productionPoint.imagePath ? productionPoint.imagePath : defaultImage;


                //                var productionPointListItem = `<li class="row p-2 farmLandLI">
                //            <div class=" d-md-flex align-items-center w-100 justify-content-between">
                //                <img class="rounded" id="farmImg" src="<?php echo $imagePath ?>" width="240" alt="">
                //                <div id="farmDetails" class="flex-grow-1 mx-4">
                //                    <h3>${pointName}</h3>
                //                    <p>${pointDesc}</p>
                //                    <p><small class="text-muted">${pointAddress}</small></p>
                //                </div>
                //                <div class="mr-0">
                //                    <div class="ui teal vertical animated button m-2" tabindex="0">
                //                        <div class="hidden content">Edit</div>
                //                        <div class="visible content">
                //                            <i class="edit icon"></i>
                //                        </div>
                //                    </div>
                //                    <br>
                //                    <div class="ui red vertical animated button m-2" tabindex="0">
                //                        <div class="hidden content">Delete</div>
                //                        <div class="visible content">
                //                            <i class="trash icon"></i>
                //                        </div>
                //                    </div>
                //
                //                </div>
                //
                //            </div>
                //        </li>`;



                const card = `<div class="blog-card">
<div class="meta">
<div class="photo" style="background-image: url(${imagePath})"></div>
    </div>
<div class="description">
<h1>${pointName}</h1>
<h2>${address}</h2>
<p> ${pointDesc}</p>

<div id="manipulationBtnProductionPoint" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${pointId}>
<button type="button" class="btn btn-danger" id="deleteProductionPointBtn" onclick="productionPointDeleteConfirmation('${pointId}', '${pointName}','${address}')">Delete</button>
<button type="button" class="btn btn-primary" id="editProductionPointBtn" onclick="getProductionPointDetails('${pointId}', 'EDIT')">Edit</button>
<button type="button" class="btn btn-success" id="viewProductionPointBtn" onclick="goToProductionPointDeatailsScreen('${pointId}')">View</button></div>

    </div>
    </div>`;

                //                                var productionPointHTMLObject = $(card);
                var prodcutionPointListObj = document.getElementById("productionPointListContainer");
                prodcutionPointListObj.innerHTML = prodcutionPointListObj.innerHTML + card;

            });
        }
    }


    
    
    
    
    function productionPointDeleteConfirmation(id, pointName, address){
        const deleteMessage = `Are you sure want to delete ${pointName} at ${address}.`
        document.getElementById('deleteMessageText').innerHTML = deleteMessage;
        document.getElementById("confirmProductionPointDelete").addEventListener("click", function() {
            deleteProductionPoint(id);
        });

        $('#productionPointDeleteModal').modal('toggle');
    }

    function deleteProductionPoint(pointId){
        const formData = fetchProductionPointFormData();
        const userId = localStorage.getItem('userId');

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/productionPointController.php",

            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
                'action': "DELETE"
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: { 
                farm_id: pointId,
                producer_id: userId
            },
            success: function( data ) {
                console.log(data)
                location.reload();
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }


    

    function getProductionPointDetails(pointId, action){
        const formData = fetchProductionPointFormData();
        const userId = localStorage.getItem('userId');

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/productionPointController.php",

            headers: {
                'access-token': localStorage.getItem('token'),
                'user_id': userId,
                'action': "READ"
            },
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            data: { 
                farm_id: pointId,
                producer_id: userId
            },
            success: function( data ) {
                console.log(data)
                const productionPointDetails = JSON.parse(data);
                if (productionPointDetails.length > 0){
                    switch (action){
                        case 'EDIT':
                            setProductionPointModalValue(productionPointDetails);
                            setproductionPointLocationOnMap()
                            $('#addProductionPoint').modal('toggle');

                            break;
                        case 'VIEW':
                            break;
                    }
                }
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }



    function setProductionPointModalValue(productionPointData){

        const productionPoint = productionPointData[0] ? productionPointData[0] : [];
        const productionPointImageData = productionPointData[1] ? productionPointData[1] : [];


        document.getElementById('productionPointName').value = productionPoint.farmName ? productionPoint.farmName : "";
        document.getElementById('productionPointDesc').value = productionPoint.farmDesc ? productionPoint.farmDesc : "";
        document.getElementById('street').value = productionPoint.street ? productionPoint.street : "";
        document.getElementById('houseNumber').value = productionPoint.houseNumber? productionPoint.houseNumber : "";
        document.getElementById('zipCode').value = productionPoint.zip ? productionPoint.zip : "";
        document.getElementById('city').value = productionPoint.city ? productionPoint.city : "";
        document.getElementById('latitude').value = productionPoint.latitude ? productionPoint.latitude : "";
        document.getElementById('longitude').value = productionPoint.longitude ? productionPoint.longitude : "";
        document.getElementById('productionPointId').value = productionPoint.farmId ? productionPoint.farmId : 0;

        setProductionPointImages(productionPointImageData);
    }

    function setProductionPointImages(imageData){
        document.getElementById("production-point-gallery").innerHTML = '';
        var productionPointImageId = []; 
        var productionPointImageGallery = "";
        imageData.forEach(element =>{
            const path = element.image_path;
            const id = element.image_id;

            productionPointImageGallery += `<div class="image">
<div class="overlay"></div>
<img src="${path}" id="test" key="2">
    </div>`;
            productionPointImageId.push(id); 
        })
        document.getElementById("productionPointImageIdArray").setAttribute('data-id', productionPointImageId);
        document.getElementById("production-point-gallery").innerHTML = productionPointImageGallery;
    }

</script>
