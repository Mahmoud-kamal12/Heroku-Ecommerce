


        <div class="container-fluid">
                    <h3 class="text-dark mb-4">Products</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex">
                            <div class="col">
                            <p class="text-primary m-0 fw-bold float-left">Products Info</p>
                            </div>
                            <div class="col" style="flex: revert;">
                            <a href="?do=Add" class="btn btn-primary btn-sm">Add Product</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">
                                    <input type="submit"class="btn btn-info" value="Search"></input>
                                    </label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" name="search" value="<?=(isset($_GET['search']))? $_GET['search']:'' ?>"></label></div>
                                </div>
                            </form>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: 900;">#</th>
                                            <th>Name</th>
                                            <th>Purchas Price</th>
                                            <th>Sale Price</th>
                                            <th>Brand Name</th>
                                            <th>Shipping Price</th>
                                            
                                            <th>Controlle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                        
                                            
                                            <?php foreach ($rows as $row) {
                                                echo"<tr>";
                                                echo "<td style='font-weight: 900;'>{$row['Product_ID']}</td>";
                                                echo "<td><img class=\"rounded-circle me-2\" width=\"30\" height=\"30\" src=\"". getImage($row) ."\">{$row['Product_Name']}</td></td>";

                                                echo "<td>{$row['Product_Purchase_Price']}</td>";
                                                echo "<td>{$row['Product_Sale_Price']}</td>";
                                                echo "<td>{$row['Brand_Name']}</td>";
                                                echo "<td>{$row['Product_Shipping_Price']}</td>";

                                                echo "<td><a href = \"?do=Edit&id={$row['Product_ID']}\" class='btn btn-primary btn-sm cust'>Edit</a>
                                                <a href = \"?do=Delete&id={$row['Product_ID']}\" class='btn btn-primary btn-sm'>Delete</a></td>";

                                                
                                                echo "</tr>";

                                                
                                            }?>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">

                                </div>
                                <div class="col-md-6" style = "overflow-x:auto">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">

                                            <li class="page-item <?= ($pageno <= 1)?'disabled':'' ?>"><a class="page-link" href="?pageno=1<?=(isset($_GET['supcat']))? '&supcat='.$_GET['supcat']:'' ?><?=(isset($_GET['search']))? '&search='.$_GET['search']:'' ?>" aria-label="Previous"><span aria-hidden="true">First</span></span></a></li>

<li class="page-item  <?= ($pageno <= 1)? 'disabled':' ' ?>">
    <a class="page-link" href="<?= ($pageno > $total_pages)? '?':"?pageno=".($pageno - 1).'&' ?><?=(isset($_GET['supcat']))? 'supcat='.$_GET['supcat']:'' ?><?=(isset($_GET['search']))? 'search='.$_GET['search']:'' ?>">Prev</a>
</li>

<li class="page-item <?=($pageno >= $total_pages)? 'disabled':' ' ?>">
    <a class="page-link" href="<?= ($pageno >= $total_pages)? '?':"?pageno=".($pageno + 1) .'&' ?><?=(isset($_GET['supcat']))? 'supcat='.$_GET['supcat']:'' ?><?=(isset($_GET['search']))? 'search='.$_GET['search']:'' ?>">Next</a>                                  
</li>


                                            <li class="page-item  <?= ($pageno == $total_pages)?'disabled':'' ?>"><a class="page-link" href="?pageno=<?=$total_pages?><?=(isset($_GET['supcat']))? '&supcat='.$_GET['supcat']:'' ?><?=(isset($_GET['search']))? '&search='.$_GET['search']:'' ?>" aria-label="Next"><span aria-hidden="true">Last</span></a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <!-- End Index -->
