<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Details</title>

    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/news-article.css">
    <link rel="shortcut icon" href="./assets/images/global/logo_small.png" type="image/x-icon" />
</head>

<body>
    <!-- Header -->
    <?php include('./assets/php/header.php') ?>

    <main>
        <!-- Banner -->
        <section class="subpage-banner">
            <div class="banner-container">
                <h1>News Articles</h1>
            </div>
        </section>

        <!-- Navigation Breadcrumbs -->
        <div id="nav-breadcrumbs" class="nav-breadcrumbs">
            <ul>
                <li><a href="./index.php">HOME</a></li>
                <li><a href="./news-and-events.php">News and Events</a></li>
                <li><a href="javascript:window.location.reload(true)">Article</a></li>
            </ul>
        </div>

        <!-- Overview -->
        <section class="article-overview">
            <div class="h1-border">
                <span></span>
                <h1>News Details</h1>
            </div>
        </section>

        <!-- News Article -->
        <section class="article-viewer-wrapper">
            <div class="article-viewer">
                <div class="slider-btn" id="article-btn-left">
                    <div class="icon">
                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                        </svg>
                    </div>
                </div>
                <ul class="content" id="article-slider">

                </ul>
                <div class="slider-btn" id="article-btn-right">
                    <div class="icon">
                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include('./assets/php/footer.php') ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        <?php
        // If there is a get, gets that first
        $url = "./admin/assets/functions/get-article.php?";
        if(isset($_GET['id'])){
            $url = "./admin/assets/functions/get-article.php?id=" . $_GET['id'];
        }?>

        // Acquires article 
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "<?php echo $url?>",
                dataType: "html",
                success: (data) => {
                    $('#article-slider').html(data);
                    createCarousel('article-btn-left','article-btn-right','article-slider')
                }
            })
        });
    </script>
    <script src="./assets/js/global-scripts.js"></script>
    <script src="./assets/js/article-scripts.js"></script>
</body>

</html>