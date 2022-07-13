<?php
    include "./assets/functions/header.php";
    include "./assets/functions/delete-gallery.php";

    // Delete Article
    if (isset($_GET['delete-article'])){
        $articleId = $_GET['delete-article'];
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $articleQuery = $conn->query("SELECT * from articles WHERE id='$articleId'");
            
            $article = mysqli_fetch_assoc($articleQuery);
        }  

        if ($article != NULL){
            if (unlink('../' . $article['img'])){
            }
            else {
                echo 'File not deleted';
            }
        
            $sql = "DELETE FROM articles WHERE id='$articleId'";
        
            if ($conn->query($sql) === TRUE) {
                // echo "Record deleted successfully" . '<br>';
              } else {
                echo "Error deleting record: " . $conn->error . '<br>';
            }
        }
    }

    if (isset($_GET['delete-gallery'])){
        $galleryId = $_GET['delete-gallery'];
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
            $gallery = mysqli_fetch_assoc($galleryQuery);
        }

        if ($gallery != NULL){
            $deleteSuccessful = removeFolder('gallery-folders', $gallery['ID'] . '_' . $gallery['title']);

            if ($deleteSuccessful){
                if (!$gallery['isActivity']){
                    if (!unlink('../' . $gallery['thumbnail'])){
                        // Unlink failed
                    }
                }

                $sql = "DELETE FROM galleries WHERE id='$galleryId'";
            
                if ($conn->query($sql) === TRUE) {
                    // echo "Record deleted successfully" . '<br>';
                  } else {
                    echo "Error deleting record: " . $conn->error . '<br>';
                }
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
    <link rel="stylesheet" href="./assets/styles/manage-pages.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
    <main>
        <section>
            <div class="section-container">
                <h1>Articles</h1>
                <table>
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
        <section>
            <div class="section-container">
                <h1>Galleries</h1>
                <table>
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
        <section>
            <div class="section-container">
                <h1>Co-Curricular Activities</h1>
                <table>
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
        <section>
            <div class="section-container">    
                <table id="table_id" class="display">
                    <thead>
                        <tr class="row-item">
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                        </tr>
                        <tr>
                            <td>Row 2 Data 1</td>
                            <td>Row 2 Data 2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
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
        });
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./assets/functions/get-galleries-list.php",
                dataType: "html",
                success: (data) => {
                    $('#galleries-collection').html(data);
                }
            })
        });
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./assets/functions/get-activities-list.php",
                dataType: "html",
                success: (data) => {
                    $('#activities-collection').html(data);
                }
            })
        });
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
</body>
</html>