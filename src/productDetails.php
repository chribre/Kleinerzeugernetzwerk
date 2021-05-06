<?php
/****************************************************************
   FILE:      productDetails.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  23.03.2021

   PURPOSE:   Page to view details of a product.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");

?>

<script type="text/javascript" src="/kleinerzeugernetzwerk/js/products/products_api.js"></script>


<!-- Favicons -->
<link href="http://localhost/web_design/eBusiness/assets/img/favicon.png" rel="icon">
<link href="http://localhost/web_design/eBusiness/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="http://localhost/web_design/eBusiness/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="http://localhost/web_design/eBusiness/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="http://localhost/web_design/eBusiness/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="http://localhost/web_design/eBusiness/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="http://localhost/web_design/eBusiness/assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet">
<link href="http://localhost/web_design/eBusiness/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="http://localhost/web_design/eBusiness/assets/vendor/venobox/venobox.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="http://localhost/web_design/eBusiness/assets/css/style.css" rel="stylesheet">



<style>
    .btn-price{
        font-size: 30px;
        font-weight: bold;
        color: white;
    }
    .btn-available{
        font-size: 15px;
        color: white;
    }

</style>





<div class="container" id="productDetails">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="First slide" style="width: 100%; height: 350px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Second slide" style="width: 100%; height: 350px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 100%; height: 350px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 100%; height: 350px; object-fit: cover;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div>
        <div class="row justify-content-between p-3">
            <div class="">
                <h2>Product name</h2>
                <h4>Category name</h4>
            </div>
            <button type="button" class="btn btn-secondary btn-lg"><h2 class="btn-price">€ 35/KG</h2>
                <p class="btn-available">10 KG available</p></button>

        </div>

        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>


    <div class="row my-5 justify-content-between">
        <div class="col-md-1 col-md-offset-1">
            <img class="img-responsive" src="https://www.bmel.de/SharedDocs/Bilder/DE/Logos/EU-Bio-Logo1.jpg?__blob=poster&v=3" />
        </div>
        <div class="col-md-1">
            <img class="img-responsive" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
        </div>

        <div class="col-md-1">
            <img class="img-responsive" src="https://iconape.com/wp-content/files/kj/60997/svg/free-sugar.svg" />
        </div>
        <div class="col-md-1">
            <img class="img-responsive" src="https://www.v-label.eu/wp-content/uploads/2017/02/vegan.png" />
        </div>
        <div class="col-md-1">
            <img class="img-responsive" src="https://i.pinimg.com/originals/1d/53/d8/1d53d8b3b697378c1710a22edc0a9215.jpg" />
        </div>
        <div class="col-md-1">
            <img class="img-responsive" src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-thumbnail/s3/022018/untitled-1_21.png?gKv2DIbp0u4tuOY5HYEbkSFUOK5u20YI&itok=NSgbxRWE" />
        </div>

    </div>




    <h3 class="my-5">SELLING POINTS</h3>

    <section>
        <div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Course statistics</h3>
                                    <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <h3 class="my-5">PRODUCTION POINT</h3>

    <div class="row justify-content-center my-5">
        <div class="col-md-6 mr-0">
            <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="height: 350px; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <h3 class="">Production Point Name</h3>
            <p class="text-muted mb-0">University of Neubrandenburg<br>
                Brodaer Straße 2<br>
                17033 Neubrandenburg</p>
            <br>
            <br>
            <p class="text-muted mb-0">+919846194609</p>
            <p class="text-muted mb-0">testemail@gmail.com</p>
            <div class="row mx-1 my-3 justify-content-between">
                <img src="https://image.flaticon.com/icons/png/128/145/145802.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/145/145812.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/2111/2111646.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/145/145807.png" alt="" height="50px" width="50px">
                <img src="https://image.flaticon.com/icons/png/128/355/355980.png" alt="" height="50px" width="50px">


            </div>
            <div class="row card border-0 shadow-sm rounded  align-items-center justify-content-around mt-2">
                <h3>John Doe</h3>
                <img class="rounded-circle" src="https://image.gala.de/21556500/t/Gd/v5/w960/r0.6667/-/chris-hemsworth-so-denkt-er-ueber-miley.jpg" alt="" style="width: 50px; height: 50px; object-fit: cover;">
            </div>
        </div>

    </div>






    <div class="row awesome-project-content">
        <!-- single-awesome-project start -->
        <div class="col-md-4 col-sm-4 col-xs-12 design development">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="https://www.teachearlyyears.com/images/made/29194c081e687370/PPfv1_630_465_84_int_s_c1.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="https://www.teachearlyyears.com/images/made/29194c081e687370/PPfv1_630_465_84_int_s_c1.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-awesome-project end -->
        <!-- single-awesome-project start -->
        <div class="col-md-4 col-sm-4 col-xs-12 photo">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="http://localhost/web_design/eBusiness/assets/img/portfolio/2.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="http://localhost/web_design/eBusiness/assets/img/portfolio/2.jpg">
                                <h4>Blue Sea</h4>
                                <span>Photosho</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-awesome-project end -->
        <!-- single-awesome-project start -->
        <div class="col-md-4 col-sm-4 col-xs-12 design">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="http://localhost/web_design/eBusiness/assets/img/portfolio/3.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="http://localhost/web_design/eBusiness/assets/img/portfolio/3.jpg">
                                <h4>Beautiful Nature</h4>
                                <span>Web Design</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-awesome-project end -->
        <!-- single-awesome-project start -->
        <div class="col-md-4 col-sm-4 col-xs-12 photo development">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="http://localhost/web_design/eBusiness/assets/img/portfolio/4.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="http://localhost/web_design/eBusiness/assets/img/portfolio/4.jpg">
                                <h4>Creative Team</h4>
                                <span>Web design</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-awesome-project end -->
        <!-- single-awesome-project start -->
        <div class="col-md-4 col-sm-4 col-xs-12 development">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="http://localhost/web_design/eBusiness/assets/img/portfolio/5.jpg" alt="" /></a>
                    <div class="add-actions text-center text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="http://localhost/web_design/eBusiness/assets/img/portfolio/5.jpg">
                                <h4>Beautiful Flower</h4>
                                <span>Web Development</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-awesome-project end -->
        <!-- single-awesome-project start -->
        <div class="col-md-4 col-sm-4 col-xs-12 design photo">
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <a href="#"><img src="http://localhost/web_design/eBusiness/assets/img/portfolio/6.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                        <div class="project-dec">
                            <a class="venobox" data-gall="myGallery" href="http://localhost/web_design/eBusiness/assets/img/portfolio/6.jpg">
                                <h4>Night Hill</h4>
                                <span>Photoshop</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-awesome-project end -->
    </div>

</div>







<!-- Vendor JS Files -->
<script src="http://localhost/web_design/eBusiness/assets/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/php-email-form/validate.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/appear/jquery.appear.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/knob/jquery.knob.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/parallax/parallax.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/wow/wow.min.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="http://localhost/web_design/eBusiness/assets/vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<script src="http://localhost/web_design/eBusiness/assets/js/main.js"></script>





<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>




