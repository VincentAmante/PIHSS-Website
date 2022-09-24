<?php
require "config.php";
require_once "./allow-only-ajax.php";

if ($conn->connect_error) {
    die('Connection Failure : ' + $conn->connect_error);
} else {
    $activities = $conn->query("SELECT * from galleries WHERE isActivity=1 ORDER BY creationDate DESC");
}

while ($data = $activities->fetch_assoc()) : ?>
    <?php $images = json_decode($data['images'], true);
        $updateUrl = "update-activity.php?id=" . $data['ID'];
        $imagesDir = getPathToRoot() 
        . $GALLERY_FOLDERS_DIR
        . $data['folderName']
        . '/';
    ?>
    <div class="activity-container">
        <div class="content">
            <div class="activity-heading">
                <h3 class="decorated"><span><?php echo $data['title'] ?></span></h3>
            </div>

            <div class="activity-images">
                <img src="<?php echo $imagesDir . $images[0]['name']; ?>" alt="" />
                <img src="<?php echo $imagesDir . $images[1]['name']; ?>" alt="" />
                <img src="<?php echo $imagesDir . $images[2]['name']; ?>" alt="" />
                <button><a href="<?php echo './gallery-subpage.php?id=' . $data['ID'] ?>">View More >></a></button>
            </div>
        </div>
    </div>
<?php endwhile; ?>