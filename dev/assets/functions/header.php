<?php
    require 'connect.php';

    if (isset($_SESSION['admin-user'])){

        $user = $_SESSION['admin-user'];
        $checkCredentials = mysqli_query($conn, "SELECT * FROM admins WHERE user = '$user'");
        $queryResult = mysqli_num_rows($checkCredentials);
    
        if ($queryResult != 1){
            header("Location: admin-page.php");  
        }
    }
    else {
        header("Location: admin-page.php");
    }
?>

<header>
    <div class="top-header">
    <p><?php echo 'User: ' .  $_SESSION['admin-user']?></p>
    </div>
</header>