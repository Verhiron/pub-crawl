<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index(){
        $countries = DB::table('countries')->orderByDesc('priority')->get();
        return view('add-review', compact('countries'));
    }

}
