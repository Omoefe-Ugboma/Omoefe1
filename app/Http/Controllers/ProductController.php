<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class ProductController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:api')->except('index','show');
       // $this->middleware('cors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;

        $product->product_Name = $request->product_Name;
        $product->quantity = $request->quantity;
        $product->product_price = $request->product_price;
        $product->Product_Status = $request->Product_Status;
        $product->product_image_1 = $request->product_image_1;
        $product->product_image_2 = $request->product_image_2;
        $product->product_image_3 = $request->product_image_3;
        $product->product_image_4 = $request->product_image_4;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->product_tags = $request->product_tags;
        $product->stock = $request->stock;
        $product->sub_category_id = $request->sub_category_id;
        $product->Vendor = $request->Vendor;
        $product->user_id = $request->user_id;
        $product->User_Manual = $request->User_Manual;

        $product->save();

        return response([
            
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->ProductUserCheck($product);
        $product->update($request->all());

         return response([
            
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }

     public function ProductUserCheck($product)
     {
        if(Auth::id() !== $product->user_id){
              throw new ProductNotBelongsToUser;
        }
     }



}
