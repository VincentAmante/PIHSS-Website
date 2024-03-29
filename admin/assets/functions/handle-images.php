<?php

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);

class ImageResult {
    public bool $isUploaded;
    public $name = "";
    public $error = "";

    /**
     * $resultingString = either the image name or the error
     */
    public function __construct(bool $isUploaded, string $resultingString)
    {
        $this->isUploaded = $isUploaded;
        if ($isUploaded){
            $this->name = $resultingString;
        }
        else {
            $this->error = $resultingString;
        }
    }
}

    /**
     * Converts string to slug
     */
    function slug(string $str){
        $str = strtolower($str);
        $str = preg_replace('/[^a-z0-9 - .]+/', '', $str);
        $str = str_replace(' ', '-', $str);
        return trim($str, '-');
    }

    /**
     * Uploads an image to the website's files, ensures it is valid to upload first
     */
    function uploadImage(string $imgDirectory, string $imgName, string $getImgFrom, int $index = -1){
        
        $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
        $imageValid = true;
        $MAX_FILE_SIZE = 30 * MB;
        if ($index != -1) {
            if($_FILES[$getImgFrom]['size'][$index] > $MAX_FILE_SIZE){
                $imageValid = false;
                return new ImageResult(false, "Image is too large!");
            }
        }
        else {
            if($_FILES[$getImgFrom]['size'] > $MAX_FILE_SIZE){
                $imageValid = false;
                return new ImageResult(false, "Image is too large!");
            }
        }
        

        // Valid image types
        switch(strtolower($imgType)){
            case 'jpeg':
            case 'png':
            case 'jpg':
            case 'jfif':
            case 'gif':
            case 'webp':
            break;
            default:
            $imageValid = false;
            return new ImageResult(false, "Invalid filetype! Currently accepting one of the following: [jpeg, jpg, png, jfif, gif, webp]");
        }

        // Unique name is provided along with file path
        $uniqueName = uniqid() . basename(slug($imgName));
        $imgPath = $imgDirectory . $uniqueName;

        if ($imageValid){
            if ($index != -1) {    
                if (move_uploaded_file($_FILES[$getImgFrom]['tmp_name'][$index], getPathToRoot() . $imgPath)){
                    // Returns image name on successful upload
                    return new ImageResult(true, $uniqueName);
                } else {
                    return new ImageResult(false, "Image could not upload successfully to database!");
                }
            }
            else {
                if (move_uploaded_file($_FILES[$getImgFrom]['tmp_name'], getPathToRoot() . $imgPath)){
                    // Returns image name on successful upload
                    return new ImageResult(true, $uniqueName);
                } else {
                    return new ImageResult(false, "Image could not upload successfully to database!");
                }
            }
        }
        else {
            return new ImageResult(false, "Image was not considered valid for unknown reasons!");
        }
    }

    function deleteImages(&$files, $deletionEntries, $imgPath){
        foreach ($deletionEntries as $deletionIndex => $entry) {
            foreach ($files as $galleryIndex => $record){
                $imgName = get_object_vars($record)['name'];
                if ($imgName == $entry){
                    array_splice($files, $galleryIndex, 1);
                    // Deletes image from folder
                    if (unlink(getPathToRoot() . $imgPath . $imgName)){
                        // Deletion successful
                    }
                    else {
                    }
                }
            }
        }
    }
?>