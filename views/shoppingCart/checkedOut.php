<div class="container">
	<div class="row">
        <div class="media_title">
            <h1>Receipt</h1>
        </div>
        <div class="table-responsive">
        	<div class="container hidden-lg">
        		<table class="table table-bordered">
        			<thead>
        				<tr>
            				<td>ID</td>
            				<td>Name</td>
            				<td>Price</td>
            				<td>Quantity</td>
            				<td>Date</td>
        				</tr>
        			</thead>
        			<tbody>
        				<?php foreach($products as $product) {?>
        					<tr>
        						<td><?php echo $product[0]?></td>
        						<td><?php echo $product[1]?></td>
        						<td><?php echo $product[2]?></td>
        						<td><?php echo $product[3]?></td>
        						<td><?php $date = new DateTime(); echo $date->format('Y-m-d H:i:s'); ?></td>
        					</tr>
        				<?php } ?>
        			</tbody>
        		</table>
        	</div>
        </div>
	</div>
</div>