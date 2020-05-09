<?php 

class Products {

	private static $_instance = null;
	private $_pdo,
			$_query,
			$_table = 'products',
			$results;



	/**
	 * Constructor
	 */
	private function __construct(){
		try {
			$this->_pdo = new PDO(
				'mysql:host='. Config::get('mysql/host') .';dbname='. Config::get('mysql/db'),
				Config::get('mysql/username'),
				Config::get('mysql/password')
			);
		}catch(PDOException $e){
			die( $e->getMessage() );
		}
	}



	/**
	 * Retunt class instance
	 *
	 * @return this instance
	 */
	public static function getInstance(){
		if( !isset( self::$_instance ) ){
			self::$_instance = new Products();
		}
		return self::$_instance;
	}



	/**
	 * Prepares and executes query
	 *
	 * @param string $sql The MySQL statement
	 * @param array $params Parameters to be binded to the query
	 * @return mixed Query result or false if nothing
	 */
	private function query( $sql, $params = array() ){
		if( $this->_query = $this->_pdo->prepare( $sql ) ){
			
			if( count($params) ){
				$x = 1;
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if( $this->_query->execute() ){
				$this->_results = $this->_query->fetchAll( PDO::FETCH_OBJ );
				return $this->_results;
			} else {
				return false;
			}
		}

		return false;
	}



	/**
	 * Get all productd
	 *
	 * @return object Query result
	 */
	public function get_all_products(){
		return $this->query("SELECT * FROM `{$this->_table}`");
	}




	/**
	 * Get an product by its SKU
	 *
	 * @param string $sku Product SKU
	 * @return mixed Query result
	 */
	public function get_product_by_sku( $sku ){
		return $this->query("SELECT * FROM `{$this->_table}` WHERE `product_sku` = '{$sku}' ");
	}




	/**
	 * Add a new product
	 *
	 * @param string $product_name Product name
	 * @param string $product_price Product price
	 * @param string $product_sku Product SKU
	 * @return bool Query result
	 */
	public function add_new_product( $product_name, $product_price, $product_sku ){

		if( $this->get_product_by_sku($product_sku) ){
			return false;
		} else {
			
			$values = func_get_args();
			$sql = "INSERT INTO `{$this->_table}` (`product_name`, `product_price`, `product_sku`) VALUES (?,?,?)";

			if( !$this->query( $sql, $values ) ){
				return true;
			}
			return false;
		}

	}




	/**
	 * Updates existing product
	 *
	 * @param string $product_name Product name
	 * @param string $product_price Product price
	 * @param string $product_sku Product SKU
	 * @return bool Query result
	 */
	public function update_product_by_sku( $product_name, $product_price, $product_sku ){
		$values = array( $product_name, $product_price );

		$sql = "UPDATE `{$this->_table}` SET `product_name` = ?, `product_price` = ? WHERE `product_sku` = '{$product_sku}' ";

		if( !$this->query( $sql, $values ) ){
			return true;
		}
		return false;

	}




	/**
	 * Deletes a product by its SKU
	 *
	 * @param string $sku Product SKU
	 * @return mixed Query result
	 */
	public function delete_product_by_sku( $sku ){
		return $this->query( "DELETE FROM `{$this->_table}` WHERE `product_sku` = '{$sku}'" );
	}



}