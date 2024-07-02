<nav class="bg-sky-950">
    <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
            <img id="main-header-img" data-src-1="{{ asset('images/king-kong.png') }}" data-src-2="{{ asset('images/i-want-that-one.png') }}" src="" class="h-10" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Pub-Crawl</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-header-yellow rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-header-yellow" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 border border-header-yellow rounded-lg">
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

