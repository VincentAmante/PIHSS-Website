/**
 * PURPOSE: Handle client-side validation for the registration form
 * 
 * Easily modifiable
 */

// Form element
const registrationForm = $('.registration-form');

// All input elements of registration (excluding images, which are covered by validateImages())
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

// State changes to validate on change
$(studentName).on("change focusout", function(){
    checkNotEmpty($(this), 'Student name');
});

$(birthDate).on("change focusout", function(){
    checkNotEmpty($(this), 'Date of birth');
});

$(eidNumber).on("change focusout", function(){
    validateEid();
});

$(eidIssue).on("change focusout", function(){
    checkNotEmpty($(this), 'EID issue date');
});

$(eidExpiry).on("change focusout", function(){
    checkNotEmpty($(this), 'EID expiry date');
});

$(studentGrade).on("change focusout", function(){
    checkNotEmpty($(this), 'Student grade');
});

$(fatherName).on("change focusout", function(){
    checkNotEmpty($(this), 'Name');
});

$(fatherNumber).on("change focusout", function(){
    checkNotEmpty($(this), 'Mobile number');
});

$(motherNumber).on("change focusout", function(){
    checkNotEmpty($(this), 'Mobile number');
});

$(fatherEmail).on("change focusout", function(){
    validateEmail(fatherEmail);
});

// Checks everything before submitting, ensures all fields are valid
registrationForm.submit(e=>{
    e.preventDefault();

    checkInputs();

    if (formIsValid){

        // Unbinds submission before submitting
        registrationForm.off().submit();
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
 * Adds error classes when invalid
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
 * Adds success classes when valid
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
function checkNotEmpty(input, name) {
    inputValue = input.val().trim();

    if (isEmpty(inputValue)) {
        setErrorFor(input, name + ' cannot be empty');
        formIsValid = false;
    } else {
        setSuccessFor(input);
    }
}

// Verification process for EID number
function validateEid() {
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
function validateGender() {
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

function validateEmail(input){
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


/**
 * Validates all FileUploader instances
 *    - Currently limited to checking if they have an image inside 
 *    - Adds error message if applicable
 * 
 * @returns bool - TRUE if all images valid, FALSE otherwise
 */
function validateImages(){
    let imagesValid = true;
  
    $('.uploader-single').children('input').each((index, obj)=>{
      if(obj.files.length < 1){
        imagesValid = false;
        $(obj).parents('.form-input').addClass('error');
        $(obj).parents('.file-upload').children('small').text('Image is required');
  
        $(obj).change(function(){
          $(this).parents('.form-input').removeClass('error');
        })
      }
    })
  
    return imagesValid;
}

function checkInputs(){
    formIsValid = true;

    // Checks if all images have a file uploaded
    formIsValid = (validateImages()) ? formIsValid : false;

    // Re-validates
    checkNotEmpty(studentName, "Student's name");
    checkNotEmpty(birthDate, "Birth date")
    validateGender();
    validateEid();
    checkNotEmpty(eidIssue, "EID issue date");
    checkNotEmpty(eidExpiry, "EID expiry date");
    checkNotEmpty(studentGrade, 'Student grade');
    checkNotEmpty(fatherName, 'Name');
    checkNotEmpty(fatherNumber, 'Mobile number');
    checkNotEmpty(motherNumber, 'Mobile number');
    validateEmail(fatherEmail);
}