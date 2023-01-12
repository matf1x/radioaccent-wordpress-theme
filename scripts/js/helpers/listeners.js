// Load other instances
import { layoutInit } from './layout.js';
import { playerInit } from './player.js';
import { messageInit } from './message.js';

/**
 * Start listening to button clicks & other events
 */
export function startListeningToEvents() {

    // Add a scroll listener
    layoutInit();

    // Initialize the player and it's listeners
    playerInit();

    // Listen for Modal actions
    messageInit();
    
}