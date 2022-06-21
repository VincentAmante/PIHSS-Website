<?php
    require 'connect.php';

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $articles = $conn->query("SELECT * from articles");
    }
?>

    <?php 
    while ($data = $articles->fetch_assoc()):?>
    <?php $updateUrl = "update-article.php?id=" . $data['ID'];?>
    <div class="row-item">
        <div class="title"><?php echo $data['title']?></div>
        <div class="date"><?php echo $data['creationDate']?></div>
        <a href=<?php echo $updateUrl?>>Edit Article</button>
        <a href="<?php echo "?delete-article=" . $data['ID']?>">Delete Article</button>
    </div>
<?php endwhile;?>