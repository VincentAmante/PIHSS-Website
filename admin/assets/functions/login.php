<?php
    require './assets/functions/connect.php';

    if(isset($_POST['return-page'])){
        header("Location: /index.php");
        exit();
    }

    if (isset($_SESSION['admin-user'])){
        $adminUser = $_SESSION['admin-user'];

        $checkCredentials = "SELECT * FROM admins WHERE user = ?";
        $stmt = $conn->prepare($checkCredentials);
        $stmt->bind_param('s', $adminUser);
        $stmt->execute();
        $queryResult = mysqli_fetch_assoc($stmt->get_result());

        if ($queryResult != null){
            header("Location: manage-pages.php");
        }
    }

    if(isset($_POST['login-btn'])){
        $adminUser = $_POST['pihss-admin-username'];
        $adminPass = $_POST['pihss-admin-password'];

        $checkCredentials = "SELECT * FROM admins WHERE user = ?";
        $stmt = $conn->prepare($checkCredentials);
        $stmt->bind_param('s', $adminUser);
        $stmt->execute();
        $queryResult = mysqli_fetch_assoc($stmt->get_result());

        if ($queryResult != null && password_verify($adminPass, $queryResult['password'])){
            // Saves session variables
            $_SESSION['admin-user'] = $adminUser;
            $_SESSION['admin-is-primary'] = $queryResult['isPrimary'];
            header("Location: manage-pages.php");
        }
        else  {
            ?>
            <script>
                Swal.fire({
                            title: 'Invalid Login!',
                            text: 'Try typing your credentials again!',
                            icon: 'warning',
                            confirmButtonColor: '#1B9B55',
                            confirmButtonText: 'Ok' 
                        });
            </script>
            <?php
        }
    }
?>