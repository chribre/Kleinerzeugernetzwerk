<?php
/****************************************************************
   FILE             :   config.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   Configuration file which having dtabase access information
****************************************************************/




//$config=array(
//    'DB_HOST'=>'localhost',
//    'DB_USERNAME'=>'root',
//    'DB_PASSWORD'=>'',
//    'DB_DATABASE'=>'kleinerzeugernetzwerk',
//    'PORT' => '3306'
//);


?>



<?php ob_start();

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "kleinerzeugernetzwerk";


//Production test server config

//$db['db_host'] = "202.61.242.150";
//$db['db_user'] = "kn";
//$db['db_pass'] = "kleinerzeugernetzwerk";
//$db['db_name'] = "kleinerzeugernetzwerk";



foreach($db as $key => $value){
    define(strtoupper($key), $value);
    
}
function createDBConnection(){
    $dbConn = new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);
    return $dbConn;
}
$dbConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$query = "SET NAMES utf8";
mysqli_query($dbConnection,$query);

if($dbConnection) {

//echo "We are connected";

}
//error_reporting(0);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>