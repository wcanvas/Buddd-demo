import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom NavbarV2View Block - A responsive navigation bar with mobile menu functionality
 */
class NavbarV2View {
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
        return 'navbar-v2';
    }

    /**
     * Initialize the navbar functionality
     */
    init() {
        this.setupMobileMenu();
    }

    /**
     * Setup mobile menu toggle functionality
     */
    setupMobileMenu() {
        const mobileMenuButton = this.block.querySelector('.js-mobile-menu-button');
        const mobileMenu = this.block.querySelector('.js-mobile-menu');
        const hamburgerIcon = this.block.querySelector('.js-hamburger-icon');
        const closeIcon = this.block.querySelector('.js-close-icon');

        if (mobileMenuButton && mobileMenu && hamburgerIcon && closeIcon) {
            mobileMenuButton.addEventListener('click', () => {
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', String(!isExpanded));
                mobileMenu.classList.toggle('wcb-hidden');
                hamburgerIcon.classList.toggle('wcb-hidden');
                closeIcon.classList.toggle('wcb-hidden');
            });
        }
    }
}

new ACFBlock( NavbarV2View );