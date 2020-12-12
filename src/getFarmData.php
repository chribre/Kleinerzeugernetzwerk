<?php 
session_start();
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/config.php");
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");


echo fetchFarmLandData();


function fetchFarmLandData(){
    global $dbConnection;
    if (isTokenValid()){
        if (isset($_SESSION['userId'])){
            $userId = $_SESSION['userId'];
            $getProductionPointQuery = mysqli_query($dbConnection, "SELECT farm_id, farm_name, farm_address FROM `farm_land` WHERE `producer_id` = '$userId'");
            confirmQuery($getProductionPointQuery);
            $productCount = mysqli_num_rows($getProductionPointQuery);
            if ($productCount == 0){
                return null;
            }else{

                $farmLandArray = array();
                while($row = mysqli_fetch_assoc($getProductionPointQuery)) {
                    $farmLandArray[] = $row;
                }
                return json_encode($farmLandArray);
            }
        }
    }
}



//if (isTokenValid()){
//    if (isset($_SESSION['userId'])){
//        $userId = $_SESSION['userId'];
//        $getProductionPointQuery = mysqli_query($dbConnection, "SELECT farm_id, farm_name, farm_address FROM `farm_land` WHERE `producer_id` = '$userId'");
//        confirmQuery($getProductionPointQuery);
//        $productCount = mysqli_num_rows($getProductionPointQuery);
//        if ($productCount == 0){
//            return null;
//        }else{
//
//            $farmLandArray = array();
//            while($row = mysqli_fetch_assoc($getProductionPointQuery)) {
//                $farmLandArray[] = $row;
//            }
//            return json_encode($farmLandArray);
//        }
//    }
//}


?>