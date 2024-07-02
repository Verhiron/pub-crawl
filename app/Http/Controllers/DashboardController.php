<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DashboardController extends Controller
{
    public function index()
    {
        $countries = DB::table('countries')->orderByDesc('priority')->get();
        return view('dashboard', compact('countries'));
    }

    public function getCountryDetails($country_iso){
        $country_data = DB::table('countries')->where('iso_code', $country_iso)->select('country_id', 'country_img')->first();
        $cities = DB::table('cities')->where('country_id',$country_data->country_id)->get();
        $country_img = $country_data->country_img;
        return view('cities-main', compact('cities', 'country_img'));
    }

    public function getBeers(Request $request)
    {
        // Check if the 'city' parameter is present
        if ($request->has('city')) {
            $city_id = $request->input('city');
            $beers = DB::select('CALL getAllBeersByCity(?)', [$city_id]);
        } elseif ($request->has('country')) {

            $country = $request->input('country');

            $country_id = DB::table('countries')->where('iso_code', $country)->value('country_id');
            if ($country_id) {
                $beers = DB::select('CALL getAllBeersByCountry(?)', [$country_id]);
            } else {
                $beers = [];
            }
        } else {
            $beers = DB::select('CALL getAllBeers()');
        }

        // Render the view with the fetched beers
        $view = view('/partials/beer/beer-list', compact('beers'))->render();

        // Return the success message with the view and beers data
        return $this->successMessage('', 'beers-action', $view, $beers);
    }

    public function getPubs(Request $request){
        if ($request->has('city')) {
            $city_id = $request->input('city');
            $pubs = DB::select('CALL getPubs(?)', [$city_id]);

            $view = view('/partials/beer/pub-list', compact('pubs'))->render();

            return $result = $this->successMessage('', 'pubs-action', $view, $pubs);
        }
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
