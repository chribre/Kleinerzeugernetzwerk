<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
//include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/config/config.php");
//include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/src/functions.php");
/* Tell mysqli to throw an exception if an error occurs */
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//$mysql_conn = mysqli_connect('localhost', 'root', '', 'kleinerzeugernetzwerk');
//if ($mysql_conn->connect_error) {
//    die("Connection failed: " . $mysql_conn->connect_error);
//}
//echo "Connected successfully, ";
///* The table engine has to support transactions */
//mysqli_query($mysqli, "CREATE TABLE IF NOT EXISTS language (
//    Code text NOT NULL,
//    Speakers int(11) NOT NULL
//    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

global $dbConnection;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['signUp'] == "true"){
    echo('Post method hit,');
    $password = escapeSQLString($_POST['password']);
    $repeat_password = escapeSQLString($_POST['psw-repeat']);
    if ($password === $repeat_password){
        $email = escapeSQLString($_POST['email']);

        if (isUserAlreadyExist($email)){
            echo "This email is already being used";
            exit('This email is already being used');
        }else{
            $salutation = escapeSQLString($_POST['salutation']);
            $first_name = escapeSQLString($_POST['first_name']);
            $middle_name = escapeSQLString($_POST['middle_name']);
            $last_name = escapeSQLString($_POST['last_name']);
            $dob = escapeSQLString($_POST['dob']);
            $street = escapeSQLString($_POST['street']);
            $house_number = escapeSQLString($_POST['house_number']);
            $zip = escapeSQLString($_POST['zip']);
            $city = escapeSQLString($_POST['city']);
            $country = escapeSQLString($_POST['country']);
            $phone = escapeSQLString($_POST['phone']);
            $mobile = escapeSQLString($_POST['mobile']);


            $userType = 1;
            $isActive = 1;
            $isBlocked = 0;


            $fileNameNew = null;
            if (isset($_FILES['file'])){
                $file = $_FILES['file'];
                echo $file;
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];


                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpeg', 'jpg', 'png');
                echo $fileActualExt;
                if (in_array($fileActualExt, $allowed)){
                    if ($fileError === 0){
                        if ($fileSize < 100000 ){
                            $fileNameNew = uniqid('', true).".".$fileActualExt;
                            $fileDestination = "$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk_uploads/".$fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDestination);  
                            echo "filed upload success";
                        }else{
                            echo "your file size is too high";
                        }
                    }else{
                        echo "There was an error uploading your profile image";
                    }
                }else{
                    echo "Cannot upload file of this type";
                }
            }





                createUser($salutation, $first_name, $middle_name, $last_name, $dob, $street, $house_number, $zip, $city, $country, $phone, $mobile, $email, $password, $userType, $isActive, $isBlocked, $fileNameNew);
                }
                }else{
                    echo "Passwords doesn't match.";
                }
                }else{
                    echo "post method not found!,";
                }


                function uploadprofileImage(){
                    $file = $_FILES['profileImage'];
                    $fileName = $_FILES['profileImage']['name'];
                    $fileTmpName = $_FILES['profileImage']['tmp_name'];
                    $fileSize = $_FILES['profileImage']['size'];
                    $fileError = $_FILES['profileImage']['error'];
                    $fileType = $_FILES['profileImage']['type'];


                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt));

                    $allowed = array('jpeg', 'jpg', 'png');

                    if (in_array($fileActualExt, $allowed)){
                        if ($fileError === 0){
                            if ($fileSize < 100000 ){
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = '/uploads/'.$fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);                
                            }else{
                                echo "your file size is too high";
                            }
                        }else{
                            echo "There was an error uploading your profile image";
                        }
                    }else{
                        echo "Cannot upload file of this type";
                    }
                }
?>


<div class="mx-xl-5">


    <div class="justify-content-center text-center">
        <h3 class="pt-4">Sign Up</h3>
        <p>Please fill in this form to create an account.</p>
    </div>

    <!--
<div class="small-4 columns">
<img src="http://placehold.it/350x150">
<a class="button" href="/jane/">View Jane's Profile</a>
</div>
-->




    <div class="registration_form">
        <form action="signUp.php" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>
            <div  class="rounded-circle pb-4" width="152px" height="152px">
                <img src="../images/profile_placeholder.png" class="mx-auto d-block rounded-circle" width="150px" height="150px">
                <label class="btn btn-default">
                    Edit <input type="file" hidden name="file">
                </label>
            </div>
            <div class="form-row">
                <div class="col-md-1 mb-3">
                    <label for="exampleFormControlSelect1">Salutation</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="salutation">
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
            <input type="hidden" name="signUp" value="true">
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

<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>

