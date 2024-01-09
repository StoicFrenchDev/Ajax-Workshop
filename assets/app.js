import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css'

// flash message
setTimeout(function() {
    const flashMessage = document.querySelector('div.alert');
    if (flashMessage) {
        flashMessage.remove();
    }
}, 5000);

// Ajax requets

document.addEventListener('DOMContentLoaded', () => {
    const confirmKillLinks = document.querySelectorAll('a[data-ajax]');

    confirmKillLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const url = link.getAttribute('href');

            fetch(url)
                .then(response => {
                    if (response.status === 200) {
                        // Kill confirmed, update the DOM
                        const enemyDiv = link.closest('.details');
                        enemyDiv.querySelector('h4').textContent = 'Dead';
                        link.remove();

                        alert('Kill confirmed successfully.');

                    } else if (response.status === 404) {
                        // Enemy not found, show an error message
                        alert('Enemy not found.');
                    } else if (response.status === 500) {
                        // Internal Server Error, show an error message
                        alert('A server error occurred.');
                    } else {
                        // Other HTTP status codes, show a generic error message
                        alert('An error occurred.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('A network error occurred.');
                });
        });
    });
});