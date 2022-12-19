<x-app-layout>

    @section('title')
        {{ 'Categories list' }}
    @endsection
    
    @push('scripts')
        <script src="/assets/js/category-list.js"></script>
    @endpush

    @push('scripts')
        <script src="/assets/js/element-list.js"></script>
    @endpush

    <div class="category-list-container w-full overflow-scroll">

        <livewire:category-list />

    </div>

</x-app-layout>