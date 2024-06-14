<x-layout>

    <div class="container mx-auto my-5 ">
        <div class="grid grid-cols-1 mx-auto px-5 gap-4 md:w-1/2">

            <div class="flex flex-1 justify-between items-center">
                <h2 class="text-lg md:text-xl font-bold" id="add-review-header">Add Review - Details</h2>
            </div>

            <hr>
            {{-- general form part - country/city etc  --}}
            @include('partials.add-review.general-details')

            {{-- pub review part of form  --}}
            @include('partials.add-review.pub-review')

            {{-- beer add and review  --}}
            @include('partials.add-review.beer-details')

        </div>
    </div>

</x-layout>
