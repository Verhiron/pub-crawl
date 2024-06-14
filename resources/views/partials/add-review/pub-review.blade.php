<div id="pub-review-section" class="hidden">

    <form id="pub-review-form">
        <div class="flex justify-between">
            <button id="back-general-section" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 focus:outline-none">Back</button>
            <button type="button" class="hidden to-beer-add-section text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
        </div>

        {{--  Atmosphere  --}}
        <label class="block mb-2 text-md font-lg text-black">Atmosphere/Vibe</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="pub-atmosphere-rating-{{ $i }}" name="pub-atmosphere-rating" value="{{ $i }}" class="pub-atmosphere-rating-input hidden peer" />
                    <label for="pub-atmosphere-rating-{{ $i }}" class="inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        <div id="pub-atmosphere-comments" class="mt-4 hidden">
            <label for="pub-atmosphere-comments-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Comments</label>
            <textarea id="pub-atmosphere-comments-input" name="pub-atmosphere-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>


        {{--  Aesthetic  --}}
        <label class="block mt-5 mb-2 text-md font-lg text-black">Aesthetic</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="pub-aesthetic-rating-{{ $i }}" name="pub-aesthetic-rating" value="{{ $i }}" class="pub-aesthetic-rating-input hidden peer" />
                    <label for="pub-aesthetic-rating-{{ $i }}" class="pub-aesthetic-rating-{{ $i }} inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        <div id="pub-aesthetic-comments" class="mt-4 hidden">
            <label for="pub-aesthetic-comments-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Comments</label>
            <textarea id="pub-aesthetic-comments-input" name="pub-aesthetic-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--  Beer Selection  --}}
        <label class="block mt-5 mb-2 text-md font-lg text-black">Beer Selection</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="pub-beer-selection-rating-{{ $i }}" name="pub-beer-selection-rating" value="{{ $i }}" class="pub-beer-selection-rating-input hidden peer" />
                    <label for="pub-beer-selection-rating-{{ $i }}" class="pub-aesthetic-rating-{{ $i }} inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        <div id="pub-beer-selection-comments" class="mt-4 hidden">
            <label for="pub-beer-selection-comments-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Comments</label>
            <textarea id="pub-beer-selection-comments-input" name="pub-beer-selection-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--  Furniture Sturdiness  --}}
        <label class="block mt-5 mb-2 text-md font-lg text-black">Furniture Sturdiness</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="pub-furniture-rating-{{ $i }}" name="pub-furniture-rating" value="{{ $i }}" class="pub-furniture-rating-input hidden peer" />
                    <label for="pub-furniture-rating-{{ $i }}" class="pub-aesthetic-rating-{{ $i }} inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        <div id="pub-furniture-comments" class="mt-4 hidden">
            <label for="pub-furniture-comments-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Comments</label>
            <textarea id="pub-furniture-comments-input" name="pub-furniture-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--  Toilet Cleanliness  --}}
        <label class="block mt-5 mb-2 text-md font-lg text-black">Toilet Cleanliness</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="pub-toilet-rating-{{ $i }}" name="pub-toilet-rating" value="{{ $i }}" class="pub-toilet-rating-input hidden peer" />
                    <label for="pub-toilet-rating-{{ $i }}" class="pub-toilet-rating-{{ $i }} inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        <div id="pub-toilet-comments" class="mt-4 hidden">
            <label for="pub-toilet-comments-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Comments</label>
            <textarea id="pub-toilet-comments-input" name="pub-toilet-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>



        <div class="text-right">
            <button type="button" class="hidden to-beer-add-section text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
        </div>
    </form>

</div>
