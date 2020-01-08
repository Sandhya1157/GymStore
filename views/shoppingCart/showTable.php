
    <main id="main">
        <div class="container">
            <div class="media_title">
                <h1>Shopping Cart</h1>
            </div>
            <div class="clear_20px"></div>
            <div class="cart table-responsive" >
                <div class="container">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th class="limiter">Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            $subtotal = 0;
                            if(isset($products))
                                foreach ($products as $info) { 
                                        ?>
                        <tr>
                            <td class="showcart_image">
                                <img alt="<?php echo $info[1]; ?>" style="height: 50px;" src="<?php echo URL.$info[4]?>">
                            </td>
                            <td>
                                <span class="visible-xs-inline">Product Name: </span><?php echo $info[1];?>
                            </td>
                            
                            <td>
                                <span class="visible-xs-inline">Price: </span>
                                <span class="cart-price">
                                <span class="price">Rs. <?php echo $info[2];?></span>
                                </span>
                            </td>
                            <td class="limiter">
                                <span class="visible-xs-inline">Qty: </span>
                                <input name="qty_<?php echo $info[0];?>" title="Enter a new quantity" min="1" class="showcart_qty_edit" id="qty_<?php echo $info[0];?>" type="number" value="<?php echo $info[3];?>">
                                <a href="javascript:void(0);" class="saveMe">
                                    <span class="hidden"><?php echo $info[0]; ?></span>
                                    <i class="fa fa-save" style="font-size: 24px;"></i>
                                </a>
                            </td>
                            <td>
                                <div id="total_layer_1">
                                    <span class="visible-xs-inline">Sub Total: </span>
                                    <span class="cart-price">
                                        <span class="price">
                                            Rs.<?php echo $info[3]* (int)$info[2]; $subtotal += $info[3]* (int)$info[2];?>
                                        </span>
                                    </span>
                                </div>
                            </td>
                            <td>
                                <a title="Remove Item" class="removeCart" href="javascript:void(0)">
                                    <span class="hidden"><?php echo $info[0]; ?></span>
                                    <i class="fas fa-trash" style="line-height: 20px; font-size: 20px;"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="container">

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="totals">
                            <table id="shopping-cart-totals-table">
                                <colgroup>
                                    <col width="50%">
                                    <col width="50%">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="text-left">
                                            Items
                                        </td>
                                        <td class="text-right">
                                            <span class="price"><?php echo count($_SESSION['shopping_cart']);?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Subtotal</td>
                                        <td class="text-right"><span class="price">R&nbsp;<?php echo $subtotal; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Vat (13%)</td>
                                        <td class="text-right"><span class="price">R&nbsp;<?php echo 0.13 * $subtotal; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Total</td>
                                        <td class="text-right"><span class="price">R&nbsp;<?php echo 1.13 * $subtotal; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="checkout_button_layer">
                                <?php if($products!=NULL) { ?>
                                <a class="button checkout_button" href="<?php echo URL?>shoppingcart/checkOut/">
                                    <span>Check&nbsp;Out&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right right_arrow"></i></span>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="clear_25px"></div>
            </div>
        </div>
        <script>

            $('.saveMe').click(function() {
              var id = $(this).find('span').html();
              var inputID = "#qty_" + id;
              var inputValue = $(inputID).val();
              $("#shoppingCart").load("http://localhost/gymstore/shoppingCart/updateCart/"+id+"/"+inputValue);
              $('#main').remove();
              $("#cartTable").load("http://localhost/gymstore/shoppingCart/loadTable");
            });
            $('.removeCart').click(function(){
                var id = $(this).find('span').html();
                $("#shoppingCart").load("http://localhost/gymstore/shoppingCart/removeItemFromCart/"+id);
                $('#main').remove();
                $("#cartTable").load("http://localhost/gymstore/shoppingCart/loadTable");
                $("#SCwidget>span").remove();
                $("#SCwidget").load("http://localhost/gymstore/shoppingCart/count/");
            });
        </script>
    </main>