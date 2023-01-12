// Load other instances
import { config } from './config.js';

/**
 * This will initialize the player + several listeners
 */
export function playerInit() {

    // Listen for play button clicks
    config.player.buttons.play.forEach((item) => {
        item.addEventListener('click', () => {
            window.open(config.player.settings.site, 'radioAccentPlayer');
        });
    });

    // Load the current Song Info from the API
    loadCurrentSong();

    // Add an interval timer to launch every set amount of ms the loadCurrentSong function
    const timer = setInterval(() => {
        loadCurrentSong();
    }, config.player.settings.pollTimeOut);

}

// Get the song info from the API
function loadCurrentSong() {

    // Setup the XMLHttpRequest
    const xhttp = new XMLHttpRequest();

    // Listen for state changes
    xhttp.onreadystatechange = function() {
        // Check if the state is 4 and request status is OK
        if(this.readyState === 4 && this.status === 200) {

            // Parse the song info
            const songApi = JSON.parse(xhttp.responseText);

            // Check if newer song is loaded
            if(config.player.data.startTime !== songApi.startTime) {

                // Set the information to the holders
                config.player.data.artist = songApi[0].artist;
                config.player.data.title = songApi[0].title;
                config.player.data.cover = songApi[0].cover;
                config.player.data.startTime = songApi[0].startTime;

                // Insert the artist information in the elements
                config.player.elements.artist.forEach((item) => {
                    item.innerHTML = config.player.data.artist;
                });

                // Insert the artist information in the elements
                config.player.elements.title.forEach((item) => {
                    item.innerHTML = config.player.data.title;
                });

                // Set the cover to the correct information
                config.player.elements.cover.forEach((item) => {
                    item.setAttribute('src', 'data:image/png;charset=utf-8;base64,' + config.player.data.cover);
                    item.setAttribute('alt', config.player.data.artist + ' - ' + config.player.data.title);
                    item.setAttribute('title', config.player.data.artist + ' - ' + config.player.data.title);
                });
            }

        }
    }

    // Load from the API
    xhttp.open("GET", config.api.pointers.currentSong, true);

    // Send the request
    xhttp.send();

}