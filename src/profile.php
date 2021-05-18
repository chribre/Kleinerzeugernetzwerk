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

/*
    Modal with form to add selling point details
*/
require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addSellerModal.php");
?>
<div class="">   
    <div class="text-center m-3 ">
        
<!--
<div class="btn-group">

<a href='dashboard.php?menu=profile&data=personal' class="btn btn-secondary <?php if (isset($_GET['data']) && $_GET['data'] == 'personal'){echo "active";}?>" id="segmentButtonPersonal">Personal Details</a>

<a href='dashboard.php?menu=profile&data=productionPoint' class="btn btn-secondary <?php if (isset($_GET['data']) && $_GET['data'] == 'productionPoint'){echo "active";}?>" id="segmentButtonFarmLand">Production Point</a>

<a href='dashboard.php?menu=profile&data=seller' class="btn btn-secondary <?php if (isset($_GET['data']) && $_GET['data'] == 'seller'){echo "active";}?>" id="segmentButtonSeller">Selling Point</a>

</div>
-->

<!--
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Personal Details</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Production Points</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Selling Points</label>
        </div>
-->
    </div>


    <?php
    if (isset($_GET['data'])){
        if ($_GET['data'] == 'personal') {
            require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/personalProfile.php");
        }elseif ($_GET['data'] == 'productionPoint') {
            require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/farmLand.php");
        }elseif ($_GET['data'] == 'seller') {
            require_once("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/sellingPoint.php");
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