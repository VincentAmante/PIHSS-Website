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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

				<form class="form" action="./admin/assets/functions/submit-contact-form.php" method="POST">
					<table>

						<!-- Name -->
						<tr class="form-row">
							<td class="form-label">
								<label for="name">Name</label>
							</td>

							<td class="form-input">
								<div class="main-body">
									<input type="text" id="name" name="name" spellcheck="false" autocomplete="off" required />

									<!-- Displays status of validation -->
									<div class="input-alerts">
										<i class="fas fa-check-circle"></i>
										<i class="fas fa-exclamation-circle"></i>
									</div>
								</div> <!-- .main-body -->

								<!-- Displays any errors from form validation -->
								<small>Error Message</small>
							</td>
						</tr>

						<!-- Email -->
						<tr class="form-row">
							<td class="form-label">
								<label for="email">Email</label>
							</td>

							<td class="form-input">
								<div class="main-body">
									<input type="email" id="email" name="email" spellcheck="false" autocomplete="on" required />

									<!-- Displays status of validation -->
									<div class="input-alerts">
										<i class="fas fa-check-circle"></i>
										<i class="fas fa-exclamation-circle"></i>
									</div>
								</div> <!-- .main-body -->

								<!-- Displays any errors from form validation -->
								<small>Error Message</small>
							</td>
						</tr>

						<!-- Phone Number -->
						<tr class="form-row">
							<td class="form-label">
								<label for="tel">Phone number</label>
							</td>

							<td class="form-input">
								<div class="main-body">
									<input type="tel" id="tel" name="tel" autocomplete="on" required />

									<!-- Displays status of validation -->
									<div class="input-alerts">
										<i class="fas fa-check-circle"></i>
										<i class="fas fa-exclamation-circle"></i>
									</div>
								</div> <!-- .main-body -->

								<!-- Displays any errors from form validation -->
								<small>Error Message</small>
							</td>
						</tr>

						<!-- Message Subject -->
						<tr class="form-row">
							<td class="form-label">
								<label for="subject">Subject</label>
							</td>

							<td class="form-input">
								<div class="main-body">
									<input type="text" id="subject" name="subject" />

									<!-- Displays status of validation -->
									<div class="input-alerts">
										<i class="fas fa-check-circle"></i>
										<i class="fas fa-exclamation-circle"></i>
									</div>
								</div> <!-- .main-body -->

								<!-- Displays any errors from form validation -->
								<small>Error Message</small>
							</td>
						</tr>

						<!-- Message Content -->
						<tr class="form-row">
							<td class="form-label">
								<label for="message">Message</label>
							</td>

							<td class="form-input">
								<div class="main-body">
									<textarea name="message" id="message" cols="30" rows="10" required></textarea>

									<!-- Displays status of validation -->
									<div class="input-alerts">
										<i class="fas fa-check-circle"></i>
										<i class="fas fa-exclamation-circle"></i>
									</div>
								</div> <!-- .main-body -->

								<!-- Displays any errors from form validation -->
								<small>Error Message</small>
							</td>
						</tr>

						<!-- Form Buttons -->
						<tr class="form-row">
							<td class="form-input button-wrapper">
								<input class="form-button form-submit" type="submit" value="Submit">
								<input class="form-button form-reset" type="reset" value="Clear All" required>
							</td>
						</tr>
					</table>
				</form> <!-- .form -->
			</div> <!-- .form-container -->
		</section> <!-- #contact-form -->
	</main>

	<!-- Footer -->
	<?php include('./assets/php/footer.php') ?>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="assets/js/global-scripts.js"></script>
	<script src="assets/js/contact-form.js"></script>

</body>

</html>