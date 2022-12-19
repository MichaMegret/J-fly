@section('title')
    Home
@endsection

<x-guest-layout>

    <section class="top h-96 overflow-hidden w-full bg-cover bg-center flex items-center justify-center text-white" style="background-image: url(assets/images/home-image.webp)">

        <div class="bck-filter w-full h-96 bg-black opacity-30 absolute top-0 left-0"></div>

        @auth
            <a href="{{ url('/dashboard') }}" class="absolute top-[1em] right-[2em] underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="absolute top-[1em] right-[2em] underline">Log in</a>
        @endauth

        <div class="content flex flex-col align-center justify-start absolute">

            <div class="top-part flex align-center justify-start">
                <img src="/assets/images/app-logo-white.webp" alt="App logo" class="w-20 mr-6">
                <h1 class="text-[3em] flex items-center justify-center">
                    <div>J-Fly</div>
                </h1>
            </div>

            <div class="middle-part mt-6 flex flex-col w-4/5 min-w-[30em]">
                <h2 class="text-[2em]">A demo application using Laravel and Livewire</h2>
                <p class="text-xl w-11/12 mt-6">
                    Get a glimpse of my web developer skills through a basic application using Laravel and Livewire
                </p>
            </div>

        </div>

    </section>

    <section class="middle w-[60%] min-w-[40em] pl-16 m-auto mt-12">

        <div class="first-part">

            <h2 class="title text-[2em] font-bold">
                An overview of my skills
            </h2>

            <p class="content mt-6 text-[1em]">
                This project aims to show some of my Laravel development skills through simple examples. It aproach
                the main areas common to most modern applications such as setting up a database, user authentication, adding and deleting data... through a simple interface so that you can can judge how my code is organized. <br><br>
                The dynamic interface is managed with Livewire, a simple and powerful alternative to frameworks like Vue or React.
                The frontend is managed with Tailwind CSS, a low-level library allowing great flexibility. Alpine JS allows me to use javascript directly in markup through a minimalist and powerful tool.
            </p>

            <div class="actions flex items-center justify-center mt-16">

                <button class="bg-slate-400 hover:bg-slate-600 rounded px-[1em] py-[0.5em] text-white font-bold block w-44">
                    <a href="https://github.com/MichaMegret/j-fly" class="block">
                        See on Github
                    </a>
                </button>
    
                <button class="bg-emerald-400 hover:bg-emerald-600 rounded px-[1em] py-[0.5em] text-white font-bold ml-6 block w-44">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block">Get started</a>
                    @else
                        <a href="{{ route('login') }}" class="block">Get started</a>
                    @endauth
                </button>

            </div>


        </div>

    </section>

</x-guest-layout>