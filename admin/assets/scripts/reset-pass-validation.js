const accountForm = $('.admin-form');

const password = $('#password');
const passwordRetyped = $('#password-retyped');

let formInputClass = '.form-item';
let formIsValid = true;

// Checks if field is empty
function isEmpty(field){
    return (field === '');
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


function checkPassword(){
    let mainPassword = password.val();
    let passMinLength = 8;
    let passMaxLength = 64;

    if (isEmpty(mainPassword)){
        setErrorFor(password, 'Password cannot be empty');
        formIsValid = false;
    } else if (mainPassword.length < passMinLength){
        setErrorFor(password, 'Password is too short');
        formIsValid = false;
    } else if (mainPassword.length > passMaxLength){
        setErrorFor(password, 'Password is too long');
        formIsValid = false;
    } else {
        setSuccessFor(password);
    }
}


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
    
    checkPassword();
    confirmPassword();
}

accountForm.submit(e => {
    e.preventDefault();

    console.log('hello');

    checkInputs();

    console.log(formIsValid);
    if (formIsValid){

        $.post("renew-pass.php", {
            [password.attr('name')]: password.val(),
            [passwordRetyped.attr('name')]: passwordRetyped.val(),
            [$("#token").attr('name')] : $("#token").val(),
            [$("#id").attr('name')] : $("#id").val(),
            [$("#submit-button").attr('name')] : true
        }).done(() => {
            window.location.href="./index.php?passReset=success";
        })
        // accountForm.off().submit();
    }

    return false;
});