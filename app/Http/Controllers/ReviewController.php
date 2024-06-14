<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index(){
        $countries = DB::table('countries')->orderByDesc('priority')->get();
        return view('add-review-v2', compact('countries'));
    }

    public function generateReviewForms(Request $request){
        $beerList = $request->beerList;
        $view = view('/partials/add-review/components/beer-review-forms', compact('beerList'))->render();
        return $result = $this->successMessage('', 'beer-reviews-action', $view, $beerList);
    }

    public function submitReview(Request $request){
        $data = $request->data;
//        print_r($data["general_details"]);
//        print_r($data['pub_details']);
//        print_r($data['beer_details'][0]['beer_data']['serving-type']);
        print_r("<pre>");
        print_r($data);
        print_r("</pre>");
//        return $result = $this->successMessage('', 'submitted-review-action', '', '');
    }

    private function successMessage(string $message = '', string $action, string $html, $params = [], $bread_crumbs = []): string
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

}
