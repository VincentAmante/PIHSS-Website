<?php
    include "./assets/functions/header.php";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Manager</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/manage-pages.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
    <main>
        <section>
            <div class="section-container">
                <h1>Accounts</h1>
                <table>
                    <thead>
                        <tr class="row-item">
                            <th>User</th>
                            <th>Type</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="admins-collection">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                <a href="./add-account.php">Add Account</a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>

        <section>

        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./assets/functions/get-admin-list.php",
                dataType: "html",
                success: (data) => {
                    $('#admins-collection').html(data);
                }
            })
        });
    </script>
</body>
</html>