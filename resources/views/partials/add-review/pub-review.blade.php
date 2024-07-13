<div id="pub-review-section" class="hidden">

    <form id="pub-review-form">
        <div class="flex justify-between">
            <button id="back-general-section" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 focus:outline-none">Back</button>
            <button type="button" class="hidden to-beer-add-section text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
        </div>

        {{--  Atmosphere  --}}
        <label class="block mb-1 font-medium">Atmosphere/Vibe</label>
        <hr class="mb-2 w-1/2">
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
            <label for="pub-atmosphere-comments-input" class="block mb-1 font-medium dark:text-white">Additional Comments</label>
            <hr class="mb-2 w-1/2">
            <textarea id="pub-atmosphere-comments-input" name="pub-atmosphere-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>


        {{--  Aesthetic  --}}
        <label class="block mt-5 mb-1 font-medium">Aesthetic</label>
        <hr class="mb-2 w-1/2">
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
            <label for="pub-aesthetic-comments-input" class="block mb-1 font-medium dark:text-white">Additional Comments</label>
            <hr class="mb-2 w-1/2">
            <textarea id="pub-aesthetic-comments-input" name="pub-aesthetic-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--  Beer Selection  --}}
        <label class="block mt-5 mb-1 font-medium">Beer Selection</label>
        <hr class="mb-2 w-1/2">
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
            <label for="pub-beer-selection-comments-input" class="block mb-1 font-medium">Additional Comments</label>
            <hr class="mb-2 w-1/2">
            <textarea id="pub-beer-selection-comments-input" name="pub-beer-selection-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--    value    --}}
        <label class="block mt-5 mb-1 font-medium">Value <button data-tooltip-target="value-tooltip-top" data-tooltip-placement="top" type="button"><i class="fa fa-question-circle fa-sm text-gray-500" aria-hidden="true"></i></button>
        </label>
        <div id="value-tooltip-top" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Was the pub good value for money?
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <hr class="mb-2 w-1/2">
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="pub-value-rating-{{ $i }}" name="pub-value-rating" value="{{ $i }}" class="pub-value-rating-input hidden peer" />
                    <label for="pub-value-rating-{{ $i }}" class="pub-value-rating-{{ $i }} inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        <div id="pub-value-comments" class="mt-4 hidden">
            <label for="pub-value-comments-input" class="block mb-1 font-medium">Additional Comments</label>
            <hr class="mb-2 w-1/2">
            <textarea id="pub-value-comments-input" name="pub-value-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--  Furniture Sturdiness  --}}
        <label class="block mt-5 mb-1 font-medium">Furniture Sturdiness</label>
        <hr class="mb-2 w-1/2">
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
            <label for="pub-furniture-comments-input" class="block mb-1 font-medium">Additional Comments</label>
            <hr class="mb-2 w-1/2">
            <textarea id="pub-furniture-comments-input" name="pub-furniture-comments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>

        {{--  Toilet Cleanliness  --}}
        <label class="block mt-5 mb-1 font-medium">Toilet Cleanliness</label>
        <hr class="mb-2 w-1/2">
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
            <label for="pub-toilet-comments-input" class="block mb-1 font-medium">Additional Comments</label>
            <hr class="mb-2 w-1/2">
            <textarea id="pub-toilet-comments-input" name="pub-toilet-comments" class="bg-gray-50 border border-gray-300 font-medium rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>
        </div>



        <div class="text-right">
            <button type="button" class="hidden to-beer-add-section text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
        </div>
    </form>

</div>
