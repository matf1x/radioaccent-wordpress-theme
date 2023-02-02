// Load other instances
import { config } from './config.js';

/**
 * Setup the layout handlers
 */
export function layoutInit() {
    listenForMenuButton();
    listenForScrolling();
    listenForSearch();
    listenForShare();
}

/**
 * Listen for a menu action
 */
function listenForMenuButton() {
    config.layout.buttons.menu.addEventListener('click', function() {
        config.site.menuOpen = (!config.site.menuOpen) ? true : false;
        config.layout.navigation.container.classList.toggle('navigation--open');
    });
}

/**
 * Listen for a scroll event and check if the minimun scroll amount is reached to alter the layout
 */
function listenForScrolling() {
    // Listen for the scroll event
    window.addEventListener('scroll', function() {
        // Toggle the correct classes based on the scrollPosition
        config.layout.navigation.main.classList.toggle('navContainer--open', this.scrollY >= config.site.scrollPosition);
        config.player.bar.main.classList.toggle('playingBar--open', this.scrollY >= config.site.scrollPosition);
    });
}

/**
 * Listen for the search button click and alter the layout when so
 */
function listenForSearch() {

    // Add an event listener to the search button
    config.search.buttons.search.addEventListener('click', function() {
        // Toggle the search bar classlist
        config.search.elements.main.classList.toggle('searchBar--open');
    });

}

/**
 * Listen for the share copy URL button
 */
function listenForShare() {
    // Add an event listener to the open buttons
    config.site.share.forEach((item) => {
        
        // Get info from the item
        const url = document.querySelector('[data-clipboard-url]');
        const success = document.querySelector('[data-clipboard-success]');
        const error = document.querySelector('[data-clipboard-error]');

        item.addEventListener('click', () => {
            // Show the modal
            navigator.clipboard.writeText(url);
        })
    });
}