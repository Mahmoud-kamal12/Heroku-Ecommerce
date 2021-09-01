<?php
    // Global VAR
    $script = "<script src='./layout/js/check-page.js'></script>";
    $pageTitle = "Check-Order";
    $total_order = 0;
    $err = (isset($_GET['err'])) ? $_GET['err'] : 0 ;
    $msg = (isset($_GET['msg'])) ? $_GET['msg']:'';

    ob_start();

    session_start();
    include 'init.php';
    include 'controllers/check-page-controller.php';
    geterr($msg);
?>
    
  <div class="content">
      <form class="container" style="margin: 100px auto;padding: 50px 100px;" action="controllers/add-order-controller.php" method="post" id="form-check">

        <div class="row px-5">

              <div class="col col-lg-6 col-12">
                <h5 class="order-header">Biiling Details</h5>

                    <div class="row my-3">
                        <div class="col">
                            <label for="Order_First_Name" class="form-label">First Name*</label>
                            <input type="text" class="form-control" placeholder="First name" name="Order_First_Name">
                        </div>
                        <div class="col">
                            <label for="Order_Last_Name" class="form-label">Last Name*</label>
                            <input type="text" class="form-control" placeholder="Last name" name="Order_Last_Name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Order_User_Country" class="form-label">Country*</label>
                        <input type="text" class="form-control" placeholder="Last name" name="Order_User_Country">
                    </div>
                    <div class="mb-3">
                        <label for="Order_User_City" class="form-label">City*</label>
                        <input type="text" class="form-control" placeholder="Last name" name="Order_User_City">
                    </div>
                    <div class="mb-3">
                    <label for="Order_User_Adress" class="form-label">Street Address*</label>
                        <input type="text" class="form-control" id="Order_User_Adress" name="Order_User_Adress">
                        <input type="text" class="form-control mt-4" id="Order_User_Adress2" name="Order_User_Adress2">
                    </div>
                    <div class="mb-3">
                    <label for="Order_User_Zip" class="form-label">Postcode / ZIP (optional)</label>
                        <input type="int" class="form-control" id="Order_User_Zip" name="Order_User_Zip">
                    </div>
                    <div class="mb-3">
                    <label for="User_Email" class="form-label">Town / City*</label>
                        <input type="text" class="form-control" id="User_Email" name="User_Email">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Order_User_Email" class="form-label">Email Address*</label>
                            <input type="email" class="form-control" placeholder="First name" name="Order_User_Email">
                        </div>
                        <div class="col">
                            <label for="Order_User_Phone" class="form-label">Phone*</label>
                            <input type="text" class="form-control" placeholder="Last name" name="Order_User_Phone">
                        </div>
                    </div>
                    <label class="form-label mt-2">Choose the payment method*</label>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="paypal" id="paypal">
                    <label class="form-check-label" for="paypal">
                        PayPal
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="delivery" id="delivery">
                    <label class="form-check-label" for="delivery">
                        Payment on delivery
                    </label>
                    </div>
                    <div class="row justify-content-center mt-5" style="width: 70%;margin: 0 auto;">
                        <button type="submit" class="btn btn-outline-warning">Place Order</button>
                    </div>

              </div>

              <div class="col col-lg-6 col-12">
                <h5 class="order-header mb-3">Your Order</h5>
                <div class="card">
                    <div class="card-body"  style="height: 640px; overflow-y: auto;">
                        <table class="table" style="text-align: start;">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    foreach ($rows as $row) {
                                      $total = $row['Product_Sale_Price'] * $row['Quantity'];
                                      $total_order += $total;
                                        echo <<< TR
                                          <tr>
                                            <td scope="row">{$row['Product_Name']}</td>
                                            <td scope="row">{$row['Quantity']}</td>
                                            <td scope="row">$ {$total}</td>
                                          </tr>
                                        TR;
                                        
                                    }

                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td scope="row" colspan="2" style="font-weight: bold;font-family: 'Kaisei Decol', serif;">TOTAL</td>
                                    <td scope="row" style="font-weight: bold;"> $<?=$total_order?> </td>
                                    
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
              </div>
              <input type="hidden" value="<?=$total_order?>" name="amount">
        </div>

      </form>
  </div>


<?php
    include $tpl . 'footer.php';
    printScript();

    ob_end_flush();
?>