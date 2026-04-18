 {{-- <x-guest-layout>
     <div class="flex flex-col md:flex-row min-h-screen">

         <!-- LEFT -->
         <div class="relative hidden md:flex md:w-1/2 bg-[#b21818] items-center justify-center">
             <a href="{{ route('login') }}"
                 class="absolute top-6 left-6 bg-white/20 backdrop-blur-md text-white
                        w-10 h-10 flex items-center justify-center rounded-full
                        hover:bg-white/30 transition">
                 ←
             </a>

             <div class="text-white px-12">
                 <h1 class="text-5xl font-bold leading-tight">
                     Daftar 👋<br>Akun KKN
                 </h1>
                 <p class="mt-4 text-white/80">
                     Isi data dengan benar untuk mengikuti KKN
                 </p>
             </div>
         </div>

         <!-- RIGHT -->
         <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-8">
             <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">

                 <div class="flex flex-col items-center mb-6">
                     <h2 class="text-lg font-semibold text-gray-800">
                         Registrasi Mahasiswa
                     </h2>
                 </div>

                 <form method="POST" action="{{ route('register') }}">
                     @csrf

                     <!-- Nama -->
                     <div class="mb-3">
                         <input type="text" name="name" placeholder="Nama Lengkap"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- NIM -->
                     <div class="mb-3">
                         <input type="text" name="nim" placeholder="NIM"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- Email -->
                     <div class="mb-3">
                         <input type="email" name="email" placeholder="Email"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- Prodi -->
                     <div class="mb-3">
                         <input type="text" name="prodi" placeholder="Program Studi"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- Angkatan -->
                     <div class="mb-3">
                         <input type="number" name="angkatan" placeholder="Angkatan"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- Password -->
                     <div class="mb-3">
                         <input type="password" name="password" placeholder="Password"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- Konfirmasi -->
                     <div class="mb-4">
                         <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <!-- Button -->
                     <button type="submit"
                         class="w-full bg-[#b21818] text-white font-semibold py-3 rounded-lg hover:bg-red-800 transition">
                         Daftar
                     </button>

                     <!-- Login link -->
                     <div class="mt-4 text-center">
                         <p class="text-sm text-gray-600">
                             Sudah punya akun?
                             <a href="{{ route('login') }}" class="text-[#b21818] font-semibold hover:underline">
                                 Login
                             </a>
                         </p>
                     </div>

                 </form>
             </div>
         </div>

     </div>
 </x-guest-layout> --}}
 {{-- <x-guest-layout>
     <div class="flex flex-col md:flex-row min-h-screen">

         <div class="relative hidden md:flex md:w-1/2 bg-[#b21818] items-center justify-center">
             <a href="{{ route('login') }}"
                 class="absolute top-6 left-6 bg-white/20 backdrop-blur-md text-white
                        w-10 h-10 flex items-center justify-center rounded-full
                        hover:bg-white/30 transition">
                 ←
             </a>

             <div class="text-white px-12">
                 <h1 class="text-5xl font-bold leading-tight">
                     Daftar 👋<br>Akun KKN
                 </h1>
                 <p class="mt-4 text-white/80">
                     Isi data dengan benar untuk mengikuti KKN
                 </p>
             </div>
         </div>

         <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-8">
             <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">

                 <div class="flex flex-col items-center mb-6">
                     <h2 class="text-lg font-semibold text-gray-800">
                         Registrasi Mahasiswa
                     </h2>
                 </div>

                 <form method="POST" action="{{ route('register') }}">
                     @csrf

                     <div class="mb-3">
                         <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                             class="w-full bg-gray-100 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required autofocus>
                         @error('name')
                             <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="text" name="nim" value="{{ old('nim') }}" placeholder="NIM"
                             class="w-full bg-gray-100 border @error('nim') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('nim')
                             <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                             class="w-full bg-gray-100 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('email')
                             <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="text" name="prodi" value="{{ old('prodi') }}" placeholder="Program Studi"
                             class="w-full bg-gray-100 border @error('prodi') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('prodi')
                             <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="number" name="angkatan" value="{{ old('angkatan') }}"
                             placeholder="Angkatan (Contoh: 2021)"
                             class="w-full bg-gray-100 border @error('angkatan') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('angkatan')
                             <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="password" name="password" placeholder="Password"
                             class="w-full bg-gray-100 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('password')
                             <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-4">
                         <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <button type="submit"
                         class="w-full bg-[#b21818] text-white font-semibold py-3 rounded-lg hover:bg-red-800 transition">
                         Daftar
                     </button>

                     <div class="mt-4 text-center">
                         <p class="text-sm text-gray-600">
                             Sudah punya akun?
                             <a href="{{ route('login') }}" class="text-[#b21818] font-semibold hover:underline">
                                 Login
                             </a>
                         </p>
                     </div>

                 </form>
             </div>
         </div>

     </div>
 </x-guest-layout> --}}
 <x-guest-layout>
     <div class="flex flex-col md:flex-row min-h-screen">

         <div class="relative hidden md:flex md:w-1/2 bg-[#b21818] items-center justify-center">
             <a href="{{ route('login') }}"
                 class="absolute top-6 left-6 bg-white/20 backdrop-blur-md text-white
                        w-10 h-10 flex items-center justify-center rounded-full
                        hover:bg-white/30 transition">
                 ←
             </a>

             <div class="text-white px-12">
                 <h1 class="text-5xl font-bold leading-tight">
                     Daftar 👋<br>Akun KKN
                 </h1>
                 <p class="mt-4 text-white/80">
                     Isi data dengan benar untuk mengikuti program KKN.
                 </p>
             </div>
         </div>

         <div class="w-full md:w-1/2 flex items-center justify-center bg-gray-100 p-8">
             <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">

                 <div class="flex flex-col items-center mb-6">
                     <h2 class="text-lg font-semibold text-gray-800">
                         Registrasi Mahasiswa
                     </h2>
                 </div>

                 <form method="POST" action="{{ route('register') }}">
                     @csrf

                     <div class="mb-3">
                         <input type="text" name="name" class="form-control" placeholder="Nama Lengkap"
                             value="{{ old('name') }}" required autofocus>
                         @error('name')
                             <span class="text-danger small">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="text" name="nim" class="form-control" placeholder="NIM"
                             value="{{ old('nim') }}" required>
                         @error('nim')
                             <span class="text-danger small">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="email" name="email" class="form-control"
                             placeholder="Email (contoh@gmail.com)" value="{{ old('email') }}" required>
                         @error('email')
                             <span class="text-danger small">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="password" name="password" class="form-control" placeholder="Password" required>
                         @error('password')
                             <span class="text-danger small">{{ $message }}</span>
                         @enderror
                     </div>

                     <div class="mb-3">
                         <input type="password" name="password_confirmation" class="form-control"
                             placeholder="Konfirmasi Password" required>
                     </div>

                     <button type="submit" class="btn btn-danger w-100">Daftar Sekarang</button>
                 </form>

                 {{-- <form method="POST" action="{{ route('register') }}">
                     @csrf

                     <div class="mb-3">
                         <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                             class="w-full bg-gray-100 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required autofocus>
                         @error('name')
                             <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                         @enderror
                     </div>

                        <div class="mb-3">
                            <input type="text" name="nim" value="{{ old('nim') }}" placeholder="NIM"
                                class="w-full bg-gray-100 border @error('nim') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                                required>
                            @error('nim')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                         <div class="mb-3">
                         <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                             class="w-full bg-gray-100 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('email')
                             <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                         @enderror
                     </div>

                     {{-- <div class="mb-3">
                         <input type="text" name="prodi" value="{{ old('prodi') }}" placeholder="Program Studi"
                             class="w-full bg-gray-100 border @error('prodi') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('prodi')
                             <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                         @enderror
                     </div> --}}

                 {{-- <div class="mb-3">
                         <input type="number" name="angkatan" value="{{ old('angkatan') }}"
                             placeholder="Angkatan (Contoh: 2021)"
                             class="w-full bg-gray-100 border @error('angkatan') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('angkatan')
                             <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                         @enderror
                     </div> --}}

                 {{-- <div class="mb-3">
                         <input type="password" name="password" placeholder="Password"
                             class="w-full bg-gray-100 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                         @error('password')
                             <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                         @enderror
                     </div>

                     <div class="mb-6">
                         <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                             class="w-full bg-gray-100 border border-gray-200 rounded-lg py-3 px-4 focus:ring-red-600 focus:border-red-600"
                             required>
                     </div>

                     <button type="submit"
                         class="w-full bg-[#b21818] text-white font-semibold py-3 rounded-lg hover:bg-red-800 transition shadow-lg">
                         Daftar Sekarang
                     </button>

                     <div class="mt-6 text-center">
                         <p class="text-sm text-gray-600">
                             Sudah punya akun?
                             <a href="{{ route('login') }}" class="text-[#b21818] font-bold hover:underline">
                                 Login di sini
                             </a>
                         </p>
                     </div>

                 </form> --}}
             </div>
         </div>

     </div>
 </x-guest-layout>
