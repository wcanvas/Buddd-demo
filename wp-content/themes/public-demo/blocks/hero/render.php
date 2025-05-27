<?php
/**
 * Block Template: Hero
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_heading    = get_field( 'heading' );
$wcb_description = get_field( 'description' );
$wcb_cta_button = get_field( 'cta_button' );
$wcb_hero_image = get_field( 'hero_image' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <!-- Component: HeroBlock -->
    <div class="wcb-bg-bg-main wcb-font-lato wcb-text-text-logo">
        <div class="wcb-max-w-[1440px] wcb-w-full wcb-mx-auto wcb-px-4 sm:wcb-px-6 md:wcb-px-8 lg:wcb-px-[64px] wcb-py-8 sm:wcb-py-12 md:wcb-py-16 lg:wcb-py-[64px]">
            <div class="wcb-grid wcb-grid-cols-1 md:wcb-grid-cols-2 wcb-gap-6 sm:wcb-gap-8 md:wcb-gap-12 lg:wcb-gap-[80px] wcb-items-center">
                
                <!-- Component: TextContent -->
                <div class="wcb-text-center md:wcb-text-left wcb-order-2 md:wcb-order-1">
                    <?php if ( $wcb_heading ) : ?>
                        <h1 class="wcb-font-bold wcb-text-[28px] xs:wcb-text-[32px] sm:wcb-text-[40px] md:wcb-text-[52px] lg:wcb-text-[60px] xl:wcb-text-[85px] wcb-leading-[1.2em] sm:wcb-leading-[1.15em] lg:wcb-leading-[1em] wcb-tracking-[-0.01em] lg:wcb-tracking-[-0.02em]">
                            <?php 
                            // Split heading by lines to handle responsive display
                            $wcb_heading_lines = explode("\n", $wcb_heading);
                            
                            // Check if we have the expected format
                            if (count($wcb_heading_lines) >= 2 && strpos($wcb_heading_lines[0], 'Ultimate') !== false) {
                                echo esc_html($wcb_heading_lines[0]);
                                echo '<br class="wcb-hidden sm:wcb-block">';
                                echo '<span class="sm:wcb-hidden">Ultimate </span>';
                                
                                if (isset($wcb_heading_lines[1])) {
                                    echo esc_html($wcb_heading_lines[1]);
                                }
                                
                                if (isset($wcb_heading_lines[2])) {
                                    echo '<br>';
                                    echo esc_html($wcb_heading_lines[2]);
                                }
                            } else {
                                // Fallback if heading doesn't match expected format
                                echo nl2br(esc_html($wcb_heading));
                            }
                            ?>
                        </h1>
                    <?php endif; ?>

                    <?php if ( $wcb_description ) : ?>
                        <p class="wcb-text-[14px] sm:wcb-text-[16px] md:wcb-text-[18px] wcb-leading-[1.6em] wcb-mt-4 sm:wcb-mt-6 md:wcb-mt-[24px] wcb-max-w-full sm:wcb-max-w-[480px] md:wcb-max-w-[500px] wcb-mx-auto md:wcb-mx-0 wcb-px-2 sm:wcb-px-0">
                            <?php echo esc_html( $wcb_description ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $wcb_cta_button ) : ?>
                        <a href="<?php echo esc_url( $wcb_cta_button['url'] ); ?>" 
                           class="wcb-inline-block wcb-bg-text-logo wcb-text-bg-main wcb-font-semibold wcb-text-[14px] sm:wcb-text-[16px] wcb-leading-[1.5em] wcb-px-4 sm:wcb-px-5 md:wcb-px-[20px] wcb-py-2 sm:wcb-py-[8px] wcb-rounded-[25px] sm:wcb-rounded-[50px] wcb-mt-6 sm:wcb-mt-8 md:wcb-mt-[40px] wcb-no-underline hover:wcb-bg-opacity-90 focus:wcb-outline-none focus:wcb-ring-2 focus:wcb-ring-text-logo focus:wcb-ring-opacity-50 wcb-transition-colors wcb-duration-300 wcb-border wcb-border-text-logo" 
                           <?php echo $wcb_cta_button['target'] ? 'target="' . esc_attr( $wcb_cta_button['target'] ) . '"' : ''; ?> 
                           aria-label="<?php echo esc_attr( $wcb_cta_button['title'] ); ?>">
                            <?php echo esc_html( $wcb_cta_button['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- End of Component: TextContent -->

                <!-- Component: ImageContent -->
                <div class="wcb-order-1 md:wcb-order-2">
                    <?php if ( $wcb_hero_image ) : ?>
                        <img src="<?php echo esc_url( $wcb_hero_image['url'] ); ?>" 
                             alt="<?php echo esc_attr( $wcb_hero_image['alt'] ); ?>" 
                             class="wcb-w-full wcb-h-auto wcb-rounded-[12px] sm:wcb-rounded-[16px] md:wcb-rounded-[20px] wcb-object-cover wcb-aspect-[6/5] wcb-max-w-[400px] sm:wcb-max-w-[500px] md:wcb-max-w-[600px] wcb-mx-auto md:wcb-mx-0 md:wcb-ml-auto">
                    <?php endif; ?>
                </div>
                <!-- End of Component: ImageContent -->

            </div>
        </div>
    </div>
    <!-- End of Component: HeroBlock -->
</section>