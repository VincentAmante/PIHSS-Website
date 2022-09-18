<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Our School - Pakistan Islamia Higher Secondary School</title>

	<link rel="stylesheet" href="./assets/css/global.css" />
	<link rel="stylesheet" href="./assets/css/our-school.css" />
	<link rel="shortcut icon" href="./assets/images/global/logo_small.png" type="image/x-icon" />
</head>

<body>
	<!-- Header -->
	<?php include('./assets/php/header.php') ?>

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
				<li><a href="./index.php">HOME</a></li>
				<li><a href="our-school.php#facilities">OUR SCHOOL</a></li>
				<li><a href="#" class="tab-breadcrumb"></a></li>
			</ul>
		</div>

		<!-- Overview -->
		<section class="our-school-overview">
			<div class="content">
				<div id="overview"></div>

				<div class="internal-nav">
					<div>
						<h2>Our School</h2>
						<ul id="nav">
							<li><a id="btn-facilities" class="tab-button" href="#facilities">Facilities</a></li>
							<li><a id="btn-school-activities" class="tab-button" href="#school-activities">School Activities</a></li>
							<li><a id="btn-study-programme" class="tab-button" href="#study-programme">Study Programme</a></li>
						</ul>
					</div>
				</div> <!-- .internal-nav -->
			</div>
		</section>

		<!-- Content -->
		<section id="content-wrapper">
			<div id="content"></div>
		</section>
	</main>

	<!-- Footer -->
	<?php include('./assets/php/footer.php') ?>

	<!-- Scripts -->
	<script src="assets/js/global-scripts.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Load subpages -->
	<script>
		$(document).ready(function() {
			loadContent();
		});

		$(window).on("hashchange", function() {
			loadContent();
		});

		function loadContent() {
			var page = location.hash.substring(1);
			$(".tab-breadcrumb").html(page);
			$(".tab-breadcrumb").attr("href", "our-school.php#" + page);

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