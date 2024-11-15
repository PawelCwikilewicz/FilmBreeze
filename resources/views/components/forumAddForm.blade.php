<div>
    <!-- Przycisk do wyświetlania formularza -->
    <button class="buttonForum" id="show-form-buttonForum">Dodaj film</button>
        
    <!-- Tło do wyświetlenia formularza na środku -->
    <div class="overlayForum" id="overlay">
        <div class="form-containerForum">
            <h3>Dodaj Film</h3>
            <form id="movieForm">
                <label for="movie_id">Wybierz film:</label>
                <select id="movie_id" name="movie_id" required>
                    <option id="chooseMovieOption" value="">-- Wybierz film --</option>
                    @foreach($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select><br>
                
                <label for="contentForum">Opis:</label>
                <textarea id="contentForum" name="content" required></textarea><br>
                
                <button type="submit">Zapisz</button>
                <button type="button" id="close-form-button">Anuluj</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Pokaż formularz po kliknięciu przycisku "Dodaj film"
    document.getElementById('show-form-buttonForum').addEventListener('click', function() {
        document.getElementById('overlay').style.display = 'flex';
    });

    // Ukryj formularz po kliknięciu przycisku "Anuluj"
    document.getElementById('close-form-button').addEventListener('click', function() {
        document.getElementById('overlay').style.display = 'none';
    });

    // Obsługa zapisu formularza
    document.getElementById('movieForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Zatrzymanie domyślnego przesyłania formularza

        // Pobierz wartości z formularza
        const title = document.getElementById('title').value;
        const content = document.getElementById('contentForum').value;

        // Dodaj tutaj kod do zapisania danych, np. Ajax lub inną metodą
        console.log('Tytuł:', title);
        console.log('Opis:', content);

        // Ukryj formularz po zapisaniu
        document.getElementById('overlay').style.display = 'none';

        // Wyczyść formularz
        document.getElementById('movieForm').reset();
    });
</script>

<style>
    /* Styl dla tła formularza */
    .overlayForum {
        display: none; /* Domyślnie ukryte */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Półprzezroczyste tło */
        justify-content: center;
        align-items: center;
    }

    /* Styl formularza */
    .form-containerForum {
        background-color: #fff;
        padding: 20px;
        width: 500px;
        height: auto;
        border-radius: 8px;
        border: 2px solid;
        box-shadow: 0 4px 8px #005b87;
        text-align: center;
    }

    /* Styl dla przycisku i formularza */
    
    .buttonForum, input[type="text"], textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
    

    /* Styl dla przycisku */
    #show-form-buttonForum {
        margin-top: 20px;
        border: 2px solid;
    }
    #contentForum {
        border: 2px solid #005b87;
    }
    #chooseMovieOption {
        text-align: center;
    }
    #movie_id {
        box-shadow: 0 2px 4px #005b87;
    }
</style>
