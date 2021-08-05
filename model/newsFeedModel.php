<?php
class newsFeed{
    public $feedId;
    public $feedTitle;
    public $feedArticle;
    public $feedUserId;
    public $authorFirstName;
    public $authorLastName;
    public $feedDate;
    
    
    public $feedImageIdArray = [];
    public $feedImageNameArray = [];
    
    
    function __construct($feedData){
        $this->feedId = isset($feedData['feed_id']) ? escapeSQLString($feedData['feed_id']) : 0;
        $this->feedTitle = isset($feedData['feed_title']) ? escapeSQLString($feedData['feed_title']) : "";
        $this->feedArticle = isset($feedData['article']) ? escapeSQLString($feedData['article']) : "";
        $this->feedUserId = isset($feedData['user_id']) ? escapeSQLString($feedData['user_id']) : 0;
        $this->authorFirstName = isset($feedData['first_name']) ? escapeSQLString($feedData['first_name']) : "";
        $this->authorLastName = isset($feedData['last_name']) ? escapeSQLString($feedData['last_name']) : "";
        $this->feedDate = isset($feedData['created_date']) ? escapeSQLString($feedData['created_date']) : 0;
        
        
        
        $feedPictures = $_FILES['files']['name'] ? $_FILES['files']['name']: [];
        $feedImageIds = isset($feedData['feed_images_id']) && $feedData['feed_images_id'] != null ? $feedData['feed_images_id'] : [];
        $feedImageIds = json_decode($feedImageIds, JSON_UNESCAPED_SLASHES);

        $fileData = parseFileData($feedPictures, $feedImageIds);
        $this->feedImageIdArray = $fileData['fileIds'] != null ? $fileData['fileIds'] : [];
        $this->feedImageNameArray = $fileData['fileName'] != null ? $fileData['fileName'] : [];
    }
    
}

?>