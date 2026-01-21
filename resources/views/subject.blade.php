<x-layout>
  <x-slot:judul>{{$title}}</x-slot:judul>
  

  <div class="overflow-hidden rounded-xl shadow-lg border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
            No
          </th>
          <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
            Name
          </th>
          <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
            Description
          </th>
         
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
       @foreach ( $subjects as $subject )
        <tr class="hover:bg-gray-100 transition-colors duration-200">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
            {{$loop->iteration}}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
            {{$subject['name']}}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
            {{$subject['description']}}
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
</x-layout>