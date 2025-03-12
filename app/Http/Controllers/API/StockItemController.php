<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\StockItemCollection;
use App\Http\Resources\StockItemResource;
use App\Models\StockItem;
use App\Repositories\StockItemRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StockItemController extends Controller
{
    public function __construct(
        private StockItemRepository $stockItemRepository,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockItems = $this->stockItemRepository->getAll();
        return new StockItemCollection($stockItems);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:stock_items,name'],
            'description' => ['required', 'min:3', 'max:255'],
            'current_stock' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'min:3', 'max:255'],
        ]);

        $stockItem = $this->stockItemRepository->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'current_stock' => $request->get('current_stock'),
            'unit' => $request->get('unit'),
        ]);

        return new StockItemResource($stockItem);
    }

    /**
     * Display the specified resource.
     */
    public function show(StockItem $stockItem)
    {
        return new StockItemResource($stockItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockItem $stockItem)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('stock_items', 'name')->ignore($stockItem->id)],
            'description' => ['required', 'min:3', 'max:255'],
            'current_stock' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'min:3', 'max:255'],
        ]);

        $this->stockItemRepository->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'current_stock' => $request->get('current_stock'),
            'unit' => $request->get('unit'),
        ], $stockItem->id);
        return new StockItemResource($stockItem->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockItem $stockItem)
    {
        $id = $stockItem->id;
        if ($this->stockItemRepository->isEmptyCurrentStock($id)) {
            $stockItem->delete();
            return [
                'success' => true,
                'message' => "Stock item with id {$id} has been deleted"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Cannot delete stock item with id {$id}"
            ];
        }
    }
}
