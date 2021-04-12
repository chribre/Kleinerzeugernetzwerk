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

<div class="modal" id="registerSuccessModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Congratulations, Your acoount has been successfully created.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue</button>
            </div>
        </div>
    </div>
</div>



<div class="container mb-5">


    <div class="justify-content-center text-center">
        <h3 class="pt-4" id="editTitle">Sign Up</h3>
        <p id="editDesc">Please fill in this form to create an account.</p>
    </div>



    <!--Form to capure data from user for registration-->
    <div class="registration_form">
        <form enctype="multipart/form-data" class="" onsubmit="event.preventDefault()">
            <div  class="rounded-circle pb-4" width="152px" height="152px">
                <img id="profileImage" src="../images/profile_placeholder.png" class="mx-auto d-block rounded-circle" width="150px" height="150px" style="object-fit: cover;">
                <label class="btn btn-default">
                    Edit <input id="profileImageFile" type="file" hidden name="file" onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                </label>
                <input type="hidden" name="profileImageId" value=0 id="profileImageId">
            </div>

            <div class="form-row">

                <div class="col-md-6 mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" id="first_name" placeholder="First name" required name="first_name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last name" required name="last_name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

            </div>
            <div class="form-row" id="emailSection">
                <div class="col-md-12 mb-3">
                    <label for="r_email">E-mail</label>
                    <input type="text" class="form-control" id="r_email" placeholder="E-mail" required name="r_email">
                    <div class="invalid-feedback">
                        Please provide a valid e-mail address.
                    </div>
                </div>
            </div>

            <div class="form-row" id="passwordSection">
                <div class="col-md-12 mb-3">
                    <label for="r_password">Password</label>
                    <input type="password" class="form-control" id="r_password" placeholder="Password" required name="r_password">
                    <div class="invalid-feedback">
                        Please provide a valid password.
                    </div>
                </div>
            </div>
            <div class="form-row" id="passwordrptSection">
                <div class="col-md-12 mb-3">
                    <label for="psw_repeat">Repeat Password</label>
                    <input type="password" class="form-control" id="psw_repeat" placeholder="Repeat Password" required name="psw-repeat">
                    <div class="invalid-feedback">
                        Please provide a valid repeat password.
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
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Phone" required name="phone">
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
                    <label for="street">Street</label>
                    <input type="text" class="form-control" id="street" placeholder="Street" required name="street">
                    <div class="invalid-feedback">
                        Please provide a valid Street Name.
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="house_number">House Number</label>
                    <input type="text" class="form-control" id="house_number" placeholder="House Number" required name="house_number">
                    <div class="invalid-feedback">
                        Please provide a valid hosue number.
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" placeholder="Zip" required name="zip">
                    <div class="invalid-feedback">
                        Please provide a valid Zip.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City" required name="city">
                    <div class="invalid-feedback">
                        Please provide a valid City.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Country" required name="country">
                    <div class="invalid-feedback">
                        Please provide a valid Country.
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="bio">Share Your Farm Story</label>
                    <!--                    <input type="text" class="form-control" id="bio" placeholder="E-mail" required name="bio">-->
                    <textarea class="form-control" id="bio" rows="5" placeholder="Write something about you, your farm, products etc." required name="bio"></textarea>
                    <div class="invalid-feedback">
                        Please provide a description.
                    </div>
                </div>
            </div>

            <div class="form-group" id="agreeSection">
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
            <!--            <input type="hidden" name="signUp" value="true">-->
            <input type="hidden" name="userId" value=0 id="userId">
            <div class="col text-center">
                <button class="btn btn-primary btn-lg col-4 rounded-pill shadow-lg mb-5" id="signUpBtn">Sign Up</button>
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
                const ids = ['first_name', 'last_name', 'bio', 'street', 'house_number', 'zip', 'city', 'country', 'phone', 'r_email', 'r_password', 'psw_repeat', 'userId','profileImageId'];
                var formData = [];

                ids.forEach(function(element) {
                    switch(element){
                        case "profileImageId":
                            const value = document.getElementById(element).value != null ? document.getElementById(element).value : 0;
                            const imageId = [parseInt(value)];
                            formData[element] = imageId;
                        default:
                            const value1 = document.getElementById(element).value != null ? document.getElementById(element).value: "";
                            formData[element] = value1;

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


                //                const firstName = document.getElementById("first_name").value != null ? document.getElementById("first_name").value: "";
                //                const lastName = document.getElementById("last_name").value != null ? document.getElementById("last_name").value: "";
                //                const description = document.getElementById("bio").value != null ? document.getElementById("bio").value: "";
                //                const dob = document.getElementById("dob_date_picker").value != null ? document.getElementById("dob_date_picker").value: "";
                //                const street = document.getElementById("street").value != null ? document.getElementById("street").value: "";
                //                const houseNumber = document.getElementById("house_number").value != null ? document.getElementById("house_number").value: "";
                //                const zip = document.getElementById("zip").value != null ? document.getElementById("zip").value: "";
                //                const city = document.getElementById("city").value != null ? document.getElementById("city").value: "";
                //                const country = document.getElementById("country").value != null ? document.getElementById("country").value: "";
                //                const mobile = document.getElementById("mobile").value != null ? document.getElementById("mobile").value: "";
                //                const phone = document.getElementById("phone").value != null ? document.getElementById("phone").value: "";
                //                const email = document.getElementById("r_email").value != null ? document.getElementById("r_email").value: "";
                //                const password = document.getElementById("r_password").value != null ? document.getElementById("r_password").value: "";
                //                const repeatPassword = document.getElementById("psw_repeat").value != null ? document.getElementById("psw_repeat").value: "";

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
                    //                    data: { 
                    //                        user_id: 0,
                    //                        first_name: firstName,
                    //                        last_name: lastName,
                    //                        dob: dob,
                    //                        street: street,
                    //                        house_number: houseNumber,
                    //                        zip: zip,
                    //                        city: city,
                    //                        country: country,
                    //                        mobile: mobile,
                    //                        phone: phone,
                    //                        email:email,
                    //                        password: password,
                    //                        description: description
                    //                    },
                    //                    dataType: "json",
                    //                    contentType: "application/json",
                    //                    cache: false,
                    success: function( data ) {
                        console.log(data)
                        $("#overlay").fadeOut(300);
                        $('#registerSuccessModal').modal('show');
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                        console.log(error)
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
                document.getElementById("profileImage").src=userData.imagePath ? userData.imagePath : "";
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
            }
        </script>
    </div>

</div>

<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>

