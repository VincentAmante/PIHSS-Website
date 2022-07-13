<?php

    /**
     * Uploads an image to the website's files, ensures it is valid to upload first
     */
    function uploadImage($imgDirectory, $imgName, $getImgFrom, $index=0, $inAssets=false){
        $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
        $imgName = $imgDirectory . uniqid() .basename($imgName);
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