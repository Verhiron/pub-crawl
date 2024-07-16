<x-layout>
<?php

//pub details
$pub_name = $reviews["pub_review"]->pub;
$country = $reviews["pub_review"]->country;
$city = $reviews["pub_review"]->city;
$created_at = $reviews["pub_review"]->created_at;
$date = new DateTime($created_at);
$atmosphere_rating = $reviews["pub_review"]->atmosphere_rating;
$aesthetic_rating = $reviews["pub_review"]->aesthetic_rating;
$beer_selection_rating = $reviews["pub_review"]->beer_selection_rating;
$value_rating = $reviews["pub_review"]->value_rating;
$furniture_rating = $reviews["pub_review"]->furniture_rating;
$toilet_rating = $reviews["pub_review"]->toilet_rating;

$atmosphere_comments = (strtolower($reviews["pub_review"]->atmosphere_comments !== "null")) ? $reviews["pub_review"]->atmosphere_comments : "";
$aesthetic_comments = (strtolower($reviews["pub_review"]->aesthetic_comments !== "null")) ? $reviews["pub_review"]->aesthetic_comments : "";
$beer_selection_comments = (strtolower($reviews["pub_review"]->beer_selection_comments !== "null")) ? $reviews["pub_review"]->beer_selection_comments : "";
$value_comments = (strtolower($reviews["pub_review"]->value_comments !== "null")) ? $reviews["pub_review"]->value_comments : "";
$furniture_comments = (strtolower($reviews["pub_review"]->furniture_comments !== "null")) ? $reviews["pub_review"]->furniture_comments : "";
$toilet_comments = (strtolower($reviews["pub_review"]->toilet_comments !== "null")) ? $reviews["pub_review"]->toilet_comments : "";

// TODO: this needs to be calculated
$review_rating_total = 3;
$maxRating = 5;


//        print_r("<pre>");
//        print_r($reviews["beer_reviews"]);
//        print_r("</pre>");

?>

    <div class="md:w-3/4 md:mx-auto mt-7">
        <div class="flex flex-1 justify-center mb-5">
            <h2 class="text-3xl font-bold"><?= $pub_name ?></h2>
        </div>
    </div>


    <div class="flex flex-col border-t border-r items-center py-4">
        <div class="flex justify-center">
            @for($i = 1; $i <= $maxRating; $i++)
                @if($i <= $review_rating_total)
                    <svg class="w-6 h-6 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @else
                    <svg class="w-6 h-6 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endif
            @endfor
        </div>
        <div class="flex mt-1">
            <small>275 Reviews</small>
        </div>

    </div>
    <div class="grid grid-cols-2 text-center">
        <div class="p-4 border-b border-t border-r">
            <div class="truncate">
                {{ $city }}
            </div>
            <hr class="w-1/2 mx-auto">
            <div class="truncate">
                {{ $country }}
            </div>
        </div>

        <div class="p-4 border-b border-t flex items-center">
            {{ $date->format("d-m-Y H:i:s") }}
        </div>
    </div>

    {{--  pub ratings and comments  --}}
    <div class="flex gap-4 p-2 my-2 mx-auto">
        <div class="flex flex-col p-5 rounded-lg shadow-md border w-full ml-auto h-full">
            <div class="px-7">
                <h4 class="font-bold text-lg my-3">Pub ratings and comments</h4>

                <hr class="my-4">
                {{--  Atmosphere --}}
                <div class="flex my-2">
                    <div class="flex-1 text-sm font-bold">Atmosphere</div>
                    <div class="flex flex-1 justify-end">
                        @for($i = 1; $i <= $maxRating; $i++)
                            @if($i <= $atmosphere_rating)
                                <svg class="w-4 h-4 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex">
                    <small class="flex-1">"{{$atmosphere_comments}}"</small>
                </div>

                <hr class="my-3">

                {{-- Aesthetic --}}
                <div class="flex my-2">
                    <div class="flex-1 text-sm font-bold">Aesthetic</div>
                    <div class="flex flex-1 justify-end">
                        @for($i = 1; $i <= $maxRating; $i++)
                            @if($i <= $aesthetic_rating)
                                <svg class="w-4 h-4 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex">
                    <small class="flex-1">"{{$aesthetic_comments}}"</small>
                </div>

                <hr class="my-3">

                {{-- Beer Selection --}}
                <div class="flex my-2">
                    <div class="flex-1 text-sm font-bold">Beer Selection</div>
                    <div class="flex flex-1 justify-end">
                        @for($i = 1; $i <= $maxRating; $i++)
                            @if($i <= $beer_selection_rating)
                                <svg class="w-4 h-4 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex">
                    <small class="flex-1">"{{$beer_selection_comments}}"</small>
                </div>

                <hr class="my-3">

                {{-- value --}}
                <div class="flex my-2">
                    <div class="flex-1 text-sm font-bold">Value</div>
                    <div class="flex flex-1 justify-end">
                        @for($i = 1; $i <= $maxRating; $i++)
                            @if($i <= $value_rating)
                                <svg class="w-4 h-4 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex">
                    <small class="flex-1">"{{$value_comments}}"</small>
                </div>

                <hr class="my-3">

                {{-- furniture --}}
                <div class="flex my-2">
                    <div class="flex-1 text-sm font-bold">Furniture</div>
                    <div class="flex flex-1 justify-end">
                        @for($i = 1; $i <= $maxRating; $i++)
                            @if($i <= $furniture_rating)
                                <svg class="w-4 h-4 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex">
                    <small class="flex-1">"{{$furniture_comments}}"</small>
                </div>

                <hr class="my-3">

                {{-- toilet --}}
                <div class="flex my-2">
                    <div class="flex-1 text-sm font-bold">Toilets</div>
                    <div class="flex flex-1 justify-end">
                        @for($i = 1; $i <= $maxRating; $i++)
                            @if($i <= $toilet_rating)
                                <svg class="w-4 h-4 text-yellow-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @else
                                <svg class="w-4 h-4 ms-1 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="flex">
                    <small class="flex-1">"{{$toilet_comments}}"</small>
                </div>

                <hr class="my-3">

            </div>
        </div>
    </div>

    <div class="flex ap-4 p-2 my-2 mx-auto">
        <div class="flex flex-col p-5 rounded-lg shadow-md border w-full ml-auto h-full bg-green-50">
        </div>
    </div>




</x-layout>

