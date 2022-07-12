<!-- 
    TODO: Replace images and text
    TODO: Fill the alt of images with image descriptions
    TODO: Implement custom scrollbar
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery - Pakistan Islamia Higher Secondary School</title>

    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/gallery.css" />
    <link rel="shortcut icon" href="./assets/images/global/logo_small.png" type="image/x-icon" />
</head>

<body>
    <!-- Header -->
    <?php include('./assets/php/header.php')?>

    <main>
        <!-- Banner -->
        <section id="gallery-banner" class="subpage-banner">
            <div class="banner-container">
                <h1>Gallery</h1>
            </div>
        </section>

        <!-- Navigation Breadcrumbs -->
        <div id="nav-breadcrumbs" class="nav-breadcrumbs">
            <ul>
                <li><a href="./index.html">HOME</a></li>
                <li><a href="javascript:window.location.reload(true)">GALLERY</a></li>
            </ul>
        </div>

        <!-- Overview -->
        <section class="gallery-overview">
            <div class="content">
                <div class="h1-border">
                    <span></span>
                    <h1>Our Gallery</h1>
                </div>
            </div>
        </section>

        <!-- TODO: Add vertical progress indicator -->
        <!-- Scroll Progress Indicator -->
        <!-- <div class="progress-indicator" id="progress-indicator"></div> -->

        <!-- ** Majority of the gallery sub-pages are replaced with placeholder images and text  -->
        <!-- Image Gallery -->
        <section class="container custom-scrollbar" id="gallery-pages">
            
        </section>
    </main>
    
    <!-- Footer -->
    <?php include('./assets/php/footer.php')?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./admin/assets/functions/get-galleries.php",
                dataType: "html",
                success: (data) => {
                    $('#gallery-pages').html(data);
                }
            })
        });
    </script>
    
    <script src="./assets/js/global-scripts.js"></script>
</body>
</html>