function gotoProducerDetails(producerId){
    cancelBubbleEvent()
    window.location = "/kleinerzeugernetzwerk/src/userDetails.php?producer="+producerId;
}


function goToProductionPointDeatailsScreen(productionPointId){
    cancelBubbleEvent()
    window.location = "/kleinerzeugernetzwerk/src/productionpointDetails.php?productionpoint="+productionPointId;
}


function goToProductDetailsPage(productId){
    cancelBubbleEvent()
    window.location = "/kleinerzeugernetzwerk/src/productDetails.php?product="+productId;
}

function gotoSellerDetailsScreen(sellerId){
    cancelBubbleEvent()
    window.location = "/kleinerzeugernetzwerk/src/sellerDetails.php?seller="+sellerId;
}


function cancelBubbleEvent(){
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
}