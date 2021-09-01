<?php
    // Global VAR
    $script = '<script src="layout/js/pro-details-page8.js"></script>';
    $pageTitle = "Product";
    
    ob_start();

    session_start();
    include 'init.php';
    include "./controllers/product-details-controller.php";
    $images = getAllImage($product);

?>


<div class="content" style="margin: 100px auto;">
      <div class="container" >
        <div class="row">
          <div class="col col-12 col-lg-6">

              <div class="row">
                  <img src="admin/uploads/<?=$images[0]?>" width="100%" height="395">
              </div>

              <div class="row pt-2 pb-2">
                <div class="owl-carousel owl-theme">
                  <?php 
                    foreach ($images as $imgsrc) {
                     echo "<div><img class='item' src='admin/uploads/{$imgsrc}' width='150' height='100'></div>";
                    }
                  ?>
                </div>
              </div>
          </div>

          <div class="col col-6 product-details">
            <div class="container">
              <h1><?=$product['Product_Name']?></h1>
              <small>Brand:<?=$product['Brand_ID']?></small>
              <h5><span class="sale">$<?=$product['Product_Sale_Price']?></span> <span class="discount">$<?=$product['Product_Sale_Price']?></span></h5>
              <p style="height: 182px ;overflow-y: auto;"><?=$product['Product_Desc']?></p>
              <form class="row g-3" action="./controllers/add-cart.php" method="POST">
                <input type="hidden" name="id" value="<?=$product['Product_ID']?>">
                <div class="col-auto">
                  <label for="Quantity" class="">Quantity</label>
                  <input type="number" class="form-control" id="Quantity" value="1" name="Quantity">
                </div>
                <div class="col-auto"></div>
                <div class="col-auto">
                  <a href="./controllers/liked-controller.php?id=<?=$product['Product_ID']?>"><i class="far fa-heart"></i></a>
                  <button type="submit" class="btn btn-warning mb-2">ADD TO CART</button>
                </div>
                <hr>
                <div class="row product-color">
                  <div class="col col-3">Available color : </div>
                  <div class="col col-6">
                    <select class="form-select" id="selectColor">
                      <option value="" disabled selected>Choose Your color</option>
                      <?php 
                        foreach ($colors as $color) {
                          echo "<option data-color = '{$color['Option_Name']}' value = '{$color['Option_ID']}'></option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col col-3"><span class="chColor"></span> </div>
                </div>
                <div class="row product-size">
                  <div class="col col-3">Available size : </div>
                  <div class="col col-9">
                    <ul class="list-group list-group-horizontal">
                      
                    
                      <?php
                        foreach ($sizes as $size) {
                          echo <<< PRODUCT
                            <li class="nav-item">
                            <input class="form-check-input" type="radio" value="{$size['Option_ID']}" name="size">
                            <label class="form-check-label" for="flexCheckDefault">{$size['Option_Name']}</label>
                            </li>
                          PRODUCT;
                        }
                      ?>    
                    </ul>
                  </div>
                </div>
                <div class="row product-Shipping">
                  <div class="col col-3">Shipping : </div>
                  <div class="col col-9">
                    $ <?=$product['Product_Shipping_Price']?>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="row" id="product-over-attr">
          <div class="row">
            <ul class="list-group list-group-horizontal">
              <li class="list-group-item" data-toggle="collapse" data-target="#overview" aria-expanded="true" aria-controls="overview">Overview</li>
              <li class="list-group-item" data-toggle="collapse" data-target="#atrr" aria-expanded="false" aria-controls="atrr">Attributes</li>
            </ul>
        
            <div id="overview" class="collapse show" data-parent="#product-over-attr">
              <h5>Overview</h5>
              <div><?=$product['Product_Overview']?></div>
            </div>
            <div id="atrr" class="collapse"  data-parent="#product-over-attr">
              <h5>Attributes</h5>
              <div><?=$product['Product_Attributes']?></div>
            </div>
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