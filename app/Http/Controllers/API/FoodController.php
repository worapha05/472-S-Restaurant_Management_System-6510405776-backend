<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Collections\FoodCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private FoodRepository $foodRepository
    ) {}

    public function index()
    {
        $foods = $this->foodRepository->getAll();
        return new FoodCollection($foods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Food::class);
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:AVAILABLE,UNAVAILABLE',
            'category' => 'required|in:MAIN COURSE,DESSERT,BEVERAGE',
            'description' => 'nullable|string',
            'image_url' => 'required|string',  // Validate image
        ]);

        $food = Food::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),  // Get the URL of the uploaded image
        ]);

        return new FoodResource($food);
    }



    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return new FoodResource($food);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {

        $this->foodRepository->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'status' => $request->get('status'),
            'category' => $request->get('category'),
            'description' => $request->get('description'),
            'image_url' => $request->get('image_url'),
        ], $food->id);

        return new FoodResource($food->refresh());

        Gate::authorize('update', Food::class);
        // Upadte Code
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
