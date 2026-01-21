<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div>
        <label class="block text-sm font-medium text-gray-300">Nama</label>
        <input id="addName" name="nama" type="text" placeholder="Masukkan nama"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Email</label>
        <input id="addEmail" name="email" type="email" placeholder="Masukkan Email"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Kelas</label>
        <select name="classroom_id"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
            <option value="">Pilih kelas...</option>
            @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">
                    {{ $classroom->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Tanggal Lahir</label>
        <input type="date" name="date_of_birth"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Jenis Kelamin</label>
        <select name="gender"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
            <option value="">Pilih jenis kelamin...</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Telepon</label>
        <input type="text" name="phone"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-300">Alamat</label>
        <textarea name="address" rows="2"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required></textarea>
    </div>

</div>
