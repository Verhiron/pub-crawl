<div id="details-section">
    <div class="max-w-full">
        <form id="details-form">
            {{--    country select box    --}}
            @include('partials.add-review.components.country-select')

            {{--   city select box    --}}
            @include('partials.add-review.components.city-select')

            {{--   pub select box    --}}
            @include('partials.add-review.components.pub-select')

            {{--   other city input box    --}}
            @include('partials.add-review.components.other-city-select')

            {{--   other pub input box    --}}
            @include('partials.add-review.components.other-pub-select')
        </form>

        <div class="text-right">
            <button id="to-pub-review-section" type="button" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Next</button>
        </div>

    </div>
</div>



@push('scripts')
    @vite('resources/js/add-review-v2.js')
@endpush



