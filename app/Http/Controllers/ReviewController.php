<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Agent;
use PhpParser\Error;
use function Laravel\Prompts\text;

class ReviewController extends Controller
{
    public function index(){
        $countries = DB::table('countries')->orderByDesc('priority')->get();
        return view('add-review', compact('countries'));
    }

    public function getCities(Request $request) {

        $country_id = $request->country;

        $cities = DB::table('cities')->where('country_id',$country_id)->get();

        return $result = $this->successMessage('', 'city-action', '', $cities);
    }

    public function getPubs(Request $request){
        $pubs = DB::select('CALL getPubs(?)', [$request->city]);
        return $result = $this->successMessage('', 'pubs-action', '', $pubs);
    }

    public function getBeerList(){
        $beers = DB::select('CALL getAllBeers()');
        return $result = $this->successMessage('', 'beers-action', '', $beers);
    }

    public function generateReviewForms(Request $request){
        $beerList = $request->beerList;
        $view = view('/partials/add-review/components/beer-review-forms', compact('beerList'))->render();
        return $result = $this->successMessage('', 'beer-reviews-action', $view, $beerList);
    }

    public function testBeer(Request $request){
        $data = $request->data;

        $reference = $this->generateReference();

        $final_beer_details = [];

        foreach ($data['beer_details'] as &$beer_detail){
            if($beer_detail['beer_id'] === "other"){
                $beer_name = ucfirst(strtolower($beer_detail['beer_name']));

                $beer_record = DB::table('beers')->where('beer_name', 'LIKE', $beer_name)->first();

                //if the record exists then we just use that, but if it doesn't then we create the record.
                //exact matches only
                if($beer_record){
                    $beer_detail['beer_id'] = $beer_record->beer_id;
                    $beer_detail['beer_name'] = $beer_record->beer_name;
                }else{
                    $new_beer_details = DB::select('CALL addNewBeer(?)', [$beer_name]);

                    //replace the original beer_name and ID with the new inserted one
                    $beer_detail['beer_id'] = $new_beer_details[0]->beer_id;
                    $beer_detail['beer_name'] = $new_beer_details[0]->beer_name;
                }

            }

            $correct_glass = (isset($beer_detail['beer_data']['beer-review-correct-glass'])) ? $beer_detail['beer_data']['beer-review-correct-glass'] : null;

            $_final_beer_details = [
                "beer_id"=>(int)$beer_detail['beer_id'],
                "beer_name"=>(string)$beer_detail['beer_name'],
                "beer_data"=>[
                    "serving_type"=>(string)$beer_detail['beer_data']['serving-type'],
                    "beer_review_correct_glass"=>(string)$correct_glass,
                    "beer_review_appearance"=>(int)$beer_detail['beer_data']['beer-review-appearance'],
                    "beer_review_taste"=>(int )$beer_detail['beer_data']['beer-review-taste'],
                    "beer_review_overall"=>(int)$beer_detail['beer_data']['beer-review-overall'],
                    "beer_review_additional_comment"=>(string)$beer_detail['beer_data']['beer-review-additional-comment'],
                ]
            ];
            $final_beer_details[] = $_final_beer_details;
        }

        $n_beer_details = json_encode($final_beer_details, JSON_PRETTY_PRINT);

//        $test = DB::select('CALL testProcedure(?, ?)', [$reference, $n_beer_details]);

        print_r($n_beer_details);

    }

    /**
     * @throws Exception
     */
    public function submitReview(Request $request){
        $data = $request->data;

//        print_r("<pre>");
//        print_r($pub_details);
//        print_r("</pre>");
//        die();

        $country = $data["general_details"]["country"];

//        checks if city is other or a city_id
        if ($data["general_details"]["city"] === "other"){

            $other_city = $data["general_details"]["other-city"];

            //if other city is empty then throw error as it should have a city name
            if(empty($other_city)){
                throw new Error("other city empty");
            }

            //capitalise the first letter
            $c_new_city = ucfirst(strtolower($other_city));

            //returns a city id
            $city = DB::select('CALL addNewCity(?, ?)', [$c_new_city, $country]);
            $city = $city[0]->city_id;

        }else{
            $city = $data["general_details"]["city"];
        }

        if($data["general_details"]["pub"] === "other"){
            $other_pub = $data["general_details"]["other-pub"];

            if(empty($other_pub)){
                throw new Error("other pub empty");
            }

            //capitalise the first letter
            $c_new_pub = ucfirst(strtolower($other_pub));

            //returns a pub id
            $pub = DB::select('CALL addNewPub(?, ?)', [$c_new_pub, $city]);
            $pub = $pub[0]->pub_id;
        }else{
            $pub = $data["general_details"]["pub"];
        }

        $general_details = json_encode(array(
            "country"=>(int)$country,
            "city"=>(int)$city,
            "pub"=>(int)$pub
        ));

        $pub_details = json_encode($data['pub_details']);


        $final_beer_details = [];

        foreach ($data['beer_details'] as &$beer_detail){
            if($beer_detail['beer_id'] === "other"){
                $beer_name = ucfirst(strtolower($beer_detail['beer_name']));

                $beer_record = DB::table('beers')->where('beer_name', 'LIKE', $beer_name)->first();

                //if the record exists then we just use that, but if it doesn't then we create the record.
                //exact matches only
                if($beer_record){
                    $beer_detail['beer_id'] = $beer_record->beer_id;
                    $beer_detail['beer_name'] = $beer_record->beer_name;
                }else{
                    $new_beer_details = DB::select('CALL addNewBeer(?)', [$beer_name]);

                    //replace the original beer_name and ID with the new inserted one
                    $beer_detail['beer_id'] = $new_beer_details[0]->beer_id;
                    $beer_detail['beer_name'] = $new_beer_details[0]->beer_name;
                }

            }

            $correct_glass = (isset($beer_detail['beer_data']['beer-review-correct-glass'])) ? $beer_detail['beer_data']['beer-review-correct-glass'] : null;

            $_final_beer_details = [
                "beer_id"=>(int)$beer_detail['beer_id'],
                "beer_name"=>(string)$beer_detail['beer_name'],
                "beer_data"=>[
                    "serving_type"=>(string)$beer_detail['beer_data']['serving-type'],
                    "beer_review_correct_glass"=>(string)$correct_glass,
                    "beer_review_appearance"=>(int)$beer_detail['beer_data']['beer-review-appearance'],
                    "beer_review_taste"=>(int )$beer_detail['beer_data']['beer-review-taste'],
                    "beer_review_overall"=>(int)$beer_detail['beer_data']['beer-review-overall'],
                    "beer_review_additional_comment"=>(string)$beer_detail['beer_data']['beer-review-additional-comment'],
                ]
            ];
            $final_beer_details[] = $_final_beer_details;
        }

        $n_beer_details = json_encode($final_beer_details);

        try{
            //generate a new reference
            $reference = $this->generateReference();

        }catch (Exception $e){
            return $this->failMessage('Unable to generate new review reference', 'fail-action');
        }

        try{

            $review = DB::select('CALL addNewReview(?, ?, ?, ?)', [$reference, $general_details, $pub_details, $n_beer_details]);

        }catch (Exception $e){
            return $this->failMessage('Unable to create new review', 'fail-action');
        }

        return $this->successMessage('', 'submitted-review-action', '', $reference, '');

    }


    public function getReview($reference){
        $reviews = DB::select('CALL getBeerReviews(?)', [$reference]);
//        print_r(json_encode($reviews, JSON_PRETTY_PRINT));
        print_r("<pre>");
        print_r($reviews);
        print_r("</pre>");
    }

    public function getOverallReview($reference){
        //this is the mobile agent
        $agent = new Agent();

        //checks the device - decides the view
        $isTablet = $agent->isTablet();
        $isMobile = $agent->isMobile();
        $isDesktop = $agent->isDesktop();


        $beer_reviews = DB::select('CALL getBeerReviews(?)', [$reference]);
        $pub_review = DB::select('CALL getPubReview(?)', [$reference]);

        $reviews = [
            "beer_reviews"=>$beer_reviews,
            "pub_review"=>$pub_review[0],
        ];

        if($isMobile || $isTablet){
            return view('review-mobile', compact('reviews'));
        }else{
            return view('review-desktop', compact('reviews'));
        }
    }


    private function generateReference(): string
    {
        try{
            $currentDate = new DateTime();
            $timestamp = $currentDate->format("YmdHis");
            $randomStringSuffix = bin2hex(random_bytes(5));
            $randomStringPrefix = bin2hex(random_bytes(5));
            $reference = $randomStringPrefix. $timestamp . $randomStringSuffix;

            if(strlen($reference) < 4){
                throw new Exception("reference unacceptable");
            }

            return $reference;

        }catch (Exception $e){
            return "could not generate new reference";
        }

    }

    private function successMessage(string $message = "", string $action, string $html, $params = [], $bread_crumbs = []): string
    {
        //$this->successMessage('', 'fetched-cities', 'html', $values);
        return json_encode([
            'result'=>'success',
            'action'=>$action,
            'data'=>[
                'params'=>$params,
                'html'=>$html,
                'bread_crumbs'=>$bread_crumbs,
            ]
        ]);
    }

    private function FailMessage(string $message = "", string $action): string
    {
        //$this->successMessage('', 'fetched-cities', 'html', $values);
        return json_encode([
            'result'=>'failure',
            'message'=>$message,
            'action'=>$action,
        ]);
    }


}
