<?php
    require "connect.php";

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $articles = $conn->query("SELECT * from articles");
    }
?>

<?php while ($data = $articles->fetch_assoc()):?>
    <li>
        <article>
            <div class="article-img">
                <img src=<?php echo $data['img']?> alt="">
            </div>
            <div class="article-text">
                <div class="heading">
                    <div class="title"><?php echo $data['title']?></div>
                    <div class="date"><?php echo $data['creationDate']?></div>
                </div>
                <div class="main-text">
                    <?php echo $data['articleHtml']?>
                </div>
            </div>
        </article>
    </li>
<?php endwhile;?>