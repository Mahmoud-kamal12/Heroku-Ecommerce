
        <!-- Start Edit -->
        
        <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Edit Brand</h5>
                    <div class="card-body">
                        <form action="?do=Update" method="POST">
                            <input type="hidden" name="Brand_ID" value="<?=$brand['Brand_ID']?>">
                            <div class="form-group">
                                <label for="Brand_Name">Brand Name</label>
                                <input type="text" class="form-control" id="Brand_Name" name="Brand_Name" value="<?=$brand['Brand_Name']?>">
                            </div>
                            <div class="form-group">
                                <label for="Brand_Desc">Brand Description</label>
                                <input type="text" class="form-control" id="Brand_Desc" name="Brand_Desc" value="<?=$brand['Brand_Desc']?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- End Edit -->
