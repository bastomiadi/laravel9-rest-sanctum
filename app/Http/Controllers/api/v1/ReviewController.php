<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\ReviewRequest;
use App\Http\Resources\v1\ReviewResource;
use App\Models\v1\Review;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReviewController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
    }

    public function index(Review $review)
    {   
        return ReviewResource::collection($review->with(['product','user'])->paginate(10));
    }

    public function store(ReviewRequest $request)
    {
        $model = Review::create(
            $request->all()
        );    

        return response([
            'data' => new ReviewResource($model)
        ],Response::HTTP_CREATED);
    }

    public function show(Review $review)
    {
        return new ReviewResource($review);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {   
        $this->userAuthorize($review); 

        $review->update($request->all());

        return response([
            'data' => new ReviewResource($review)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Review $review)
    {
        $review->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function userAuthorize($review)
    {
        if(Auth::user()->id != $review->created_by){
            //throw your exception text here;
            
        }
    }
}
