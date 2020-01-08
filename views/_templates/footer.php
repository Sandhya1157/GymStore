    <footer></footer>

    <!-- jQuery, PopperJS and BootstrapJS-->
    <script src="<?php echo URL; ?>public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URL; ?>public/js/popper.min.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>

    <script>
      "use strict";
        function shoppingCart() {
        	$("#shoppingCart").load("http://localhost/gymstore/shoppingCart/");
        	$("#shoppingCart").addClass("first"); 
        }
        function closeThis() {
        	$("#shoppingCart").removeClass("first");
        	$("#shoppingCart>div").remove();
        }

        $('.saveMe').click(function() {
          var id = $(this).find('span').html();
          var inputID = "#qty_" + id;
          var inputValue = $(inputID).val();
          $("#shoppingCart").load("http://localhost/gymstore/shoppingCart/updateCart/"+id+"/"+inputValue);
          $('#main').remove();
          $("#cartTable").load("http://localhost/gymstore/shoppingCart/loadTable");
        });

        $('.addCart').click(function(){
            var id = $(this).find('span').html();
            $("#shoppingCart").load("http://localhost/gymstore/shoppingCart/addItemsToCart/"+id);
            $("#SCwidget>span").remove();
            $("#SCwidget").load("http://localhost/gymstore/shoppingCart/count/");
        });

        $('.removeCart').click(function(){
            var id = $(this).find('span').html();
            $("#shoppingCart").load("http://localhost/gymstore/shoppingCart/removeItemFromCart/"+id);
            $('#main').remove();
            $("#cartTable").load("http://localhost/gymstore/shoppingCart/loadTable");
            $("#SCwidget>span").remove();
            $("#SCwidget").load("http://localhost/gymstore/shoppingCart/count/");
        });

        var category_id=0;

        $('.category_name').click(function(){
            category_id = $(this).find('span').html();
            $("#items>li").remove();
            jQuery(".amount>strong").remove();
            $("#items").load("http://localhost/gymstore/products/category/"+category_id+"/1");
        });
        
        $("select#orderlist").change(function(){
            var sort = $("select#orderlist option:checked").val();
            $("#items>li").remove();
            jQuery(".amount>strong").remove();
            if(category_id!=0)
                $("#items").load("http://localhost/gymstore/products/category/"+category_id+"/"+sort+"/");
            if(category_id==0)
                $("#items").load("http://localhost/gymstore/products/sortDefault/"+sort+"/");
        });
    </script>
</body>
</html>