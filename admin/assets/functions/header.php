<?php
require 'config.php';
require_once 'validate-user.php';
?>

<header class="header top-header-up" id="header">
    <div class="header-content" id="header-content">
        <div class="top-header" id="top-header">
            <a class="logo-container" href="./index.php">
                <div class="header-title">
                    <h1><?php echo 'User: ' .  $_SESSION['admin-user'] ?></h1>
                    <h2>Admin Page</h2>
                </div>
            </a>
            <div class="header-contacts">
                <?php
                if (isset($_SESSION['admin-is-primary'])) {
                    $isPrimary = $_SESSION['admin-is-primary'];
                    if ($isPrimary == true) {
                        echo '<a href="manage-accounts.php" class="contact">
                            <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" />
                            </svg>
                            <span>Manage Accounts</span>
                            </a>';
                    }
                }
                ?>
            </div>
        </div>
        <nav class="nav" id="nav">
            <ul class="nav-links">
                <li class="nav-element"><a href="../index.php">Website</a></li>
                <li class="nav-element"><a href="manage-pages.php">Manage Pages</a></li>
                <li class="nav-element nav-sub-list"><a href="">Handle Content</a>
                    <ul>
                        <li><a href="add-article.php">Add Article</a></li>
                        <li><a href="add-gallery.php">Add Gallery</a></li>
                        <li><a href="add-activity.php">Add Activity</a></li>
                        <li><a href="manage-events.php">Manage Events</a></li>
                    </ul>
                </li>
                <li class="nav-element nav-sub-list"><a href="">View Content</a>
                    <ul>
                        <li><a href="../news-article.php">News Articles</a></li>
                        <li><a href="../gallery.php#our-gallery">Galleries</a></li>
                        <li><a href="../our-school.php#school-activities">School Activities</a></li>
                    </ul>
                </li>
                <li class="nav-element"><a href="./assets/functions/logout.php">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <!-- Burger -->
    <div class="burger burger-alone" id="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</header>

<script src="../assets/js/global-scripts.js"></script>