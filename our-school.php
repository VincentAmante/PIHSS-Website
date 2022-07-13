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

		<!-- Navigation Breadcrumbs -->
		<div id="nav-breadcrumbs" class="nav-breadcrumbs">
			<ul>
				<li><a href="./index.html">HOME</a></li>
				<li><a href="our-school.html#facilities">OUR SCHOOL</a></li>
				<li><a href="#" class="tab-breadcrumb"></a></li>
			</ul>
		</div>

		<!-- Overview -->
		<section class="our-school-overview">
			<div class="content">
				<div class="content-text">
					<div class="h1-border">
						<span></span>

						<!-- Headers based on which tab is selected -->
						<h1 class="tab-header active" id="facilities-header">
							Facilities
						</h1>
						<h1 class="tab-header" id="co-curricular-header">
							Co-Curricular Activities
						</h1>
						<h1 class="tab-header" id="study-programme-header">
							Study Programme
						</h1>
					</div>

					<!-- Overview based on which tab is selected -->
					<p class="tab-overview active" id="facilities-overview">
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
						internships and other work programs. <br><br>
						The aim of the curricular activities is to make the students mentally fit to develop a sense of
						competitive spirit, co-operation, leadership, diligence, punctuality, team spirit as well as to
						provide a backdrop for the development of their creative talents. Therefore, such activities
						have been integrated into the school calendar. These activities comprises of Essay Writing
						Competitions, Elocution and Debates, Quiz Competitions, Dramatics, Morning Assembly Programmes
						and Annual Sports to name a few.
					</p>
					<p class="tab-overview" id="study-programme-overview"></p>
				</div>

				<div class="internal-nav">
					<div>
						<h2>Our School</h2>
						<ul>
							<li>
								<a id="btn-facilities" class="tab-button active" href="#facilities">Facilities</a>
							</li>
							<li>
								<a id="btn-co-curricular" class="tab-button" href="#co-curricular">Co-Curricular
									Activities</a>
							</li>
							<li>
								<a id="btn-study-programme" class="tab-button active" href="#study-programme">Study
									Programme</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- Facilities -->
		<section class="tab-content active" id="facilities">

			<div class="slideshow-wrapper">
				<div class="facilities-slideshow">
					<div class="slider-btn" id="wp-btn-left" type="button">
						<div class="icon">
							<svg style="width: 100%; height: 100%" viewBox="0 0 24 24">
								<path fill="currentColor"
									d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" />
							</svg>
						</div>
					</div>

					<!-- ** Used placeholders for the slider images until the media is finalized -->

					<ul class="facilities-slider" id="facilities-slider">
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?food" alt="" />
								<div class="content">
									<h2>Canteen</h2>
									<p>
										It provides wholesome snacks and drinks in the most hygienic conditions. It
										offers a
										variety of nutritive food items at a reasonable price. Health and nutrition of
										every
										student is of prime concern. The quality of eatables is regularly supervised by
										a
										committee of teachers.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?medical clinic" alt="" />
								<div class="content">
									<h2>Medical Facility</h2>
									<p>
										There is a fully equipped clinic to provide first-aid and basic health
										facilities
										male and female to the students separately. Trained and experienced nurses are
										on
										duty all through the school hours. They work under the guidance of a full time
										qualified doctor at the school Clinic. The nurses coordinate with the Ministry
										of
										Health to implement various programmes devised by them. They are responsible to
										admit the student to the hospital in case of an emergency and update the parents
										about the health care of the child when necessary.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?school uniform" alt="" />
								<div class="content">
									<h2>Uniform Shop</h2>
									<p>
										A well stocked uniform shop is providing school & sports uniform.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?laboratory" alt="" />
								<div class="content">
									<h2>Laboratories</h2>
									<p>
										Spacious Physics, Chemistry, Biology, Computer and Home Economics laboratories
										in
										the Boys and Girls section are well equipped to meet the requirements of
										practicals
										for these subjects. Highly qualified science teachers and laboratory assistants
										supervise and guide the students in their practicals.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?library" alt="" />
								<div class="content">
									<h2>Libraries</h2>
									<p>
										No educational institution is complete without a good, well stocked library, nor
										can
										education be complete without inculcating healthy reading habits. The school has
										two
										well stocked, spacious, well lit and ventilated libraries which house about
										10,000
										books on varied subjects. Children have their individual preferences when it
										comes
										to reading. To ensure that every child gets to read what he likes the school
										sends
										group of teachers to Book Fairs to select titles which are added to the library
										after the necessary review of their appropriateness. The libraries are managed
										by
										qualified librarians.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?computer" alt="" />
								<div class="content">
									<h2>Audio - Visual Aids & Computer Lab</h2>
									<p>
										Well equipped computer labs are made accessible to the students in both the
										sections. Thus acquisition of knowledge and entertainment acquaint the young
										minds
										with modern technologies. Computer labs offer a lot of scope for all children to
										acquire hands - on learning experiences. Our computer laboratory is one of the
										best
										among Pakistani schools. Computer education begins from the junior section and
										goes
										up to class XII. The capacity of computer labs in both the wings has been
										considerably enhanced. Teachers and lab assistants are available to help
										students to
										learn and use computer extensively for their learning.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?sports" alt="" />
								<div class="content">
									<h2>Sports</h2>
									<p>
										Sports form an integral part of the education system. Sports play a pivotal role
										in
										the makeup of a young athlete. Participating in sports helps students to
										understand
										the meaning of the term 'team work'. Sports help to inculcate discipline. It
										helps
										the students to be active, healthy and strong. Sports facilities for cricket,
										football, basketball and volley ball are provided to the students in both the
										wings.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?auditorium" alt="" />
								<div class="content">
									<h2>Auditorium</h2>
									<p>
										The institute is equipped with the audio - visual auditorium facilities. It is a
										commodious auditorium with a capacity to accommodate more than 300 people. The
										hall
										stands witness to the blossoming of hidden talents. The auditorium has well
										equipped
										and fully designed light and sound systems.
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="card">
								<img src="https://source.unsplash.com/1600x900/?playground" alt="" />
								<div class="content">
									<h2>Junior Activity Room</h2>
									<p>
										An activity room is every child's favourite place and this spacious and well
										equipped room makes learning more fun filled and curiosity centered. The child
										is
										able to hone his adaptability skills through interactive play and hands on
										activities. Activity room comprises of art corner, audio visual area, play
										corner
										and fairy tale corner, where children can mesmerize themselves in the fantasy
										world.
										The concept of activity room is introduction of an innovative and life changing
										learning experience for the children.
									</p>
								</div>
							</div>
						</li>
					</ul>

					<div class="slider-btn" id="wp-btn-right" type="button">
						<svg style="width: 100%; height: 100%" viewBox="0 0 24 24">
							<path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
						</svg>
					</div>
				</div>
			</div>

		</section>

		<!-- Co-curricular Activities-->
		<section class="tab-content" id="co-curricular">
			<div class="co-curricular-heading">
				<h2>Extra-Curricular Activities</h2>
				<p>
					The school encourages all round development of its students with a planned series of extracurricular
					activities throughout the academic year. Extracurricular activities help them to socialize with
					other students. The school offers a variety of extracurricular activities for its students including
					fun fair, field trips, school picnics etc.
				</p>
			</div>
			<div class="co-curricular-list" id="co-curricular-activities">

				<!-- ** The activity images and headers are placeholders -->
			</div>
		</section>

		<!-- Study Programme -->
		<section class="tab-content" id="study-programme">
			<div class="wrapper">

				<!-- Shift System -->
				<div class="shift-container">
					<p>From the beginning of the new school year, 2022-2023, the school will operate under double shift
						system for the next three to four years.</p>

					<div class="card-wrapper">
						<div class="card">
							<h2>MORNING SHIFT</h2>

							<ul class="shift-list">
								<li><b>Girls:</b> KG to Class 12</li>
								<li><b>Boys:</b> KG to Class 4</li>
							</ul>
						</div>

						<div class="card">
							<h2>AFTERNOON SHIFT</h2>

							<ul class="shift-list">
								<li><b>Boys:</b> Class 5 to Class 12</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Programme Content -->
				<div class="programme-container">
					<ol class="programme-list">
						<li>
							<h2>KINDERGARTEN</h2>
							<ul>
								<li>Personal, Social and Emotional Development (PSED)</li>
								<li>Language and Literacy English</li>
								<li>Language and Literacy Urdu</li>
								<li>Basic Mathematical Concepts</li>
								<li>The World Around Us</li>
								<li>Islamiat</li>
								<li>Physical Development</li>
								<li>Creative Arts</li>
							</ul>
						</li>

						<li>
							<h2>CLASS I TO VIII</h2>
							<ul>
								<li>Urdu</li>
								<li>English</li>
								<li>Arabic</li>
								<li>Mathematics</li>
								<li>Science</li>
								<li>Islamiat</li>
								<li>Social Studies</li>
								<li>Computer Science</li>
							</ul>
						</li>

						<li>
							<h2>CLASS IX & X</h2>
							<p>As per new scheme of studies enforced by the FBISE, Islamabad w.e.f. session 2007-2008,
								the subjects being taught in Class: IX & X are as follows:</p>

							<div class="card-list col-2">
								<div class="card">
									<h3>CLASS IX</h3>

									<ul>
										<li>English Part-I</li>
										<li>Urdu Part-I</li>
										<li>Islamiat-I</li>
										<li>Pak. Studies-I</li>
										<li>Pakistan Studies-I</li>
										<li>Maths. Part-I</li>
										<li>Physics/Civics Part-I</li>
										<li>Chemistry/General Science Part-I</li>
										<li>Biology/Computer/Essentials of Home Eco. Part-I</li>
										<li>Economics Part-I</li>
									</ul>
								</div>

								<div class="card">
									<h3>CLASS X</h3>

									<ul>
										<li>English Part-II</li>
										<li>Urdu Part-II</li>
										<li>Islamiat-II</li>
										<li>Pakistan Studies-I</li>
										<li>Maths. Part-II</li>
										<li>Physics/Civics Part-II</li>
										<li>Chemistry/General Science Part-II</li>
										<li>Biology/Computer/Essentials of Home Eco. Part-II</li>
										<li>Economics Part-II</li>
									</ul>
								</div>
							</div>
						</li>

						<li>
							<h2>CLASS IX & X</h2>
							<h3>Compulsory subjects for all streams:</h3>
							<ul>
								<li><b>Class XI:</b> English, Urdu Compulsory/Pak Culture, Islamic Education.</li>
								<li><b>Class XII:</b> English, Urdu Compulsory/Pak Culture, Pakistan Studies.</li>
								<li class="note">
									<b>Note:</b>

									<ol>
										<li>Arabic, Islamiat and Social Studies (U.A.E) are also taught to Board classes
											as per requirement of the SPEA Pak Culture are offered only if sufficient
											number of students opt for these subjects.</li>
										<li>Pak Culture are offered only if sufficient number of students opt for these
											subjects.</li>
									</ol>
								</li>
							</ul>

							<p>At Higher Secondary level (class XI & XII) students may opt for any one of the streams
								mentioned below:</p>
							<div class="card-list col-3">
								<div class="card">
									<h3>SCIENCE STREAM</h3>

									<ol>
										<li>
											<h4>Pre-Medical:</h4>
											<ul>
												<li>Biology Part-1 & II</li>
												<li>Physics Part-1 & II</li>
												<li>Chemistry Part-1 & II</li>
											</ul>
										</li>
										<li>
											<h4>Pre-Engineering:</h4>
											<ul>
												<li>Maths Part-1 & II</li>
												<li>Physics Part-1 & II</li>
												<li>Chemistry Part-1 & II</li>
											</ul>
										</li>
										<li>
											<h4>Science General:</h4>
											<ul>
												<li>Computer Science Part-1 & II</li>
												<li>Maths Part-1 & II</li>
												<li>Physics Part-1 & II</li>
											</ul>
										</li>
									</ol>
								</div>
								<div class="card">
									<h3>COMMERCE STREAM</h3>

									<ol>
										<li>
											<h4>Class IX:</h4>
											<ul>
												<li>Principles of Commerce</li>
												<li>Business Maths</li>
												<li>Principles of Accounting-I</li>
												<li>Principles of Economics</li>
											</ul>
										</li>
										<li>
											<h4>Class X:</h4>
											<ul>
												<li>Commercial Geog</li>
												<li>Business Statistics</li>
												<li>Principles of Accounting</li>
												<li>Banking</li>
											</ul>
										</li>
									</ol>
								</div>
								<div class="card">
									<h3>ARTS STREAM</h3>

									<ul>
										<li>Civics Part-I & II</li>
										<li>History of Pakistan Part-I & II</li>
										<li>Home Economics Part-I & II</li>
									</ul>
								</div>
							</div>
						</li>
					</ol>
				</div>
			</div>
		</section>
	</main>

    <!-- Footer -->
    <?php include('./assets/php/footer.php')?>

		<script src="assets/js/global-scripts.js"></script>
		<script src="assets/js/our-school-scripts.js"></script>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./admin/assets/functions/get-activities.php",
                dataType: "html",
                success: (data) => {
                    $('#co-curricular-activities').html(data);
                }
            })
        });
    </script>
	</body>
</html>
