<?php include '../1db.php';
$userID = $_GET['userID'];

// Run the mysql paramaters
$sql = "SELECT * FROM user WHERE userID = $userID ORDER BY status DESC";
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
        'userImage_path' => $userRow['userEmail'],
        'username' => $userRow['username'],
        'password' => $userRow['password'],
        'birthDay' => $userRow['birthDay'],
        
    );

    array_push($user, $userData);
}
    }


    // Properly place the Birth
    $Birthday = date('Y-m-d', strtotime($userData ['birthDay']));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

    input[type="text"] {
  width: 250px;
    }

    input[type="number"] {
    width: 250px;
    }

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    
}

    input[type="password"] {
    width: 250px;
    }
    input[type="date"]{
        width: 250px;
    }

    .card-header {
            background-color: #899499;
            color: white;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 1.25rem;
            
        }


        .badge {
            font-size: 0.8rem;
        }

        .expandable-row .collapse {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
        }

        .collapse.show {
            display: table-row;
        }

        .btn-outline-secondary {
            border-radius: 0px;
        }

        .form-control {
            border-radius: 0px;
        }
        .alert.alert-danger {
  text-align: center;
}
</style>
</head>
<body>
<main>
<form action="" method="POST">
<div class="page-content" id="content">
    <div class="container">
        <!-- Header for Table -->
        <div class="card col-12">
            <div class="card-header">
                <b>Edit Resident: </b>
                <?php echo ucfirst($userData['firstName']) . ' ' . ucfirst($userData['lastName'])?>
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
                            <td><input type="text" name="firstName" class="form-control" aria-label="firstName" value="<? echo $userData['firstName'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Middle Name:</th>
                            <td><input type="text" name="middleName" class="form-control" value="<? echo $userData['middleName'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                            <td><input type="text" name="lastName" class="form-control" value="<? echo $userData['lastName'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Birthday:</th>
                            <td><input type="date" name="Birthday" class="form-control" value="<?php echo $Birthday ?>"></td>
                    </tr>
                    <tr>
                        <th>Contact Number:</th>
                            <td><input type="number" name="contactNumber" class="form-control" value="<? echo $userData['contactNumber'] ?>" ></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                            <td><input type="text" name="email" class="form-control" value="<? echo $userData['userEmail'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Username:</th>
                            <td><input type="text" name="username" class="form-control" value="<? echo $userData['username'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                            <td><input type="password" name="password" class="form-control" placeholder="The Password is hashed"></td>
                    </tr>
                    <tr>
                        <th>Zone:</th>
                            <td><input type="text" name="zone" class="form-control" value="<? echo $userData['zone'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Purok:</th>
                            <td><input type="text" name="purok" class="form-control" value="<? echo $userData['purok'] ?>"></td>
                    </tr>

                        </table>
                        <div class="d-flex justify-content-end mt-3">
                        <input type="submit" class="btn btn-primary me-2" name="exitSave" value="Save">
                        <input type="submit" class="btn btn-outline-primary me-2" name="save" value="Save but not exit">
                        <input type="submit" class="btn btn-outline-danger me-3" name="discard" value="Discard">
                        <!-- If the user is not verified input a delete user -->
                        <?php 
                            if($userData['status'] === 'Unverified' || $userData['status'] == null) {
                                echo '<input type="submit" class="btn btn-danger" name="deleteUser" value="Delete User">';
                            }
                        
                        
                        ?>
                    </div>
                    </div>

                </div>
            </div>
            <!-- Error alerts from the Php should be printed here -->
        </div>
    </div>

</div>
</form>

</main>



<!-- Php Script for the form -->
<?php 

// Check all errors
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If the user want to exit and save
    if(isset($_POST['exitSave'])) {
        // Get the parameters
        $firstName = trim($_POST['firstName']);
        $middleName = trim($_POST['middleName']);
        $lastName = trim($_POST['lastName']);
        $Birthday = date('Y-m-d', strtotime($_POST['Birthday']));
        $contactNumber = trim($_POST['contactNumber']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $zone = trim($_POST['zone']);
        $purok = trim($_POST['purok']);


    // Check if empty
        if (empty($firstName) || empty($middleName) || empty($lastName) || empty($Birthday) || empty($contactNumber) || empty($email) || empty($username)|| empty($zone) || empty($purok) ) {
            echo "<script>alert('Data inputs should not be empty')</script>";
            return;
        }
    // Check if the password has been changed
        if(empty(trim($_POST['password']))) {
            $password = $userData['password'];
        } else {
            if(strlen($_POST['password']) < 8) {
                echo '<div class="alert alert-danger mt-3">Password should be more than 8 characters</div>';
                return;

            } elseif(strlen($_POST['password']) > 14) {
                echo '<div class="alert alert-danger mt-3">Password should be  no more than 14 characters</div>';
                return;
            } else{
                // Generate a new hashed password
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
            }
        }

        // Check if the Phone Number is already taken, but only if it's been changed
        if ($contactNumber != $userData['contactNumber']) {
            $sql_PhoneNum = "SELECT * FROM user WHERE contactNumber = '$contactNumber'";
            $PhoneNum = $conn->query($sql_PhoneNum);
            if ($PhoneNum->num_rows > 0) {
                echo '<div class="alert alert-danger mt-3">Phone Number Cannot be used.</div>';
                return;
            } elseif (strlen($contactNumber) < 11) {
                echo '<div class="alert alert-danger mt-3">Contact Number must be 11 digits </div>';
                return;
            } elseif (strlen($contactNumber) > 11) {
                echo '<div class="alert alert-danger mt-3">Contact Number should only be 11 digits </div>';
                return;
            }
        }

        // If the email is already taken, but only if it's been changed
        if ($email != $userData['userEmail']) {
            $sql = "SELECT * FROM user WHERE userEmail = '$email'";
            $resultEmail = $conn->query($sql);
            if ($resultEmail->num_rows > 0) {
                echo '<div class="alert alert-danger mt-3">Email is already taken.</div>';
                return;
            }
        }

        // If the user is already taken, but only if it's been changed
        if ($username != $userData['username']) {
            $sql_username = "SELECT * FROM user WHERE username = '$username'";
            $resultUser = $conn->query($sql_username);
            if ($resultUser->num_rows > 0) {
                echo '<div class="alert alert-danger mt-3">Username is already taken.</div>';
                return;
            }
        }
 
        

    // Ready the sql
    $sqlUpdate = "UPDATE user SET
        firstName = '$firstName',
        middleName = '$middleName',
        lastName = '$lastName',
        birthDay = '$Birthday',
        contactNumber = '$contactNumber',
        userEmail = '$email',
        username = '$username',
        password = '$password',
        zone = '$zone',
        purok = '$purok'
    WHERE userID = $userID";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if ($resultUpdate) {
        echo "<script>alert('User Changes successful')</script>";
        echo "<script>window.location.href='../ad_residents.php'</script>";
    } else {
        echo "<script>alert('User Update Failed')</script>";
        return;
    }
    }

    // If the user want to edit but not leave yet
    if(isset($_POST['save'])) {
                // Get the parameters
        $firstName = trim($_POST['firstName']);
        $middleName = trim($_POST['middleName']);
        $lastName = trim($_POST['lastName']);
        $Birthday = date('Y-m-d', strtotime($_POST['Birthday']));
        $contactNumber = trim($_POST['contactNumber']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $zone = trim($_POST['zone']);
        $purok = trim($_POST['purok']);



    // Check if empty
        if (empty($firstName) || empty($middleName) || empty($lastName) || empty($Birthday) || empty($contactNumber) || empty($email) || empty($username)|| empty($zone) || empty($purok) ) {
            echo "<script>alert('Data inputs should not be empty')</script>";
            return;
        }
    // Check if the password has been changed
        if(empty(trim($_POST['password']))) {
            $password = $userData['password'];
        } else {
            if(strlen($_POST['password']) < 8) {
                echo '<div class="alert alert-danger mt-3">Password should be more than 8 characters</div>';
                return;

            } elseif(strlen($_POST['password']) > 14) {
                echo '<div class="alert alert-danger mt-3">Password should be  no more than 14 characters</div>';
                return;
            } else{
                // Generate a new hashed password
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
            }
        }

        // Check if the Phone Number is already taken, but only if it's been changed
        if ($contactNumber != $userData['contactNumber']) {
            $sql_PhoneNum = "SELECT * FROM user WHERE contactNumber = '$contactNumber'";
            $PhoneNum = $conn->query($sql_PhoneNum);
            if ($PhoneNum->num_rows > 0) {
                echo '<div class="alert alert-danger mt-3">Phone Number Cannot be used.</div>';
                return;
            } elseif (strlen($contactNumber) < 11) {
                echo '<div class="alert alert-danger mt-3">Contact Number must be 11 digits </div>';
                return;
            } elseif (strlen($contactNumber) > 11) {
                echo '<div class="alert alert-danger mt-3">Contact Number should only be 11 digits </div>';
                return;
            }
        }

        // If the email is already taken, but only if it's been changed
        if ($email != $userData['userEmail']) {
            $sql = "SELECT * FROM user WHERE userEmail = '$email'";
            $resultEmail = $conn->query($sql);
            if ($resultEmail->num_rows > 0) {
                echo '<div class="alert alert-danger mt-3">Email is already taken.</div>';
                return;
            }
        }

        // If the user is already taken, but only if it's been changed
        if ($username != $userData['username']) {
            $sql_username = "SELECT * FROM user WHERE username = '$username'";
            $resultUser = $conn->query($sql_username);
            if ($resultUser->num_rows > 0) {
                echo '<div class="alert alert-danger mt-3">Username is already taken.</div>';
                return;
            }
        }

    // Ready the sql
    $sqlUpdate = "UPDATE user SET
        firstName = '$firstName',
        middleName = '$middleName',
        lastName = '$lastName',
        birthDay = '$Birthday',
        contactNumber = '$contactNumber',
        userEmail = '$email',
        username = '$username',
        password = '$password',
        zone = '$zone',
        purok = '$purok'
    WHERE userID = $userID";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);

    if ($resultUpdate) {
        echo "<script>alert('User Changes successful')</script>";
    echo "<script>window.location.href='../action/user_details.php?userID=$userID'</script>";
    } else {
        echo "<script>alert('User Update Failed')</script>";
        return;
    }
} 

// If the user doesn't want to change something
    if (isset($_POST['discard'])) {
    echo "<script>window.location.href='../ad_residents.php'</script>";
    exit;
}

    // If the admin wants to delete the INverified user
    if(isset($_POST['deleteUser'])) {
        $sqlDelete = "DELETE FROM user WHERE userID = $userID";

        $resultUpdate = mysqli_query($conn, $sqlDelete);

        if ($resultUpdate) {
            echo "<script>alert('User Deleted Successfully')</script>";
            echo "<script>window.location.href='../ad_residents.php'</script>";
            exit;
        } else {
            echo "<script>alert('User Delete Failed')</script>";
            return;
        }
    }



    }
?>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>