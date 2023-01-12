// Load other instances
import { config } from './config.js';

/**
 * Setup the layout handlers
 */
export function layoutInit() {
    listenForScrolling();
    listenForSearch();
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
    })

}