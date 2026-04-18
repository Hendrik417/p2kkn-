<x-guest-layout>
    <div class="flex flex-col md:flex-row min-h-screen">

        <!-- LEFT -->
        <div class="relative hidden md:flex md:w-1/2 bg-[#b21818] items-center justify-center">

            <!-- Back Button -->
            <a href="/"
                class="absolute top-6 left-6 bg-white/20 backdrop-blur-md text-white
                    w-10 h-10 flex items-center justify-center rounded-full
                    hover:bg-white/30 transition">
                ←
            </a>

            <!-- Text -->
            <div class="text-white px-12">
                <h1 class="text-5xl font-bold leading-tight">
                    Halo 👋<br>Selamat datang!
                </h1>
                <p class="mt-4 text-white/80">
                    Sistem KKN Universitas Sulawesi Barat
                </p>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-8">
            <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-md">

                <!-- Logo -->
                <div class="flex flex-col items-center mb-6">
                    <img src="path_ke_logo_unsulbar.png" alt="Logo" class="w-16 mb-3">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Login KKN UNSULBAR
                    </h2>
                </div>

                <!-- STATUS DEFAULT -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- ✅ NOTIF REGISTER SUCCESS -->
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <x-text-input id="email"
                            class="block w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                            type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <x-text-input id="password"
                            class="block w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                            type="password" name="password" placeholder="Password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-[#b21818] text-white font-semibold py-3 rounded-lg
                            hover:bg-red-800 transition duration-200 shadow">
                        Masuk
                    </button>

                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-red-600 focus:ring-red-500"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">
                                Remember me
                            </span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-red-800" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- REGISTER LINK -->
                    @if (Route::has('register'))
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                Belum punya akun?
                                <a href="{{ route('register') }}"
                                    class="text-[#b21818] font-semibold hover:underline hover:text-red-800 transition">
                                    Registrasi
                                </a>
                            </p>
                        </div>
                    @endif

                </form>
            </div>
        </div>

    </div>
</x-guest-layout>

