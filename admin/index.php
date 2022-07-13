<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/admin-page.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include './assets/functions/login.php'?>
    <main>
    <section class="login-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <h1>Login</h1>
            <div class="content">
            <div class="input-field">
                <input type="text" placeholder="User" autocomplete="nope" name="pihss-admin-username">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" autocomplete="new-password" name="pihss-admin-password">
            </div>
            <!-- <a href="#" class="link">Forgot Your Password?</a> -->
            </div>
            <div class="action">
            <button name="login-btn">Sign in</button>
            <!-- <button>Forgot Password</button> -->
            </div>
        </form>
    </section>
    </main>
</body>
</html>