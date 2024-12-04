<x-layout>
    <x-slot:heading>
        Witamy w aplikacji FilmBreeze!
    </x-slot:heading>
    @auth
        <!-- Puste bo tak o -->
    @endauth
    @guest
    <div class="bg-white bg-opacity-80 my-5 p-5 flex flex-col rounded-lg border-2 border-black shadow-lg">
        <p class="text-black text-2xl">
            FilmBreeze to aplikacja służąca do wystawiania ocen filmom i serialom, prowadzenia dyskusji na forum na tematy związane z filmami oraz pozwalająca na tworzenie listy filmów
            i seriali do obejrzenia.
        </p>

        <!-- Submit -->
        <div class="form-group mt-4 select-none">
            <input
                type="submit"
                name="submit"
                class="classic-button font-semibold"
                id="login-button"
                style="max-width: 400px;"
                value="Submit">
        </div>
    </div>
    @endguest
</x-layout>


