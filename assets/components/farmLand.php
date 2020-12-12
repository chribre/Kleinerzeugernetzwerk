<div class="container">
    <ul class="my-5">





        <?php 
        $carrotImg ="$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/images/carrot_1.jpg";
        global $dbConnection;
        if (isTokenValid()){
            if (isset($_SESSION['userId'])){
                $userId = $_SESSION['userId'];
                $getProductionPointQuery = mysqli_query($dbConnection, "SELECT * FROM `farm_land` WHERE `producer_id` = '$userId'");
                confirmQuery($getProductionPointQuery);
                $productCount = mysqli_num_rows($getProductionPointQuery);
                if ($productCount == 0){
                    echo "<h1> No products availabe. Try adding some products.</h1>";
                }else{
                    while($row = mysqli_fetch_assoc($getProductionPointQuery)) {
                        $pointName = $row['farm_name'];
                        $pointDesc = $row['farm_desc'];
                        $pointAddress = $row['farm_address'];

        ?>









        <li class="row p-2 farmLandLI">
            <div class=" d-md-flex align-items-center w-100 justify-content-between">
                <img class="rounded" id="farmImg" src="/kleinerzeugernetzwerk/images/carrot_1.jpg" width="240" alt="">
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

</style>