<?php
/**
 * Block Wrapper.
 *
 * @package WCB
 */

namespace WCB\Block;

defined( 'ABSPATH' ) || die();

/**
 * Block Wrapper class.
 */
class BlockWrapper {

	/**
	 * Returns all the attributes for the outer most element of an ACF block.
	 *
	 * Here you can add classes to all ACF Blocks (or blocks that echo this function in their wrapper).
	 *
	 * @param array $block array of block metadata.
	 * @param array $extra_attributes Associative array of extra attributes to add to the outer most element of a block.
	 * Supported attributes:
	 * class or style.
	 */
	public static function get_global_block_wrapper_data( $block, $extra_attributes = array() ) {
		$extra_classes = empty( $extra_attributes['class'] ) ? null : ' ' . $extra_attributes['class'];
		$extra_style   = empty( $extra_attributes['style'] ) ? null : $extra_attributes['style'];

		$block_name = self::get_block_name( $block );

		// The alignfull class makes the acf block full width on the frontend. For the editor we have a style in the scss/editor/_editor-layout.scss file.
		$inline_styles = 'style="';
		$classes       = 'class="wp-block-acf-' . $block_name . ' js-' . $block_name . ' alignfull' . $extra_classes . '"';

		if ( isset( $block['style']['spacing'] ) ) {
			$inline_styles .= self::convert_spacing_to_string( $block['style']['spacing'] );
		}

		$inline_styles .= $extra_style . '"';

		$classes .= $block && isset( $block['anchor'] ) && $block['anchor'] ? ' id="' . $block['anchor'] . '"' : '';

		if ( 'style=""' === $inline_styles ) {
			return $classes;
		} else {
			return $classes . ' ' . $inline_styles;
		}
	}

	/**
	 * Converts the spacing array to a string.
	 *
	 * @param array $spacing array of spacing values.
	 */
	public static function convert_spacing_to_string( $spacing ) {
		$result = '';

		foreach ( $spacing as $property => $values ) {
			foreach ( $values as $sub_property => $value ) {
				$css_property = $property . '-' . $sub_property;
				if ( strpos( $value, 'var:preset|' ) === 0 ) {
					$css_value = str_replace( 'var:preset|', 'var(--wp--preset--', $value );
					$css_value = str_replace( '|', '--', $css_value ) . ')';
				} else {
					$css_value = $value;
				}
				$result .= $css_property . ':' . $css_value . ';';
			}
		}

		return $result;
	}

	/**
	 * Gets the blocks name
	 *
	 * @param array $block array of block metadata.
	 */
	private static function get_block_name( $block ) {
		$pos        = strpos( $block['name'], '/' );
		$block_name = '';
		if ( false !== $pos ) {
			$block_name = substr( $block['name'], $pos + 1 );
		}
		return $block_name;
	}
}
