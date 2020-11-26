
<?php
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

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$dbConnection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);



$query = "SET NAMES utf8";
mysqli_query($dbConnection,$query);

if($dbConnection) {

echo "We are connected";

}








?>