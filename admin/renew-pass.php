<?php
    require_once('./assets/functions/config.php');

    enum Result 
    {
        case SUCCESS;
        case FAILED;
        case UNKNOWN;
    }
    $creationResult = Result::UNKNOWN;
    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);

    }
    else if (isset($_POST['reset-pass'])){

        echo $token;
        $token = $_POST['token'];
        $id = $_POST['id'];
        $newPass = $_POST['new-pass'];
        $newPassConfirm = $_POST['new-pass-confirm'];
        
        $confirmToken = "SELECT * FROM passwordresets WHERE id = ?";
        $stmt = $conn->prepare($confirmToken);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $queryResult = mysqli_fetch_assoc($stmt->get_result());

        if ($queryResult != null){
            echo 'Not null';
            
            $tokenData = json_decode($queryResult['tokenData']);

            if (password_verify($token, $tokenData->token) 
                && $tokenData->expirationDate > time()){

                    if ($newPass != $newPassConfirm){
                        $creationResult = Result::FAILED;
                        echo 'Failed';
                    }

                    $minPasswordLength = 8;
                    $maxPasswordLength = 64;
                    if (strlen($newPass) < $minPasswordLength || strlen($newPass) > $maxPasswordLength){
                        $creationResult = Result::FAILED;
                        echo 'Failed';
                    }

                    if ($creationResult != Result::FAILED){
                        echo 'Hello';

                        $creationResult = Result::SUCCESS;
                        $passHashed = password_hash($newPass, PASSWORD_BCRYPT);
                        $updatePass = "UPDATE admins SET password = '$passHashed' WHERE email = ?";
                        $stmt = $conn->prepare($updatePass);
                        $stmt->bind_param('s', $queryResult['email']);
                        $stmt->execute();
                        $stmt->close();

                        $stmt = $conn->prepare("DELETE FROM passwordresets WHERE id='$id'");
                        $stmt->execute();
                        $stmt->close();
                        $conn->close();
                    }
            } else {
                if ($tokenData->expirationDate < time()){
                    die('Token expired');
                }
            }
        } else {
            die("Account does not exist");
        }
    }else if (isset($_GET['token']) && isset($_GET['id'])){
        $token = $_GET['token'];
        $id = $_GET['id'];

        $confirmToken = "SELECT * FROM passwordresets WHERE id = ?";
        $stmt = $conn->prepare($confirmToken);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $queryResult = mysqli_fetch_assoc($stmt->get_result());

        if ($queryResult != null){
            $tokenData = json_decode($queryResult['tokenData']);

            if (password_verify($token, $tokenData->token) 
                && $tokenData->expirationDate > time()){ 
                    
            } else if ($tokenData->expirationDate < time()) {
                die("Token expired");
            } else {
                die("Token not valid");
            }
        } else {
            die('Token expired');
            exit();
        }
    } else {
        die('Forbidden');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/account-form.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
    <link rel="stylesheet" href="./assets/styles/form.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main>
    <section class="login-form">
        <div class="form-wrapper">
            <form class="admin-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <h1>Reset Password</h1>
                <div class="content">
                    <!-- Username -->
                    <div class="form-item">
                        <label for="new-pass">New Password</label>
                        <div class="input-body">
                            <input id="password" type="password" placeholder="Password" autocomplete="off" name="new-pass" minlength="8">
                            <div class="input-alerts">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                        <small>Error Message</small>
                    </div>

                    <div class="form-item">
                        <label for="new-pass-confirm">Confirm Password</label>
                        <div class="input-body">
                            <input id="password-retyped" type="password" placeholder="Password" autocomplete="off" name="new-pass-confirm" minlength="8">
                            <div class="input-alerts">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </div>
                        <small>Error Message</small>
                    </div>
                </div>
                

                <?php
                    if (isset($_GET['token']) && isset($_GET['id']))
                :?>
                <input id="token" type="hidden" value="<?php echo $_GET['token'];?>" name="token">
                <input id="id" type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                <?php endif ?>

                <?php
                    if (isset($_POST['token']) && isset($_POST['id']))
                :?>
                <input id="token" type="hidden" value="<?php echo $_POST['token'];?>" name="token">
                <input id="id" type="hidden" value="<?php echo $_POST['id'];?>" name="id">
                <?php endif ?>

                <!-- <a href="#" class="link">Forgot Your Password?</a> -->
                <!-- Sign In Button -->
                <div class="form-item form-item-empty">
                    <div class="action buttons">
                        <button id="submit-button" class="form-button" name="reset-pass">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </section> <!-- .login-form -->
    </main>

    <script src="./assets/scripts/reset-pass-validation.js"></script>
</body>
</html>