<?php
    // Allows only AJAX requests
    // To be used for preventing direct access to specific PHP files without login

    // * not the best solution but it does limit direct access
    define('AJAX_REQUEST', 
    isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
        if(!AJAX_REQUEST) { 
        die(header('location: /error.php'));
    }
?>