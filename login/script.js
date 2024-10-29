document.addEventListener('DOMContentLoaded', function () { 
    const API_KEY = '9545a79b119db52e58d6ac087fd08185'; // Substitua pela sua chave da API
    const BASE_URL = 'https://api.themoviedb.org/3';
    const AUTH_TOKEN = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjBiZGEwMzIyYTczYzUwYWFhMGVkMTZkZTU0NDQ2MCIsIm5iZiI6MTcyNDk0OTkxNC42NjAyMjEsInN1YiI6IjY2YmUyZTMzOWVjOTYxZGMxZGMzOGM5MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.RawYxp-idwd9FLsehkLjlqUxb8UudvQWkoz_KYEpErw'; // Bearer Token

    async function searchMovie() {
        const query = document.getElementById('searchQuery').value.trim();
        if (!query) return;

        const url = `${BASE_URL}/search/movie?query=${encodeURIComponent(query)}&include_adult=false&language=pt-BR&page=1&api_key=${API_KEY}`;

        const options = {
            method: 'GET',
            headers: {
                accept: 'application/json',
                Authorization: `Bearer ${AUTH_TOKEN}`
            }
        };

        try {
            const response = await fetch(url, options);
            const data = await response.json();
            displayResults(data.results);
        } catch (error) {
            console.error('Erro ao buscar filmes:', error);
        }
    }

    function displayResults(movies) {
        const movieResults = document.getElementById('movieResults');
        movieResults.innerHTML = ''; // Limpa os resultados anteriores

        if (!movies || movies.length === 0) {
            movieResults.innerHTML = '<p>Nenhum filme encontrado.</p>';
            return;
        }

        // Estilos para os cards
        const style = document.createElement('style');
        style.innerHTML = `
            .movie-card {
                display: flex;
                flex-direction: column;
                border-radius: 8px;
                padding: 10px;
                width: 200px;
                margin: 10px;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0.3); 
                transition: transform 0.2s;
            }

            .movie-card img {
                border-radius: 8px;
                max-width: 100%;
            }

            .movie-card:hover {
                transform: scale(1.05);
            }

            .movie-card h2 {
                font-size: 18px;
                margin: 10px 0 5px;
            }

            .movie-card p {
                font-size: 14px;
                margin: 5px 0;
            }

            .movies-grid {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
        `;
        document.head.appendChild(style);

        const moviesGrid = document.createElement('div');
        moviesGrid.className = 'movies-grid';

        movies.forEach(movie => {
            const movieItem = document.createElement('div');
            movieItem.className = 'movie-card';

            // Verifica se há um poster disponível
            const posterUrl = movie.poster_path
                ? `https://image.tmdb.org/t/p/w500${movie.poster_path} `
                : 'semimagem.png'; // Substitua pela URL de uma imagem padrão ldldmdiiuujd
                

            // Truncate popularity to 3 digits
            const popularity = movie.popularity ? Math.round(movie.popularity) : 'N/A';

            // Ano de lançamento
            const releaseYear = movie.release_date ? movie.release_date.split('-')[0] : 'N/A';

            movieItem.innerHTML = `
                <a href="avaliarFilme.html?id=${movie.id}" style="text-decoration: none; color: inherit;">
                    <img src="${posterUrl}" alt="${movie.title}">
                    <h2>${movie.title}</h2>
                    <p><strong>Ano:</strong> ${releaseYear}</p>
                    <p><strong>Popularidade:</strong> ${popularity}</p>
                </a>
            `;
            moviesGrid.appendChild(movieItem);
        });

        movieResults.appendChild(moviesGrid);
    }

    // Torna a função searchMovie global para que o HTML possa acessá-la
    window.searchMovie = searchMovie;
});
