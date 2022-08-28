<?php
    /**
     * Converts string to slug
     */
    function slug($z){
        $z = strtolower($z);
        $z = preg_replace('/[^a-z0-9 - .]+/', '', $z);
        $z = str_replace(' ', '-', $z);
        return trim($z, '-');
    }

    class ImageResult {
        public $isUploaded = true;
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
     * Uploads an image to the website's files, ensures it is valid to upload first
     */
    function uploadImage($imgDirectory, $imgName, $getImgFrom, $index=0, $inAssets=false){
        $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
        $imgName = $imgDirectory . uniqid() .basename(slug($imgName));
        $imageValid = true;
        $MAX_FILE_SIZE = 10000000000;

        if ($index != -1) {
            if($_FILES[$getImgFrom]['size'][$index] > $MAX_FILE_SIZE){
                $imageValid = false;
            }
        }
        else {
            if($_FILES[$getImgFrom]['size'] > $MAX_FILE_SIZE){
                $imageValid = false;
            }
        }
        

        // Valid image types
        switch(strtolower($imgType)){
            case 'jpeg':
            case 'png':
            case 'jpg':
            case 'jfif':
            case 'gif':
            break;
            default:
            echo 'Invalid filetype';
            $imageValid = false;
        }

        $addition = ($inAssets) ? '../../../' : '../';

        if ($imageValid){
            if ($index != -1) {    
                if (move_uploaded_file($_FILES[$getImgFrom]['tmp_name'][$index], $addition . $imgName)){
                    // Returns image name on successful upload
                    return $imgName;
                } else {
                    return false;
                }
            }
            else {
                if (move_uploaded_file($_FILES[$getImgFrom]['tmp_name'], $addition . $imgName)){
                    // Returns image name on successful upload
                    return $imgName;
                } else {
                    return false;
                }
            }
        }
        else {
            return false;
        }
    }

    // Dupilcate copy, for improved functionality
    function uploadImage__DEV(string $imgDirectory, string $imgName, string $getImgFrom, int $index=0, int $folderExits = 1){
        $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
        $imgName = $imgDirectory . uniqid() .basename(slug($imgName));
        $imageValid = true;
        $MAX_FILE_SIZE = 10000000000;

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
            break;
            default:
            $imageValid = false;
            return new ImageResult(false, "Invalid filetype! Currently accepting one of the following: [jpeg, jpg, png, jfif, gif]");
        }

        // Repeats folder exits
        $addition = str_repeat('../', $folderExits);

        if ($imageValid){
            if ($index != -1) {    
                if (move_uploaded_file($_FILES[$getImgFrom]['tmp_name'][$index], $addition . $imgName)){
                    // Returns image name on successful upload
                    return new ImageResult(true, $imgName);
                } else {
                    return new ImageResult(false, "Image could not upload successfully!");
                }
            }
            else {
                if (move_uploaded_file($_FILES[$getImgFrom]['tmp_name'], $addition . $imgName)){
                    // Returns image name on successful upload
                    return new ImageResult(true, $imgName);
                } else {
                    return new ImageResult(false, "Image could not upload successfully!");
                }
            }
        }
        else {
            return new ImageResult(false, "Image was not considered valid!");
        }
    }

    function deleteImages(&$files, $deletionEntries){
        foreach ($deletionEntries as $deletionIndex => $entry) {
            foreach ($files as $galleryIndex => $record){
                $imgPath = get_object_vars($record)['path'];
                if ($imgPath == $entry){
                    array_splice($files, $galleryIndex, 1);
                    // Deletes image from folder
                    if (unlink('../' . $imgPath)){
                        // Deletion successful
                    }
                    else {
                    }
                }
            }
        }
    }
?>