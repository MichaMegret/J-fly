<div class="w-full h-full min-h-[80vh] flex flex-col items-center justify-center" x-data="">

    <h1 class="my-10 md:my-auto uppercase text-2xl font-bold">
        Register a new bird
    </h1>
    
    <div class="w-11/12 px-6 py-4 md:m-auto bg-white shadow-md overflow-hidden rounded-lg">

        <form enctype="multipart/form-data" wire:submit.prevent="create" class="create-bird-form flex flex-col items-center">

            @csrf

            <div class="flex flex-wrap justify-center md:justify-start">

                <div class="form-section flex flex-col min-w-[15em] w-[45%] m-2">
                    <label for="frenchName" class="mb-1">French Name :</label>
                    <input type="text" wire:model="frenchName" id="frenchName" class="border border-slate-300 focus:border-blue-200 focus:border-2 outline-none rounded-lg px-2 py-1">
                    @error('frenchName') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-section flex flex-col min-w-[15em] w-[45%] m-2">
                    <label for="latinName" class="mb-1">Latin Name :</label>
                    <input type="text" wire:model="latinName" id="latinName" class="border border-slate-300 focus:border-blue-200 focus:border-2 outline-none rounded-lg px-2 py-1">
                    @error('latinName') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-section flex flex-col min-w-[15em] w-[45%] m-2">
                    <label for="description" class="mb-1">Description :</label>
                    <textarea name="description" id="description" wire:model="description" cols="30" rows="10" class="border border-slate-300 focus:border-blue-200 focus:border-2 outline-none rounded-lg px-2 py-1"></textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="form-section flex flex-col min-w-[15em] w-[45%] m-2">
                    <label class="mb-1">Image :</label>
                    <div class="form-input border border-slate-300 focus:border-blue-200 focus:border-2 outline-none rounded-lg px-2 py-1 flex items-center">
                        <button x-on:click="document.getElementById('birdImage').click()" type="button" class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm">Browse</button>
                        {{-- <div wire:loading wire:target="birdImage" class="m-auto">Uploading...</div> --}}
                        <div class="m-auto"
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                        > 
                            <input type="file" accept="*" class="hidden" name="birdImage" wire:model="birdImage" id="birdImage">                       
                            <!-- Progress Bar -->
                            <div x-show="isUploading" class="w-1/2 m-auto">
                                <progress max="100" x-bind:value="progress" class="max-w-full"></progress>
                            </div>
                        </div>
                    </div>
                    @error('birdImage') <span class="text-red-500">{{ $message }}</span> @enderror
                    @if ($birdImage && !$errors->get('birdImage'))
                        <img src="{{ $birdImage->temporaryUrl() }}" class="w-[15em] m-auto">
                        <span class="text-center">{{ $birdImageName }}</span>
                    @endif
                </div>

                <div class="form-section flex flex-col min-w-[15em] w-[45%] mt-6 m-2">

                    <label class="mb-1">Categories :</label>

                    <div class="flex items-center justify-start mt-3">
                        @foreach ($birdCategories as $category)
                            <div class="flex items-center mx-6">
                                <input type="checkbox" wire:model="categories" value="{{ $category->id }}" id="category_{{ $category->id }}" class="cursor-pointer">
                                <label for="category_{{ $category->id }}" class="p-2 font-semibold cursor-pointer min-w-max">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        
            <button type="submit" class="mx-auto mb-6 mt-12 block bg-indigo-700 hover:bg-indigo-900 rounded-md font-semibold px-6 py-1 text-white text-md">Create Bird</button>

        </form>

    </div>
    
</div>
