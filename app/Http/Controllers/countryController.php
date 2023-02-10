<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use App\Models\state;
use App\Models\city;

class countryController extends Controller
{
    public function view(){
        $country = country::get(["country_name", "id"]);
        return view('dropdown.country',['country'=>$country]);
    }

    public function fetchState(Request $request)

    {
        $state = state::where("countries_id", $request->country_id)->get(["state_name", "id"]);
        return response()->json(['state'=> $state]);
    }
      
    public function fetchCity(Request $request)
    {
        $city = city::where("states_id", $request->state_id)->get(["city_name", "id"]);   
        // dd($city);                       
        return response()->json(['city'=>$city]);
    }
    
}