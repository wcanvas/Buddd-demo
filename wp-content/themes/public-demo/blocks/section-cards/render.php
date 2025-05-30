<?php
/**
 * Block Template: Section Cards
 *
 * @package WCB
 */

use WCB\Block\BlockWrapper;
use WCB\Functionalities\Component;

$wcb_block_data = BlockWrapper::get_global_block_wrapper_data( $block );

$wcb_section_title = get_field( 'section_title' );
$wcb_feature_cards = get_field( 'feature_cards' );

?>

<section <?php echo wp_kses_post( $wcb_block_data ); ?>>
  <div class="wcb-bg-text-logo wcb-font-lato wcb-py-[40px] sm:wcb-py-[60px] md:wcb-py-[100px]">
    <div class="wcb-max-w-[1200px] wcb-w-full wcb-mx-auto wcb-px-[16px] sm:wcb-px-[20px] lg:wcb-px-[40px]">
      <?php if ( $wcb_section_title ) : ?>
        <h2 class="wcb-text-center wcb-text-custom-text-dark wcb-text-[24px] sm:wcb-text-[28px] md:wcb-text-[36px] lg:wcb-text-[40px] wcb-font-bold wcb-mb-[32px] sm:wcb-mb-[40px] md:wcb-mb-[60px] wcb-leading-[1.185] wcb-px-[8px] sm:wcb-px-0">
          <?php echo esc_html( $wcb_section_title ); ?>
        </h2>
      <?php endif; ?>

      <?php if ( $wcb_feature_cards && is_array( $wcb_feature_cards ) ) : ?>
        <div class="wcb-grid wcb-grid-cols-1 md:wcb-grid-cols-2 wcb-gap-[16px] sm:wcb-gap-[20px] md:wcb-gap-[24px]">
          <?php foreach ( $wcb_feature_cards as $wcb_card ) : ?>
            <?php 
              $wcb_card_type = isset( $wcb_card['card_type'] ) ? $wcb_card['card_type'] : 'half_width';
              $wcb_title = isset( $wcb_card['title'] ) ? $wcb_card['title'] : '';
              $wcb_description = isset( $wcb_card['description'] ) ? $wcb_card['description'] : '';
              $wcb_icon_class = isset( $wcb_card['icon_class'] ) ? $wcb_card['icon_class'] : 'fas fa-bolt';
              $wcb_icon_color = isset( $wcb_card['icon_color'] ) ? $wcb_card['icon_color'] : 'yellow';
              $wcb_mockup_type = isset( $wcb_card['mockup_type'] ) ? $wcb_card['mockup_type'] : 'inventory_list';
              $wcb_content_position = isset( $wcb_card['content_position'] ) ? $wcb_card['content_position'] : 'left';
              
              // Determine icon color class
              switch ( $wcb_icon_color ) {
                case 'yellow':
                  $wcb_icon_color_class = 'wcb-text-yellow-500';
                  break;
                case 'green':
                  $wcb_icon_color_class = 'wcb-text-green-500';
                  break;
                case 'blue':
                  $wcb_icon_color_class = 'wcb-text-blue-500';
                  break;
                case 'red':
                  $wcb_icon_color_class = 'wcb-text-red-500';
                  break;
                default:
                  $wcb_icon_color_class = 'wcb-text-yellow-500';
              }
              
              // Determine column span class based on card type
              $wcb_column_span_class = ($wcb_card_type === 'full_width') ? 'md:wcb-col-span-2' : '';
            ?>
            
            <!-- Generate the card HTML based on card_type -->
            <?php if ( $wcb_card_type === 'full_width' ) : ?>
              <!-- Full Width Card -->
              <div class="<?php echo esc_attr( $wcb_column_span_class ); ?> wcb-bg-custom-card-bg wcb-border-[3px] sm:wcb-border-[5px] wcb-border-custom-card-bg wcb-rounded-[16px] sm:wcb-rounded-[20px] wcb-shadow-custom-card-shadow wcb-p-[20px] sm:wcb-p-[24px] md:wcb-p-[32px] wcb-flex wcb-flex-col <?php echo ($wcb_content_position === 'left') ? 'md:wcb-flex-row' : 'md:wcb-flex-row-reverse'; ?> wcb-items-center wcb-gap-[20px] sm:wcb-gap-[24px] md:wcb-gap-[32px]">
                <div class="md:wcb-w-[50%] wcb-text-center <?php echo ($wcb_content_position === 'left') ? 'md:wcb-text-left' : 'md:wcb-text-right'; ?>">
                  <?php if ( $wcb_title ) : ?>
                    <h3 class="wcb-text-custom-text-dark wcb-text-[20px] sm:wcb-text-[22px] md:wcb-text-[26px] lg:wcb-text-[32px] wcb-font-bold wcb-mb-[8px] sm:wcb-mb-[8px] md:wcb-mb-[17px] wcb-leading-[1.125]"><?php echo esc_html( $wcb_title ); ?></h3>
                  <?php endif; ?>
                  <?php if ( $wcb_description ) : ?>
                    <p class="wcb-text-custom-text-dark wcb-text-[14px] sm:wcb-text-[16px] md:wcb-text-[18px] lg:wcb-text-[20px] wcb-leading-[1.3]">
                      <?php echo esc_html( $wcb_description ); ?> <i class="<?php echo esc_attr( $wcb_icon_class . ' ' . $wcb_icon_color_class ); ?> wcb-ml-[4px]"></i>
                    </p>
                  <?php endif; ?>
                </div>
                <div class="md:wcb-w-[50%] wcb-w-full">
                  <?php if ( $wcb_mockup_type === 'inventory_list' ) : ?>
                    <!-- Inventory List Mockup -->
                    <div class="wcb-bg-tertiary wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow">
                        <div class="wcb-flex wcb-flex-wrap wcb-gap-[6px] sm:wcb-gap-[8px] wcb-mb-[12px] sm:wcb-mb-[16px]">
                            <span class="wcb-bg-custom-purple-pills-bg wcb-text-custom-purple-pills-text wcb-text-[10px] sm:wcb-text-[12px] wcb-px-[8px] sm:wcb-px-[10px] wcb-py-[3px] sm:wcb-py-[4px] wcb-rounded-full wcb-flex wcb-items-center">All <i class="fas fa-times wcb-text-[8px] sm:wcb-text-[10px] wcb-ml-[4px] sm:wcb-ml-[6px] wcb-cursor-pointer"></i></span>
                            <span class="wcb-bg-custom-purple-pills-bg wcb-text-custom-purple-pills-text wcb-text-[10px] sm:wcb-text-[12px] wcb-px-[8px] sm:wcb-px-[10px] wcb-py-[3px] sm:wcb-py-[4px] wcb-rounded-full wcb-flex wcb-items-center">Best Sellers <i class="fas fa-times wcb-text-[8px] sm:wcb-text-[10px] wcb-ml-[4px] sm:wcb-ml-[6px] wcb-cursor-pointer"></i></span>
                            <span class="wcb-bg-custom-purple-pills-bg wcb-text-custom-purple-pills-text wcb-text-[10px] sm:wcb-text-[12px] wcb-px-[8px] sm:wcb-px-[10px] wcb-py-[3px] sm:wcb-py-[4px] wcb-rounded-full wcb-flex wcb-items-center">Excess <i class="fas fa-times wcb-text-[8px] sm:wcb-text-[10px] wcb-ml-[4px] sm:wcb-ml-[6px] wcb-cursor-pointer"></i></span>
                        </div>
                        <div class="wcb-space-y-[8px] sm:wcb-space-y-[12px]">
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-orange-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/FFA500/FFFFFF?text=OWC" alt="Orange White Collar product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Orange White Collar</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PST456WW654</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-blue-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/60A5FA/FFFFFF?text=NT" alt="Navy T-Shirt product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Navy T-Shirt</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PST456WW654</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-gray-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/D1D5DB/FFFFFF?text=T" alt="Though product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Though</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PS123XYZ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-orange-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/FBBF24/FFFFFF?text=S" alt="Streetw product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Streetw</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PS456ABC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php elseif ( $wcb_mockup_type === 'product_alerts' ) : ?>
                    <!-- Product Alerts Mockup -->
                    <div class="wcb-bg-transparent wcb-p-[0px] wcb-rounded-[8px] wcb-space-y-[10px] sm:wcb-space-y-[12px]">
                        <div class="wcb-flex wcb-items-start wcb-p-[12px] sm:wcb-p-[16px] wcb-bg-tertiary wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow">
                            <img src="https://placehold.co/60x60/34D399/FFFFFF?text=PS" alt="Polo-Shirt Summer Tone product image" class="wcb-w-[44px] wcb-h-[44px] sm:wcb-w-[54px] sm:wcb-h-[54px] wcb-rounded-[6px] wcb-mr-[10px] sm:wcb-mr-[12px] wcb-object-cover">
                            <div>
                                <p class="wcb-text-custom-text-dark wcb-text-[13px] sm:wcb-text-[15px] wcb-font-bold wcb-text-left">Polo-Shirt Summer Tone</p>
                                <p class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[12px] wcb-text-left wcb-mb-[4px] sm:wcb-mb-[6px]">SKU - PST456WW654</p>
                                <a href="#" class="wcb-text-red-500 wcb-text-[11px] sm:wcb-text-[13px] wcb-font-semibold wcb-text-left wcb-block hover:wcb-text-red-600 wcb-no-underline"><i class="fas fa-shopping-cart wcb-mr-[4px]"></i> Order now</a>
                            </div>
                        </div>
                        <div class="wcb-flex wcb-items-center wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-gray-100 wcb-rounded-[8px] wcb-shadow-mockup-item-shadow">
                            <img src="https://placehold.co/40x40/A7F3D0/10B981?text=PV" alt="Positive Vibe Shirt product image" class="wcb-w-[32px] wcb-h-[32px] sm:wcb-w-[36px] sm:wcb-h-[36px] wcb-rounded-[4px] wcb-mr-[10px] sm:wcb-mr-[12px] wcb-object-cover">
                            <div class="wcb-text-left wcb-flex-1">
                                <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Positive Vibe Shirt</p>
                                <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[11px]">SKU - PST4543GW654</p>
                            </div>
                            <span class="wcb-ml-auto wcb-text-red-600 wcb-bg-red-100 wcb-text-[9px] sm:wcb-text-[10px] wcb-px-[6px] sm:wcb-px-[8px] wcb-py-[2px] sm:wcb-py-[3px] wcb-rounded-full wcb-font-semibold">At Risk</span>
                        </div>
                    </div>
                  <?php elseif ( $wcb_mockup_type === 'purchase_order' ) : ?>
                    <!-- Purchase Order Mockup -->
                    <div class="wcb-bg-tertiary wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow wcb-flex wcb-flex-col sm:wcb-flex-row">
                        <div class="wcb-w-full sm:wcb-w-[60%] wcb-bg-gradient-to-br wcb-from-mockup-po-bg-from wcb-to-mockup-po-bg-to wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[6px] sm:wcb-rounded-l-[6px] sm:wcb-rounded-r-[0px] wcb-mb-[12px] sm:wcb-mb-0">
                            <p class="wcb-text-mockup-po-text wcb-text-[14px] sm:wcb-text-[16px] wcb-font-bold">Purchase Order #7824</p>
                            <p class="wcb-text-mockup-po-text/80 wcb-text-[11px] sm:wcb-text-[12px] wcb-mb-[12px] sm:wcb-mb-[16px]">Supplier Cosforama</p>
                            <div class="wcb-space-y-[8px] sm:wcb-space-y-[10px] wcb-mb-[12px] sm:wcb-mb-[16px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/24x24/A7F3D0/22C55E?text=" alt="Item 1 thumbnail" class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[20px] sm:wcb-h-[20px] wcb-rounded-sm wcb-mr-[6px] sm:wcb-mr-[8px]">
                                    <div class="wcb-w-full wcb-h-[6px] sm:wcb-h-[8px] wcb-bg-gray-300 wcb-rounded-full"></div>
                                </div>
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/24x24/A7F3D0/22C55E?text=" alt="Item 2 thumbnail" class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[20px] sm:wcb-h-[20px] wcb-rounded-sm wcb-mr-[6px] sm:wcb-mr-[8px]">
                                    <div class="wcb-w-full wcb-h-[6px] sm:wcb-h-[8px] wcb-bg-gray-300 wcb-rounded-full"></div>
                                </div>
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/24x24/A7F3D0/22C55E?text=" alt="Item 3 thumbnail" class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[20px] sm:wcb-h-[20px] wcb-rounded-sm wcb-mr-[6px] sm:wcb-mr-[8px]">
                                    <div class="wcb-w-full wcb-h-[6px] sm:wcb-h-[8px] wcb-bg-gray-300 wcb-rounded-full"></div>
                                </div>
                            </div>
                            <a href="#" class="wcb-w-full wcb-block wcb-text-center wcb-bg-mockup-po-button-bg wcb-text-tertiary wcb-text-[11px] sm:wcb-text-[13px] wcb-font-semibold wcb-py-[6px] sm:wcb-py-[8px] wcb-rounded-[4px] hover:wcb-bg-mockup-po-button-hover-bg wcb-transition-colors wcb-no-underline">Order Now</a>
                        </div>
                        <div class="wcb-w-full sm:wcb-w-[40%] wcb-space-y-[8px] sm:wcb-space-y-[10px] sm:wcb-pl-[16px] wcb-py-[4px] sm:wcb-py-[8px]">
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-mockup-po-button-bg wcb-flex wcb-items-center wcb-justify-center wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0">
                                    <i class="fas fa-check wcb-text-mockup-po-button-bg wcb-text-[8px] sm:wcb-text-[9px]"></i>
                                </span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Draft</span>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer wcb-opacity-60 hover:wcb-opacity-100 wcb-transition-opacity">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-gray-400 wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0"></span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Ordered</span>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer wcb-opacity-60 hover:wcb-opacity-100 wcb-transition-opacity">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-gray-400 wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0"></span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Received</span>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer wcb-opacity-60 hover:wcb-opacity-100 wcb-transition-opacity">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-gray-400 wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0"></span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Closed</span>
                            </div>
                        </div>
                    </div>
                  <?php elseif ( $wcb_mockup_type === 'funding_flow' ) : ?>
                    <!-- Funding Flow Mockup -->
                    <div class="wcb-bg-gray-100/30 wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[8px] wcb-shadow-mockup-item-shadow wcb-relative wcb-min-h-[180px] sm:wcb-min-h-[220px] wcb-flex wcb-items-center wcb-justify-center">
                        <!-- Background faint items - simplified -->
                        <div class="wcb-absolute wcb-top-[15%] wcb-left-[10%] wcb-w-[140px] sm:wcb-w-[180px] wcb-h-[40px] sm:wcb-h-[50px] wcb-bg-tertiary/70 wcb-rounded-[8px] wcb-shadow-sm wcb-opacity-60 wcb-transform -wcb-rotate-[6deg]"></div>
                        <div class="wcb-absolute wcb-bottom-[15%] wcb-right-[10%] wcb-w-[160px] sm:wcb-w-[200px] wcb-h-[40px] sm:wcb-h-[50px] wcb-bg-tertiary/70 wcb-rounded-[8px] wcb-shadow-sm wcb-opacity-60 wcb-transform wcb-rotate-[4deg]"></div>

                        <div class="wcb-relative wcb-z-10 wcb-space-y-[10px] sm:wcb-space-y-[12px] wcb-flex wcb-flex-col wcb-items-center">
                            <div class="wcb-bg-tertiary wcb-p-[10px] sm:wcb-p-[12px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow wcb-w-full wcb-max-w-[240px] sm:wcb-max-w-[280px] wcb-flex wcb-items-center">
                                <div class="wcb-w-[32px] wcb-h-[32px] sm:wcb-w-[36px] sm:wcb-h-[36px] wcb-bg-mockup-funding-icon-bg wcb-rounded-full wcb-flex wcb-items-center wcb-justify-center wcb-mr-[10px] sm:wcb-mr-[12px] wcb-shrink-0">
                                    <i class="fas fa-dollar-sign wcb-text-mockup-icon-color wcb-text-[16px] sm:wcb-text-[18px]"></i>
                                </div>
                                <div>
                                    <p class="wcb-text-custom-text-dark wcb-text-[13px] sm:wcb-text-[15px] wcb-font-bold">Funding: $120K</p>
                                    <p class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[12px]">PO #534LGDF</p>
                                </div>
                            </div>

                            <div class="wcb-w-[2px] wcb-h-[20px] sm:wcb-h-[24px] wcb-bg-mockup-connecting-line"></div>

                            <div class="wcb-bg-tertiary wcb-p-[10px] sm:wcb-p-[12px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow wcb-w-full wcb-max-w-[240px] sm:wcb-max-w-[280px] wcb-flex wcb-items-center">
                                <div class="wcb-w-[32px] wcb-h-[32px] sm:wcb-w-[36px] sm:wcb-h-[36px] wcb-bg-mockup-repayment-icon-bg wcb-rounded-full wcb-flex wcb-items-center wcb-justify-center wcb-mr-[10px] sm:wcb-mr-[12px] wcb-shrink-0">
                                    <i class="fas fa-exchange-alt wcb-text-mockup-icon-color wcb-text-[14px] sm:wcb-text-[16px]"></i>
                                </div>
                                <div>
                                    <p class="wcb-text-custom-text-dark wcb-text-[13px] sm:wcb-text-[15px] wcb-font-bold">Repayment Fee: 3%</p>
                                    <p class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[12px]">PO #534LGDF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php else : ?>
              <!-- Half Width Card -->
              <div class="wcb-bg-custom-card-bg wcb-border-[3px] sm:wcb-border-[5px] wcb-border-custom-card-bg wcb-rounded-[16px] sm:wcb-rounded-[20px] wcb-shadow-custom-card-shadow wcb-p-[20px] sm:wcb-p-[24px] md:wcb-p-[32px] lg:wcb-p-[59px] wcb-flex wcb-flex-col wcb-items-center wcb-text-center">
                <div class="wcb-mb-[20px] sm:wcb-mb-[24px] lg:wcb-mb-[119px]">
                  <?php if ( $wcb_title ) : ?>
                    <h3 class="wcb-text-custom-text-dark wcb-text-[18px] sm:wcb-text-[20px] md:wcb-text-[22px] lg:wcb-text-[26px] xl:wcb-text-[32px] wcb-font-bold wcb-mb-[8px] sm:wcb-mb-[8px] md:wcb-mb-[17px] wcb-leading-[1.125]"><?php echo esc_html( $wcb_title ); ?></h3>
                  <?php endif; ?>
                  <?php if ( $wcb_description ) : ?>
                    <p class="wcb-text-custom-text-dark wcb-text-[14px] sm:wcb-text-[16px] md:wcb-text-[18px] lg:wcb-text-[20px] wcb-leading-[1.3]">
                      <?php echo esc_html( $wcb_description ); ?> <i class="<?php echo esc_attr( $wcb_icon_class . ' ' . $wcb_icon_color_class ); ?> wcb-ml-[4px]"></i>
                    </p>
                  <?php endif; ?>
                </div>
                <div class="wcb-w-full <?php echo ( $wcb_mockup_type === 'product_alerts' ) ? 'wcb-max-w-[320px] sm:wcb-max-w-[380px]' : 'wcb-max-w-[350px] sm:wcb-max-w-[420px]'; ?>">
                  <?php if ( $wcb_mockup_type === 'inventory_list' ) : ?>
                    <!-- Inventory List Mockup -->
                    <div class="wcb-bg-tertiary wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow">
                        <div class="wcb-flex wcb-flex-wrap wcb-gap-[6px] sm:wcb-gap-[8px] wcb-mb-[12px] sm:wcb-mb-[16px]">
                            <span class="wcb-bg-custom-purple-pills-bg wcb-text-custom-purple-pills-text wcb-text-[10px] sm:wcb-text-[12px] wcb-px-[8px] sm:wcb-px-[10px] wcb-py-[3px] sm:wcb-py-[4px] wcb-rounded-full wcb-flex wcb-items-center">All <i class="fas fa-times wcb-text-[8px] sm:wcb-text-[10px] wcb-ml-[4px] sm:wcb-ml-[6px] wcb-cursor-pointer"></i></span>
                            <span class="wcb-bg-custom-purple-pills-bg wcb-text-custom-purple-pills-text wcb-text-[10px] sm:wcb-text-[12px] wcb-px-[8px] sm:wcb-px-[10px] wcb-py-[3px] sm:wcb-py-[4px] wcb-rounded-full wcb-flex wcb-items-center">Best Sellers <i class="fas fa-times wcb-text-[8px] sm:wcb-text-[10px] wcb-ml-[4px] sm:wcb-ml-[6px] wcb-cursor-pointer"></i></span>
                            <span class="wcb-bg-custom-purple-pills-bg wcb-text-custom-purple-pills-text wcb-text-[10px] sm:wcb-text-[12px] wcb-px-[8px] sm:wcb-px-[10px] wcb-py-[3px] sm:wcb-py-[4px] wcb-rounded-full wcb-flex wcb-items-center">Excess <i class="fas fa-times wcb-text-[8px] sm:wcb-text-[10px] wcb-ml-[4px] sm:wcb-ml-[6px] wcb-cursor-pointer"></i></span>
                        </div>
                        <div class="wcb-space-y-[8px] sm:wcb-space-y-[12px]">
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-orange-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/FFA500/FFFFFF?text=OWC" alt="Orange White Collar product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Orange White Collar</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PST456WW654</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-blue-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/60A5FA/FFFFFF?text=NT" alt="Navy T-Shirt product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Navy T-Shirt</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PST456WW654</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-justify-between wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-mockup-item-gray-bg wcb-rounded-[6px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/40x40/D1D5DB/FFFFFF?text=T" alt="Though product image" class="wcb-w-[28px] wcb-h-[28px] sm:wcb-w-[32px] sm:wcb-h-[32px] wcb-rounded-[4px] wcb-mr-[8px] sm:wcb-mr-[12px]">
                                    <div>
                                        <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Though</p>
                                        <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[12px]">SKU - PS123XYZ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php elseif ( $wcb_mockup_type === 'product_alerts' ) : ?>
                    <!-- Product Alerts Mockup -->
                    <div class="wcb-bg-transparent wcb-p-[0px] wcb-rounded-[8px] wcb-space-y-[10px] sm:wcb-space-y-[12px]">
                        <div class="wcb-flex wcb-items-start wcb-p-[12px] sm:wcb-p-[16px] wcb-bg-tertiary wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow">
                            <img src="https://placehold.co/60x60/34D399/FFFFFF?text=PS" alt="Polo-Shirt Summer Tone product image" class="wcb-w-[44px] wcb-h-[44px] sm:wcb-w-[54px] sm:wcb-h-[54px] wcb-rounded-[6px] wcb-mr-[10px] sm:wcb-mr-[12px] wcb-object-cover">
                            <div>
                                <p class="wcb-text-custom-text-dark wcb-text-[13px] sm:wcb-text-[15px] wcb-font-bold wcb-text-left">Polo-Shirt Summer Tone</p>
                                <p class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[12px] wcb-text-left wcb-mb-[4px] sm:wcb-mb-[6px]">SKU - PST456WW654</p>
                                <a href="#" class="wcb-text-red-500 wcb-text-[11px] sm:wcb-text-[13px] wcb-font-semibold wcb-text-left wcb-block hover:wcb-text-red-600 wcb-no-underline"><i class="fas fa-shopping-cart wcb-mr-[4px]"></i> Order now</a>
                            </div>
                        </div>
                        <div class="wcb-flex wcb-items-center wcb-p-[10px] sm:wcb-p-[12px] wcb-bg-gray-100 wcb-rounded-[8px] wcb-shadow-mockup-item-shadow">
                            <img src="https://placehold.co/40x40/A7F3D0/10B981?text=PV" alt="Positive Vibe Shirt product image" class="wcb-w-[32px] wcb-h-[32px] sm:wcb-w-[36px] sm:wcb-h-[36px] wcb-rounded-[4px] wcb-mr-[10px] sm:wcb-mr-[12px] wcb-object-cover">
                            <div class="wcb-text-left wcb-flex-1">
                                <p class="wcb-text-custom-text-dark wcb-text-[12px] sm:wcb-text-[14px] wcb-font-semibold">Positive Vibe Shirt</p>
                                <p class="wcb-text-custom-text-dark wcb-text-[10px] sm:wcb-text-[11px]">SKU - PST4543GW654</p>
                            </div>
                            <span class="wcb-ml-auto wcb-text-red-600 wcb-bg-red-100 wcb-text-[9px] sm:wcb-text-[10px] wcb-px-[6px] sm:wcb-px-[8px] wcb-py-[2px] sm:wcb-py-[3px] wcb-rounded-full wcb-font-semibold">At Risk</span>
                        </div>
                    </div>
                  <?php elseif ( $wcb_mockup_type === 'purchase_order' ) : ?>
                    <!-- Purchase Order Mockup -->
                    <div class="wcb-bg-tertiary wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow wcb-flex wcb-flex-col sm:wcb-flex-row">
                        <div class="wcb-w-full sm:wcb-w-[60%] wcb-bg-gradient-to-br wcb-from-mockup-po-bg-from wcb-to-mockup-po-bg-to wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[6px] sm:wcb-rounded-l-[6px] sm:wcb-rounded-r-[0px] wcb-mb-[12px] sm:wcb-mb-0">
                            <p class="wcb-text-mockup-po-text wcb-text-[14px] sm:wcb-text-[16px] wcb-font-bold">Purchase Order #7824</p>
                            <p class="wcb-text-mockup-po-text/80 wcb-text-[11px] sm:wcb-text-[12px] wcb-mb-[12px] sm:wcb-mb-[16px]">Supplier Cosforama</p>
                            <div class="wcb-space-y-[8px] sm:wcb-space-y-[10px] wcb-mb-[12px] sm:wcb-mb-[16px]">
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/24x24/A7F3D0/22C55E?text=" alt="Item 1 thumbnail" class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[20px] sm:wcb-h-[20px] wcb-rounded-sm wcb-mr-[6px] sm:wcb-mr-[8px]">
                                    <div class="wcb-w-full wcb-h-[6px] sm:wcb-h-[8px] wcb-bg-gray-300 wcb-rounded-full"></div>
                                </div>
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/24x24/A7F3D0/22C55E?text=" alt="Item 2 thumbnail" class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[20px] sm:wcb-h-[20px] wcb-rounded-sm wcb-mr-[6px] sm:wcb-mr-[8px]">
                                    <div class="wcb-w-full wcb-h-[6px] sm:wcb-h-[8px] wcb-bg-gray-300 wcb-rounded-full"></div>
                                </div>
                                <div class="wcb-flex wcb-items-center">
                                    <img src="https://placehold.co/24x24/A7F3D0/22C55E?text=" alt="Item 3 thumbnail" class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[20px] sm:wcb-h-[20px] wcb-rounded-sm wcb-mr-[6px] sm:wcb-mr-[8px]">
                                    <div class="wcb-w-full wcb-h-[6px] sm:wcb-h-[8px] wcb-bg-gray-300 wcb-rounded-full"></div>
                                </div>
                            </div>
                            <a href="#" class="wcb-w-full wcb-block wcb-text-center wcb-bg-mockup-po-button-bg wcb-text-tertiary wcb-text-[11px] sm:wcb-text-[13px] wcb-font-semibold wcb-py-[6px] sm:wcb-py-[8px] wcb-rounded-[4px] hover:wcb-bg-mockup-po-button-hover-bg wcb-transition-colors wcb-no-underline">Order Now</a>
                        </div>
                        <div class="wcb-w-full sm:wcb-w-[40%] wcb-space-y-[8px] sm:wcb-space-y-[10px] sm:wcb-pl-[16px] wcb-py-[4px] sm:wcb-py-[8px]">
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-mockup-po-button-bg wcb-flex wcb-items-center wcb-justify-center wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0">
                                    <i class="fas fa-check wcb-text-mockup-po-button-bg wcb-text-[8px] sm:wcb-text-[9px]"></i>
                                </span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Draft</span>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer wcb-opacity-60 hover:wcb-opacity-100 wcb-transition-opacity">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-gray-400 wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0"></span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Ordered</span>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer wcb-opacity-60 hover:wcb-opacity-100 wcb-transition-opacity">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-gray-400 wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0"></span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Received</span>
                            </div>
                            <div class="wcb-flex wcb-items-center wcb-cursor-pointer wcb-opacity-60 hover:wcb-opacity-100 wcb-transition-opacity">
                                <span class="wcb-w-[16px] wcb-h-[16px] sm:wcb-w-[18px] sm:wcb-h-[18px] wcb-rounded-full wcb-border-2 wcb-border-gray-400 wcb-mr-[6px] sm:wcb-mr-[8px] wcb-shrink-0"></span>
                                <span class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[13px]">Closed</span>
                            </div>
                        </div>
                    </div>
                  <?php elseif ( $wcb_mockup_type === 'funding_flow' ) : ?>
                    <!-- Funding Flow Mockup -->
                    <div class="wcb-bg-gray-100/30 wcb-p-[12px] sm:wcb-p-[16px] wcb-rounded-[8px] wcb-shadow-mockup-item-shadow wcb-relative wcb-min-h-[180px] sm:wcb-min-h-[220px] wcb-flex wcb-items-center wcb-justify-center">
                        <!-- Background faint items - simplified -->
                        <div class="wcb-absolute wcb-top-[15%] wcb-left-[10%] wcb-w-[140px] sm:wcb-w-[180px] wcb-h-[40px] sm:wcb-h-[50px] wcb-bg-tertiary/70 wcb-rounded-[8px] wcb-shadow-sm wcb-opacity-60 wcb-transform -wcb-rotate-[6deg]"></div>
                        <div class="wcb-absolute wcb-bottom-[15%] wcb-right-[10%] wcb-w-[160px] sm:wcb-w-[200px] wcb-h-[40px] sm:wcb-h-[50px] wcb-bg-tertiary/70 wcb-rounded-[8px] wcb-shadow-sm wcb-opacity-60 wcb-transform wcb-rotate-[4deg]"></div>

                        <div class="wcb-relative wcb-z-10 wcb-space-y-[10px] sm:wcb-space-y-[12px] wcb-flex wcb-flex-col wcb-items-center">
                            <div class="wcb-bg-tertiary wcb-p-[10px] sm:wcb-p-[12px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow wcb-w-full wcb-max-w-[240px] sm:wcb-max-w-[280px] wcb-flex wcb-items-center">
                                <div class="wcb-w-[32px] wcb-h-[32px] sm:wcb-w-[36px] sm:wcb-h-[36px] wcb-bg-mockup-funding-icon-bg wcb-rounded-full wcb-flex wcb-items-center wcb-justify-center wcb-mr-[10px] sm:wcb-mr-[12px] wcb-shrink-0">
                                    <i class="fas fa-dollar-sign wcb-text-mockup-icon-color wcb-text-[16px] sm:wcb-text-[18px]"></i>
                                </div>
                                <div>
                                    <p class="wcb-text-custom-text-dark wcb-text-[13px] sm:wcb-text-[15px] wcb-font-bold">Funding: $120K</p>
                                    <p class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[12px]">PO #534LGDF</p>
                                </div>
                            </div>

                            <div class="wcb-w-[2px] wcb-h-[20px] sm:wcb-h-[24px] wcb-bg-mockup-connecting-line"></div>

                            <div class="wcb-bg-tertiary wcb-p-[10px] sm:wcb-p-[12px] wcb-rounded-[8px] wcb-shadow-mockup-strong-shadow wcb-w-full wcb-max-w-[240px] sm:wcb-max-w-[280px] wcb-flex wcb-items-center">
                                <div class="wcb-w-[32px] wcb-h-[32px] sm:wcb-w-[36px] sm:wcb-h-[36px] wcb-bg-mockup-repayment-icon-bg wcb-rounded-full wcb-flex wcb-items-center wcb-justify-center wcb-mr-[10px] sm:wcb-mr-[12px] wcb-shrink-0">
                                    <i class="fas fa-exchange-alt wcb-text-mockup-icon-color wcb-text-[14px] sm:wcb-text-[16px]"></i>
                                </div>
                                <div>
                                    <p class="wcb-text-custom-text-dark wcb-text-[13px] sm:wcb-text-[15px] wcb-font-bold">Repayment Fee: 3%</p>
                                    <p class="wcb-text-custom-text-dark wcb-text-[11px] sm:wcb-text-[12px]">PO #534LGDF</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>