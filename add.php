<?php include('header.php') ?>

<?php 

$error = false;

if( isset( $_POST ) && !empty( $_POST ) ){
	$values = array_map( 'escape', $_POST );
	extract( $values );

	$new_product = Products::getInstance()->add_new_product( $product_name, $product_price, $product_sku );
	if (!$new_product){
		$error = true;
	} else {
		header("Location: /");
	}
}

?>

<div class="row">
	<form class="col s8 offset-s2" method="post" action="">
		
		<h5>Add New Product</h5><br>

		<div class="row">
			<div class="input-field col s12">
				<input id="product_name" name="product_name" type="text" required
				<?php if( $error ){ 
				 	echo 'value="'.$product_name.'"'; 
				 } 
			 	?>
				>
				<label for="product_name">Product Name</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="product_price" name="product_price" type="text" required
				<?php if( $error ){ 
				 	echo 'value="'.$product_price.'"'; 
				 }
			 	?>
			 	>
				<label for="product_price">Product price</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="product_sku" name="product_sku" type="text" required
				<?php if( $error ){ 
				 	echo 'class="invalid"'; } 
			 	?>
				>
				<label for="product_sku">Product SKU</label>
			</div>
		</div>


		<?php if( $error ){ ?>
			<div class="card-panel red darken-1" style="color:#fff;padding:10px;">
				Product with SKU "<?php echo $product_sku; ?>" already exists
			</div>
		<?php } ?>

		<button class="btn waves-effect waves-light" type="submit">Submit</button>

	</form>
</div>

<?php include('footer.php') ?>