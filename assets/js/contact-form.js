/**
 * PURPOSE: Handle client-side validation for the contact form
 *
 *
 */

// Form element
const contactForm = $(".form");

// All input elements of form
const fname = $("#name");
const email = $("#email");
const tel = $("#tel");
const subject = $("#subject");
const message = $("#message");

// State changes to validate on change
$(fname).on("change focusout", function () {
	checkNotEmpty($(this), "Name");
});

$(email).on("change focusout", function () {
	validateEmail(email);
});

$(tel).on("change focusout", function () {
	validateTel(tel);
});

$(subject).on("change focusout", function () {
	checkNotEmpty($(this), "Subject");
});

$(message).on("change focusout", function () {
	checkNotEmpty($(this), "Message");
});

// Checks everything before submitting, ensures all fields are valid
contactForm.submit((e) => {
	e.preventDefault();

	checkInputs();

	// Success message after form submission
	if (formIsValid) {
		Swal.fire({
			title: "Thank you!",
			text: "Your contact request has been submitted successfully.",
			icon: "success",
			confirmButtonColor: "#3085d6",
			confirmButtonText: "OK",
		}).then((result) => {
			if (result.isConfirmed) {
				// Unbinds submission before submitting
				contactForm.off().submit();
			}
		});
	}

	return false;
});

let formInputClass = ".form-input";
var formIsValid = true;

// Checks if field is empty
function isEmpty(field) {
	return field === "";
}

// Verifies if email
function isEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

// Verifies if phone number
/**
 * Accepted Formats:
 * 1. XXXXXXXXXX
 * 2. +XXXXXXXXXXXX
 */
function isTel(tel) {
	var regex = /^([+]\d{2})?\d{10}$/;
	return regex.test(tel);
}

/**
 * Adds error classes when invalid
 *
 * @param {*} input input html element
 * @param {*} message - message to display on error
 */
function setErrorFor(input, message) {
	const formInput = input.parents(formInputClass);
	formInput.addClass("error");
	formInput.children("small").text(message);

	$(input).focus(function () {
		$(this).removeClass("error");
		$(formInput).removeClass("error");
	});
}

/**
 * Adds success classes when valid
 *
 * @param {*} input input html element
 */
function setSuccessFor(input) {
	const formInput = input.parents(formInputClass);
	formInput.addClass("success");

	$(input).focus(function () {
		$(this).removeClass("success");
		$(formInput).removeClass("success");
	});
}

// Quick verification just to make sure field is not empty
function checkNotEmpty(input, name) {
	inputValue = input.val().trim();

	if (isEmpty(inputValue)) {
		setErrorFor(input, name + " cannot be empty");
		formIsValid = false;
	} else {
		setSuccessFor(input);
	}
}

// Email Validation
function validateEmail(input) {
	let emailValue = $(input).val().trim();
	if (isEmpty(emailValue)) {
		setErrorFor(input, "Email cannot be empty");
		formIsValid = false;
	} else if (!isEmail(emailValue)) {
		setErrorFor(input, "Email is invalid");
		formIsValid = false;
	} else {
		setSuccessFor(email);
	}
}

// Mobile Number Validation
function validateTel(input) {
	let telValue = $(input).val().trim();
	if (isEmpty(telValue)) {
		setErrorFor(input, "Mobile number cannot be empty");
		formIsValid = false;
	} else if (!isTel(telValue)) {
		setErrorFor(input, "Mobile number is invalid");
		formIsValid = false;
	} else {
		setSuccessFor(tel);
	}
}

function checkInputs() {
	formIsValid = true;

	// Re-validates
	checkNotEmpty(fname, "Name");
	validateEmail(email);
	validateTel(tel);
	checkNotEmpty(subject, "Subject");
	checkNotEmpty(message, "Message");
}
