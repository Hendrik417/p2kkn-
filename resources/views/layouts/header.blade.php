{{-- <header class="bg-white border-b border-gray-100 sticky top-0 z-10">
    <div class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <button @click="open = true" class="lg:hidden p-2 text-gray-400 hover:text-indigo-600">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h1 class="text-xl font-bold text-gray-800 ml-2 lg:ml-0">Dashboard P2KKN</h1>
        </div>

        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-500">{{ auth()->user()->name ?? 'User' }}</span>
        </div>
    </div>
</header> --}}
{{-- <header class="flex items-center justify-between bg-white p-4 shadow">
    <!-- Left -->
    <div class="flex items-center space-x-2">
        <!-- Hamburger button (mobile) -->
        <button @click="open = !open" class="text-gray-700 focus:outline-none lg:hidden">
            {{-- <i class="fas fa-bars text-xl"></i> --}}
            {{-- <i data-lucide="menu"></i>
        </button>
    </div>

    <!-- Right -->
    <div class="relative" x-data="{ open: false }">
        <!-- Tombol avatar -->
        <button @click="open = !open" class="flex items-center focus:outline-none">
            <span class="mr-2 text-gray-700">Hi, <b>{{ Auth::user()->name }}</b></span>
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover border">
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false"
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50">

            <!-- Link ke Profile -->
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                Profile
            </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </div>
    </div> --}}

{{-- </header> --}} 
