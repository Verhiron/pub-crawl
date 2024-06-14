<?php
/**
 * @array $beerList
 **/
$total_beers = count($beerList);
?>

<div id="beer-forms">
    <div class="flex justify-between">
        <button type="button" class="previous-beer-review-form text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 focus:outline-none">Back</button>
    </div>
    <?php foreach ($beerList as $index => $beer): ?>
    <form id="beer-review-form-<?php echo $index + 1; ?>" class="beer-form" style="<?php echo ($index == 0) ? '' : 'display: none;'; ?>">
        <h2 class="text-lg font-lg text-center"><?php echo $beer['beer_name']; ?></h2>
        <hr class="w-1/2 mx-auto">

        {{--  Serving Type  --}}
        <label class="block mb-2 text-md font-lg text-black">Serving Type</label>
        <ul class="grid w-full gap-6 md:grid-cols-3 my-5">
            <li>
                <input type="radio" id="serving-bottle-{{$index + 1}}" name="serving-type" value="bottle" class="hidden peer" />
                <label for="serving-bottle-{{$index + 1}}" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                    <div class="block text-center mx-auto">
                        <div class="w-full text-lg font-semibold">Bottle</div>
                        <div class="w-full">Served in a glass bottle</div>
                    </div>
                </label>
            </li>
            <li>
                <input type="radio" id="serving-draft-{{$index + 1}}" name="serving-type" value="draft" class="hidden peer" />
                <label for="serving-draft-{{$index + 1}}" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                    <div class="block text-center mx-auto">
                        <div class="w-full text-lg font-semibold">Draft</div>
                        <div class="w-full">Served on tap directly</div>
                    </div>

                </label>
            </li>
            <li>
                <input type="radio" id="serving-can-{{$index + 1}}" name="serving-type" value="can" class="hidden peer" />
                <label for="serving-can-{{$index + 1}}" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                    <div class="block text-center mx-auto">
                        <div class="w-full text-lg font-semibold">Can</div>
                        <div class="w-full">Served from a can</div>
                    </div>
                </label>
            </li>
        </ul>

        {{-- Served in correct glass? --}}
        <div class="correct-glass-section hidden">
            <label class="block mb-2 text-md font-lg text-black mt-5">Served In The Correct Glass?</label>
            <ul class="grid w-full gap-6 md:grid-cols-2 mb-5">
                <li>
                    <input type="radio" id="beer-review-correct-glass-yes-{{$index + 1}}" name="beer-review-correct-glass" value="yes" class="hidden peer" />
                    <label for="beer-review-correct-glass-yes-{{$index + 1}}" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">Yes</div>
                        </div>
                    </label>
                </li>
                <li>
                    <input type="radio" id="beer-review-correct-glass-no-{{$index + 1}}" name="beer-review-correct-glass" value="no" class="hidden peer" />
                    <label for="beer-review-correct-glass-no-{{$index + 1}}" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">No</div>
                        </div>

                    </label>
                </li>
            </ul>
        </div>

        {{-- Appearance --}}
        <label class="block mb-2 text-md font-lg text-black mt-5">Appearance</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="beer-review-appearance-{{$index + 1}}-{{ $i }}" name="beer-review-appearance" value="{{ $i }}" class="hidden peer" />
                    <label for="beer-review-appearance-{{$index + 1}}-{{ $i }}" class="inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        {{-- Taste --}}
        <label class="block mb-2 text-md font-lg text-black mt-5">Taste</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="beer-review-taste-{{$index + 1}}-{{ $i }}" name="beer-review-taste" value="{{ $i }}" class="hidden peer" />
                    <label for="beer-review-taste-{{$index + 1}}-{{ $i }}" class="inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        {{-- overall rating --}}
        <label class="block mb-2 text-md font-lg text-black mt-5">Overall Rating</label>
        <ul class="grid grid-cols-6 gap-2">
            @for ($i = 0; $i <= 5; $i++)
                <li>
                    <input type="radio" id="beer-review-overall-{{$index + 1}}-{{ $i }}" name="beer-review-overall" value="{{ $i }}" class="hidden peer" />
                    <label for="beer-review-overall-{{$index + 1}}-{{ $i }}" class="inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                        <div class="block text-center mx-auto">
                            <div class="w-full text-lg font-semibold">{{ $i }}</div>
                        </div>
                    </label>
                </li>
            @endfor
        </ul>

        {{-- Additional Comments --}}
        <label for="beer-review-additional-{{$index + 1}}" class="block mb-2 text-md font-lg text-black mt-5">Additional Comments</label>
        <textarea id="beer-review-additional-{{$index + 1}}" name="beer-review-additional-comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter additional comments"></textarea>

    </form>
    <?php endforeach; ?>


    <div class="text-right">
        @if($total_beers > 1)
            <button type="button" class="next-beer-review-form text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
        @else
            <button type="button" class="next-beer-review-form text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
        @endif
    </div>

</div>


