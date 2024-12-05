<meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="movie-info-modal" class="modal hidden">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="movie-title" class=" font-bold text-center text-xl"></h2>
            <h1 id="movie-id" class="hidden"></h1>
            <br>
            <p id="movie-description" class="text-justify ml-1 mr-1 text-base"></p>
            
            <form id="movieInfoForm">
                <!-- Przykładowe pola formularza -->
                <div class="rating-container text-center">
                    <label for="rating" class="rating-label font-semibold text-base mb-2">Twoja ocena:</label>
                    <div class="rating-input-wrapper">
                        <input type="number" id="rating" name="rating" min="1" max="5" class="rating-input">
                    </div>
                </div>
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
    
