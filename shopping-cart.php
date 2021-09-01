<?php
    // Global VAR
    $script = "<script src='layout/js/shopipng-cart.js'></script>";
    $noinsta = " ";
    $err = (isset($_GET['err'])) ? $_GET['err'] : 0 ;
    $msg = (isset($_GET['msg'])) ? $_GET['msg']:'';
    $pageTitle = "Shopping Cart";
    $total_card = 0;

    ob_start();

    session_start();
    include 'init.php';
    include "controllers/shopping-card-controller.php";
    geterr($msg);

?>

  <!-- Start Content -->

  <div class="content" style="margin: 100px auto;">
      <div class="container" >
        <div class="row">
          <div class="shopping-cart">
            <table class="table">
              <thead>
                <tr class="card-header">
                  <th  scope="col">IMAGE</th>
                  <th  scope="col">PRODUCT NAME	</th>
                  <th  scope="col">PRICE	</th>
                  <th  scope="col">QUANTITY	</th>
                  <th  scope="col">TOTAL	</th>
                  <th  scope="col">ACTION	</th>
                </tr>
              </thead>
              <tbody>
              
              <?php
                if (!(count($rows) > 0)) {
                  echo <<< TR
                  <tr>
                    <td colspan="6">
                    <div class="row">
                      <h5 class="not-found">There are no products.</h5>
                    </div>
                    </td>
                  </tr>
                  TR;
                }else{
                  foreach ($rows as $row){
                      $src = getImage($row);
                      $total = $row['Product_Sale_Price'] * $row['Quantity'];
                      $total_card += $total;
                      echo <<< TR
                          <tr>
                            <td><img class="img-thumbnail" src="{$src}" style="height: 177px !important;width: 100% !important;"></td>
                            <td>{$row['Product_Name']}</td>
                            <td>{$row['Product_Sale_Price']}</td>
                            <td>
                              <form action="./controllers/update-cart-controller.php" method="post" style="position: relative;">
                                  <input type="hidden" name="id" value="{$row['Cart_ID']}">
                                  <input class="input-Quantity form-control w-75 d-inline" type="number" value = "{$row['Quantity']}" name= "Quantity" readonly>
                                  <button type="submit" class="btn-Quantity"><i class="fas fa-cloud-upload-alt"></i></button>
                              </form>
                            </td>
                            <td>{$total}</td>
                            <td>
                              <div class="row">
                                <div class="col">
                                  <form action="./controllers/deledt-from-cart.php" method="get" >
                                    <input type="hidden" name="id" value="{$row['Cart_ID']}">
                                    <button type="submit" class="btn btn-outline-danger" style="width: 100%;"><i class="fas fa-trash-alt"></i></button>
                                  </form>
                                </div>
                              </div>
                            </td>
                          </tr>
                      TR;
                  }
                }
              ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="6" scope="col">
                    <div class="text-muted d-flex justify-content-md-between">
                      <span class="btn btn-outline-secondary m-2" style="font-weight: bold;font-family: 'Kaisei Decol', serif;"> TOTAL : <?=$total_card?></span>
                      <a href="./check-order.php" class="btn btn-outline-warning m-2" style="font-weight: bold;font-family: 'Kaisei Decol', serif;">CHECK OUT</a>
                    </div>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
  </div>

  <!-- End Content -->

<?php
    if (!isset($noinsta)) {
        include $tpl . "insta.php";
    }
    include $tpl . 'footer.php';
    printScript();

    ob_end_flush();

    
?>