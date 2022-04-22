<?php
/****************************************************************
   FILE:      signUp.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  08.02.2021

   PURPOSE:   Page to enter user details to register to the system.
              Contains a form to enter user details
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//$HOME_CSS_LOC = '/kleinerzeugernetzwerk/css/custom/home.css';
include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
?>
<link rel="stylesheet" href="/kleinerzeugernetzwerk/css/custom/roundCheckbox.css">
<div class="modal" id="registerSuccessModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><?php echo gettext("Success!"); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo gettext("Congratulations, Your acoount has been successfully created."); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo gettext("Continue"); ?></button>
            </div>
        </div>
    </div>
</div>



<div class="container mb-5">


    <div class="justify-content-center text-center">
        <h3 class="pt-4" id="editTitle"><?php echo gettext("Sign Up"); ?></h3>
        <p id="editDesc"><?php echo gettext("Please fill in this form to create an account."); ?></p>
    </div>



    <!--Form to capure data from user for registration-->
    <div class="registration_form">
        <form enctype="multipart/form-data" class="" onsubmit="event.preventDefault()">
           
<div class="image_container mb-5">
   <div class="image_outer">
   <img id="profileImage" src="../images_1/profile_placeholder.png" class="mx-auto d-block rounded-circle" width="150px" height="150px" style="object-fit: cover;">
    <div class="image_inner">
    <input id="profileImageFile"  class="image_inputfile" type="file" name="file" accept="image/*" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
    <label><img id="editprofileImage" src="../images/icons/camera.svg" class="mx-auto my-auto rounded-circle" width="18px" height="28px" style="object-fit: cover;"></label>
    <input type="hidden" name="profileImageId" value=0 id="profileImageId">
    </div>
  </div>
</div>
<!--
            <div  class="rounded-circle pb-4" width="152px" height="152px">
                <img id="profileImage" src="../images/profile_placeholder.png" class="mx-auto d-block rounded-circle" width="150px" height="150px" style="object-fit: cover;">
                <label class="btn btn-default">
                    <?php echo gettext("Edit"); ?><input id="profileImageFile" type="file" hidden name="file" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                </label>
                <input type="hidden" name="profileImageId" value=0 id="profileImageId">
            </div>
-->

            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <label for="first_name"><?php echo gettext("First name"); ?></label>
                    <input type="text" class="form-control" id="first_name" placeholder="<?php echo gettext("First name"); ?>" required name="first_name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name"><?php echo gettext("Last name"); ?></label>
                    <input type="text" class="form-control" id="last_name" placeholder="<?php echo gettext("Last name"); ?>" required name="last_name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

            </div>
            <div class="form-row" id="emailSection">
                <div class="col-md-12 mb-3">
                    <label for="r_email"><?php echo gettext("E-mai"); ?></label>
                    <input type="text" class="form-control" id="r_email" placeholder="<?php echo gettext("E-mai"); ?>" required name="r_email">
                    <div class="invalid-feedback">
                        <?php echo gettext("Please provide a valid e-mail address."); ?>
                    </div>
                </div>
            </div>

            <div class="form-row" id="passwordSection">
                <div class="col-md-12 mb-3">
                    <label for="r_password"><?php echo gettext("Password"); ?></label>
                    <input type="password" class="form-control" id="r_password" placeholder="<?php echo gettext("Password"); ?>" required name="r_password">
                    <div class="invalid-feedback">
                        <?php echo gettext("Please provide a valid password."); ?>
                    </div>
                </div>
            </div>
            <div class="form-row" id="passwordrptSection">
                <div class="col-md-12 mb-3">
                    <label for="psw_repeat"><?php echo gettext("Repeat Password"); ?></label>
                    <input type="password" class="form-control" id="psw_repeat" placeholder="<?php echo gettext("Repeat Password"); ?>" required name="psw-repeat">
                    <div class="invalid-feedback">
                        <?php echo gettext("Please provide a valid repeat password."); ?>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <!--
<div class="col-md-6 mb-3">
<label for="mobile">Mobile</label>
<input type="text" class="form-control" id="mobile" placeholder="Mobile" required name="mobile">
<div class="invalid-feedback">
Please provide a valid mobile number.
</div>
</div>
-->
                <div class="col-md-12 mb-3">
                    <label for="phone"><?php echo gettext("Phone"); ?></label>
                    <input type="text" class="form-control" id="phone" placeholder="<?php echo gettext("Phone"); ?>" required name="phone">
                    <div class="invalid-feedback">
                        Please provide a valid phone number.
                    </div>
                </div>
            </div>



            <!--
<div class="form-row">
<div class="col-md-12 mb-3">
<label for="dob_date_picker">Date of Birth</label>
<input type="text" class="form-control" id="dob_date_picker" placeholder="DD/MM/YYYY" required name="dob">
<script>
$('#dob_date_picker').dateDropper({
large: true,
largeOnly: true
})
</script>
<div class="invalid-feedback">
Please provide Date of Birth.
</div>
</div>
</div>                
-->
            <div class="form-row">
                <div class="col-md-7 mb-3">
                    <label for="street"><?php echo gettext("Street"); ?></label>
                    <input type="text" class="form-control" id="street" placeholder="<?php echo gettext("Street"); ?>" required name="street">
                    <div class="invalid-feedback">
                        Please provide a valid Street Name.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="house_number"><?php echo gettext("House Number"); ?></label>
                    <input type="text" class="form-control" id="house_number" placeholder="<?php echo gettext("House Number"); ?>" required name="house_number">
                    <div class="invalid-feedback">
                        Please provide a valid hosue number.
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="zip"><?php echo gettext("Zip"); ?></label>
                    <input type="text" class="form-control" id="zip" placeholder="<?php echo gettext("Zip"); ?>" required name="zip">
                    <div class="invalid-feedback">
                        Please provide a valid Zip.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="city"><?php echo gettext("City"); ?></label>
                    <input type="text" class="form-control" id="city" placeholder="<?php echo gettext("City"); ?>" required name="city">
                    <div class="invalid-feedback">
                        Please provide a valid City.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="country"><?php echo gettext("Country"); ?></label>
                    <input type="text" class="form-control" id="country" placeholder="<?php echo gettext("Country"); ?>" required name="country">
                    <div class="invalid-feedback">
                        Please provide a valid Country.
                    </div>
                </div>
            </div>
           
           
            <div class="form-row">
                <div class="col-md-11 mb-3 my-auto font-weight-bold">
                    <label for="professionaProducer"><?php echo gettext("Are you a professional producer"); ?></label>
                </div>
                <div class="col-md-1 mb-3 my-auto">
                    <label class="switch"> 
                        <input id="professionalProducer" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="bio"><?php echo gettext("Share Your Farm Story"); ?></label>
                    <!--                    <input type="text" class="form-control" id="bio" placeholder="E-mail" required name="bio">-->
                    <textarea class="form-control" id="bio" rows="5" placeholder="<?php echo gettext("Write something about you, your farm, products etc."); ?>" required name="bio"></textarea>
                    <div class="invalid-feedback">
                        Please provide a description.
                    </div>
                </div>
            </div>

            <div class="form-group" id="agreeSection">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required name="agree">
                    <label class="form-check-label" for="invalidCheck">
                        <?php echo gettext("Agree to terms and conditions"); ?>
                    </label>
                    <div class="invalid-feedback">
                        <?php echo gettext("You must agree before submitting."); ?>
                    </div>
                </div>
            </div>
            <!--            <input type="hidden" name="signUp" value="true">-->
            <input type="hidden" name="userId" value=0 id="userId">
            <div class="col text-center">
                <button class="btn btn-primary btn-lg col-4 rounded-pill shadow-lg mb-5" id="signUpBtn"><?php echo gettext("Sign Up"); ?></button>
            </div>
        </form>


        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            //            (function() {
            //                'use strict';
            //                window.addEventListener('load', function() {
            //                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
            //                    var forms = document.getElementsByClassName('needs-validation');
            //                    // Loop over them and prevent submission
            //                    var validation = Array.prototype.filter.call(forms, function(form) {
            //                        form.addEventListener('submit', function(event) {
            //                            event.preventDefault();
            //                            if (form.checkValidity() === false) {
            //                                event.stopPropagation();
            //                            }else{
            //                                signUp();
            //                            }
            //                            form.classList.add('was-validated');
            //                        }, false);
            //                    });
            //                }, false);
            //            })();


            //            Work in progress to implement sign up sign in as ajax call




            window.onload = function() {
                setLoginOrProfileButton();
                setProfileForEditing();
            };


            document.getElementById("signUpBtn").onclick = function () { 
                if (document.getElementById('userId').value == 0){
                    signUp();
                }else{
                    saveUserProfile();

                }

            }

            function fetchValueFromForm(){
                const ids = ['first_name', 'last_name', 'bio', 'street', 'house_number', 'zip', 'city', 'country', 'phone', 'r_email', 'r_password', 'psw_repeat', 'userId','profileImageId', 'professionalProducer'];
                var formData = [];

                ids.forEach(function(element) {
                    switch(element){
                        case "profileImageId":
                            const value = document.getElementById(element).value != null ? document.getElementById(element).value : 0;
                            const imageId = [parseInt(value)];
                            formData[element] = imageId;
                        default:
                            if (document.getElementById(element).type == "checkbox"){
                                const value = document.getElementById(element).checked != null ? document.getElementById(element).checked: false;
                                formData[element] = value;
                            }else{
                                const value1 = document.getElementById(element).value != null ? document.getElementById(element).value: "";
                                formData[element] = value1;
                            }

                    }
                }); 
                return formData
            }
            /*
                javaScript function to fetch data from form and submit it to the backend using an ajax call
                POST request to pass data to backend
                On successful sign up show a modal with success message and a button to go to login screen.*
            */
            function signUp(){
                const formData = fetchValueFromForm();
                const profielFormData = createProfileFormData(formData);

                $.ajax({
                    type: "POST",
                    url: "/kleinerzeugernetzwerk/controller/userController.php",
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);　
                    },
                    complete: function(){
                        $("#overlay").fadeOut(300);
                    },
                    headers: {
                        'action': "CREATE"
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: profielFormData,
                    success: function( data ) {
                        console.log(data)
                        $("#overlay").fadeOut(300);
                        $('#registerSuccessModal').modal('show');
                    },
                    error: function (request, status, error) {
                        console.log(error)
                        showError(request.status, '', '');
                    }
                });

            }


            $('#registerSuccessModal').on('hide.bs.modal', function (event) {
                location.replace("http://localhost/kleinerzeugernetzwerk/index.php");
            })



            function createProfileFormData(profileData){

                const formData = fetchValueFromForm();



                const userId = localStorage.getItem('userId');
                var file_data = $('#profileImageFile').prop('files');
                var formDataCollection = new FormData();
                for (let i = 0; i < file_data.length; i++) {
                    let file = file_data[i];

                    formDataCollection.append('files[]', file);
                }
                const profileImageId = [profileData.profileImageId];


                formDataCollection.append("user_id", profileData.userId);
                formDataCollection.append("first_name", profileData.first_name);
                formDataCollection.append("last_name", profileData.last_name);
                //                formDataCollection.append("dob", profileData.dob_date_picker);
                formDataCollection.append("street", profileData.street);
                formDataCollection.append("house_number", profileData.house_number);
                formDataCollection.append("zip", profileData.zip);
                formDataCollection.append("city", profileData.zip);
                formDataCollection.append("country", profileData.city);
                //                formDataCollection.append("mobile", profileData.mobile);
                formDataCollection.append("phone", profileData.phone);
                formDataCollection.append("description", profileData.bio);

                formDataCollection.append("email", profileData.r_email);
                formDataCollection.append("password", profileData.r_password);

                formDataCollection.append("profile_image_id", JSON.stringify([parseInt(profileImageId)]));
                formDataCollection.append("is_professional", profileData.professionalProducer ? 1 : 0);

                return formDataCollection;
            }



            function setProfileForEditing(){
                if (window.location.href.includes('editProfile.php')){

                    document.getElementById("editTitle").innerHTML = "Edit Your Profile";
                    document.getElementById("editDesc").innerHTML = "Make changes in the fields provided and save";
                    document.getElementById("signUpBtn").innerHTML = "Save";
                    document.getElementById("emailSection").hidden = true;
                    document.getElementById("passwordSection").hidden = true;
                    document.getElementById("passwordrptSection").hidden = true;
                    document.getElementById("agreeSection").hidden = true;
                    getUserDetails()
                }

            }

            function setProfileValues(userData){
                //                document.getElementById("salutation").value = userData.salutations ? userData.salutations : ""; 
                document.getElementById("first_name").value = userData.firstName ? userData.firstName : "";
                document.getElementById("last_name").value = userData.lastName ? userData.lastName : ""; 
                document.getElementById("bio").value = userData.description ? userData.description : "";
                //                document.getElementById("dob_date_picker").value = userData.dob ? userData.dob : ""; 
                document.getElementById("street").value = userData.street ? userData.street : "";
                document.getElementById("house_number").value = userData.houseNumber ? userData.houseNumber : ""; 
                document.getElementById("zip").value = userData.zip ? userData.zip : "";
                document.getElementById("city").value = userData.city ? userData.city : ""; 
                document.getElementById("country").value = userData.country ? userData.country : "";
                //                document.getElementById("mobile").value = userData.mobile ? userData.mobile : ""; 
                document.getElementById("phone").value = userData.phone ? userData.phone : "";
                document.getElementById("userId").value = userData.userId ? userData.userId : "";
                document.getElementById("professionalProducer").checked = checkboxStatus(userData.isProfessional ? userData.isProfessional : 0);
                
                const profileImageName = userData.imageName ? userData.imageName : DEFAULT_USER_IMAGE;
                const profileImage = getFilePath(1, profileImageName);
                
                document.getElementById("profileImage").src=profileImage ? profileImage : "";
                document.getElementById("profileImageId").value=userData.imageId ? userData.imageId : 0;
            }
            function getUserDetails(){
                const userId = localStorage.getItem('userId')

                $.ajax({
                    type: "POST",
                    url: "/kleinerzeugernetzwerk/controller/userController.php",

                    headers: {
                        'access-token': localStorage.getItem('token'),
                        'user_id': userId,
                        'action': "READ"
                    },
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);　
                    },
                    complete: function(){
                        $("#overlay").fadeOut(300);
                    },
                    data: { 
                        user_id: userId,
                    },
                    success: function( data ) {
                        console.log(data)
                        const userDetails = JSON.parse(data);
                        setProfileValues(userDetails);
                    },
                    error: function (request, status, error) {               
                        console.log(error)
                    }
                });
            }
            
            function checkboxStatus(value){
                if (value){
                    if (value == 1 || value == 'on'){
                        return true;
                        }
                    }
                return false;
}

            function saveUserProfile(){
                const formData = fetchValueFromForm();
                const profielFormData = createProfileFormData(formData);

                $.ajax({
                    type: "POST",
                    url: "/kleinerzeugernetzwerk/controller/userController.php",
                    beforeSend: function(){
                        $("#overlay").fadeIn(300);　
                    },
                    complete: function(){
                        $("#overlay").fadeOut(300);
                    },
                    headers: {
                        'action': "UPDATE",
                        'access-token': localStorage.getItem('token'),
                        'user_id': formData.userId,
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: profielFormData,
                    success: function( data ) {
                        console.log(data)
                        const userDetails = JSON.parse(data) ? JSON.parse(data) : [];
                        updateCache(userDetails);
                        location.reload();
                        
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        console.log(error)
                    }
                });
            }
            
            function updateCache(data){
                let firstName = data.firstName ? data.firstName : "";
                let lastName = data.lastName ? data.lastName : "";
                const name = firstName + ' ' + lastName;
                localStorage['userName'] = name;
                localStorage['profileImagePath'] = data.imagePath ? data.imagePath : "";
                localStorage['profileImageName'] = data.imageName ? data.imageName : "";
                localStorage['isProfessional'] = data.isProfessional ? data.isProfessional : 0;
                
            }
        </script>
    </div>

</div>
<style>
.image_container {
  width: 150px;
  height: 150px;
  display: block;
  margin: 0 auto;
}

.image_outer {
  width: 100% !important;
  height: 100% !important;
  max-width: 150px !important; /* any size */
  max-height: 150px !important; /* any size */
  margin: auto;
  background-color: #6eafd4;
  border-radius: 100%;
  position: relative;
  }
  
.image_inner {
  background-color: white;
  width: 32px;
  height: 32px;
  border-radius: 100%;
  position: absolute;
  bottom: 0;
  right: 0;
}

.image_inner:hover {
  background-color: gainsboro;
}
.image_inputfile {
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: 1;
    width: 32px;
    height: 32px;
}
.image_inputfile + label {
    font-size: 1.25rem;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    overflow: hidden;
    width: 32px;
    height: 32px;
    pointer-events: none;
    cursor: pointer;
    line-height: 32px;
    text-align: center;
}
.image_inputfile + label svg {
    fill: #fff;
}
</style>
<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>

