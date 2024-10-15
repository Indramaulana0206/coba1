<?php

namespace App\Http\Controllers\Api;

//import model Product
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//import resource ProductResource
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        //get all product
        $products = Product::latest()->paginate(5);

        //return collection of product as aresource
        return new ProductResource(true, 'List Data Product', $products);
    }
}
