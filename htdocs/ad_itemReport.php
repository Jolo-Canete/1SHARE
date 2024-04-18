<!doctype html>
<html lang="en">

<head>
    <title>Admin Item Report</title>
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
    </style>

</head>

<body>
    <main>
        <?php include "navadmin.php" ?>
        <div class="page-content" id="content">
            <div class="container my-5">
                <div class="row-md-12">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <b>List of Item Reported</b>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0px;">
                                                Date
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                                            <th>Reported By</th>
                                            <th>Item Reported</th>
                                            <th>Date Reported</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="badge text-bg-success rounded-pill">New</span> Detective Conan</td>
                                            <td class="fw-bold text-danger">Magnitude 1.2</td>
                                            <td>April 17, 2024 at 6:56:00 P.M.</td>
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
                                            <td>Detective Pepay</td>
                                            <td class="fw-bold text-danger">Nigger Horsey</td>
                                            <td>April 16, 2024 at 6:56:00 P.M.</td>
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
                                <div class="row mt-3">
                                    <div class="col">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end">
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
    </main>

    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>