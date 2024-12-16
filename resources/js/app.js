import './bootstrap';
document.getElementById("hideMovies").addEventListener('click', function() {
    const movieList = document.getElementById('MoviesList');
    console.log(movieList.style.display);
    if(movieList.style.display == "none") {
        movieList.style.display = "flex";
    } else {
        movieList.style.display = "none";
    }
});
document.getElementById("hideSeries").addEventListener('click', function() {
    const movieList = document.getElementById('SeriesList');
    console.log(movieList.style.display);
    if(movieList.style.display == "none") {
        movieList.style.display = "flex";
    } else {
        movieList.style.display = "none";
    }
});
document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector("button[aria-controls='mobile-menu']");
    const mobileMenu = document.getElementById("mobile-menu");

    if (menuButton && mobileMenu) {
        menuButton.addEventListener("click", function() {
            const isExpanded = menuButton.getAttribute("aria-expanded") === "true";

            
            mobileMenu.classList.toggle("hidden");

            menuButton.setAttribute("aria-expanded", !isExpanded); 

            const icons = menuButton.querySelectorAll("svg[data-slot='icon']");
            icons.forEach(icon => icon.classList.toggle("hidden"));
            icons.forEach(icon => icon.classList.toggle("block"));

        });
    } else {
        console.error("Menu button or mobile menu not found!");
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const movieItems = document.querySelectorAll(".movie-item");
    const modal = document.getElementById("movie-info-modal");
    const modalTitle = document.getElementById("movie-title");
    const modalId = document.getElementById("movie-id");
    const modalDescription = document.getElementById("movie-description");
    const closeModal = document.querySelector(".modal-content .close");

    
    movieItems.forEach(item => {
        item.addEventListener("click", function() {

            const title = this.dataset.title;
            const description = this.dataset.description;
            const movieId = this.dataset.movieId;

           
            modalTitle.textContent = title;
            modalId.textContent = movieId;
            modalDescription.textContent = description;

            
            modal.classList.remove("hidden");
            document.getElementById('overlayMovies').style.display = 'flex';
        });
    });

    document.getElementById('movieInfoForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        
        const rating = document.getElementById('rating').value;

        const url = `/api/movies/review/add`; 
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 
        fetch(url, {
                method: 'POST', 
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, 
                },
                body: JSON.stringify({
                    movieId: modalId.textContent,
                    rating: rating
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Odpowiedź z kontrolera:', data);
            })
            .catch(error => {
                console.error('Błąd:', error);
            });
    });


    document.getElementById('watchlist-add-button').addEventListener('click', function() {

        const url = `/api/add`; 
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 
        fetch(url, {
                method: 'POST', 
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, 
                },
                body: JSON.stringify({
                    movieId: modalId.textContent
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Odpowiedź z kontrolera:', data);
            })
            .catch(error => {
                console.error('Błąd:', error);
            });
        document.getElementById('watchlist-add-button').style = "enabled:false";
    });

   
    closeModal.addEventListener("click", function() {

        modal.classList.add("hidden");
        document.getElementById('overlayMovies').style.display = 'none';
    });

    
    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
            document.getElementById('overlayMovies').style.display = 'none';
        }
    });
});



document.getElementById('show-form-button-forum').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'flex';
});

$("#contentForum").keyup(function() {
    $("#count").text(700 - $(this).val().length);
});

document.getElementById('close-form-button-forum').addEventListener('click', function() {
    document.getElementById('movieForm').reset();
    document.getElementById('overlay').style.display = 'none';
});


document.getElementById('movieForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

   
    const movieId = document.getElementById('movie_id').value;
    const contenttext = document.getElementById('contentForum').value;

    const url = `/api/forum/add`; 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 
    fetch(url, {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken, 
            },
            body: JSON.stringify({
                movieId: movieId,
                contentText: contenttext
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Odpowiedź z kontrolera:', data);
        })
        .catch(error => {
            console.error('Błąd:', error);
        });

    
    document.getElementById('overlay').style.display = 'none';

    
    document.getElementById('movieForm').reset();
    location.reload();
});

