import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom StatsWithImageView Block - Handles accordion functionality for stats display with image
 */
class StatsWithImageView {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // Initialize block elements and methods
        this.block = block;
        this.accordionItems = this.block.querySelectorAll('.js-accordion-item');
        
        this.init();
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return 'stats-with-image';
    }

    /**
     * Initialize the accordion functionality
     */
    init() {
        if (this.accordionItems.length === 0) {
            return;
        }

        this.setupAccordion();
        this.bindEvents();
    }

    /**
     * Setup initial accordion state
     */
    setupAccordion() {
        this.accordionItems.forEach((item, index) => {
            const toggle = item.querySelector('.js-accordion-toggle');
            const content = item.querySelector('.js-accordion-content');
            const iconContainer = toggle.querySelector('.js-accordion-icon');

            if (index === 0) { 
                // First item is expanded by default
                toggle.setAttribute('aria-expanded', 'true');
                iconContainer.classList.add('wcb-rotate-180'); // Icon points UP
                iconContainer.classList.remove('wcb-opacity-70'); // Remove opacity for expanded item
                content.style.maxHeight = content.scrollHeight + 'px';
            } else { 
                // Other items are collapsed by default
                toggle.setAttribute('aria-expanded', 'false');
                content.style.maxHeight = '0px';
            }
        });
    }

    /**
     * Bind event listeners
     */
    bindEvents() {
        this.accordionItems.forEach((item) => {
            const toggle = item.querySelector('.js-accordion-toggle');
            const content = item.querySelector('.js-accordion-content');
            const iconContainer = toggle.querySelector('.js-accordion-icon');

            toggle.addEventListener('click', () => {
                const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                
                toggle.setAttribute('aria-expanded', !isExpanded);
                iconContainer.classList.toggle('wcb-rotate-180');
                iconContainer.classList.toggle('wcb-opacity-70');
                
                if (!isExpanded) {
                    content.style.maxHeight = content.scrollHeight + 'px';
                } else {
                    content.style.maxHeight = '0px';
                }
            });
        });

        // Handle window resize to recalculate heights
        window.addEventListener('resize', () => {
            this.handleResize();
        });
    }

    /**
     * Handle window resize events
     */
    handleResize() {
        this.accordionItems.forEach(item => {
            const toggle = item.querySelector('.js-accordion-toggle');
            const content = item.querySelector('.js-accordion-content');
            
            if (toggle.getAttribute('aria-expanded') === 'true') {
                content.style.maxHeight = content.scrollHeight + 'px';
            }
        });
    }
}

new ACFBlock( StatsWithImageView );