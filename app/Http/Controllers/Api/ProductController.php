<?php

namespace App\Http\Controllers\Api;

//import model Product
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// import validator
use Illuminate\Support\Facades\Validator;

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
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return new ProductResource(true, 'Data Product Berhasi Ditambahkan ....!', $product); 
    }

}
