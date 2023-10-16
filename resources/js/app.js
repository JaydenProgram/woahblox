/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM content loaded');
    const filterLinks = document.querySelectorAll('.filter-link');

    filterLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('clicked')
            const types = this.dataset.type;

            fetch('/games/filter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ type: types })
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Assuming data.games is an array of games
                    const games = data.games;

                    // Updating a container with filtered games
                    const gameContainer = document.getElementById('game-container');
                    gameContainer.innerHTML = '';

                    games.forEach(game => {
                        const gameElement = document.createElement('div');
                        gameElement.textContent = game.name; // Adjust to display appropriate game info
                        gameContainer.appendChild(gameElement);
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
