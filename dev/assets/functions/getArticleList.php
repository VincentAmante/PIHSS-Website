<?php
    require 'connect.php';

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        // * Sample code for receiving values from a database
        $articles = $conn->query("SELECT * from articles");
    }
?>

<?php 
while ($data = $articles->fetch_assoc()):?>
    <?php $updateUrl = "updateArticle.php?id=" . $data['ID'];?>
    <div class="row-item">
        <div class="id"><?php echo $data['ID']?></div>
        <div class="title"><?php echo $data['title']?></div>
        <div class="date"><?php echo $data['creationDate']?></div>
        <a href=<?php echo $updateUrl?>>Edit Article</button>
        <a href="">Delete Article</button>
    </div>
<?php endwhile;?>