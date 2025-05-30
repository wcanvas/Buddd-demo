import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom NavbarV2Editor Block, describe your block here.
 */
class NavbarV2Editor {
    /**
     * Constructor method
     *
     * @param {HTMLElement} block
     */
    constructor( block ) {
        // This Js file only runs in the editor view.
    }

    /**
     * The name of your block, don't modify this static method!!
     *
     * @return {string} The name of your block
     */
    static getName() {
        return 'navbar-v2';
    }

    // Your methods
}

new ACFBlock( NavbarV2Editor );