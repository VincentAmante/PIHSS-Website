<!-- 
    GALLERY
    TODO: Add other subpages once sections are finalized
    TODO: Add the rest of the images
    TODO: Adjust the links for all subpages

    LIGHTBOX
    TODO: Find a way to clean up the icons (remove weird white outline)
    TODO: Lower opacity of icons when it cant be used
    TODO: Allow swipe / touch / pinch gestures as input
    TODO: Allow zoom on double click, mousewheel
    TODO: Implement animations (zoom in when opened/closed, swiping when switching slides)

    BUGS
    - Pan behavior is awkward when grabbing an image multiple times
    - Active grabbing cursor not showing when dragging
    
    ? Are captions required for images in lightbox?
-->
<?php
    include "../dev/assets/functions/connect.php";
    $galleryId = $_GET['id'];

    if ($conn->connect_error){
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

    <link rel="stylesheet" href="../assets/css/global.css" />
    <link rel="stylesheet" href="../assets/css/gallery.css" />
  </head>
  <body>
    <header class="header top-header-up" id="header">
      <div class="header-content" id="header-content">
          <div class="top-header" id="top-header">
              <a class="logo-container" href="./index.php">    
                  <div class="header-logo">
                      <img src="../assets/images/global/logo_main.png" alt="Logo of the school">
                  </div>
                  <div class="header-title">
                      <h1>Pakistan Islamia</h1>
                      <h2>Higher Secondary School</h2>
                  </div>
              </a>
              <div class="header-contacts">
                  <a href="mailto:info@pihss-shj.com" class="contact">
                      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                      </svg>
                      <span>info@pihss-shj.com</span>
                  </a>
                  <a href="tel:+"href="tel:+" class="contact">
                      <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                      </svg>
                  <span >06-5670700 | 06-5670464</span>
                  </a>
                </div>
          </div>
          <nav class="nav" id="nav">        
              <ul class="nav-links">
                  <li class="nav-element"><a href="../index.php">Home</a></li>
                  <li class="nav-element"><a href="../about-us.html">About Us</a></li>
                  <li class="nav-element nav-sub-list"><a href="../our-school.html">Our School</a>
                      <ul>
                          <li><a href="../our-school.html#facilities">Facilities</a></li>
                          <li><a href="../our-school.html#co-curricular">Co-Curricular Activities</a></li>
                          <li><a href="../our-school.html#student-code">Student Code of Behaviour</a></li>
                      </ul>
                  </li>
                  <li class="nav-element"><a href="../admissions.html">Admissions</a></li>
                  <li class="nav-element"><a href="../gallery.html">Gallery</a></li>
                  <li class="nav-element nav-sub-list"><a href="">Login</a>
                    <ul>
                        <li><a href="https://orison.school/">Parents Portal</a></li>
                        <li><a href="https://orison.school/">Staff Portal</a></li>
                        <li><a href="http://mail.pihss-shj.com:2095/">Staff Email</a></li>
                    </ul></li>
                  <li class="nav-element"><a href="../contact-us.html">Contact Us</a></li>
              </ul>
          </nav>
      </div>
      <!-- Burger -->
      <div class="burger burger-alone" id="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
      </div>
  </header>
    <main>
      <!-- Overview -->
      <section id="gallery-banner" class="subpage-banner">
        <div class="banner-container">
          <h1>History of PIHSS</h1>
        </div>
      </section>

      <section class="gallery-overview">
        <div class="nav-breadcrumbs">
          <ul>
            <li><a href="../index.php">HOME</a></li>
            <li><a href="../gallery.html">GALLERY</a></li>
            <li>
              <a href="javascript:window.location.reload(true)"
                >HISTORY OF PIHSS</a
              >
            </li>
          </ul>
        </div>

        <div class="content">
          <div class="h1-border">
            <span></span>
            <h1><?php echo $gallery['title']?></h1>
          </div>
          <p>
            <?php echo $gallery['description']?>
          </p>
        </div>
      </section>

      <!-- Gallery Content -->
      <section class="container custom-scrollbar">
        
      <?php foreach($galleryImages as $index => $image):?>
        <div class="grid-item">
          <div class="item-image section-image">
            <img
              class="lightbox-enabled"
              src="<?php echo '../dev' . $image->path?>"
              data-imagesrc="<?php echo '../dev' . $image->path?>"
              alt="insert desc"
            />
          </div>
        </div>
      <?php endforeach;?>
      </section>

      <!-- Modal/Lightbox -->
      <div id="myModal" class="modal">
        <!-- Modal Header -->
        <div class="modal-header">
          <div id="slide-number" class="number-text"></div>

          <div class="modal-header-icons">
            <!-- TODO: Check if these load when uploaded -->
            <i id="zoom-out" class="fa-solid fa-magnifying-glass-minus fa-xl"></i>
            <i id="zoom-in" class="fa-solid fa-magnifying-glass-plus fa-xl"></i>
            <a id="download" href="#" download>
              <i class="fa-solid fa-download fa-xl"></i>
            </a>
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
              <img
                class="lightbox-image"
                src="../assets/images/gallery/history-1.png"
                data-imagesrc="../assets/images/gallery/history-1.png"
              />
            </div>
          </div>

          <!-- Next Slide -->
          <i id="next" class="lightbox-btn fa-solid fa-arrow-right-long fa-2xl"></i>
        </div>
      </div>
    </main>

    <footer>
      <!-- TODO: Finish this -->
      <div class="footer-info">
          <div class="footer-logo-container">    
              <div class="footer-logo">
                  <img src="../assets/images/global/logo_white.png" alt="Logo of the school">
              </div>
              <div class="footer-title">
                  <h1>Pakistan Islamia</h1>
                  <h2>Higher Secondary School</h2>
              </div>
          </div>
          <div class="footer-contacts">
              <ul>
                  <!-- TODO: Get contacts -->
                  <li> <span class="fa-li"><i class="fa-solid fa-location-dot"></i></span><a href="https://goo.gl/maps/5H9LAeGYbvQU86bU8">Al Ghubaiba Sharjah, UAE</a></li>
                  <li> <span class="fa-li"><i class="fa-solid fa-phone"></i></span> <a href="tel:+">06-5670700 | 06-5670464</a></li>
                  <li> <span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:info@pihss-shj.com">info@pihss-shj.com</a></li>
              </ul>
          </div>
      </div>
     
      <div class="footer-nav">
          <div class="footer-nav-admissions">
              <h2>Admissions</h2>
              <ul>
                  <li><a href="./admissions.html">Requirements</a></li>
                  <li><a href="./admissions.html">Fee Structure</a></li>
                  <li><a href="./admissions.html">Registration</a></li>
              </ul>
          </div>
          <div class="footer-nav-quick-links">
              <h2>Quick Links</h2>
              <ul>
                  <li><a href="./contact-us.html">Contact Us</a></li>
                  <li><a href="./about-us.html">Co-Curricular</a></li>
                  <li><a href="./about-us.html">Student Code of Behaviour</a></li>
                  <li><a href="">School Leaving Certificate</a></li>
              </ul>
          </div>
      </div>
      <div class="footer-contact-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7211.843122839369!2d55.414977!3d25.340413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29ab65796253f180!2sPakistan%20Islamia%20Secondary%20School!5e0!3m2!1sen!2sae!4v1645859780769!5m2!1sen!2sae"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
  </footer>

    <!-- Global script -->
    <script src="../assets/js/global-scripts.js"></script>

    <!-- Lightbox script -->
    <script src="../assets/js/gallery-scripts.js"></script>
  </body>
</html>
