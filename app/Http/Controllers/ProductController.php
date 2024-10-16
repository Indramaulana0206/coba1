<?php

namespace App\Http\Controllers;
//import models
use App\Models\Product;
//import return type View
use Illuminate\View\View;
//import resource
use App\Http\Resources\ProductResource;
//import HTTP request
use Illuminate\Http\Request;
//import facade Validator
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * index
     * 
     * @return void
     */
    public function index() 
    {
        //get all products
        $products = Product::latest()->paginate(10);

        return new ProductResource(true,'List Data Product', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
        ]); 

        //check if vaidation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //uploud image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        //create product
        $product = Product::create([
            'image'     => $image->hashName(),

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
