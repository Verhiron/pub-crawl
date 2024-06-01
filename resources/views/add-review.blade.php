<x-layout>
    <div class="container mx-auto my-5 ">
        <div class="grid grid-cols-1 mx-auto px-5 gap-4 md:w-1/2">
            <div class="flex flex-1 justify-between items-center">
                <h2 class="text-2xl font-bold ">Add Review</h2>
{{--                <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add</button>--}}
            </div>

            <hr>

            <div class="flex max-w-sm">
                <select id="countries" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-black bg-white border border-blue-900 focus:border-black rounded-s-lg hover:bg-white">
                    <option selected disabled="disabled" value="0">Choose a country</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->country_id}}">{{$country->country}}</option>
                    @endforeach
                </select>
            </div>

        </div>

    </div>
</x-layout>
