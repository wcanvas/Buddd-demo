<?php
/**
 * Block Template: Footer
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_logo = get_field( 'logo' );
$wcb_app_links = get_field( 'app_links' );
$wcb_company_links = get_field( 'company_links' );
$wcb_newsletter_form_action = get_field( 'newsletter_form_action' );
$wcb_newsletter_email_placeholder = get_field( 'newsletter_email_placeholder' );
$wcb_newsletter_subscribe_button = get_field( 'newsletter_subscribe_button' );
$wcb_privacy_policy_text = get_field( 'privacy_policy_text' );
$wcb_privacy_policy_link = get_field( 'privacy_policy_link' );
$wcb_copyright_text = get_field( 'copyright_text' );
$wcb_social_media_links = get_field( 'social_media_links' );
$wcb_legal_links = get_field( 'legal_links' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
    <footer class="wcb-bg-bg-main wcb-font-lato wcb-text-text-logo wcb-py-[40px] sm:wcb-py-[60px] lg:wcb-py-[80px]">
        <div class="wcb-max-w-[1440px] wcb-w-full wcb-mx-auto wcb-px-[16px] sm:wcb-px-[20px]">
            <!-- Component: FooterTop -->
            <div class="wcb-grid wcb-grid-cols-1 sm:wcb-grid-cols-2 md:wcb-grid-cols-12 wcb-gap-[24px] sm:wcb-gap-[32px] wcb-mb-[40px] sm:wcb-mb-[60px] lg:wcb-mb-[80px]">
                <!-- Logo -->
                <div class="sm:wcb-col-span-2 md:wcb-col-span-4 lg:wcb-col-span-3 wcb-mb-[16px] sm:wcb-mb-0">
                    <?php if ( $wcb_logo ) : ?>
                        <a href="<?php echo esc_url( $wcb_logo['url'] ); ?>" class="wcb-flex wcb-items-center wcb-text-text-logo wcb-text-[24px] sm:wcb-text-[28px] lg:wcb-text-[32px] wcb-font-lato wcb-font-bold wcb-leading-[1em] wcb-tracking-[-0.96px] wcb-no-underline">
                            <i class="fas fa-mountain wcb-mr-[3px] wcb-text-[24px] sm:wcb-text-[28px] lg:wcb-text-[32px]"></i>
                            <?php echo esc_html( $wcb_logo['title'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- App Links -->
                <div class="sm:wcb-col-span-1 md:wcb-col-span-4 lg:wcb-col-span-2 wcb-mb-[16px] sm:wcb-mb-0">
                    <h3 class="wcb-font-lato wcb-font-medium wcb-text-text-logo wcb-text-[14px] sm:wcb-text-[16px] wcb-leading-[1.3em] wcb-mb-[12px] sm:wcb-mb-[16px]">App</h3>
                    <?php if ( $wcb_app_links && is_array( $wcb_app_links ) ) : ?>
                        <ul class="wcb-space-y-0 wcb-list-none">
                            <?php foreach ( $wcb_app_links as $wcb_link ) : ?>
                                <?php if ( ! empty( $wcb_link['link'] ) ) : ?>
                                    <li class="wcb-py-[6px] sm:wcb-py-[8px]">
                                        <a href="<?php echo esc_url( $wcb_link['link']['url'] ); ?>" class="wcb-font-lato wcb-font-normal wcb-text-[12px] sm:wcb-text-[14px] wcb-leading-[1.6em] wcb-text-text-logo hover:wcb-text-text-logo wcb-no-underline" <?php echo ! empty( $wcb_link['link']['target'] ) ? 'target="' . esc_attr( $wcb_link['link']['target'] ) . '"' : ''; ?>>
                                            <?php echo esc_html( $wcb_link['link']['title'] ); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Company Links -->
                <div class="sm:wcb-col-span-1 md:wcb-col-span-4 lg:wcb-col-span-2 wcb-mb-[24px] sm:wcb-mb-0">
                    <h3 class="wcb-font-lato wcb-font-medium wcb-text-text-logo wcb-text-[14px] sm:wcb-text-[16px] wcb-leading-[1.3em] wcb-mb-[12px] sm:wcb-mb-[16px]">Company</h3>
                    <?php if ( $wcb_company_links && is_array( $wcb_company_links ) ) : ?>
                        <ul class="wcb-space-y-0 wcb-list-none">
                            <?php foreach ( $wcb_company_links as $wcb_link ) : ?>
                                <?php if ( ! empty( $wcb_link['link'] ) ) : ?>
                                    <li class="wcb-py-[6px] sm:wcb-py-[8px]">
                                        <a href="<?php echo esc_url( $wcb_link['link']['url'] ); ?>" class="wcb-font-lato wcb-font-normal wcb-text-[12px] sm:wcb-text-[14px] wcb-leading-[1.6em] wcb-text-text-logo hover:wcb-text-text-logo wcb-no-underline" <?php echo ! empty( $wcb_link['link']['target'] ) ? 'target="' . esc_attr( $wcb_link['link']['target'] ) . '"' : ''; ?>>
                                            <?php echo esc_html( $wcb_link['link']['title'] ); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Newsletter Form -->
                <div class="sm:wcb-col-span-2 md:wcb-col-span-12 lg:wcb-col-span-5">
                    <form action="<?php echo esc_url( $wcb_newsletter_form_action ); ?>" method="POST" class="wcb-flex wcb-flex-col wcb-gap-[12px] sm:wcb-gap-[16px]">
                        <div class="wcb-flex-grow">
                            <label for="email" class="wcb-sr-only"><?php echo esc_html( $wcb_newsletter_email_placeholder ); ?></label>
                            <input type="email" name="email" id="email" placeholder="<?php echo esc_attr( $wcb_newsletter_email_placeholder ); ?>" class="wcb-w-full wcb-bg-bg-main wcb-border-0 wcb-border-b-[1px] wcb-border-text-logo wcb-placeholder-text-placeholder wcb-text-text-logo wcb-py-[8px] sm:wcb-py-[10px] wcb-px-[12px] sm:wcb-px-[16px] focus:wcb-outline-none focus:wcb-border-text-logo wcb-font-lato wcb-font-normal wcb-text-[12px] wcb-leading-[1.5em]">
                        </div>
                        <?php if ( $wcb_newsletter_subscribe_button ) : ?>
                            <button type="submit" class="wcb-bg-button-bg wcb-border-[1px] wcb-border-button-border wcb-text-text-logo wcb-rounded-[40px] wcb-px-[24px] sm:wcb-px-[32px] wcb-py-[10px] sm:wcb-py-[12px] hover:wcb-bg-button-border hover:wcb-text-bg-main wcb-transition-colors wcb-duration-200 wcb-font-lato wcb-font-normal wcb-text-[14px] sm:wcb-text-[16px] wcb-leading-[1.5em] wcb-no-underline wcb-w-full sm:wcb-w-auto">
                                <?php echo esc_html( $wcb_newsletter_subscribe_button['title'] ); ?>
                            </button>
                        <?php endif; ?>
                    </form>
                    <?php if ( $wcb_privacy_policy_text && $wcb_privacy_policy_link ) : ?>
                        <p class="wcb-text-text-logo wcb-text-[11px] sm:wcb-text-[12px] wcb-leading-[1.5em] wcb-mt-[8px] sm:wcb-mt-[10px] wcb-font-inter wcb-font-normal">
                            <?php echo esc_html( $wcb_privacy_policy_text ); ?> <a href="<?php echo esc_url( $wcb_privacy_policy_link['url'] ); ?>" class="wcb-underline hover:wcb-text-text-logo" <?php echo ! empty( $wcb_privacy_policy_link['target'] ) ? 'target="' . esc_attr( $wcb_privacy_policy_link['target'] ) . '"' : ''; ?>><?php echo esc_html( $wcb_privacy_policy_link['title'] ); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End of Component: FooterTop -->

            <hr class="wcb-border-button-border">

            <!-- Component: FooterBottom -->
            <div class="wcb-flex wcb-flex-col wcb-gap-[20px] sm:wcb-gap-[24px] md:wcb-flex-row md:wcb-justify-between md:wcb-items-center wcb-mt-[24px] sm:wcb-mt-[32px]">
                <?php if ( $wcb_copyright_text ) : ?>
                    <p class="wcb-font-lato wcb-font-normal wcb-text-[12px] sm:wcb-text-[14px] wcb-leading-[1.5em] wcb-text-text-logo wcb-text-center md:wcb-text-left wcb-order-2 md:wcb-order-1"><?php echo esc_html( $wcb_copyright_text ); ?></p>
                <?php endif; ?>
                
                <!-- Social Media Icons -->
                <?php if ( $wcb_social_media_links && is_array( $wcb_social_media_links ) ) : ?>
                    <div class="wcb-flex wcb-space-x-[16px] sm:wcb-space-x-[12px] wcb-items-center wcb-justify-center md:wcb-justify-end wcb-list-none wcb-order-1 md:wcb-order-3">
                        <?php foreach ( $wcb_social_media_links as $wcb_social_link ) : ?>
                            <?php if ( ! empty( $wcb_social_link['link'] ) && ! empty( $wcb_social_link['icon_class'] ) ) : ?>
                                <a href="<?php echo esc_url( $wcb_social_link['link']['url'] ); ?>" aria-label="<?php echo esc_attr( $wcb_social_link['link']['title'] ); ?>" class="wcb-text-text-logo hover:wcb-text-text-logo wcb-no-underline" <?php echo ! empty( $wcb_social_link['link']['target'] ) ? 'target="' . esc_attr( $wcb_social_link['link']['target'] ) . '"' : ''; ?>>
                                    <i class="<?php echo esc_attr( $wcb_social_link['icon_class'] ); ?> wcb-text-[16px] sm:wcb-text-[18px]"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Legal Links -->
                <?php if ( $wcb_legal_links && is_array( $wcb_legal_links ) ) : ?>
                    <nav class="wcb-flex wcb-flex-col sm:wcb-flex-row sm:wcb-flex-wrap wcb-justify-center wcb-gap-x-[20px] sm:wcb-gap-x-[32px] wcb-gap-y-[8px] wcb-list-none wcb-order-3 md:wcb-order-2" aria-label="Footer legal links">
                        <?php foreach ( $wcb_legal_links as $wcb_legal_link ) : ?>
                            <?php if ( ! empty( $wcb_legal_link['link'] ) ) : ?>
                                <a href="<?php echo esc_url( $wcb_legal_link['link']['url'] ); ?>" class="wcb-font-lato wcb-font-normal wcb-text-[12px] sm:wcb-text-[14px] wcb-leading-[1.5em] wcb-text-text-logo wcb-underline hover:wcb-text-text-logo wcb-py-[4px] wcb-text-center wcb-no-underline" <?php echo ! empty( $wcb_legal_link['link']['target'] ) ? 'target="' . esc_attr( $wcb_legal_link['link']['target'] ) . '"' : ''; ?>>
                                    <?php echo esc_html( $wcb_legal_link['link']['title'] ); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>
            </div>
            <!-- End of Component: FooterBottom -->
        </div>
    </footer>
</section>