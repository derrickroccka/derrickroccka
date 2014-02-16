<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class that extends from CI_Form_validation
 * It's used to add some functions to the original library
 * The functions available are listed here:
 * - valid_url($url) -> checks if the url is valid
 * - url_exists($url) -> checks if the site is online
 * */
class MY_Form_validation extends CI_Form_validation {

	/**
	 * Checks if an URL is properly written
	 *
	 * @access  public
	 * @param   string
	 * @return  string
	 */
	function valid_url($url) {
		return filter_var($url, FILTER_VALIDATE_URL);
	}

	// --------------------------------------------------------------------

	/**
	 * Validates that a URL is accessible. Also takes ports into consideration.
	 * Note: If you see "php_network_getaddresses: getaddrinfo failed: nodename nor servname provided, or not known"
	 *          then you are having DNS resolution issues and need to fix Apache
	 *
	 * @access  public
	 * @param   string
	 * @return  string
	 */
	function url_exists($url) {
		$url_data = parse_url($url);
		// scheme, host, port, path, query
		if (!fsockopen($url_data['host'], isset($url_data['port']) ? $url_data['port'] : 80)) {
			$this -> set_message('url_exists', 'The URL you entered is not accessible.');
			echo json_encode("La url introducida no existe o no esta operativa.");
			return FALSE;
		}

		return TRUE;
	}
	

}
