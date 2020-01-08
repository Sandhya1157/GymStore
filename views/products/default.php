<?php foreach ($items as $item) { ?>
<li class="item col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
    <div class="product_box wrapper-hover" style="height: 384px;">
        <div class="product-image" style="height: 174px; line-height: 174px;">
            <img src="<?php echo URL.$item->item_image; ?>" alt="<?php echo $item->name;?>">
        </div>
        <div class="product-shop">
            <h3 class="product-name" >
                <?php echo $item->name; ?>
            </h3>
            <div class="price-box" >
                <span class="regular-price bx_price">
                    <span class="price">Rs. <?php echo $item->price;?>
                        <span style="font-size:10px;"></span>
                    </span>
                    <span class="price-tax"></span>
                </span>
            </div>
            
            <div class="clear_5px"></div>
            <div class="buttons">
                <a href="javascript:void(0)" class="button add_cart_btn addCart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="hidden"><?php echo $item->id; ?></span>
                </a>
                <a href="<?php echo URL.'products/details/'.$item->id; ?>" class="button">
                    <span>Details</span>
                </a>
            </div>
        </div>
    </div>
</li>
<?php } ?>

</ul>
<div id="pagination_div"></div>
<div class="toolbar">
<div class="pager">
<p class="amount">
<strong><?php if(isset($item_count)) echo $item_count; ?> Item(s)</strong>
</p>
</div>
</div>