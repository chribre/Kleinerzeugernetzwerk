<style>
    <?php require_once "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/profile.css"; ?>
</style>
<?php
/****************************************************************
   FILE:      profile.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  09.02.2021

   PURPOSE:   Page to view user details and edit user details.
              Details of user's farm land is also incorporated in this page.
              user can view as well as edit/delete their production points
****************************************************************/



/*
    Modal with form to add production point details
*/
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductionPoint.php");
?>
<div class="">   
    <div class="text-center m-3 ">
        <div class="btn-group">

            <a href='dashboard.php?menu=profile&data=personal' class="btn btn-secondary <?php if (isset($_GET['data']) && $_GET['data'] == 'personal'){echo "active";}?>" id="segmentButtonPersonal">Personal Details</a>

            <a href='dashboard.php?menu=profile&data=productionPoint' class="btn btn-secondary <?php if (isset($_GET['data']) && $_GET['data'] == 'productionPoint'){echo "active";}?>" id="segmentButtonFarmLand">Farm Land</a>

        </div>
    </div>


    <?php
    if (isset($_GET['data'])){
        if ($_GET['data'] == 'personal') {
            require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/personalProfile.php");
        }elseif ($_GET['data'] == 'productionPoint') {
            require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/farmLand.php");
        }
    }
    ?>


</div>


<script>
    $('#segmentButtonPersonal').click(function (){
        $(this).addClass('active');
        $('#segmentButtonFarmLand').removeClass('active');
    });
    $('#segmentButtonFarmLand').click(function (){
        $(this).addClass('active');
        $('#segmentButtonPersonal').removeClass('active');
    });
</script>