

    <!-- Start Add -->

    <div class="container pt-5">
        <div class="row mt-5" style="width: 80%;margin: 0 auto;">
            <div class="col-sm">
                <div class="card">
                    <h5 class="card-header">Edit Product</h5>
                    <div class="card-body">
                        <form action="?do=Update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="Product_ID" value="<?=$product['Product_ID']?>">
                            
                            <div class="form-group">
                                <label for="Product_Name">Product Name</label>
                                <input type="text" class="form-control" id="Product_Name" name="Product_Name" required value="<?=$product['Product_Name']?>">
                            </div>
                            <div class="form-group">
                                <label for="Product_Desc">Product Description</label>
                                <input type="text" class="form-control" id="Product_Desc" name="Product_Desc" required value="<?=$product['Product_Desc']?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="Product_Categories">Product Category</label>
                                <select class="js-example-basic-multiple form-control form-control-lg" name="Product_Categories[]" id="Product_Categories" multiple required>
                                    
                                    <?php
                                        foreach ($supcats as $key => $cat) {
                                            echo "<optgroup label=\"{$key}\">";
                                            foreach ($cat as $value) {
                                                
                                                    foreach ($product['categories_ids'] as $ids) {
                                                        if ($value['Cateory_ID'] === $ids[0]) {
                                                            echo "<option value=\"{$value['Cateory_ID']}\" selected >{$value['Category_Name']}</option>";
                                                            continue;
                                                        }
                                                    }
                                                    
                                                
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
                                    
                                    <?php
                                        foreach ($Options as $key => $option) {
                                            echo "<optgroup label=\"{$key}\">";
                                            foreach ($option as $value) {

                                                foreach ($product['Options_ids'] as $ids) {
                                                    if ($value['Option_ID'] === $ids[0]) {
                                                        echo "<option value=\"{$value['Option_ID']}\" selected >{$value['Option_Name']}</option>";
                                                        continue;
                                                    }
                                                }
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
                                

                                    <?php

                                            foreach ($Brands as $value) {
                                                if ($value['Brand_ID'] === $product['Product_Brand_id'] ) {
                                                    
                                                    echo "<option value=\"{$value['Brand_ID']}\" selected>{$value['Brand_Name']}</option>";
                                                    continue;
                                                }
                                                echo "<option value=\"{$value['Brand_ID']}\">{$value['Brand_Name']}</option>";
                                            }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Product_Purchase_Price">Product Purchase Price</label>
                                <input type="number" class="form-control" id="Product_Purchase_Price" name="Product_Purchase_Price" required value="<?=$product['Product_Purchase_Price']?>">
                            </div>

                            <div class="form-group">
                                <label for="Product_Sale_Price">Product Sale Price</label>
                                <input type="number" class="form-control" id="Product_Sale_Price" name="Product_Sale_Price" required value="<?=$product['Product_Sale_Price']?>">
                            </div>

                            <div class="form-group">
                                <label for="Product_Tax_Percent">Product Tax Percent</label>
                                <input type="number" class="form-control" id="Product_Tax_Percent" name="Product_Tax_Percent" required value="<?=$product['Product_Tax_Percent']?>">
                            </div>

                            <div class="form-group">
                                <label for="Product_discount_Percent">Product discount Percent</label>
                                <input type="number" class="form-control" id="Product_discount_Percent" name="Product_discount_Percent" required value="<?=$product['Product_discount_Percent']?>">
                            </div>

                            <div class="form-group">
                                <label for="Product_Shipping_Price">Product Shipping Price</label>
                                <input type="number" class="form-control" id="Product_Shipping_Price" name="Product_Shipping_Price" required value="<?=$product['Product_Shipping_Price']?>">
                            </div>

                            <div class="form-group">
                                <label for="Product_Images">Product Images</label>
                                <input type="file" class="form-control" id="Product_Images" name="Product_Images[]" multiple >
                            </div>

                            <div class="form-group">
                                <label for="Product_Overview">Product Overview</label>
                                <textarea name="Product_Overview" class="form-control"><?=$product['Product_Overview']?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="Product_Attributes">Product Attributes</label>
                                <textarea name="Product_Attributes" class="form-control"><?=$product['Product_Attributes']?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add -->