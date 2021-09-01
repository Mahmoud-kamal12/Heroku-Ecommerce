
        <div class="container-fluid">
                    <h3 class="text-dark mb-4">Product Options</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex">
                            <div class="col">
                            <p class="text-primary m-0 fw-bold float-left">Product Options Info</p>
                            </div>
                            <div class="col" style="flex: revert;">
                            <a href="?do=Add" class="btn btn-primary btn-sm">Add Option</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">
                                    <a href="#" class="btn btn-info">Search</a>
                                    </label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product Options Name</th>
                                            <th>Options Group Name</th>
                                            <th>Controllers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                        
                                            <!-- <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td> -->
                                            
                                            <?php foreach ($rows as $row) {
                                                echo"<tr>";
                                                echo "<td>{$row['Option_Name']}</td>";
                                                echo "<td>{$row['Group_Name']}</td>";
                                                echo "<td><a href = \"?do=Edit&id={$row['Option_ID']}\" class='btn btn-primary btn-sm cust'>Edit</a> <a href = \"?do=Delete&id={$row['Option_ID']}\" class='btn btn-primary btn-sm'>Delete</a></td>";
                                            
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

                                            <li class="page-item <?= ($pageno <= 1)?'disabled':'' ?>"><a class="page-link" href="?pageno=1<?=(isset($_GET['supcat']))? '&supcat='.$_GET['supcat']:'' ?>" aria-label="Previous"><span aria-hidden="true">First</span></span></a></li>

<li class="page-item  <?= ($pageno <= 1)? 'disabled':' ' ?>">
    <a class="page-link" href="<?= ($pageno > $total_pages)? '?':"?pageno=".($pageno - 1).'&' ?><?=(isset($_GET['supcat']))? 'supcat='.$_GET['supcat']:'' ?>">Prev</a>
</li>

<li class="page-item <?=($pageno >= $total_pages)? 'disabled':' ' ?>">
    <a class="page-link" href="<?= ($pageno >= $total_pages)? '?':"?pageno=".($pageno + 1) .'&' ?><?=(isset($_GET['supcat']))? 'supcat='.$_GET['supcat']:'' ?>">Next</a>                                  
</li>


                                            <li class="page-item  <?= ($pageno == $total_pages)?'disabled':'' ?>"><a class="page-link" href="?pageno=<?=$total_pages?><?=(isset($_GET['supcat']))? '&supcat='.$_GET['supcat']:'' ?>" aria-label="Next"><span aria-hidden="true">Last</span></a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        <!-- End Index -->
