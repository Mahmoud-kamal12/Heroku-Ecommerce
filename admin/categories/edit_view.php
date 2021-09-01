
        <!-- Start Edit -->

        <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Edit Category</h5>
                    <div class="card-body">
                        <form action="?do=Insert" method="POST">
                            <div class="form-group">
                                <label for="Category_Name">Category Name</label>
                                <input type="text" class="form-control" id="Category_Name" name="Category_Name" value="<?=$row['Category_Name']?>">
                            </div>
                            <div class="form-group">
                                <label for="Category_Desc">Category Description</label>
                                <input type="text" class="form-control" id="Category_Desc" name="Category_Desc" value="<?=$row['Category_Desc']?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="Category_Desc">Parent Category</label>
                                <select class="form-control" name="Parent_Category" id="Parent_Category">
                                    <option value="NULL">This Is Parent Category </option>
                                    <?php
                                        foreach ($rows as $row2) {
                                            if ($row2['Cateory_ID'] == $row['Parent_Category']) {
                                                echo "<option value='{$row2['Cateory_ID']}' selected>{$row2['Category_Name']}</option>";
                                            }
                                            echo "<option value='{$row2['Cateory_ID']}'>{$row2['Category_Name']}</option>";
                                        }0
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="Cateory_ID" value="<?=$row['Cateory_ID']?>">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- End Edit -->
