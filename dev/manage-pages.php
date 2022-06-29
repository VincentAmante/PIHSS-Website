<?php
    include "./assets/functions/header.php";

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
            if (unlink($article['img'])){
                echo 'File deleted successfully' . '<br>';
            }
            else {
                echo 'File not deleted';
            }
        
            $sql = "DELETE FROM articles WHERE id='$articleId'";
        
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully" . '<br>';
              } else {
                echo "Error deleting record: " . $conn->error . '<br>';
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
                <h1>Publications</h1>
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
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </script>
</body>
</html>