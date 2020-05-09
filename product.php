<?php include('header.php') ?>

<?php



if( !isset( $_GET['SKU'] ) || $_GET['SKU'] == "" ){
	header("Location: /");
} else{

	if( isset( $_POST ) && !empty( $_POST ) ){

		$values = array_map( 'escape', $_POST );
		extract( $values );
		$update_product = Products::getInstance()->update_product_by_sku( $product_name, $product_price, $product_sku );
		if( $update_product ){
			header("Location: /");
		}
	}

	$product = Products::getInstance()->get_product_by_sku( $_GET['SKU'] );
	if( !empty( $product ) ){
		$product = $product[0];

	?>

	<div class="row">
		<form class="col s8 offset-s2" method="post" action="">
			
			<h5>Product details:</h5><br>

			<div class="row">
				<div class="input-field col s12">
					<input id="product_name" name="product_name" type="text" value="<?php echo $product->product_name ?>" required>
					<label for="product_name">Product Name</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="product_price" name="product_price" type="text" value="<?php echo $product->product_price ?>" required>
					<label for="product_price">Product price</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="product_sku"  type="text" value="<?php echo $product->product_sku ?>" required disabled>
					<label for="product_sku">Product SKU</label>
				</div>
			</div>

			<input type="hidden" name="product_sku" value="<?php echo $product->product_sku ?>">

			<button class="btn waves-effect waves-light left" type="submit">Update</button>
			<a onclick="return confirm('Are you sure you want to delete this product?')" href="delete.php?SKU=<?php echo $product->product_sku; ?>" class='btn waves-effect waves-light red darken-1 right'>Delete</a>
		</form>
	</div>

	<?php

	} else {
	?>
		<h5>This product doesn't exist</a></h5>
	<?php
	}
}



?>



<?php include('footer.php') ?>