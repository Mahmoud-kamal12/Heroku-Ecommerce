<?php
    // Global VAR
    $script = "<script src='layout/js/index-page2.js'></script>";
    $pageTitle = "Home";
    ob_start();
    session_start();
    include 'init.php';
    include "controllers/index-controller.php";

?>

<div class="header">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="layout/images/header/blog-post-6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Black Friday</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="layout/images/header/home2-default-banner2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Black Friday</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="layout/images/header/home3-banner.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Black Friday</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    <div class="main-categories">
      <div class="container">
        <div class="row">
          <div class="col col-12 col-lg-4">
            <img src="layout/images/banner-1.jpg" alt="" srcset="">
            <div class="out-cat">
              <a class="inner-text btn btn btn-outline-light" href="./shop.php?&mainCatID=1">
                <h4>Men’s</h4>
              </a>
            </div>
          </div>
          <div class="col col-12 col-lg-4">
            <img src="layout/images/banner-2.jpg" alt="" srcset="">
            <div class="out-cat">
              <a class="inner-text btn btn-outline-light" href="./shop.php?&mainCatID=2">
                <h4>Women’s</h4>
              </a>
            </div>
          </div>
          <div class="col col-12 col-lg-4">
            <img src="layout/images/banner-3.jpg" alt="">
            <div class="out-cat">
                <a class="inner-text btn btn btn-outline-light" href="./shop.php?&mainCatID=3">
                  <h4 >Kid’s</h4>
                </a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="men">
      <div class="container">
        <div class="row justify-content-between">

          <div class="col col-12 col-lg-4 " style="overflow: hidden;">
            <img src="layout/images/man-large.jpg" alt="" srcset="" style="width: 100%;height: 100%;">
          </div>

          <div class="col col-8" style="overflow: hidden;min-height: 100%;">
            <div class="row" style=" justify-content: space-around;min-height: 100%" >
              <div class="col owl-carousel owl-theme" style="min-height: 100%;display: block;">
                  
                  <?php

                    foreach ($men as $product){
                        $src = getImage($product);

                        echo <<< ITEM
                        <div class="item">
                          <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions"> 
                                  <img src="{$src}" class="card-img img-fluid" width="96" height="350" alt=""> 
                                </div>
                            </div>
                            <div class="card-body bg-light text-center">
                                <div class="mb-2">
                                    <h6 class="font-weight-semibold mb-2"> <a href="./product-details.php?id={$product['Product_ID']}" class="text-default mb-2" data-abc="true" style = "text-transform: capitalize;">{$product['Product_Name']}</a> </h6> <p class="text-muted" data-abc="true" style = " text-decoration: underline;">{$product['Brand_Name']}</p>
                                </div>
                                <h3 class="mb-0 font-weight-semibold">$ {$product['Product_Sale_Price']}</h3>
                                <div> 
                                  <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> 
                                </div>
                                <div class="text-muted mb-3">34 reviews</div> 
                                <form action="./controllers/add-cart.php" method="post" >
                                <input type="hidden" name="id" value="{$product['Product_ID']}">
                                <button type="submit" class="btn btn-outline-warning" style="width: 100%;"><i class="fa fa-cart-plus" style="margin-right: 10px;"></i>ADD TO CART</button>
                                </form>
                                <form action="./controllers/liked-controller.php" method="post">
                                  <input type="hidden" name="id" value="{$product['Product_ID']}">
                                  <button type="submit" class="wish btn btn-outline-danger mt-2" style="width: 100%;"><i class="fa fa-heart" style="margin-right: 10px;"></i>ADD TO WISHLIST</button>
                                </form>
      
                            </div>
                          </div>
                        </div>
                      ITEM;

                    }
                  ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="deal">
      <div class="container">
        <div>
          <h2>Deal Of The Week</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
            do ipsum dolor sit amet, consectetur adipisicing elit</p>
          <p><span>$35.00</span>/<small>HanBag</small> </p>
          <button class="btn btn-outline-warning">SHOP NOW </button>
        </div>
      </div>
    </div>


    <div class="women">
      <div class="container">
        <div class="row">
          
          <div class="col col-8" style="overflow: hidden;min-height: 100%;">
            <div class="row" style=" justify-content: space-around;min-height: 100%" >
              <div class="col owl-carousel owl-theme" style="min-height: 100%;display: block;">
                  
                  <?php
                    foreach ($women as $product){
                        $src = getImage($product);
                        
                        echo <<< ITEM
                          <div class="item">
                            <div class="card">
                              <div class="card-body">
                                  <div class="card-img-actions"> 
                                    <img src="{$src}" class="card-img img-fluid" width="96" height="350" alt=""> 
                                  </div>
                              </div>
                              <div class="card-body bg-light text-center">
                                  <div class="mb-2">
                                      <h6 class="font-weight-semibold mb-2"> <a href="./product-details.php?id={$product['Product_ID']}" class="text-default mb-2" data-abc="true" style = "text-transform: capitalize;">{$product['Product_Name']}</a> </h6> <p class="text-muted" data-abc="true" style = " text-decoration: underline;">{$product['Brand_Name']}</p>
                                  </div>
                                  <h3 class="mb-0 font-weight-semibold">$ {$product['Product_Sale_Price']}</h3>
                                  <div> 
                                    <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> 
                                  </div>
                                  <div class="text-muted mb-3">34 reviews</div> 
                                  <form action="">
                                      <input type="hidden" name="id" value="{$product['Product_ID']}">
                                      <button type="submit" class="btn btn-outline-warning" style="width: 100%;"><i class="fa fa-cart-plus" style="margin-right: 10px;"></i>ADD TO CART</button>
                                      <button type="submit" class="wish btn btn-outline-danger mt-2" style="width: 100%;"><i class="fa fa-heart" style="margin-right: 10px;"></i>ADD TO WISHLIST</button>
                                  </form>
        
                              </div>
                            </div>
                          </div>
                        ITEM;

                    }
                  ?>



              </div>
            </div>
          </div>

          <div class="col col-12 col-lg-4 " style="overflow: hidden;">
            <img src="layout/images/women-large.jpg" alt="" srcset="" style="width: 100%;height: 100%;">
          </div>
        </div>
      </div>
    </div>



<?php
    if (!isset($noinsta)) {
      include $tpl . "insta.php";
    }
    include $tpl . 'footer.php';
    printScript();

    ob_end_flush();
?>