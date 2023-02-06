// Load other instances
import { config } from './config.js';

// Setup global helpers
let body = null;

/**
 * Setup the modal and the listeners
 */
export function messageInit() {  

    // Add an event listener to the open buttons
    config.modal.buttons.open.forEach((item) => {
        item.addEventListener('click', () => {
            // Show the modal
            config.modal.component.showModal();
        })
    });

    // Add an event listener to the close buttons
    config.modal.buttons.close.forEach((item) => {
        item.addEventListener('click', () => {
            // Close the modal
            config.modal.component.close();

            // Reset the form
            config.modal.form.reset();

            // Reset the modals
            config.modal.screens.entry.style.display = 'block';
            config.modal.screens.complete.style.display = 'none';
        })
    });

    // Listen to the reset action
    config.modal.form.addEventListener('reset', (e) => {
        // Close the modal
        config.modal.component.close();

        // Reset the form
        config.modal.form.reset();

        // Reset the modals
        config.modal.screens.entry.style.display = 'block';
        config.modal.screens.complete.style.display = 'none';
    });

    // Listen to the submit of the form
    config.modal.form.addEventListener('submit', (e) => {
        // Prevent the page from reloading
        e.preventDefault();

        validateAndSubmit();
    });

}

/**
 * validateForm
 */
async function validateAndSubmit() {
    // Check the form
    if(!checkForm()) return showError(config.modal.error, 'Er is een verplicht veld niet (goed) ingevuld.');

    // Try to submit the info to the API
    await sendMessage(body)
        .then((data) => {
            if(!data.ok) { showError(); return; }
            return data.json();
        })
        .then((data) => {
            config.modal.screens.entry.style.display = 'none';
            config.modal.screens.complete.style.display = 'block';
        })
        .catch((error) => {
            console.log(error);
            return showError(config.modal.error, 'Er trad een onverwachte fout op. Probeer later opnieuw');
        });
}

/**
 * Listen to form actions
 */
function checkForm() {

    // Get all the values from the inputs and put them in a holder
    body = {
        fullName: config.modal.fields.name.value.trim(),
        mail: config.modal.fields.mail.value.trim(),
        phone: config.modal.fields.phone.value.trim(),
        message: config.modal.fields.message.value.trim(),
        platform: 'website'
    }

    // Check for empty fields
    if(!body.fullName || body.fullName.length === 0) return false;
    if(!body.message || body.message.length === 0) return false;

    // Check if the correct fields are filled in
    if(!checkTextNumbers(body.fullName)) return false;
    if(body.mail.length > 0 && !validateEmail(body.mail)) return false;

    // Set the default return for if everything is fine
    return true;
    
}

/**
 * Check if the given string has only letters and/or numbers
 * @param {string} str The string that needs to be testen
 * @returns {boolean} true/false depending on the tested string
 */
function checkTextNumbers(str) {
    return /^[A-Za-z0-9\s]*$/.test(str);
}

/**
 * Test is the given string is a valid email address
 * @param {String} email The email address
 * @returns {boolean} true/false depending on the tested string
 */
const validateEmail = (email) => {
    return email.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
  };

/**
 * Show a error message to a specific input field
 * @param {Element} input The input field that is impacted
 * @param {String} message The message that needs to be showned
 * @returns 
 */
function showError(input, message) {

    alert(message);

    // Set the message to the innerHTML of the given input
    input.innerHTML = message;
    input.display = 'block';

    // Set a timeout to hide the error after 7.5 seconds
    setTimeout(() => {
        input.display = 'none';
    }, 7500);

    // Return false to the script
    return false;
}

/**
 * Send the message information to the API
 * @returns {boolean} true/false
 */
async function sendMessage() {

    // Fetch the information
    const response = await fetch(config.api.pointers.addMessage, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Basic ' + config.api.tokens.main
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify(body)
    });
        
    // Return the response
    return response;
}