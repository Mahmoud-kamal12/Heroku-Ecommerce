<?php
    // Global VAR
    $script = "";
    $noinsta = "";
    $err = (isset($_GET['err'])) ? $_GET['err'] : 0 ;
    $msg = (isset($_GET['msg'])) ? $_GET['msg']:'';
    $pageTitle = "Wish Products";

    ob_start();

    session_start();
    include 'init.php';
    include "./controllers/show-wichList-controller.php";
    geterr($msg);

?>


<div class="content" style="margin: 100px auto;">
      <div class="container" >
        <div class="row">
          <div class="shopping-cart">
            <table class="table">
              <thead>
                <tr class="card-header" >
                  <th  scope="col">IMAGE</th>
                  <th  scope="col">PRODUCT NAME	</th>
                  <th  scope="col">PRICE	</th>
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
                      echo <<< TR
                          <tr>
                            <td><img class="img-thumbnail" src="{$src}" style="height: 177px !important;width: 100% !important;"></td>
                            <td>{$row['Product_Name']}</td>
                            <td>{$row['Product_Sale_Price']}</td>
                            <td>
                            <div class="row">
                              <div class="col">
                                <form action="./controllers/deledt-from-wish.php" method="get" >
                                  <input type="hidden" name="id" value="{$row['Wish_ID']}">
                                  <button type="submit" class="btn btn-outline-danger" style="width: 100%;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                              </div>
                              <div class="col">
                                <form action="./controllers/add-cart.php" method="post" >
                                  <input type="hidden" name="id" value="{$row['Product_ID']}">
                                  <button type="submit" class="btn btn-outline-warning" style="width: 100%;"><i class="fa fa-cart-plus" style="margin-right: 10px;"></i></button>
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
            </table>
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