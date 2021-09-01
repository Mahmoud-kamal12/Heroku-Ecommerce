
    <!-- Start Add -->
    
    <div class="container pt-5">
        <div class="row mt-5" style="width: 100%;margin: 0 auto;">
            <div class="col col-lg-6 col-12">
                <div class="card">
                    <h5 class="order-header m-3">User Info</h5>
                    <div class="card-body">
                        <p>Name: <?= getFullName($user) ?></p>
                        <p>Country : <?= $user['Order_User_Country'] ?></p>
                        <p>City : <?= $user['Order_User_City'] ?></p>
                        <p>Zip : <?= $user['Order_User_Zip'] ?></p>
                        <p>Adress : <?= $user['Order_User_Adress'] ?></p>
                        <p>Adress2 : <?= $user['Order_User_Adress2'] ?></p>
                        <p>Phone : <?= $user['Order_User_Phone'] ?></p>
                        <p>Email : <?= $user['Order_User_Email'] ?></p>
                        <p>Date : <?= $user['Order_Date'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-6 col-12">
                <div class="card">
                    <h5 class="order-header m-3">Order Items</h5>
                    <div class="card-body">

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

                                    foreach ($Items as $row) {
                                      $total = $row['Item_Sale_Price'] * $row['Quantity'];
                                      $total_order += $total;
                                        echo <<< TR
                                          <tr>
                                            <td scope="row">{$row['Item_Name']}</td>
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
            <div class="row mt-5">
                <div class="col col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="?do=Update" method="post">
                                <h5 class="card-title">Order State : <span style="color: #000;"><?=$user['Order_Status']?></span></h5>

                                <div class="form-group col-md-4">
                                    <label for="inputState">State</label>

                                    <select name="Order_Status"  class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <?php  
                                            foreach ($status as $st) {
                                                if ($st === $user['Order_Status']) {
                                                 echo"<option value='{$st}' selected >{$st}</option>";
                                                }else{
                                                    echo"<option value='{$st}'>{$st}</option>";
                                                }
                                            }                                        
                                        ?>

                                    </select>
                                </div>

                                <input type="hidden" value="<?=$user['Order_ID']?>" name="Order_ID">
                                <input type="hidden" value="<?=$_GET['user_id']?>" name="user_id">
                                
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-primary mt-3 w-25">Update Status</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Add -->