<?php
  $UserLogedin = false;
  
  if (isset($_SESSION['ID']) && isset($_SESSION['User_Name'])) {
    $UserLogedin = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=getTitle()?></title>
    <link rel="stylesheet" href="layout/css/normalize.css">

    <!-- Bootstrap 5.0.2 -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&family=Libre+Baskerville&family=Playfair+Display&family=Bree+Serif&family=STIX+Two+Text&family=Roboto+Mono:wght@100&family=Kaisei+Decol&family=Amiri&family=Besley&family=Source+Serif+Pro:wght@200&display=swap" rel="stylesheet"> 

    <!-- font-awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--  Noty js  -->
    <link rel="stylesheet" href="includes/library/noty/noty.css">
    <script src="includes/library/noty/noty.min.js"></script>

    <!--  owl.carousel  -->
    <link rel="stylesheet" href="layout/css/owl.carousel.min.css">
    <link rel="stylesheet" href="layout/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="layout/css/style5.css">
</head>
<body>

<div class="upper-bar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="layout/images/apple-touch-icon-57x57.png" alt="" width="46" height="42" class="d-inline-block align-text-top">
          fashion
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./shop.php">Shop</a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle"id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Collection
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="./shop.php?&mainCatID=1">Men</a></li>
                  <li><a class="dropdown-item" href="./shop.php?&mainCatID=2">Women</a></li>
                  <li><a class="dropdown-item" href="./shop.php?&mainCatID=3">Kid's</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./shopping-cart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./liked-products.php">Liked Products</a>
            </li>
            <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle"id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </a>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <?= (!$UserLogedin)? '<li><a class="dropdown-item" href="./login.php">Login</a></li>' : ''?>
                  <?= (!$UserLogedin)? '<li><a class="dropdown-item" href="./register.php">Register</a></li>' : ''?>
                  <?= ($UserLogedin)? '<li><a class="dropdown-item" href="./logout.php">Logout</a></li>' : ''?>
                </ul>
              </div>
            </li>
          </ul>
          <form action="./shop.php" method="get">
            <div class="form-group w-100">
              <div class="row">
                <div class="col position-relative">
                <input type="text" class="form-control d-inline w-auto cust-search-index-txt" name="search">
                <button class="btn btn-outline-warning d-inline position-absolute cust-search-index-btn" ><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </nav>

</div>
