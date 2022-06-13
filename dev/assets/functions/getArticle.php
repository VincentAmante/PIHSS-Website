<?php
    // $firstName = $_POST['firstName'];
    // $lastName = $_POST['lastName'];
    // $age = $_POST['age'];

    $host = "localhost";
    $username = "root";

    $password = "";
    $databaseName = "pihss";

    $conn = new mysqli($host, $username, $password, $databaseName);

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        // * Sample code for receiving values from a database
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
                    <?php echo $data['content']?>
                </div>
            </div>
        </article>
    </li>
<?php endwhile;?>