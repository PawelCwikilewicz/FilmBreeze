<x-layout>
    <x-slot:login>
        <!-- Login Container -->
        <div class="login-container d-flex justify-content-center align-items-center vh-100">
            <div class="row justify-content-center w-100">
                <div class="col-12 col-sm-8 col-md-6">
                    <form class="form mt-3 p-4 border rounded shadow-sm" action="{{ route('login') }}" method="post" autocomplete="off">
                        @csrf
                        <h3 class="text-center text-dark" id="form-header-text">Login</h3>

                        <!-- EMAIL -->
                        <div class="input-group mb-6 select-none">
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="input-field"
                                placeholder=""
                                autocomplete="off"
                            />
                            <label for="email" class="input-label">
                                E-mail
                            </label>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group mb-6 select-none">
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="input-field"
                                placeholder=""
                                autocomplete="off"
                            />
                            <label for="password" class="input-label">
                                Password
                            </label>
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="form-group mt-4 select-none">
                            <input
                                type="submit"
                                name="submit"
                                class="classic-button font-semibold"
                                id="login-button"
                                style="max-width: 400px;"
                                value="Login"
                            >
                        </div>

                        <!-- Register -->
                        <div class="text-right mt-3 select-none underline">
                            <a href="/register" class="text-dark">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot:login>
</x-layout>
