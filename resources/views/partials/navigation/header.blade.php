{{--<nav class="bg-[#f2f2f2] border-b border-gray-400">--}}
{{--    <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4 ">--}}
{{--        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">--}}
{{--            <img id="main-header-img" data-src-1="{{ asset('images/king-kong.png') }}" data-src-2="{{ asset('images/i-want-that-one.png') }}" src="" class="h-8" />--}}
{{--            <span class="self-center text-2xl font-semibold whitespace-nowrap">Pub-Crawl</span>--}}
{{--        </a>--}}
{{--        <button data-collapse-toggle="navbar-default" type="button" class="focus:outline-none md:hidden">--}}
{{--            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--        <div class="hidden w-full md:block md:w-auto" id="navbar-default">--}}
{{--            <ul class="font-small flex flex-col md:flex-row p-4 md:p-0 mt-4  md:space-x-4 rtl:space-x-reverse md:mt-0 md:border-0">--}}
{{--                <li class="w-full md:w-32 underline underline-offset-4 {{ request()->is('/') ? "md:bg-sky-950 md:text-white":"md:no-underline " }} md:border-2 border-black py-1 md:hover:bg-sky-950 md:hover:text-white">--}}
{{--                    <a href="/" class="block py-2 rounded md:p-0 px-2 text-center" aria-current="page">Home</a>--}}
{{--                </li>--}}
{{--                <li class="w-full md:w-32 underline underline-offset-4 {{ request()->is('add') ? "md:bg-sky-950 md:text-white":"md:no-underline" }} md:border-2 border-black py-1 md:hover:bg-sky-950 md:hover:text-white">--}}
{{--                    <a href="/add" class="block py-2 rounded md:p-0 px-2 text-center">Add Review</a>--}}
{{--                </li>--}}
{{--                <li class="flex items-center justify-center">--}}
{{--                    <a href="#" id="show-params" data-modal-target="static-modal" data-modal-toggle="static-modal" class="block py-2 px-3 text-white-950 rounded md:p-0 text-center"><i class="fa-solid fa-gear"></i></a>--}}
{{--                </li>--}}
{{--            </ul>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--</nav>--}}

<nav class="bg-sky-950">
    <div class="max-w-screen-lg flex flex-wrap items-center justify-between mx-auto p-4 ">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
            <img id="main-header-img" data-src-1="{{ asset('images/king-kong.png') }}" data-src-2="{{ asset('images/i-want-that-one.png') }}" src="" class="h-8" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Pub-Crawl</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="focus:outline-none md:hidden text-[#f2f2f2]">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-small flex flex-col md:flex-row p-4 md:p-0 mt-4  md:space-x-4 rtl:space-x-reverse md:mt-0 md:border-0">
                <li class="w-full md:w-32 underline underline-offset-4 {{ request()->is('/') ? "":"md:no-underline " }} md:border-2 md:border-2 border-[#f2f2f2] py-1 text-[#f2f2f2] hover:underline rounded-md">
                    <a href="/" class="block py-2 rounded md:p-0 px-2 text-center" aria-current="page">Home</a>
                </li>
                <li class="w-full md:w-32 underline underline-offset-4 {{ request()->is('add') ? "":"md:no-underline" }} md:border-2 border-[#f2f2f2] py-1 text-[#f2f2f2] hover:underline rounded-md">
                    <a href="/add" class="block py-2 rounded md:p-0 px-2 text-center">Add Review</a>
                </li>
                <li class="flex items-center justify-center">
                    <a href="#" id="show-params" data-modal-target="static-modal" data-modal-toggle="static-modal" class="block py-2 px-3 text-[#f2f2f2] rounded md:p-0 text-center"><i class="fa-solid fa-gear"></i></a>
                </li>
            </ul>

        </div>

    </div>
</nav>

