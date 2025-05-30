<?php
/**
 * Block Template: Left-right
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_layout         = get_field( 'layout' ) ?: 'image-left';
$wcb_eyebrow_text   = get_field( 'eyebrow_text' );
$wcb_heading        = get_field( 'heading' );
$wcb_description    = get_field( 'description' );
$wcb_cta_button     = get_field( 'cta_button' );
$wcb_feature_image  = get_field( 'feature_image' );
$wcb_accordion_items = get_field( 'accordion_items' );

// Set order classes based on layout
$wcb_image_order = $wcb_layout === 'image-left' ? 'lg:wcb-order-1' : 'lg:wcb-order-2';
$wcb_content_order = $wcb_layout === 'image-left' ? 'lg:wcb-order-2' : 'lg:wcb-order-1';

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <!-- Block starts here -->
    <div class="wcb-bg-bg-main wcb-font-lato wcb-text-text-logo wcb-py-[48px] sm:wcb-py-[64px] md:wcb-py-[96px]">
        <div class="wcb-max-w-[1152px] wcb-w-full wcb-mx-auto wcb-px-[16px] sm:wcb-px-[24px] lg:wcb-px-[32px]">
            <div class="wcb-flex wcb-flex-col lg:wcb-flex-row wcb-items-center wcb-gap-[24px] sm:wcb-gap-[32px] lg:wcb-gap-[64px]">
                
                <!-- Image Block -->
                <?php if ( $wcb_feature_image ) : ?>
                <div class="wcb-w-full lg:wcb-w-1/2 <?php echo esc_attr( $wcb_image_order ); ?>">
                    <img 
                        src="<?php echo esc_url( $wcb_feature_image['url'] ); ?>" 
                        alt="<?php echo esc_attr( $wcb_feature_image['alt'] ); ?>" 
                        class="wcb-rounded-[16px] sm:wcb-rounded-[20px] lg:wcb-rounded-[24px] wcb-w-full wcb-h-auto wcb-object-cover wcb-aspect-[4/3]"
                    >
                </div>
                <?php endif; ?>
                
                <!-- Text Content Block -->
                <div class="wcb-w-full lg:wcb-w-1/2 <?php echo esc_attr( $wcb_content_order ); ?> wcb-flex wcb-flex-col">
                    <?php if ( $wcb_eyebrow_text ) : ?>
                    <span class="wcb-block wcb-text-[12px] sm:wcb-text-[14px] wcb-uppercase wcb-tracking-[0.07142em] wcb-font-lato wcb-text-text-logo wcb-mb-[6px] sm:wcb-mb-[8px] wcb-leading-[1.5em]">
                        <?php echo esc_html( $wcb_eyebrow_text ); ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_heading ) : ?>
                    <h2 class="wcb-font-geist wcb-text-[28px] sm:wcb-text-[32px] md:wcb-text-[40px] wcb-font-semibold wcb-text-text-logo wcb-mb-[16px] sm:wcb-mb-[20px] wcb-leading-[1.24em]">
                        <?php echo esc_html( $wcb_heading ); ?>
                    </h2>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_description ) : ?>
                    <p class="wcb-text-[16px] sm:wcb-text-[18px] wcb-font-lato wcb-text-text-logo wcb-mb-[24px] sm:wcb-mb-[32px] wcb-leading-[1.6em]">
                        <?php echo esc_html( $wcb_description ); ?>
                    </p>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_accordion_items ) : ?>
                        <?php foreach ( $wcb_accordion_items as $wcb_index => $wcb_accordion_item ) : ?>
                            <?php 
                                $wcb_accordion_title = $wcb_accordion_item['title'] ?? '';
                                $wcb_accordion_content = $wcb_accordion_item['content'] ?? '';
                                $wcb_accordion_id = 'accordion-content-' . $wcb_index;
                            ?>
                            <?php if ( $wcb_accordion_title && $wcb_accordion_content ) : ?>
                            <div class="js-accordion-item wcb-border-t wcb-border-custom-divider wcb-pt-[12px] sm:wcb-pt-[16px] wcb-mb-[12px] sm:wcb-mb-[16px]">
                                <button
                                    type="button"
                                    class="js-accordion-toggle wcb-flex wcb-justify-between wcb-items-center wcb-w-full wcb-text-left wcb-py-[4px]"
                                    aria-expanded="false"
                                    aria-controls="<?php echo esc_attr( $wcb_accordion_id ); ?>"
                                >
                                    <h3 class="wcb-font-lato wcb-text-[16px] sm:wcb-text-[18px] wcb-font-bold wcb-text-text-logo wcb-leading-[1.33em] wcb-pr-[12px]">
                                        <?php echo esc_html( $wcb_accordion_title ); ?>
                                    </h3>
                                    <i class="fas fa-chevron-down wcb-text-text-logo wcb-transform wcb-transition-transform wcb-duration-300 wcb-text-[14px] sm:wcb-text-[16px] wcb-flex-shrink-0"></i>
                                </button>
                                <div
                                    id="<?php echo esc_attr( $wcb_accordion_id ); ?>"
                                    class="wcb-overflow-hidden wcb-transition-[max-height] wcb-duration-500 wcb-ease-in-out wcb-max-h-0"
                                >
                                    <p class="wcb-text-[14px] sm:wcb-text-[16px] wcb-font-lato wcb-text-text-logo wcb-mt-[12px] sm:wcb-mt-[16px] wcb-leading-[1.5em]">
                                        <?php echo esc_html( $wcb_accordion_content ); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_cta_button ) : ?>
                    <div class="wcb-mt-[12px] sm:wcb-mt-[16px]"> 
                        <a href="<?php echo esc_url( $wcb_cta_button['url'] ); ?>" 
                           class="wcb-inline-block wcb-bg-text-logo wcb-text-bg-main wcb-font-lato wcb-font-semibold wcb-py-[8px] sm:wcb-py-[10px] wcb-px-[16px] sm:wcb-px-[20px] wcb-rounded-full wcb-text-[14px] sm:wcb-text-[16px] hover:wcb-opacity-90 wcb-transition-opacity wcb-duration-200 wcb-border wcb-border-text-logo wcb-leading-[1.5em] wcb-no-underline"
                           <?php if ( ! empty( $wcb_cta_button['target'] ) ) : ?>
                           target="<?php echo esc_attr( $wcb_cta_button['target'] ); ?>"
                           <?php endif; ?>>
                            <?php echo esc_html( $wcb_cta_button['title'] ); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- End of Text Content Block -->
            </div>
        </div>
    </div>
    <!-- Block ends here -->
</section>