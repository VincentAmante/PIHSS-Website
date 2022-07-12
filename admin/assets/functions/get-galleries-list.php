<?php
    require 'connect.php';

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $galleries = $conn->query("SELECT * from galleries WHERE 'isActivity'=0");
    }
?>

    <?php 
    while ($data = $galleries->fetch_assoc()):?>
    <?php $updateUrl = "update-gallery-content.php?id=" . $data['ID'];?>
    
    <div class="row-item">
        <img src="<?php echo $data['thumbnail']?>">
        <div class="title"><?php echo $data['title']?></div>
        <div class="date"><?php echo $data['creationDate']?></div>
        <a href="<?php echo $updateUrl?>">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
            </svg>
            <p>Edit</p>
        </a>
        <a class="delete delete-gallery" 
        href="<?php echo "?delete-gallery=" . $data['ID']?>">                      
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
            </svg>
            <p>Delete</p>
        </a>
    </div>
<?php endwhile;?>
<script>
    $('.delete-gallery').click(e => {
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will delete the gallery and its contents, this cannot be restored.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1B9B55',
        cancelButtonColor: '#FF1F1F',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed){
            window.location = e.currentTarget.href;
        }
    })
})
</script>