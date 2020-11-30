
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* Tell mysqli to throw an exception if an error occurs */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$isLoggedIn = true;

echo "Connected successfully, ";

$loginFailAlert = '<div class="alert alert-success" id="success-alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Success! </strong> Product have added to your wishlist.
</div>';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo('Post method hit,');
    $email = escapeSQLString($_POST['email']);
    $password = escapeSQLString($_POST['password']);
    if(loginUser($email, $password)){
        echo "login success";
    }else{
        echo "login faield. retry!";
    }
}

$SIGN_UP_LOC = '/kleinerzeugernetzwerk/src/signUp.php';
$LOGO_LOC = '/kleinerzeugernetzwerk/images/logo.svg';
$HOME_LOC = '/kleinerzeugernetzwerk/index.php';
$PROFILE_IMAGE_DEFAULT = '/kleinerzeugernetzwerk/images/profile_placeholder.png';
$LOG_OUT_IMG = '/kleinerzeugernetzwerk/images/logout.png';
$VIEW_PROFILE = '/kleinerzeugernetzwerk/src/profile.php?menu=profile';


if(isset($_GET['logOut'])){
    logOut();

}
function logOutUser(){
    $_SESSION["isLoggedIn"] = false;
}

?>


<div id="nav_bar" class="shadow-sm">


    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top my-0">
        <a class="navbar-brand" href="<?php echo $HOME_LOC ?>">


            <img src= "<?php echo $LOGO_LOC?>" width="160" height="33" class="d-inline-block align-center" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        <?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/signInModal.php"); ?>


        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav font-weight-bold">
                <div class="navbar-nav mr-auto">
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">Map<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">About Us<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">Events<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active ml-3">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#">Contact Us<span class="sr-only">(current)</span></a>
                    </li>

                    <!--
<li class="nav-item active ml-3">
<a href="#" class="nav-link" data-toggle="modal" data-target="#elegantModalForm">Sign In</a>
</li>
-->

                </div>

            </ul>
            <div class="row mr-3">
                <div class="bg-white rounded rounded-pill shadow-sm mx-sm-4 align-items-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button id="button-addon2" type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
                        </div>
                        <input type="search" placeholder="Search" aria-describedby="button-addon2" class="form-control border-0 bg-white rounded-pill align-middle">
                    </div>
                </div>
 
                <?php 
                if ($_SESSION["isLoggedIn"] == false){
                    echo '<button data-toggle="modal" data-target="#elegantModalForm" type="button" class="btn btn-primary rounded-pill font-weight-bold text-white px-4 mx-3 float-right">Sign In</button>';
                }else{
                    echo '<div class="dropdown rounded-circle bg-info p-1 ml-3">
                    <div id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="rounded-circle bg-info">
                        <img src="'.$PROFILE_IMAGE_DEFAULT.'" class="d-block rounded-circle" width="36px" height="36px">
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel">
                        <a class="dropdown-item font-weight-bold text-uppercase" href="'.$VIEW_PROFILE.'">'.$_SESSION["userName"].'</br><span class=" text font-weight-light text-lowercase">'.$_SESSION["email"].'</span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?logOut=true"><img class="mr-2" src="'.$LOG_OUT_IMG.'" width=20px, height=20px/>Log Out</a>
                    </div>
                </div>';
                }
                ?>

            </div>           
        </div>
    </nav>
</div>





