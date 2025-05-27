import ACFBlock from '../../assets/js/utils/blocks';
import Swiper from 'swiper';
import gsap from 'gsap';

/**
 * Cards v2 Block with Swiper slider and GSAP animations
 */
class CardsV2View {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // Initialize block elements and methods
        this.block = block;
        this.swiper = null;
        
        this.init();
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return 'cards-v2';
    }

    /**
     * Initialize the block
     */
    init() {
        this.initSwiper();
        this.initAnimations();
    }

    /**
     * Initialize Swiper slider
     */
    initSwiper() {
        const swiperContainer = this.block.querySelector('.js-cards-slider');
        
        if (!swiperContainer) {
            return;
        }

        this.swiper = new Swiper(swiperContainer, {
            loop: false,
            slidesPerView: 1.15, 
            spaceBetween: 16, 
            pagination: {
                el: this.block.querySelector('.js-swiper-pagination'),
                clickable: true,
            },
            breakpoints: {
                // Tailwind sm: 640px
                640: {
                    slidesPerView: 1.5,
                    spaceBetween: 20
                },
                // Tailwind md: 768px
                768: {
                    slidesPerView: 2.2, // shows 2 full and a bit of third
                    spaceBetween: 24
                },
                // Tailwind lg: 1024px
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 24
                }
            },
            a11y: {
                enabled: true,
                prevSlideMessage: 'Previous slide',
                nextSlideMessage: 'Next slide',
                paginationBulletMessage: 'Go to slide {{index}}',
            },
        });
    }

    /**
     * Initialize GSAP animations
     */
    initAnimations() {
        if (typeof gsap === 'undefined') {
            console.warn("GSAP library not found. Animations will not run.");
            return;
        }

        const textContent = this.block.querySelector('.js-gsap-text-content');
        const cardItems = this.block.querySelectorAll('.js-gsap-card-item');

        if (textContent) {
            gsap.from(textContent, { 
                opacity: 0, 
                y: 20, 
                duration: 0.6, 
                ease: "power2.out",
                delay: 0.15
            });
        }
        
        if (cardItems.length > 0) {
            gsap.from(cardItems, {
                opacity: 0,
                y: 20,
                duration: 0.6,
                stagger: 0.15,
                ease: "power2.out",
                delay: 0.3, 
            });
        }
    }

    /**
     * Destroy method for cleanup
     */
    destroy() {
        if (this.swiper) {
            this.swiper.destroy(true, true);
            this.swiper = null;
        }
    }
}

new ACFBlock( CardsV2View );