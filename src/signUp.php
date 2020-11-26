<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
/* Tell mysqli to throw an exception if an error occurs */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysql_conn = mysqli_connect('localhost', 'root', '', 'kleinerzeugernetzwerk');
if ($mysql_conn->connect_error) {
    die("Connection failed: " . $mysql_conn->connect_error);
}
echo "Connected successfully, ";
///* The table engine has to support transactions */
//mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS language (
//    Code text NOT NULL,
//    Speakers int(11) NOT NULL
//    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo('Post method hit,');
    $password = $mysql_conn->real_escape_string($_POST['password']);
    $repeat_password = $mysql_conn->real_escape_string($_POST['psw-repeat']);
    if ($password === $repeat_password){
        $email = $mysql_conn->real_escape_string($_POST['email']);
        $select = mysqli_query($mysql_conn, "SELECT `email` FROM `user` WHERE `email` = '$email'") or exit(mysqli_error($connectionID));
        if(mysqli_num_rows($select)) {
            exit('This email is already being used');
        }else{
            $first_name = $mysql_conn->real_escape_string($_POST['first_name']);
            $middle_name = $mysql_conn->real_escape_string($_POST['middle_name']);
            $last_name = $mysql_conn->real_escape_string($_POST['last_name']);
            $dob = $mysql_conn->real_escape_string($_POST['dob']);
            $street = $mysql_conn->real_escape_string($_POST['street']);
            $house_number = $mysql_conn->real_escape_string($_POST['house_number']);
            $zip = $mysql_conn->real_escape_string($_POST['zip']);
            $city = $mysql_conn->real_escape_string($_POST['city']);
            $country = $mysql_conn->real_escape_string($_POST['country']);
            $phone = $mysql_conn->real_escape_string($_POST['phone']);
            $mobile = $mysql_conn->real_escape_string($_POST['mobile']);


            /* Start transaction */
            mysqli_begin_transaction($mysql_conn);


            $sql = "INSERT INTO user (salutations, first_name, middle_name, last_name, dob, street, house_number, zip, city, country, phone, mobile, email, user_type, is_active, is_blocked)"
                . "VALUES ('Mr.', '$first_name', '$middle_name', '$last_name', '$dob', '$street', '$house_number', '$zip', '$city', '$country', '$phone', '$mobile', '$email', 1, 1, 0)";

            echo $sql;

            try{
                mysqli_query($mysql_conn, $sql);
                $user_id = $mysql_conn->insert_id;
                echo "user id is $user_id, ";
                $user_credential_query = "INSERT INTO user_credential(user_id, user_name, password)"
                    ."VALUES($user_id, '$email', '$password')";

                try{
                    mysqli_query($mysql_conn, $user_credential_query);
                    mysqli_commit($mysql_conn);
                    echo "account created, ";
                }catch(mysqli_sql_exception $exception){
                    echo "user creation failed,";
                    mysqli_rollback($mysql_conn);
                    var_dump($exception);
                    throw $exception;
                }                
            }catch(mysqli_sql_exception $exception){
                echo "user creation failed,";
                mysqli_rollback($mysql_conn);
                var_dump($exception);
                throw $exception;
            }
        }
    }else{
        echo "Passwords doesn't match.";
    }
}else{
    echo "post method not found!,";
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo $HOME_CSS_LOC ?>" />

        <script
                src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script type="text/javascript" src="../assets/date_picker/bootstrap-datepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="../assets/date_picker/bootstrap-datepicker.css" >






        <title>Kleinerzeuger Netzwerk</title>



        <script src="https://cdn.datedropper.com/get/xm7ommbtksza213pj1kj2ugzudj0rfxc"></script>
        <script src="../assets/date_picker/datedropper.pro.min.js"></script>
    </head>
    <body>
        <?php $comp_path = "../assets/components/"; include($comp_path."navigationBar.php"); ?>

        <div class="mx-xl-5">
        

        <div class="justify-content-center text-center">
            <h3 class="pt-4">Sign Up</h3>
            <p>Please fill in this form to create an account.</p>
        </div>




        <div  class="rounded-circle pb-4" width="152px" height="152px">
            <img src="../images/profile_placeholder.png" class="mx-auto d-block rounded-circle" width="150px" height="150px">
            <!--                <button class="btn bg-transparent">Edit</button>-->
        </div>

        <div class="registration_form">
            <form action="signUp.php" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-1 mb-3">
                        <label for="exampleFormControlSelect1">Salutation</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required name="first_name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Middle name</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Middle name" required name="middle_name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Last name</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Last name" required name="last_name">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom03">Date of Birth</label>
                        <input type="text" class="form-control" id="date-picker" placeholder="DD/MM/YYYY" required name="dob">
                        <script>
                            $('#date-picker').dateDropper({
                                large: true,
                                largeOnly: true
                            })
                        </script>
                        <div class="invalid-feedback">
                            Please provide Date of Birth.
                        </div>
                    </div>
                </div>                
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="validationCustom03">Street</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Street" required name="street">
                        <div class="invalid-feedback">
                            Please provide a valid Street Name.
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustom04">House Number</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="House Number" required name="house_number">
                        <div class="invalid-feedback">
                            Please provide a valid hosue number.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Zip</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Zip" required name="zip">
                        <div class="invalid-feedback">
                            Please provide a valid Zip.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">City</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="City" required name="city">
                        <div class="invalid-feedback">
                            Please provide a valid City.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Country</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Country" required name="country">
                        <div class="invalid-feedback">
                            Please provide a valid Country.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom03">Mobile</label>
                        <input type="text" class="form-control" id="validationCustom03" placeholder="Mobile" required name="mobile">
                        <div class="invalid-feedback">
                            Please provide a valid mobile number.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Phone</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="Phone" required name="phone">
                        <div class="invalid-feedback">
                            Please provide a valid phone number.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">E-mail</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="E-mail" required name="email">
                        <div class="invalid-feedback">
                            Please provide a valid e-mail address.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Password</label>
                        <input type="password" class="form-control" id="validationCustom04" placeholder="Password" required name="password">
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom04">Repeat Password</label>
                        <input type="password" class="form-control" id="validationCustom04" placeholder="RepeatPassword" required name="psw-repeat">
                        <div class="invalid-feedback">
                            Please provide a valid repeat password.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required name="agree">
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
            </form>

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


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>

