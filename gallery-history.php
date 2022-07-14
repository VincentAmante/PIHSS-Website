<?php
include "./admin/assets/functions/connect.php";
$galleryId = $_GET['id'];

if ($conn->connect_error) {
  die('Connection Failure : ' + $conn->connect_error);
} else {
  $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
  $gallery = mysqli_fetch_assoc($galleryQuery);

  $galleryImages = json_decode($gallery['images']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gallery - Pakistan Islamia Higher Secondary School</title>

  <link rel="stylesheet" href="./assets/css/global.css" />
  <link rel="stylesheet" href="./assets/css/gallery.css" />
</head>

<body>
  <!-- Header -->
  <?php include('./assets/php/header.php') ?>

  <main>
    <!-- Overview -->
    <section id="gallery-banner" class="subpage-banner">
      <div class="banner-container">
        <h1><?php echo $gallery['title'] ?></h1>
      </div>
    </section>

    <!-- Navigation Breadcrumbs -->
    <div class="nav-breadcrumbs">
      <ul>
        <li><a href="./index.php">HOME</a></li>
        <li><a href="./gallery.php">GALLERY</a></li>
        <li><a href="javascript:window.location.reload(true)"><?php echo $gallery['title'] ?></a></li>
      </ul>
    </div>

    <!-- Gallery Overview -->
    <section class="gallery-overview">
      <div class="content">
        <div class="h1-border">
          <span></span>
          <h1><?php echo $gallery['title'] ?></h1>
        </div>
        <p>
          <?php echo $gallery['description'] ?>
        </p>
      </div>
    </section>

    <!-- Gallery Content -->
    <section class="container custom-scrollbar">
      <?php
      if ($galleryImages != null) :
        foreach ($galleryImages as $index => $image) : ?>
          <div class="grid-item">
            <div class="item-image section-image">
              <img class="lightbox-enabled" src="<?php echo $image->path ?>" data-imagesrc="<?php echo $image->path ?>" alt="insert desc" />
            </div>
          </div>
      <?php
        endforeach;
      endif; ?>
    </section>

    <!-- Modal/Lightbox -->
    <div id="myModal" class="modal">
      <!-- Modal Header -->
      <div class="modal-header">
        <div id="slide-number" class="number-text"></div>

        <div class="modal-header-icons">
          <i id="zoom-out" class="fa-solid fa-magnifying-glass-minus fa-xl"></i>
          <i id="zoom-in" class="fa-solid fa-magnifying-glass-plus fa-xl"></i>
          <a id="download" href="#" download><i class="fa-solid fa-download fa-xl"></i></a>
          <i id="close" class="fa-solid fa-xmark fa-2xl"></i>
        </div>
      </div>

      <!-- Modal Content -->
      <div class="modal-content">
        <!-- Previous Slide -->
        <i id="prev" class="lightbox-btn fa-solid fa-arrow-left-long fa-2xl"></i>

        <!-- Slide Container -->
        <div class="slide-container">
          <div draggable class="lightbox-slide">
            <img class="lightbox-image" src="" data-imagesrc="" />
          </div>
        </div>

        <!-- Next Slide -->
        <i id="next" class="lightbox-btn fa-solid fa-arrow-right-long fa-2xl"></i>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include('./assets/php/footer.php') ?>

  <!-- Global script -->
  <script src="./assets/js/global-scripts.js"></script>

  <!-- Lightbox script -->
  <script src="./assets/js/gallery-scripts.js"></script>
</body>

</html>