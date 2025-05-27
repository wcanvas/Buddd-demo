import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom CardsView Block - A two-column layout featuring a section with label, heading and call-to-action button alongside three feature cards with images, titles and descriptions on a light green background.
 */
class CardsView {
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
        return 'cards';
    }

    /**
     * Initialize the block
     */
    init() {
        // Block initialization - no additional JavaScript functionality needed
        // based on the provided HTML structure
        console.log('Cards block initialized');
    }
}

new ACFBlock( CardsView );