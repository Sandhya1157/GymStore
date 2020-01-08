<div id="index">

<div class="banner" style="background-image: url('<?php echo URL.$banner; ?>')">
</div>

<div class="container">
	<?php
	foreach ($items as $item) {
		if(isset($item->id)){
			echo $item->id . '</br> Item Name'. $item->name.'</br>' .$item->price.'</br>';

		}
		else {
			echo 'No items to display';
		}
	}
	?>
</div>

</div>