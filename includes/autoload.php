<?php

namespace WPEvents;

/**
 * Included file returns autoload implementation to be used without Composer
 *
 * @since 1.0.0
 */
return function() {
	spl_autoload_register(
		function ( $class ) {

			if ( strpos( $class, __NAMESPACE__ ) === false ) { // avoiding autoload from other plugins.
				return;
			}

			$structure     = explode( '\\', $class );
			$namespace_key = array_search( __NAMESPACE__, $structure, true );

			unset( $structure[ $namespace_key ] );

			$file_key               = count( $structure );
			$structure[ $file_key ] = 'class-' . strtolower( $structure[ $file_key ] ) . '.php';
			$address                = implode( '/', $structure );
			$file                   = namespace\SRC . $address;

			if ( file_exists( $file ) ) {
				require $file;
			}
		}
	);
};
