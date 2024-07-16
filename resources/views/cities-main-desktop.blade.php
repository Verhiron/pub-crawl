<x-layout>
    <div class="hidden sm:flex relative bg-gray-800 h-48 md:h-40 items-center justify-center ">
        <img src="{{$country_img}}" alt="Country Image" class="absolute inset-0 w-full h-full object-cover opacity-50" >
        <div class="relative z-10 text-center">
            <h1 class="text-2xl md:text-4xl font-bold text-white">{{$country}}</h1>
        </div>
    </div>

    <div class="container mx-auto sm:my-5">

    <!-- Desktop View -->
    <div class="hidden lg:flex flex-row">
        <!-- Cities List Container -->
        <div class="w-1/4 border overflow-y-auto h-screen rounded-lg shadow-md">

            <div class="mb-4 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-black border-sky-950" data-tabs-inactive-classes="text-black border-gray-100 hover:border-sky-950" role="tablist">
                    <li class="w-1/2" role="presentation">
                        <button class="inline-block w-full p-4 border-b-2 rounded-t-lg text-center" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">City</button>
                    </li>
                    <li class="w-1/2" role="presentation">
                        <button class="inline-block w-full p-4 border-b-2 rounded-t-lg text-center hover:border-sky-950" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Pubs</button>
                    </li>
                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="relative mb-6">
                        <input type="text" placeholder="Search cities" class="citySearch w-full p-2 px-3 font-medium text-black border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="clearSearch absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                            &times;
                        </button>
                    </div>
                    <ul id="cityList" class="space-y-4">
                        @foreach($cities as $city)
                            <li class="city-selection bg-gray-200 border-2 border-gray-300 p-4 rounded-md font-medium cursor-pointer hover:border-[#082F49] transition-all duration-300 ease-in-out" data-city-name="{{ $city->city_name }}" data-city-id="{{ $city->city_id }}">
                                {{$city->city_name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="relative mb-6">
                        <input type="text" placeholder="Search Pubs" class="pubSearch w-full p-2 px-3 font-medium text-black border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="clearPubSearch absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                            &times;
                        </button>
                    </div>
                    <ul class="pubList space-y-4"></ul>
                </div>
            </div>



        </div>

        <!-- Placeholder for Beer List View -->
        <div class="w-3/4 beer-list-view"></div>
    </div>


@push('scripts')
    @vite('resources/js/city-main.js')
@endpush
</x-layout>
