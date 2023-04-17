<div>
    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-post')">
        {{ __('Crear Post') }}
        <i class="fas fa-plus ml-2"></i>
    </x-primary-button>

    {{-- OPCION PARA MANEJAR ERRORES PROPIOS EN LA VISTA, CON ALERTA SWEET ALERT --}}
    {{-- @if($errors->isNotEmpty()) --}}
       {{-- <script> --}}
        {{-- // Livewire.on('alert', (message) => { --}}
            {{-- Swal.fire({ --}}
                {{-- icon: 'error', --}}
                {{-- title: 'Oops...', --}}
                {{-- text: 'No se pudieron guardar los campos!', --}}
                {{-- footer: '<a href>Why do I have this issue?</a>' --}}
            {{-- }) --}}
        {{-- // }) --}}
       {{-- </script> --}}
    {{-- @endif --}}
    
    <x-modal name="create-post"  maxWidth="2xl" focusable>
        <div class="p-6 form-control">
            {{-- @csrf --}}
            {{-- @method('delete') --}}
            <h2 class="text-lg font-medium text-gray-900">
                Crear Post
            </h2>
            <div wire:loading wire:target="image">
                Cargando... procesando imagen
            </div>
            @if($image)
                <img src="{{ $image->temporaryUrl() }}" alt="">
            @endif
            <p class="mt-1 text-sm text-gray-600">
                Ingrese los datos del post
                {{-- {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }} --}}
            </p>

            <div class="mt-6">
                <x-input-label for="title" value="{{ __('Title') }}" class="" /> {{-- class="sr-only" --}}
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Title') }}" wire:model.defer="title" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="content" value="{{ __('Content') }}" class="" />
                <x-text-input id="content" name="content" type="text" class="mt-1 block w-3/4"
                    placeholder="{{ __('Content') }}" wire:model.defer="content" required />
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>
            <div class="mt-6">
                <x-input-label for="content" value="{{ __('Imagen') }}" class="" />
                <x-text-input id="file" name="file" type="file" class="mt-1 block w-3/4"
                    placeholder="{{ __('Content') }}" wire:model.defer="image" required />
                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ml-3"   wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25"  >
                    {{ __('Crear Post') }}
                </x-danger-button>
                <span wire:loading wire:target="save">Cargando ....</span>

            </div>
        </div> 
    </x-modal>

</div>
