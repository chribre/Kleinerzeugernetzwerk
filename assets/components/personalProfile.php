<?php 
/****************************************************************
   FILE             :   personalProfile.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   Page to show details of the user. 
                        informations like name, image, address and other info.
                        also to edit user profile details
****************************************************************/


//getUserProfile();


/*
    FUNCTION    :   to fetch user details from the database to show in the profile screen.
    INPUT       :   user id
    OUTPUT      :   return user detaisl from the user table
*/
//function getUserProfile(){
//    global $dbConnection;
//    global $PROFILE_IMAGE_DEFAULT;
//    $userId = $_SESSION["userId"];
//    $userSelectQuery = mysqli_query($dbConnection, "SELECT * FROM `user` WHERE `user_id` = '$userId'");
//    confirmQuery($userSelectQuery);
//    if (mysqli_num_rows($userSelectQuery)){
//        $row = mysqli_fetch_array($userSelectQuery);
//        $fName = $row['first_name'] !== null ? $row['first_name']: "";
//        $mName = $row['middle_name'] !== null ? $row['middle_name']: "";
//        $lName = $row['last_name'] !== null ? $row['last_name']: "";
//        $name = $fName." ".$mName." ".$lName;
//        $email = $row['email'] !== null ? $row['email']: "";
//        $street = $row['street'] !== null ? $row['street']: "";
//        $houseNum = $row['house_number'] !== null ? $row['house_number']: "";
//        $city = $row['city'] !== null ? $row['city']: "";
//        $zip = $row['zip'] !== null ? $row['zip']: "";
//        $ccountry = $row['country'] !== null ? $row['country']: "";
//        $phone = $row['phone'] !== null ? $row['phone']: "";
//        $mobile = $row['mobile'] !== null ? $row['mobile']: "";

?>


<div id="profileContent">
    <div class="m-sm-1 m-md-5 shadow rounded text-center">
        <div class="row">
            <div class="col-md-6 p-5">

                <img id="profileImage" class="rounded-circle bg-primary" src="" height="200" width="200" alt="" style="object-fit: cover;">
                <h1 id="fullName">Producer Name</h1>
                <text id="aboutMe">Description</text>
            </div>

            <div class="col-md-6 p-5">
                <h4>Address</h4>
                <p id="address">Street, House Num<br>
                    Zip City<br></p>

                <h4>Phone</h4>
                <p id="phoneNumber">+49 000 000 0000</p>

                <h4>Mobile</h4>
                <p id="mobileNumber">+49 000 000 0000</p>

                <h4>E-mail</h4>
                <p id="emailAddress">testemail@email.com</p>
            </div>
        </div>
    </div>

</div>


<script>
    
</script>

<?php

    //    }else{
    //
    //    }
    //}

?>


<!--
<style>
#farmTitle{
font-size: 25px;
font-weight: 700;
vertical-align: middle;
}

</style>-->
