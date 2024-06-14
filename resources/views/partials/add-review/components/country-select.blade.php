<div class="mt-2" id="country-add-input">
    <label for="countries-add" class="block mb-2 text-md font-lg text-black">Country</label>
    <select id="countries-add" name="detail-country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Select a Country</option>
        @foreach ($countries as $country)
            <option value="{{$country->country_id}}">{{$country->country}}</option>
        @endforeach
    </select>
</div>
