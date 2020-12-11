<style>
    <?php include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/profile.css"; ?>
</style>
<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductionPoint.php");
?>
<div class="">   
    <div class="text-center m-3">
        <div class="three ui buttons col-md-7">
            <a href='dashboard.php?menu=profile&data=personal' class="ui button <?php if (isset($_GET['data']) && $_GET['data'] == 'personal'){echo "active";}?>" id="segmentButtonPersonal">Personal Details</a>
            <a href='dashboard.php?menu=profile&data=productionPoint' class="ui button <?php if (isset($_GET['data']) && $_GET['data'] == 'productionPoint'){echo "active";}?>" id="segmentButtonFarmLand">Farm Land</a>
        </div>
    </div>


    <?php
    if (isset($_GET['data'])){
        if ($_GET['data'] == 'personal') {
            include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/personalProfile.php");
        }elseif ($_GET['data'] == 'productionPoint') {
            include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/farmLand.php");
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