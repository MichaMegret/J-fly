<th {{ $attributes->merge(["class"=>"p-3"]) }}>

    <div wire:click="setOrderField('{{ $name }}')" class="flex items-center justify-start cursor-pointer p-2">

        <span class="label mr-2 font-semibold">
            {{ $slot }}
        </span>

        @if ($visible)
            @if ($direction==="DESC")
            <div class="w-4 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-slate-400" viewBox="0 0 512 512"><title>Caret Up</title><path d="M414 321.94L274.22 158.82a24 24 0 00-36.44 0L98 321.94c-13.34 15.57-2.28 39.62 18.22 39.62h279.6c20.5 0 31.56-24.05 18.18-39.62z"/></svg>
            </div>
            @else
            <div class="w-4 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-slate-400" viewBox="0 0 512 512"><title>Caret Down</title><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z"/></svg>
            </div>
            @endif
        @endif

    </div>

</th>