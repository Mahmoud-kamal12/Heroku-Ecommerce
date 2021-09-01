
    <!-- Start Add -->
    
    <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Add Product</h5>
                    <div class="card-body">
                        <form action="?do=Insert" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="Product_Name">Product Name</label>
                                <input type="text" class="form-control" id="Product_Name" name="Product_Name" required>
                            </div>
                            <div class="form-group">
                                <label for="Product_Desc">Product Description</label>
                                <input type="text" class="form-control" id="Product_Desc" name="Product_Desc" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="Product_Categories">Product Category</label>
                                <select class="js-example-basic-multiple form-control form-control-lg" name="Product_Categories[]" id="Product_Categories" multiple required>
                                    <option disabled selected>Choose Categories</option>
                                    <?php
                                        foreach ($supcats as $key => $cat) {
                                            echo "<optgroup label=\"{$key}\">";
                                            foreach ($cat as $value) {
                                                echo "<option value=\"{$value['Cateory_ID']}\">{$value['Category_Name']}</option>";
                                            }
                                            echo "</optgroup>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Product_Options">Product Options</label>
                                <select class="js-example-basic-multiple form-control form-control-lg" name="Product_Options[]" id="Product_Options" multiple required>
                                    <option disabled selected>Choose Options</option>
                                    <?php
                                        foreach ($Options as $key => $option) {
                                            echo "<optgroup label=\"{$key}\">";
                                            foreach ($option as $value) {
                                                echo "<option value=\"{$value['Option_ID']}\">{$value['Option_Name']}</option>";
                                            }
                                            echo "</optgroup>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Product_Brand_id">Product Brand</label>
                                <select class="js-example-basic-multiple form-control form-control-lg" name="Product_Brand_id" id="Product_Brand_id" required>
                                <option disabled selected>Choose Brand</option>

                                    <?php
                                        foreach ($Brands as $brand) {
                                                echo "<option value=\"{$brand['Brand_ID']}\">{$brand['Brand_Name']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Product_Purchase_Price">Product Purchase Price</label>
                                <input type="number" class="form-control" id="Product_Purchase_Price" name="Product_Purchase_Price" required>
                            </div>

                            <div class="form-group">
                                <label for="Product_Sale_Price">Product Sale Price</label>
                                <input type="number" class="form-control" id="Product_Sale_Price" name="Product_Sale_Price" required>
                            </div>

                            <div class="form-group">
                                <label for="Product_Tax_Percent">Product Tax Percent</label>
                                <input type="number" class="form-control" id="Product_Tax_Percent" name="Product_Tax_Percent" required>
                            </div>

                            <div class="form-group">
                                <label for="Product_discount_Percent">Product discount Percent</label>
                                <input type="number" class="form-control" id="Product_discount_Percent" name="Product_discount_Percent" required>
                            </div>

                            <div class="form-group">
                                <label for="Product_Shipping_Price">Product Shipping Price</label>
                                <input type="number" class="form-control" id="Product_Shipping_Price" name="Product_Shipping_Price" required>
                            </div>

                            <div class="form-group">
                                <label for="Product_Images">Product Images</label>
                                <input type="file" class="form-control" id="Product_Images" name="Product_Images[]" multiple >
                            </div>

                            <div class="form-group">
                                <label for="Product_Overview">Product Overview</label>
                                <textarea name="Product_Overview" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="Product_Attributes">Product Attributes</label>
                                <textarea name="Product_Attributes" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add -->