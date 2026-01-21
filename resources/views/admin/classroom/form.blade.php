<form id="addClassroomForm" class="space-y-4" method="POST" action="/admin/classroom">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Kelas</label>
        <input id="addName" name="name" type="text" placeholder="Masukkan nama kelas"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    <div class="flex justify-end gap-2 pt-4 border-t border-gray-200 dark:border-gray-700">
        <button type="button" id="closeModalBtn2"
            class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200
            bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-gray-900
            dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white
            focus:ring-2 focus:ring-gray-400 focus:outline-none">
            Batal
        </button>

        <button type="submit" id="saveClassroomBtn"
            class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
            Simpan
        </button>
    </div>
</form>
