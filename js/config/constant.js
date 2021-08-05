function getServerRootAddress(){
    const localServer = 'http://localhost';
    const awsServer = 'http://ec2-18-184-142-200.eu-central-1.compute.amazonaws.com'

    return localServer;
}

function getFilePath(fileType, fileName){
    var file = fileName;
    const localServer = 'http://localhost/kleinerzeugernetzwerk_uploads/';
    const awsServer = 'http://ec2-18-184-142-200.eu-central-1.compute.amazonaws.com/kleinerzeugernetzwerk_uploads/'

    var folderPath = '';
    if (file != ''){
        switch(fileType){
            case 1:
                folderPath = 'profile_img/';
                break;
            case 2:
                folderPath = 'product_img/';
                break;
            case 3:
                folderPath = 'production_point_img/';
                break;
            case 4:
                folderPath = 'seller_img/';
                break;
            case 5:
                folderPath = 'news_feeds/';
                break;
            case 6:
                folderPath = 'features_features/';
                break;
        }
    }else{
        file = 'default-image.png'
    }


    const filePath = localServer + folderPath + file;

    return filePath;
}