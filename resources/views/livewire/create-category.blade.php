@php
    $colorTab=[
        "slate",
        "gray",
        "red",
        "orange",
        "yellow",
        "lime",
        "green",
        "teal",
        "sky",
        "blue",
        "violet",
        "purple",
        "pink"
    ];
@endphp

<div class="w-full h-full min-h-[80vh] flex flex-col items-center justify-start" x-data="">

    <h1 class="my-10 uppercase text-2xl font-bold">
        Register a new category
    </h1>
    
    <div class="w-11/12 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">

        <form wire:submit.prevent="create" class="create-category-form flex flex-col items-center">

            @csrf

            <div class="flex flex-col items-center justify-center">

                <div class="form-section flex flex-col min-w-[15em] w-[45%] m-2">
                    <label for="categoryName" class="mb-1">Category Name :</label>
                    <input type="text" wire:model="categoryName" id="categoryName" class="border border-slate-300 focus:border-blue-200 focus:border-2 outline-none rounded-lg px-2 py-1">
                    @error('categoryName') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="form-section flex flex-col min-w-[15em] w-[45%] m-2">
                    <label for="color" class="mb-1">Color :</label>
                    <input type="text" wire:model="color" id="color" class="hidden border border-slate-300 focus:border-blue-200 focus:border-2 outline-none rounded-lg px-2 py-1">
                    <div class="flex flex-wrap w-full">
                        @foreach ($colorTab as $color)
                            @for ($i = 100; $i < 900; $i+=100)
                                @php
                                    $activeClass = "";
                                    if($activeColor == $color."-".$i){
                                        $activeClass="active";
                                    }
                                @endphp
                                <span data-color="{{$color}}-{{$i}}" x-on:click="selectColor" class="color w-[1.5em] h-[1.5em] bg-{{$color}}-{{$i}} {{$activeClass}}"></span>
                                <script>
                                    function selectColor(e){
                                        // const colors = document.getElementsByClassName('color');
                                        const selectedColor = e.target.getAttribute("data-color");
                                        // for(i=0;i<colors.length;i++){
                                        //     colors[i].classList.remove("active");
                                        // }
                                        // e.target.classList.add('active');
                                        Livewire.emit('defineColor', selectedColor);
                                    }
                                </script>
                            @endfor
                        @endforeach
                    </div>
                    @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

            </div>

        
            <button type="submit" class="mx-auto mb-6 mt-12 block bg-indigo-700 hover:bg-indigo-900 rounded-md font-semibold px-6 py-1 text-white text-md">Create Category</button>

        </form>

    </div>
    
</div>
