<?php 

/**
 * Sanitizes input fields
 *
 * @param string $string The string to be sanitized
 * @return string
 */
function escape($string){
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

?>