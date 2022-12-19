<x-app-layout>

    @section('title')
        {{ 'Create bird' }}
    @endsection

    @push('scripts')
        <script src="/assets/js/create-bird.js"></script>
    @endpush

    <livewire:create-bird />

</x-app-layout>