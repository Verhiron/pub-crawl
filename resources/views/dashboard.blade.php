<x-layout>
    <div class="container mx-auto my-5">
        <div class="grid grid-cols-1  px-5 gap-4 md:w-3/3">
            <div class="md:w-2/3 md:mx-auto justify-between">
                <div class="flex flex-1 justify-between items-center">
                    <h2 class="text-2xl font-bold">Countries</h2>
                    <a href="/add" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Review</a>
                </div>

                <hr>
            </div>


            <div class="flex flex-col md:flex-row justify-center items-center gap-1" id="country-select">
                <div class="grid xs:grid-cols-1 md:grid-cols-5 gap-2">
                    @foreach ($countries as $country)
                        <a href="/country/{{ $country->iso_code }}" class="block w-full">
                            <div class="relative w-72 h-96 rounded-lg overflow-hidden hover:cursor-pointer transition-transform duration-500 ease-in-out transform md:hover:scale-105">
                                <div class="absolute inset-0">
                                    <img
                                        src="{{$country->country_img}}"
                                        alt="country image"
                                        class="w-full h-full object-cover rounded-lg"
                                    />
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-end p-4 rounded-lg">
                                        <h2 class="text-white text-2xl font-bold">{{ $country->country }}</h2>
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
