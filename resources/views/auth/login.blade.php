<x-layout>
    <x-slot:judul>Login</x-slot:judul>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md">

            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="text-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Login</h1>
                    <p class="text-gray-500 mt-1">Silakan masuk ke dashboard</p>
                </div>

                @if(session('error'))
                    <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-sm text-red-600">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Email</label>
                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="you@example.com"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3
                                   text-gray-800 placeholder-gray-400
                                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Password</label>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3
                                   text-gray-800 placeholder-gray-400
                                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>

                    <button
                        class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white
                               hover:bg-blue-700 transition">
                        Login
                    </button>
                </form>
            </div>

            <p class="mt-6 text-center text-sm text-gray-500">
                © {{ date('Y') }} Sistem Informasi Sekolah
            </p>
        </div>
    </div>
</x-layout>
