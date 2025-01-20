@props(['noticia'])

<div class="flex justify-between w-full p-6 mt-2 mb-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a class="hover:text-blue-500 hover:underline" href="{{ $noticia->url }}">{{ $noticia->titular }}</a>
            @can('update-noticia', $noticia)
                <a href="{{ route('noticias.edit', $noticia) }}">
                    <button type="button" class="px-2 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button>
                </a>
            @endcan
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $noticia->descripcion }}</p>
    </div>
    <div>
        <img src="{{ $noticia->imagen }}" />
    </div>
</div>
