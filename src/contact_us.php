<?php
/****************************************************************
   FILE:      contact_us.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  05.06.2021

   PURPOSE:   Details of the organisations and form for contacting the stakeholders.
****************************************************************/  

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/header.php");
?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;800;900&family=Work+Sans&display=swap" rel="stylesheet">
<link href="/kleinerzeugernetzwerk/css/custom/about_us.css" rel="stylesheet">

<div class="mx-auto justify-content-center mt-md-5">
    <h3 class="text-center inter-font heading">CONATCT US</h3>
    <p class="text-center mx-md-5 px-md-5 mt-md-5 desc-italics">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>
<div class="mt-md-5">
    <div class="row mx-auto justify-content-center">
        <div class="col-md-5">
            <div class="row">
                <img class="col-md-6" src="data:image/png;base64,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" alt="">

                <div class="col-md-6">
                    <div class="row ml-3">
                        <svg class="my-auto mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>
                        <p class="my-auto inter-font desc-regular">University of Neubrandenburg<br>Brodaer Straße 2<br>17033 Neubrandenburg</p>
                    </div>
                    <div class="row ml-3 mt-3">

                        <svg class="my-auto mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg>

                        <p class="my-auto inter-font desc-regular">+49 395 5693-0</p>
                    </div>
                    <div class="row ml-3  mt-3">
                        <svg class="my-auto mr-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                        <p class="my-auto inter-font desc-regular">testemail@testmail.com</p>
                    </div>



                </div>
            </div>


        </div>
        <div class="col-md-5 px-5">
            <h5 class="inter-font sub-heading ">Email Form</h5>
            <p class="inter-font desc-regular">We want to hear from you. Please feel free to email test@email.com, or just speak your mind below. Please allow 1 business  day to respond.</p>
            <div>
                <div class="row mt-4">
                    <p class="col-md-3 my-auto inter-font desc-regular">NAME</p>
                    <input class="col-md-9 my-auto  inter-font desc-regular" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="row mt-4">
                    <p  class="col-md-3 my-auto inter-font desc-regular">EMAIL</p>
                    <input class="col-md-9 my-auto inter-font desc-regular" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="row mt-4">
                    <p class="col-md-3 my-auto inter-font desc-regular">MESSAGE</p>
                    <textarea class="col-md-9 my-auto inter-font desc-regular" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>

                <button type="button" class="btn btn-primary btn-lg mt-5 inter-font name">SEND</button>

            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
        setLoginOrProfileButton();
    });
</script>
<?php include("$_SERVER[DOCUMENT_ROOT]/kleinerzeugernetzwerk/assets/components/footer.php");?>

