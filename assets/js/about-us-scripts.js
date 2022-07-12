// Code for the tabs
const tabs = document.querySelectorAll('input[name="about-us-group"]');

let selectedTab = "values";

const tab_container = document.getElementById("about-us-tabs");
tab_container.addEventListener("click", () => {
	for (const btn of tabs) {
		if (btn.checked) {
			document.getElementById(selectedTab + "-content").classList.remove("active");
			document.getElementById(selectedTab + "-img").classList.remove("active");
			document.getElementById("tab-" + selectedTab).classList.remove("active");

			const value = btn.getAttribute("value");
			document.getElementById(value + "-content").classList.add("active");
			document.getElementById(value + "-img").classList.add("active");
			document.getElementById("tab-" + value).classList.add("active");
			selectedTab = value;
		}
	}
});
