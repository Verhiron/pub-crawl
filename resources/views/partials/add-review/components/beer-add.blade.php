<div id="beer-add-section" class="hidden">
    <div class="text-left">
        <button id="back-pub-review-section" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 focus:outline-none">Back</button>
    </div>

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

    {{--    beer add modal    --}}
    @include('partials.add-review.components.beer-add-modal')

    <div class="text-right mt-2">
        <button id="generate-beer-forms" type="button" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
    </div>
</div>
