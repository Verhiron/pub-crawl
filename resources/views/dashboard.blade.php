<x-layout>
    <div class="container mx-auto my-5 ">
        <div class="grid grid-cols-1 mx-auto px-5 gap-4 md:w-1/2">
            <div class="flex flex-1 justify-between items-center">
                <h2 class="text-2xl font-bold">Reviews</h2>
                <a href="/add" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</a>
            </div>

            <hr>

{{--            <div class="flex max-w-full">--}}
{{--                <!-- Country Selector -->--}}
{{--                <select id="countries" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-black bg-white border border-black rounded-l-lg hover:bg-white">--}}
{{--                    <option selected disabled="disabled" value="0">Choose a country</option>--}}
{{--                        @foreach ($countries as $country)--}}
{{--                            <option value="{{$country->country_id}}">{{$country->country}}</option>--}}
{{--                        @endforeach--}}
{{--                </select>--}}

{{--                <!-- City Selector -->--}}
{{--                <select id="cities" class="bg-white border border-blue-900 text-black font-medium text-sm rounded-none border-l-0 border-r-0 dark:border-s-gray-700 block w-full p-2.5">--}}
{{--                    <option selected value="0" disabled="disabled">Choose a city</option>--}}
{{--                </select>--}}

{{--                <!-- Other Selector -->--}}
{{--                <select id="other" class="bg-white border border-blue-900 text-black font-medium text-sm rounded-r-lg border-l-0 block w-full p-2.5">--}}
{{--                    <option selected value="0" disabled="disabled">Choose an option</option>--}}
{{--                    @foreach ($countries as $country)--}}
{{--                        <option value="{{$country->country_id}}">{{$country->country}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

{{--            </div>--}}

            <div class="max-w-full flex flex-col md:flex-row sm:mx-auto">
                <!-- Country Selector -->
                <select id="countries" class="w-full md:w-auto mb-2 bg-white border border-blue-900 text-black font-medium text-sm sm:rounded-l-lg border-l-0 border-r-0 dark:border-s-gray-700 block w-full p-2.5">
                    <option selected disabled="disabled" value="0">Choose a country</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->country_id}}">{{$country->country}}</option>
                    @endforeach
                </select>

                <!-- City Selector -->
                <select id="cities" class="w-full md:w-auto mb-2 bg-white border border-blue-900 text-black font-medium text-sm sm:rounded-none border-l-0 border-r-0 dark:border-s-gray-700 block w-full p-2.5">
                    <option selected value="0" disabled="disabled">Choose a city</option>
                </select>

                <!-- Other Selector -->
                <select id="pubs" class="w-full md:w-auto mb-2 bg-white border border-blue-900 text-black font-medium text-sm sm:rounded-r-lg border-l-0 block w-full p-2.5">
                    <option selected value="0" disabled="disabled">Choose a pub</option>
                    <!-- Your foreach loop for options -->
                </select>
            </div>



            <div class="flex flex-1 justify-center">
                <button type="button" id="clear-search" class="text-gray-700 hover:text-black border border-gray-700 hover:bg-gray-300 focus:outline-none font-medium rounded-md text-sm px-4 py-2 text-center me-2 mb-2">Clear</button>
            </div>



            </div>

            <div class="p-4 sm:w-100 beer-list-view"></div>

        </div>


</x-layout>
