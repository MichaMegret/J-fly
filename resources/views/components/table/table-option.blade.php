<div {{ $attributes->merge(["class"=>"flex flex-wrap w-full items-center mb-5 p-3"]) }}>

    <input type="checkbox" x-model="allSelect" id="selectAllElement" class="cursor-pointer h-5 w-5" x-on:click="selectAllElement($event, selection)">

    <input
    type="search" 
    wire:model.debounce.500ms="search" 
    class="placeholder:italic placeholder:text-slate-400 block bg-white w-1/2 ml-10 border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" 
    placeholder="Search a {{ $element }}" 
    name="search">

    <a href="/create-{{$element}}" class="block w-max rounded-md px-3 pb-1 bg-blue-600 text-white text-center ml-5 font-semi-bold">
        <span class="text-xl font-bold">+</span> Add a {{ $element }}
    </a>

    <template x-if="selection.length > 0">
        <button class="px-3 py-1 bg-red-600 mx-auto block text-white rounded" 
        x-on:click="$wire.deleteSelection(selection)"
        wire:loading.attr='disabled'>
            Supprimer la sélection
        </button>
    </template>

</div>