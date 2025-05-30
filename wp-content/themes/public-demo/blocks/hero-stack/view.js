import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Hero Stack Block - A versatile hero section block that allows stacking of multiple content elements
 * like headings, text, buttons, and media to create compelling page headers and featured content areas.
 */
class HeroStackView {
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
        return 'hero-stack';
    }

    /**
     * Initialize the block
     */
    init() {
        // Since the original HTML structure doesn't contain any JavaScript functionality,
        // this block is primarily static. Any future interactive features can be added here.
        
        // Block is ready
        this.block.classList.add('hero-stack-initialized');
    }
}

new ACFBlock( HeroStackView );