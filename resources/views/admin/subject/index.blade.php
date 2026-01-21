<x-admin.layout>
    <x-slot name="title">Subject Management</x-slot>

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Subject List</h1>

        <button id="openModalBtn"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow">
            + Add Subject
        </button>
    </div>

                    <form method="GET" action="{{ route('admin.subject.index') }}" class="mb-6">
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
                    placeholder="Search subject..."
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
            <table id="subjectTable"
                class="min-w-full divide-y divide-gray-300 dark:divide-gray-700 text-sm">

                <!-- THEAD -->
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Nama Mapel</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Deskripsi</th>

                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-800 dark:text-gray-200 uppercase">Aksi</th>
                    </tr>
                </thead>

                <!-- TBODY -->
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($subjects as $subject)
                        <tr class="hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-all cursor-pointer">
                            <td class="px-4 py-4 font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300">{{ $subject->name }}</td>
                            <td class="px-4 py-4 text-gray-800 dark:text-gray-300 max-w-[300px] truncate" title="{{ $subject->description }}">
                                {{ $subject->description }}
                            </td>

                            <!-- AKSI -->
                            <td class="px-4 py-4 text-right relative">
                                <button 
                                    class="action-btn text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition"
                                    data-id="{{ $subject->id }}"
                                    data-subject='@json($subject)'>
                                    ⋮
                                </button>

                                <!-- DROPDOWN -->
                                <div class="action-menu hidden absolute right-0 mt-2 w-32 bg-white dark:bg-gray-800 shadow-md rounded-lg border dark:border-gray-700 z-50">
                                    <button class="w-full text-left px-3 py-2 text-sm text-white hover:bg-gray-100 dark:hover:bg-green-700/40 update-btn">Update</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="mt-4">
    {{ $subjects->links() }}
</div>
    </div>

    <!-- Modal Add Subject -->
    <div id="addSubjectModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-2xl p-6 relative">

            <button id="closeModalBtn"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 text-2xl font-bold">
                &times;
            </button>

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b pb-2">
                Tambah Mapel
            </h2>

            <form method="POST" action="{{ route('admin.subject.store') }}" class="space-y-4">
                @csrf
                @include('admin.subject.form_field')

                <div class="flex justify-end gap-2 pt-4 border-t dark:border-gray-700">
                    <button type="button" id="closeModalBtn2"
                        class="px-4 py-2 text-white bg-red-600 hover:bg-gray-700 rounded-lg">Batal</button>

                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Update Subject -->
    <div id="updateSubjectModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-2xl p-6 relative">

            <button id="closeUpdateModal"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 text-2xl font-bold">
                &times;
            </button>

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b pb-2">
                Update Mapel
            </h2>

            <form id="updateForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                @include('admin.subject.form_field')

                <div class="flex justify-end gap-2 pt-4 border-t dark:border-gray-700">
                    <button type="button" id="cancelUpdate"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-lg">Batal</button>

                    <button type="submit"
                        class="px-4 py-2 text-white bg-emerald-600 hover:bg-emerald-700 rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        document.addEventListener('click', function (e) {
            // Tutup semua dropdown
            document.querySelectorAll('.action-menu').forEach(menu => {
                if (!menu.contains(e.target) && !menu.previousElementSibling.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });

            // Toggle dropdown
            if (e.target.closest('.action-btn')) {
                let menu = e.target.closest('.action-btn').nextElementSibling;
                menu.classList.toggle('hidden');
            }

            // -------- UPDATE --------
            if (e.target.classList.contains('update-btn')) {
                let btn = e.target.closest('td').querySelector('.action-btn');
                let data = JSON.parse(btn.dataset.subject);

                let form = document.getElementById('updateForm');
                form.action = `/admin/subject/${data.id}`;

                Object.keys(data).forEach(key => {
                    let input = form.querySelector(`[name="${key}"]`);
                    if (input) input.value = data[key];
                });

                document.getElementById('updateSubjectModal').classList.remove('hidden');
            }
        });

        // Close Update Modal
        document.getElementById('closeUpdateModal').onclick =
        document.getElementById('cancelUpdate').onclick =
            () => document.getElementById('updateSubjectModal').classList.add('hidden');

        // Close Add Modal
        document.getElementById('closeModalBtn').onclick =
        document.getElementById('closeModalBtn2').onclick =
            () => document.getElementById('addSubjectModal').classList.add('hidden');

        document.getElementById('openModalBtn').onclick =
            () => document.getElementById('addSubjectModal').classList.remove('hidden');
    </script>

</x-admin.layout>
