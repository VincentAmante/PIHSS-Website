<?php

    if (isset($_POST['reset-password'])){
        ?>           
            <script>
                Swal.fire({
                            title: 'Thank you!',
                            text: 'An email will be sent to reset your password',
                            icon: 'warning',
                            confirmButtonColor: '#1B9B55',
                            confirmButtonText: 'Ok' 
                        });
            </script>
            <?php


        require_once('config.php');
        $email = $_POST['email'];

        $checkEmails = "SELECT * FROM admins WHERE email = ?";
        $stmt = $conn->prepare($checkEmails);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $queryResult = mysqli_fetch_assoc($stmt->get_result());
        $stmt->close();

        if ($queryResult != null 
            && $_POST['rand-check'] == $_SESSION['rand']){

            require_once('token-class.php');
            $token = new Token();

            $passwordResetPage = '/admin/renew-pass.php?token=' . $token->getToken();

            $siteUrl = '';
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                $siteUrl .= 'https';
            } else {
                $siteUrl .= 'http';
            }

            $newToken = "INSERT INTO passwordResets(tokenData, email) VALUES(?, ?)";
            $stmt = $conn->prepare($newToken);
            $stmt->bind_param('ss', json_encode($token->getTokenData()), $email);
            $stmt->execute();
            $lastId = mysqli_insert_id($conn);

            $siteUrl .= '://' . $_SERVER['HTTP_HOST'] . $passwordResetPage . '&id=' . $lastId;

            
            $msg = "Reset password here:\n" . $siteUrl;

            // mail($email, 'Reset Password', $msg);
            echo $msg;
        }


    }
?>