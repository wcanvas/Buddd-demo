<?php
/**
 * Blocks Setup.
 *
 * @package WCB
 */

namespace WCB\Block;

defined( 'ABSPATH' ) || die();

use WCB\Functionalities\GetSvg;

/**
 * Blocks Setup class.
 */
class Blocks {

	/**
	 * Construct method
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_acf_blocks' ) );
		add_action( 'block_categories_all', array( $this, 'register_block_categories' ), 10, 2 );
	}

	/**
	 * Automatically register every block inside blocks folder
	 */
	public function register_acf_blocks() {
		if ( file_exists( get_template_directory() . '/blocks/' ) ) {

			$blocks_to_register = glob( get_template_directory() . '/assets/build/blocks/*/block.json' );

			foreach ( $blocks_to_register as $filename ) {
				$block_metadata = file_get_contents( $filename ); // phpcs:ignore
				$block_json_metadata = json_decode( $block_metadata, true );

				$block_folder = dirname( $filename );

				register_block_type(
					$block_folder,
					array(
						'icon' => $this->get_svg_icon( $block_json_metadata['icon'] ),
					)
				);

				CoreBlocks::allowed_block_list( 'acf/' . basename( $block_folder ) );
			}
		}
	}

	/**
	 * Get SVG icon for the block.
	 *
	 * @param string $name Name of the svg icon. if it has the acf/ prefix, it will look for the icon on the assets/media/icon directory. If not, it will look for a WordPress icon.
	 */
	private function get_svg_icon( $name ) {
		$svg = 'admin-comments';

		// check if the $name starts with a acf/.
		if ( strpos( $name, 'acf/' ) === 0 ) {
			return GetSvg::render( str_replace( 'acf/', '', $name ), '/assets/media/block-inserter-icons/', false );
		}

		return $name;
	}

	/**
	 * Register custom blocks categories
	 * https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#managing-block-categories
	 *
	 * @param array $categories array of categories.
	 */
	public function register_block_categories( $categories ) {

		array_unshift(
			$categories,
			array(
				'slug'  => 'wcb-blocks-navbars',
				'title' => __( 'Navbars', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-footers',
				'title' => __( 'Footers', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-heros',
				'title' => __( 'Heros', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-testimonials',
				'title' => __( 'Testimonials', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-tabbers',
				'title' => __( 'Tabbers', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-team-members',
				'title' => __( 'Team Members', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-cards',
				'title' => __( 'Cards', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-logos',
				'title' => __( 'Logo Stripes', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-left-right',
				'title' => __( 'Left Rights', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-showcase',
				'title' => __( 'Post Showcase', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-accordion',
				'title' => __( 'Accordion', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-stats',
				'title' => __( 'Stats', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-pricing',
				'title' => __( 'Pricing', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-lists',
				'title' => __( 'Lists', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-notification-bar',
				'title' => __( 'Notification Bars', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-banners',
				'title' => __( 'Banners', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-open-positions',
				'title' => __( 'Open Positions', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks-case-study',
				'title' => __( 'Case Study', 'wcanvas-boilerplate' ),
			),
			array(
				'slug'  => 'wcb-blocks',
				'title' => __( 'General Blocks', 'wcanvas-boilerplate' ),
			),
		);

		return $categories;
	}
}
