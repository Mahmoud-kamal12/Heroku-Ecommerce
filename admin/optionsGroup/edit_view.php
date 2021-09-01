
        <!-- Start Edit -->
        
        <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Edit Option Group</h5>
                    <div class="card-body">
                        <form action="?do=Update" method="POST">
                            <input type="hidden" name="Option_Group_ID" value="<?=$OptionsGroup['Option_Group_ID']?>">
                            <div class="form-group">
                                <label for="Option_Group_Name">Option Group Name</label>
                                <input type="text" class="form-control" id="Option_Group_Name" name="Option_Group_Name" value="<?=$OptionsGroup['Option_Group_Name']?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- End Edit -->
