
	<ul class="nav nav-tabs" id="accountTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link" id="showT-tab" data-toggle="tab" href="#showT" role="tab" aria-controls="showT" aria-selected="true">Show Accounts</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="remove-tab" data-toggle="tab" href="#remove" role="tab" aria-controls="remove" aria-selected="false">Remove Accounts</a>
		</li>
	</ul>

	<div class="tab-content" id="accountTabContent">
		<div class="tab-pane fade show active" id="showT" role="tabpanel" aria-labelledby="showT-tab">	
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th>S.N.</th>
					<th>Username</th>
					<th>Phone No</th>
					<th>Address</th>
					<th>Email</th>
				</thead>
				<tbody>
				<?php 
				$sn=1;
				foreach ($accounts as $account) { ?>
				<tr>
					<td><?php echo $sn++;?></td>
					<td><?php echo $account->username; ?></td>
					<td><?php echo $account->phone; ?></td>
					<td><?php echo $account->address; ?></td>
					<td><?php echo $account->email; ?></td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="remove" role="tabpanel" aria-labelledby="remove-tab">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<th style="text-align: center;">S.N.</th>
					<th>Username</th>
					<th>Phone No</th>
					<th>Address</th>
					<th>Email</th>
					<th>Account type</th>
					<th style="text-align: center;">Action</th>
				</thead>
				<tbody>
					<?php 
					$sn=1;
					foreach ($accounts as $account) { ?>
					<tr>
						<td ><?php echo $sn++;?></td>
						<td><?php echo $account->username; ?></td>
						<td><?php echo $account->phone; ?></td>
						<td><?php echo $account->address; ?></td>
						<td><?php echo $account->email; ?></td>
						<td><?php echo $account->usertype; ?></td>
						<td style="text-align: center;">
							<a href="javascript:void(0);" onclick="setID()" data-toggle="modal" data-target="#deleteModel">
								<span class="hidden"><?php echo $account->id; ?></span>
								<i class="fas fa-trash"></i>
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>	
	</div>
