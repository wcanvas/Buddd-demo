import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom QuoteView Block - A testimonial block featuring a quote with author name, 
 * optional CTA button, section label, and customizable background image or pattern.
 */
class QuoteView {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // Initialize block elements and methods
        this.block = block;
        this.init();
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return 'quote';
    }

    /**
     * Initialize the block
     */
    init() {
        // Block is ready - no additional JavaScript functionality needed
        // as the original HTML structure contains only static content
        console.log('Quote block initialized');
    }
}

new ACFBlock( QuoteView );