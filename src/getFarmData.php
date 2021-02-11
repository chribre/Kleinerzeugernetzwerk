<?php 
/****************************************************************
   FILE:      getFarmData.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  09.02.2021

   PURPOSE:   To fetch production points and store it in cache.
****************************************************************/


//session_start();
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");


echo fetchFarmLandData();



/*
    FUNCTION    :   Fetch production points of a user.
    INPUT       :   user id which is taken from session.
    OUTPUT      :   production points are fetched and cahced in session
*/
function fetchFarmLandData(){
    ob_start();
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
                ob_end_clean();
                $_SESSION["productionPoints"] = $farmLandArray;
                //                return json_encode($farmLandArray);
            }
        }
    }
}

?>