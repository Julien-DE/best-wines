<div id="shopping-cart">
	<div class="txt-heading">Shopping Cart</div>

	<a id="btnEmpty" href="cart/empty">Empty Cart</a>
	<?php
	if (isset($_SESSION["cart_item"])) {
		$total_quantity = 0;
		$total_price = 0;
	?>
		<table class="tbl-cart" cellpadding="10" cellspacing="1">
			<tbody>
				<tr>
					<th style="text-align:left;">Name</th>
					<th style="text-align:left;">Id</th>
					<th style="text-align:right;" width="5%">Quantity</th>
					<th style="text-align:right;" width="10%">Unit Price</th>
					<th style="text-align:right;" width="10%">Price</th>
					<th style="text-align:center;" width="5%">Remove</th>
				</tr>
				<?php
				foreach ($_SESSION["cart_item"] as $item) {
					$item_price = $item["quantity"] * $item["price"];
				?>
					<tr>
						<td><img src="/best-wines/uploads/<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
						<td><?php echo $item["name"]; ?></td>
						<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
						<td style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
						<td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
						<td style="text-align:center;"><a href="/best-wines/cart/remove?name=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img src="uploads/icon-delete.png" alt="Remove Item" /></a></td>
					</tr>
				<?php
					$total_quantity += $item["quantity"];
					$total_price += ($item["price"] * $item["quantity"]);
				}
				?>

				<tr>
					<td colspan="2" align="right">Total:</td>
					<td align="right"><?php echo $total_quantity; ?></td>
					<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	<?php
	} else {
	?>
		<div class="no-records">Your Cart is Empty</div>
	<?php
	}
	?>
</div>