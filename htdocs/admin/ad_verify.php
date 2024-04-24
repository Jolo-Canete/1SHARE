<?php 
include "./1db.php"; include "./adminnav.php";

// Check errors
ini_set('display_errors', 1);

// Get the current page number from the URL, or use 1 if not set
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Set the number of records to display per page
$recordsPerPage = 5;

// Calculate the offset for the SQL query based on the current page
$offset = ($currentPage - 1) * $recordsPerPage;

// Fetch the unverified users from the database, limiting the results based on the current page
$sqlUnverified = "SELECT * FROM user WHERE COALESCE(status, 'UnVerified') = 'UnVerified' LIMIT $offset, $recordsPerPage";
$resultVerified = $conn->query($sqlUnverified);

// Get the total number of unverified users
$totalRecords = $conn->query("SELECT COUNT(*) FROM user WHERE COALESCE(status, 'UnVerified') = 'UnVerified'")->fetch_row()[0];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Resident Verification</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <style>

        #dropdownMenuButton.dropdown-toggle::after {
            display: none;
        }

        .expandable-row .collapse {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
        }

        

        .table th,
        .table td {
            width: 1%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

.table th:nth-child(5),
.table td:nth-child(5),
.table th:nth-child(6),
.table td:nth-child(6) {
    width: 3%;
}

.table th,
.table td {
    width: calc((100% - 16%) / 29);
}

/* Hide the input number buttons */
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Expand the textField of number */
input[type=number] {
    width: 200px;
}


    </style>
</head>
<body>
    <main>
        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <form class="input-group mb-3">
                            </button>
                        </form>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn border-0 text-dark p-0 mb-3 dropdown-toggle" type="button" style="font-size: 1.3rem;" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Help</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                <b>List of  Unverified Residents</b>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        </form>
                                    </div>
                                </div>
                                <div class="mb-3"> <!--Just a necessity blank space --> </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-fixed w-100">
                                    <thead>
                                        <tr>
                                        <th class="col-2">Resident's Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Purok</th>
                                        <th class="text-center">Zone</th>
                                        <th>Proof of Residency</th>
                                        <th class="text-center" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
            // Loop through the fetched unverified users and display them in the table
            if ($resultVerified->num_rows > 0) {
                while ($rowVerified = $resultVerified->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . ucfirst($rowVerified['firstName']) . ' ' . ucfirst($rowVerified['lastName']) . '</td>';
                    echo '<td>' . $rowVerified['username'] . '</td>';
                    echo '<td class="text-center">' . ucfirst($rowVerified['purok']) . '</td>';
                    echo '<td class="text-center">' . ucfirst($rowVerified['zone']) . '</td>';

                    // Display the verification image
                    echo '<td align="center">';
                    echo '<img src="../verify/' . $rowVerified['verifyImage_path'] . '" alt="Verification Image" width="100" height="100">';
                    echo '</td>';

                    // Display the verify and delete buttons
                    echo '<form action="" method="post">';
                    echo '<td class="text-center">' .
                        '<input type="hidden" id="residentID" name="userID" value="' . $rowVerified['userID'] . '">' .
                        '<button type="submit" class="btn btn-sm border-0 has-tooltip" title="Verify Resident" name="verifyResident">
                        <i class="bi bi-person-check" style="font-size: 1.5rem; color: #0D6EFD;"></i>
                        </button>' .
                        '</td>';
                    echo '<td class="text-center">' .
                        '<button type="submit" class="btn btn -sm border-0 has-tooltip" title="Reject Resident" name="deleteResident"><i class="bi bi-x-circle" style="font-size: 1.5rem; color: #dc3545;"></i></button>' .
                        '</td>';
                    echo '</form>';
                    echo '</tr>';
                }
            }
            ?>
                                    </tbody>
                                </table>
                            </div>
                                <div class="row align-items-center">
                                    <div class="col-3">
                                    </div>
<!-- Pagination -->
<div class="col">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end mb-0">
            <!-- Previous page link -->
            <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Page number links -->
            <?php
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '">
                        <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                      </li>';
            }
            ?>

            <!-- Next page link -->
            <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Update the user status -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['verifyResident'])) {
        $userID = trim($_POST['userID']);
    
    if(empty($userID)) {
     // Refresh the File
    echo "<script>alert('Cannot be verified due to empty value on the User ID')</script>";
    return;
    }
    // Update the user to Verified
    $updateStatus = 'Verified';
    // Get the current time stamp
    $dateVerified = date('Y-m-d H:i:s');

    // Prepare the sql statement
    $sqlUpdateStatus = "UPDATE user SET status = '$updateStatus', dateVerified = '$dateVerified' WHERE userID = '$userID'";
        
    // Run the sql statement
    $query = $conn->query($sqlUpdateStatus);

    // Refresh the File
    echo "<script>alert('Congratulations!, New User has been registered')</script>";
    echo "<script>window.location.href='./ad_verify.php'</script>";
  
    }

// If the Admin does not want to verify the user
    if(isset($_POST['deleteResident'])) {
        $userID = trim($_POST['userID']);

        // If the user ID is null
        if(empty($userID)) {
            // Refresh the File
           echo "<script>alert('Cannot be verified due to empty value on the User ID')</script>";
           return;
           } else  {

            // Delete the user
            $sqlUpdateStatus = "DELETE FROM user WHERE userID = $userID";

            // Execute the sql statement
            if($conn->query($sqlUpdateStatus) === TRUE) {
                // Delete the User
                echo "<script>alert('Resident Account has been deleted due to failed verification')</script>";
                echo "<script>window.location.href='./ad_verify.php'</script>";

            } else {
                echo '<div class="alert alert-danger mt-3">Resident Account cannot be deleted due to database error->' . $conn->error . ' </div>';
            }
         }
    }
} 
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Get the necessary elements
  var tableRows = document.querySelectorAll("tbody tr");
  var pageLinks = document.querySelectorAll(".page-link");
  var prevLink = document.querySelector(".page-item.disabled .page-link");
  var nextLink = document.querySelector(".page-item:not(.disabled) .page-link[aria-label='Next']");
  var defaultRowsToShow = <?php echo $recordsPerPage; ?>; // Set the default number of rows to show
  var currentPage = <?php echo $currentPage; ?>; // Initialize the current page to the current page number
  var totalPages = <?php echo $totalPages; ?>; // Set the total number of pages

  function updatePagination() {
    // Calculate the current page based on the visible rows
    currentPage = Math.ceil((tableRows.length - document.querySelectorAll("tbody tr:not(.d-none)").length) / defaultRowsToShow) + 1;

    // Update the pagination links
    for (var i = 0; i < pageLinks.length; i++) {
      pageLinks[i].classList.remove("active");
      if (i === currentPage - 1) {
        pageLinks[i].classList.add("active");
      }
    }

    // Update the "Previous" and "Next" links
    if (currentPage === 1) {
      prevLink.parentElement.classList.add("disabled");
    } else {
      prevLink.parentElement.classList.remove("disabled");
    }

    if (currentPage === totalPages) {
      nextLink.parentElement.classList.add("disabled");
    } else {
      nextLink.parentElement.classList.remove("disabled");
    }

    // Update the page number links
    var startPage = Math.max(currentPage - 2, 1);
    var endPage = Math.min(startPage + 4, totalPages);

    for (var i = 0; i < pageLinks.length; i++) {
      if (i < endPage - startPage + 1) {
        pageLinks[i].textContent = startPage + i;
        pageLinks[i].href = "?page=" + (startPage + i);
        pageLinks[i].style.display = "";
        if (startPage + i === 1) {
          pageLinks[i].parentElement.classList.remove("disabled");
        }
      } else {
        pageLinks[i].style.display = "none";
      }
    }
  }

  // Add click event listeners to the pagination links
  for (var i = 0; i < pageLinks.length; i++) {
    pageLinks[i].addEventListener("click", function(event) {
      event.preventDefault();
      if (!this.parentElement.classList.contains("disabled")) {
        var pageNumber = parseInt(this.textContent);
        showPage(pageNumber);
      }
    });
  }

  // Add click event listeners to the "Previous" and "Next" links
  prevLink.addEventListener("click", function(event) {
    event.preventDefault();
    if (!prevLink.parentElement.classList.contains("disabled")) {
      showPage(currentPage - 1);
    }
  });

  nextLink.addEventListener("click", function(event) {
    event.preventDefault();
    if (!nextLink.parentElement.classList.contains("disabled")) {
      showPage(currentPage + 1);
    }
  });

  function showPage(pageNumber) {
    // Calculate the start and end index of the rows to show
    var startIndex = (pageNumber - 1) * defaultRowsToShow;
    var endIndex = startIndex + defaultRowsToShow;

    // Show the rows for the selected page
    for (var i = 0; i < tableRows.length; i++) {
      if (i >= startIndex && i < endIndex) {
        tableRows[i].style.display = ""; // Show the rows
      } else {
        tableRows[i].style.display = "none"; // Hide the rows
      }
    }

    // Update the pagination links
    updatePagination();
  }

  // Show the first page initially
  showPage(1);
});

</script>
</body>

</html>