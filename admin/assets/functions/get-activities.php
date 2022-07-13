<?php
    require "connect.php";

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $activities = $conn->query("SELECT * from galleries WHERE isActivity=1");
    }

while ($data = $activities->fetch_assoc()):?>
<?php $images = json_decode($data['images'], true);
?>
    <div class="activity-container">
        <div class="content">
            <div class="activity-heading">
                <h3 class="decorated"><span><?php echo $data['title']?>n</span></h3>
            </div>

            <div class="activity-images">
                <img src="<?php echo $images[0]['path'];?>" alt="" />
                <img src="<?php echo $images[1]['path'];?>" alt="" />
                <img src="<?php echo $images[2]['path'];?>" alt="" />
                <button><a href="<?php echo './gallery-history.php?id=' . $data['ID']?>">View More >></a></button>
            </div>
        </div>
    </div>
<?php endwhile;?>
