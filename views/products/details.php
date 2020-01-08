<div id="details">
<div class="container">
    <div class="row">
        <div class="product-img-box col-xs-12 col-sm-6">
            <div id="piGal" class="hover">
                <div class="stock_details_image_layer">
                    <div class="product-box-customs">
                        <p class="product-image">
                            <img id="item_details_image" src="<?php echo URL.$info->item_image; ?>" alt="<?php echo $info->name; ?>">
                        </p>
                    </div>
                    <div class="clear_20px"></div>
                </div>
                <div class="stock_details_altimages_layer_text" style="display: none;">
                    <small>(click on thumbnail to switch view)</small>
                </div>
            </div>
        </div>
        <div class="product-shop col-xs-12 col-sm-6">
            <div class="product-name">
                <h1><?php echo $info->name; ?></h1>
            </div>
            <div class="clear_20px"></div>
            <div class="price-box">
                <div class="regular-price">
                    <div class="price">
                        Price:&nbsp; Rs.&nbsp;<?php echo $info->price; ?>
                    </div>
                </div>
            </div>
            
            <div class="short-description">
                <h3 class="item_short_desc">Quick Overview</h3>
                <div class="std">
                    <div id="item_short_desc" itemprop="description">
                        <?php echo $info->description; ?>  
                    </div>
                    <div class="clear_10px"></div>
                </div>
            </div>
            <div class="clear_10px"></div>
            <div class="product-options-bottom">
                <div class="add-to-box">
                    <div class="add-to-cart buttons" style="visibility: visible;">
                        <div class="qty-block form-inline">
                        </div>
                        </br>

                        <div class="listitems_add_cart">
                            <a class="button add_cart_btn addCart" href="javascript:void(0);">
                                <i class="fas fa-cart-plus"></i>
                                <span class="hidden"><?php echo $info->id; ?></span>
                                Add to Cart
                            </a>
                        </div>
                        <div class="clear"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>