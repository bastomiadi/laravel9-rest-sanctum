<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\CategoryRequest;
use App\Http\Resources\v1\CategoryResource;
use App\Models\v1\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index');
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(Category $category, Request $request)
    {
        return CategoryResource::collection(
            $category
            ->with(['products','user'])
            ->filterByName($request->name)
            ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(CategoryRequest $request, Category $category)
    {
        return response([
            'data' => new CategoryResource(
                $category::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    
    public function update(CategoryRequest $request, Category $category)
    {   

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

}
