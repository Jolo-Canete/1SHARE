<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify</title>
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

        .table {
            table-layout: fixed;
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
    width: 1%;
}

.table th,
.table td {
    width: calc((100% - 16%) / 29);
}
    </style>

</head>

<body>
    <main>
    <?php include "admin/adminnav.php" ?>
        <div class="page-content" id="content">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <form class="input-group mb-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
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
                        <div class="card" style="width: 78.5rem;">
                            <div class="card-header">
                                <b>List of Residents</b>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                                Status
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Verified</a></li>
                                                <li><a class="dropdown-item" href="#">Not Verified</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <form class="d-flex">
                                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        </form>
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th class="text-center">Purok</th>
                                            <th class="text-center">Zone</th>
                                            <th>Proof of Residency</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Climinten Ivy</td>
                                            <td>Chrysantemum</td>
                                            <td>Roses</td>
                                            <td>climintenroses</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">2</td>
                                            <td></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm border-0" data-bs-toggle="collapse" data-bs-target="#itemReportDetails-1" aria-expanded="false" aria-controls="itemReportDetails-1">
                                                    <i class="bi bi-plus-circle" style="font-size: 1rem; color: #0D6EFD;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="collapse" id="itemReportDetails-1">
                                            <td colspan="4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="reasonForReport" class="form-label"><b>Reason of Report</b></label>
                                                        <textarea class="form-control" id="reasonForReport" rows="3" readonly>qwerty</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="proof/evidence" class="form-label"><b>Proof/Evidence</b></label>
                                                        <textarea class="form-control" id="proof/evidence" rows="3" readonly></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nescafe</td>
                                            <td>Stick</td>
                                            <td>Coffeee</td>
                                            <td>nescafeoriginal</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">3</td>
                                            <td></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm border-0" data-bs-toggle="collapse" data-bs-target="#itemReportDetails-2" aria-expanded="false" aria-controls="itemReportDetails-2">
                                                    <i class="bi bi-plus-circle" style="font-size: 1rem; color: #0D6EFD;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr class="collapse" id="itemReportDetails-2">
                                            <td colspan="4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="reasonForReport" class="form-label"><b>Reason of Report</b></label>
                                                        <textarea class="form-control" id="reasonForReport" rows="3" readonly>qwerty</textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="proof/evidence" class="form-label"><b>Proof/Evidence</b></label>
                                                        <textarea class="form-control" id="proof/evidence" rows="3" readonly></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="row g-2">
                                            <div class="col">
                                                <input type="number" id="numRowsInput" class="form-control form-control-sm me-2" placeholder="Number of Rows">
                                            </div>
                                            <div class="col">
                                                <button id="toggleRowsButton" class="btn btn-primary btn-sm">Show Rows</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var numRowsInput = document.getElementById("numRowsInput");
            var button = document.getElementById("toggleRowsButton");
            var tableRows = document.querySelectorAll("tbody tr");
            var showLimited = true;

            function toggleRows() {
                var numRowsToShow = parseInt(numRowsInput.value);
                if (isNaN(numRowsToShow) || numRowsToShow <= 0) {
                    alert("Please enter a valid number of rows.");
                    return;
                }

                for (var i = 0; i < tableRows.length; i++) {
                    if (i >= numRowsToShow) {
                        tableRows[i].classList.add("d-none");
                    } else {
                        tableRows[i].classList.remove("d-none");
                    }
                }

                button.textContent = showLimited ? "Show All Rows" : "Show Limited Rows";
                showLimited = !showLimited;
            }

            button.addEventListener("click", toggleRows);
        });
    </script>
</body>

</html>