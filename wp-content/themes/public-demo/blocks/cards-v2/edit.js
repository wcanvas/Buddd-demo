import ACFBlock from '../../assets/js/utils/blocks';

/**
 * Custom CardsV2Editor Block, describe your block here.
 */
class CardsV2Editor {
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
        return 'cards-v2';
    }

    // Your methods
}

new ACFBlock( CardsV2Editor );