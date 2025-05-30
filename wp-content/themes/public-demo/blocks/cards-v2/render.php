<?php
/**
 * Block Template: Cards v2
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_eyebrow_text = get_field( 'eyebrow_text' );
$wcb_heading = get_field( 'heading' );
$wcb_button = get_field( 'button' );
$wcb_cards = get_field( 'cards' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <!-- Block starts here -->
    <div class="wcb-bg-text-logo wcb-font-lato wcb-rounded-[20px] sm:wcb-rounded-[30px] lg:wcb-rounded-[40px] wcb-px-[16px] sm:wcb-px-[20px] lg:wcb-px-[24px] wcb-py-[40px] sm:wcb-py-[50px] lg:wcb-py-[64px] wcb-max-w-7xl wcb-mx-auto wcb-w-full">
        <div class="wcb-flex wcb-flex-col lg:wcb-flex-row lg:wcb-gap-[80px] wcb-max-w-[1200px] wcb-mx-auto">
            <!-- Left Content -->
            <div class="js-gsap-text-content lg:wcb-w-[240px] wcb-flex wcb-flex-col wcb-justify-center wcb-text-center lg:wcb-text-left wcb-mb-[40px] sm:wcb-mb-[50px] lg:wcb-mb-0 wcb-shrink-0">
                <?php if ( $wcb_eyebrow_text ) : ?>
                    <p class="wcb-text-bg-main wcb-text-[12px] sm:wcb-text-[13px] lg:wcb-text-[14px] wcb-font-normal wcb-tracking-[1px] wcb-uppercase wcb-mb-[16px] sm:wcb-mb-[20px] lg:wcb-mb-[24px] wcb-leading-[1.5em]"><?php echo esc_html( $wcb_eyebrow_text ); ?></p>
                <?php endif; ?>
                
                <?php if ( $wcb_heading ) : ?>
                    <h2 class="wcb-text-bg-main wcb-text-[28px] sm:wcb-text-[32px] lg:wcb-text-[38px] wcb-font-semibold wcb-leading-[1.2em] wcb-tracking-[-0.32px] wcb-mb-[20px] sm:wcb-mb-[22px] lg:wcb-mb-[24px]"><?php echo wp_kses_post( $wcb_heading ); ?><br class="wcb-hidden sm:wcb-block"></h2>
                <?php endif; ?>
                
                <?php if ( $wcb_button && is_array( $wcb_button ) && ! empty( $wcb_button['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $wcb_button['url'] ); ?>" role="button" aria-label="<?php echo esc_attr( $wcb_button['title'] ); ?>" class="wcb-no-underline wcb-bg-transparent wcb-text-bg-main wcb-text-[14px] sm:wcb-text-[15px] lg:wcb-text-[16px] wcb-font-normal wcb-py-[8px] wcb-px-[16px] sm:wcb-px-[18px] lg:wcb-px-[20px] wcb-border wcb-border-bg-main wcb-rounded-full wcb-self-center lg:wcb-self-start hover:wcb-opacity-90 wcb-transition-opacity wcb-duration-300 wcb-max-w-fit wcb-leading-[1.5em]">
                        <?php echo esc_html( $wcb_button['title'] ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Right Content (Cards) -->
            <?php if ( $wcb_cards && is_array( $wcb_cards ) && count( $wcb_cards ) > 0 ) : ?>
                <div class="lg:wcb-flex-1 wcb-min-w-0"> <!-- min-w-0 is important for flex children with swiper -->
                    <div class="swiper js-cards-slider">
                        <div class="swiper-wrapper wcb-pb-[10px]"> <!-- pb-10px to avoid pagination overlap visually -->
                            <?php foreach ( $wcb_cards as $wcb_card ) : ?>
                                <!-- Component: FeatureCard -->
                                <div class="swiper-slide">
                                    <div class="js-gsap-card-item wcb-flex wcb-flex-col wcb-text-left wcb-h-full wcb-bg-tertiary wcb-rounded-[16px] sm:wcb-rounded-[18px] lg:wcb-rounded-[20px] wcb-p-0 lg:wcb-max-w-[240px]">
                                        <?php if ( ! empty( $wcb_card['image'] ) && is_array( $wcb_card['image'] ) ) : ?>
                                            <img 
                                                src="<?php echo esc_url( $wcb_card['image']['url'] ); ?>" 
                                                alt="<?php echo esc_attr( $wcb_card['image']['alt'] ); ?>" 
                                                class="wcb-w-full wcb-object-cover wcb-rounded-[16px] sm:wcb-rounded-[18px] lg:wcb-rounded-[20px] wcb-mb-[12px] sm:wcb-mb-[14px] lg:wcb-mb-[16px] wcb-aspect-[3/4]"
                                            >
                                        <?php endif; ?>
                                        <div class="wcb-flex wcb-flex-col wcb-gap-[8px] sm:wcb-gap-[9px] lg:wcb-gap-[10px] wcb-px-[4px] wcb-pb-[4px]">
                                            <?php if ( ! empty( $wcb_card['title'] ) ) : ?>
                                                <h3 class="wcb-text-bg-main wcb-text-[14px] sm:wcb-text-[15px] lg:wcb-text-[16px] wcb-font-semibold wcb-leading-[1.3em]"><?php echo esc_html( $wcb_card['title'] ); ?></h3>
                                            <?php endif; ?>
                                            
                                            <?php if ( ! empty( $wcb_card['description'] ) ) : ?>
                                                <p class="wcb-text-bg-main wcb-text-[12px] sm:wcb-text-[13px] lg:wcb-text-[14px] wcb-font-normal wcb-leading-[1.6em]">
                                                    <?php echo esc_html( $wcb_card['description'] ); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Component: FeatureCard -->
                            <?php endforeach; ?>
                        </div>
                        <!-- Swiper Pagination -->
                        <div class="swiper-pagination js-swiper-pagination wcb-mt-[16px] sm:wcb-mt-[18px] lg:wcb-mt-[20px] wcb-text-center wcb-relative"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Block ends here -->
</section>