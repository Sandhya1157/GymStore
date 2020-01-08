<div>
	<div class="shoppingContent">
		<button onclick="closeThis()">X</button>
		<div class="row overflow">
			<?php
			if($products!=NULL)
				foreach ($products as $info) {
			?>
					<div class="col-md-3">
				        <img src="<?php echo URL . $info[4]; ?>" alt="<?php echo $info[1]?>" class="card-img-top">
				        <div class="card-body">
				          <h5><?php echo $info[1]; ?></h5>
				          <h6><?php echo $info[2];?></h6>
				          <h6>Quantity: <?php echo $info[3]?></h6>
				        </div>
				    </div>
			<?php } ?>
		</div>
		<a href="<?php echo URL.'shoppingCart/viewCart';?>">View Cart</a>

	</div>
</div>