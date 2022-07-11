<?php
    if (isset($_SESSION['admin-is-primary'])){
        $isPrimary = $_SESSION['admin-is-primary'];
        if (!$isPrimary){
            header("Location: ./manage-pages.php");
            exit();
        }
    }

    if (isset($_GET['delete-account'])){
        $canDelete = true;

        $deleteId = $_GET['delete-account'];
        $getAccount = "SELECT * FROM admins WHERE ID= '$deleteId'";

        $getAccount_stmt = $conn->prepare($getAccount);
        $getAccount_stmt->execute(); 
        $accountToDelete = mysqli_fetch_assoc($getAccount_stmt->get_result());

        if ($accountToDelete != null){    
            if ($accountToDelete['isPrimary']){
                $primaryAccountsQuery = "SELECT * FROM admins WHERE isPrimary = 1";
                $stmt = $conn->prepare($primaryAccountsQuery);
                $stmt->execute(); 
                $queryResult = mysqli_num_rows($stmt->get_result());
                
                if ($queryResult <= 1){
                    $canDelete = false;

                    $cannotDeleteMessage = 
                    "<script>
                    Swal.fire({
                        title: 'Cannot delete!',
                        text: 'You need to have at least one primary account in the system!',
                        icon: 'warning',
                        confirmButtonColor: '#1B9B55',
                        confirmButtonText: 'Ok'
                    });
                    </script>";
                    
                    echo $cannotDeleteMessage;
                }
            }

            if ($canDelete){
                // If all checks are safe, begin deletion
                $deleteQuery = "DELETE FROM admins WHERE ID='$deleteId'";
                $deleteQuery_stmt = $conn->prepare($deleteQuery);
                $deleteQuery_stmt->execute();
            }
        }

    }
?>