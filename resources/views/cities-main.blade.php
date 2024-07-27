<x-layout>

    <div class="container xl:block mx-auto relative overflow-hidden bg-cover bg-center h-32 xl:h-64" style="background-image: url('{{$country_data->country_img}}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white text-center">
            <h1 class="text-2xl xl:text-4xl font-bold text-[#f2f2f2]">{{ $country_data->country }}</h1>
        </div>
    </div>

    <div class="container mx-auto my-5">

        <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:mx-10 ">

            {{--        mobile view filter    --}}
            <div class="flex flex-col xl:hidden w-full xl:mb-4">

                <ul class="font-small flex flex-row px-2 p-0 justify-between mt-0 border-0 items-center">
                    <li class="w-1/2 border mx-1 border-sky-950 py-1 rounded-md">
                        <button class="flex items-center justify-between w-full py-2 px-2 filter-count-mobile" aria-current="page" data-modal-target="pub-filter-modal" data-modal-toggle="pub-filter-modal">
                            <span id="filter-header" class="text-gray-800">Filter</span>
                            <span id="filter-count-span" class="hidden bg-sky-950 px-2 rounded-md text-white">1</span>
                            <svg id="filter-icon" class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                            </svg>
                        </button>
                    </li>

                    <li class="w-1/2 mx-1 mx-1 py-1">
                        <select class="sort-by-list w-1/4 bg-[#e7e5e5] w-full py-3 px-2 border border-sky-950 focus:outline-none focus:border-gray-500 focus:ring-0 rounded-md focus:rounded-b-none">
                            <option value="mp" selected>
                                Most Popular
                            </option>
                            <option value="hr">
                                Highest Rated
                            </option>
                        </select>
                    </li>
                </ul>

            </div>

            {{--     mobile view filter       --}}
            <div id="pub-filter-modal" tabindex="-1" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 ">
                <div class="relative w-full h-full flex items-center justify-center px-3">
                    <div class="relative p-4 w-full max-w-lg h-auto bg-white rounded-lg shadow-lg">
                        <div class="relative flex flex-col h-full max-h-screen">
                            <div class="flex items-center justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Filter</h3>
                                <button type="button" class="absolute top-3 end-2.5 text-white bg-red-600 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-hide="pub-filter-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="my-3 flex-1 p-4 overflow-y-auto">
                                <h3 class=" font-bold text-gray-900">Search Pubs</h3>
                                <div class="relative w-full my-2">
                                    <input type="text" placeholder="Search Pubs" class="pub-search-mobile w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-1 focus:border-sky-950 pr-10">
                                    <button class="clearSearchMobile absolute right-2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                                        &times;
                                    </button>
                                </div>

                                <h3 class="my-3 font-bold text-gray-900">Rating</h3>
                                <ul class="flex items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                                    <!-- Any Checkbox -->
                                    <li class="relative flex items-center flex-1 border-b border-gray-200 sm:border-b-0 sm:border-r rounded-lg">
                                        <input id="overall-rating-checkbox-any-mobile" value="any" type="checkbox" class="pub-overall-rating-select-mobile overall-rating-checkbox-any peer hidden">
                                        <label for="overall-rating-checkbox-any-mobile" class="relative flex items-center justify-center w-full h-full px-2 py-3 text-sm font-medium cursor-pointer bg-gray-200 text-gray-900 rounded-l-lg peer-checked:bg-sky-950 peer-checked:text-white">
                                            <span class="font-bold text-1xl">Any</span>
                                        </label>
                                    </li>
                                    <!-- Rating Checkboxes -->
                                    @for ($stars = 3; $stars <= 5; $stars++)
                                        <li class="relative flex items-center flex-1 border-b border-gray-200 sm:border-b-0 sm:border-r rounded-lg peer">
                                            <input id="overall-rating-checkbox-mobile-{{ $stars }}" type="checkbox" value="{{ $stars }}" name="list-checkbox" class="pub-overall-rating-select-mobile peer hidden">
                                            <label for="overall-rating-checkbox-mobile-{{ $stars }}" class="relative flex items-center justify-center w-full h-full px-2 py-3 text-sm font-medium cursor-pointer peer-checked:bg-sky-950 peer-checked:text-white">
                                                <span class="font-bold text-1xl">{{ $stars }}</span>
                                                <svg class="w-5 h-5 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                                </svg>
                                            </label>
                                        </li>
                                    @endfor
                                </ul>

                                <div class="my-3 flex justify-between items-end">
                                    <h3 class="font-bold text-gray-900 ">City</h3>
                                    <a class="underline underline-offset-2 reset-city-selection-mobile hover:cursor-pointer"><small>Reset City Selection</small></a>
                                </div>

                                <select name="city" class="city-selection-mobile mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-1 focus:border-sky-950 sm:text-sm">
                                    <option selected disabled>Select a City</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->city_id }}" data-city-name="{{ $city->city_name }}">
                                            {{ $city->city_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex justify-between p-4 border-t items-center">
                                <a class="underline underline-offset-2 reset-filters-mobile">Clear Filters</a>
                                <button class="mobile-apply-filters bg-sky-950 py-2 px-5 border border-gray-500 text-white rounded-md">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Desktop Sidebar -->
            <div class="flex-col desktop hidden xl:flex rounded-lg shadow-md border bg-gray-50 w-1/4 p-3">
                <div class="flex justify-end">
                    <button class="underline underline-offset-2 reset-filters-desktop">Clear Filters</button>
                </div>

                <h3 class="my-2 font-bold text-gray-900">Search Pubs</h3>
                <div class="relative w-full mb-2">
                    <input type="text" placeholder="Search Pubs" class="pub-search-desktop w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-1 focus:border-sky-950 pr-10">
                    <button class="clearSearchDesktop absolute right-2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                        &times;
                    </button>
                </div>

                <button class="hidden apply-button flex flex items-center justify-center bg-[#e7e5e5] w-full py-1 px-5 border rounded-md border-gray-500 bg-sky-950 text-[#e7e5e5] mt-1">Apply</button>

                <h3 class="my-2 font-bold text-gray-900">Rating</h3>
                <ul class="flex items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg mb-2">
                    <!-- Any Checkbox -->
                    <li class="relative flex items-center flex-1 border-b border-gray-200 sm:border-b-0 sm:border-r rounded-lg">
                        <input id="overall-rating-checkbox-any-desktop" value="any" type="checkbox" class="pub-overall-rating-select-desktop overall-rating-checkbox-any peer hidden">
                        <label for="overall-rating-checkbox-any-desktop" class="relative flex items-center justify-center w-full h-full px-2 py-3 text-sm font-medium cursor-pointer bg-gray-200 text-gray-900 rounded-l-lg peer-checked:bg-sky-950 peer-checked:text-white">
                            <span class="font-bold text-1xl">Any</span>
                        </label>
                    </li>
                    <!-- Rating Checkboxes -->
                    @for ($stars = 3; $stars <= 5; $stars++)
                        <li class="relative flex items-center flex-1 border-b border-gray-200 sm:border-b-0 sm:border-r rounded-lg peer">
                            <input id="overall-rating-checkbox-desktop-{{ $stars }}" type="checkbox" value="{{ $stars }}" name="list-checkbox" class="pub-overall-rating-select-desktop peer hidden">
                            <label for="overall-rating-checkbox-desktop-{{ $stars }}" class="relative flex items-center justify-center w-full h-full px-2 py-3 text-sm font-medium cursor-pointer peer-checked:bg-sky-950 peer-checked:text-white">
                                <span class="font-bold text-1xl">{{ $stars }}</span>
                                <svg class="w-5 h-5 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            </label>
                        </li>
                    @endfor
                </ul>


                <div class="my-2 flex justify-between items-end">
                    <h3 class="font-bold text-gray-900 ">City</h3>
                    <a class="underline underline-offset-2 reset-city-selection-desktop hover:cursor-pointer"><small>Reset City Selection</small></a>
                </div>
                <select name="city" class="city-selection-desktop mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm focus:outline-none focus:ring-1 focus:border-sky-950">
                    <option selected disabled>Select a City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->city_id }}" data-city-name="{{ $city->city_name }}">
                            {{ $city->city_name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="xl:w-3/4 xl:px-10 flex flex-col m-4 xl:m-0">
                {{--       sort by and results count desktop         --}}
                <div class="md:flex flex-col w-full mb-2 xl:mb-4">

                    <ul class="font-small flex flex-row p-0 justify-between mt-0 border-0">
                        <li class="flex items-end">
                            <small>Showing {{ $pagination['from'] }}-{{ $pagination['to'] }} of {{ $pagination['total'] }} results</small>
                        </li>

                        <li class="hidden md:flex w-1/4 border mx-1 py-1">
                            <select class="sort-by-list w-1/4 bg-[#e7e5e5] w-full py-3 px-2 focus:outline-none focus:border-gray-500 focus:ring-0 rounded-md focus:rounded-b-none">
                                <option value="mp" selected>
                                    Most Popular
                                </option>
                                <option value="hr">
                                    Highest Rated
                                </option>
                            </select>
                        </li>
                    </ul>

                </div>

                @foreach($pub_data as $pub)

                    @php
                        $maxRating = 5;
                        $overall_rating = $pub->overall_rating;
                        $fullStars = floor($overall_rating);
                        $halfStar = $overall_rating - $fullStars >= 0.5;
                        $emptyStars = $maxRating - $fullStars - ($halfStar ? 1 : 0);
                    @endphp

                    <a href="" class="w-full md:flex md:flex-row mb-4 shadow-md bg-gray-50 rounded-md md:hover:shadow-xl">

                        <!-- Image Section -->
                        <div class="w-full md:w-1/4 flex flex-col items-center justify-center md:mr-5 p-0">
                            <img class="object-cover rounded-t-lg md:rounded-none md:rounded-l-lg w-full" src="https://www.discoverjq.co.uk/wp-content/uploads/2022/06/RollingMill_Christmas-32-580x408.jpg" alt="">
                        </div>

                        <!-- Content Section -->
                        <div class="w-full md:w-3/4 flex flex-col mt-3 md:mt-2">
                            <!-- Header -->
                            <div class="flex p-2 md:border-b border-gray-300">
                                <div class="w-1/2 flex justify-center items-center md:justify-start border-r border-gray-300 md:border-r-0">
                                    <h5 class="text-md md:text-lg font-bold overflow-hidden whitespace-nowrap text-ellipsis">{{ $pub->pub_name }}</h5>
                                </div>
                                <div class="w-1/2 flex flex-col items-center justify-center md:flex-row md:justify-end">
                                    <small class="md:mt-1 text-gray-600">{{ number_format($pub->overall_rating, 1) }}</small>
                                    <div class="flex flex-row md:mx-1 items-center">
                                        @for($i = 1; $i <= $fullStars; $i++)
                                            <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                            </svg>
                                        @endfor

                                        @if($halfStar)
                                            <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20" fill="currentColor">
                                                <defs>
                                                    <clipPath id="half-star-left-1">
                                                        <rect width="50%" height="100%" x="0" y="0"/>
                                                    </clipPath>
                                                    <clipPath id="half-star-right-1">
                                                        <rect width="50%" height="100%" x="11" y="0"/>
                                                    </clipPath>
                                                </defs>
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" clip-path="url(#half-star-left-1)"/>
                                                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20" fill="currentColor" style="position: absolute; margin-left: -1em;">
                                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" clip-path="url(#half-star-right-1)"/>
                                                </svg>
                                            </svg>

                                        @endif

                                        @for($i = 1; $i <= $emptyStars; $i++)
                                            <svg class="w-4 h-4 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <small class=" md:mt-1 text-gray-600">({{ $pub->review_count }} reviews)</small>
                                </div>
                            </div>


                            <!-- Info Section -->
                            <div class="mt-3 info-section hidden md:flex flex-wrap border-t border-gray-200 md:border-none">
                                <div class="w-1/2 md:w-1/3 p-2 border-r border-gray-300">
                                    <small class="block text-gray-500 text-center">City</small>
                                    <hr>
                                    <div class="text-center overflow-hidden whitespace-nowrap text-ellipsis">
                                        {{ $pub->city_name }}
                                    </div>
                                </div>
                                <div class="w-1/2 md:w-1/3 p-2 border-r border-gray-300">
                                    <small class="block text-gray-500 text-center">Key Feature</small>
                                    <hr>
                                    <div class="text-center overflow-hidden whitespace-nowrap text-ellipsis">
                                        {{ $pub->key_feature }}
                                    </div>
                                </div>
                                <div class="w-1/2 md:w-1/3 p-2 border-r border-gray-300 xl:border-r-none">
                                    <small class="block text-gray-500 text-center">Signature Pour</small>
                                    <hr>
                                    <div class="text-center overflow-hidden whitespace-nowrap text-ellipsis">
                                        {{ $pub->signature_pour }}
                                    </div>
                                </div>
                            </div>



                            <button class="text-gray-500 focus:outline-none toggle-btn flex justify-center md:hidden mt-2 py-1 bg-sky-950 text-white rounded-b-lg">
                                <svg class="w-6 h-6 arrow-icon down-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                <svg class="w-6 h-6 arrow-icon up-arrow hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                </svg>
                            </button>

                        </div>
                    </a>


                @endforeach

                @php
                    $currentPage = $pagination['current_page'];
                    $lastPage = $pagination['last_page'];
                    $total = $pagination['total'];
                    $baseUrl = url()->current();
                @endphp

                <nav aria-label="page navigation" class="flex">
                    <ul class="inline-flex -space-x-px text-base h-10 w-full justify-between">
                        {{-- Previous Button --}}
                        <li>
                            <a href="{{ $currentPage > 1 ? $baseUrl . '?' . http_build_query(array_merge(request()->query(), ['page' => $currentPage - 1])) : '#' }}"
                               class="pagination-button flex w-32 items-center justify-center rounded-md bg-[#e7e5e5] py-2 px-5 border border-gray-500 {{ $currentPage === 1 ? 'cursor-not-allowed disabled opacity-50' : 'bg-sky-950 text-[#e7e5e5]' }}"
                               @if($currentPage === 1) aria-disabled="true" @endif>
                                Previous
                            </a>
                        </li>
                        <li>
                            <a href="{{ $currentPage < $lastPage ? $baseUrl . '?' . http_build_query(array_merge(request()->query(), ['page' => $currentPage + 1])) : 'javascript:void(0);' }}"
                               class="pagination-button flex items-center justify-center rounded-md bg-[#e7e5e5] w-32 py-2 px-5 border border-gray-500 {{ $currentPage === $lastPage ? 'cursor-not-allowed disabled opacity-50' : 'bg-sky-950 text-[#e7e5e5]' }}"
                               @if($currentPage === $lastPage) aria-disabled="true" @endif>
                                Next
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>



    @push('scripts')
        @vite('resources/js/city-main.js')
    @endpush
</x-layout>

