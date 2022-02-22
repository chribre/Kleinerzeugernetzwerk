<?php 
/****************************************************************
   FILE             :   personalProfile.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   Page to show details of the user. 
                        informations like name, image, address and other info.
                        also to edit user profile details
****************************************************************/

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
                <h4><?php echo gettext("Address"); ?></h4>
                <p id="address">Street, House Num<br>
                    Zip City<br></p>

                <h4><?php echo gettext("Phone"); ?></h4>
                <p id="phoneNumber">+49 000 000 0000</p>

                <h4><?php echo gettext("Mobile"); ?></h4>
                <p id="mobileNumber">+49 000 000 0000</p>

                <h4><?php echo gettext("E-mail"); ?></h4>
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
