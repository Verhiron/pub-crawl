<x-layout>
    <div class="container mx-auto my-5 ">

        <div class="grid grid-cols-1 mx-auto px-5 gap-4 md:w-1/2">

            <div class="flex flex-1 justify-between items-center">
                <h2 class="text-2xl font-bold" id="add-review-header">Add Review - Details</h2>
            </div>

            <hr>


            <h2 class="text-lg font-lg text-center">Peroni</h2>
            <hr class="w-1/2 mx-auto">


            <form id="beer-review-form-1" class="beer-form">
                {{--  Serving Type  --}}
                <label class="block mb-2 text-md font-lg text-black">Serving Type</label>
                <ul class="grid w-full gap-6 md:grid-cols-3 my-5">
                    <li>
                        <input type="radio" id="serving-bottle" name="serving-type" value="bottle" class="hidden peer" />
                        <label for="serving-bottle" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                            <div class="block text-center mx-auto">
                                <div class="w-full text-lg font-semibold">Bottle</div>
                                <div class="w-full">Served in a glass bottle</div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="serving-draft" name="serving-type" value="draft" class="hidden peer" />
                        <label for="serving-draft" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                            <div class="block text-center mx-auto">
                                <div class="w-full text-lg font-semibold">Draft</div>
                                <div class="w-full">Served on tap directly</div>
                            </div>

                        </label>
                    </li>
                    <li>
                        <input type="radio" id="serving-can" name="serving-type" value="can" class="hidden peer" />
                        <label for="serving-can" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                            <div class="block text-center mx-auto">
                                <div class="w-full text-lg font-semibold">Can</div>
                                <div class="w-full">Served from a can</div>
                            </div>
                        </label>
                    </li>
                </ul>

                {{-- Served in correct glass? --}}
                <label class="block mb-2 text-md font-lg text-black mt-5">Served In The Correct Glass?</label>
                <ul class="grid w-full gap-6 md:grid-cols-2 mb-5">
                    <li>
                        <input type="radio" id="beer-review-correct-glass-yes" name="beer-review-correct-glass" value="yes" class="hidden peer" />
                        <label for="beer-review-correct-glass-yes" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                            <div class="block text-center mx-auto">
                                <div class="w-full text-lg font-semibold">Yes</div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="beer-review-correct-glass-no" name="beer-review-correct-glass" value="no" class="hidden peer" />
                        <label for="beer-review-correct-glass-no" class="inline-flex items-center justify-between w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                            <div class="block text-center mx-auto">
                                <div class="w-full text-lg font-semibold">No</div>
                            </div>

                        </label>
                    </li>
                </ul>

                {{-- Appearance --}}
                <label class="block mb-2 text-md font-lg text-black mt-5">Appearance</label>
                <ul class="grid grid-cols-6 gap-2">
                @for ($i = 0; $i <= 5; $i++)
                    <li>
                        <input type="radio" id="beer-review-rating-{{ $i }}" name="beer-review-appearance" value="{{ $i }}" class="pub-atmosphere-rating-input hidden peer" />
                        <label for="beer-review-rating-{{ $i }}" class="inline-flex items-center justify-center w-full p-5 text-black-500 bg-gray-200 border border-black rounded-lg cursor-pointer peer-checked:border-header-yellow peer-checked:text-sky-950 peer-checked:bg-sky-950 peer-checked:text-white hover:text-white hover:bg-sky-950">
                            <div class="block text-center mx-auto">
                                <div class="w-full text-lg font-semibold">{{ $i }}</div>
                            </div>
                        </label>
                    </li>
                @endfor
                </ul>
            </form>






        </div>
    </div>
</x-layout>
