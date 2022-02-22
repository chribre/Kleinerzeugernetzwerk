<?php
/****************************************************************
   FILE:      productionpointDetails.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  07.05.2021

   PURPOSE:   Page to view details of a production point.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");

?>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/navigation.js"></script>
<style>
    .desc-single-line{
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .addr-line-height {
        line-height: 1.4;
    }

    .desc-single-line {
        line-height: 1.5em;
        height: 1.5em;       /* height is 2x line-height, so two lines will display */
        overflow: hidden;  /* prevents extra lines from being visible */
    }
    .gradient-green{
        background: rgb(234,250,237);
        background: linear-gradient(90deg, rgba(234,250,237,1) 0%, rgba(255,255,255,1) 50%, rgba(234,250,237,1) 100%);
    }
    .indicator-circle{
        height: 8px;
        width: 8px;
    }
    img{
        object-fit: cover;
    }

</style>
<div class=" row mx-4 mt-2">

    <aside class="col-md-3 col-lg-2">

        <div class="card">

            <article class="filter-group">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i>
                        <h6 class="title"><?php echo gettext("Filter"); ?></h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_2" style="">
                    <div class="card-body">
                        <label class="custom-control custom-checkbox">
                            <input id="filter-product" type="checkbox" class="custom-control-input search-filter-control">
                            <div class="custom-control-label"><?php echo gettext("Product"); ?>  
                                <b class="badge badge-pill badge-light float-right" id="productCount">120</b>  </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input id="filter-production-point" type="checkbox" class="custom-control-input search-filter-control">
                            <div class="custom-control-label"><?php echo gettext("Production Point"); ?> 
                                <b class="badge badge-pill badge-light float-right" id="productionPointCount">15</b>  </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input id="filter-seller" type="checkbox" class="custom-control-input search-filter-control">
                            <div class="custom-control-label"><?php echo gettext("Seller"); ?> 
                                <b class="badge badge-pill badge-light float-right" id="sellerCount">35</b> </div>
                        </label>
                        <label class="custom-control custom-checkbox">
                            <input id="filter-user" type="checkbox" class="custom-control-input search-filter-control">
                            <div class="custom-control-label"><?php echo gettext("Producer"); ?> 
                                <b class="badge badge-pill badge-light float-right" id="producerCount">89</b> </div>
                        </label>
                    </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->

        </div> <!-- card.// -->

    </aside>

    <div class="mt-3 flex-fill">
        <h3 id="search-result-title"><?php echo gettext("Search Results for "); ?> 'Test'</h3>

        <div class="container" id="searchResultUI">

            <!--           Product-->
            <div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="http://localhost/kleinerzeugernetzwerk_uploads/vegetables_bw.jpg"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">Product Name</h4>
                            <p class="my-auto">Category Name</p>
                        </div>
                        <div class="row my-auto">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">Brodaer Strasse 4<br>17033 Neubrandenburg</p>
                        </div>
                        <div class="my-auto">
                            <div class="row rounded-pill border border-secondary p-1 mx-auto">
                                <img class="rounded-circle" src="http://localhost/kleinerzeugernetzwerk_uploads/user_default.png" width="32px" height="32px" alt="">
                                <p class="my-auto ml-2">Producer name</p>
                            </div>
                            <div class="my-auto">
                                <h4 class="text-right">€12/kg</h4>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="mx-auto addr-line-height">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries when an</p>  
                    </div>

                </div>

            </div>






            <!--           Production point-->
            <div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="http://localhost/kleinerzeugernetzwerk_uploads/vegetables_bw.jpg"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">Production Point Name</h4>
                        </div>
                        <div class="row my-auto">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">Brodaer Strasse 4<br>17033 Neubrandenburg</p>
                        </div>
                        <div class="my-auto">
                            <div class="row rounded-pill border border-secondary p-1 mx-auto">
                                <img class="rounded-circle" src="http://localhost/kleinerzeugernetzwerk_uploads/user_default.png" width="32px" height="32px" alt="">
                                <p class="my-auto ml-2">Producer name</p>
                            </div>
                        </div>
                    </div>
                    <div class="my-auto">
                        <p class="addr-line-height mt-2">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries when an</p>  
                    </div>

                </div>

            </div>







            <!--            Seller-->

            <div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="http://localhost/kleinerzeugernetzwerk_uploads/vegetables_bw.jpg"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">Seller Name</h4>
                        </div>
                        <div class="row my-auto mr-2">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">Brodaer Strasse 4<br>17033 Neubrandenburg</p>
                        </div>
                    </div>
                    <div class="my-auto">
                        <p class="addr-line-height mt-2">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries when an</p>  
                    </div>

                    <div class="row my-auto mx-auto">

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Monday</p>
                        </div>
                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Tuesday</p>
                        </div>


                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Wednesday</p>
                        </div>


                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Thursday</p>
                        </div>

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Friday</p>
                        </div>

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Saturday</p>
                        </div>

                        <div class="row mx-0 mr-5">
                            <div class="bg-success indicator-circle rounded-circle my-auto"></div>
                            <p class="my-auto ml-2">Sunday</p>
                        </div>
                    </div>
                </div>
            </div>





            <!--           Producer-->
            <div class="row shadow-sm bg-white rounded p-2 gradient-green mb-4">
                <img class="rounded my-auto" src="http://localhost/kleinerzeugernetzwerk_uploads/vegetables_bw.jpg"  width="100px" height="100px"alt="">
                <div class="flex-fill pl-2 my-auto">
                    <div class="row m-auto justify-content-between">
                        <div class="my-auto">
                            <h4 class="my-auto">Producer Name</h4>
                            <div class="row mx-auto">
                                <div class="row mx-auto my-auto">
                                    <svg class="my-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg>
                                    <p class="my-auto ml-2">9846194609</p>
                                </div>

                                <div class="row my-auto ml-5">
                                    <svg class="my-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                    </svg>
                                    <p class="my-auto ml-2">testemail@gmail.com</p>
                                </div>


                            </div>
                        </div>
                        <div class="row my-auto mr-2">
                            <svg class="row my-auto mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <p class="my-auto ml-2 addr-line-height">Brodaer Strasse 4<br>17033 Neubrandenburg</p>
                        </div>
                    </div>
                    <div class="my-auto">
                        <p class="addr-line-height mt-2">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries when an</p>  
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>




<script type="text/javascript" src="/kleinerzeugernetzwerk/js/search/search.js"></script>

<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>




