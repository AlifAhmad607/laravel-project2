<x-layout>
    <x-slot:judul>{{$title}}</x-slot:judul>

    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full overflow-hidden rounded-xl shadow-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                            No
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[150px]">
                            Nama Wali
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[150px]">
                            Pekerjaan (Job)
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[200px]">
                            Email
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[250px]">
                            Alamat
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[130px]">
                            Telepon
                        </th>
                        <th scope="col" class="px-4 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap min-w-[120px]">
                            Jenis Kelamin
                        </th>
                        </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($guardians as $guardian)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-4 py-4 text-sm text-gray-900 font-medium whitespace-nowrap">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 whitespace-nowrap">
                            {{ $guardian['nama'] }}
                        </td>
                        {{-- MENAMPILKAN KOLOM JOB --}}
                        <td class="px-4 py-4 text-sm text-gray-700 whitespace-nowrap">
                            {{ $guardian['job'] }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 whitespace-nowrap">
                            {{ $guardian['email'] }}
                        </td>
                        {{-- MENAMPILKAN KOLOM ADDRESS --}}
                        <td class="px-4 py-4 text-sm text-gray-700 max-w-[250px] truncate" title="{{ $guardian['address'] }}">
                            {{ $guardian['address'] }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 whitespace-nowrap">
                            {{ $guardian['phone'] }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-700 whitespace-nowrap">
                            {{ $guardian['gender'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-2 text-xs text-gray-500 text-center lg:hidden">
            ← Geser ke kanan untuk melihat kolom lainnya →
        </div>
    </div>
</x-layout>