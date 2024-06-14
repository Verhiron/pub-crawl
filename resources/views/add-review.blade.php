<x-layout>

    <div class="container mx-auto my-5 ">

        <div class="grid grid-cols-1 mx-auto px-5 gap-4 md:w-1/2">

            <div class="flex flex-1 justify-between items-center">
                <h2 class="text-2xl font-bold" id="add-review-header">Add Review - Details</h2>
            </div>

            <hr>

            <form method="post" id="add-review-form">
                <!-- details -->
                <div id="details-section">
                    <div class="max-w-full">

                        <div class="mt-2" id="country-add-input">
                            <label for="countries-add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                            <select id="countries-add" name="detail-country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Select a Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->country_id}}">{{$country->country}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="my-2 hidden" id="city-add-input">
                            <!-- City Selector -->
                            <label for="cities-add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                            <select id="cities-add" name="detail-city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="0" disabled="disabled">Choose a City</option>
                            </select>
                        </div>

                        <div class="my-2 hidden" id="pub-input">
                            <!-- City Selector -->
                            <label for="pub-add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pub</label>
                            <select id="pub-add" name="detail-pub" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="0" disabled="disabled">Choose a Pub</option>
                            </select>
                        </div>


                        <div class="my-2 hidden" id="other-city-input">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other - City</label>
                            <input id="city-other" name="detail-other-city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter The City" />
                        </div>

                        <div class="my-2 hidden" id="other-pub-input">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other - Pub</label>
                            <input id="pub-other" name="detail-other-pub" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter A Pub" />
                        </div>


                        {{-- beer add container  --}}
                        <div class="relative overflow-x-auto shadow-md mt-3 hidden" id="beer-add-container">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="beer-table">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 w-2/3">
                                        Beer Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 w-1/3">
                                        Action
                                    </th>
                                    <th scope="col" colspan="2" class="pr-2 py-3">
                                        <button type="button" data-modal-target="beer-add-modal" data-modal-toggle="beer-add-modal" class="bg-blue-600 text-white px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">Add</button>
                                    </th>
                                </tr>
                                <tr>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div id="beer-add-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="beer-add-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 space-y-4">
                                        <div class="my-2" id="beer-add-input">
                                            <label for="beer-add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beer</label>
                                            <select id="beer-add" name="beer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected value="0" disabled="disabled">Choose a Beer</option>
                                            </select>
                                        </div>

                                        <div class="my-2 hidden" id="other-beer-input">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other - Beer</label>
                                            <input id="beer-other" name="other-beer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter A Pub" />
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex justify-between items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="beer-add-modal" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
                                        <button data-modal-hide="beer-add-modal" id="add-beer-btn" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- actual review -->
                <div id="pub-review-section" class="hidden">

                    <button id="back-1" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</button>

                    <div class="mt-2">
                        <hr class="my-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serving Type</label>
                        <ul class="grid w-full gap-6 md:grid-cols-3">
                            <li>
                                <input type="radio" id="serving-bottle" name="serving-type" value="bottle" class="hidden peer" />
                                <label for="serving-bottle" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                                    <div class="block text-center mx-auto">
                                        <div class="w-full text-lg font-semibold">Bottle</div>
                                        <div class="w-full">Served in a glass bottle</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="serving-draft" name="serving-type" value="draft" class="hidden peer" />
                                <label for="serving-draft" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                                    <div class="block text-center mx-auto">
                                        <div class="w-full text-lg font-semibold">Draft</div>
                                        <div class="w-full">Served on tap directly</div>
                                    </div>

                                </label>
                            </li>
                            <li>
                                <input type="radio" id="serving-can" name="serving-type" value="can" class="hidden peer" />
                                <label for="serving-can" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                                    <div class="block text-center mx-auto">
                                        <div class="w-full text-lg font-semibold">Can</div>
                                        <div class="w-full">Served from a can</div>
                                    </div>
                                </label>
                            </li>
                        </ul>

                        <div class="mt-2 text-right">
                            <button id="submit-new-review" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                        </div>

                    </div>
                </div>

            </form>

            <div id="form-container" class="my-3 hidden"></div>


            <div class="flex justify-between" id="beer-navigation">
                <button id="back-beer" type="button" class="hidden text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 focus:outline-none">Back</button>
                <button id="next-beer" type="button" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 focus:outline-none">Next</button>
            </div>

            <div class="text-right">
                <button id="generate-beer-forms" type="button" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
            </div>
        </div>

    </div>

    @push('scripts')
        @vite('resources/js/add-review.js')
    @endpush
</x-layout>
