<div id="index">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php 
      foreach ($slides as $slide) {
        if(isset($slide->id)){
          if($slide->id == 1){
            echo '<div class="carousel-item active" style="background-image: url('.URL.$slide->image.') ">';
          }
          else {
            echo '<div class="carousel-item" style="background-image: url('.URL.$slide->image.') ">';
          }
        }
              echo '<div class="container">
                      <h2><span>'.$slide->heading.'</span></h2>
                      <div><p>'.$slide->description.'</p></div>
                    </div>
                  </div>';
      }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="jumbotron welcome">
  <h2>Welcome To 
    <img class="logo" src="<?php echo URL; ?>public\img\logo-only.png"> GymStore
  </h2>
  <p>The world is always changing all around us.</br>
     To continue to thrive we must promote physical activity and healthy lifestyles.</br>
     We must innovate and understand the trends within fitness industries and adapt to these changes.</br>
     We must prepare for tomorrow, today!</p>
</div>
<hr>
<div class="container">
    <div class="category-products">
        <div class="toolbar">
            <div class="clear_10px"></div>
            <div class="clear_20px"></div>

            <div class="media_title">
                <h1>Top Products</h1>
            </div>
            <div id="pagination_div"></div>
            <div class="clear_10px"></div>
            <ul id="items" class="products-grid row" >
            <?php foreach ($items as $item) { ?>
                <li class="item col-xs-12 col-sm-6 col-md-4 col-lg-3 text-center">
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
        </div>
    </div>  
</div>

</div>