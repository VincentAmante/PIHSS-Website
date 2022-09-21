<?php
    include "./assets/functions/header.php";
    include "./assets/functions/delete-gallery.php";

    // Handles article deletion
    if (isset($_GET['delete-article'])){

        // ID to delete
        $articleId = $_GET['delete-article'];

        // Connects and acquires article
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $articleQuery = $conn->query("SELECT * from articles WHERE id='$articleId'");
            
            $article = mysqli_fetch_assoc($articleQuery);
        }  

        if ($article != NULL){

            // Deletes thumbnail
            if (unlink('../' . $ARTICLE_IMG_DIR . $article['img'])){
                // Article deleted
            }
            $sql = "DELETE FROM articles WHERE id='$articleId'";
            if ($conn->query($sql) === TRUE) {
                // echo "Record deleted successfully" . '<br>';
            }
        }
    }

    // Handles gallery deletion
    if (isset($_GET['delete-gallery'])){
        $galleryId = $_GET['delete-gallery'];
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
            $gallery = mysqli_fetch_assoc($galleryQuery);
        }

        if ($gallery != NULL){
            // Deletes folder and contents
            $deleteSuccessful = removeFolder('gallery-folders', $gallery['folderName']);

            if ($deleteSuccessful){
                if (!$gallery['isActivity']){
                    if (!unlink(getPathToRoot() .  $GALLERY_THUMBNAILS_DIR . $gallery['thumbnail'])){
                        // Unlink failed
                    }
                }
                $sql = "DELETE FROM galleries WHERE id='$galleryId'";
                if ($conn->query($sql) === TRUE) {
                    // echo "Record deleted successfully" . '<br>';
                }
            }
        }
    }

    // Handles registration deletion
    if (isset($_GET['delete-registration'])){
        $registrationId = $_GET['delete-registration'];

        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $registrationQuery = $conn->query("SELECT * from registrations WHERE id='$registrationId'");
            $result = mysqli_fetch_assoc($registrationQuery);
        }

        if ($result != NULL){
            $deleteSuccessful = removeFolder('registration-forms', $registrationId . '_' . $result['studentName']);

            $sql = "DELETE FROM registrations WHERE id='$registrationId'";
            
            if ($conn->query($sql) === TRUE) {
                // echo "Record deleted successfully" . '<br>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Manager</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="./assets/styles/manage-pages.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
    <main>

        <!-- Articles -->
        <section id='articles'>
            <div class="section-container">
                <h1>Articles</h1>
                <table class="table-simple">
                    <thead>
                        <tr class="row-item">
                            <th>Title</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="articles-collection">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <a href="./add-article.php">Add Article</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <!-- Galleries -->
        <section id='galleries'>
            <div class="section-container">
                <h1>Galleries</h1>
                <table class="table-simple">
                    <thead>
                        <tr class="row-item">
                            <th>Title</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="galleries-collection">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <a href="./add-gallery.php">Add Gallery</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <!-- Activities -->
        <section id='activities'>
            <div class="section-container">
                <h1>Co-Curricular Activities</h1>
                <table class="table-simple">
                    <thead>
                        <tr class="row-item">
                            <th>Title</th>
                            <th>Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="activities-collection">

                    </tbody>  
                    <tfoot>
                        <tr>
                            <th>
                                <a href="./add-activity.php">Add Gallery</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <!-- Registration Form Submissions -->
        <section id='registrations-container'>
            <div class="section-container">    
                <h1>Registration Form Submissions</h1>
                <table id="registrations-list" class="data-table-display">
                    <thead>
                        <tr class="row-item">
                            <th>Name</th>
                            <th>Class</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="registrations-collection">

                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./assets/functions/get-article-list.php",
                dataType: "html",
                success: (data) => {
                    $('#articles-collection').html(data);
                }
            })

            $.ajax({
                type: "GET",
                url: "./assets/functions/get-galleries-list.php",
                dataType: "html",
                success: (data) => {
                    $('#galleries-collection').html(data);
                }
            })

            $.ajax({
                type: "GET",
                url: "./assets/functions/get-activities-list.php",
                dataType: "html",
                success: (data) => {
                    $('#activities-collection').html(data);
                }
            })

            $.ajax({
                type: "GET",
                url: "./assets/functions/get-registrations-list.php",
                dataType: "html",
                success: (data) => {
                    $('#registrations-collection').html(data);
                }
            })
        });
    </script>
</body>
</html>