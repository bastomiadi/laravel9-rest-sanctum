<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\ProductRequest;
use App\Http\Resources\v1\ProductResource;
use App\Models\v1\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
    }

    public function index(Product $product)
    {   
        return ProductResource::collection($product->with(['category','user'])->paginate(10));
    }

    public function store(ProductRequest $request, Product $product)
    {
        return response([
            'data' => new ProductResource(
                $product::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    
    public function update(ProductRequest $request, Product $product)
    {   
        $this->userAuthorize($product); 

        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Product $product)
    {
        $product->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function userAuthorize($product)
    {
        if(Auth::user()->id != $product->created_by){
            //throw your exception text here;
            
        }
    }
}
