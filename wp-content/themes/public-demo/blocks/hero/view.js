import ACFBlock from '../../assets/js/utils/blocks';
import Swiper from 'swiper'; // Import swiper if you need it, no need to add extra modules, this is the bundle version
import gsap from 'gsap'; // Import gsap if you need it
import ScrollTrigger from 'gsap/ScrollTrigger'; // Import ScrollTrigger if you need it

// Adapt the code from the inline <script> tag in the original HTML.
// This configures Tailwind CSS if the Tailwind CDN is being used on the frontend.
// It's placed here to run when this view.js script is loaded.
// We check if the global 'tailwind' object exists (from the CDN) before trying to configure it.
if (typeof tailwind !== 'undefined' && tailwind.config) {
    tailwind.config.theme = tailwind.config.theme || {}; // Ensure theme object exists
    tailwind.config.theme.extend = tailwind.config.theme.extend || {}; // Ensure extend object exists

    // Extend colors
    tailwind.config.theme.extend.colors = {
        ...(tailwind.config.theme.extend.colors || {}), // Preserve existing extended colors
        'bg-main': '#232E26', // Background Main
        'text-logo': '#D9EFDE', // Text Logo
        'text-placeholder': '#d9efdee6', // Text Placeholder
        'button-bg': '#242F27', // Button Background
        'button-border': '#F2F4F8', // Button Border
        'custom-white': '#FFFFFF', // Custom White
        'bg-pattern': '#2A3C3A', // Background Pattern
        'bg-pattern-secondary': '#3B5249', // Background Pattern Secondary
    };

    // Extend font families
    tailwind.config.theme.extend.fontFamily = {
        ...(tailwind.config.theme.extend.fontFamily || {}), // Preserve existing extended font families
        lato: ['Lato', 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
        graphik: ['Graphik', 'sans-serif'],
    };
} else if (typeof tailwind === 'undefined') {
    // This case is if the tailwind object itself is not defined.
    // console.warn('Hero block view.js: Tailwind object not found. Tailwind CDN might not be loaded or initialized before this script.');
} else if (!tailwind.config) {
    // This case is if tailwind object exists but tailwind.config is not (which is unusual for the CDN).
    // console.warn('Hero block view.js: tailwind.config is not defined. Tailwind might not be initialized correctly.');
}


/**
 * Custom HeroView Block.
 * Handles the frontend view for the Hero block.
 * This block primarily relies on HTML structure and CSS (Tailwind) for its presentation.
 * Based on the original HTML, no specific JavaScript-driven interactive functionalities
 * (like sliders or complex animations) are required for this block instance.
 * The Tailwind CSS configuration from the original HTML's script tag is included above
 * to ensure theme consistency if the Tailwind CDN is in use.
 */
class HeroView {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block The HTML element for the block.
     */
    constructor( block ) {
        this.block = block;

        // Initialize block elements and methods if any were needed.
        // According to the provided HTML and comments ("No JavaScript needed for this block's functionality"),
        // this block does not require specific JavaScript for its core features.
        // If, for example, there were interactive elements like a carousel or custom animations
        // triggered by JS, their initialization would go here.
        // e.g., this.initSlider(); or this.initAnimations();

        // console.log('HeroView initialized for block:', this.block);
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        // This should match the block name used in ACFBlock registration,
        // typically derived from the ACF block name (e.g., 'acf/hero' -> 'hero').
        return 'hero';
    }

    // No custom methods are defined here as the block's functionality,
    // as per the original HTML, is purely structural and stylistic.
    // If methods were needed, they would be defined here. For example:
    //
    // initSlider() {
    //   const sliderElement = this.block.querySelector('.swiper-container');
    //   if (sliderElement) {
    //     new Swiper(sliderElement, { /* ...options... */ });
    //   }
    // }
    //
    // setupEventListeners() {
    //   const button = this.block.querySelector('.my-button');
    //   if (button) {
    //     button.addEventListener('click', () => this.handleButtonClick());
    //   }
    // }
    //
    // handleButtonClick() {
    //   console.log('Button clicked in block:', this.block);
    // }
}

new ACFBlock( HeroView );