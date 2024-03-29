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
    <?php include './assets/functions/login.php'?>
    <?php
    if (isset($_GET['passReset'])):?>
            <script>
                Swal.fire({
                title: 'Password Reset!',
                text: "Login in with your new password",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok!',
                }).then((result) => {
                
                })
            </script>
        <?php     
    endif;
?>
    <main>
    <section class="login-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <h1>Login</h1>
            <div class="content">
                <!-- Username -->
                <div class="input-field">
                    <input type="text" placeholder="User" autocomplete="nope" name="pihss-admin-username">
                </div>

                <!-- Password -->
                <div class="input-field">
                    <input type="password" placeholder="Password" autocomplete="new-password" name="pihss-admin-password">
                </div>
                
                <a href="./forgot-password.php">Forgot Password?</a>
            </div>
            
            <!-- <a href="#" class="link">Forgot Your Password?</a> -->
            <!-- Sign In Button -->
            <div class="action">
                <button name="login-btn">Sign in</button>
                <button name="return-page">Return</button>
            </div>
        </form>
    </section> <!-- .login-form -->
    </main>
</body>
</html>