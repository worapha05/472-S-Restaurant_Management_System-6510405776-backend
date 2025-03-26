<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\StockItemCollection;
use App\Http\Resources\StockItemResource;
use App\Models\Enums\StockItemCategory;
use App\Models\StockItem;
use App\Repositories\StockItemRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UpdateStockItemRequest;

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
    public function store(UpdateStockItemRequest $request)
    {
        $request->validated();
        $category = StockItemCategory::fromThai($request->get('category'))->value;

        $stockItem = new StockItem();
        $stockItem->name = $request->get('name');
        $stockItem->category = $category;
        $stockItem->current_stock = 0;
        $stockItem->unit = $request->get('unit');
        $stockItem->save();

        return new StockItemResource($stockItem->refresh());
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
    public function update(UpdateStockItemRequest $request, StockItem $stockItem)
    {
        $request->validated();

        $this->stockItemRepository->update([
            'name' => $request->get('name'),
            'category' => $request->get('category'),
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
