<?php
/**
 * Block Template: Cards
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_section_label = get_field( 'section_label' );
$wcb_heading = get_field( 'heading' );
$wcb_learn_more_button = get_field( 'learn_more_button' );
$wcb_cards = get_field( 'cards' );

// Check if cards exist
$has_cards = is_array( $wcb_cards ) && ! empty( $wcb_cards );
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <div class="wcb-bg-green-50 wcb-rounded-b-lg">
        <div class="wcb-container wcb-mx-auto wcb-max-w-7xl wcb-px-4 wcb-py-16">
            <div class="wcb-grid wcb-grid-cols-1 lg:wcb-grid-cols-2 wcb-gap-8 lg:wcb-gap-12">
                <!-- Left Column: Content -->
                <div class="wcb-flex wcb-flex-col wcb-justify-center">
                    <?php if ( $wcb_section_label ) : ?>
                        <div class="wcb-text-sm wcb-font-bold wcb-uppercase wcb-tracking-wider wcb-text-green-700 wcb-mb-3"><?php echo esc_html( $wcb_section_label ); ?></div>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_heading ) : ?>
                        <h2 class="wcb-text-3xl wcb-font-bold wcb-mb-6 md:wcb-text-4xl"><?php echo esc_html( $wcb_heading ); ?></h2>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_learn_more_button && ! empty( $wcb_learn_more_button['url'] ) && ! empty( $wcb_learn_more_button['title'] ) ) : ?>
                        <a 
                            href="<?php echo esc_url( $wcb_learn_more_button['url'] ); ?>" 
                            class="wcb-inline-flex wcb-items-center wcb-bg-green-700 wcb-text-white wcb-px-6 wcb-py-3 wcb-rounded-md wcb-font-medium wcb-no-underline hover:wcb-bg-green-800 wcb-transition wcb-mt-6 wcb-w-fit"
                            <?php echo ! empty( $wcb_learn_more_button['target'] ) ? 'target="' . esc_attr( $wcb_learn_more_button['target'] ) . '"' : ''; ?>
                        >
                            <?php echo esc_html( $wcb_learn_more_button['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Right Column: Cards -->
                <div class="wcb-mt-10 lg:wcb-mt-0">
                    <?php if ( $has_cards ) : ?>
                        <div class="wcb-grid wcb-grid-cols-1 sm:wcb-grid-cols-2 md:wcb-grid-cols-3 wcb-gap-6">
                            <?php foreach ( $wcb_cards as $wcb_card ) : ?>
                                <div class="wcb-bg-white wcb-rounded-lg wcb-shadow-md wcb-p-6 wcb-flex wcb-flex-col">
                                    <?php if ( ! empty( $wcb_card['image'] ) ) : ?>
                                        <div class="wcb-mb-4">
                                            <img 
                                                src="<?php echo esc_url( $wcb_card['image']['url'] ); ?>" 
                                                alt="<?php echo esc_attr( $wcb_card['image']['alt'] ); ?>" 
                                                class="wcb-rounded-lg wcb-w-full wcb-h-auto"
                                                <?php if ( ! empty( $wcb_card['image']['width'] ) && ! empty( $wcb_card['image']['height'] ) ) : ?>
                                                    width="<?php echo esc_attr( $wcb_card['image']['width'] ); ?>"
                                                    height="<?php echo esc_attr( $wcb_card['image']['height'] ); ?>"
                                                <?php endif; ?>
                                            >
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ( ! empty( $wcb_card['title'] ) ) : ?>
                                        <h3 class="wcb-text-lg wcb-font-bold wcb-mb-2"><?php echo esc_html( $wcb_card['title'] ); ?></h3>
                                    <?php endif; ?>
                                    
                                    <?php if ( ! empty( $wcb_card['description'] ) ) : ?>
                                        <p class="wcb-text-gray-600 wcb-text-sm"><?php echo esc_html( $wcb_card['description'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="wcb-text-center wcb-text-gray-500 wcb-py-8 wcb-bg-white wcb-rounded-lg wcb-shadow-sm">
                            <p>No cards added yet.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>