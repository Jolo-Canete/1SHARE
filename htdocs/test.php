<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Code</title>

  <!--- Bootstrap CSS --->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!--- Bootstrap Icon --->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-T0tuhcQj1SvaXrFt7Xt0Z7raamA9TDTwim3BK5hFuUMRKEiSEYjb9/2Wsgot7P2VK6AWFk7IOW6UDgDZ2KyE5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <!--- Style --->
  <style>
    .dropdown:hover .dropdown-menu {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .sidebar {
      width: 280px;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      z-index: 1030;
      background-color: #212529;
    }

    .sidebar a {
      padding: 10px;
      text-decoration: none;
      color: white;
      display: block;
      transition: padding 0.3s;
    }

    .sidebar a:hover {
      padding-left: 20px;
      background-color: #495057;
    }

    .navbar {
      z-index: 1031;
    }
    
  </style>

</head>

<body>
  <header class="p-3 bg-dark text-bg-dark">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <!--- Add content --->
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <!--- Add content --->
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
              <input type="search" class="form-control rounded-0 form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
              <!--- Add content --->
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
<main>
  <div class="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="picture/logo.png" alt="I S H A R E logo" style="height: 30px;">
        <span class="fs-4 ms-lg-3">I S H A R E</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
            <div class="bi-house-door" width="16" height="16">
              <span class="fs-8 ms-lg-2">Home</span>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <div class="bi-person-circle" width="16" height="16">
              <span class="fs-8 ms-lg-2">Profile</span>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <div class="bi-box" width="16" height="16">
              <span class="fs-8 ms-lg-2">Inventory</span>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <div class="bi-card-checklist" width="16" height="16">
              <span class="fs-8 ms-lg-2">Request Approval</span>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <div class="bi-cart" width="16" height="16">
              <span class="fs-8 ms-lg-2">Cart</span>
            </div>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <div class="bi-speedometer2" width="16" height="16">
              <span class="fs-8 ms-lg-2">Dashboard</span>
            </div>   
          </a>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <div class="bi-gear" width="16" height="16">
              <span class="fs-8 ms-lg-2">Settings</span>
            </div>
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>
</main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>