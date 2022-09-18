<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Contact Us - Pakistan Islamia Higher Secondary School</title>

	<link rel="stylesheet" href="./assets/css/global.css" />
	<link rel="stylesheet" href="./assets/css/contact-us.css" />
	<link rel="shortcut icon" href="./assets/images/global/logo_small.png" type="image/x-icon" />
</head>

<body>
	<!-- Header -->
	<?php include('./assets/php/header.php') ?>

	<main>
		<!-- Banner -->
		<section id="contact-banner" class="subpage-banner">
			<div class="banner-container">
				<h1>Contact Us</h1>
			</div>
		</section>

		<!-- Navigation Breadcrumbs -->
		<div class="nav-breadcrumbs">
			<ul>
				<li><a href="./index.php">HOME</a></li>
				<li><a href="javascript:window.location.reload(true)">CONTACT US</a></li>
			</ul>
		</div>

		<!-- Overview -->
		<section class="contact-overview">
			<div class="content">
				<div class="h1-border">
					<span></span>
					<h1>Pakistan Islamia Higher Secondary School</h1>
				</div>
			</div>
		</section>

		<!-- Contact Information -->
		<section class="contact-us">
			<div class="container">
				<div class="contact-details">
					<div class="timings">
						<h2>Office Timings</h2>
						<p>Sun-Thu: 7:30am - 1:30pm</p>
					</div> <!-- .timings -->

					<div class="info">
						<ul>
							<li>
								<span class="fa-li fa-lg">
									<i class="fa-solid fa-phone"></i></span>
								<a href="tel:+">06-5670700 | 06-5670464</a>
							</li>
							<li>
								<span class="fa-li fa-lg"><i class="fa-solid fa-fax"></i></span>
								<a href="tel:+065661912">06 - 5661912</a>
							</li>
							<li>
								<span class="fa-li fa-lg"><i class="fa-solid fa-location-dot"></i></span><a href="https://goo.gl/maps/5H9LAeGYbvQU86bU8">P O Box 1493, Al Ghubaiba, Sharjah,
									UAE</a>
							</li>
							<li>
								<span class="fa-li fa-lg"><i class="fa-solid fa-envelope"></i></span>
								<a href="mailto:info@pihss-shj.com">info@pihss-shj.com</a>
							</li>
						</ul>
					</div> <!-- .info -->
				</div> <!-- .contact-details -->

				<div class="contact-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7211.843122839369!2d55.414977!3d25.340413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x29ab65796253f180!2sPakistan%20Islamia%20Secondary%20School!5e0!3m2!1sen!2sae!4v1645859780769!5m2!1sen!2sae" height="100%" width="100%" allowfullscreen="" loading="lazy"></iframe>
				</div> <!-- .contact-map -->
			</div>
		</section>

		<!-- Contact Form -->
		<section id="contact-form" class="contact-form">
			<h2>Do you have any queries?</h2>

			<div class="form-container">
				<div class="form-note">
					<em><span>*</span> indicates a required field</em>
				</div>

				<form class="form" action="./assets/php/contact-submit.php" method="POST">
					<!-- Name -->
					<div class="form-item">
						<label for="name">Name <span>*</span></label>
						<input type="text" id="name" name="name" required />
					</div>

					<!-- Email -->
					<div class="form-item">
						<label for="email">Email <span>*</span></label>
						<input type="email" id="email" name="email" required />
					</div>

					<!-- Phone Number -->
					<div class="form-item">
						<label for="tel">Phone number <span>*</span></label>
						<input type="tel" id="tel" name="tel" required />
					</div>

					<!-- Message Subject -->
					<div class="form-item">
						<label for="subject">Subject</label>
						<input type="text" id="subject" name="subject" />
					</div>

					<!-- Message Content -->
					<div class="form-item">
						<label for="message">Message</label>
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
					</div>

					<!-- Submit Button -->
					<div class="submit-button">
						<button type="submit" name="submit">SUBMIT</button>
					</div>
				</form> <!-- .form -->
			</div> <!-- .form-container -->
		</section> <!-- #contact-form -->
	</main>

	<!-- Footer -->
	<?php include('./assets/php/footer.php') ?>

	<!-- Scripts -->
	<script src="assets/js/global-scripts.js"></script>
</body>

</html>