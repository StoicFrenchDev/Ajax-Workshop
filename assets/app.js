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
    var flashMessage = document.querySelector('div.alert');
    if (flashMessage) {
        flashMessage.remove();
    }
}, 5000);

// Ajax requets

// We wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('a[ajax-link]');                // We, then select all links with the 'ajax-link' attribute

    links.forEach(link => {
        link.addEventListener('click', (event) => {                         // We attach a click event listener to each link
            event.preventDefault();                                         // We prevent the default action of the link (which is to navigate to the URL)
            const url = link.getAttribute('href');                          // We get the URL from the 'href' attribute of the clicked link

            fetch(url)
                .then(response => response.json())
                .then(data => {
                                                                            // Check if the response message indicates a successful kill confirmation
                    if (data.message === 'Kill confirmed') {
                        // We update the DOM
                        const enemyDiv = link.closest('.details');          // Find the closest ancestor element with the class '.details'
                        enemyDiv.querySelector('h4').textContent = 'Dead';  // Update status
                        link.remove();                                      // Remove the confirm kill link

                    } else {
                        alert(data.message);
                    }
                })
                // Log any errors to the console and show an error message
                .catch(error => console.error('Error:', error));
        });
    });
});

// We could also use this to simply remove the whole item from our list of targets
// const detailsDiv = link.closest('.details');
// detailsDiv.remove();