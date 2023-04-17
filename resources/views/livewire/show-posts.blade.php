<div>
    <h1>hola mundo</h1>
    <x-tables.table>
        <div class="px-6 py-4 flex items-center">
            <x-input-label for="search" :value="__('Buscar')" />
            <x-text-input id="search" class="block mt-1 flex-1 mr-4" wire:model="search" type="text" name="search"
                :value="old('search')" required autofocus autocomplete="search" />
            <x-input-error :messages="$errors->get('search')" class="mt-2" />
            {{-- <input type="text" class="w-full" wire:model="search"> --}}
            {{-- llamamos a nuestro componente que con tiene el boton y el modal oculto --}}
            @livewire('create-post')
        </div>
        <div>
        </div>
        @if ($posts->count())
            <div class="px-6 py-4">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class=" cursor-pointer px-6 py-4 font-medium text-gray-900"
                                wire:click="order('id')">
                                Id
                                <i class="fas fa-sort float-right mt-1"></i>
                            </th>
                            <th scope="col" class=" cursor-pointer px-6 py-4 font-medium text-gray-900"
                                wire:click="order('title')">
                                Titulo
                                <i class="fas fa-sort float-right mt-1"></i>
                            </th>
                            <th scope="col" class=" cursor-pointer px-6 py-4 font-medium text-gray-900"
                                wire:click="order('content')">Contenido
                                <i class="fas fa-sort float-right mt-1"></i>
                            </th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado </th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        @foreach ($posts as $post)
                            <tr class="hover:bg-gray-50">
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-10 w-10">
                                        @if ($post->image)
                                            <img src="{{ $post->image }}" alt="">
                                        @else
                                            <img class="h-full w-full rounded-full object-cover object-center"
                                                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="" />
                                            <span @endif
                                                class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                    </div>
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">{{ $post->id }}</div>
                                        {{-- <div class="text-gray-400">jobs@sailboatui.com</div> --}}
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        {{ $post->title }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $post->content }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                            Design
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600">
                                            Product
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                                            Develop
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-4">
                                        {{-- DELETE --}}
                                        <a x-data="{ tooltip: 'Delete' }" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6"
                                                x-tooltip="tooltip">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            ELIMINAR
                                        </a>
                                        {{-- EDIT --}}
                                        @livewire('edit-post', ['post' => $post], key($post->id))

                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @else
            <div class="px-6 py-4">
                No hay registros
            </div>
        @endif

    </x-tables.table>

</div>
