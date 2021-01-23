<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use App\Models\Country;
use App\Http\Resources\Country as CountryResources;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::paginate(15);
        return CountryResources::collection($countries);
    }

   
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country=$request->isMethod('put')? Country::findOrFail($request->country_id):new Country;
        $country->id=$request->input('country_id');
        $country->name=$request->input('name');
        $country->population=$request->input('population');
        $country->city=$request->input('city');
        if($country->save()){
         return new CountryResources($country);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country=Country::findOrFail($id);
        return new CountryResources($country);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $country=Country::findOrFail($id);
        if($country->delete()){
        return new CountryResources($country);
    }
}
}