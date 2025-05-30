<?php
/**
 * Block Template: Hero Stack
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

// Get ACF fields
$wcb_title             = get_field( 'title' );
$wcb_content_title     = get_field( 'content_title' );
$wcb_content_description = get_field( 'content_description' );
$wcb_button            = get_field( 'button' );
$wcb_image             = get_field( 'image' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
  <div class="wcb-bg-text-logo wcb-font-lato wcb-py-[20px] sm:wcb-py-[30px] md:wcb-py-[40px] wcb-rounded-[20px] sm:wcb-rounded-[30px] md:wcb-rounded-[40px]">
    <div class="wcb-max-w-[1400px] wcb-w-full wcb-mx-auto wcb-px-[16px] sm:wcb-px-[24px] wcb-flex wcb-flex-col wcb-items-center wcb-gap-[20px] sm:wcb-gap-[30px] md:wcb-gap-[40px]">

      <?php if ( $wcb_title ) : ?>
      <!-- Component: TitleSection -->
      <div class="wcb-max-w-[768px] wcb-w-full wcb-bg-tertiary wcb-rounded-[16px] sm:wcb-rounded-[20px] md:wcb-rounded-[24px] wcb-p-[16px] sm:wcb-p-[20px] md:wcb-p-[24px] wcb-flex wcb-flex-col wcb-items-center wcb-gap-[16px] sm:wcb-gap-[20px] md:wcb-gap-[24px]">
        <h1 class="wcb-text-[24px] sm:wcb-text-[32px] md:wcb-text-[40px] lg:wcb-text-[48px] wcb-font-semibold wcb-text-bg-main wcb-text-center wcb-leading-[1.2] wcb-w-full">
          <?php echo esc_html( $wcb_title ); ?>
        </h1>
      </div>
      <!-- End of Component: TitleSection -->
      <?php endif; ?>

      <?php if ( $wcb_image ) : ?>
      <!-- Component: ImageSection -->
      <div class="wcb-w-full wcb-flex wcb-flex-col">
        <img 
          src="<?php echo esc_url( $wcb_image['url'] ); ?>" 
          alt="<?php echo esc_attr( $wcb_image['alt'] ); ?>" 
          class="wcb-w-full wcb-h-auto wcb-object-cover wcb-rounded-[16px] sm:wcb-rounded-[20px] md:wcb-rounded-[24px]"
        >
      </div>
      <!-- End of Component: ImageSection -->
      <?php endif; ?>

      <?php if ( $wcb_content_title || $wcb_content_description || $wcb_button ) : ?>
      <!-- Component: ContentSection -->
      <div class="wcb-bg-bg-main wcb-text-tertiary wcb-rounded-[16px] sm:wcb-rounded-[18px] md:wcb-rounded-[20px] wcb-p-[20px] sm:wcb-p-[30px] md:wcb-p-[40px] wcb-w-full wcb-text-center">
        <?php if ( $wcb_content_title ) : ?>
        <div class="wcb-mb-[16px] sm:wcb-mb-[20px] md:wcb-mb-[24px]">
          <h2 class="wcb-text-[28px] sm:wcb-text-[36px] md:wcb-text-[48px] lg:wcb-text-[56px] xl:wcb-text-[65.7px] wcb-font-medium wcb-text-text-logo wcb-leading-[1.22] wcb-mb-[12px] sm:wcb-mb-[14px] md:wcb-mb-[16px]">
            <?php echo esc_html( $wcb_content_title ); ?>
          </h2>
        </div>
        <?php endif; ?>

        <?php if ( $wcb_content_description ) : ?>
        <div class="wcb-mb-[20px] sm:wcb-mb-[26px] md:wcb-mb-[32px]">
          <p class="wcb-text-figma-text-light wcb-text-[14px] sm:wcb-text-[15px] md:wcb-text-[16.5px] wcb-font-normal wcb-leading-[1.7] wcb-max-w-[600px] wcb-mx-auto">
            <?php echo esc_html( $wcb_content_description ); ?>
          </p>
        </div>
        <?php endif; ?>

        <?php if ( $wcb_button ) : ?>
        <div>
          <a 
            href="<?php echo esc_url( $wcb_button['url'] ); ?>" 
            class="wcb-inline-block wcb-bg-text-logo wcb-text-bg-main wcb-font-medium wcb-py-[10px] sm:wcb-py-[11px] md:wcb-py-[12px] wcb-px-[24px] sm:wcb-px-[28px] md:wcb-px-[32px] wcb-rounded-full hover:wcb-opacity-90 wcb-transition-opacity wcb-duration-150 wcb-text-[13px] sm:wcb-text-[14px] md:wcb-text-[14.9px] wcb-leading-[1.61] wcb-no-underline"
            aria-label="<?php echo esc_attr( $wcb_button['title'] ); ?>"
            <?php if ( ! empty( $wcb_button['target'] ) ) : ?>
              target="<?php echo esc_attr( $wcb_button['target'] ); ?>"
            <?php endif; ?>
          >
            <?php echo esc_html( $wcb_button['title'] ); ?>
          </a>
        </div>
        <?php endif; ?>
      </div>
      <!-- End of Component: ContentSection -->
      <?php endif; ?>

    </div>
  </div>
</section>