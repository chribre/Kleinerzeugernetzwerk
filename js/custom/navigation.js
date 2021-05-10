function gotoProducerDetails(producerId){
    window.location = "/kleinerzeugernetzwerk/src/userDetails.php?producer="+producerId;
}


function goToProductionPointDeatailsScreen(productionPointId){
    window.location = "/kleinerzeugernetzwerk/src/productionpointDetails.php?productionpoint="+productionPointId;
}


function goToProductDetailsPage(productId){
    window.location = "/kleinerzeugernetzwerk/src/productDetails.php?product="+productId;
}

function gotoSellerDetailsScreen(sellerId){
    window.location = "/kleinerzeugernetzwerk/src/sellerDetails.php?seller="+sellerId;
}
