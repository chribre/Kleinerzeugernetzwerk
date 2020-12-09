<style>
    <?php include "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/css/custom/profile.css"; ?>
</style>
<?php
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/addProductionPoint.php");
?>
<div class="">   
    <div class="text-center m-3">
        <div class="three ui buttons col-md-7">
            <button class="ui button active" id="segmentButtonPersonal">Personal Details</button>
            <button class="ui button" id="segmentButtonFarmLand">Farm Land</button>
        </div>
    </div>



    <div id="profileContent">
        <div class="m-sm-1 m-md-5 shadow rounded text-center">
            <div class="row">
                <div class="col-md-6 p-5">
                    <img class="rounded-circle bg-primary" src="<?php echo $PROFILE_IMAGE_DEFAULT ?>" height="200" width="200" alt="">
                    <h1>USER NAME</h1>
                    <text>Digital Development for Feed the Future is a collaboration between the Global Development Lab and the Bureau
                        for Food Security, both within the United States Agency for International Development (USAID), and is focused
                        on integrating a suite of coordinated digital tools and technologies into Feed the Future activities to accelerate
                        agriculture-led economic growth and improved nutrition. Feed the Future is America’s initiative to combat global
                        hunger and poverty.</text>
                </div>

                <div class="col-md-6 p-5">
                    <h4>Address</h4>
                    <p>University of Neubrandenburg <br>
                        Brodaer Straße 2 <br>
                        17033 Neubrandenburg</p>

                    <h4>Phone</h4>
                    <p>+49 1254 526 254</p>

                    <h4>Mobile</h4>
                    <p>+49 1254 526 254</p>

                    <h4>E-mail</h4>
                    <p>johndoe@mail.com</p>
                </div>
            </div>
        </div>

    </div>

</div>






<style>
    #farmTitle{
        font-size: 25px;
        font-weight: 700;
        vertical-align: middle;
    }

</style>



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