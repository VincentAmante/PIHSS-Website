<?php
    require './assets/functions/connect.php';

    if(isset($_POST['login-btn'])){
    $adminUser = $_POST['pihss-admin-username'];
    $adminPass = $_POST['pihss-admin-password'];

    $checkCredentials = "SELECT * FROM admins WHERE user = '$adminUser'";
    $stmt = $conn->prepare($checkCredentials);
    $stmt->execute();
    $queryResult = mysqli_fetch_assoc($stmt->get_result());

    if (password_verify($adminPass, $queryResult['password'])){
        $_SESSION['admin-user'] = $adminUser;
        $_SESSION['admin-is-primary'] = $queryResult['isPrimary'];
        header("Location: manage-pages.php");
        exit();
    }
    else {
        var_dump($queryResult);
        // Login failed
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/admin-page.css">
</head>
<body>
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
            <button>Forgot Password</button>
            </div>
        </form>
    </section>
    </main>
</body>
</html>