<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>   
           <?php
    include("css.css");
    ?>
    </style>
    
</head>

<body>

<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
    <div class="container">
        <a class="navbar-brand" href="#">I S H A R E</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarsExample02">
    <form role="search" class="w-50">
        <div class="input-group">
            <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" style="background-color: white;">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary rounded-0" type="button" style="border-color: black; background-color: black;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>



        <div class="d-flex">
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

       
               
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarToggleExternalContent">
            <div class="offcanvas-header">
                <h5 class="text-dark h4">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                                <div class="card" style="width: 23rem;">
                                    <div class="card-header">
                                        <div class="dropdown">
                                            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="https://github.com/mdo.png" alt="" width="50" height="50" class="rounded-circle me-2">
                                                <strong>&nbsp;Jolo A. Cañete</strong>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <ul class="nav nav-pills flex-column mb-auto">

                                       

      <li class="nav-item">
      <a href="nav.php" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="nav.php"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="finditem.php" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="finditem.php"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Items
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Request
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Cart
        </a>
      </li>
    </ul>
    <hr>
                                 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        
    </main>
    </body>

</html>