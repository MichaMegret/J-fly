<div class="p-5" x-data="{selection : @entangle('selection').defer, allSelect : @entangle('allSelect').defer}">

    <div class="min-w-[40em] w-1/2 m-auto flex-col items-center justify-center">
    
        {{-- table options --}}
        <x-table.table-option element="category" />
    
    
        {{-- categories table --}}
        <table id="categories-table" class="element-table table-fixed bg-white rounded-lg overflow-hidden w-full">
        
            <thead class="bg-slate-0">
                <tr class="border-b border-gray-200">
                    <th class="text-left w-10"></th>
                    {{-- <x-table-header :direction="$orderDirection" name="id" :field="$orderField" class="w-24">ID</x-table-header> --}}
                    <x-table-header :direction="$orderDirection" name="name" :field="$orderField" class="min-w-[15em] text-center">Name</x-table-header>
                    <th class="label mr-2 font-semibold">Color</th>
                </tr>
            </thead>
    
    
            <tbody>
    
                @if (count($categories)>0)
                    @foreach ($categories as $category)
    
                        {{-- A row of the category table --}}
                        <x-table.category-table-row :category="$category" />
    
                    @endforeach                
                @else
                    <tr>
                        <td colspan="5" class="text-center px-5 py-10">
                            <span class="text-slate-500 text-2xl w-full text-center">No categories found</span>
                        </td>
                    </tr>
                @endif
    
            </tbody>
    
        </table>

    </div>



    {{-- Pagination livewire native component --}}
    {{ $categories->links() }}


    {{-- Select nb lines show on each pages --}}
    <x-table.tab-line-selector :nbLines="$nbLines" />

</div>
