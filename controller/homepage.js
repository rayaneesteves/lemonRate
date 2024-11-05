const apiKey = 'ef0bda0322a73c50aaa0ed16de544460'; 
const movieContainer = document.getElementById('movies');

async function fetchPopularMovies() {
  const response = await fetch(`https://api.themoviedb.org/3/movie/popular?api_key=${apiKey}&language=pt-BR&page=1`);
  const data = await response.json();
  
  // Pegando apenas os 9 primeiros filmes
  const popularMovies = data.results.slice(0, 9);
  displayMovies(popularMovies);
}



function displayMovies(movies) {
  movies.forEach(movie => {
    if (movie.poster_path) {
      const movieElement = document.createElement('div');
      movieElement.classList.add('movie');

      // Criando o link que levará à página de avaliação
      const movieLink = document.createElement('a');
      movieLink.href = `/login/view/avaliarFilme.html?movieId=${movie.id}`; // Adiciona o ID do filme como parâmetro na URL

      const moviePoster = document.createElement('img');
      moviePoster.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
      moviePoster.alt = `${movie.title} Poster`;

      const movieTitle = document.createElement('div');
      movieTitle.classList.add('movie-title');
      movieTitle.textContent = movie.title;

      // Colocando o pôster dentro do link
      movieLink.appendChild(moviePoster);

      // Adicionando o link e o título dentro do elemento do filme
      movieElement.appendChild(movieLink);
      movieElement.appendChild(movieTitle);

      // Adicionando o filme ao container
      movieContainer.appendChild(movieElement);
    }
  });
}



// Chama a função para buscar filmes populares ao carregar a página
fetchPopularMovies();
