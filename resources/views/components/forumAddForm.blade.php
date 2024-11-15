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
                    <option id="chooseMovieOption" value="" disabled selected>-- Wybierz film --</option>
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