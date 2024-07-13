<nav class="bg-sky-950">
    <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
            <img id="main-header-img" data-src-1="{{ asset('images/king-kong.png') }}" data-src-2="{{ asset('images/i-want-that-one.png') }}" src="" class="h-8" />
            <span class="self-center text-1xl font-semibold whitespace-nowrap text-white">Pub-Crawl</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="focus:outline-none text-header-yellow md:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-small flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 border border-header-yellow rounded-lg">
                <li>
                    <a href="/" class="block py-2 px-3 text-white rounded hover:text-header-yellow md:p-0 text-center" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/add" class="block py-2 px-3 text-white-950 rounded hover:text-header-yellow text-white md:p-0 text-center">Add Review</a>
                </li>
                <li>
                    <a href="#" id="show-params" data-modal-target="static-modal" data-modal-toggle="static-modal" class="block py-2 px-3 text-white-950 rounded hover:text-header-yellow text-white md:p-0 text-center"><i class="fa-solid fa-gear"></i></a>
                </li>
            </ul>
        </div>

    </div>
</nav>

