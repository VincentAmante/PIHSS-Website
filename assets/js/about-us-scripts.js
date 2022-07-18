/**
 * PURPOSE: Handle the code in the about-us page (/about-us.php)
 * 
 * CONTENT: Code contains handling for the tabs system
 */

// Gets all radio inputs, each one representing a tab in the page
const tabs = $('input[name="about-us-group"]');

// Container of tab inputs
const tabContainer = $("#about-us-tabs");

tabContainer.on("click", () => {
	for (const btn of tabs) {
		if (btn.checked) {
			// Removes all current elements with the 'active' class
			$(".active").removeClass("active");

			// Adds active class to elements with the following class names
			const value = $(btn).attr("value");
			$('#' + value + "-content").addClass("active");
			$('#' + value + "-img").addClass("active");
			$('#' + "tab-" + value).addClass("active");
		}
	}
});
