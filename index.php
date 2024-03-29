<!DOCTYPE html>

<!-- Landing Page -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Pakistan Islamia Higher Secondary School</title>

    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="shortcut icon" href="./assets/images/global/logo_small.png" type="image/x-icon" />
</head>

<body>
    <!-- Header -->
    <?php include('./assets/php/header.php') ?>

    <main>
        <!-- Hero Banner -->
        <section class="hero-banner">
            <video autoplay muted loop>
                <source src="./assets/videos/hero.mp4" type="video/mp4">
            </video>
            <div class="video-container">

            </div>
            <div class="hero-banner-container">
                <img class="hero-logo" src="./assets/images/global/logo_white.png">
                <div class="hero-school-name">
                    <h2>Pakistan Islamia</h2>
                    <p>Higher Secondary School</p>
                </div>
                <div class="hero-school-info">
                    <h2>Four walls and a future inside</h2>
                    <p>Established in 1974 Pakistan Islamia Higher Secondary School Sharjah, has provided quality education to the children of UAE.</p>
                </div>
            </div>
        </section> <!-- .hero-banner -->

        <!-- About Us -->
        <section id="about-us" class="about-us">
            <div class="about-us-content">
                <div class="stripe"></div>
                <div class="about-us-text">
                    <h1>About Us</h1>
                    <p>
                        We at Pakistan Islamia Higher Secondary School are proud of catering to the educational needs of the Pakistani community.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis non nulla eos? Ad et eos tenetur dolorem aut voluptas, minima, ipsa dolorum nulla veniam explicabo facilis earum laudantium possimus ipsum perferendis maxime animi iusto sed eius? Tenetur deserunt, nemo officiis illo eaque ipsa? Adipisci odio earum aspernatur dolorem debitis alias!
                    </p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi, quibusdam quisquam impedit quas, tempora sint, maiores et inventore laudantium autem obcaecati. Praesentium laboriosam ratione odit sint non provident laudantium doloremque nobis in. Iste architecto nihil quis, officia quam distinctio quas.
                    </p>
                </div> <!-- about-us-text -->


                <!-- Image  -->
                <div class="about-us-img">
                    <img src="./assets/images/general/about-us.jpg" alt="PIHSS school building">
                    <div class="about-us-statblock">
                        <div class="stats">
                            <p id="building-count" data-count="4" data-unit="" class="number"></p>
                            <p id="classroom-count" data-count="72" data-unit="" class="number"></p>
                            <p id="employee-count" data-count="1800" data-unit="" class="number"></p>
                            <p id="alumni-count" data-count="1900" data-unit="+" class="number"></p>
                        </div>

                        <div class="labels">
                            <p class="label">Buildings</p>
                            <p class="label">Classrooms</p>
                            <p class="label">Employees</p>
                            <p class="label">Alumni</p>
                        </div>
                    </div> <!-- .about-us-stat-block -->
                </div> <!-- .about-us-img -->
            </div> <!-- .about-us-content -->
        </section> <!-- .about-us -->

        <!-- More Info -->
        <section class="more-info">


            <div class="more-info-text">
                <img class="more-info-comma" src="./assets/icons/comma.svg" alt="">
                <p>
                    Vitae auctor eu augue ut lectus arcu. Auctor augue mauris augue neque gravida in fermentum et sollicitudin. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Aliquam etiam erat velit scelerisque in. Pharetra vel turpis nunc eget lorem dolor sed viverra ipsum. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est.
                </p>
                <p>
                    Maecenas sed enim ut sem viverra aliquet eget. Urna et pharetra pharetra massa massa ultricies. Rutrum quisque non tellus orci ac auctor. Sollicitudin nibh sit amet commodo nulla facilisi. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus.
                </p>
            </div> <!-- .more-info-text -->

            <!-- Carousel -->
            <div class="more-info-slideshow">
                <img class="more-info-comma" src="./assets/icons/comma.svg" alt="">
                <div class="selection">
                    <div class="slider" id="more-info-selection">
                        <div class="card-wrapper">
                            <a class="card" href="./about-us.php">

                                <div class="card-anchor" id="mi-slider-about-us"></div>
                                <div class="card-image">
                                    <div>
                                        <img src="./assets/images/general/principals-desk.jpg" alt="Front view of the school building" loading="lazy">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <span>From the Principal's Desk</span>
                                </div>
                            </a>
                        </div>

                        <div class="card-wrapper">
                            <a class="card" href="./about-us.php">

                                <div class="card-anchor" id="mi-slider-mission-vision"></div>
                                <div class="card-image">
                                    <div>
                                        <img src="./assets/images/general/mission-vision.jpg" alt="Close-up of a young student doing an activity in a classroom" loading="lazy">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <span>Mission and Vision</span>
                                </div>
                            </a>
                        </div>

                        <div class="card-wrapper">
                            <a class="card" href="./admissions.php#registration">
                                <div class="card-anchor" id="mi-slider-registration"></div>
                                <div class="card-image">
                                    <div>
                                        <img src="./assets/images/general/registration.jpg" alt="Parent standing outside the accounts office" loading="lazy">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <span>Registration</span>
                                </div>
                            </a>
                        </div>

                        <div class="card-wrapper">
                            <a class="card" href="./about-us.php">
                                <div class="card-anchor" id="mi-slider-other"></div>
                                <div class="card-image">
                                    <div>
                                        <img src="./assets/images/general/other-content.jpg" alt="School building with a 'UAE GOLDEN JUBILEE, SPIRIT OF THE UNION' banner" loading="lazy">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <span>Other Content</span>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="paginator">
                        <a id="paginator-1" class="paginator-item"></a>
                        <a id="paginator-2" class="paginator-item"></a>
                        <a id="paginator-3" class="paginator-item"></a>
                        <a id="paginator-4" class="paginator-item"></a>
                    </div>
                </div> <!-- .selection -->
            </div> <!-- .more-info-slideshow -->
        </section> <!-- .more-info -->

        <!-- Why PIHSS -->
        <section class="why-pihss">
            <div class="why-pihss-container">
                <div class="why-pihss-description">
                    <div class="content">
                        <h1>Why PIHSS?</h1>
                        <p>Tellus id interdum velit laoreet id donec ultrices. Nulla aliquet porttitor lacus luctus accumsan tortor posuere. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Sit amet dictum sit amet justo. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa.</p>
                        <p>Pellentesque adipiscing commodo elit at imperdiet dui accumsan sit.</p>
                    </div>
                    <div class="btn">
                        <div class="btn-wrapper">
                            <a href="./admissions.php">Enroll Now</a>
                        </div>
                    </div>
                </div>


                <div class="why-pihss-selection">

                    <!-- Button Left -->
                    <button class="slider-btn" id="wp-btn-left" type="button">
                        <div class="icon">
                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                            </svg>
                        </div>
                    </button>

                    <!-- Slider -->
                    <div class="why-pihss-slider" id="why-pihss-slider">
                        <div class="card-wrapper">
                            <div class="card">
                                <div class="color color-1"></div>
                                <div class="content">
                                    <h1>Facilities</h1>
                                    <p>Avail full-fledged facilities offered by our school.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-wrapper">
                            <div class="card">
                                <div class="color color-2"></div>
                                <div class="content">
                                    <h1>Professional Staff</h1>
                                    <p>Experience learning from our qualified and professional staff.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-wrapper">
                            <div class="card">
                                <div class="color color-3"></div>
                                <div class="content">
                                    <h1>Best Pakistani School</h1>
                                    <p>The best Pakistani community school.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card-wrapper">
                            <div class="card">
                                <div class="color color-4"></div>
                                <div class="content">
                                    <h1>Lorem Ipsum</h1>
                                    <p>Semper quis lectus nulla at volutpat diam ut.</p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- #why-pihss-slider -->

                    <!-- Button Right -->
                    <button class="slider-btn" id="wp-btn-right" type="button">
                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </section> <!-- .why-pihss -->

        <!-- Administrative Affairs -->
        <section class="administrative-affairs">

            <div class="aac-affairs-container">
                <h1>Administrative Affairs Committee (AAC)</h1>
                <div class="staff">

                    <!-- Button Left -->
                    <button class="slider-btn aac-btn-left" id="aac-btn-left" type="button">
                        <div class="icon">
                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                            </svg>
                        </div>
                    </button>

                    <!-- Slider -->
                    <div class="aac-slider-wrapper">
                        <ul class="aac-slider" id="aac-slider">
                            <li id="aac-1">
                                <div class="card">
                                    <img class="aac-image" src="https://dummyimage.com/400x600/b0b0b0/545454.png&text=Insert+Staff+Portrait">
                                    <div class="aac-person">
                                        <p class="name">Unknown</p>
                                    </div>
                                </div>
                            </li>
                            <li id="aac-2">
                                <div class="card">
                                    <img class="aac-image" src="https://dummyimage.com/400x600/b0b0b0/545454.png&text=Insert+Staff+Portrait">
                                    <div class="aac-person">
                                        <p class="name">Unknown</p>
                                    </div>
                                </div>
                            </li>
                            <li id="aac-3">
                                <div class="card">
                                    <img class="aac-image" src="https://dummyimage.com/400x600/b0b0b0/545454.png&text=Insert+Staff+Portrait">
                                    <div class="aac-person">
                                        <p class="name">Unknown</p>
                                    </div>
                                </div>
                            </li>
                            <li id="aac-4">
                                <div class="card">
                                    <img class="aac-image" src="https://dummyimage.com/400x600/b0b0b0/545454.png&text=Insert+Staff+Portrait">
                                    <div class="aac-person">
                                        <p class="name">Unknown</p>
                                    </div>
                                </div>
                            </li>
                            <li id="aac-5">
                                <div class="card">
                                    <img class="aac-image" src="https://dummyimage.com/400x600/b0b0b0/545454.png&text=Insert+Staff+Portrait">
                                    <div class="aac-person">
                                        <p class="name">Unknown</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Button Right -->
                    <button class="slider-btn aac-btn-right" id="aac-btn-right" type="button">
                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                        </svg>
                    </button>
                </div> <!-- .staff -->
            </div> <!-- .aac-affairs-container -->
        </section>


        <!-- News and Events -->
        <div id="news-and-events" class="news-and-events">
            <div class="news-and-events-container">
                <h1>News and Events</h1>
                <div class="nac-cards">

                    <!-- News -->
                    <div class="nac-events" id="nac-articles">
                        <!-- Content here is dynamically loaded -->
                    </div>

                    <!-- Upcoming Events -->
                    <div class="nac-upcoming-events">
                        <article>
                            <div class="article-image">
                                <img src="./assets/images/placeholders/DSC07465.jpg" alt="">
                            </div>
                            <div class="article-content">
                                <div class="content-wrapper">
                                    <div class="icon">
                                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M19,4H18V2H16V4H8V2H6V4H5C3.89,4 3,4.9 3,6V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V6A2,2 0 0,0 19,4M19,20H5V10H19V20M19,8H5V6H19V8M12,13H17V18H12V13Z" />
                                        </svg>
                                    </div>
                                    <h4>Upcoming Events</h4>
                                    <a href="./gallery.php#events" class="btn">View Details</a>
                                </div>
                            </div>
                        </article>
                    </div> <!-- .nac-upcoming-events -->
                </div> <!-- .nac-cards -->
            </div> <!-- .news-and-events-container -->
        </div> <!-- #news-and-events -->
    </main>

    <!-- Footer -->
    <?php include('./assets/php/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/global-scripts.js"></script>
    <script src="assets/js/index-scripts.js"></script>

    <!-- Acquires news articles -->
    <script>
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./admin/assets/functions/get-articles-gallery.php?articles-count=2",
                dataType: "html",
                success: (data) => {
                    $('#nac-articles').html(data);
                }
            })
        });
    </script>
</body>

</html>