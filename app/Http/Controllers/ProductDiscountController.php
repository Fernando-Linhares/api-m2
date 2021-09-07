<?php

namespace App\Http\Controllers;

use App\Models\ProductDiscount;
use Illuminate\Http\Request;

class ProductDiscountController extends Controller
{
    /**
     * @param \App\Models\ProductDiscount $discount
    */
    private ProductDiscount $discount;

    public function __construct(ProductDiscount $discount)
    {
        $this->discount = $discount;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->discount->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if($this->discount->create($request->all()))
            return response()->json(['message'=>'discount product craeted successfully']);

        return response()->json(['message'=>'error on creating discount product']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ProductDiscount $discount)
    {
        return response()->json($discount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ProductDiscount $discount)
    {
        if($discount->update($request->all()))
            return response()->json(['message'=>'update product discount successfully']);

        return response()->json(['message'=>'error on updating discount']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ProductDiscount $discount)
    {
        if($discount->delete())
            return response()->json(['message'=>'delete product discount successfully']);
        
        return response()->json(['message'=>'error on deleting discount']);
    }
}
