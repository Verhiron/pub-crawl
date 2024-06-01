<nav class="flex px-5 py-3  m:w-100 md:w-1/2 mx-auto mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white filter-back-all">
                <svg class="w-4 h-4 me-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 8V17.75C5 19.5449 6.38674 21 8.09738 21H14.2921C16.0028 21 17.3895 19.5449 17.3895 17.75M17.3895 8V11.25M17.3895 8C17.3895 6.89543 16.1046 6 15 6C15 4.89543 14.1046 4 13 4C11.8954 4 11 4.89543 11 6V5C11 3.89543 10.1046 3 9 3C7.89543 3 7 3.89543 7 5C5.89543 5 5 5.89543 5 7V8.5H8V10.5C8 11.3284 8.67157 12 9.5 12C10.3284 12 11 11.3284 11 10.5V9H17.3895V8ZM17.3895 11.25V17.75M17.3895 11.25C20.8858 11.7595 20.8545 17.0431 17.3895 17.75" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="13" y1="13" x2="13" y2="17" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="9" y1="15" x2="9" y2="17" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                All
            </a>
        </li>
        @if(count($bread_crumbs_arr) > 0)
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" data-countryId="{{$bread_crumbs_arr[0]->country_id}}" class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white filter-back-country">{{$bread_crumbs_arr[0]->country}}</a>
                </div>
            </li>

            @if(isset($bread_crumbs_arr[0]->city_name))
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" data-cityId="{{$bread_crumbs_arr[0]->city_id}}" class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white filter-back-city">{{$bread_crumbs_arr[0]->city_name}}</a>
                    </div>
                </li>
            @endif

            @if(isset($bread_crumbs_arr[0]->pub_name))
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" data-pubId="{{$bread_crumbs_arr[0]->pub_id}}" class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white filter-back-pub">{{$bread_crumbs_arr[0]->pub_name}}</a>
                    </div>
                </li>
            @endif
        @endif
    </ol>
</nav>

<div class="sm:w-100 md:w-1/2 grid sm:grid-cols-1 md:grid-cols-3 mx-auto px-5 gap-4 ">
    @if(count($beers) > 0)
        @foreach ($beers as $beer)

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#" id="{{$beer->beer_id}}">
                    <img class="p-8 rounded-t-lg max-w-full h-80 mx-auto" src="{{$beer->image_url}}" alt="product image" />
                    <div class="px-5 pb-5 text-center border border-top py-3">
                        <h3>{{$beer->beer_name}}</h3>
                    </div>
                </a>

            </div>
        @endforeach
        @else
        <div>
            <h3>Nothing Found</h3>
        </div>
    @endif
</div>

