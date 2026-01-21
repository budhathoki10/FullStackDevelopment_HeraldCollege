// json-server --watch movies.json
const movieListDiv = document.getElementById("movie-list");
const searchInput = document.getElementById("search-input");
const form = document.getElementById("add-movie-form");
const API_URL = "http://localhost:3000/movies";
let allmovies = [];

function rendermovies(moviestodisplay) {
  movieListDiv.innerHTML = "";
  if (moviestodisplay ==0) {
    movieListDiv.innerHTML = " <p>no movies found</p>";
    return;
  }
  moviestodisplay.forEach((movie) => {
    const movieelement = document.createElement("div");
    movieelement.innerHTML = `

        <p class="para"><strong>${movie.title}</strong> (${movie.year}) - ${movie.genre}</p>
        <button onclick="editMoviePrompt(${movie.id}, '${movie.title}', ${movie.year},
        '${movie.genre}')">Edit</button>
        <button class="dlt" onclick="deleteMovie(${movie.id})">Delete</button><br><br><br>
        `
    movieListDiv.appendChild(movieelement);
  });
}
function fetchmovies() {
  fetch(API_URL)
    .then((response) => response.json())
    .then((movies) => {
      allmovies = movies;
      console.log(movies)
      console.log(typeof(movies[0].id))
      // console.log(allmovies);
      rendermovies(allmovies);
    });
}

fetchmovies()

searchInput.addEventListener("input", () => {
  const searchterm = searchInput.value.toLowerCase();
  const filtermovies = allmovies.filter((movie) => {
    const titlematch = movie.title.toLowerCase().includes(searchterm);
    const genrematch = movie.genre.toLowerCase().includes(searchterm);
    return titlematch || genrematch;
  });
  rendermovies(filtermovies);
});


form.addEventListener("submit", (e) => {
  e.preventDefault();
  let new_id;
    if(allmovies.length>0){
      const idofdata= allmovies.map((a)=>parseInt(a.id))
      const dataid= Math.max(...idofdata)
      new_id =dataid+1
    }
    else{
        new_id=0;
    }
    
  const newmovie = {
    id:String(new_id),
    title: document.getElementById("title").value,
    genre: document.getElementById("genre").value,
    year: parseInt(document.getElementById("year").value),
  };
  fetch(API_URL, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(newmovie),
  })
    .then((response) => {
      if (!response.ok) throw new Error("failed to add movie");
      console.log(response);
      return response.json()
    })
    .then(() => {
      form.reset();
      fetchmovies();
    })
    .catch(() => console.log("error in adding movies ", error));
});
const editMoviePrompt = (id, currentTitle, currentYear, currentGenre) => {
    
  const newtitle = prompt("enter a new title", currentTitle);
  const newyear = prompt("enter a new year", currentYear);

  const newgenre = prompt("enter a new title", currentGenre);
  if (newtitle && newyear && newgenre) {
    
    const updatedMovie = {
      id:id, 
      title: newtitle,
      year: parseInt(newyear),
      genre: newgenre,
    };
    updateMovie(id, updatedMovie);
  }
};

const updateMovie = (movieid, updatedMovie) => {
  fetch(`${API_URL}/${movieid}`, {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(updatedMovie),
  })
    .then((response) => {
      if (!response.ok) throw new Error("Failed to update movie");
      return response.json();
    })
    .then(() => {
      fetchmovies();
    })
    .catch((error) => {
      console.log("error in updating movies", error);
    });
};

const deleteMovie = (movieId) => {
  fetch(`${API_URL}/${movieId}`, {
    method: "DELETE",
    
  })
    .then((response) => {
      if (!response.ok) throw new Error("Failed to delete movie");
      fetchmovies(); 
    })
    .catch((error) => {
      console.log("error");
    });
};