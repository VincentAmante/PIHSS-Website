const accountForm = $('.admin-form');

const user = $('#user');
const email = $('#email');
const password = $('#password');
const passwordRetyped = $('#password-retyped');

let formInputClass = '.form-item';
let formIsValid = true;

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

function checkNotEmpty(input, name) {
    inputValue = input.val().trim();

    if (isEmpty(inputValue)) {
        setErrorFor(input, name + ' cannot be empty');
        formIsValid = false;
    } else {
        setSuccessFor(input);
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


function checkPassword(){
    let mainPassword = password.val();
    let passMinLength = 8;
    let passMaxLength = 64;

    if (isEmpty(mainPassword)){
        setErrorFor(input, 'Password cannot be empty');
        formIsValid = false;
    } else if (mainPassword.length < passMinLength){
        setErrorFor(input, 'Password is too short');
        formIsValid = false;
    } else if (mainPassword.length > passMaxLength){
        setErrorFor(input, 'Password is too long');
        formIsValid = false;
    } else {
        setSuccessFor(password);
    }
}


$(user).on("change focusout", function(){
    checkNotEmpty($(this), 'Username');
});

$(email).on("change focusout", function(){
    validateEmail(email);
});

$(password).on("change focusout", function(){
    checkPassword();
});

function confirmPassword(){
    let passwordConfirm = passwordRetyped.val();
    let passwordOriginal = password.val();
    
    if (isEmpty(passwordConfirm)) {
        setErrorFor(passwordRetyped, ' ');
    }
    else if (passwordConfirm != passwordOriginal){
        setErrorFor(passwordRetyped, 'Password does not match');
    }  else {
        setSuccessFor(passwordRetyped);
    }
}

$(passwordRetyped).on("change focusout", function(){
    confirmPassword();
})

function checkInputs(){
    formIsValid = true;
    
    checkNotEmpty(user, 'User');
    validateEmail(email);
    checkPassword();
    confirmPassword();
}

accountForm.submit(e => {
    e.preventDefault();

    checkInputs();

    if (formIsValid){
        accountForm.off().submit();
    }

    return false;
});