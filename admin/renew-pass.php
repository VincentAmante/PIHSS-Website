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
            $tokenData = json_decode($queryResult['tokenData']);

            if (password_verify($token, $tokenData->token) 
                && $tokenData->expirationDate > time()){

                    if ($newPass != $newPassConfirm){
                        $creationResult = Result::FAILED;
                    }

                    $minPasswordLength = 8;
                    $maxPasswordLength = 64;
                    if (strlen($newPass) < $minPasswordLength || strlen($newPass) > $maxPasswordLength){
                        $creationResult = Result::FAILED;
                    }

                    if ($creationResult != Result::FAILED){
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
            exit();
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
                    echo 'WOOO';
            } else {
                exit();
            }
        } else {
            exit();
        }
    } else {
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
    <link rel="stylesheet" href="./assets/styles/admin-page.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <main>
    <section class="login-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <h1>Login</h1>
            <div class="content">
                <!-- Username -->
                <div class="input-field">
                    <input type="password" placeholder="Password" autocomplete="off" name="new-pass" minlength="8">
                </div>

                <!-- Password -->
                <div class="input-field">
                    <input type="password" placeholder="Password" name="new-pass-confirm" minlength="8">
                </div>
            </div>
            
            <!-- <a href="#" class="link">Forgot Your Password?</a> -->
            <!-- Sign In Button -->
            <div class="action">
                <button name="reset-pass">Reset Password</button>
            </div>
            <?php
                if (isset($_GET['token']) && isset($_GET['id']))
            :?>
            <input type="hidden" value="<?php echo $_GET['token'];?>" name="token">
            <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
            <?php endif ?>
        </form>
    </section> <!-- .login-form -->
    </main>
</body>
</html>