import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css'

setTimeout(function() {
    var flashMessage = document.querySelector('div.alert');
    if (flashMessage) {
        flashMessage.remove();
    }
}, 5000);