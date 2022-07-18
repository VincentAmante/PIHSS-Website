<?php
    include "./assets/functions/header.php";
    $registrationId = $_GET['id'];

    // Fetches specific registration
    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $registrationQuery = "SELECT * from registrations WHERE ID=?";
        $stmt = $conn->prepare($registrationQuery);
        $stmt->bind_param('i', $registrationId);
        $stmt->execute();
        $regEntry = mysqli_fetch_assoc($stmt->get_result());
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Admin - Registration View</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/view-registration.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
    <main>
        <section>

            <!-- Student Information -->
            <table>
                <tbody>
                    <!-- Student General Information -->
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $regEntry['studentName']?></td>
                    </tr>
                    <tr>
                        <th>Student Gender</th>
                        <td><?php echo strtoupper($regEntry['gender'])?></td>
                    </tr>
                    <tr>
                        <th>Student Date of Birth</th>
                        <td><?php echo $regEntry['dateOfBirth']?></td>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <td><?php echo $regEntry['studentClass']?></td>
                    </tr>

                    <!-- Emirates ID Info -->
                    <tr class="divider">
                        <th colspan="2">Emirates ID Info</th>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td><?php echo $regEntry['eidNumber']?></td>
                    </tr>
                    <tr>
                        <th>Issue Date</th>
                        <td><?php echo $regEntry['eidIssue']?></td>
                    </tr>
                    <tr>
                        <th>Expiry Date</th>
                        <td><?php echo $regEntry['eidExpiry']?></td>
                    </tr>
                    <tr>
                        <th>Photo Copy Front</th>
                        <td>
                            <div>
                                <img src="<?php echo '../' . $regEntry['eidCopyFront']?>" alt="">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Photo Copy Back</th>
                        <td>
                            <div>
                                <img src="<?php echo '../' . $regEntry['eidCopyBack']?>" alt="">
                            </div>
                        </td>
                    </tr>

                    <!-- Parents Info -->
                    <tr class="divider">
                        <th colspan="2">Parents Info</th>
                    </tr>
                    <tr>
                        <th>Father's Name</th>
                        <td><?php echo $regEntry['fatherName']?></td>
                    </tr>
                    <tr>
                        <th>Father's Number</th>
                        <td><?php echo $regEntry['fatherNumber']?></td>
                    </tr>
                    <tr>
                        <th>Mother's Number</th>
                        <td><?php echo $regEntry['motherNumber']?></td>
                    </tr>
                    <tr>
                        <th>Father's Email</th>
                        <td><?php echo $regEntry['fatherEmail']?></td>
                    </tr>

                    <!-- Other Info -->
                    <tr class="divider">
                        <th colspan="2">Other Info</th>
                    </tr>
                    <tr>
                        <th>Passport Copy</th>
                        <td>
                            <div>
                                <img src="<?php echo '../' . $regEntry['passportCopy']?>" alt="">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Leave Certificate</th>
                        <td>
                            <div>
                                <img src="<?php echo '../' . $regEntry['leaveCertificate']?>" alt="">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>