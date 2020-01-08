<form class="products" action="" method="post"  enctype="multipart/form-data">
    <main id="main" class="">
        <div class="container">
            <div class="row">
                <div class="col-left sidebar col-xs-12 col-sm-4 col-md-3">
                    <div class="category_menu_container">
                        <div id="categories_titlebar">
                            <h2>Categories</h2>
                            <div class="clearfix"></div>
                            <hr class="black">
                        </div>
                        <div id="category_menu" class="clearfix">
                            <ul class="level_1 categories" action=""  method="Post">
                            <?php foreach ($categories as $category) { ?>
                                <li>
                                    <a class="category_name" href="javascript:void(0)"><?php echo $category->category;?>
                                        <span class="hidden"><?php echo $category->id;?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-main col-xs-12 col-sm-8 col-md-9">
                    <div class="page-title category-title">
                        <h2>Our Products</h2>
                        <div class="clearfix"></div>
                        <hr class="black" style="margin-bottom: 12px;">
                    </div>
                    <div class="category-products">
                        <div class="toolbar">
                            <div class="sorter">
                    <div class="sort-by">
                        <div class="">
                            <label>Sort By:</label>
                        </div>
                        <div class="orderlistcontainer">
                            <select id="orderlist">
                                <option value="1">Product Name Ascending Order</option>
                                <option value="2">Price Ascending Order</option>
                                <option value="3">Price Descending Order</option>
                                <option value="4">Product Name Descending Order</option>
                            </select>
                        </div>
                    </div>
                </div>
                      <div class="clear_10px"></div>
                        <hr style="margin: 0px;">
                                <div class="clear_20px"></div>
                                    <div id="pagination_div"></div>
                                         <div class="clear_10px"></div>
                                            <ul id="items" class="products-grid row" >
                                                <?php require 'application/views/products/default.php' ; ?>
            </div>
    </div>
</div>
</div>
</ul>
</div>
</div>
</div>
</div>
</div>
</main>
</form>