
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



            <div class="registration_form">
                <form action="<?php echo $HOME_LOC ?>" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">E-mail</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter your email address" required name="email">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom02">Password</label>
                            <input type="password" class="form-control" id="validationCustom02" placeholder="Enter your password" required name="password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <p>Forgot password?</p>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Sign In</button>
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
