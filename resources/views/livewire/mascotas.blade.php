<x-slot name="header">
    <h1 class="tetx-gray-900">CRUD laravel con jetstream</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 my-3">Añadir Mascota</button>
        @if($modal)
          @include('livewire.crear')
        @endif
        <table class= "table-fixed w-full">
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class= "px-4 py-2">ID</th>
                <th class= "px-4 py-2">Nombre de la mascota</th>
                <th class= "px-4 py-2">Raza</th>
                <th class= "px-4 py-2">Edad</th>
                <th class= "px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota)
            <tr>
                <td class="border px-4 py-2">{{$mascota->id}}</td>
                <td class="border px-4 py-2">{{$mascota->nombre_mascota}}</td>
                <td class="border px-4 py-2">{{$mascota->raza}}</td>
                <td class="border px-4 py-2">{{$mascota->edad}}</td>

                <td>
                    <button wire:click="editar({{$mascota->id}})" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4">Editar</button>
                    <button wire:click="borrar({{$mascota->id}})" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4">Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
