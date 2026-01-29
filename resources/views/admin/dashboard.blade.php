<x-admin.layout title="Dashboard">

    <!-- BACK TO USER DASHBOARD -->
    <!-- <div class="mb-4">
        <a href="{{ route('dashboard') }}"
           class="inline-flex items-center gap-2 px-4 py-2
                  bg-gray-200 dark:bg-gray-700
                  text-gray-800 dark:text-gray-200
                  rounded-lg shadow
                  hover:bg-gray-300 dark:hover:bg-gray-600
                  transition text-sm font-medium"> -->

            <!-- ICON -->
            <!-- <svg xmlns="http://www.w3.org/2000/svg"    
                 class="w-4 h-4"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 19l-7-7 7-7" />
            </svg>

            Kembali ke Dashboard
        </a>
    </div> -->

    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
        Dashboard Admin
    </h1>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5">
            <p class="text-sm text-gray-500 dark:text-gray-400">Siswa</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">
                {{ $totalStudents }}
            </h2>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5">
            <p class="text-sm text-gray-500 dark:text-gray-400">Guru</p>
            <h2 class="text-3xl font-bold text-emerald-600 mt-2">
                {{ $totalTeachers }}
            </h2>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5">
            <p class="text-sm text-gray-500 dark:text-gray-400">Wali Murid</p>
            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                {{ $totalGuardians }}
            </h2>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5">
            <p class="text-sm text-gray-500 dark:text-gray-400">Kelas</p>
            <h2 class="text-3xl font-bold text-orange-500 mt-2">
                {{ $totalClassrooms }}
            </h2>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-5">
            <p class="text-sm text-gray-500 dark:text-gray-400">Mapel</p>
            <h2 class="text-3xl font-bold text-pink-600 mt-2">
                {{ $totalSubjects }}
            </h2>
        </div>

    </div>

    <!-- WELCOME -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-6 shadow-lg">
        <h2 class="text-xl font-semibold mb-2">
            Selamat Datang, {{ auth()->user()->name }} 👋
        </h2>
        <p class="text-sm opacity-90">
            haihai  
        </p>
    </div>

</x-admin.layout>
