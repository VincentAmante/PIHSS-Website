
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
    <?php
        require_once './assets/functions/reset-password.php';

        // Prevents resubmission on refresh
        $rand = rand();
        $_SESSION['rand'] = $rand;
    ?>
    <main>
    <section class="login-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <h1>Reset Password Here</h1>
            <div class="content">
                <!-- Username -->
                <div class="input-field">
                    <input type="text" placeholder="email" autocomplete="nope" name="email" required>
                </div>
            </div>
            
            <!-- <a href="#" class="link">Forgot Your Password?</a> -->
            <!-- Sign In Button -->
            <div class="action">
                <button name="reset-password">Reset</button>
                <button type="button" id="return" name="return">Return</button>
            </div>
            <input type="hidden" value="<?php echo $rand; ?>" name="rand-check">
        </form>
    </section> <!-- .login-form -->
    </main>

    <script>
        $('#return').on("click", function(){
            console.log('hello');
            window.location.href ='./index.php';
        })
    </script>
</body>
</html>