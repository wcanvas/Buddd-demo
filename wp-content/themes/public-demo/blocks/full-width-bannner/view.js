import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom FullWidthBannnerView Block - A static full-width banner with heading and image
 */
class FullWidthBannnerView {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // Initialize block elements and methods
        this.block = block;
        
        // Since this is a static banner block with no interactive elements,
        // no additional initialization is required
        this.init();
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return 'full-width-bannner';
    }

    /**
     * Initialize the block
     */
    init() {
        // This block is purely presentational with no JavaScript functionality
        // The original HTML structure contains no interactive elements or scripts
        // All styling and layout is handled by CSS classes
    }
}

new ACFBlock( FullWidthBannnerView );