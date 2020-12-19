<?php 

getUserProfile();

function getUserProfile(){
    global $dbConnection;
    global $PROFILE_IMAGE_DEFAULT;
    $userId = $_SESSION["userId"];
    $userSelectQuery = mysqli_query($dbConnection, "SELECT * FROM `user` WHERE `user_id` = '$userId'");
    confirmQuery($userSelectQuery);
    if (mysqli_num_rows($userSelectQuery)){
        $row = mysqli_fetch_array($userSelectQuery);
        $fName = $row['first_name'] !== null ? $row['first_name']: "";
        $mName = $row['middle_name'] !== null ? $row['middle_name']: "";
        $lName = $row['last_name'] !== null ? $row['last_name']: "";
        $name = $fName." ".$mName." ".$lName;
        $email = $row['email'] !== null ? $row['email']: "";
        $street = $row['street'] !== null ? $row['street']: "";
        $houseNum = $row['house_number'] !== null ? $row['house_number']: "";
        $city = $row['city'] !== null ? $row['city']: "";
        $zip = $row['zip'] !== null ? $row['zip']: "";
        $ccountry = $row['country'] !== null ? $row['country']: "";
        $phone = $row['phone'] !== null ? $row['phone']: "";
        $mobile = $row['mobile'] !== null ? $row['mobile']: "";

?>


        <div id="profileContent">
            <div class="m-sm-1 m-md-5 shadow rounded text-center">
            <div class="row">
            <div class="col-md-6 p-5">
            
            <img class="rounded-circle bg-primary" src="<?php echo $PROFILE_IMAGE_DEFAULT ?>" height="200" width="200" alt="">
            <h1><?php echo $name ?></h1>
<text>Digital Development for Feed the Future is a collaboration between the Global Development Lab and the Bureau
    for Food Security, both within the United States Agency for International Development (USAID), and is focused
    on integrating a suite of coordinated digital tools and technologies into Feed the Future activities to accelerate
    agriculture-led economic growth and improved nutrition. Feed the Future is America’s initiative to combat global
    hunger and poverty.</text>
</div>

<div class="col-md-6 p-5">
    <h4>Address</h4>
    <p><?php echo $street ?>, <?php echo $houseNum?> <br>
        <?php echo $zip ?> <?php echo $city ?><br>
        <?php echo $ccountry ?></p>

    <h4>Phone</h4>
    <p><?php echo $phone ?></p>

    <h4>Mobile</h4>
    <p><?php echo $mobile ?></p>

    <h4>E-mail</h4>
    <p><?php echo $email ?></p>
</div>
</div>
</div>

</div>

<?php

    }else{

    }
}

?>


<!--
<style>
#farmTitle{
font-size: 25px;
font-weight: 700;
vertical-align: middle;
}

</style>-->
