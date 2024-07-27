{{--       sort by and results count desktop         --}}
<div class="hidden md:flex flex-col w-full mb-4">

    <ul class="font-small flex flex-row p-0 justify-between mt-0 border-0">
        <li class="flex items-end">
            <small>Showing {{ $pagination['from'] }}-{{ $pagination['to'] }} of {{ $pagination['total'] }} results</small>
        </li>

        <li class="w-1/4 border mx-1 py-1">
            <select class="sort-by-list w-1/4 bg-[#e7e5e5] w-full py-3 px-2 focus:outline-none focus:border-gray-500 focus:ring-0">
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

    <a href="" class="w-full md:flex md:flex-row mb-4 shadow-md bg-gray-50 rounded-lg md:hover:shadow-xl">

        <!-- Image Section -->
        <div class="w-full md:w-1/4 flex flex-col items-center justify-center md:mr-5 p-2 md:p-0">
            <img class="object-cover rounded-lg md:rounded-none md:rounded-l-lg w-full" src="https://www.discoverjq.co.uk/wp-content/uploads/2022/06/RollingMill_Christmas-32-580x408.jpg" alt="">
        </div>

        <!-- Content Section -->
        <div class="w-full md:w-3/4 flex flex-col mt-3 md:mt-2">
            <!-- Header -->
            <div class="flex p-2 md:border-b border-gray-300">
                <div class="w-1/2 flex justify-center items-center md:justify-start border-r border-gray-300 md:border-r-0">
                    <h5 class="text-lg font-bold overflow-hidden whitespace-nowrap text-ellipsis">{{ $pub->pub_name }}</h5>
                </div>
                <div class="w-1/2 flex flex-col items-center justify-center md:flex-row md:justify-end">
                    <small class="md:mt-1 text-gray-600">{{ $pub->overall_rating }}</small>
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
                <div class="w-1/2 md:w-1/3 p-2 ">
                    <small class="block text-gray-500 text-center">Signature Pour</small>
                    <hr>
                    <div class="text-center overflow-hidden whitespace-nowrap text-ellipsis">
                        {{ $pub->signature_pour }}
                    </div>
                </div>
                {{--                            <div class="w-1/2 md:w-1/4 p-2">--}}
                {{--                                <small class="block text-gray-500 text-center">Category 4</small>--}}
                {{--                                <hr>--}}
                {{--                                <div class="text-center">--}}
                {{--                                    Content 4--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
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
@endphp

<nav aria-label="page navigation" class="flex justify-center md:justify-end">
    <ul class="inline-flex -space-x-px text-base h-10">
        {{-- Previous Button --}}
        <li>
            <button
               class="pagination-button flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-sky-950 hover:text-white"
               @if($currentPage > 1) data-page="{{ $currentPage - 1 }}" @endif
               @if($currentPage === 1) aria-disabled="true" class="cursor-not-allowed opacity-50" @endif>
                Previous
            </button>
        </li>

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $lastPage; $i++)
            <li>
                <button
                   class="pagination-button flex items-center justify-center px-4 h-10 leading-tight {{ $i == $currentPage ? 'text-white bg-sky-950' : 'text-gray-500 bg-white hover:bg-gray-200 hover:text-gray-700' }}  border border-gray-300 "
                   data-page="{{ $i }}"
                   @if($i == $currentPage) aria-current="page" @endif>
                    {{ $i }}
                </button>
            </li>
        @endfor

        {{-- Next Button --}}
        <li>
            <button
               class="pagination-button flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-e-lg hover:bg-sky-950 hover:text-white"
               @if($currentPage < $lastPage) data-page="{{ $currentPage + 1 }}" @endif
               @if($currentPage === $lastPage) aria-disabled="true" class="cursor-not-allowed opacity-50" @endif>
                Next
            </button>
        </li>
    </ul>
</nav>
