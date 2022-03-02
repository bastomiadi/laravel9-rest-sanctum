<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\CategoryRequest;
use App\Http\Resources\v1\CategoryResource;
use App\Models\v1\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
    }

    public function index(Category $category, Request $request)
    {   

        //if($request->query()){}
        return CategoryResource::collection($category->with(['products','user'])
        ->paginate(50));
    }

    public function store(CategoryRequest $request)
    {
        $model = Category::create(
            $request->all()
        );    

        return response([
            'data' => new CategoryResource($model)
        ],Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    
    public function update(CategoryRequest $request, Category $category)
    {   
        $this->userAuthorize($category); 

        $category->update($request->all());

        return response([
            'data' => new CategoryResource($category)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Category $category)
    {
        $category->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function userAuthorize($category)
    {
        if(Auth::user()->id != $category->created_by){
            //throw your exception text here;
            
        }
    }
}
