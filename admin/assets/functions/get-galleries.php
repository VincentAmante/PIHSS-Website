<?php
require "config.php";
require_once "./allow-only-ajax.php";

if ($conn->connect_error) {
    die('Connection Failure : ' + $conn->connect_error);
} else {
    $galleries = $conn->query("SELECT * from galleries ORDER BY creationDate DESC");
}

while ($data = $galleries->fetch_assoc()) : ?>
    <?php
    $thumbnailSrc = "";
    if ($data['isActivity']) {
        $thumbnailSrc = $GALLERY_THUMBNAILS_DIR . json_decode($data['images'], true)[0]['path'];
    } else {
        $thumbnailSrc = $GALLERY_THUMBNAILS_DIR . $data['thumbnail'];
    }
    ?>
    <div class="grid-item">
        <div class="item-image">
            <a href="<?php echo './gallery-subpage.php?id=' . $data['ID'] ?>">
                <img src="<?php echo $thumbnailSrc ?>" alt="" />
            </a>
        </div>
        <div class="item-text">
            <h2><?php echo $data['title'] ?></h2>
            <p><?php echo $data['creationDate'] ?></p>
        </div>
    </div>
<?php endwhile; ?>