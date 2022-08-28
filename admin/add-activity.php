<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Admin - Activity Page Submission</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/add-article.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include './assets/functions/submit-activity.php'?>
    <main>
        <section>    
            <div class="form-wrapper" id="drop-area">
                <form class="admin-form" id="admin-form" action="./add-activity.php" method="POST" enctype="multipart/form-data">
                    <?php // Prevents resubmission on refresh
                    $rand = rand();
                    $_SESSION['rand'] = $rand;?>

                    <h1>Add Activity</h1>
                    <!-- Title -->
                    <div class="form-item">
                        <label for="gallery-title">Activity Title</label>
                        <input type="text" id="gallery-title" name="gallery-title" spellcheck="false" autocomplete="off" required placeholder="Activity Title">
                    </div>

                    <!-- Publishing Date -->
                    <div class="form-item">
                        <label for="gallery-creation-date">Publishing Date</label>
                        <input type="date" name="gallery-creation-date" required value="<?php echo date("Y-m-d")?>">
                    </div>

                    <!-- Description -->
                    <div class="form-item">
                        <label for="gallery-description">Description</label>
                        <div>
                            <input name="input-delta" type="hidden">
                            <input name="input-html" type="hidden">
                            <div class="editor-container" id="editor-container">
                            </div>                
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="form-item" id="gallery-view">
                            <label for="fileElem">Upload images to the gallery</label>
                            <p>You need at least 3 images for the activities section!</p>
                            <input type="file" 
                                accept="image/*" 
                                multiple name="gallery_images[]" 
                                id="fileElem" 
                                onchange="handleFiles(this.files)">
                        </div>

                        <h2>Image Additions</h2>
                        <div class="multiple-file-preview" id="gallery">

                        </div>
                    <input type="hidden" name="is-activity" value="true">

                    <!-- Form Buttons -->
                    <div class="form-item form-item-empty">
                        <div class="buttons">
                            <button class="form-button form-submit" name="add-gallery">Publish</button>
                            <button class="form-button form-reset" type="reset">Clear</button>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $rand; ?>" name="rand-check">
                </form> <!-- #admin-form -->
            </div> <!-- .form-wrapper -->
        </section>
    </main>

    <!-- Rich Text -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="./assets/scripts/rich-text.js"></script>

    <!-- For handling the form gallery (displaying, deletion, addition) -->
    <script src="../assets/js/file-uploader-multiple.js"></script>
    <script src="./assets/scripts/handle-form-gallery.js"></script>
</body>
</html>