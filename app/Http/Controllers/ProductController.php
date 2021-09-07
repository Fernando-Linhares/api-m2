<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param \App\Models\Product $product
     */
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $product = array();
        foreach($this->product->all() as $product){
            $products[] = collect([
                'name'=>$product->name,
                'price'=>$product->price,
                'description'=>$product->description,
                'category'=>$product->category,
            ]);
        }

        return response()->json($product);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->product->name = $request->name;
        $this->product->category_id = ProductCategory::where('name',$request->category)->first()->id;
        $this->product->price = $request->price;
        $this->product->description = $request->description;

        if($this->product->save())
            return response()->json(['message'=>'product created successfully']);
        
        return response()->json(['message'=>'error on creating product']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        $products[] = collect([
            'name'=>$product->name,
            'price'=>$product->price,
            'description'=>$product->description,
            'category'=>$product->category,
        ]);

        return response()->json($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->category_id = ProductCategory::where('name',$request->category)->first()->id;
        $product->price = $request->price;
        $product->description = $request->description;

        if($product->save())
            return response()->json(['message'=>'product updated successfully']);

        return response()->json(['message'=>'error on updating product']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        if($product->delete())
            return response()->json(['message'=>'product deleted successfully']);

        return response()->json(['message'=>'error on deleting product']);
    }
}
