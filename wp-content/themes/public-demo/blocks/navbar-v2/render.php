<?php
/**
 * Block Template: Navbar V2
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_logo_text        = get_field( 'logo_text' );
$wcb_logo_link        = get_field( 'logo_link' );
$wcb_navigation_links = get_field( 'navigation_links' );
$wcb_contact_button   = get_field( 'contact_button' );
$wcb_download_button  = get_field( 'download_button' );

// Set default logo text if empty
if ( empty( $wcb_logo_text ) ) {
    $wcb_logo_text = 'TrailHive';
}

// Set default logo link if empty
if ( empty( $wcb_logo_link ) ) {
    $wcb_logo_link = array(
        'url'    => '#',
        'title'  => $wcb_logo_text,
        'target' => '',
    );
}
?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <!-- Outer nav element with background and global font/text color -->
    <nav class="wcb-bg-text-logo wcb-font-lato wcb-text-bg-main wcb-rounded-b-[20px] sm:wcb-rounded-b-[30px] md:wcb-rounded-b-[40px]">
        <!-- Max width container for content -->
        <div class="wcb-max-w-[1200px] wcb-w-full wcb-mx-auto wcb-px-[16px] sm:wcb-px-[20px] md:wcb-px-[24px]">
            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-py-[16px] sm:wcb-py-[20px] md:wcb-py-[24px]">
                
                <!-- Component: Logo -->
                <div class="wcb-flex-shrink-0">
                    <?php if ( $wcb_logo_link ) : ?>
                        <a href="<?php echo esc_url( $wcb_logo_link['url'] ); ?>" class="wcb-flex wcb-items-center wcb-gap-[1px] sm:wcb-gap-[2px] wcb-no-underline" aria-label="<?php echo esc_attr( $wcb_logo_link['title'] ); ?>" <?php echo $wcb_logo_link['target'] ? 'target="' . esc_attr( $wcb_logo_link['target'] ) . '"' : ''; ?>>
                            <i class="fas fa-mountain wcb-text-[18px] sm:wcb-text-[20px] md:wcb-text-[22px] wcb-text-bg-main"></i>
                            <span class="wcb-font-bold wcb-text-[18px] sm:wcb-text-[20px] md:wcb-text-[22px] wcb-leading-[1em] wcb-tracking-[-0.03em] wcb-text-bg-main"><?php echo esc_html( $wcb_logo_text ); ?></span>
                        </a>
                    <?php else : ?>
                        <span class="wcb-flex wcb-items-center wcb-gap-[1px] sm:wcb-gap-[2px]">
                            <i class="fas fa-mountain wcb-text-[18px] sm:wcb-text-[20px] md:wcb-text-[22px] wcb-text-bg-main"></i>
                            <span class="wcb-font-bold wcb-text-[18px] sm:wcb-text-[20px] md:wcb-text-[22px] wcb-leading-[1em] wcb-tracking-[-0.03em] wcb-text-bg-main"><?php echo esc_html( $wcb_logo_text ); ?></span>
                        </span>
                    <?php endif; ?>
                </div>
                <!-- End of Component: Logo -->

                <!-- Component: NavigationMenu -->
                <div class="wcb-hidden lg:wcb-flex wcb-flex-grow wcb-justify-center">
                    <div class="wcb-flex wcb-items-center wcb-gap-[24px] xl:wcb-gap-[32px]" role="menubar">
                        <?php if ( ! empty( $wcb_navigation_links ) && is_array( $wcb_navigation_links ) ) : ?>
                            <?php foreach ( $wcb_navigation_links as $wcb_nav_item ) : ?>
                                <?php if ( ! empty( $wcb_nav_item['link'] ) ) : ?>
                                    <a href="<?php echo esc_url( $wcb_nav_item['link']['url'] ); ?>" class="wcb-text-bg-main hover:wcb-opacity-75 wcb-text-[15px] xl:wcb-text-[16px] wcb-leading-[1.5em] wcb-py-[24px] wcb-px-[8px] xl:wcb-px-[12px] wcb-transition-opacity wcb-duration-150 wcb-ease-in-out wcb-no-underline" role="menuitem" <?php echo $wcb_nav_item['link']['target'] ? 'target="' . esc_attr( $wcb_nav_item['link']['target'] ) . '"' : ''; ?>>
                                        <?php echo esc_html( $wcb_nav_item['link']['title'] ); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                        <?php if ( ! empty( $wcb_contact_button ) ) : ?>
                            <a href="<?php echo esc_url( $wcb_contact_button['url'] ); ?>" class="wcb-border wcb-border-bg-main wcb-text-bg-main wcb-px-[16px] xl:wcb-px-[20px] wcb-py-[6px] xl:wcb-py-[8px] wcb-rounded-full hover:wcb-bg-bg-main hover:wcb-text-text-logo wcb-transition-colors wcb-duration-150 wcb-ease-in-out wcb-text-[15px] xl:wcb-text-[16px] wcb-leading-[1.5em] wcb-no-underline" <?php echo $wcb_contact_button['target'] ? 'target="' . esc_attr( $wcb_contact_button['target'] ) . '"' : ''; ?>>
                                <?php echo esc_html( $wcb_contact_button['title'] ); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ( ! empty( $wcb_download_button ) ) : ?>
                            <a href="<?php echo esc_url( $wcb_download_button['url'] ); ?>" class="wcb-bg-bg-main wcb-text-text-logo wcb-px-[16px] xl:wcb-px-[20px] wcb-py-[6px] xl:wcb-py-[8px] wcb-rounded-full hover:wcb-opacity-80 wcb-transition-opacity wcb-duration-150 wcb-ease-in-out wcb-text-[15px] xl:wcb-text-[16px] wcb-leading-[1.5em] wcb-no-underline" <?php echo $wcb_download_button['target'] ? 'target="' . esc_attr( $wcb_download_button['target'] ) . '"' : ''; ?>>
                                <?php echo esc_html( $wcb_download_button['title'] ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- End of Component: NavigationMenu -->

                <!-- Component: ActionButtons -->
                <div class="wcb-hidden lg:wcb-flex wcb-items-center wcb-space-x-3 wcb-flex-shrink-0">
                    <!-- Buttons are now included in NavigationMenu for desktop -->
                </div>
                <!-- End of Component: ActionButtons -->

                <!-- Component: HamburgerButton -->
                <div class="lg:wcb-hidden wcb-flex wcb-items-center">
                    <button type="button" class="js-mobile-menu-button wcb-p-2 wcb-rounded-md wcb-text-bg-main focus:wcb-outline-none focus:wcb-ring-2 focus:wcb-ring-inset focus:wcb-ring-bg-main" aria-expanded="false" aria-controls="mobile-menu">
                        <span class="wcb-sr-only">Open main menu</span>
                        <i class="fas fa-bars wcb-text-[18px] sm:wcb-text-xl js-hamburger-icon"></i>
                        <i class="fas fa-times wcb-text-[18px] sm:wcb-text-xl wcb-hidden js-close-icon"></i>
                    </button>
                </div>
                <!-- End of Component: HamburgerButton -->

            </div>
        </div>

        <!-- Component: MobileMenu -->
        <div class="js-mobile-menu wcb-hidden lg:wcb-hidden" id="mobile-menu">
            <div class="wcb-px-4 wcb-pt-2 wcb-pb-4 wcb-space-y-1 sm:wcb-space-y-2 sm:wcb-px-6">
                <?php if ( ! empty( $wcb_navigation_links ) && is_array( $wcb_navigation_links ) ) : ?>
                    <?php foreach ( $wcb_navigation_links as $wcb_nav_item ) : ?>
                        <?php if ( ! empty( $wcb_nav_item['link'] ) ) : ?>
                            <a href="<?php echo esc_url( $wcb_nav_item['link']['url'] ); ?>" class="wcb-block wcb-px-3 wcb-py-3 sm:wcb-py-2 wcb-rounded-md wcb-text-[15px] sm:wcb-text-[16px] wcb-leading-[1.5em] wcb-text-bg-main hover:wcb-bg-bg-main hover:wcb-bg-opacity-10 wcb-text-center wcb-transition-colors wcb-duration-150 wcb-ease-in-out wcb-no-underline" <?php echo $wcb_nav_item['link']['target'] ? 'target="' . esc_attr( $wcb_nav_item['link']['target'] ) . '"' : ''; ?>>
                                <?php echo esc_html( $wcb_nav_item['link']['title'] ); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <div class="wcb-pt-3 wcb-mt-3 wcb-border-t wcb-border-bg-main wcb-border-opacity-20 wcb-space-y-2 sm:wcb-space-y-3">
                    <?php if ( ! empty( $wcb_contact_button ) ) : ?>
                        <a href="<?php echo esc_url( $wcb_contact_button['url'] ); ?>" class="wcb-block wcb-w-full wcb-text-center wcb-border wcb-border-bg-main wcb-text-bg-main wcb-px-[16px] sm:wcb-px-[20px] wcb-py-[10px] sm:wcb-py-[8px] wcb-rounded-full hover:wcb-bg-bg-main hover:wcb-text-text-logo wcb-transition-colors wcb-duration-150 wcb-ease-in-out wcb-text-[15px] sm:wcb-text-[16px] wcb-leading-[1.5em] wcb-no-underline" <?php echo $wcb_contact_button['target'] ? 'target="' . esc_attr( $wcb_contact_button['target'] ) . '"' : ''; ?>>
                            <?php echo esc_html( $wcb_contact_button['title'] ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $wcb_download_button ) ) : ?>
                        <a href="<?php echo esc_url( $wcb_download_button['url'] ); ?>" class="wcb-block wcb-w-full wcb-text-center wcb-bg-bg-main wcb-text-text-logo wcb-px-[16px] sm:wcb-px-[20px] wcb-py-[10px] sm:wcb-py-[8px] wcb-rounded-full hover:wcb-opacity-80 wcb-transition-opacity wcb-duration-150 wcb-ease-in-out wcb-text-[15px] sm:wcb-text-[16px] wcb-leading-[1.5em] wcb-no-underline" <?php echo $wcb_download_button['target'] ? 'target="' . esc_attr( $wcb_download_button['target'] ) . '"' : ''; ?>>
                            <?php echo esc_html( $wcb_download_button['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- End of Component: MobileMenu -->
    </nav>
</section>