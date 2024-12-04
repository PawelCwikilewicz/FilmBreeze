<meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="movie-info-modal" class="modal hidden">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="movie-title"></h2>
            <h1 id="movie-id" class="hidden"></h1>
            <p id="movie-description"></p>
            <form>
                <!-- Przykładowe pola formularza -->
                <label for="rating">Twoja ocena:</label>
                
                <input type="number" id="rating" name="rating" min="1" max="5">
                <br>
                <br>
                <div style="display: flex">
                    <button type="submit" class="classic-button" id="save-form-button-movies">Zapisz</button>
                    <button type="button" id="watchlist-add-button" class="classic-button font-bold ml-auto mr-0" >+</button>
                </div>
            </form>
        </div>
    </div>
    <div class="overlayMovies" id="overlayMovies">

    </div>
    
