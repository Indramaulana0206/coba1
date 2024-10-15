<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
//import return type View
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * index
     * 
     * @return void
     */
    public function index() : View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        return View('products.index', compact('products'));
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
     */
    public function store(Request $request)
    {
        //
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
