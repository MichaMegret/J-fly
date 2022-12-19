<div {{ $attributes->merge(['class' => 'flex flex-col justify-start items-center']) }}>>

    <div class="w-[25em] max-w-[90%] px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>

</div>
