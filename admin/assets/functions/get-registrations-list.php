<?php
    require 'connect.php';

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $registrations = $conn->query("SELECT * from registrations ORDER BY creationTime DESC");
    }
?>
    <?php 
    while ($data = $registrations->fetch_assoc()):?>

    <tr class="row-item">
        <td>
            <p><?php echo $data['studentName']?></p>
        </td>
        <td>
            <p><?php echo $data['studentClass']?></p>
        </td>
        <td>
            <a class="delete delete-registration" href="?delete-registration=<?php echo $data['ID'];?>">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
            </svg>
            Delete Entry</a>
        </td>
        <td>
            <a href="./view-registration.php?id=<?php echo $data['ID'];?>">View Entry</a>
        </td>
    </tr>
<?php endwhile;?>
<script>
    $('.delete-registration').click(e => {
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: 'This will delete the registration form and its contents, this cannot be restored.',
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
$(document).ready( function () {
            $('#registrations-list').DataTable();
        } );
</script>