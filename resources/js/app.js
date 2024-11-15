import './bootstrap';
document.addEventListener("DOMContentLoaded", function () {
    const movieItems = document.querySelectorAll(".movie-item");
    const modal = document.getElementById("movie-info-modal");
    const modalTitle = document.getElementById("movie-title");
    
    const modalDescription = document.getElementById("movie-description");
    const closeModal = document.querySelector(".modal-content .close");

    // Obsługa kliknięcia na element filmu
    movieItems.forEach(item => {
        item.addEventListener("click", function () {
            
            const title = this.dataset.title;
            const description = this.dataset.description;
            

            // Wypełnij modal danymi
            modalTitle.textContent = title;
            
            modalDescription.textContent = description;

            // Pokaż modal
            modal.classList.remove("hidden");
            document.getElementById('overlayMovies').style.display = 'flex';
        });
    });

    // Obsługa zamykania modal
    closeModal.addEventListener("click", function () {
       
        modal.classList.add("hidden");
        document.getElementById('overlayMovies').style.display = 'none';
    });

    // Zamknij modal, gdy klikniesz poza nim
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
            document.getElementById('overlayMovies').style.display = 'none';
        }
    });
});







 // Pokaż formularz po kliknięciu przycisku "Dodaj film"
 document.getElementById('show-form-buttonForum').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'flex';
});

// Ukryj formularz po kliknięciu przycisku "Anuluj"
document.getElementById('close-form-button').addEventListener('click', function() {
    document.getElementById('movieForm').reset();
    document.getElementById('overlay').style.display = 'none';
});

// Obsługa zapisu formularza
document.getElementById('movieForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Zatrzymanie domyślnego przesyłania formularza

    // Pobierz wartości z formularza
    const movieId = document.getElementById('movie_id').value;
    const content = document.getElementById('contentForum').value;

    // Dodaj tutaj kod do zapisania danych, np. Ajax lub inną metodą
    console.log('id:', movieId);
    console.log('Opis:', content);

    // Ukryj formularz po zapisaniu
    document.getElementById('overlay').style.display = 'none';

    // Wyczyść formularz
    document.getElementById('movieForm').reset();


    const url = `/api/some-action/${movieId}`; // Zbuduj URL z parametrem

fetch(url, {
    method: 'GET', // Lub 'POST', jeśli Twoja metoda wymaga POST
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
})
    .then(response => response.json())
    .then(data => {
        console.log('Odpowiedź z kontrolera:', data);
    })
    .catch(error => {
        console.error('Błąd:', error);
    });
});