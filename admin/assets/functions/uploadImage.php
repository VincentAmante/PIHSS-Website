<?php
    function uploadImage($directory, $imgName){
                    // Directory = Where image will end up when uploaded in the directory
                    $imgDirectory = "./assets/gallery-thumbnails/";
                    $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
                    $imgName = $imgDirectory . uniqid() .basename($imgName);
        
                    if($_FILES['gallery-image']['size'] > 10000000000){
                        echo "FILE TOO LARGE";
                        $imgValid = false;
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
                        $imgValid = false;
                    }
        
        
                    if ($imgValid){
                        if (move_uploaded_file($_FILES['gallery-image']['tmp_name'], "../../" . $imgName)){
                            
                        }
                        else {
                            // Img failed
                            $imgValid = false;
                            exit();
                        }
                    }
      if ($imgName != ""){
 
        }
    }
?>