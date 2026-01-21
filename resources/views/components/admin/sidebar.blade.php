<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-gray-800 md:translate-x-0"
    aria-label="Sidenav"
    id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-gray-800">
        <ul class="space-y-1">
            <li>
                <x-admin.sidelink label="Overview" href="#" 
                    :icon="'<path d=\'M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z\'></path><path d=\'M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z\'></path>'" />
            </li>
            <li>
                <x-admin.sidelink label="Dashboard" href="/admin/dashboard" />
            </li>
            <li>
                <x-admin.sidelink label="Student" href="/admin/student" />
            </li>
            <li>
                <x-admin.sidelink label="Classroom" href="/admin/classroom" /> 
            </li>
            <li>
                <x-admin.sidelink label="Teacher" href="/admin/teacher" />
            </li>
            <li>
                <x-admin.sidelink label="Subject" href="/admin/subject" />
            </li>
            <li>
                <x-admin.sidelink label="Guardian" href="/admin/guardian" />
            </li>
        </ul>
    </div>

    {{-- Bottom Actions --}}
    <div class="absolute bottom-0 left-0 flex justify-center items-center p-4 space-x-4 w-full bg-gray-800 border-t border-gray-700">
        <a href="#" class="inline-flex justify-center items-center p-2 text-gray-400 rounded-lg hover:text-white hover:bg-gray-700">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path>
            </svg>
        </a>
        <a href="#" class="inline-flex justify-center items-center p-2 text-gray-400 rounded-lg hover:text-white hover:bg-gray-700">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</aside>
