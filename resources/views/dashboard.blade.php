@section('title')
    Dashboard
@endsection

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div>

                <div class="p-6 text-[2em] text-center">
                    Welcome {{ Auth::user()->name }}
                </div>

            </div>
        </div>
    </div>

    <div class="action-container max-w-7xl mx-auto px-6 pb-16 lg:px-8 flex flex-wrap items-center justify-center">

        <x-dashboard-card class="see-birds-action" link="/birds">
            Birds
        </x-dashboard-card>

        <x-dashboard-card class="add-bird-action" link="/create-bird">
            Add a bird
        </x-dashboard-card>

        <x-dashboard-card class="add-category-action" link="/categories">
            Categories
        </x-dashboard-card>

        <x-dashboard-card class="add-category-action" link="/create-category">
            Add a category
        </x-dashboard-card>

    </div>

</x-app-layout>
