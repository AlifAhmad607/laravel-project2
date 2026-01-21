<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Nama --}}
    <div>
        <label class="block text-sm font-medium text-white dark:text-white">Nama</label>
        <input type="text" name="nama" type="text" placeholder="Masukkan nama"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    {{-- Pekerjaan --}}
    <div>
        <label class="block text-sm font-medium text-white dark:text-white">Pekerjaan</label>
        <input type="text" name="job" type="text" placeholder="Masukkan pekerjaan"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    {{-- Telepon --}}
    <div>
        <label class="block text-sm font-medium text-white dark:text-white">Telepon</label>
        <input type="text" name="phone" type="text" placeholder="Masukkan telepon"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    {{-- Email --}}
    <div>
        <label class="block text-sm font-medium text-white dark:text-white">Email</label>
        <input type="email" name="email" type="text" placeholder="Masukkan email"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white" required>
    </div>

    {{-- Gender --}}
    <div>
        <label class="block text-sm font-medium text-white dark:text-white">Gender</label>
        <select name="gender"
            class="w-full p-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-500 
                   bg-gray-800 border-gray-700 text-white" required>
            <option class="text-black" value="">Pilih gender...</option>
            <option value="Laki-laki" @selected(old('gender', $guardian->gender ?? '') == 'Laki-laki')>Laki-laki</option>
            <option value="Perempuan" @selected(old('gender', $guardian->gender ?? '') == 'Perempuan')>Perempuan</option>
        </select>
    </div>

    {{-- Alamat --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-white dark:text-white">Alamat</label>
        <textarea name="address" rows="2" placeholder="Masukkan alamat"
            class="w-full p-2 mt-1 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white"required>
        </textarea>
    </div>

</div>
