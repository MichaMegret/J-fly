<x-app-layout>
    
    @section('title')
        {{ 'Create category' }}
    @endsection

    @push('scripts')
        <script src="/assets/js/create-category.js"></script>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="/assets/css/create-category.css">
    @endpush

    <livewire:create-category />
    
</x-app-layout>