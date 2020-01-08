<div id="sidebar" onload="loader()">
	<ul id="adminNav">
		<a onClick="items()" href="javascript:void(0)"><li>Items</li></a>
		<a onClick="accounts()" href="javascript:void(0)"><li>Accounts</li></a>
	</ul>
</div>
<div id="data">
	<?php require 'application/views/admin/items.php'; ?>
</div>

<script>
	function items() {
        $("#data>div").remove();
        $("#data").load("http://localhost/gymstore/admin/items");
    };

	function accounts() {
        $("#data>div").remove();
        $("#data").load("http://localhost/gymstore/admin/accounts");
    };
</script>