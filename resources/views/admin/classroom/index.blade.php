<x-admin.layout>
    <x-slot name="title">Classroom Management</x-slot>

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            Classroom List
        </h1>

        <button id="openModalAdd"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Classroom
        </button>
    </div>

    <!-- SEARCH -->
    <form method="GET" action="{{ route('admin.classroom.index') }}" class="mb-6">
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
                placeholder="Search classroom..."
                class="block w-full pl-12 pr-4 py-3 rounded-xl
                       bg-slate-700 text-white placeholder-gray-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </form>

    <!-- TABLE -->
    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden rounded-xl shadow border border-gray-300 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700 text-sm">

                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Nama Kelas</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-300 dark:divide-gray-700">
                    @foreach ($classrooms as $classroom)
                        <tr class="hover:bg-blue-100 dark:hover:bg-blue-900/30 transition">

                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $classroom->name }}</td>
                            <!-- ACTION -->
                            <td class="px-4 py-3 text-right relative">
                                <button
                                    class="action-btn text-gray-500 hover:text-gray-700"
                                    data-id="{{ $classroom->id }}"
                                    data-classroom='@json($classroom)'>
                                    ⋮
                                </button>

                                <div
                                    class="action-menu hidden absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 shadow-md rounded-lg border z-50">
                                    <button
                                        class="w-full text-left px-4 py-2 text-sm hover:bg-emerald-100 update-btn">
                                        Update
                                    </button>
                                    <button
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 delete-btn">
                                        Delete
                                    </button>
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
        {{ $classrooms->links() }}
    </div>

    <!-- MODAL ADD -->
    <div id="modalAdd" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="bg-white dark:bg-gray-900 rounded-2xl w-full max-w-md p-6 relative">
            <button id="closeAdd" class="absolute top-3 right-4 text-2xl">&times;</button>

            <h2 class="text-xl font-semibold mb-4">Tambah Classroom</h2>

            <form action="{{ route('admin.classroom.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Nama Kelas"
                    class="w-full rounded-lg border p-2" required>

                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" id="closeAdd2" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL UPDATE -->
    <div id="modalUpdate" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="bg-white dark:bg-gray-900 rounded-2xl w-full max-w-md p-6 relative">
            <button id="closeUpdate" class="absolute top-3 right-4 text-2xl">&times;</button>

            <h2 class="text-xl font-semibold mb-4">Update Classroom</h2>

            <form id="updateForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="text" name="name" class="w-full rounded-lg border p-2" required>

                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" id="cancelUpdate" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div id="modalDelete" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="bg-white dark:bg-gray-900 rounded-xl p-6 max-w-sm text-center">
            <h2 class="text-lg font-semibold mb-3">Hapus Classroom?</h2>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-center gap-3">
                    <button type="button" id="cancelDelete" class="px-4 py-2 bg-gray-200 rounded-lg">Batal</button>
                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        document.addEventListener("click", function (e) {

            document.querySelectorAll(".action-menu").forEach(menu => {
                if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
                    menu.classList.add("hidden");
                }
            });

            if (e.target.closest(".action-btn")) {
                e.target.closest(".action-btn").nextElementSibling.classList.toggle("hidden");
            }

            if (e.target.classList.contains("update-btn")) {
                let btn = e.target.closest("td").querySelector(".action-btn");
                let data = JSON.parse(btn.dataset.classroom);

                let form = document.getElementById("updateForm");
                form.action = `/admin/classroom/${data.id}`;
                form.querySelector('[name="name"]').value = data.name;

                document.getElementById("modalUpdate").classList.remove("hidden");
            }

            if (e.target.classList.contains("delete-btn")) {
                let id = e.target.closest("td").querySelector(".action-btn").dataset.id;
                document.getElementById("deleteForm").action = `/admin/classroom/${id}`;
                document.getElementById("modalDelete").classList.remove("hidden");
            }
        });

        openModalAdd.onclick = () => modalAdd.classList.remove("hidden");
        closeAdd.onclick = closeAdd2.onclick = () => modalAdd.classList.add("hidden");
        closeUpdate.onclick = cancelUpdate.onclick = () => modalUpdate.classList.add("hidden");
        cancelDelete.onclick = () => modalDelete.classList.add("hidden");
    </script>

</x-admin.layout>
