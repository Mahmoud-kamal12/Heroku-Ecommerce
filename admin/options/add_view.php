
    <!-- Start Add -->

    <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Add Option</h5>
                    <div class="card-body">
                        <form action="?do=Insert" method="POST">
                            <div class="form-group">
                                <label for="Option_Name">Option Name</label>
                                <input type="text" class="form-control" id="Option_Name" name="Option_Name">
                            </div>

                            <div class="form-group mt-3 mb-3" id="color">
                                <label for="Option_Name">Color</label>
                                <input type="color" name="color1" id ="color1" class="form-control form-control-color">
                            </div>

                            <div class="form-group">
                                <label for="Option_Option_Grouo_id">Option Group</label>

                                <select class="js-example-basic-multiple form-control form-control-lg" name="Option_Option_Grouo_id" id="Option_Option_Grouo_id" required>
                                    <option disabled selected>Choose Option Group</option>
                                    <?php
                                        foreach ($Options as $option) {
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
    <script>
        (function() {

            var color1= document.getElementById("color1");
            color1.addEventListener("input", function() {
                document.getElementById("Option_Name").value = color1.value;
            },false); 
        })();
    </script>
    <!-- End Add -->