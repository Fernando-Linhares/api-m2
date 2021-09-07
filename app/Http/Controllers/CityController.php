<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityCountry;
use App\Models\CityGroup;
use App\Models\CityState;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * @param App\Models\City $city;
     */
    private City $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cities = array();

        foreach($this->city->all() as $city){
            $cities[] = collect([
                'name'=>$city->name,
                'state'=> CityState::find($city->state_id),
                'country'=>CityCountry::find($city->county_id),
                'group'=>CityGroup::find($city->group)
            ]);
        }

        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->city->name = $request->name;
        $this->city->state_id = CityState::where('name',$request->state)->first()->id;
        $this->city->county_id =  CityCountry::where('name',$request->county)->first()->id;
        $this->city->group = CityGroup::where('name', $request->group)->frist()->id;


        if($this->city->save())
            return response()->json(['message'=>'city created successfully']);

        return response()->json(['message'=>'error on creating city']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(City $city)
    {
        return response()->json($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, City $city)
    {
        $city->name = $request->name;
        $city->state_id = CityState::where('name',$request->state)->first()->id;
        $city->country_id = CityCountry::where('name',$request->country)->first()->id;
        $city->group = CityGroup::where('name', $request->group)->frist()->id;

        if($city->save())
            return response()->json(['message'=>'city updated successfuly']);

        return response()->json(['message'=>'error on update city']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(City $city)
    {
        if($city->delete())
            return response()->json(['message'=>'city deleted successfully']);

        return response()->json(['error on delete city']);
    }
}
