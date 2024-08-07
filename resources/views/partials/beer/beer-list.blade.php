{{--<nav class="flex px-5 py-3  m:w-100 md:w-2/3 mx-auto mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">--}}
{{--    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">--}}
{{--        <li class="inline-flex items-center">--}}
{{--            <a href="#" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white filter-back-all">--}}
{{--                <svg class="w-4 h-4 me-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M5 8V17.75C5 19.5449 6.38674 21 8.09738 21H14.2921C16.0028 21 17.3895 19.5449 17.3895 17.75M17.3895 8V11.25M17.3895 8C17.3895 6.89543 16.1046 6 15 6C15 4.89543 14.1046 4 13 4C11.8954 4 11 4.89543 11 6V5C11 3.89543 10.1046 3 9 3C7.89543 3 7 3.89543 7 5C5.89543 5 5 5.89543 5 7V8.5H8V10.5C8 11.3284 8.67157 12 9.5 12C10.3284 12 11 11.3284 11 10.5V9H17.3895V8ZM17.3895 11.25V17.75M17.3895 11.25C20.8858 11.7595 20.8545 17.0431 17.3895 17.75" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    <line x1="13" y1="13" x2="13" y2="17" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    <line x1="9" y1="15" x2="9" y2="17" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                </svg>--}}
{{--                All--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @if(count($bread_crumbs_arr) > 0)--}}
{{--            <li>--}}
{{--                <div class="flex items-center">--}}
{{--                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
{{--                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>--}}
{{--                    </svg>--}}
{{--                    <a href="#" data-countryId="{{$bread_crumbs_arr[0]->country_id}}" class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white filter-back-country">{{$bread_crumbs_arr[0]->country}}</a>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            @if(isset($bread_crumbs_arr[0]->city_name))--}}
{{--                <li>--}}
{{--                    <div class="flex items-center">--}}
{{--                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>--}}
{{--                        </svg>--}}
{{--                        <a href="#" data-cityId="{{$bread_crumbs_arr[0]->city_id}}" class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white filter-back-city">{{$bread_crumbs_arr[0]->city_name}}</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            @if(isset($bread_crumbs_arr[0]->pub_name))--}}
{{--                <li>--}}
{{--                    <div class="flex items-center">--}}
{{--                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">--}}
{{--                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>--}}
{{--                        </svg>--}}
{{--                        <a href="#" data-pubId="{{$bread_crumbs_arr[0]->pub_id}}" class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white filter-back-pub">{{$bread_crumbs_arr[0]->pub_name}}</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    </ol>--}}
{{--</nav>--}}

<div class="sm:w-100 grid xs:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 px-5 gap-4">
    @if(count($beers) > 0)
        @foreach ($beers as $beer)
            <a href="#" id="{{$beer->beer_id}}">
            <div class="max-w-sm bg-gray-100 border rounded-lg shadow hover:bg-[#082F49]">
                    <img class="p-5 rounded-t-lg max-w-full h-80 mx-auto object-cover" src="{{$beer->image_url}}" alt="product image" />
            </div>
            <div class="px-1 pb-5 text-left py-1 text-black font-medium text-lg">
                <h3>{{$beer->beer_name}}</h3>
                <div class="flex">
                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                    <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                </div>
            </div>
            </a>
        @endforeach
    @else
        <div>
            <h3>Nothing Found</h3>
        </div>
    @endif
</div>



{{--<div class="sm:w-100 md:w-1/3 grid grid-cols-1 gap-4 sm:grid-cols-1 md:grid-cols-2 p-4 mx-auto">--}}
{{--    @if(count($beers) > 0)--}}
{{--        @foreach ($beers as $beer)--}}

{{--            <a href="#" id="{{$beer->beer_id}}">--}}
{{--                <div class="flex md:w-full items-center bg-teal-600 dark:bg-zinc-800 text-white dark:text-zinc-200 shadow-md rounded-lg">--}}
{{--                    <div class="bg-[#f8f8ff] px-2 mr-4">--}}
{{--                        <img src="{{$beer->image_url}}" alt="Product Image" class="h-32 w-32 object-cover rounded-lg p-0">--}}
{{--                    </div>--}}

{{--                    <div class="flex-1">--}}
{{--                        <div class="text-lg font-semibold">{{$beer->beer_name}}</div>--}}
{{--                        <span class="text-yellow-400 text-2xl">★★★★★</span>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </a>--}}

{{--        @endforeach--}}
{{--        @else--}}
{{--        <div>--}}
{{--            <h3>Nothing Found</h3>--}}
{{--        </div>--}}
{{--    @endif--}}
</div>

