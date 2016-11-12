<?php
/**
 * DesktopServer Utils object provides common utility methods for use in various modules.
 *
 * @package DesktopServer
 * @subpackage Utils
 * @uses GString class
 * @since 4.0.0
 */
if ( class_exists( 'DS_Utils' ) ) return;
class DS_Utils {

	/**
	 * Insert a key/value pair into an existing array after a matching key or offset.
	 *
	 * @param array $arr The existing array to insert into.
	 * @param string $key The key portion to insert into the array as a key/value.
	 * @param string $val The value part to insert into the array as a key/value.
	 * @param mixed $index The numeric index position or existing matching key that the key/value pair will be inserted after.
	 * @return Array
	 */
	public static function insert_key_value_pair( $arr, $key, $val, $index ) {
		if ( !is_numeric( $index ) ) {

			// Find index by match
			$i = 1;
			foreach ( $arr as $k => $v ) {
				if ( $index === $k ) {
					break;
				}
				$i++;
			}
			$index = $i;
		}
		$arrayEnd = array_splice( $arr, $index );
		$arrayStart = array_splice( $arr, 0, $index );
		return (array_merge( $arrayStart, array( $key => $val ), $arrayEnd ));

	}

	/**
	 * Generate random alpha numeric for passwords, seeds, etc.
	 *
	 * @param Number $length The length of characters to return.
	 * @param string $chars The set of possible characters to choose from.
	 * @return string The resulting randomly generated string.
	 */
	public static function random_chars( $length = 10, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890' ) {
		$string = '';
		for ( $i = 0; $i < $length; $i++ ) {
			$string .= $chars[rand( 0, strlen( $chars ) - 1 )];
		}
		return $string;
	}

	/**
	 * Recursively search the given path for the first instance of the given
	 * filename.
	 *
	 * @param string $path The path to perform searching recursively.
	 * @param string $name The filename to find.
	 * @return string The complete path to the file or empty string if not found.
	 */
	public static function find_first_file( $path, $name ) {
		$scan = scandir( $path );
		if ( $scan !== false ) {
			$folders = array_diff( $scan, array( '..', '.' ) );
		}
		if ( $folders !== NULL ) {
			foreach( $folders as $f ) {
				$f = $path . '/' . $f;
				if ( true === is_dir( $f ) ) {
					$r = new GString( DS_Utils::find_first_file( $f, $name ) );
					if ( $name === (string) $r->getRightMost('/') ) {
						return (string) $r;
					}
				}else{
					$r = new GString( $f );
					if ( $name === (string) $r->getRightMost('/') ) {
						return (string) $r;
					}
				}
			}
		}
		return '';
	}

	/**
	 * Find the original domain(s) and site root folder for the given WordPress
	 * website.
	 *
	 * @param string $folder The path to the source files.
	 * @return array An array containing the original site details.
	 */
	public static function find_site_details( $folder ) {
		$folder = apply_filters( 'ds_utils_find_site_details_folder', $folder );

		// Locate the database.sql and wp-config.php file and obtain table prefix.
		$wp_config = DS_Utils::find_first_file( $folder, 'wp-config.php' );
		$database = DS_Utils::find_first_file( $folder, 'database.sql' );
		$wpc = new DS_ConfigFile( $wp_config );
		$wpc->set_type( 'php-variable' );
		$table_prefix = $wpc->get_key( 'table_prefix', 'wp_' );

		// Create a temp database in the active mysql database.
		$sql = "CREATE USER 'temp_blueprints'@'localhost' IDENTIFIED BY 'temp_blueprints';";
		$sql .= "CREATE DATABASE temp_blueprints;";
		$sql .= "GRANT ALL PRIVILEGES ON temp_blueprints.* TO 'temp_blueprints'@'localhost' IDENTIFIED BY 'temp_blueprints';";
		$blueDB = new wpdb( $ds->security->mysql->username , $ds->security->mysql->password , $ds->security->mysql->database , $ds->security->mysql->host );
		$blueDB->query( $sql );

		$details = apply_filters( 'ds_utils_find_site_details_result', $result );
		return $result;
	}

	/**
	 * Generate random salt, includes randomChars with expanded character set,
	 * and a default of 64 bytes in length.
	 *
	 * @param Number $length The length of characters to return.
	 * @param string $chars The set of possible characters to choose from.
	 * @return string The resulting randomly generated string.
	 */
	public static function random_salt( $length = 64 ) {
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_-+=[]{}|~`.,';
		return DS_Utils::random_chars( $length, $chars );
	}

	function enqueue_prepend( $handle, $src, $depends, $version ) {

	}

	function dequeue_prepend( $handle ) {

	}

	function enqueue_append( $handle, $src, $depends, $version ) {

	}

	function dequeue_append( $handle ) {

	}

	function enqueue_functions( $handle, $src, $depends, $version ) {

	}

	function dequeue_functions( $handle ) {

	}
}
