<x-app-layout>
    
    @section('title')
        {{ 'Update category' }}
    @endsection

    @push('scripts')
        <script src="/assets/js/update-category.js"></script>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="/assets/css/update-category.css">
    @endpush

    <livewire:update-category :category="$category"/>
    
</x-app-layout>