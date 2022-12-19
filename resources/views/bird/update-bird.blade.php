<x-app-layout>

    @section('title')
        {{ 'Create bird' }}
    @endsection

    @push('scripts')
        <script src="/assets/js/update-bird.js"></script>
    @endpush

    <livewire:update-bird :bird="$bird"/>

</x-app-layout>