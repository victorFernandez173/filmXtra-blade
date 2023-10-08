<div>
    <a href="{{ route('inicio') }}" class="block w-full flex justify-center flex-wrap text-center py-4 group relative">
        <div class="w-full px-3">
            <p class="group-hover:invisible truncate text-flamingo font-oswald font-bold text-lg">{{ $obra->titulo }}</p>
        </div>
        <div class="z-10 inline-block px-3 py-2 {{ strlen($obra->titulo) > 50 ? 'text-sm top-1 py-2.5' : 'text-lg top-0' }} font-medium text-white duration-0 bg-flamingo shadow-sm absolute opacity-0 transition-opacity group-hover:opacity-100 w-full">
            <p class="truncate text-white font-oswald font-bold">{{ $obra->titulo }}
            </p>
        </div>
        <img src="{{ asset('/posters/' . $obra->ruta) }}" alt="{{ $obra->alt }}" class="w-4/5 border-[10px] border-white group-hover:border-flamingo">
    </a>
</div>
