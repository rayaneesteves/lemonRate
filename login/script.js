document.addEventListener('DOMContentLoaded', function () {
    const API_KEY = 'ef0bda0322a73c50aaa0ed16de544460'; // Substitua pela sua chave da API
    const BASE_URL = 'https://api.themoviedb.org/3';
    const AUTH_TOKEN = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjBiZGEwMzIyYTczYzUwYWFhMGVkMTZkZTU0NDQ2MCIsIm5iZiI6MTcyNDk0OTkxNC42NjAyMjEsInN1YiI6IjY2YmUyZTMzOWVjOTYxZGMxZGMzOGM5MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.RawYxp-idwd9FLsehkLjlqUxb8UudvQWkoz_KYEpErw'; // Substitua pelo seu Bearer Token

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

        movies.forEach(movie => {
            const movieItem = document.createElement('div');

            // Verifica se há um poster disponível
            const posterUrl = movie.poster_path
                ? `https://image.tmdb.org/t/p/w500${movie.poster_path}`
                : 'URL_DE_IMAGEM_PADRAO'; // Substitua pela URL de uma imagem padrão, caso não haja poster

            movieItem.innerHTML = `
                <div style="display: flex; margin-bottom: 20px;">
                    <img src="${posterUrl}" alt="${movie.title}" style="width: 150px; height: auto; margin-right: 20px;">
                    <div>
                        <h2>${movie.title}</h2>
                        <p>${movie.overview}</p>
                    </div>
                </div>
            `;
            movieResults.appendChild(movieItem);
        });
    }

    // Torna a função searchMovie global para que o HTML possa acessá-la
    window.searchMovie = searchMovie;
});
