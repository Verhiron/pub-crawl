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


<div class="container">
    <h1>hello</h1>
</div>


</x-layout>
