<?php
    if (isset($_GET['errors'])){
        $errors = array();
        array_push($errors, "<strong>You have the following errors:</strong>");

        if (isset($_GET['emailTaken'])){
            array_push($errors, "Email is already taken!");
        }
        if (isset($_GET['userTaken'])){
            array_push($errors, "User is already taken!");
        }
        if (isset($_GET['userLengthIssue'])){
            array_push($errors, "");
            array_push($errors, "Username is " . $_GET['userLengthIssue']);
        }
        if (isset($_GET['passwordMismatch'])){
            array_push($errors, "Password does not match!");
        }
        if (isset($_GET['passwordNonEng'])){
            array_push($errors, "Password is limited to english characters");
        }
        if (isset($_GET['passwordLengthIssue'])){
            array_push($errors, "Password is " . $_GET['passwordLengthIssue']);
        }
        
        $errorHtml = "";
        foreach ($errors as $key => $error) {
            $errorHtml .= $error . "<br>";
        }

        ?>
        <script>
            Swal.fire({
                        title: 'Errors',
                        html: '<?php echo $errorHtml?>',
                        icon: 'success',
                        confirmButtonColor: '#1B9B55',
                        confirmButtonText: 'Ok' 
                    });
        </script>
        <?php
    }
?>