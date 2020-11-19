<?php
//include('../config/config.php');

try
{
    $host = $config['DB_HOST'];
    $dbname = $config['DB_DATABASE'];
    $user_name = $config['DB_USERNAME'];
    $password = $config['DB_PASSWORD'];
    
    echo $host;
    echo $dbname;

    //            $conn= new PDO("mysql:host=$host;dbname=$dbname",$user_name,$password);
    //            echo "Database connection created";


    $conn = mysqli_connect($host, $user_name, $password, $dbname);
    echo "Database connection created";

}
catch(PDOException $e)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

echo "Got";
    
    if(isset($_POST['createAccount'])){
        echo "recieved data";
    }else{
        echo "data missing";
    }
?>