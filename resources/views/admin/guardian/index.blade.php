<x-admin.layout>
    <x-slot name="title">Guardian Management</x-slot>

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Guardian List</h1>

        <button id="openModalAdd"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Guardian
        </button>
    </div>

    <form method="GET" action="{{ route('admin.guardian.index') }}" class="mb-6">
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 12.65z"/>
            </svg>
        </div>

        <input
            type="search"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search guardian..."
            class="block w-full pl-12 pr-4 py-3
                   rounded-xl
                   bg-slate-700 text-white
                   placeholder-gray-400
                   focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
    </div>
</form>

    <!-- Table -->
    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden rounded-xl shadow border border-gray-300 dark:border-gray-700">

            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700 text-sm">

                <!-- THEAD -->
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Pekerjaan</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Telepon</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Gender</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Aksi</th>
                    </tr>
                </thead>

                <!-- TBODY -->
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-300 dark:divide-gray-700">
                    @foreach ($guardians as $guardian)
                        <tr class="hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-all">

                            <td class="px-4 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $guardian->nama }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $guardian->job }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $guardian->phone }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $guardian->email }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $guardian->gender }}</td>

                            <!-- ACTION -->
                            <td class="px-4 py-3 text-right relative">
                                <button 
                                    class="action-btn text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition"
                                    data-id="{{ $guardian->id }}"
                                    data-guardian='@json($guardian)'>
                                    ⋮
                                </button>

                                <div class="action-menu hidden absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 shadow-md rounded-lg border dark:border-gray-700 z-50">
                                    <button class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-emerald-100 dark:hover:bg-emerald-700/40 update-btn">Update</button>
                                    <button class="w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-red-800/40 delete-btn">Delete</button>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="mt-4">
        {{ $guardians->links() }}
    </div>

    <!-- MODAL: ADD -->
    <div id="modalAdd" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-xl p-6 relative">

            <button id="closeAdd"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-800 text-2xl">&times;</button>

            <h2 class="text-xl font-semibold mb-4">Tambah Guardian</h2>

            <form action="{{ route('admin.guardian.store') }}" method="POST" class="space-y-4">
                @csrf
                @include('admin.guardian.form_field')

                <div class="flex justify-end gap-2 border-t pt-4">
                    <button type="button" id="closeAdd2" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL: UPDATE -->
    <div id="modalUpdate" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-xl p-6 relative">

            <button id="closeUpdate"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-800 text-2xl">&times;</button>

            <h2 class="text-xl font-semibold mb-4">Update Guardian</h2>

            <form id="updateForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                @include('admin.guardian.form_field')

                <div class="flex justify-end gap-2 border-t pt-4">
                    <button type="button" id="cancelUpdate" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL: DELETE -->
    <div id="modalDelete" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-xl p-6 max-w-sm text-center">

            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-3">Hapus Guardian?</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-5">Data akan terhapus permanen.</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-center gap-3">
                    <button type="button" id="cancelDelete"
                        class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>

                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg">Hapus</button>
                </div>
            </form>
        </div>
    </div>


    <!-- SCRIPT -->
    <script>
        document.addEventListener("click", function (e) {

            // Tutup menu lain
            document.querySelectorAll(".action-menu").forEach(menu => {
                if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
                    menu.classList.add("hidden");
                }
            });

            // Toggle menu
            if (e.target.closest(".action-btn")) {
                let menu = e.target.closest(".action-btn").nextElementSibling;
                menu.classList.toggle("hidden");
            }

            // ---- UPDATE ----
            if (e.target.classList.contains("update-btn")) {
                let btn = e.target.closest("td").querySelector(".action-btn");
                let data = JSON.parse(btn.dataset.guardian);

                let form = document.getElementById("updateForm");
                form.action = `/admin/guardian/${data.id}`;

                Object.keys(data).forEach(key => {
                    let input = form.querySelector(`[name="${key}"]`);
                    if (input) input.value = data[key];
                });

                document.getElementById("modalUpdate").classList.remove("hidden");
            }

            // ---- DELETE ----
            if (e.target.classList.contains("delete-btn")) {
                let id = e.target.closest("td").querySelector(".action-btn").dataset.id;
                document.getElementById("deleteForm").action = `/admin/guardian/${id}`;
                document.getElementById("modalDelete").classList.remove("hidden");
            }
        });

        // Close buttons
        document.getElementById("closeAdd").onclick =
        document.getElementById("closeAdd2").onclick =
            () => document.getElementById("modalAdd").classList.add("hidden");

        document.getElementById("closeUpdate").onclick =
        document.getElementById("cancelUpdate").onclick =
            () => document.getElementById("modalUpdate").classList.add("hidden");

        document.getElementById("cancelDelete").onclick =
            () => document.getElementById("modalDelete").classList.add("hidden");

        document.getElementById("openModalAdd").onclick =
            () => document.getElementById("modalAdd").classList.remove("hidden");
    </script>

</x-admin.layout>
