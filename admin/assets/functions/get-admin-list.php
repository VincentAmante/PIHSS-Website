<?php
    require 'config.php';
    require_once "./allow-only-ajax.php";

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $admins = $conn->query("SELECT * from admins");
    }
?>

    <?php 
    while ($data = $admins->fetch_assoc()):?>
    <div class="row-item">
        <div class="title"><?php echo $data['user']?></div>
        <div class="date"><?php echo ($data['isPrimary'])? 'Primary' : 'Secondary'; ?></div>
        <a class="delete delete-account" href="<?php echo "?delete-account=" . $data['ID']?>">                      
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
            </svg>
            <p>Delete</p>
        </a>
    </div>
<?php endwhile;?>
<script>
    $('.delete-account').click(e => {
        console.log(e);
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: 'User cannot be restored',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1B9B55',
        cancelButtonColor: '#FF1F1F',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed){
            window.location = e.currentTarget.href;
        }
    });
})
</script>