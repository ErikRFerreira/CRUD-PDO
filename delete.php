<?php
require 'core/init.php';
if( !isset( $_GET['SKU'] ) || $_GET['SKU'] == "" ){
	header("Location: /");
} else{
	Products::getInstance()->delete_product_by_sku( $_GET['SKU'] );
	header("Location: /");
}

