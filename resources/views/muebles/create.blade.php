<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear mueble
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"  x-data="{ open: false }" >
            <form method="POST" action="{{ route('noticias.store') }}" class="max-w-sm mx-auto"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <x-input-label for="denominacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Denominación
                    </x-input-label>
                    <x-text-input name="denominacion" type="text" id="denominacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('denominacion')" />
                    <x-input-error :messages="$errors->get('denominacion')" class="mt-2" />
                </div>
                <div class="mb-5">
                    <x-input-label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tipo
                    </x-input-label>
                    <select name="tipo" id="tipo" @change="open = ! open">
                        <option value="PRE">Prefabricado</option>
                        <option value="FAB">Fabricado</option>
                    </select>
                    <x-text-input name="tipo" type="text" id="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('tipo')" />
                    <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                </div>
                <div class="mb-5" x-show="open">
                    <x-input-label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        URL
                    </x-input-label>
                    <x-text-input name="url" type="text" id="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('url')" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>
                {{-- <div class="mb-5">
                    <x-input-label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Categoría
                    </x-input-label>
                    <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('categoria_id')" class="mt-2" />
                </div> --}}
                <div class="mb-5">
                    <x-input-label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Imagen
                    </x-input-label>
                    <x-text-input name="imagen" type="file" id="imagen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('imagen')" />
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
