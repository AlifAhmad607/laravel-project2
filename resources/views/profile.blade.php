<x-layout>
     <x-slot:judul>{{$title}}</x-slot:judul>
    <div>
        <div>
            <h1>Profil Saya</h1>
            
            <p> {{ $nama }}</p>
            <p> {{ $kelas }}</p>
            <p> {{ $sekolah }}</p>
        </div>
    </div>
</x-layout>
