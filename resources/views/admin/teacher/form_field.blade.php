<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Nama Guru --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Guru</label>
        <input type="text" name="name"
            type="text" placeholder="Masukkan nama"
            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
            required>
    </div>

    {{-- Mapel --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran</label>
        <select name="subject_id"
            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
            required>
            <option value="">-- Pilih Mapel --</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}"
                    {{ old('subject_id', $teacher->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Phone --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor HP</label>
        <input type="text" name="phone" placeholder="Masukkan nomor HP"
            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
            required>
    </div>

    {{-- Email --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
        <input type="email" name="email" placeholder="Masukkan email"
            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
            required>
    </div>

    {{-- Address --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
        <textarea name="address"
            class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white"
            rows="3"
            required>
        </textarea>
    </div>

</div>
