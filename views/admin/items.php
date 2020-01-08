
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="true">Add Item</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="remove-tab" data-toggle="tab" href="#remove" role="tab" aria-controls="remove" aria-selected="false">Remove Item</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="update-tab" data-toggle="tab" href="#update" role="tab" aria-controls="update" aria-selected="false">Update Item</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
			<form id="addItem" action="<?php echo URL;?>admin/insertItem" method="POST" enctype="multipart/form-data">
				<fieldset>
					<label>Item Name: </label>
					<input type="text" name="itemName" placeholder="Enter item name here...">
				</fieldset>
				<fieldset>
					<label>Item Price: </label>
					<input type="number" name="price" placeholder="Enter item price here...">
				</fieldset>
				<fieldset>
					<label>Item Description: </label>
					<input type="text" name="description" placeholder="Enter item description here...">
				</fieldset>
				<fieldset>
					<label>Item Stock: </label>
					<input type="number" name="quantity" placeholder="Enter item stock quantity here...">
				</fieldset>
				<fieldset>
					<label>Item Image: </label>
					<input type="file" name="imageUpload" id="imageUpload" />
				</fieldset>
				<fieldset>
					<label>Item Category: </label>
					<select>
						<option>select a category</option>
						<?php foreach ($categories as $category) {?>
							<option><?php echo $category->category;?></option>
						<?php }?>
					</select>
				</fieldset>
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
		
		<div class="tab-pane fade" id="remove" role="tabpanel" aria-labelledby="remove-tab">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th style="text-align: center;">S.N.</th>
					<th style="text-align: center;">Image</th>
					<th>Item Name</th>
					<th>Stock</th>
					<th style="text-align: center;">Action</th>
				</thead>
				<tbody>
				<?php 
				$sn=1;
				foreach ($items as $item) { ?>
				<tr>
					<td style="text-align: center;"><?php echo $sn++;?></td>
					<td style="text-align: center;"><img style="height: 50px;" src="<?php echo URL.$item->item_image; ?>"></td>
					<td><?php echo $item->name; ?></td>
					<td><?php echo $item->quantity; ?></td>
					<td style="text-align: center;">
						<a href="javascript:void(0);" onclick="setID()" data-toggle="modal" data-target="#deleteModel">
						<span class="hidden"><?php echo $item->id; ?></span>
						<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th style="text-align: center;">S.N.</th>
					<th>Name</th>
					<th>Description</th>
					<th>Stock</th>
					<th style="text-align: center;">Action</th>
				</thead>
				<tbody>
				<?php 
				$sn=1;
				foreach ($items as $item) { ?>
				<tr>
					<td style="text-align: center;"><?php echo $sn++;?></td>
					<td><input type="text" name="updateName" value="<?php echo $item->name; ?>"></td>
					<td><input type="text" name="updateName" value="<?php echo $item->description; ?>"></td>
					<td><?php echo $item->quantity; ?></td>
					<td style="text-align: center;">
						<a href="javascript:void(0);" onclick="setID()" data-toggle="modal" data-target="#editModel">
							<span class="hidden"><?php echo $item->id; ?></span>
							<i class="fas fa-save" style="font-size: 22px;"></i>
						</a>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModelL" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteModelL">Delete Item</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	Do you really want to delete this item?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
	        		<a href="javascript:void(0);"onclick="remove()" ></a>
	        			<span id = "admin">
	        			<span><?php echo $item->id; ?></span>
	        			</span> 
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="editModelL" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="editModelL">Save Edit</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	Do you really want to save your edit of this item?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" onclick="updateItem()">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>