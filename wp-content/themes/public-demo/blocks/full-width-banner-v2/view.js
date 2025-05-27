import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom FullWidthBannerV2View Block - A full-width banner block with enhanced styling and layout options for creating impactful hero sections and promotional banners.
 */
class FullWidthBannerV2View {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // Initialize block elements and methods
        this.block = block;
        
        // Initialize the block
        this.init();
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return 'full-width-banner-v2';
    }

    /**
     * Initialize the block
     */
    init() {
        // Block is ready - no additional JavaScript functionality needed
        // This is a static banner block with no interactive elements
        console.log('Full Width Banner V2 block initialized');
    }
}

new ACFBlock( FullWidthBannerV2View );