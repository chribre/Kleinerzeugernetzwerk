<?php
/****************************************************************
   FILE:      feeds-by-user.php
   AUTHOR:    Fredy Davis
   LAST EDIT DATE:  13.07.2021

   PURPOSE:   Page to list all feed posts by a particular user.
****************************************************************/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/feeds/feed-post-user.js.php"></script>
<script type="text/javascript" src="/kleinerzeugernetzwerk/js/custom/navigation.js"></script>


<style>
    #test{
        width: 150px;
        height: 150px;
        margin: 10px;
        object-fit: cover;
    }

    .feed-img{
        object-fit: cover;
    }

</style>


<div class="modal fade" id="feed-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="">
        <div class="modal-content">
            <div class="modal-header">




                <script type="text/javascript">


                    $(function() {
                        // Multiple images preview in browser
                        var imagesPreview = function(input, placeToInsertImagePreview) {

                            if (input.files) {
                                var filesAmount = input.files.length;
                                document.getElementById(placeToInsertImagePreview).innerHTML = ''
                                for (i = 0; i < filesAmount; i++) {
                                    var reader = new FileReader();

                                    reader.onload = function(event) {


                                        const imgdiv = document.createElement('div');

                                        imgdiv.className = 'image';

                                        imgdiv.innerHTML = `
<div class="overlay">
                    </div>
<img src="${event.target.result}" id="test" key="${i}">`;

                                        document.getElementById(placeToInsertImagePreview).appendChild(imgdiv);

                                    }

                                    reader.readAsDataURL(input.files[i]);
                                }
                            }

                        };

                        $('#feed-gallery-photo-add').on('change', function() {
                            imagesPreview(this, 'feed-gallery');
                        });
                    });



                </script>







                <div class="text-center"><h5 class="modal-title"><i class="material-icons">&#xE147;</i><?php echo gettext("Add news feed"); ?></h5></div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <p><?php echo gettext("Modal body text goes here."); ?></p>
                <form id="news-feed-form" enctype="multipart/form-data" onsubmit="event.preventDefault()">
                    <!--                    <form method="post" id="newProductionPointForm" enctype="multipart/form-data">-->
                    <div class="form-group">
                        <label for="feed-title"><?php echo gettext("Feed Title"); ?></label>
                        <input type="text" class="form-control" id="feed-title" aria-describedby="feed-title" placeholder="<?php echo gettext("Feed Title"); ?>" name="feed-title">
                    </div>
                    <div class="form-group">
                        <label for="feed-article"><?php echo gettext("Feed Article"); ?></label>
                        <textarea class="form-control" id="feed-article" name="feed-article" rows="15" placeholder="<?php echo gettext("Write an article here"); ?>"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="feed-author-first-name"><?php echo gettext("Author First Name"); ?></label>
                            <input type="text" class="form-control" id="feed-author-first-name" placeholder="<?php echo gettext("Author First Name"); ?>" required name="feed-author-first-name">
                            <div class="invalid-feedback">
                                <?php echo gettext("Please provide a valid name."); ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="feed-author-last-name"><?php echo gettext("Author Last Name"); ?></label>
                            <input type="text" class="form-control" id="feed-author-last-name" placeholder="<?php echo gettext("Author Last Name"); ?>" required name="feed-author-last-name">
                            <div class="invalid-feedback">
                                <?php echo gettext("Please provide a valid name."); ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="feed-id" name="feed-id" value="0" />







                    <div id="feedImageId" hidden></div>
                    <div class="form-group">
                        <label><?php echo gettext("Add a feed image"); ?></label>
                        <div class="mx-4 justify-content-center row">
                            <div id="feed-gallery" class="row">

                            </div>
                            <div class="my-auto">
                                <label type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                    </svg>


                                    <input id="feed-gallery-photo-add" hidden type="file" name="file[]" id="file" multiple accept="image/*">
                                    <span class="visually-hidden"></span>
                                </label>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-end">
                        <div>
                            <button class="btn btn-primary" id="save-feed-post" onclick="publishFeedPost()"><?php echo gettext("Publish"); ?></button>
                            <!--                            <button type="submit" name="addProductionPointMethod" value="true" class="btn btn-primary">Save</button>-->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo gettext("Close"); ?></button>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="feedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo gettext("Delete Feed Post"); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="feedDeleteMessageText">
                <?php echo gettext("Are your sure want to delete this feed post"); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo gettext("Close"); ?></button>
                <button type="button" class="btn btn-danger" id="confirmFeedDelete"><?php echo gettext("Delete"); ?></button>
            </div>
        </div>
    </div>
</div>



<div class="container mt-5">
    <div id="user-feed-list">
        <div class="row">
            <div class="col-md-4">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="180px">
            </div>

            <div class="col-md-8">
                <h3>Post Title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

                <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
                    <button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}"><?php echo gettext("Delete"); ?></button>
                    <button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}"><?php echo gettext("Edit"); ?></button>
                    <button type="button" class="btn btn-success" id="viewProductBtn" onclick="goToProductDetailsPage(${productId})"><?php echo gettext("View"); ?></button>


                </div>

            </div>

        </div>
        <hr class="solid">



        <div class="row">
            <div class="col-md-4">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="180px">
            </div>

            <div class="col-md-8">
                <h3>Post Title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

                <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
                    <button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}"><?php echo gettext("Delete"); ?></button>
                    <button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}"><?php echo gettext("Edit"); ?></button>
                    <button type="button" class="btn btn-success" id="viewProductBtn" onclick="goToProductDetailsPage(${productId})"><?php echo gettext("View"); ?></button>


                </div>

            </div>

        </div>
        <hr class="solid">





        <div class="row">
            <div class="col-md-4">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="180px">
            </div>

            <div class="col-md-8">
                <h3>Post Title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

                <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
                    <button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}"><?php echo gettext("Delete"); ?></button>
                    <button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}"><?php echo gettext("Edit"); ?></button>
                    <button type="button" class="btn btn-success" id="viewProductBtn" onclick="goToProductDetailsPage(${productId})"><?php echo gettext("View"); ?></button>


                </div>

            </div>

        </div>
        <hr class="solid">









        <div class="row">
            <div class="col-md-4">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="180px">
            </div>

            <div class="col-md-8">
                <h3>Post Title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

                <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
                    <button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}"><?php echo gettext("Delete"); ?></button>
                    <button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}"><?php echo gettext("Edit"); ?></button>
                    <button type="button" class="btn btn-success" id="viewProductBtn" onclick="goToProductDetailsPage(${productId})"><?php echo gettext("View"); ?></button>


                </div>

            </div>

        </div>
        <hr class="solid">







        <div class="row">
            <div class="col-md-4">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="180px">
            </div>

            <div class="col-md-8">
                <h3>Post Title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

                <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
                    <button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}"><?php echo gettext("Delete"); ?></button>
                    <button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}"><?php echo gettext("Edit"); ?></button>
                    <button type="button" class="btn btn-success" id="viewProductBtn" onclick="goToProductDetailsPage(${productId})"><?php echo gettext("View"); ?></button>


                </div>

            </div>

        </div>
        <hr class="solid">





        <div class="row">
            <div class="col-md-4">
                <img class="feed-img" src="https://media.istockphoto.com/photos/farmer-in-a-soybean-field-agricultural-concept-picture-id1158664559" alt="" width="100%" height="180px">
            </div>

            <div class="col-md-8">
                <h3>Post Title</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</p>

                <div id="manipulationBtnProducts" class="btn-group btn-group-sm mt-3 mr-auto float-right" role="group" aria-label="" value=${productId}>
                    <button type="button" class="btn btn-danger" id="deleteProductBtn" onclick="showDeleteProductModal(${productId})" value="${productId}"><?php echo gettext("Delete"); ?></button>
                    <button type="button" class="btn btn-primary" id="editProductBtn" onclick="openAddProductModal(${productId})" value="${productId}"><?php echo gettext("Edit"); ?></button>
                    <button type="button" class="btn btn-success" id="viewProductBtn" onclick="goToProductDetailsPage(${productId})"><?php echo gettext("View"); ?></button>


                </div>

            </div>

        </div>
        <hr class="solid">
    </div>
</div>









