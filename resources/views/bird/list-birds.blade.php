<x-app-layout>

    @section('title')
        {{ 'Birds list' }}
    @endsection

    @push('scripts')
        <script src="/assets/js/bird-list.js"></script>
    @endpush

    @push('scripts')
        <script src="/assets/js/element-list.js"></script>
    @endpush

    <div class="bird-list-container w-full overflow-scroll">

        <livewire:bird-list />

    </div>

</x-app-layout>