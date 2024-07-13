<div class="mt-2" id="country-add-input">
    <label for="countries-add" class="block mb-1 text-md font-lg font-medium">Country</label>
    <hr class="mb-2 w-1/2">
    <select id="countries-add" name="detail-country" class="bg-gray-50 border border-gray-300 font-medium text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        <option selected>Select a Country</option>
        @foreach ($countries as $country)
            <option value="{{$country->country_id}}">{{$country->country}}</option>
        @endforeach
    </select>
</div>
