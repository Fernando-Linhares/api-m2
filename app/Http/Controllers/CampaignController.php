<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    /**
     * @param App\Models\Campaign $campaign
     */
    private Campaign $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->campaign->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if($this->campaign->create($request->all()))
            return response()->json(['message'=>'campaign created successfuly']);
        
        return response()->json(['message'=>'error on creating campaign']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign $campaign
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Campaign $campaign)
    {
        return response()->json($campaign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign $campaign
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Campaign $campaign)
    {
        if($campaign->update($request->all()))
            return response()->json(['message'=>'campaign updated successfully']);

        return response()->json(['message'=>'error on updating campaign']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign $campaign
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Campaign $campaign)
    {
        if($campaign->delete())
            return response()->json(['message'=>'campaign deleted successfully']);
        
        return response()->json(['message'=>'error on deleting campaing']);
    }
}
