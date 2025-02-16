<?php

namespace App\Http\Controllers\API;

use App\Http\Collections\FoodCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;

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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
