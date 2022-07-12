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
    <img src="<?php echo $data['img']?>">
    <div class="title"><?php echo $data['title']?></div>
    <div class="date"><?php echo $data['creationDate']?></div>
    <a href=<?php echo $updateUrl?>>
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
        </svg>
        <p>Edit</p>
    </a>
    <a class="delete delete-article" href="<?php echo "?delete-article=" . $data['ID']?>">                      
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
        </svg>
        <p>Delete</p>
    </a>
</div>
<?php endwhile;?>
<!-- Check manage-pages.php for where this is implemented -->
<!-- Note: You need jQuery and the sweet alerts cdn for this,  -->
<script>
    
    // All list items here will have this onclick event
     $('.delete-article').click(e => {

            // Ensures the click doesn't do anything else
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'Once deleted, this article cannot be restored',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1B9B55',
                cancelButtonColor: '#FF1F1F',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed){

                    // If confirmed is press, the window will switch pages
                    // Here it's going to the click's targeted link
                    window.location = e.currentTarget.href;
                }
            })
        })
</script>