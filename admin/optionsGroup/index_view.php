<!-- Add Options Group -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Options Group</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row" style="width: 100%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Add Option Group</h5>
                    <div class="card-body">
                        <form action="?do=Insert" method="POST">
                            <div class="form-group">
                                <label for="Option_Group_Name">Option Group Name</label>
                                <input type="text" class="form-control" id="Option_Group_Name" name="Option_Group_Name">
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary mt-3" style="margin: 0 auto;width: 95%;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>




        <div class="container-fluid">
                    <h3 class="text-dark mb-4">Options Group</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex">
                            <div class="col">
                            <p class="text-primary m-0 fw-bold float-left">Options Group Info</p>
                            </div>
                            <div class="col" style="flex: revert;">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Options Group</button>
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
                                            <th>Options Group Name</th>
                                            <th>Options</th>
                                            <th>Controllers</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                        
                                            <!-- <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">Airi Satou</td> -->
                                            
                                            <?php foreach ($rows as $row) {
                                                echo"<tr>";
                                                echo "<td>{$row['Option_Group_Name']}</td>";
                                                echo "<td><a href = \"option.php?Group_Id={$row['Option_Group_ID']}\" class='btn btn-primary btn-sm'><i class='fas fa-tasks'> Show</i></a></td>";
                                                echo "<td><a href = \"?do=Edit&id={$row['Option_Group_ID']}\" class='btn btn-primary btn-sm cust'>Edit</a> <a href = \"?do=Delete&id={$row['Option_Group_ID']}\" class='btn btn-primary btn-sm'>Delete</a></td>";
                                                
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
