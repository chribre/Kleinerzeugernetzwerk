<?php
/****************************************************************
   FILE:      sellerDetails.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  08.05.2021

   PURPOSE:   Page to view details of a selling point.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");

?>

<script type="text/javascript" src="/kleinerzeugernetzwerk/js/seller_web_services/seller_details.js"></script>


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
    .feature-img{
        width: 30px;
        height: 30px;
        object-fit: cover;
    }

</style>





<div class="container" id="sellerDetails">
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
                <h2>Selling point name</h2>
            </div>
            <button type="button" class="btn btn-secondary btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg></button>

        </div>

        <h4>Brodaer Strße 4<br>17033 Neubrandenburg</h4>
        <div class="row justify-content-between p-3">
            <div class="row">


                <button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg></button>


                <h5 class="my-auto ml-3">+91 9846 194 609</h5>
            </div>
            <div class="row">
                <button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                    </svg></button>


                <h5 class="my-auto ml-3">testemail@gmail.com</h5>
            </div>

            <div class="row">
                <button type="button" class="btn btn-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                    </svg></button>


                <h5 class="my-auto ml-3">www.biomarkt.com</h5>
            </div>

        </div>


        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

        <div>
           <h5 class="mt-5">Opening Hours</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Monday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                        
                        <th scope="row">Tuesday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                    </tr>
                    <tr>
                        <th scope="row">Wednesday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                        
                        <th scope="row">Thursday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Friday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                        
                        <th scope="row">Saturday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                    </tr>
                    <tr>
                        <th scope="row">Sunday</th>
                        <td>09:00</td>
                        <td>21:00</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="my-5">PRODUCTS</h3>

    <section>
        <div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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
                                    <h3 class="mb-0">Product Name</h3>
                                    <p class="text-muted mb-2">Category</p>
                                    <h4>€ 25/KG</h4>
                                    <div class="row">
                                        <img class="img-responsive feature-img ml-3" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />

                                        <img class="img-responsive feature-img ml-2" src="https://img.favpng.com/8/13/21/milk-logo-lactose-intolerance-lactofree-png-favpng-b7D66pJijcPKaY7bUVcuiE2ar.jpg" />
                                    </div>
                                    <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

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

    <section>
        <div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body p-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-8">
                                    <h3 class="">Production Point Name</h3>
                                    <h5>Brodaer Straße 4<br>17033 Neubrandenburg</h5>
                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                        </svg>

                                        <p class="ml-3 my-auto">testemail@gmsil.com</p>

                                    </div>



                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg>

                                        <p class="ml-3 my-auto">+91 9846 194 609</p>

                                    </div>
                                    <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="d-block" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 180px; height: 160px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="justify-content-center">
                                <div class="row justify-content-center rounded-pill border border-secondary d-inline-flex p-1 mx-auto">
                                    <img class="d-block rounded-circle" src="https://previews.123rf.com/images/vbaleha/vbaleha1910/vbaleha191000271/131688113-fresh-cherry-tomatoes-and-chilly-pepper-in-a-clay-plate-on-a-wooden-background.jpg" alt="Third slide" style="width: 32px; height: 32px; object-fit: cover;">
                                    <p class="my-auto ml-2 text-dark font-weight-bold">Producer Name</p>

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
                                    <h3 class="">Seller Name</h3>
                                    <h5>Brodaer Straße 4<br>17033 Neubrandenburg</h5>
                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                        </svg>

                                        <p class="ml-3 my-auto">testemail@gmsil.com</p>

                                    </div>


                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                        </svg>

                                        <p class="ml-3 my-auto">www.biomarkt.com</p>

                                    </div>



                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg>

                                        <p class="ml-3 my-auto">+91 9846 194 609</p>

                                    </div>
                                    <p class="mt-2 mx-auto">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
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
                                    <h3 class="">Seller Name</h3>
                                    <h5>Brodaer Straße 4<br>17033 Neubrandenburg</h5>
                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                        </svg>

                                        <p class="ml-3 my-auto">testemail@gmsil.com</p>

                                    </div>


                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                                            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                                        </svg>

                                        <p class="ml-3 my-auto">www.biomarkt.com</p>

                                    </div>



                                    <div class="row align-items-center ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg>

                                        <p class="ml-3 my-auto">+91 9846 194 609</p>

                                    </div>
                                    <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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




