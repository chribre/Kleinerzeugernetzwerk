<?php
/****************************************************************
   FILE             :   farmLand.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   fetch and list all farmland and their details in the dashboard page
                        productions poitns can be added/edited or deleted
****************************************************************/
?>
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
<div class="photo" style="background-image: url(https://lh3.googleusercontent.com/dG2c5YCNllE6dM2SVc0JFzfVBYA7IVoS_zdWbcniA5sDwIOkVZL_yGd65F1aKD2EVd7iUx6aH83fxVO96jbTAlbnS_o=w640-h400-e365-rj-sc0x00ffffff)"></div>
    </div>
<div class="description">
<h1>${pointName}</h1>
<h2>${address}</h2>
<p> ${pointDesc}</p>

<div id="manipulationBtnProductionPoint" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${pointId}>
<button type="button" class="btn btn-danger" id="deleteProductionPointBtn" onclick="productionPointDeleteConfirmation('${pointId}', '${pointName}','${address}')">Delete</button>
<button type="button" class="btn btn-primary" id="editProductionPointBtn" onclick="getProductionPointDetails('${pointId}', 'EDIT')">Edit</button>
<button type="button" class="btn btn-success" id="viewProductionPointBtn">View</button></div>

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
                switch (action){
                    case 'EDIT':
                        setProductionPointModalValue(productionPointDetails);
                        setproductionPointLocationOnMap()
                        $('#addProductionPoint').modal('toggle');
                        
                        break;
                    case 'VIEW':
                        break;
                }
            },
            error: function (request, status, error) {               
                console.log(error)
            }
        });
    }
    
    
    
    function setProductionPointModalValue(productionPoint){
        document.getElementById('productionPointName').value = productionPoint.farmName;
        document.getElementById('productionPointDesc').value = productionPoint.farmDesc;
        document.getElementById('street').value = productionPoint.street;
        document.getElementById('houseNumber').value = productionPoint.houseNumber;
        document.getElementById('zipCode').value = productionPoint.zip;
        document.getElementById('city').value = productionPoint.city;
        document.getElementById('latitude').value = productionPoint.latitude;
        document.getElementById('longitude').value = productionPoint.longitude;
        document.getElementById('productionPointId').value = productionPoint.farmId;
    }
    
    
</script>
<style>
    #farmImg {
        width: 200px;
        height: 120;
        object-fit: cover;
    }
    .farmLandLI{
        margin-bottom: 25px;
        border-bottom: 1px solid gray;

    }

    #farmDetails{
        /*        border-bottom: 1px solid gray;*/
    }





    /*PEN STYLES*/
    * {
        box-sizing: border-box;
    }
    .blog-card {
        display: flex;
        flex-direction: column;
        margin: 1rem auto;
        box-shadow: 0 3px 7px -1px rgba(0, 0, 0, .1);
        margin-bottom: 1.6%;
        background: #fff;
        line-height: 1.4;
        font-family: sans-serif;
        border-radius: 5px;
        overflow: hidden;
        z-index: 0;
    }
    .blog-card a {
        color: inherit;
    }
    .blog-card a:hover {
        color: #5ad67d;
    }
    .blog-card:hover .photo {
        transform: scale(1.3) rotate(3deg);
    }
    .blog-card .meta {
        position: relative;
        z-index: 0;
        height: 200px;
    }
    .blog-card .photo {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: center;
        transition: transform 0.2s;
    }
    .blog-card .details, .blog-card .details ul {
        margin: auto;
        padding: 0;
        list-style: none;
    }
    .blog-card .details {
        position: absolute;
        top: 0;
        bottom: 0;
        left: -100%;
        margin: auto;
        transition: left 0.2s;
        background: rgba(0, 0, 0, .6);
        color: #fff;
        padding: 10px;
        width: 100%;
        font-size: 0.9rem;
    }
    .blog-card .details a {
        text-decoration: dotted underline;
    }
    .blog-card .details ul li {
        display: inline-block;
    }
    .blog-card .details .author:before {
        font-family: FontAwesome;
        margin-right: 10px;
        content: "\f007";
    }
    .blog-card .details .date:before {
        font-family: FontAwesome;
        margin-right: 10px;
        content: "\f133";
    }
    .blog-card .details .tags ul:before {
        font-family: FontAwesome;
        content: "\f02b";
        margin-right: 10px;
    }
    .blog-card .details .tags li {
        margin-right: 2px;
    }
    .blog-card .details .tags li:first-child {
        margin-left: -4px;
    }
    .blog-card .description {
        padding: 1rem;
        background: #fff;
        position: relative;
        z-index: 1;
    }
    .blog-card .description h1, .blog-card .description h2 {
        font-family: Poppins, sans-serif;
    }
    .blog-card .description h1 {
        line-height: 1;
        margin: 0;
        font-size: 1.7rem;
    }
    .blog-card .description h2 {
        font-size: 1rem;
        font-weight: 300;
        /*        text-transform: uppercase;*/
        color: #a2a2a2;
        margin-top: 5px;
    }
    .blog-card .description .read-more {
        text-align: right;
    }
    .blog-card .description .read-more a {
        color: #5ad67d;
        display: inline-block;
        position: relative;
    }
    .blog-card .description .read-more a:after {
        content: "\f061";
        font-family: FontAwesome;
        margin-left: -10px;
        opacity: 0;
        vertical-align: middle;
        transition: margin 0.3s, opacity 0.3s;
    }
    .blog-card .description .read-more a:hover:after {
        margin-left: 5px;
        opacity: 1;
    }
    .blog-card p {
        position: relative;
        margin: 1rem 0 0;
    }
    .blog-card p:first-of-type {
        margin-top: 1.25rem;
    }
    .blog-card p:first-of-type:before {
        content: "";
        position: absolute;
        height: 5px;
        background: #5ad67d;
        width: 35px;
        top: -0.75rem;
        border-radius: 3px;
    }
    .blog-card:hover .details {
        left: 0%;
    }
    @media (min-width: 640px) {
        .blog-card {
            flex-direction: row;
            max-width: 700px;
        }
        .blog-card .meta {
            flex-basis: 40%;
            height: auto;
        }
        .blog-card .description {
            flex-basis: 60%;
        }
        .blog-card .description:before {
            transform: skewX(-3deg);
            content: "";
            background: #fff;
            width: 30px;
            position: absolute;
            left: -10px;
            top: 0;
            bottom: 0;
            z-index: -1;
        }
        .blog-card.alt {
            flex-direction: row-reverse;
        }
        .blog-card.alt .description:before {
            left: inherit;
            right: -10px;
            transform: skew(3deg);
        }
        .blog-card.alt .details {
            padding-left: 25px;
        }
    }



</style>