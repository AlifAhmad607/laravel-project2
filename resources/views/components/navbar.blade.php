<div>
    <nav class="bg-black">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                {{-- LEFT --}}
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="size-8"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=amber&shade=500"
                            alt="Logo">
                    </div>

                    {{-- DESKTOP MENU --}}
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <x-nav-link href="/home" :active="request()->is('home')">Home</x-nav-link>
                            <x-nav-link href="/profile" :active="request()->is('profile')">Profil</x-nav-link>
                            <x-nav-link href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link>
                            <x-nav-link href="/student" :active="request()->is('student')">Student</x-nav-link>
                            <x-nav-link href="/guardian" :active="request()->is('guardian')">Guardian</x-nav-link>
                            <x-nav-link href="/classroom" :active="request()->is('classroom')">Classroom</x-nav-link>
                            <x-nav-link href="/teacher" :active="request()->is('teacher')">Teacher</x-nav-link>
                            <x-nav-link href="/subject" :active="request()->is('subject')">Subject</x-nav-link>
                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">

                        {{-- JIKA BELUM LOGIN --}}
                        @guest
                            <a href="{{ route('login') }}"
                               class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Login
                            </a>
                        @endguest

                        {{-- JIKA SUDAH LOGIN --}}
                        @auth
                        <el-dropdown class="relative ml-3">
                            <button class="flex rounded-full">
                                <img class="size-8 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ auth()->user()->email }}">
                            </button>

                            <el-menu anchor="bottom end"
                                class="w-48 rounded-md bg-white py-1 shadow-lg">
                                <div class="px-4 py-2 text-sm text-gray-600">
                                    {{ auth()->user()->email }}
                                </div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </el-menu>
                        </el-dropdown>
                        @endauth

                    </div>
                </div>

                {{-- MOBILE BUTTON --}}
                <div class="-mr-2 flex md:hidden">
                    <button command="--toggle" commandfor="mobile-menu"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:text-white">
                        <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        {{-- MOBILE MENU --}}
        <el-disclosure id="mobile-menu" hidden class="md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <x-nav-link-mobile href="/home" :active="request()->is('home')">Home</x-nav-link-mobile>
                <x-nav-link-mobile href="/profile" :active="request()->is('profile')">Profil</x-nav-link-mobile>
                <x-nav-link-mobile href="/kontak" :active="request()->is('kontak')">Kontak</x-nav-link-mobile>
                <x-nav-link-mobile href="/student" :active="request()->is('student')">Student</x-nav-link-mobile>
                <x-nav-link-mobile href="/guardian" :active="request()->is('guardian')">Guardian</x-nav-link-mobile>
                <x-nav-link-mobile href="/classroom" :active="request()->is('classroom')">Classroom</x-nav-link-mobile>
                <x-nav-link-mobile href="/teacher" :active="request()->is('teacher')">Teacher</x-nav-link-mobile>
                <x-nav-link-mobile href="/subject" :active="request()->is('subject')">Subject</x-nav-link-mobile>

                {{-- MOBILE LOGIN --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="block rounded bg-blue-600 px-4 py-2 text-white">
                        Login
                    </a>
                @endguest
            </div>
        </el-disclosure>
    </nav>
</div>
