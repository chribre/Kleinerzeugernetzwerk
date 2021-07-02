<?php
/****************************************************************
   FILE:      rest_password.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  20.06.2021

   PURPOSE:   Page to reset password of a user account.
****************************************************************/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
?>

<script type="text/javascript" src="/kleinerzeugernetzwerk/js/user/reset_password.js"></script>
<div class="row justify-content-center mx-auto mt-4">
    <div class="m-auto col-md-5 text-center">
        <img class="rounded-circle" width="50%" src="/kleinerzeugernetzwerk/images/forgot-password.jpg" alt="">
    </div>
    <div class="my-auto col-md-5 mx-5">
        <div class="mb-3">
            <label for="email" class="form-label"><?php echo gettext("Confirm email address"); ?></label>
            <input type="email" class="form-control" id="reset-email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?php echo gettext("New Password"); ?></label>
            <input type="password" class="form-control" id="reset-password" placeholder="<?php echo gettext("Password"); ?>">
        </div>
        <div class="mb-3">
            <label for="repeat-password" class="form-label"><?php echo gettext("Repeat Password"); ?></label>
            <input type="password" class="form-control" id="reset-repeat-password" placeholder="<?php echo gettext("Repeat Password"); ?>Password">
        </div>
        <button class="btn btn-primary" type="submit" onclick="resetPasswordAPI()"><?php echo gettext("Reset Password"); ?></button>
    </div>
</div>



<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>