<?php
    // Global VAR
    $script = "<script src='layout/js/shop-page.js'></script>";
    $pageTitle = "Shop";
    $err = (isset($_GET['err'])) ? $_GET['err'] : 0 ;
    $msg = (isset($_GET['msg'])) ? $_GET['msg']:'';
    
    ob_start();

    session_start();
    include 'init.php';
    include 'controllers/shop-controller.php';
    geterr($msg);

?>

<div class="content">
      <div class="container">
          <div class="row">
              <div class="col col-lg-3 filter">
                  <div class="category">
                      <h1 class="list-group">Categories</h1>
                      <ul>
                          <li class="list-group-item"><a href="./shop.php?&mainCatID=1">Men's</a></li>
                          <li class="list-group-item"><a href="./shop.php?&mainCatID=2">Women's</a></li>
                          <li class="list-group-item"><a href="./shop.php?&mainCatID=3">Kid's</a></li>
                      </ul>
                  </div>
                  <form action="#" method="post">
                    <div class="brand">
                      <h1 class="list-group">Brand</h1>
                      <ul>
                          <li class="list-group-item">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="Zara" value="Zara"><label class="form-check-label" for="Zara"> Zara</label>
                            </div>
                          </li>

                          <li class="list-group-item">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="1" value="1"><label class="form-check-label" for="1"> Nike</label>
                            </div>
                          </li>

                          <li class="list-group-item">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="1" value="1"><label class="form-check-label" for="1"> Versace</label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="1" value="1"><label class="form-check-label" for="1"> Polo</label>
                            </div>
                          </li>
                          <li class="list-group-item">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="1" value="1"><label class="form-check-label" for="1"> Diesel</label>
                            </div>
                          </li>
                      </ul>
                    </div>
                    <div class="price">
                        <h1 class="list-group">Price</h1>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="From" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                          <input type="number" class="form-control" placeholder="To" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="color">
                      
                      <div class="form-group mt-3 mb-3" id="color">
                          <h1 class="list-group">Color</h1>
                          <input type="color" name="color1" id ="color1" class="form-control form-control-color">

                          <div class="form-group" style="margin-top: 10px;">
                            <label for="Option_Name">Color Value</label>
                            <input type="text" class="form-control" id="Option_Name" name="Option_Name">
                          </div>
                      </div>
                    </div>
                    <div class="size">
                        <h1 class="list-group">Size</h1>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                          <button type="button" class="btn btn-outline-warning">XXS</button>
                          <button type="button" class="btn btn-outline-warning">XS</button>
                          <button type="button" class="btn btn-outline-warning">S</button>
                          <button type="button" class="btn btn-outline-warning">M</button>
                          <button type="button" class="btn btn-outline-warning">L</button>
                          <button type="button" class="btn btn-outline-warning">XL</button>
                          <button type="button" class="btn btn-outline-warning">XXL</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-warning btn-filter">Filter</button>
                  </form>
              </div>
              <div class="col col-lg-9 peoducts">
                  <div class="row product">
                    <?php 

                      if (count($products) > 0 ) {
                        foreach ($products as $product) {
                          $src = getImage($product);
                          echo <<< PRODUCT
                            <div class="col col-lg-4">
                            <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions"> 
                                  <img src="{$src}" class="card-img img-fluid" style = "height:172px"> 
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
                                <form action="./controllers/liked-controller.php" method="get">
                                  <input type="hidden" name="id" value="{$product['Product_ID']}">
                                  <button type="submit" class="wish btn btn-outline-danger mt-2" style="width: 100%;"><i class="fa fa-heart" style="margin-right: 10px;"></i>ADD TO WISHLIST</button>
                                </form>
      
                            </div>
                          </div>
                            </div>
                          PRODUCT;
                        }                       
                      }else{
                        echo <<< DIV
                        <tr>
                          <td colspan="6">
                          <div class="row">
                            <h5 class="not-found">There are no products.</h5>
                          </div>
                          </td>
                        </tr>
                        DIV;
                      }

                    ?>

                    <div class="row justify-self-center">
                        <nav aria-label="Page navigation " style="display: flex;justify-content: center;">
                        <ul class="pagination">

<li class="page-item <?= ($pageno <= 1)?'disabled':'' ?>"><a class="page-link" href="?pageno=1<?=(isset($_GET['mainCatID']))? '&mainCatID='.$_GET['mainCatID']:'' ?><?=(isset($_GET['search']))? '&search='.$_GET['search']:'' ?>" aria-label="Previous"><span aria-hidden="true">First</span></span></a></li>

<li class="page-item  <?= ($pageno <= 1)? 'disabled':' ' ?>">
<a class="page-link" href="<?= ($pageno > $total_pages)? '?':"?pageno=".($pageno - 1).'&' ?><?=(isset($_GET['mainCatID']))? 'mainCatID='.$_GET['mainCatID']:'' ?><?=(isset($_GET['search']))? 'search='.$_GET['search']:'' ?>">Prev</a>
</li>

<li class="page-item <?=($pageno >= $total_pages)? 'disabled':' ' ?>">
<a class="page-link" href="<?= ($pageno >= $total_pages)? '?':"?pageno=".($pageno + 1) .'&' ?><?=(isset($_GET['mainCatID']))? 'mainCatID='.$_GET['mainCatID']:'' ?><?=(isset($_GET['search']))? 'search='.$_GET['search']:'' ?>">Next</a>                                  
</li>


<li class="page-item  <?= ($pageno == $total_pages)?'disabled':'' ?>"><a class="page-link" href="?pageno=<?=$total_pages?><?=(isset($_GET['mainCatID']))? '&mainCatID='.$_GET['mainCatID']:'' ?><?=(isset($_GET['search']))? '&search='.$_GET['search']:'' ?>" aria-label="Next"><span aria-hidden="true">Last</span></a></li>

</ul>
                        </nav>
                    </div>
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