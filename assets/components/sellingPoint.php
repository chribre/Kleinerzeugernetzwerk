<?php

/****************************************************************
   FILE             :   sellingPoint.php
   AUTHOR           :   Fredy Davis
   LAST EDIT DATE   :   14.03.2021

   PURPOSE          :   fetch and list all sellers and their details in the dashboard page
                        selling points can be added/edited or deleted
****************************************************************/

?>


<div class="container" id="sellerListContainer">
    <ul class="my-5" id="sellerList">
    </ul>
</div>





<!-- Modal -->
<div class="modal fade" id="sellerDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Seller</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="sellerDeleteMessageText">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmSellerDelete">Delete</button>
            </div>
        </div>
    </div>
</div>