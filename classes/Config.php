<?php 

class Config{

	/**
	 * Return the values stored in Config global
	 *
	 * @param string $path A string that represents the config option wanted
	 * @return string
	 */
	public static function get( $path = null ){

		if( $path ){
			$config = $GLOBALS['config'];
			$path = explode('/', $path);
			foreach ($path as $dir) {
				if( isset( $config[$dir] ) ){
					$config = $config[$dir];
				}
			}

			return $config;
		}

		return false;
	}

}


?>