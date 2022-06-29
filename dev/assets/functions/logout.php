<?php

// starts and destroys the session to logout
session_start();
session_destroy();

header("Location: ../../index.php");
?>