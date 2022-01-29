<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function list(Request $request)
    {
        return [
            'results' => Country::select(['id', 'name as text'])
                ->where('name', 'LIKE', '%'.$request->input('term').'%')
                ->take(20)
                ->get()
        ];
    }

    public function addVisitedCountry(Request $request)
    {
        $country = Country::findOrFail($request->input('countryID'));
        $request->user()
            ->visited_countries()
            ->attach($request->input('countryID'));
        $request->user()->save();
        return ['status' => 'success', 'country_code' => $country->code];
    }

    public function removeVisitedCountry(Request $request)
    {
        $country = Country::findOrFail($request->countryID);
        $request->user()
            ->visited_countries()
            ->detach($request->countryID);
        $request->user()->save();
        return ['status' => 'success'];
    }



    public function visitedCountries(Request $request){
        return $request->user()->visited_countries()->get();
    }

}
