<?php
if(isset($_POST['login-btn'])){
    $adminUser = $_POST['login-username'];
    $adminPass = $_POST['login-password'];

    $checkCredentials = mysqli_query($con, "SELECT * FROM admins WHERE user = '$adminUser' AND password = '$password'");
    $queryResult = mysqli_num_rows($checkCredentials);

    if ($queryResult == 1){
        echo 'Login worked';
        $_SESSION['admin-user'] = $adminUser;
        header("Location: manage-pages.php");
        // exit();
    }
    else {
        echo 'Login failed;';
    }
}
?>