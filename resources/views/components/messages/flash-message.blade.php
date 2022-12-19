@if(session()->has("error"))
    <div id='message-popup' class="p-2 bg-red-300 rounded" x-init="desappearAlert();">
        <p class="text-red-600"> flex items-center justify-between
            <span>{{ session("error") }}</span>
            <span wire:click='closeFlashMessage' class="ml-auto cursor-pointer p-2">X</span>
        </p>
    </div>
@elseif(session()->has("success"))
    <div id='message-popup' class="p-2 bg-green-500 rounded" x-init="desappearAlert();">
        <p class="text-green-700 flex items-center justify-between">
            <span>{{ session("success") }}</span>
            <span wire:click='closeFlashMessage' class="cursor-pointer p-2">X</span>
        </p>
    </div>
@endif

