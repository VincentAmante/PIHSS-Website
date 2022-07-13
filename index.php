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
    <?php include('./assets/php/header.php')?>

    <main>
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
                    <h2>Four Walls and a Future Inside</h2>
                    <p>Established in 1974 Pakistan Islamia Higher Secondary School Sharjah, has provided quality education to the children of UAE.</p>
                </div>
            </div>
        </section>
        
        <section class="about-us">
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
                </div>

                
                <!-- Image  -->
                <div class="about-us-img">
                    <img src="./assets/images/placeholders/group-students.jpg" alt="">
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
                    </div>
                </div>     
            </div>
        </section>

        <section class="more-info">
            <div class="more-info-text">
                <img class="more-info-comma" src="./assets/icons/comma.svg" alt="">
                <p>
                    Vitae auctor eu augue ut lectus arcu. Auctor augue mauris augue neque gravida in fermentum et sollicitudin. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Aliquam etiam erat velit scelerisque in. Pharetra vel turpis nunc eget lorem dolor sed viverra ipsum. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. 
                </p>
                <p>
                    Maecenas sed enim ut sem viverra aliquet eget. Urna et pharetra pharetra massa massa ultricies. Rutrum quisque non tellus orci ac auctor. Sollicitudin nibh sit amet commodo nulla facilisi. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus.
                </p>
            </div>
            <div class="more-info-slideshow">
                <img class="more-info-comma" src="./assets/icons/comma.svg" alt="">
                <div class="selection">
                    <div class="slider" id="more-info-selection">
                        <div class="card-wrapper" >
                            <a class="card" href="./about-us.php">
                                
                            <div class="card-anchor"  id="mi-slider-about-us"></div>
                                <div class="card-image">
                                    <div>
                                        <img src="./assets/images/placeholders/staff_1.jpg" alt="" loading="lazy">
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
                                        <img src="./assets/images/placeholders/mission-vision-1.jpg" alt="" loading="lazy">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <span>Mission and Vision</span>
                                </div>
                            </a>
                        </div>
                        <div class="card-wrapper">
                            <a class="card" href="./about-us.php">
                            <div class="card-anchor" id="mi-slider-registration"></div>
                                <div class="card-image">
                                    <div>
                                        <img src="./assets/images/placeholders/desk-books.jpg" alt="" loading="lazy">
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
                                        <img src="./assets/images/placeholders/whiteboard.jpg" alt="" loading="lazy">
                                    </div>
                                </div>
                                <div class="card-text">
                                    <span>Other Content</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- TODO: Reposition where the anchor tags go so the clicks are smooth -->
                    <div class="paginator">
                        <a id="paginator-1" class="paginator-item" ></a>
                        <a id="paginator-2" class="paginator-item"></a>
                        <a id="paginator-3" class="paginator-item"></a>
                        <a id="paginator-4" class="paginator-item" ></a>
                    </div>
                </div>
            </div>
        </section>

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
                <!-- TODO: Have a better name for this -->
                <div class="why-pihss-selection">
                    <button class="slider-btn" id="wp-btn-left" type="button">
                        <div class="icon">
                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                            </svg>
                        </div>
                    </button>
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
                    </div>
                    <button class="slider-btn" id="wp-btn-right" type="button">
                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <section class="administrative-affairs">
            <div class="aac-affairs-container">
                <h1>Administrative Affairs Committee (AAC)</h1>
                <div class="staff">
                    <button class="slider-btn aac-btn-left" id="aac-btn-left" type="button">
                        <div class="icon">
                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
                            </svg>
                        </div>
                    </button>
                    <div class="aac-slider-wrapper">
                        <ul class="aac-slider" id="aac-slider">
                            <li id="aac-1">
                                <div class="card">    
                                    <img class="aac-image" src="./assets/images/placeholders/staff_5_mini.jpg">
                                    <div class="aac-person"><p class="name">Mr. Hamid Sultan Hamid Al Abdouli</p><p>Managing Director / Chairman <abbr title="Administrative Affairs Committee">AAC</abbr></p></div>
                                </div>
                            </li>
                            <li id="aac-2">
                                <div class="card">    
                                    <img class="aac-image" src="./assets/images/placeholders/staff_2.jpg">
                                    <div class="aac-person"><p class="name">Mr. Ebrahim Tily</p></div>
                                </div>
                            </li>
                            <li id="aac-3">
                                <div class="card">    
                                    <img class="aac-image" src="./assets/images/placeholders/staff_6.jpg">
                                    <div class="aac-person"><p class="name">Mr. Farooq Ahmed</p></div>
                                </div>
                            </li>
                            <li id="aac-4">
                                <div class="card">    
                                    <img class="aac-image" src="./assets/images/placeholders/staff_3.jpg">
                                    <div class="aac-person"><p class="name">Mr. Mohammad Amin Tariq</p></div>
                                </div>
                            </li>
                            <li id="aac-5">
                                <div class="card">    
                                    <img class="aac-image" src="./assets/images/placeholders/mission-vision-0.jpg">
                                    <div class="aac-person"><p class="name">Mr. Gulzar Rana</p></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button class="slider-btn aac-btn-right" id="aac-btn-right" type="button">
                        <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                        </svg>
                    </button>
                </div>
                <!-- I have a feeling this would require images, so I added it -->
            </div>
        </section>
        
        <!-- TODO: Figure out how this will operate -->
        <div id="news-and-events" class="news-and-events">
            <div class="news-and-events-container">
                <h1>News and Events</h1>
                <div class="nac-cards">
                    <div class="nac-events">
                        <article>
                            <a href="./news-article.php">
                                <div class="article-image">
                                    <img src="./assets/images/placeholders/DSC07512.jpg" alt="">
                                </div>
                                <div class="article-content">
                                    <div class="content-wrapper">
                                        <div class="article-text">
                                            <p>Lorem ipsum dolor sit.</p>
                                            <p>Available Now</p>
                                        </div>
                                        <div class="news-btn">
                                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <article>
                            <a href="./news-article.php">
                                <div class="article-image">
                                    <img src="./assets/images/placeholders/DSC07402.jpg" alt="">
                                </div>
                                <div class="article-content">
                                    <div class="content-wrapper">
                                        <div class="article-text">
                                            <p>Lorem ipsum dolor sit.</p>
                                            <p>Available Now</p>
                                        </div>
                                        <div class="news-btn">
                                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
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
                                    <a href="./news-article.php" class="btn">View Details</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include('./assets/php/footer.php')?>
    <script src="assets/js/global-scripts.js"></script>
    <script src="assets/js/index-scripts.js"></script>
</body>
</html>