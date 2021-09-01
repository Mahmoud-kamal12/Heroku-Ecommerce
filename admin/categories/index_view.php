




        <div class="container-fluid">
                    <h3 class="text-dark mb-4">Categories</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex">
                            <div class="col">
                            <p class="text-primary m-0 fw-bold float-left">Categories Info</p>
                            </div>
                            <div class="col" style="flex: revert;">
                            <a href="?do=Add" class="btn btn-primary btn-sm">Add Category</a>
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
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            
                                            <?php
                                            if (!isset($_GET['supcat'])) {
                                                echo "<th>Show SupCategories</th>";
                                            }?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                        
                                            <!-- <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td> -->
                                            <?php foreach ($rows as $row) {
                                                echo"<tr>";
                                                echo "<td>{$row['Category_Name']}</td>";
                                                echo "<td>{$row['Category_Desc']}</td>";
                                                echo "<td>";
                                                if (!isset($_GET['supcat'])) {
                                                    echo "
                                                    <a href = \"?supcat={$row['Cateory_ID']}\" class='btn btn-primary btn-sm'>Show</a> 
                                                    ";
                                                }
                                                echo "<a href = \"?do=Edit&id={$row['Cateory_ID']}\" class='btn btn-primary btn-sm'>Edit</a>";

                                                echo "<a href = \"?do=Delete&id={$row['Cateory_ID']}\" class='btn btn-primary btn-sm cust2' style = 'margin-left:3px'>Delete</a></td>";
                                                
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
