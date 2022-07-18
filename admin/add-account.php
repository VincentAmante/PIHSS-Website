<?php

    // Page requires the account logged in to be a primary account
    include "./assets/functions/header.php";
    if (isset($_SESSION['admin-is-primary'])){
        $isPrimary = $_SESSION['admin-is-primary'];

        // Leave page if non-primary account
        if (!$isPrimary){
            header("Location: ./manage-pages.php");
            exit();
        }
    } else {
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Admin Page - Add Account</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/add-article.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
    <main>
        <section>
            <div class="form-wrapper">
                <form class="admin-form dropzone" id="admin-form" action="./assets/functions/create-account.php" method="POST">

                    <!-- User -->
                    <div class="form-item">
                        <label for="su-user">User</label>
                        <input type="text" id="user" name="username" spellcheck="false" autocomplete="off" required placeholder="Username">
                    </div>

                    <!-- Email -->
                    <div class="form-item">
                        <label for="su-email">Email</label>
                        <input type="email" id="email" name="email" spellcheck="false" autocomplete="off" required placeholder="Username">
                    </div>
                    <br>

                    <!-- Password -->
                    <div class="form-item">
                        <label for="su-password">Password</label>
                        <input type="password" id="password" name="password" spellcheck="false" autocomplete="off" required minlength="8">
                    </div>

                    <!-- Password Confirm -->
                    <div class="form-item">
                        <label for="su-password">Confirm Password</label>
                        <input type="password" id="password-retyped" name="password-retyped" spellcheck="false" autocomplete="off" required minlength="8">
                    </div>


                    <!-- Account Type -->
                    <div class="form-item">
                        <div class="is-primary-explanation">
                            <p>Both accounts are capable of editing the website contents, but only primary accounts can create or delete other accounts.</p>
                            <p>Create secondary accounts for when you want to give someone editing capabilities</p>
                        </div>

                        <div class="is-primary-options">    
                            <label for="primary">Primary</label>
                            <input type="radio" id="primary-option" name="is-primary" value="primary" required selected>
                            <label for="primary">Secondary</label>
                            <input type="radio" id="primary-option" name="is-primary" value="secondary" required>
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="form-item form-item-empty">
                        <div class="buttons">
                            <button class="form-button form-submit" name="create-account" value="create-account">Create Account</button>
                            <button class="form-button form-reset" type="reset">Clear</button>
                        </div>
                    </div>

                </form> <!-- #admin-form -->
            </div> <!-- .form-wrapper -->
        </section>
    </main>
    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>
    <script src="../assets/js/file-uploader-single.js"></script>
</body>
</html>