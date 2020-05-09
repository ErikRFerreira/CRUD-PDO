<?php include('header.php') ?>

	<?php 
		$products = Products::getInstance()->get_all_products();
		if(!empty( $products) ){
	?>
		<h5>Products</h5><br>
		<table>
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product SKU</th>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
			<?php foreach ($products as $product) { ?>
				<tr>
					<td><?php echo $product->product_name; ?></td>
					<td><?php echo $product->product_price; ?></td>
					<td><?php echo $product->product_sku; ?></td>
					<td>
						<a href="product.php?SKU=<?php echo $product->product_sku; ?>" class='green-text'>Edit</a>
					</td>
					<td>
						<a onclick="return confirm('Are you sure you want to delete this product?')" href="delete.php?SKU=<?php echo $product->product_sku; ?>" class='red-text'>Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

	<?php
		} else {
	?>
		<h5>No products exist yet. Start by <a href="/add.php">creating a new product.</a></h5>
	<?php
		}
	?>


<?php include('footer.php') ?>