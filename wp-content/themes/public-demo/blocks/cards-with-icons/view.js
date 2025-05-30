import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Cards With Icons Block - Display a collection of cards featuring custom uploaded icons and content,
 * perfect for showcasing services, features, or key information in an organized grid layout.
 */
class CardsWithIconsView {
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
        return 'cards-with-icons';
    }

    /**
     * Initialize the block
     */
    init() {
        // This block is purely presentational with no interactive functionality
        // The grid layout and responsive behavior are handled by CSS classes
        console.log('Cards With Icons block initialized');
    }
}

new ACFBlock( CardsWithIconsView );