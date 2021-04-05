<!DOCTYPE html>
<html>
<head>
	<title>Tabel Keranjang</title>
</head>
<body>

	<table class="table" border="1">
		<tr>
			<th>ID</th>
			<th>qty</th>
			<th>price</th>
		</tr>
		<?php  $cart = $this->cart->contents();?>
		<?php foreach ($cart as $items) { ?>
	<tr>
		<td><?= $items['id'] ?></td>
		<td><?= $items['qty'] ?></td>
		<td><?= $items['price'] ?></td>
	</tr>
<?php } ?>
		
	</table>

</body>
</html>