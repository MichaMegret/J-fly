<tr class="border-b border-gray-100">
                
    <td class="p-3">
        <input type="checkbox" x-model="selection" value="{{ $category->id }}" class="cursor-pointer checkbox h-5 w-5" x-on:click="$event.stopPropagation();" x-on:change="updateSelectAllElement(selection)">
    </td>

    {{-- <td class="text-left p-5">
        {{ $category->id }}
    </td> --}}

    <td class="text-left text-sm">
        <a href="update-category/{{ $category->id }}" class="flex items-center p-5">
            {{ $category->name }}
        </a>
    </td>

    <td class="text-left text-sm">
        <a href="update-category/{{ $category->id }}" class="flex items-center justify-center p-5">
            <span class="w-[4.5em] h-[1.5em] text-center bg-{{ $category->color }}"></span>
        </a>
    </td>

</tr>
