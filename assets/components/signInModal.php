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
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="alert alert-danger mx-4" hidden role="alert" id="loginError">
                Please check the email and password and try again!
            </div>

            <div class="registration_form">
                <form enctype="multipart/form-data" class="needs-validation" novalidate onsubmit="event.preventDefault()">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter your email address" required name="email">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password" required name="password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <p>Forgot password?</p>
                    </div>
                    <!--                    <input type="hidden" name="signIn" value="true">-->
                    <button class="btn btn-primary btn-block" id="signInBtn">Sign In</button>
                </form>
                <div class="text-center pt-3">
                    <p>Not a memeber yet?</p>
                </div>




                <a class="btn btn-secondary btn-block" href="<?php echo $SIGN_UP_LOC ?>"> Register</a>

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
            for (var i = 0; i < localStorage.length; i++){
                console.log(localStorage.getItem(localStorage.key(i)));
            }
        }
    }
</script>