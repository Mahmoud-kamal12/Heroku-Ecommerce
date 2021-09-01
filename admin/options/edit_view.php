
        <!-- Start Edit -->
        <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Edit Option</h5>
                    <div class="card-body">
                        <form action="?do=Update" method="POST">
                            <input type="hidden" name="Option_ID" value="<?=$ids['Option_ID']?>">
                            <div class="form-group">
                                <label for="Option_Name">Option Name</label>
                                <input type="text" class="form-control" id="Option_Name" name="Option_Name" value="<?=$ids['Option_Name']?>">
                            </div>

                            <div class="form-group">
                                <label for="Option_Option_Grouo_id">Option Group</label>
                                <select class="js-example-basic-multiple form-control form-control-lg" name="Option_Option_Grouo_id" id="Option_Option_Grouo_id" required>
                                    
                                    <?php
                                        foreach ($Options as $option) {

                                                if ($option['Option_Group_ID'] === $ids['Option_ID']) {
                                                    echo "<option value=\"{$option['Option_Group_ID']}\" selected >{$option['Option_Group_Name']}</option>";
                                                    continue;
                                                }

                                                echo "<option value=\"{$option['Option_Group_ID']}\">{$option['Option_Group_Name']}</option>";
                                            }
                                            
                                    ?>
                                </select>
                            </div>

                            
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- End Edit -->
