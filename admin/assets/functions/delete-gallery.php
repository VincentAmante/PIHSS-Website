<?php
    // Including the folder name helps ensure the wrong file is not deleted
    function removeFolder($folderName, $folderEntry) {

        // Safeguard against deleting the folder
        if ($folderEntry == null
        || $folderEntry == ""
        || $folderEntry == "."
        || $folderEntry == "./"
        || $folderEntry == "/"){
            return false;
        }

        // Array of folders safe to delete
        $safeDeletions = ['gallery-folders', 'registration-forms'];
        $isSafe = false;
        // Checks if deletion entry is among safe deletes
        foreach ($safeDeletions as $index => $validDeletionEntry) {
            if ($folderName == $validDeletionEntry){
                $isSafe = true;
            }
        }
        // Exits if unsafe
        if (!$isSafe){
            return false;
        }

        $dir = '..' 
        . DIRECTORY_SEPARATOR . 'assets' 
        . DIRECTORY_SEPARATOR . $folderName
        . DIRECTORY_SEPARATOR . $folderEntry;

        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it,
                    RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
        rmdir($dir);
        return true;
    }
?>