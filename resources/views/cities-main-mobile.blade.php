<x-layout>
    <div class="container mx-auto sm:my-5">

        <!-- Mobile View -->
            <div class="block lg:hidden flex flex-col">

                <div class="mb-4 border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center border border-sky-950">
                        <li class="w-1/2">
                            <button data-modal-target="city-select-modal" data-modal-toggle="city-select-modal" class="inline-block w-full p-4 border-b-2 rounded-t-lg text-center text-black">City Filter</button>
                        </li>
                        <li class="w-1/2">
                            <button data-modal-target="pub-select-modal" data-modal-toggle="pub-select-modal" class="inline-block w-full p-4 border-b-2 rounded-t-lg text-center text-black ">Pub Filter</button>
                        </li>
                    </ul>
                </div>

                <div id="city-select-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    City Filter
                                </h3>
                                <button type="button" class="absolute top-3 end-2.5 text-white bg-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="city-select-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="p-4 my-2">
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

                        </div>
                    </div>
                </div>

                <div id="pub-select-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between p-4 border-b rounded-t">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Pub Filter
                                </h3>
                                <button type="button" class="absolute top-3 end-2.5 text-white bg-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="pub-select-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="p-4 my-2">
                                <div class="relative mb-6">
                                    <input type="text" placeholder="Search Pubs" class="pubSearch w-full p-2 px-3 font-medium text-black border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <button class="clearSearch absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                                        &times;
                                    </button>
                                </div>
                                <ul class="pubList space-y-4"></ul>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Placeholder for Beer List View -->
                <div class="w-full beer-list-view"></div>
            </div>

@push('scripts')
    @vite('resources/js/city-main.js')
@endpush
</x-layout>
