
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

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    include "./assets/functions/header.php";
    include "./assets/functions/handle-accounts.php";
?>
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