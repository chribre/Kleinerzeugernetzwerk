<?php
/****************************************************************
   FILE             :   signInModal.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   11.02.2021

   PURPOSE          :   Sign in form with user name and password
****************************************************************/
?>
<script src="/kleinerzeugernetzwerk/js/animate.js" type="text/javascript"></script>
<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant pb-4">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong><?php echo gettext("Sign in"); ?></strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="alert alert-danger mx-4" hidden role="alert" id="loginError">
                <?php echo gettext("Please check the email and password and try again!"); ?>
            </div>

            <div class="registration_form">
                <form enctype="multipart/form-data" class="needs-validation" novalidate onsubmit="event.preventDefault()">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email"><?php echo gettext("E-mail"); ?></label>
                            <input type="text" class="form-control" id="email" placeholder="<?php echo gettext("Enter your email address"); ?>" required name="email">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="password"><?php echo gettext("Password"); ?></label>
                            <input type="password" class="form-control" id="password" placeholder="<?php echo gettext("Enter your password"); ?>" required name="password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="text-right">

                        <a onclick="showPasswordResetForm(); return false;"  id="forgot-password-link" 
                           href="#"><?php echo gettext("Forgot password?"); ?></a>
                        <!--
<a data-target="#forgot-password-modal" data-toggle="modal"  id="forgot-password-link" 
href="#forgot-password-modal"><?php echo gettext("Forgot password?"); ?></a>
-->
                    </div>
                    <!--                    <input type="hidden" name="signIn" value="true">-->
                    <button class="btn btn-primary btn-block" id="signInBtn"><?php echo gettext("Sign In"); ?></button>
                </form>
                <div class="text-center pt-3">
                    <p><?php echo gettext("Not a memeber yet?"); ?></p>
                </div>




                <a class="btn btn-secondary btn-block" href="<?php echo $SIGN_UP_LOC ?>"><?php echo gettext("Register"); ?></a>

                <!--                            <button class="btn btn-secondary btn-block" href="../../src/signUp.php">Register</button>-->

                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div>



        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->


<!--Forgot password Modal-->

<div class="modal fade" id="forgot-password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger mx-4 mt-2" hidden role="alert" id="email-error">
                <?php echo gettext("Enter a valid email address"); ?>
            </div>
            <div class="modal-body">
                <form onSubmit="return false;">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email-id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="reset-password-btn" onclick="requestResetPassword()" type="button" class="btn btn-primary">Request Password Reset</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("signInBtn").onclick = function () { 
        login();
    }

    function login(){
        const email = document.getElementById("email").value != null ? document.getElementById("email").value: "";
        const password = document.getElementById("password").value != null ? document.getElementById("password").value: "";

        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/userAuthController.php",
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            headers: {
                'action': "CREATE"
            },
            data: { 
                email:email,
                password: password
            },
            success: function( data ) {
                console.log(data)
                document.getElementById("loginError").setAttribute("hidden","");
                cacheLoginDetails(JSON.parse(data));
                window.location.href = "/kleinerzeugernetzwerk/index.php";
            },
            error: function (request, status, error) {
                $('loginError')
                document.getElementById("loginError").removeAttribute("hidden");                
                animateCSS('#elegantModalForm', 'shakeX');
                //                alert(request.responseText);
                console.log(error)
            }
        });
    }

    function cacheLoginDetails(data){
        if (data){
            localStorage['userId'] = data.userId;
            localStorage['userName'] = data.userName;
            localStorage['email'] = data.email;
            localStorage['token'] = data.token;
            localStorage['tokenId'] = data.tokenId;
            localStorage['isLoggedIn'] = true;
            localStorage['profileImagePath'] = data.imagePath ? data.imagePath : '';
            localStorage['profileImageName'] = data.imageName ? data.imageName : '';
            localStorage['isChatLoggedIn'] = false;
            localStorage['isProfessional'] = data.isProfessional ? data.isProfessional : 0;
            if (data.chatUserId && data.chatAuthToken){
                localStorage['isChatLoggedIn'] = true;
                localStorage['chatUserId'] = data.chatUserId;
                localStorage['chatAuthToken'] = data.chatAuthToken;
            }

            for (var i = 0; i < localStorage.length; i++){
                console.log(localStorage.getItem(localStorage.key(i)));
            }
        }
    }

    function showPasswordResetForm(){
        document.getElementById('email-id').value = '';
        document.getElementById("email-error").hidden = true
        $('#forgot-password-modal').modal('toggle');
    }

    function requestResetPassword(){
        const email = document.getElementById('email-id').value;
        if (email.length > 0){
            resetPasswordService(email);
        }else{
            document.getElementById("email-error").removeAttribute("hidden");
            animateCSS('#forgot-password-modal', 'shakeX');
        }
    }

    function resetPasswordService(email){
        $.ajax({
            type: "POST",
            url: "/kleinerzeugernetzwerk/controller/userAuthController.php",
            beforeSend: function(){
                $("#overlay").fadeIn(300);　
            },
            complete: function(){
                $("#overlay").fadeOut(300);
            },
            headers: {
                'action': "RESET_PASSWORD_REQUEST"
            },
            data: { 
                email:email
            },
            success: function( data ) {
                console.log(data)
            },
            error: function (request, status, error) {
                console.log(error)
            }
        });
    }

</script>