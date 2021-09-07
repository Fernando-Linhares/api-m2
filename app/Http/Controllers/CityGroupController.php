<?php

namespace App\Http\Controllers;

use App\Models\CityGroup;
use Illuminate\Http\Request;

class CityGroupController extends Controller
{
    /**
     * @param \App\Models\CityGroup $citygroup
     */
    private CityGroup $citygroup;

    public function __construct(CityGroup $citygroup)
    {
        $this->citygroup = $citygroup;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        foreach($this->citygroup->all() as $citygroup){
            $cities[] = collect([
                'name'=>$citygroup->name,
                'cities'=>$citygroup->cities
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
        if($this->citygroup->create($request->all()))
            return response()->json(['message'=>'groupe city created successfully']);
        
        return response()->json(['message'=>'error on creating city group']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CityGroup  $cityGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CityGroup $citygroup)
    {
        return response()->json($citygroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CityGroup  $cityGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityGroup $citygroup)
    {
        if($citygroup->update($request->all()))
            return response()->json(['message'=>'city group updated successfuly']);
        return response()->json(['message'=>'error on updating city group']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CityGroup  $cityGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityGroup $citygroup)
    {
        if($citygroup->delete())
            return response()->json(['message'=>'city group deleted successfuly']);

        return response()->json(['message'=>'error on deleting city group']);
    }
}
