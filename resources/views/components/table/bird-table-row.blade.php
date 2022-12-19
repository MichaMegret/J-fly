<tr class="border-b border-gray-100">
                
    <td class="p-3">
        <input type="checkbox" x-model="selection" value="{{ $bird->id }}" class="cursor-pointer checkbox h-5 w-5" x-on:click="$event.stopPropagation();" x-on:change="updateSelectAllElement(selection)">
    </td>

    {{-- <td class="text-left p-5">
        {{ $bird->id }}
    </td> --}}

    <td>
        <a href="update-bird/{{ $bird->id }}" class="flex items-center p-4">
            <div class="flex items-center">
                {{-- @if ($bird->mainImage)
                    <img src="{{ $bird->mainImage }}" alt="" class="h-14 w-14 rounded-full mr-3">
                @else
                    <div class="h-14 w-14 rounded-full bg-slate-800 mr-3 flex justify-center items-center">
                        <span class="text-uppercase text-bold text-xl text-white">/</span>
                    </div>
                @endif --}}
                @if ($bird->image)
                    <img src="{{ asset('storage/'.$bird->image) }}" alt="" class="h-14 w-14 rounded-full mr-3">
                @else
                    <div class="h-14 w-14 rounded-full bg-slate-800 mr-3 flex justify-center items-center">
                        <span class="text-uppercase text-bold text-xl text-white">/</span>
                    </div>
                @endif
                <div class="bird-name flex flex-col items-start">
                    <span class="french-name text-lg font-medium">{{ $bird->french_name }}</span>
                    <span class="latin-name text-slate-600 text-sm">
                        {{ $bird->latin_name }}
                    </span>
                </div>
            </div>
        </a>
    </td>

    <td class="text-left text-sm">
        <a href="update-bird/{{ $bird->id }}" class="flex items-center p-5">
            @cutText($bird->description)
        </a>
        {{-- {{ $bird->description }} --}}
    </td>

    <td class="text-left text-sm items-center justify-start flex flex-wrap items-center">
        <a href="update-bird/{{ $bird->id }}" class="flex items-center p-5">
            @if ($bird->categories)
                @foreach ($bird->categories as $category)
                    <span class="bg-{{$category->color}} px-2 py-1 text-white text-xs rounded-lg m-1"> {{ $category->name }}</span>
                @endforeach
            @endif
        </a>
    </td>

    {{-- <td class="text-center">
        <x-primary-button type="button" class="text-sm bg-slate-500 py-0.5 focus:ring-0 focus:border-none"  x-on:click="$event.stopPropagation();" wire:click.prevent="beginEditing({{ $bird->id }})">
            Edit
        </x-primary-button>
    </td> --}}

</tr>

{{-- @if ($editId === $bird->id)
    <tr id='editing-row' class="border-b border-gray-100">
        <td colspan="4">Editing</td>
    </tr>
@endif --}}