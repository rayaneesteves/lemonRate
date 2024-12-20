document.addEventListener('DOMContentLoaded', async function () {
    const API_KEY = 'ef0bda0322a73c50aaa0ed16de544460';
    const BASE_URL = 'https://api.themoviedb.org/3';

    function getMovieIdFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('id');
    }

    async function getMovieDetails(movieId) {
        const url = `${BASE_URL}/movie/${movieId}?language=pt-BR&api_key=${API_KEY}`;
        const response = await fetch(url);
        return response.json();
    }

    function displayMovieDetails(movie) {
        const movieDetailsDiv = document.getElementById('movieDetails');
        if (!movie) {
            movieDetailsDiv.innerHTML = '<p>Detalhes do filme não encontrados.</p>';
            return;
        }

        movieDetailsDiv.innerHTML = `
            <div style="display: flex; gap: 20px; align-items: center;">
                <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" alt="${movie.title}" 
                     style="width: 220px; height: auto; border-radius: 10px;">
                <div>
                    <h2>${movie.title}</h2>
                    <p><strong>Descrição:</strong> ${movie.overview}</p>
                    <p><strong>Data de lançamento:</strong> ${movie.release_date}</p>
                    <p><strong>Nota:</strong> ${movie.vote_average}</p>
                </div>
            </div>
        `;

        document.getElementById('movieIdInput').value = movie.id;
        document.getElementById('movieTitle').innerText = movie.title;
    }

    const movieId = getMovieIdFromUrl();
    if (movieId) {
        const movie = await getMovieDetails(movieId);
        displayMovieDetails(movie);
    } else {
        document.getElementById('movieDetails').innerHTML = '<p>Filme não encontrado.</p>';
    }
});

function openSidebar() {
    document.getElementById('sidebar').style.width = '250px';
}

function closeSidebar() {
    document.getElementById('sidebar').style.width = '0';
}

function openReviewSection() {
    document.getElementById('modalBackground').style.display = 'block';
    document.getElementById('reviewSection').style.display = 'block';
}

function closeReviewSection() {
    document.getElementById('modalBackground').style.display = 'none';
    document.getElementById('reviewSection').style.display = 'none';
}

const stars = document.querySelectorAll('.star');
stars.forEach(star => {
    star.addEventListener('click', function () {
        const rating = this.getAttribute('data-value');
        document.getElementById('ratingInput').value = rating;

        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('selected');
        }
    });
});
