    <div id="updateClassroomModal"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-md p-6 relative transform transition-all duration-300 scale-100 opacity-100 animate-fade-in">
            <button id="closeUpdateModalBtn"
                class="absolute top-3 right-4 text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 text-2xl font-bold transition">
                &times;
            </button>

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                Update Classroom
            </h2>

            {{-- Form Update --}}
            <form id="updateClassroomForm" method="POST" action="">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="updateName"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Classroom</label>
                    <input id="updateName" name="name" type="text" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-400 focus:outline-none transition">
                </div>

                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" id="cancelUpdateBtn"
                        class="px-4 py-2 text-sm bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
