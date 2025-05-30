<?php
/**
 * Block Template: Cards With Icons
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_heading     = get_field( 'heading' );
$wcb_description = get_field( 'description' );
$wcb_features    = get_field( 'features' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <div class="wcb-bg-custom-text-dark wcb-font-lato wcb-text-text-logo wcb-py-[40px] sm:wcb-py-[60px] lg:wcb-py-[80px]">
        <div class="wcb-max-w-7xl wcb-w-full wcb-mx-auto wcb-px-[20px] sm:wcb-px-[40px] lg:wcb-px-[60px]">
            
            <?php if ( $wcb_heading || $wcb_description ) : ?>
            <!-- Header Section -->
            <div class="wcb-text-center wcb-mb-[50px] sm:wcb-mb-[70px] lg:wcb-mb-[95px]">
                <?php if ( $wcb_heading ) : ?>
                <h2 class="wcb-text-[32px] sm:wcb-text-[40px] lg:wcb-text-[48px] wcb-font-bold wcb-text-text-logo wcb-mb-[16px] sm:wcb-mb-[20px] wcb-leading-[1.1] wcb-tracking-[-0.04em] wcb-px-[10px] sm:wcb-px-0"><?php echo esc_html( $wcb_heading ); ?></h2>
                <?php endif; ?>
                
                <?php if ( $wcb_description ) : ?>
                <p class="wcb-text-[16px] sm:wcb-text-[18px] wcb-leading-[1.6] wcb-max-w-3xl wcb-mx-auto wcb-text-text-logo wcb-px-[10px] sm:wcb-px-0"><?php echo esc_html( $wcb_description ); ?></p>
                <?php endif; ?>
            </div>
            <!-- End of Header Section -->
            <?php endif; ?>

            <?php if ( $wcb_features && is_array( $wcb_features ) && count( $wcb_features ) > 0 ) : ?>
            <!-- Features Grid -->
            <div class="wcb-grid wcb-grid-cols-1 sm:wcb-grid-cols-2 lg:wcb-grid-cols-3 wcb-gap-x-[30px] sm:wcb-gap-x-[50px] lg:wcb-gap-x-[95px] wcb-gap-y-[40px] sm:wcb-gap-y-[60px] lg:wcb-gap-y-[95px]">
                
                <?php foreach ( $wcb_features as $wcb_feature ) : ?>
                    <?php 
                    $wcb_feature_icon = isset( $wcb_feature['icon'] ) ? $wcb_feature['icon'] : '';
                    $wcb_feature_title = isset( $wcb_feature['title'] ) ? $wcb_feature['title'] : '';
                    $wcb_feature_description = isset( $wcb_feature['description'] ) ? $wcb_feature['description'] : '';
                    ?>
                    
                    <!-- Feature Card -->
                    <div class="wcb-flex wcb-flex-col wcb-items-start wcb-text-left wcb-gap-[16px] sm:wcb-gap-[20px] wcb-px-[10px] sm:wcb-px-0">
                        <?php if ( $wcb_feature_icon && is_array( $wcb_feature_icon ) && !empty( $wcb_feature_icon['url'] ) ) : ?>
                        <img 
                            src="<?php echo esc_url( $wcb_feature_icon['url'] ); ?>" 
                            alt="<?php echo esc_attr( !empty( $wcb_feature_icon['alt'] ) ? $wcb_feature_icon['alt'] : $wcb_feature_title ); ?>" 
                            class="wcb-w-[48px] wcb-h-[48px] sm:wcb-w-[64px] sm:wcb-h-[64px]"
                        >
                        <?php endif; ?>
                        
                        <?php if ( $wcb_feature_title ) : ?>
                        <h3 class="wcb-text-[18px] sm:wcb-text-[20px] wcb-font-bold wcb-text-text-logo wcb-leading-[1.2]"><?php echo esc_html( $wcb_feature_title ); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ( $wcb_feature_description ) : ?>
                        <p class="wcb-text-[14px] sm:wcb-text-[16px] wcb-text-text-logo wcb-leading-[1.375]"><?php echo esc_html( $wcb_feature_description ); ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- End of Feature Card -->
                <?php endforeach; ?>
                
            </div>
            <!-- End of Features Grid -->
            <?php endif; ?>
            
        </div>
    </div>
</section>