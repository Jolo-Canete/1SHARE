<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests Page</title>
</head>

<body>
    <header>
        <?php include "nav.php"; ?>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-arrow-down"></i> Incoming Requests</h5>
                    </div>
                    <div class="card-body">
                        <!-- Incoming Requests Content Goes Here -->
                        <p>No incoming requests at the moment.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-arrow-up"></i> Pending Requests</h5>
                    </div>
                    <div class="card-body">
                        <!-- Pending Requests Content Goes Here -->
                        <p>No pending requests at the moment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
</body>

</html>