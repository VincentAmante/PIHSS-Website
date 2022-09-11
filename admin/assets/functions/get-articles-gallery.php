<?php
require "config.php";

if ($conn->connect_error) {
    die('Connection Failure : ' + $conn->connect_error);
} else {
    $articles = $conn->query("SELECT * from articles ORDER BY creationDate DESC");
    $imgFolderDir = getPathToRoot() . $ARTICLE_IMG_DIR;
}

// If there is no special request for a specific amount of articles
if (!isset($_GET['articles-count'])){
    while ($data = $articles->fetch_assoc()) : ?>
        <article>
            <a href="<?php echo './news-article.php?id=' . $data['ID']?>">
                <div class="article-image">
                    <img src="<?php echo $imgFolderDir . $data['img']?>" alt="">
                </div>
                <div class="article-content">
                    <div class="content-wrapper">
                        <div class="article-text">
                            <?php echo $data['title']?>
                        </div>
                        <div class="news-btn">
                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </article>
    <?php endwhile;
} 
else {

    // Handles providing a specific amount of articles
    // Gives empty articles if the requested amount of articles is more than current available 
        // - only after iterating through all existing ones
    $articlesList = $articles->fetch_all(MYSQLI_ASSOC);

    if (count($articlesList) < $_GET['articles-count']){
        foreach ($articlesList as $index => $data):?>
        <article>
            <a href="<?php echo './news-article.php?id=' . $data['ID']?>">
                <div class="article-image">
                    <img src="<?php echo $imgFolderDir .  $data['img']?>" alt="">
                </div>
                <div class="article-content">
                    <div class="content-wrapper">
                        <div class="article-text">
                            <?php echo $data['title']?>
                        </div>
                        <div class="news-btn">
                            <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </article>
        <?php endforeach;
        for ($i = $_GET['articles-count'] - count($articlesList); $i > 0; $i--):?>
            <article class="empty">
                <a>
                    <div class="article-image">
                    </div>
                    <div class="article-content">
                        <div class="content-wrapper">
                            <div class="article-text">
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        <?php endfor;
    } 
    
    // Provides up to the required amount of articles if existing entries are more or exactly as required
    else {
        for ($i = 0; $i < $_GET['articles-count']; $i++):?>
            <article>
                <a href="<?php echo './news-article.php?id=' . $articlesList[$i]['ID']?>">
                    <div class="article-image">
                        <img src="<?php echo $imgFolderDir . $articlesList[$i]['img']?>" alt="">
                    </div>
                    <div class="article-content">
                        <div class="content-wrapper">
                            <div class="article-text">
                                <?php echo $articlesList[$i]['title']?>
                            </div>
                            <div class="news-btn">
                                <svg style="width:100%;height:100%" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        <?php endfor;
    }
}

$conn->close();
?>