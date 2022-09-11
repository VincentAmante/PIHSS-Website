<?php
    require "config.php";

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        // If an id is present, gets that first
        if (isset($_GET['id'])){
            $articleQuery = "SELECT * from articles ORDER BY ID=? desc, creationDate DESC";
        }
        else {
            $articleQuery = "SELECT * from articles ORDER BY creationDate DESC";
        }
        $stmt = $conn->prepare($articleQuery);


        if (isset($_GET['id'])){
            $articleId = $_GET['id'];
            $stmt->bind_param('s', $articleId);
        }

        $stmt->execute();
        $articles = $stmt->get_result();
        $imgFolderDir = getPathToRoot() . $ARTICLE_IMG_DIR;
    }
?>

<?php while ($data = $articles->fetch_assoc()):?>
    <li>
        <article id="<?php echo 'article-' . $data['ID'];?>">
            <div class="article-img">
                <img src="<?php echo $imgFolderDir . $data['img']?>" alt="">
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