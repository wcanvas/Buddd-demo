<?php
/**
 * Block Template: Stats With image
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_label       = get_field( 'label' );
$wcb_heading     = get_field( 'heading' );
$wcb_description = get_field( 'description' );
$wcb_accordion_items = get_field( 'accordion_items' );
$wcb_image       = get_field( 'image' );
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <div class="wcb-bg-text-logo wcb-font-lato wcb-text-bg-main wcb-py-[24px] sm:wcb-py-[32px] lg:wcb-py-[40px] wcb-px-4 sm:wcb-px-6 lg:wcb-px-8 wcb-rounded-[20px] sm:wcb-rounded-[30px] lg:wcb-rounded-[40px]">
        <div class="wcb-max-w-7xl wcb-mx-auto wcb-grid wcb-grid-cols-1 lg:wcb-grid-cols-2 wcb-gap-6 sm:wcb-gap-8 lg:wcb-gap-12 xl:wcb-gap-16 wcb-items-start">
            <!-- Left Column -->
            <div class="wcb-flex wcb-flex-col wcb-space-y-[16px] sm:wcb-space-y-[18px] lg:wcb-space-y-[20px] wcb-order-2 lg:wcb-order-1">
                <!-- Feature Text Section -->
                <div>
                    <?php if ( $wcb_label ) : ?>
                        <p class="wcb-text-[12px] sm:wcb-text-[13px] lg:wcb-text-[14px] wcb-font-lato wcb-font-normal wcb-tracking-[0.07142857142857142em] wcb-uppercase wcb-text-bg-main wcb-leading-[1.5em]"><?php echo esc_html( $wcb_label ); ?></p>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_heading ) : ?>
                        <h2 class="wcb-mt-2 wcb-text-[28px] sm:wcb-text-[32px] lg:wcb-text-[40px] wcb-font-geist wcb-font-semibold wcb-text-bg-main wcb-leading-[1.2399999618530273em]"><?php echo esc_html( $wcb_heading ); ?></h2>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_description ) : ?>
                        <p class="wcb-mt-4 sm:wcb-mt-5 lg:wcb-mt-6 wcb-text-[16px] sm:wcb-text-[17px] lg:wcb-text-[18px] wcb-text-bg-main wcb-font-lato wcb-leading-[1.6000000635782878em]">
                            <?php echo esc_html( $wcb_description ); ?>
                        </p>
                    <?php endif; ?>
                </div>
                
                <?php if ( $wcb_accordion_items && is_array( $wcb_accordion_items ) && count( $wcb_accordion_items ) > 0 ) : ?>
                    <!-- Accordion -->
                    <div class="wcb-space-y-0 js-accordion">
                        <?php foreach ( $wcb_accordion_items as $wcb_index => $wcb_item ) : ?>
                            <!-- Accordion Item -->
                            <div class="wcb-border-t wcb-border-custom-accordion-border wcb-pt-[14px] sm:wcb-pt-[15px] lg:wcb-pt-[16px] js-accordion-item">
                                <h3 class="wcb-text-[16px] sm:wcb-text-[17px] lg:wcb-text-[18px] wcb-font-lato wcb-font-bold wcb-text-bg-main wcb-leading-[1.3333333333333333em]">
                                    <button type="button" class="js-accordion-toggle wcb-flex wcb-justify-between wcb-items-center wcb-w-full wcb-text-left focus:wcb-outline-none wcb-gap-4 sm:wcb-gap-8 lg:wcb-gap-[168px]" aria-expanded="<?php echo $wcb_index === 0 ? 'true' : 'false'; ?>" aria-controls="accordion-content-<?php echo esc_attr( $wcb_index + 1 ); ?>">
                                        <span><?php echo esc_html( $wcb_item['title'] ); ?></span>
                                        <span class="js-accordion-icon wcb-transform wcb-transition-transform wcb-duration-300 <?php echo $wcb_index === 0 ? '' : 'wcb-opacity-70'; ?> wcb-flex-shrink-0">
                                            <i class="fas fa-chevron-down wcb-text-sm"></i>
                                        </span>
                                    </button>
                                </h3>
                                <div id="accordion-content-<?php echo esc_attr( $wcb_index + 1 ); ?>" class="js-accordion-content wcb-mt-3 wcb-text-[14px] sm:wcb-text-[15px] lg:wcb-text-[16px] wcb-text-bg-main wcb-font-lato wcb-leading-[1.5em] wcb-overflow-hidden wcb-transition-all wcb-duration-300 wcb-ease-in-out" style="max-height: <?php echo $wcb_index === 0 ? 'none' : '0px'; ?>;">
                                    <p><?php echo esc_html( $wcb_item['content'] ); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="wcb-border-t wcb-border-custom-accordion-border"></div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Column -->
            <div class="wcb-order-1 lg:wcb-order-2 lg:wcb-mt-0 wcb-flex wcb-items-center wcb-justify-center">
                <?php if ( $wcb_image ) : ?>
                    <div class="wcb-bg-custom-chart-area-bg wcb-p-4 sm:wcb-p-5 lg:wcb-p-6 xl:wcb-p-8 wcb-rounded-[16px] sm:wcb-rounded-[18px] lg:wcb-rounded-[20px] wcb-shadow-[0px_2px_8px_0px_#00000026] wcb-w-full wcb-max-w-[400px] sm:wcb-max-w-[450px] lg:wcb-max-w-[550px]">
                        <img src="<?php echo esc_url( $wcb_image['url'] ); ?>" alt="<?php echo esc_attr( $wcb_image['alt'] ); ?>" class="wcb-rounded-[12px] sm:wcb-rounded-[16px] lg:wcb-rounded-[20px] wcb-w-full wcb-h-auto wcb-object-cover">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>