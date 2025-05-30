import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom LeftRightView Block - A flexible left-right layout block with accordion functionality
 */
class LeftRightView {
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
        return 'left-right';
    }

    /**
     * Initialize the block functionality
     */
    init() {
        this.initAccordion();
    }

    /**
     * Initialize accordion functionality
     */
    initAccordion() {
        const accordionToggles = this.block.querySelectorAll('.js-accordion-toggle');

        accordionToggles.forEach(toggle => {
            const contentId = toggle.getAttribute('aria-controls');
            const content = this.block.querySelector(`#${contentId}`);
            const icon = toggle.querySelector('i');

            if (!content) return;

            // Set initial state based on aria-expanded attribute
            // All accordions are initially closed as per design
            if (toggle.getAttribute('aria-expanded') === 'true') {
                content.style.maxHeight = content.scrollHeight + 'px';
                if (icon) icon.classList.add('wcb-rotate-180');
            } else {
                content.style.maxHeight = '0px';
                if (icon) icon.classList.remove('wcb-rotate-180');
            }

            toggle.addEventListener('click', () => {
                const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

                if (isExpanded) {
                    toggle.setAttribute('aria-expanded', 'false');
                    content.style.maxHeight = '0px';
                    if (icon) icon.classList.remove('wcb-rotate-180');
                } else {
                    toggle.setAttribute('aria-expanded', 'true');
                    content.style.maxHeight = content.scrollHeight + 'px';
                    if (icon) icon.classList.add('wcb-rotate-180');
                }
            });
        });
    }
}

new ACFBlock( LeftRightView );