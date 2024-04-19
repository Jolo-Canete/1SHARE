<!doctype html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <style>
        body {
            background-color: #f5f5f5;
        }

        #dropdownMenuButton.dropdown-toggle::after {
            display: none;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-body {
            padding: 1.5rem;
        }


        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
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
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-primary p-3" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-people me-1"></i>Residents</h5>
                                <p class="card-text">576</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-success p-3" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-box-seam me-1"></i>Items</h5>
                                <p class="card-text">1000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Residents</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Order</td>
                                            <td>576</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>$ 1,345</td>
                                        </tr>
                                        <tr>
                                            <td>Subscribers</td>
                                            <td>1,303</td>
                                        </tr>
                                        <tr>
                                            <td>Visitors</td>
                                            <td>1,294</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Items</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Order</td>
                                            <td>576</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>$ 1,345</td>
                                        </tr>
                                        <tr>
                                            <td>Subscribers</td>
                                            <td>1,303</td>
                                        </tr>
                                        <tr>
                                            <td>Visitors</td>
                                            <td>1,294</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Active Residents</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Order</td>
                                            <td>576</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>$ 1,345</td>
                                        </tr>
                                        <tr>
                                            <td>Subscribers</td>
                                            <td>1,303</td>
                                        </tr>
                                        <tr>
                                            <td>Visitors</td>
                                            <td>1,294</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Top Items</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Order</td>
                                            <td>576</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>$ 1,345</td>
                                        </tr>
                                        <tr>
                                            <td>Subscribers</td>
                                            <td>1,303</td>
                                        </tr>
                                        <tr>
                                            <td>Visitors</td>
                                            <td>1,294</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Highest rating residents</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Order</td>
                                            <td>576</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>$ 1,345</td>
                                        </tr>
                                        <tr>
                                            <td>Subscribers</td>
                                            <td>1,303</td>
                                        </tr>
                                        <tr>
                                            <td>Visitors</td>
                                            <td>1,294</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title mb-0">Highest rating items</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Order</td>
                                            <td>576</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>$ 1,345</td>
                                        </tr>
                                        <tr>
                                            <td>Subscribers</td>
                                            <td>1,303</td>
                                        </tr>
                                        <tr>
                                            <td>Visitors</td>
                                            <td>1,294</td>
                                        </tr>
                                    </tbody>
                                </table>
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