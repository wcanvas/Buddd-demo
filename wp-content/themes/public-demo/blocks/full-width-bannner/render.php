<?php
/**
 * Block Template: Full Width Bannner
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_heading = get_field( 'heading' );
$wcb_image = get_field( 'image' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <!-- Block starts here -->
    <div class="wcb-max-w-[896px] wcb-mx-auto wcb-px-[16px] sm:wcb-px-[20px] wcb-pt-[32px] sm:wcb-pt-[48px] md:wcb-pt-[64px] wcb-pb-[20px]">
        <div class="wcb-bg-text-logo wcb-rounded-[20px] sm:wcb-rounded-[32px] md:wcb-rounded-[40px] wcb-overflow-hidden">
            <div class="wcb-flex wcb-flex-col wcb-items-center wcb-gap-[40px] sm:wcb-gap-[60px] md:wcb-gap-[80px]">
                <div class="wcb-flex wcb-flex-col wcb-items-center wcb-gap-[24px] sm:wcb-gap-[32px] md:wcb-gap-[40px] wcb-w-full">
                    <?php if ( $wcb_heading ) : ?>
                    <div class="wcb-bg-custom-white wcb-rounded-[16px] sm:wcb-rounded-[20px] md:wcb-rounded-[24px] wcb-flex wcb-flex-col wcb-items-center wcb-gap-[16px] sm:wcb-gap-[20px] md:wcb-gap-[24px] wcb-max-w-[768px] wcb-w-full wcb-px-[16px] sm:wcb-px-[20px] md:wcb-px-[24px] wcb-py-[16px] sm:wcb-py-[20px] md:wcb-py-[24px]">
                        <div class="wcb-flex wcb-flex-col wcb-items-center wcb-gap-[16px] sm:wcb-gap-[20px] md:wcb-gap-[24px] wcb-w-full">
                            <h2 class="wcb-text-[24px] sm:wcb-text-[32px] md:wcb-text-[40px] lg:wcb-text-[48px] wcb-leading-[1.2] wcb-font-semibold wcb-font-lato wcb-text-bg-main wcb-text-center wcb-w-full">
                                <?php echo esc_html( $wcb_heading ); ?>
                            </h2>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ( $wcb_image ) : ?>
                    <div class="wcb-flex wcb-flex-col wcb-w-full">
                        <img src="<?php echo esc_url( $wcb_image['url'] ); ?>"
                             alt="<?php echo esc_attr( $wcb_image['alt'] ); ?>"
                             class="wcb-w-full wcb-h-auto wcb-object-cover wcb-rounded-[16px] sm:wcb-rounded-[20px] md:wcb-rounded-[24px]">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Block ends here -->
</section>