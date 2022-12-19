<div class="p-5" x-data="{selection : @entangle('selection').defer, allSelect : @entangle('allSelect').defer}">

    <div class="w-full min-w-[60em]">    
    
        {{-- table options --}}
        <x-table.table-option element="bird" />
    
        {{-- birds table --}}
        <table id="birds-table" class="element-table table-fixed w-full bg-white rounded-lg overflow-hidden">
        
            <thead class="bg-slate-0">
                <tr class="border-b border-gray-200">
                    <th class="text-left w-10"></th>
                    {{-- <x-table-header :direction="$orderDirection" name="id" :field="$orderField" class="w-24">ID</x-table-header> --}}
                    <x-table-header :direction="$orderDirection" name="french_name" :field="$orderField" class="min-w-[15em]">Name</x-table-header>
                    <x-table-header :direction="$orderDirection" name="description" :field="$orderField" class="min-w-[15em]">Description</x-table-header>
                    <th class="label mr-2 font-semibold">Categories</th>
                </tr>
            </thead>
    
    
            <tbody>
    
                @if (count($birds)>0)
                    @foreach ($birds as $bird)
    
                        {{-- A row of the bird table --}}
                        <x-table.bird-table-row :bird="$bird" />
    
                    @endforeach                
                @else
                    <tr>
                        <td colspan="5" class="text-center px-5 py-10">
                            <span class="text-slate-500 text-2xl w-full text-center">No birds found</span>
                        </td>
                    </tr>
                @endif
    
            </tbody>
    
        </table>

    </div>



    {{-- Pagination livewire native component --}}
    {{ $birds->links() }}


    {{-- Select nb lines show on each pages --}}
    <x-table.tab-line-selector :nbLines="$nbLines" />

</div>


