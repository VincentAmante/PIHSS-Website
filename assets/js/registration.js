const registrationForm = $('.registration-form');

// All input elements of registration (excluding images)
const studentName = $('#student-name');
const studentGender = $("input[name='student-gender']");
const birthDate = $('#date-of-birth');
const eidNumber = $('#eid-number');
const eidIssue = $('#eid-issue');
const eidExpiry = $('#eid-expiry');
const studentGrade = $('#student-class');
const fatherName = $('#father-name');
const fatherNumber = $('#father-number');
const motherNumber = $('#mother-number');
const fatherEmail = $('#father-email');

// State changes to verify on change
$(studentName).on("change focusout", function(){
    verifyNotEmpty($(this), 'Student name');
});

$(birthDate).on("change focusout", function(){
    verifyNotEmpty($(this), 'Date of birth');
});

$(eidNumber).on("change focusout", function(){
    verifyEid();
});

$(eidIssue).on("change focusout", function(){
    verifyNotEmpty($(this), 'EID issue date');
});

$(eidExpiry).on("change focusout", function(){
    verifyNotEmpty($(this), 'EID expiry date');
});

$(studentGrade).on("change focusout", function(){
    verifyNotEmpty($(this), 'Student grade');
});

$(fatherName).on("change focusout", function(){
    verifyNotEmpty($(this), 'Name');
});

$(fatherNumber).on("change focusout", function(){
    verifyNotEmpty($(this), 'Mobile number');
});

$(motherNumber).on("change focusout", function(){
    verifyNotEmpty($(this), 'Mobile number');
});

$(fatherEmail).on("change focusout", function(){
    verifyEmail(fatherEmail);
});

// Checks everything before submitting, ensures all fields are valid
registrationForm.submit(e=>{
    e.preventDefault();

    checkInputs();

    if (formIsValid){
        // Unbinds submission before submitting
        registrationForm.off().submit();
    } else {
        
    }

    return false;
})

let formInputClass = '.form-input';
var formIsValid = true;

// Checks if field is empty
function isEmpty(field){
    return (field === '');
}
// Verifies if email
function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}


/**
 * 
 * @param {*} input input html element
 * @param {*} message - message to display on error
 */
function setErrorFor(input, message){
    const formInput = input.parents(formInputClass);
    formInput.addClass('error');
    formInput.children('small').text(message);

    $(input).focus(function(){
        $(this).removeClass('error');
        $(formInput).removeClass('error');
    })
}

/**
 * 
 * @param {*} input input html element
 */
function setSuccessFor(input){
    const formInput = input.parents(formInputClass);
    formInput.addClass('success');

    $(input).focus(function(){
        $(this).removeClass('success');
        $(formInput).removeClass('success');
    })
}

// Quick verification just to make sure field is not empty
function verifyNotEmpty(input, name) {
    inputValue = input.val().trim();

    if (isEmpty(inputValue)) {
        setErrorFor(input, name + ' cannot be empty');
        formIsValid = false;
    } else {
        setSuccessFor(input);
    }
}

// Verification process for EID number
function verifyEid() {
    let eidValue = $(eidNumber).val().trim().replace(/-/, "");

    if (isEmpty(eidValue)) {
        setErrorFor(eidNumber, 'EID Number cannot be empty');
        formIsValid = false;
    }
    // Emirates ID Numbers are always 15 characters in length
    else if (eidValue.length < 15 || eidValue.length > 15) {
        setErrorFor(eidNumber, 'EID Number must contain 15 characters');
        formIsValid = false;
    }
    else {
        setSuccessFor(eidNumber);
    }
}

// Ensures an option is selected
function verifyGender() {
    let isChecked = false;
    $(studentGender).each((index, obj)=>{
        if ($(obj).is(':checked')){
            isChecked = true;
        }
    })
    if (!isChecked){
        setErrorFor(studentGender, 'Select gender');
        formIsValid = false;
    }
    else {
        setSuccessFor(studentGender);
    }
}

function verifyEmail(input){
    let emailValue = $(input).val().trim();
    if (isEmpty(emailValue)){
        setErrorFor(input, 'Email cannot be empty');
        formIsValid = false;
    }
    else if (!isEmail(emailValue)){
        setErrorFor(input, 'Email is invalid');
        formIsValid = false;
    }
    else {
        setSuccessFor(fatherEmail);
    };
}

function checkInputs(){
    formIsValid = true;

    // Verifies if all images have a file uploaded
    formIsValid = (verifyImages()) ? formIsValid : false;

    // Verifies the various fields
    verifyNotEmpty(studentName, "Student's name");
    verifyNotEmpty(birthDate, "Birth date")
    verifyGender();
    verifyEid();
    verifyNotEmpty(eidIssue, "EID issue date");
    verifyNotEmpty(eidExpiry, "EID expiry date");
    verifyNotEmpty(studentGrade, 'Student grade');
    verifyNotEmpty(fatherName, 'Name');
    verifyNotEmpty(fatherNumber, 'Mobile number');
    verifyNotEmpty(motherNumber, 'Mobile number');
    verifyEmail(fatherEmail);
}