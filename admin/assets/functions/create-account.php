<?php
    require 'connect.php';

    // declaring variables to prevent errors
    $email = "";
    $username = "";
    $password = "";
    $passwordRetyped = "";
    $isPrimary = false;

    $date = "";

    // $error_array = array();

    // Results
    enum Result 
    {
        case SUCCESS;
        case FAILED;
        case UNKNOWN;
    }
    $creationResult = Result::UNKNOWN;

    if(isset($_POST['create-account'])){
        // signup form values

        // Email, this will be kept for password renewal methods if implemented
        $email = strip_tags($_POST['email']);
        $email = str_replace(' ', '', $email);
        $email = strtolower($email);
        // $_SESSION['email'] = $email;

        // username
        $username = strip_tags($_POST['username']);
        $username = str_replace(' ', '', $username);
        $username = strtolower($username);
        // $_SESSION['username'] = $username;

        // password
        $password = strip_tags($_POST['password']);
        $passwordRetyped = strip_tags($_POST['password-retyped']);

        if ($_POST['is-primary'] == "primary"){
            $isPrimary = true;
        }

        $date = date("Y-m-d"); // gets current date

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            // check if email already exists
            $e_check = mysqli_query($conn, "SELECT email FROM admins WHERE email = '$email'");
            // count the number of rows returned
            $num_rows = mysqli_num_rows($e_check); 

            if($num_rows > 0){
                // Email taken
                $creationResult = Result::FAILED;
            }
        }
        else{
            $creationResult = Result::FAILED;
        }

        // check if username is taken
        $check_username_query = mysqli_query($conn, "SELECT user FROM admins WHERE user = '$username'");
        $num_rows_user = mysqli_num_rows($check_username_query);

        if($num_rows_user > 0){
            // User Taken
            $creationResult = Result::FAILED;   
        }
        
        // checks if username length is enough
        if(strlen($username) > 20 || strlen($username) < 2){
            $creationResult = Result::FAILED;
            // MESSAGE: Insufficient user length
        }

        // checks if passwords match
        if($password != $passwordRetyped){
            // Password does not match
            $creationResult = Result::FAILED;
        }
        else{ // checks if password contains non-english characters
            if(preg_match('/[^A-Za-z0-9]/', $password)){
                // Non-english password
                $creationResult = Result::FAILED;
            }
        }

        $minPasswordLength = 8;
        $maxPasswordLength = 64;
        // checks if password length is enough
        if(strlen($password) > $maxPasswordLength || strlen($password) < $minPasswordLength){
            // Password length insufficient
            $passwordErrorMessage = (strlen($password) > $maxPasswordLength) ? 'Too long!' : 'Too short!';
            $creationResult = Result::FAILED;
        }
        if ($creationResult != Result::FAILED){
            $creationResult == Result::SUCCESS;
            $passwordHashed = password_hash($password, PASSWORD_BCRYPT); 

            $stmt = $conn->prepare("INSERT INTO admins(user, password, email, isPrimary) VALUES('$username','$passwordHashed', '$email', '$isPrimary')");
            $stmt->execute();
            $stmt->close();
            $conn->close();

            header("Location: ../manage-accounts.php");
        }
    }
?>