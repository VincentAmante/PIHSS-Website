<!-- 
    OUR SCHOOL
    TODO: Confirm what method to use for short bgs
    TODO: Confirm method for switching content
    TODO: Add image sliders in facilities section
    TODO: Change nav links to radio input (for checked state)

    BUGS
    - Not sure if it's just on my end but sometimes the internal nav links can't be clicked on (particularly on desktop view)
    
    ? Are captions required for images in lightbox?
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Our School - Pakistan Islamia Higher Secondary School</title>

		<link rel="stylesheet" href="./assets/css/global.css" />
		<link rel="stylesheet" href="./assets/css/our-school.css" />
		<link
			rel="shortcut icon"
			href="./assets/images/global/logo_small.png"
			type="image/x-icon"
		/>
	</head>
	<body onload="selectionHandler(window.location.hash)">
    <!-- Header -->
    <?php include('./assets/php/header.php')?>
		<main>
			<!-- Banner -->
			<section id="our-school-banner" class="subpage-banner">
				<div class="banner-container">
					<h1>Our School</h1>
				</div>
			</section>

			<!-- Overview -->
			<section class="our-school-overview">
				<div id="nav-breadcrumbs" class="nav-breadcrumbs">
					<ul>
						<li><a href="./index.php">HOME</a></li>
						<li>
							<a href="our-school.php#facilities">OUR SCHOOL</a>
						</li>
						<li><a href="#" class="tab-breadcrumb"></a></li>
					</ul>
				</div>

				<div class="content">
					<div class="content-text">
						<div class="h1-border">
							<span></span>

							<!-- Headers based on which tab is selected -->
							<h1 class="tab-header" id="facilities-header">Facilities</h1>
							<h1 class="tab-header" id="co-curricular-header">
								Co-Curricular Activities
							</h1>
							<h1 class="tab-header" id="student-code-header">
								Student Code of Behavior
							</h1>
						</div>

						<!-- Overview based on which tab is selected -->
						<p class="tab-overview" id="facilities-overview">
							Lorem ipsum, dolor sit amet consectetur adipisicing elit.
							Molestiae mollitia accusamus delectus velit recusandae adipisci
							possimus voluptatem, ipsam laboriosam animi odit similique
							reprehenderit natus unde a eos? Nemo, dolorem sapiente!
						</p>
						<p class="tab-overview" id="co-curricular-overview">
							Co-Curricular activities are an essential part of education
							process. It enriches and broadens student’s mind and forms an
							integral part of the curriculum. The school is implementing
							activities/interactive based teaching strategies. It helps to
							develop an all-round personality of the students to face the
							challenges of the fast changing world. Experience and accolades
							gained through many of these activities help them during
							internships and other work programs.
						</p>
						<p class="tab-overview" id="student-code-overview"></p>
					</div>

					<div class="internal-nav">
						<div>
							<h2>Our School</h2>
							<ul>
								<li>
									<a id="btn-facilities" class="tab-button" href="#facilities"
										>Facilities</a
									>
								</li>
								<li>
									<a
										id="btn-co-curricular"
										class="tab-button"
										href="#co-curricular"
										>Co-Curricular Activities</a
									>
								</li>
								<li>
									<a
										id="btn-student-code"
										class="tab-button"
										href="#student-code"
										>Student Code of Behaviour</a
									>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<!-- <section>
        <div class="internal-nav">
          <div>
            <h2>Our School</h2>
            <ul>
              <li><a id="btn-facilities" class="tab-button" href="#facilities">Facilities</a></li>
              <li><a id="btn-co-curricular" class="tab-button" href="#co-curricular">Co-Curricular Activities</a></li>
              <li><a id="btn-student-code" class="tab-button" href="#student-code">Student Code of Behaviour</a></li>
            </ul>
          </div>
        </div>
      </section> -->

			<!-- Facilities -->
			<section class="tab-content" id="facilities">
				<div class="facilities-slideshow">
					<button class="slider-btn" id="wp-btn-left" type="button">
						<div class="icon">
							<svg style="width: 100%; height: 100%" viewBox="0 0 24 24">
								<path
									fill="currentColor"
									d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"
								/>
							</svg>
						</div>
					</button>

					<div class="facilities-slider" id="facilities-slider">
						<div class="card-wrapper">
							<div class="card">
								<img src="./assets/images/our-school/auditorium-1.png" alt="" />
								<div class="content">
									<h2>Auditorium</h2>
									<p>
										Commodious auditorium that can house more than 500 people;
										complete with a well-equipped and fully designed
										audio-visual system to showcase the students’ diverse
										talents
									</p>
								</div>
							</div>
						</div>
						<div class="card-wrapper">
							<div class="card">
								<img src="./assets/images/our-school/clinic-1.png" alt="" />
								<div class="content">
									<h2>Clinic</h2>
									<p>
										Two fully-equipped clinics with trained and experienced
										nurses guided by a qualified doctor to provide first-aid and
										basic health facilities to students. The clinic staff work
										consistently with up-to-date programmes from the UAE
										Ministry of Health.
									</p>
								</div>
							</div>
						</div>
						<div class="card-wrapper">
							<div class="card">
								<img
									src="./assets/images/our-school/junior-activities-1.png"
									alt=""
								/>
								<div class="content">
									<h2>Junior's Activities</h2>
									<p>
										Activity room with space to accommodate fun-filled and
										curiosity-centered learning. There is an art corner, audio
										visual area, play corner, and fairytale corner for the
										student to wander and hone their skills through interactive
										play and hands-on activities.
									</p>
								</div>
							</div>
						</div>
						<div class="card-wrapper">
							<div class="card">
								<img
									src="./assets/images/our-school/laboratories-1.png"
									alt=""
								/>
								<div class="content">
									<h2>Laboratories</h2>
									<p>
										Spacious and well-equipped Biology, Chemistry, Computer &
										Physics laboratories in the boys’ and girls’ sections, and a
										Home Economics laboratory in the girls’ section - all
										supervised by highly qualified science teachers and
										laboratory assistants.
									</p>
								</div>
							</div>
						</div>
						<div class="card-wrapper">
							<div class="card">
								<img src="./assets/images/our-school/libraries-1.png" alt="" />
								<div class="content">
									<h2>Libraries</h2>
									<p>
										A well-stocked library that boasts roughly 10,000 books on
										varied subjects, managed by qualified librarians. The school
										often sends groups of teachers to book fairs and add new
										books to the library’s collection to provide students with
										an assortment of reading choices.
									</p>
								</div>
							</div>
						</div>
						<div class="card-wrapper">
							<div class="card">
								<img src="./assets/images/our-school/sports-1.png" alt="" />
								<div class="content">
									<h2>Sports</h2>
									<p>
										Numerous sports facilities to help students learn and
										develop the concept of “teamwork” as young athletes. There
										are facilities for the boys’ and girls’ sections for
										Cricket, Football, Basketball, Badminton, and Volleyball.
									</p>
								</div>
							</div>
						</div>
						<div class="card-wrapper">
							<div class="card">
								<img src="./assets/images/our-school/transport-1.png" alt="" />
								<div class="content">
									<h2>Transport</h2>
									<p>
										The school’s own fleet of air-conditioned buses to provide
										safe and secure transportation.
									</p>
									<h3>NOTE:</h3>
									<ul>
										<li>
											Parents should escort the students to and from the bus
											stop.
										</li>
										<li>
											Parents should preferably choose a bus stop where a group
											of students are available.
										</li>
										<li>
											Parents having any complaint against the school transport
											can contact the transport in charge.
										</li>
										<li>
											The students will not be permitted to avail the school
											transport services under the following circumstances:
											<ol>
												<li>
													Persistent misbehaviour with the staff or students in
													bus
												</li>
												<li>Being habitually late.</li>
												<li>
													Intentionally damaging the school bus and other
													fixtures.
												</li>
												<li>
													Activities that may endanger the students in the bus.
												</li>
												<li>Defaulting in bus fee payment.</li>
											</ol>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<button class="slider-btn" id="wp-btn-right" type="button">
						<svg style="width: 100%; height: 100%" viewBox="0 0 24 24">
							<path
								fill="currentColor"
								d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"
							/>
						</svg>
					</button>
				</div>
			</section>

			<!-- Co-curricular Activities-->
			<section class="tab-content" id="co-curricular">
				<div class="co-curricular-list">
					<div class="activity-container">
						<div class="content">
							<div class="activity-heading">
								<h3 class="decorated"><span>Sandwich Competition</span></h3>
							</div>

							<div class="activity-images">
								<img src="./assets/images/gallery/sandwich-c-1.png" alt="" />
								<img src="./assets/images/gallery/sandwich-c-2.png" alt="" />
								<img src="./assets/images/gallery/sandwich-c-3.png" alt="" />

								<button>View More >></button>
							</div>
						</div>
					</div>

					<div class="activity-container">
						<div class="content">
							<div class="activity-heading">
								<h3 class="decorated"><span>Salad Competition</span></h3>
							</div>

							<div class="activity-images">
								<img src="./assets/images/gallery/salad-c-1.png" alt="" />
								<img src="./assets/images/gallery/salad-c-2.png" alt="" />
								<img src="./assets/images/gallery/salad-c-3.png" alt="" />

								<button>View More >></button>
							</div>
						</div>
					</div>
					<div class="activity-container">
						<div class="content">
							<div class="activity-heading">
								<h3 class="decorated">
									<span>Essay Writing Competition</span>
								</h3>
							</div>

							<div class="activity-images">
								<img src="https://source.unsplash.com/1600x900/?essay" alt="" />
								<img
									src="https://source.unsplash.com/1600x900/?person writing"
									alt=""
								/>
								<img src="https://source.unsplash.com/1600x900/?exam" alt="" />

								<button>View More >></button>
							</div>
						</div>
					</div>

					<div class="activity-container">
						<div class="content">
							<div class="activity-heading">
								<h3 class="decorated"><span>Drama Concert</span></h3>
							</div>

							<div class="activity-images">
								<img
									src="https://source.unsplash.com/1600x900/?concert"
									alt=""
								/>
								<img
									src="https://source.unsplash.com/1600x900/?theater"
									alt=""
								/>
								<img src="https://source.unsplash.com/1600x900/?actor" alt="" />

								<button>View More >></button>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Student Code of Behaviour -->
			<section class="tab-content" id="student-code">
				<p>
					It is important for parents and students to understand and abide by
					the school rules and regulations in order to maintain the school
					discipline. Our emphasis is upon rewarding positive behaviour.
				</p>
				<p>
					Parents and students are advised to carefully read and understand the
					following rules. Violation of these rules is likely to result in
					unpleasant consequences after consultation with the Ministry of
					Education.
				</p>

				<ol>
					<li>
						Failing to satisfy the requirements of local Ministry of Education /
						Federal Board of Intermediate and Secondary Education, Islamabad.
					</li>
					<li>Any act involving moral turpitude.</li>
					<li>
						Cheating / Stealing or making false statements or accusations.
					</li>
					<li>Willfully and deliberately damaging the school property.</li>
					<li>Rudeness to any member of the staff.</li>
					<li>Smoking.</li>
					<li>Irregular attendance in classes or unpunctuality.</li>
					<li>
						Parents should promptly report and explain absences and tardiness to
						the Vice Principal.
					</li>
					<li>Unclean and shabby appearances.</li>
					<li>Failure to pay the fee within the extended time limit.</li>
					<li>
						Bringing fire arms / knives or any other lethal weapon to the
						school.
					</li>
					<li>
						Bringing cosmetics / ornaments / toys which can cause disturbance.
					</li>
					<li>Mobile phones / electronic gadgets.</li>
					<li>
						Home work assigned must be completed in time and signed by the
						respective teachers.
					</li>
					<li>
						Lost or damaged library books and materials should be replaced
					</li>
				</ol>

				<h3>Note:</h3>

				<ul>
					<li>
						Offences under sub para 1, 2, 3, 4, 5 will be dealt with as per
						rules of Ministry of Education without reference to the parents.
					</li>
					<li>
						Any offence by a student against another student will be dealt with
						severity.
					</li>
					<li>
						Non compliance of the above stated student code of behaviour shall
						be stipulated for one week’s suspension as per Ministry of Education
						rules.
					</li>
					<li>
						Rustication shall always mean the loss of one academic year. The
						period of absence from the institution will, however, depend upon
						the time of the year when the penalty is imposed. The student may at
						the discretion of the Principal be permitted to rejoin the class in
						the same institute at the beginning of the next academic year.
					</li>
					<li>
						A student expelled from the institute shall not be re-admitted.
					</li>
				</ul>
			</section>

			<!-- <section>
        <div class="internal-nav">
          <div>
            <h2>Our School</h2>
            <ul>
              <li><a id="btn-facilities" class="tab-button" href="#facilities">Facilities</a></li>
              <li><a id="btn-co-curricular" class="tab-button" href="#co-curricular">Co-Curricular Activities</a></li>
              <li><a id="btn-student-code" class="tab-button" href="#student-code">Student Code of Behaviour</a></li>
            </ul>
          </div>
        </div>
      </section> -->
		</main>

    <!-- Footer -->
    <?php include('./assets/php/footer.php')?>

		<script src="assets/js/global-scripts.js"></script>
		<script src="assets/js/our-school-scripts.js"></script>
		<script src="assets/js/index-scripts.js"></script>
	</body>
</html>
