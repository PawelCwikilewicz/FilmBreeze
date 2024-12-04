<div>
    <!-- Przycisk do wyświetlania formularza -->
    <div class=" text-end">
    <button class="classic-button font-semibold" id="show-form-button-forum">Dodaj wpis</button>
    </div>
    <!-- Tło do wyświetlenia formularza na środku -->
    <div class="overlayForum" id="overlay">
        <div class="form-containerForum">
            
            <form id="movieForm">
                
                <label for="movie_id" class="font-semibold" >Omawiany film lub serial:</label>
                <select id="movie_id" name="movie_id" class="ml-2" required>
                    <option id="chooseMovieOption" value="" disabled selected>-- brak --</option>
                    @foreach($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select><br><br>
                
                <label for="contentForum" class="font-semibold">Wpis:</label>
                <textarea id="contentForum" maxlength="700" name="content" class="" required></textarea><br>
                <div class=" justify-center content-center flex mb-3 space-x-1 text-sm">
                    <p>Pozostało znaków:</p>
                    <p id="count">750</p>
                </div>
                <button type="submit" class="classic-button" id="save-form-button-forum">Zapisz</button>
                <button type="button" class="classic-button ml-2" id="close-form-button-forum">Anuluj</button>
            </form>
        </div>
    </div>
</div>