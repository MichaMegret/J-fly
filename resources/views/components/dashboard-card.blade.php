<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-sm w-[48%] min-w-[20em] m-[1%] overflow-hidden']) }}>

    <a href="{{ $link }}" class="block w-full px-6 py-16 uppercase text-center text-[1.5em] hover:scale-125 ease-linear duration-300 text-cyan-500">
        {{ $slot }}
    </a>

</div>