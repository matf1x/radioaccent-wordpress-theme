/**
 * The elements we selected from the document
 */
export const config = {
    api: {
        pointers: {
            currentSong: '<API-ROUTE>',
            addMessage: '<API-ROUTE>'
        },
        tokens: {
            main: '<YOUR-TOKEN>'
        }
    },
    site:{
        scrollPosition: 175,
        menuOpen: false,
    },
    player: {
        settings: {
            site: '<PLAYER-URL>',
            pollTimeOut: 15000
        },
        bar: {
            main: document.querySelector('#playingBar'),
        },
        buttons: {
            play: document.querySelectorAll('[data-action="open-player"]')
        },
        elements: {
            artist: document.querySelectorAll('[data-player-elements="artist"]'),
            title: document.querySelectorAll('[data-player-elements="title"]'),
            cover: document.querySelectorAll('[data-player-elements="cover"]')
        },
        data: {
            artist: '',
            title: '',
            cover: '',
            startTime: ''
        }
    },
    layout: {
        navigation: {
            main: document.querySelector('#navigation'),
            container: document.querySelector('#navigationContainer')
        },
        buttons: {
            menu: document.querySelector('[data-action="open-menu"]')
        }
    },
    search: {
        elements: {
            main: document.querySelector('#searchBar')
        },
        buttons: {
            search: document.querySelector('[data-action="open-search"]')
        },
        inputs: {
            textInput: document.querySelector('#searchInput')
        }
    },
    modal: {
        component: document.querySelector('#sendMessageModal'),
        form: document.querySelector('#messageForm'),
        error: document.querySelector('#errorMessage'),
        buttons: {
            open: document.querySelectorAll('[data-action="send-message"]'),
            close: document.querySelectorAll('[data-action="close-modal"]'),
        },
        screens: {
            entry: document.querySelector('#entry'),
            complete: document.querySelector('#complete'),
        },
        fields: {
            name: document.querySelector('#inputFullName'),
            mail: document.querySelector('#inputMail'),
            phone: document.querySelector('#inputPhone'),
            message: document.querySelector('#inputMessage'),
        }
    }
}