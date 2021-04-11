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
<div class="container" id="productDetails">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://image.freepik.com/free-photo/carrots-fresh-organic-carrots-fresh-garden-carrots-bunch-fresh-organic-carrots-market_1391-238.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://images.lpcdn.ca/924x615/201602/25/1146100-plusieurs-personnes-peuvent-blamer-leur.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.connexionfrance.com/var/connexion/storage/images/_aliases/social_network_image/media/images/tomatoes3/977259-1-eng-GB/tomatoes.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-]" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div>
        <h2>product name</h2>
        <p>Product category</p>
        <p>Product description</p>
        <p>Product features</p>
        
        
        
        
        
        
        
        <div class="row text-left mt-5">
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto mr-md-auto ml-md-0">
            <img alt="image" class="img-fluid rounded" src="https://www.thelocal.de/wp-content/uploads/2018/11/cdda77153e0cf747cd9de47eed8868c7f7de03365d3e1a13e567ffdb3322e8f3.jpg">
            <h3><strong>Feature One</strong></h3>
            <p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
    
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="http://3.bp.blogspot.com/-qkIVQjtWSLE/VXG5zHZWSeI/AAAAAAAAAMU/QHYhFx7sGcU/s1600/TF_January%2B16%2B069.JPG">
            <h3><strong>Feature Two</strong></h3>
            <p> It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
          </div>
    
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
          
          
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
          
          
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
          
          
          
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
          
          
          
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
          
          
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-0 pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
          
          <div class="col-12 col-sm-8 col-md-4 col-lg-3 m-sm-auto ml-md-auto mr-md-auto pt-5 pt-md-0">
            <img alt="image" class="img-fluid rounded" src="https://i.pinimg.com/originals/3c/10/67/3c10674d2021428f4aa882ee05b03faf.jpg">
            <h3><strong>Feature Three</strong></h3>
            <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didnâ€™t listen.</p>
          </div>
        </div>
        
        
    </div>
    
    <div>
        
    </div>
</div>

<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>

