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
    <?php include('./assets/php/header.php') ?>

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
                <li><a href="./index.php">HOME</a></li>
                <li><a href="gallery.php#our-gallery">GALLERY</a></li>
                <li><a href="#" class="tab-breadcrumb"></a></li>
            </ul>
        </div>

        <!-- Overview -->
        <section class="gallery-overview">
            <div class="content main">
                <div id="overview"></div>

                <div class="internal-nav">
                    <div>
                        <h2>Gallery</h2>
                        <ul id="nav">
                            <li><a id="btn-our-gallery" class="tab-button" href="#our-gallery">Our Gallery</a></li>
                            <li><a id="btn-news" class="tab-button" href="#news">News</a></li>
                            <li><a id="btn-events" class="tab-button" href="#events">Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section id="content-wrapper">
            <div id="content"></div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include('./assets/php/footer.php') ?>

    <!-- Scripts -->
    <script src="assets/js/global-scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            loadContent();
        });

        $(window).on("hashchange", function() {
            loadContent();
        });

        function loadContent() {
            var page = location.hash.substring(1);
            console.log("page=" + page);
            $(".tab-breadcrumb").html(page);

            $.ajax({
                type: "GET",
                url: "./subpages/" + page + ".php",
                dataType: "html",
                success: (data) => {
                    var pageOverview = $("<div>").html(data).find("#overview");
                    var pageContent = $("<div>").html($(data).not("#overview"));

                    $("#overview").html(pageOverview);
                    $("#content").html(pageContent);
                },
            });
        }
    </script>
</body>

</html>