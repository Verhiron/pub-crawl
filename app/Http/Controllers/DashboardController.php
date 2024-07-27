<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use function Laravel\Prompts\select;

class DashboardController extends Controller
{
    public function index()
    {
        $countries = DB::table('countries')->orderByDesc('priority')->get();
        return view('dashboard', compact('countries'));
    }


    public function getCitiesMainDetails($country_iso, Request $request){

        //country data
        $country_data = DB::table('countries')->where('iso_code', $country_iso)->select('country_id', 'country', 'country_img')->first();

        //city data
        $cities = DB::table('cities')->where('country_id',$country_data->country_id)->get();

        $city = $request->query('city');
        $rating = $request->query('rating');
        $pub_name = $request->query('pub');
        $page = request()->input('page', 1); // Get the current page, default to 1 if not present

        $pub_query = DB::table('country_pub_view')->where('iso_code', $country_iso);

        if($city){
            $pub_query->where('city_id', $city);
        }

        if ($rating) {
            $pub_query->where('overall_rating', '>=', $rating);
        }

        if ($pub_name) {
            $pub_query->where('pub_name', 'LIKE', "%{$pub_name}%");
        }

        $pub_data = $pub_query->paginate(5, ['*'], 'page', $page); // Adjust the number of items per page as needed

        $pagination = [
            'current_page' => $pub_data->currentPage(),
            'last_page' => $pub_data->lastPage(),
            'total' => $pub_data->total(),
            'per_page' => $pub_data->perPage(),
            'from' => $pub_data->firstItem(),
            'to' => $pub_data->lastItem(),
        ];

//        country/GB?rating=1&city=1

        return view('cities-main', compact( 'country_data', 'cities', 'pub_data', 'pagination'));
    }

    public function getBeers(Request $request)
    {

        if($request->has('country')){

            $country = $request->input('country');

            $country_id = DB::table('countries')->where('iso_code', $country)->value('country_id');

            $beers = ($country_id) ? DB::select('CALL getAllBeersByCountry(?)', [$country_id]) : [];

        }elseif ($request->has('city')){

            $city_id = $request->input('city');
            $beers = DB::select('CALL getAllBeersByCity(?)', [$city_id]);

        }elseif ($request->has('pub')){

            $pub_id = $request->input('pub');
            $beers = DB::select('CALL getAllBeersByPub(?)', [$pub_id]);

        }else{
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
