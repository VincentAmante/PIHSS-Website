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

        <!-- Overview -->
        <section id="gallery-banner" class="subpage-banner">
            <div class="banner-container">
                <h1>Gallery</h1>
            </div>
        </section>

        <section class="gallery-overview">
            <div id="nav-breadcrumbs" class="nav-breadcrumbs">
                <ul>
                    <li><a href="./index.html">HOME</a></li>
                    <li><a href="javascript:window.location.reload(true)">GALLERY</a></li>
                </ul>
            </div>

            <div class="content">
                <div class="h1-border">
                    <span></span>
                    <h1>Our Gallery</h1>
                </div>
            </div>
        </section>

        <!-- Image Gallery -->
        <section class="container custom-scrollbar">
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="assets/images/gallery/history-1.png" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>History of PIHSS</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="assets/images/gallery/national-day-2018-1.png" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>UAE National Day</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="assets/images/gallery/sandwich-c-1.png" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>Sandwich Competition</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="assets/images/gallery/salad-c-1.png" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>Salad Competition</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?running" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>Dubai Fitness 30X30</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?kids Sports" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>KG Sports Day</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?museum" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>EXPO 2020</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?auditorium" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>School Play</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?school bus" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>Field Trip</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?earth day" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>Earth Day</h2>
                    <p>DD/MM/YY</p>
                </div>
            </div>
            <div class="grid-item">
                <div class="item-image">
                    <a href="./gallery/gallery-history.html">
                        <img src="https://source.unsplash.com/1600x900/?student Council" alt="" />
                    </a>
                </div>
                <div class="item-text">
                    <h2>Student Council</h2>
                    <p>DD/MM/YY</p>
                </div>
        </section>
    </main>
    
    <!-- Footer -->
    <?php include('./assets/php/footer.php')?>

    <script src="assets/js/global-scripts.js"></script>
</body>

</html>