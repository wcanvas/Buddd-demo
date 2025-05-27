<?php
/**
 * Block Template: Quote
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_section_label = get_field( 'section_label' );
$wcb_quote = get_field( 'quote' );
$wcb_author_name = get_field( 'author_name' );
$wcb_trust_text = get_field( 'trust_text' );
$wcb_logos = get_field( 'logos' );
$wcb_background_image = get_field( 'background_image' );

// Background handling
if ( $wcb_background_image && isset( $wcb_background_image['url'] ) ) {
    $wcb_bg_style = 'style="background-image: url(' . esc_url( $wcb_background_image['url'] ) . ');"';
    $wcb_bg_class = 'wcb-bg-cover wcb-bg-center';
} else {
    $wcb_bg_style = '';
    // Use the pattern visual as a fallback
    $wcb_bg_class = 'wcb-bg-[url(\'https://placehold.co/1920x800/2A3C3A/3B5249?text=Subtle+Pattern+Visual\')] wcb-bg-cover wcb-bg-center';
}
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <div class="<?php echo esc_attr( $wcb_bg_class ); ?>" <?php echo wp_kses_post( $wcb_bg_style ); ?>>
        <div class="wcb-max-w-[1200px] wcb-mx-auto wcb-px-[16px] sm:wcb-px-[20px] wcb-py-[40px] sm:wcb-py-[60px] wcb-text-center">
            
            <!-- Component: TestimonialBlock -->
            <div class="wcb-w-full wcb-flex wcb-flex-col wcb-items-center wcb-gap-[60px] sm:wcb-gap-[80px] lg:wcb-gap-[100px]">
                
                <!-- Quote Wrapper -->
                <div class="wcb-w-full wcb-max-w-[1020px] wcb-flex wcb-flex-col wcb-gap-[16px] sm:wcb-gap-[20px] lg:wcb-gap-[24px]">
                    <?php if ( $wcb_section_label ) : ?>
                    <p class="wcb-text-[12px] sm:wcb-text-[14px] wcb-font-lato wcb-font-normal wcb-leading-[1.5em] wcb-tracking-[0.07em] wcb-uppercase wcb-text-text-logo">
                        <?php echo esc_html( $wcb_section_label ); ?>
                    </p>
                    <?php endif; ?>

                    <?php if ( $wcb_quote ) : ?>
                    <blockquote>
                        <p class="wcb-text-[24px] sm:wcb-text-[32px] md:wcb-text-[40px] lg:wcb-text-[48px] wcb-font-lato wcb-font-bold wcb-leading-[1.1em] wcb-tracking-[-0.04166em] wcb-text-text-logo wcb-px-[8px] sm:wcb-px-0">
                            "<?php echo esc_html( $wcb_quote ); ?>"
                        </p>
                    </blockquote>
                    <?php endif; ?>

                    <?php if ( $wcb_author_name ) : ?>
                    <cite class="wcb-text-[18px] sm:wcb-text-[20px] lg:wcb-text-[24px] wcb-font-lato wcb-font-bold wcb-leading-[1.2em] wcb-text-text-logo wcb-not-italic">
                        - <?php echo esc_html( $wcb_author_name ); ?>
                    </cite>
                    <?php endif; ?>
                </div>

                <?php if ( $wcb_trust_text || ( $wcb_logos && is_array( $wcb_logos ) && count( $wcb_logos ) > 0 ) ) : ?>
                <!-- Logo Wrapper -->
                <div class="wcb-w-full wcb-flex wcb-flex-col wcb-items-center wcb-gap-[30px] sm:wcb-gap-[40px] lg:wcb-gap-[50px]">
                    <?php if ( $wcb_trust_text ) : ?>
                    <p class="wcb-text-[16px] sm:wcb-text-[18px] lg:wcb-text-[20px] wcb-font-graphik wcb-font-medium wcb-leading-[1.3em] wcb-text-text-logo wcb-px-[16px] sm:wcb-px-0">
                        <?php echo esc_html( $wcb_trust_text ); ?>
                    </p>
                    <?php endif; ?>

                    <?php if ( $wcb_logos && is_array( $wcb_logos ) && count( $wcb_logos ) > 0 ) : ?>
                    <!-- Component: LogoCloud -->
                    <div class="wcb-w-full wcb-max-w-[1200px] wcb-flex wcb-flex-row wcb-justify-center wcb-items-center wcb-gap-[30px] sm:wcb-gap-[40px] lg:wcb-gap-[60px] wcb-flex-wrap wcb-px-[8px] sm:wcb-px-0">
                        <?php foreach ( $wcb_logos as $wcb_logo ) : ?>
                            <?php 
                                $wcb_logo_image = isset( $wcb_logo['logo_image'] ) ? $wcb_logo['logo_image'] : null;
                                $wcb_logo_link = isset( $wcb_logo['logo_link'] ) ? $wcb_logo['logo_link'] : null;
                                
                                if ( $wcb_logo_image ) :
                                    $wcb_logo_url = $wcb_logo_link && isset( $wcb_logo_link['url'] ) ? $wcb_logo_link['url'] : '#';
                                    $wcb_logo_title = $wcb_logo_link && isset( $wcb_logo_link['title'] ) ? $wcb_logo_link['title'] : '';
                                    $wcb_logo_target = $wcb_logo_link && isset( $wcb_logo_link['target'] ) ? $wcb_logo_link['target'] : '_self';
                                    $wcb_logo_alt = isset( $wcb_logo_image['alt'] ) ? $wcb_logo_image['alt'] : '';
                            ?>
                            <a href="<?php echo esc_url( $wcb_logo_url ); ?>" 
                               <?php echo ! empty( $wcb_logo_title ) ? 'aria-label="' . esc_attr( $wcb_logo_title ) . '"' : ''; ?> 
                               target="<?php echo esc_attr( $wcb_logo_target ); ?>" 
                               class="wcb-opacity-80 hover:wcb-opacity-100 wcb-transition-opacity wcb-duration-300 wcb-no-underline">
                                <img src="<?php echo esc_url( $wcb_logo_image['url'] ); ?>" 
                                     alt="<?php echo esc_attr( $wcb_logo_alt ); ?>" 
                                     class="wcb-object-contain wcb-w-[60px] sm:wcb-w-[70px] lg:wcb-w-[80px] wcb-h-auto" 
                                     style="filter: opacity(0.8);">
                            </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- End of Component: LogoCloud -->
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- End of Component: TestimonialBlock -->

        </div>
    </div>
</section>