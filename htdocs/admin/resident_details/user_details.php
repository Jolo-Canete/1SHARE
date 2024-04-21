<?php include '../1db.php';
$userID = $_GET['userID'];

// Run the mysql paramaters
$sql = "SELECT * FROM user WHERE userID = $userID";
$query = mysqli_query($conn, $sql);

// If the query returned false
if (!$query) {
    echo "<script>alert('Error updating Action, please try again')</script>";
    echo "<script>window.location.href='../ad_residents.php'</script>";
    exit;
// If the query returned empty
} elseif(mysqli_num_rows($query) == 0) {
        echo "<script>alert('User not found')</script>";
        echo "<script>window.location.href='../ad_residents.php'</script>";
        exit;
// array the user if true
    } else {
// Get the user Data
$user = array();

while ($userRow = mysqli_fetch_assoc($query)) {
    $userData = array(
        'firstName' => $userRow['firstName'],
        'middleName' => $userRow['middleName'],
        'lastName' => $userRow['lastName'],
        'contactNumber' => $userRow['contactNumber'],
        'zone' => $userRow['zone'],
        'purok' => $userRow['purok'],
        'dateJoined' => $userRow['dateJoined'],
        'userEmail' => $userRow['userEmail'],
        'status' => $userRow['status'],
        'userRating' => $userRow['userRating'],
        'userImage_path' => $userRow['userEmail'],
        'username' => $userRow['username'],
        'password' => $userRow['password'],
        'birthDay' => $userRow['birthDay'],
        
    );

    array_push($user, $userData);
}
    }








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--- Bootstrap Icon --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
    .table th, .table td {
        vertical-align: middle !important;
    }

    .table th {
        width: 20%;
    }

    .table td {
        width: 80%;
    }
</style>
</head>
<body>
<main>
<div class="page-content" id="content">
    <div class="container">
        <!-- Header for Table -->
        <div class="card col-12">
            <div class="card-header">
                <b>Edit Resident add userFirstName</b>
            </div>
        

        <!-- Body -->
        <div class="card-body">
            <div class="card mt-3">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"  style="table-layout: fixed;">
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 80%;">
                    </colgroup>
                        <tr>
                            <th>First Name:</th>
                            <td><input type="text" name="firstName" id=""></td>
                        </tr>
                        <tr>
                            <th>Middle Name:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Birthday:</th>
                            <td><input type="date" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td><input type="number" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Zone:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>
                        <tr>
                            <th>Purok:</th>
                            <td><input type="text" name="" id=""></td>
                        </tr>

                        </table>
                        <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary me-2">Save</button>
                        <button type="button" class="btn btn-warning me-2">Save but not exit</button>
                        <button type="button" class="btn btn-danger">Discard</button>
                    </div>
                    </div>

                </div>
            </div>
            <!--Add buttons here  -->
        </div>
    </div>

</div>
</main>








<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>