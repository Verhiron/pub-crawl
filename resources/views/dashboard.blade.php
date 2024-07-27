<x-layout>
    <div class="container mx-auto my-5">
        <div class="grid grid-cols-1 px-5 gap-4 md:w-3/3">
            <div class="md:w-2/3 md:mx-auto">
                <div class="flex flex-1 justify-between items-center mb-2">
                    <h2 class="text-2xl font-bold ">Countries</h2>
                    <!-- Search box for md and larger screens -->
                    <div class="hidden md:block relative w-full sm:w-3/4 md:w-2/3 lg:w-1/3 ">
                        <input type="text" placeholder="Search Countries" class="countrySearch w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 pr-10">
                        <button class="clearSearch absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                            &times;
                        </button>
                    </div>
                    <!-- Uncomment the following line if you want the Add Review button to be visible -->
                    <a href="/add" type="button" class="focus:outline-none md:hidden text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Review</a>
                </div>

                <hr class="my-4 border-white">

                <!-- Search box for mobile screens -->
                <div class="relative flex justify-center my-3 md:hidden">
                    <div class="relative w-full sm:w-3/4 md:w-2/3 lg:w-1/2">
                        <input type="text" placeholder="Search Countries" class="countrySearch w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 pr-10">
                        <button class="clearSearch absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none text-2xl">
                            &times;
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-center gap-1 mt-3" id="country-select">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($countries as $country)
                        <a href="/country/{{ $country->iso_code }}" class="block w-full country-selection" data-country-name="{{ $country->country }}">
                            <div class="relative w-full h-72 rounded-lg overflow-hidden hover:cursor-pointer transition-transform duration-500 ease-in-out transform md:hover:scale-105">
                                <div class="absolute inset-0">
                                    <img
                                        src="{{$country->country_img}}"
                                        alt="country image"
                                        class="w-full h-full object-cover rounded-lg"
                                    />
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-end p-4 rounded-lg">
                                        <h2 class="text-[#f2f2f2] text-xl md:text-2xl font-bold">{{ $country->country }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>


        </div>
    </div>

    @push('scripts')
        @vite('resources/js/dashboard.js')
    @endpush
</x-layout>
