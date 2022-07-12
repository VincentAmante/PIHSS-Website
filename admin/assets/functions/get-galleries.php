<?php
    require "connect.php";

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $galleries = $conn->query("SELECT * from galleries");
    }
?>

<?php while ($data = $galleries->fetch_assoc()):?>
    <div class="grid-item">
        <div class="item-image">
            <a href="<?php echo './gallery/gallery-history.php?id=' . $data['ID']?>">
                <img src="<?php echo  './dev/' . $data['thumbnail']?>" alt="" />
            </a>
        </div>
        <div class="item-text">
            <h2><?php echo $data['title']?></h2>
            <p><?php echo $data['creationDate']?></p>
        </div>
    </div>
<?php endwhile;?>