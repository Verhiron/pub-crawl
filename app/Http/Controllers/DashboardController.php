<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $countries = DB::table('countries')->orderByDesc('priority')->get();
        return view('dashboard', compact('countries'));
    }

    public function getCities(Request $request)
    {
        $country_id = $request->country;

        $cities = DB::table('cities')->where('country_id',$country_id)->get();

        return $result = $this->successMessage('', 'city-action', '', $cities);
    }

    public function getBeers(Request $request){

        $bread_crumbs_arr = [];

        if(isset($request->country)){
            $beers = DB::select('CALL getAllBeersByCountry(?)', [$request->country]);
            $bread_crumbs_arr = DB::select('CALL getFilterInfo(?, null, null)', [$request->country]);
        }elseif (isset($request->city)){
            $beers = DB::select('CALL getAllBeersByCity(?)', [$request->city]);
            $bread_crumbs_arr = DB::select('CALL getFilterInfo(null, ?, null)', [$request->city]);
        }elseif (isset($request->pub)){
            $beers = DB::select('CALL getAllBeersByPub(?)', [$request->pub]);
            $bread_crumbs_arr = DB::select('CALL getFilterInfo(null, null, ?)', [$request->pub]);
        } else{
            $beers = DB::select('CALL getAllBeers()');
        }

        //TODO: request for pubs

        $view = view('/partials/beer/beer-list', compact('beers', 'bread_crumbs_arr'))->render();
        return $result = $this->successMessage('', 'beers-action', $view, $beers, $bread_crumbs_arr);
    }

    public function getPubs(Request $request){
        $pubs = DB::select('CALL getPubs(?)', [$request->city]);
        return $result = $this->successMessage('', 'pubs-action', '', $pubs);
    }

    public function getBeerList(){
        $beers = DB::select('CALL getAllBeers()');
        return $result = $this->successMessage('', 'beers-action', '', $beers);
    }


    public function test(){
        return view('test-page');
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
